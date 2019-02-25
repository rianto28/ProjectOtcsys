
<!-- List Example -->
<?php Flasher::flash(); ?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DETAIL KUNJUNGAN TANGGAL : <?= date('d F Y', strtotime($data['tanggal'])) ; ?>
                                <!-- <small>You can also put badge to list and use the material design colors which example classes are <code>.bg-pink, bg-green</code></small> -->
                            </h2>
                            
                        </div>
                        <div class="body">
                        <form onsubmit="return validate(this);" action="<?= BASEURL; ?>/Kunjungan/updateverifikasimr" method="POST">
                            <div class="list-group">
                            <?php
                            $no=0;
                            foreach ($data['detstatus'] as $detstatus) : ?>
                                <div class="list-group-item">
                                    <?= $detstatus['outletname']; ?>  <h6><?= $detstatus['address']; ?>  </h6><h6><?= $detstatus['ket']; ?></h6>
                                   
                                    <?php
                                        if($detstatus['status']==1){
                                    ?>
                                            <h5>STATUS : <span class="label label-success">Visited</span></h5>
                                    <?php 
                                        }else{
                                            
                                    ?>
                                            <h5>STATUS : <span class="label label-danger">Not Visited</span></h5>
                                     <?php   } ?>
                                     <br>
                                    <!-- <div class="demo-checkbox">
                                        <input type="checkbox" id="<?= $detstatus['idvisit']; ?>" name="verifikasi[]" class="filled-in" value="visit"/>
                                            <label for="<?= $detstatus['idvisit']; ?>">APPROVE VISIT</label>

                                            <input type="checkbox" id="<?= $detstatus['idvisit']; ?>" name="verifikasi[]" class="filled-in" value="notvisit"/>
                                            <label for="<?= $detstatus['idvisit']; ?>">APPROVE VISIT</label>
                                    </div> -->
                                    <input type="hidden" name="idvisit[]" value="<?=  $detstatus['idvisit']; ?>">
                                    <div class="demo-radio-button">
                                        <input name="<?= 'status'.$no; ?>" type="radio" class="with-gap" id="app<?= $detstatus['idvisit']; ?>" value="visit" />
                                        <label for="app<?= $detstatus['idvisit']; ?>">APPROVE VISIT</label>

                                        <input name="<?= 'status'.$no; ?>" type="radio" id="not<?= $detstatus['idvisit']; ?>" class="with-gap" value="notvisit" />
                                        <label for="not<?= $detstatus['idvisit']; ?>">NOT APPROVE</label>
                                        
                                    </div>

                                </div>
                                
                            <?php 
                            $no++;
                            endforeach; ?>   
                            </div>
                           
                                <input type="hidden" name="no" value="<?= $no; ?>">
                                                                
                                <input type="checkbox" id="checkbox" name="terms" value="ok"/>
                                <label for="checkbox">Acceppt Data List</label>
                                <div class="button-demo">
                                
                                <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                    <a href="<?= BASEURL; ?>/Kunjungan/verifikasivisitmr"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>

                
                
</div>
            
            <!-- #END# List Example -->
<script type="text/javascript">

	function validate(form) {
		if(form.terms.checked==false) {
			alert('Please check Acceppt Data List');
			return false;
		}
		return true;
	}

</script>