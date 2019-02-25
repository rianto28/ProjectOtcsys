
<script>
    function showTextBox(id) {
        document.getElementById(id).style.display = "block";
    }
    function hideTextBox(id) {
        document.getElementById(id).style.display = "none";
    }
</script>


<div class="row clearfix" id="formUser">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD VISIT PLAN
                            </h2>
                            
                        </div>
                        <div class="body">
                            <?php Flasher::flash(); ?>
                                
                                <form method="POST" name="plan">
                                   <?= $_POST['tgl']; ?>
                                 <label for="Date">Visit Date</label>
                                    <select class="form-control show-tick" id="date" name="tgl">
                                    <option value="">-- Please select --</option>
                                        <?php foreach ($data['pweekly'] as $period) : ?>
                                            <?php if($period['tanggal']==$_POST['tgl']){ ?>
                                            <option value="<?=$period['tanggal']; ?>" selected><?=  date('d F Y', strtotime($period['tanggal'])) ; ?></option>
                                            <?php }else{?>
                                                <option value="<?= $period['tanggal']; ?>"><?=  date('d F Y', strtotime($period['tanggal'])) ; ?></option>
                                            <?php } ?>               
                                        <?php endforeach; ?>

                                    </select>
                                     <input type="hidden" name="kodemr" value="<?= $data['mr']['kodeana'] ?>">
                                                                                                      
                                           
                                <br><br>                             
                                <div class="button-demo">
                                <a href="<?= BASEURL; ?>/Kunjungan/addplan"><button type="button" class="btn btn-primary waves-effect">SAVE</button></a>
                                    <a href="<?= BASEURL; ?>/Kunjungan"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

            