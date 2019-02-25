<!-- List Example -->
<?php Flasher::flash(); ?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                WEEKLY PLAN <?= $data['month']; ?>-<?= $data['year']; ?> (MINGGU KE -  <?= $data['week'].")"; ?>
                                <!-- <small>You can also put badge to list and use the material design colors which example classes are <code>.bg-pink, bg-green</code></small> -->
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="list-group">
                            <?php foreach ($data['detperiode'] as $detperiode) : ?>
                                <div class="list-group-item">
                                    <h5><?= date('d F Y', strtotime($detperiode['tanggal'])); ?></h5>  

                                   
                                    <ol>
                                        <?php 
                                        $x="";
                                        foreach ($data['detstatus'] as $detstatus) : ?>

                                        <?php 
                                            
                                           if($detperiode['tanggal']<>$detstatus['tanggal']){ 
                                                // break;
                                           }else{
                                        ?>
                                            <li><?= $detstatus['outletname']." => ".$detstatus['ket']; ?></li>

                                           <?php } ?>
                                                
                                     
                                    <?php 
                                    
                                    endforeach; ?>
                                    </ol>
                                </div>
                            <?php endforeach; ?>   
                            </div>
                            <form action="<?= BASEURL; ?>/Kunjunganspv/appvisitmr" method="POST">
                                <input type="hidden" name="kodemr" value="<?= $data['kode']; ?>">
                                <input type="hidden" name="month" value="<?= $data['month']; ?>">
                                <input type="hidden" name="year" value="<?= $data['year']; ?>">
                                <input type="hidden" name="week" value="<?= $data['week']; ?>">
                                <div class="demo-checkbox">
                                <input type="checkbox" id="basic_checkbox_2" name="approve" class="filled-in"/>
                                        <label for="basic_checkbox_2">APPROVE PLAN</label>
                                </div>
                                <br>
                                <div class="button-demo">
                                
                                <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                    <a href="<?= BASEURL; ?>/Kunjunganspv/appplanmr"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>

                
                
</div>
            
            <!-- #END# List Example -->