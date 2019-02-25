
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
                             
                                <form action="<?= BASEURL; ?>/Kunjungan/tambahplan" method="POST" name="plan">
                                   
                                 <label for="Date">Visit Date</label>
                                    <select class="form-control show-tick" id="date" name="tgl">
                                    <option value="">-- Please select --</option>
                                        <?php foreach ($data['pweekly'] as $period) : ?>
                                            <?php if($period['tanggal']==$data['tgl']['tanggal']){ ?>
                                            <option value="<?=$period['tanggal']; ?>" selected><?=  date('d F Y', strtotime($period['tanggal'])) ; ?></option>
                                            <?php }else{?>
                                                <option value="<?= $period['tanggal']; ?>"><?=  date('d F Y', strtotime($period['tanggal'])) ; ?></option>
                                            <?php } ?>               
                                        <?php endforeach; ?>

                                    </select>
                                     <input type="hidden" name="kodemr" value="<?= $data['mr']['kodeana'] ?>">
                                     <!--<div id="simple" class="demo">
                                        <label for="outletcode">Visit Date</label>
                                        <div class="sample">
                                            <input type="text" name="tgl" data-beatpicker="true"/>
                                           
                                        </div>
                                    </div><br> -->
                                                                  
                                            <label for="outlet">Outlet Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" id="outlet" name="outlet">
                                                        <option value="">-- Please select --</option>
                                                        <?php foreach ($data['outlet'] as $outlet) : ?>
                                                            
                                                            <option value="<?= $outlet['outletid']; ?>"><?= $outlet['outletname']." &nbsp [".$outlet['address']."]"; ?></option>
                                                            
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="ket">Note (Visit Activity)</label>
                                            <div class="form-group">
                                               
                                                <input name="note" class="with-gap" type="radio" id="radio_1" value="branding" onclick="javascript:hideTextBox('note')"/>
                                                <label for="radio_1">Branding (BR)</label>

                                                <input name="note" class="with-gap" type="radio" id="radio_2" value="cekstok" onclick="javascript:hideTextBox('note')"/>
                                                <label for="radio_2">Cek Stok (CS)</label>

                                                <input name="note" class="with-gap" type="radio" id="radio_3" value="program" onclick="javascript:hideTextBox('note')"/>
                                                <label for="radio_3">Program (PR)</label>

                                                <input name="note" class="with-gap" type="radio" id="radio_4" value="Branding_&_CekStok" onclick="javascript:hideTextBox('note')"/>
                                                <label for="radio_4">BR & CS</label>

                                                <input name="note" class="with-gap" type="radio" id="radio_5" value="Program_&_CekStok" onclick="javascript:hideTextBox('note')"/>
                                                <label for="radio_5">PR & CS</label>

                                                <input name="note" class="with-gap" type="radio" id="radio_6" value="Program_Branding_&_CekStok" onclick="javascript:hideTextBox('note')"/>
                                                <label for="radio_6">PR, BR & CS</label>
                                                
                                                <br>
                                                <input name="note" class="with-gap" type="radio" id="radio_5" value="lain" onclick="javascript:showTextBox('note')" />
                                                <label for="radio_5">Lain-lain </label><br>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                      <input type="text" class="form-control" placeholder="Enter Note" name="ket" id="note" style="display:none" />
                                                    </div>
                                                           
                                                </div>
                                                
                                                    <!-- <input type="text" id="ket" name="ket" class="form-control" placeholder="Enter Note">-->
                                                <!-- </div>  -->
                                            </div>


                                
                                                                
                                <div class="button-demo">
                                    <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                    <a href="<?= BASEURL; ?>/Kunjungan"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

            <!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA VISIT PLAN
                               
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TANGGAL</th>
                                        <th>OUTLET CODE</th>
                                        <th>OUTLET NAME</th>
                                        <th>NOTE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($data['plan'] as $plan) : 
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= date('d F Y', strtotime($plan['tanggal'])); ?></td>
                                        <td><?= $plan['outletcode']; ?></td>
                                        <td><?= $plan['outletname']; ?></td>
                                        <td><?= $plan['ket']; ?></td>
                                        <td><a href="<?= BASEURL; ?>/Kunjungan/deleteplan/<?= $plan['idvisit']; ?>" onclick="return confirm('Are You Sure Delete Data Plan ?');"><button type="button" class="btn bg-red m-t-15 waves-effect">Delete</button></a></td>
                                    </tr>

                                    <?php 
                                        $no++;
                                        endforeach; 
                                    ?>
                                </tbody>
                            </table>
                            <a href="<?= BASEURL; ?>/Kunjungan/sendplan">
                            <button type="submit" class="btn btn-primary waves-effect">SEND VISIT PLAN</button>
                             </a>       
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Bordered Table -->