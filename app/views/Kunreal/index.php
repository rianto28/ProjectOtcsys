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
                                
                                <form action="<?= BASEURL; ?>/Kunreal" method="POST">
                                    <div id="simple" class="demo">
                                    <label for="mr">OTC Ref</label>
                                    <select class="form-control show-tick" name="mr" id="mr">
                                        <option value="">-- Please select --</option>
                                        <?php foreach ($data['mr'] as $mr) : ?>
                                            <?php if ($mr['kodemr']==$_POST['mr']){ ?>
                                                <option value="<?= $mr['kodemr']; ?>" selected><?= $mr['namamr']; ?></option>
                                            <?php }else{  ?>
                                                <option value="<?= $mr['kodemr']; ?>"><?= $mr['namamr']; ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="tgl">Week</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id="tgl" name="week">
                                                    <option value="">-- Please select Date --</option>
                                                    <?php foreach ($data['week'] as $week) : ?>
                                                        
                                                        <option value="<?= $week['idweekly']; ?>"><?= $week['description'];  ?></option>
                                                        
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div><br>
                                    <label for="month">MONTH</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <select class="form-control show-tick" data-live-search="true" id="month" name="month">
                                                                        <option value="">-- Please select --</option>
                                                                        <?php foreach ($data['month'] as $month) : ?>
                                                                            
                                                                            <option value="<?= $month['idmonth']; ?>"><?= $month['monthdesc']; ?></option>
                                                                            
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                            <label for="year">YEAR</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" id="outlet" name="year">
                                                        <option value="">-- Please select --</option>
                                                        <?php foreach ($data['year'] as $year) : ?>
                                                            
                                                            <option value="<?= $year['tahun']; ?>"><?= $year['tahun']; ?></option>
                                                            
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>                               
                                                                           
                                                                
                                <div class="button-demo">
                                    <button type="submit" class="btn btn-primary waves-effect">VIEW VISIT</button>
                                    <a href="<?= BASEURL; ?>/Kunreal/reportkunspv"><button type="button" class="btn bg-green waves-effect">VIEW REPORT VISIT</button></a>
                                    <a href="<?= BASEURL; ?>/Kunjunganspv"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
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
                                        <th>NAMA OTC REF</th>
                                        <th>TANGGAL</th>
                                        <th>&nbsp;</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($data['tvisit'] as $real) : 
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $real['namamr']; ?></td>
                                        <td><?= date('d F Y', strtotime($real['tanggal'])); ?></td>
                                        <td><a href="<?= BASEURL; ?>/Kunreal/tampilkun/<?= $real['kodemr']; ?>/<?= $real['tanggal']; ?>" <button class="btn btn-primary waves-effect">CONFIRM</button></a></td>

                                    </tr>

                                    <?php 
                                        $no++;
                                        endforeach; 
                                    ?>
                                </tbody>
                            </table>
                                
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Bordered Table -->