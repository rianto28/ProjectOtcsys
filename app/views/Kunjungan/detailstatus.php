<!-- List Example -->
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
                            <div class="list-group">
                            <?php foreach ($data['detstatus'] as $detstatus) : ?>
                                <div class="list-group-item">
                                    <?= $detstatus['outletname']; ?>  <h6><?= $detstatus['address']; ?>  </h6><h6><?= $detstatus['ket']; ?></h6>
                                </div>
                            <?php endforeach; ?>   
                            </div>
                            <div class="button-demo">
                            <?php if($data['status']==1){ ?>
                            <a href="http://192.168.1.28:8080/otcsys01/app/views/laporan/cetakform.php?tgl=<?= $data['tanggal'].'&&id='.$data['user']; ?>" target= "_blank"><button type="button" class="btn bg-primary waves-effect">
                                    <i class="material-icons">print</i>&nbsp;CETAK
                            </button></a>
                            <?php } ?>
                                <a href="<?= BASEURL; ?>/Kunjungan/statusplan"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                
</div>
            
            <!-- #END# List Example -->