<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <a href="<?= BASEURL; ?>/Kunjungan/addPlan">
                                        <button class="btn bg-green btn-lg btn-block waves-effect" type="button">
                                            <i class="material-icons">border_color</i>&nbsp;&nbsp;INPUT PLAN 
                                        </button>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <a href="<?= BASEURL; ?>/Kunjungan/Statusplan">
                                                    <button class="btn bg-red btn-lg btn-block waves-effect" type="button">
                                                        <i class="material-icons">event_available</i>&nbsp;&nbsp;STATUS PLAN 
                                                    </button>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <a href="<?= BASEURL; ?>/Kunreal/Reportkun">
                                                <button class="btn bg-orange btn-lg btn-block waves-effect" type="button">
                                                    <i class="material-icons">receipt</i>&nbsp;&nbsp;VISIT REPORT 
                                                </button>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <a href="<?= BASEURL; ?>/Kunreal">
                                                <button class="btn bg-blue btn-lg btn-block waves-effect" type="button">
                                                    <i class="material-icons">content_paste</i>&nbsp;&nbsp;REKAP VISIT 
                                                </button>
                                    </a>
                                </div>
                                
                                

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- List Example --> 
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VISIT SUMMARY 
                               <!--  <small>You can also put badge to list and use the material design colors which example classes are <code>.bg-pink, bg-green</code></small> -->
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-pink"><?= $data['mclnon']['jmcl']; ?> Outlet</span> Jumlah Outlet MCL Yang BELUM DISETUJUI<br><br>Outlet Dalam Kota<span class="badge bg-pink"><?= $data['mclnondk']['jmcl']; ?></span><br>Outlet Luar Kota <span class="badge bg-pink"><?= $data['mclnonlk']['jmcl']; ?></span>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-cyan"><?= $data['mcl']['jmcl']; ?> Outlet</span>Jumlah Outlet MCL Yang Sudah DISETUJUI<br><br>Outlet Dalam Kota<span class="badge bg-cyan"><?= $data['mcldk']['jmcl']; ?></span><br>Outlet Luar Kota <span class="badge bg-cyan"><?= $data['mcllk']['jmcl']; ?></span>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-teal"><?php 
                                    $totmcl = $data['mcl']['jmcl'] + $data['mclnon']['jmcl'];
                                    echo $totmcl;?> Outlet</span>TOTAL OUTLET MCL
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-orange"><?= $data['plan']['jplan']; ?> Outlet</span>Plan Kunjungan
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-purple"><?= $data['visit']['jvisit']; ?> Outlet</span>Realisasi Kunjungan
                                </a>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
            <!-- #END# List Example