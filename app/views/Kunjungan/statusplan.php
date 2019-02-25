<!-- List Example -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                STATUS VISIT PLAN
                                <!-- <small>You can also put badge to list and use the material design colors which example classes are <code>.bg-pink, bg-green</code></small> -->
                            </h2>
                            
                        </div>

                        

                        <div class="body">
                            <form action="<?= BASEURL; ?>/Kunjungan/statusPlan" method="POST">
                                <label for="segment">TAHUN</label>
                                <div class="form-group">
                                <div class="form-line">
                                        <select class="form-control show-tick" id="tahun" name="tahun">
                                            <option value="">-- Please select --</option>
                                            <?php foreach ($data['tahun'] as $tahun) : ?>
                                            <option value="<?= $tahun['tahun']; ?>"><?= $tahun['tahun']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <label for="segment">BULAN</label>
                                <div class="form-group">
                                <div class="form-line">
                                        <select class="form-control show-tick" id="bulan" name="bulan">
                                            <option value="">-- Please select --</option>
                                            <?php foreach ($data['bulan'] as $bulan) : ?>
                                            <option value="<?= $bulan['idmonth']; ?>"><?= $bulan['monthdesc']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                                                                                                        
                                <div class="button-demo">
                                    <button type="submit" class="btn btn-primary waves-effect">VIEW</button>
                                    <a href="<?= BASEURL; ?>/Kunjungan"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                </div>
                            </form><br>   
                            <div class="list-group">
                                <?php foreach ($data['statplan'] as $statplan) : ?>
                                <a href="<?= BASEURL; ?>/Kunjungan/detailstatus/<?= $statplan['tanggal'].'/'.$statplan['app_spv']; ?>" class="list-group-item">
                                    <?php if($statplan['app_spv']==0){ ?>
                                        <span class="badge bg-pink">Not Approve</span> 
                                    <?php }else{ ?>
                                        <span class="badge bg-teal">Approve</span>
                                    <?php } ?>
                                        <?= date('d F Y', strtotime($statplan['tanggal'])); ?>
                                </a>
                                

                                 <?php endforeach; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# List Example -->