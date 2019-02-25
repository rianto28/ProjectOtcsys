


<div class="row clearfix" id="formUser">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD VISIT REAL
                            </h2>
                            
                        </div>
                        <div class="body">
                            <?php Flasher::flash(); ?>
                                
                                <form action="<?= BASEURL; ?>/Kunreal/tampilkun" method="POST">
                                    <div id="simple" class="demo">
                                        <label for="outletcode">Visit Date</label>
                                        <div class="sample">
                                            <input type="text" name="tgl" data-beatpicker="true"/>
                                           
                                        </div>
                                    </div><br>
                                                                  
                                                                           
                                                                
                                <div class="button-demo">
                                    <button type="submit" class="btn btn-primary waves-effect">VIEW</button>
                                    <a href="<?= BASEURL; ?>/Kunreal"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
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
                                        <th>REALISASI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($data['real'] as $real) : 
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= date('d F Y', strtotime($real['tanggal'])); ?></td>
                                        <td><?= $real['outletcode']; ?></td>
                                        <td><?= $real['outletname']; ?></td>
                                        <td align="center"><?= $real['ket']; ?></td>
                                        <?php 
                                            if($real['status']==0){
                                        ?>
                                        <td><a href="<?= BASEURL; ?>/Kunreal/confreal/<?= $real['idvisit']; ?>" onclick="return confirm('Really you have visited ?');" ?><button class="btn btn-primary waves-effect" data-type="confirm">CONFIRM</button></a></td>
                                        <?php
                                            }else{
                                           
                                        ?>

                                             <td><button class="btn btn-success waves-effect" data-type="confirm">VISITED</button></a></td>

                                        <?php } ?>



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