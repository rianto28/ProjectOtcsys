<!-- Select -->
<?php Flasher::flash(); ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VERIFIKASI VISIT MR
                                <small>Pilih Nama MR Terlebih dahulu untuk menampilkan data Visit</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                             <form action="<?= BASEURL; ?>/Kunjungan/verifikasivisitmr" method="POST">
                                    <label for="mr">OTC Ref</label>
                                    <div class="form-group">
                                        <div class="form-line">
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
                                        </div>
                                    </div>
                                    <label for="month">Month</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" data-live-search="true" id="month" name="month" id="month">
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
                                    <button type="submit" class="btn btn-primary waves-effect">VIEW</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Select -->
                <!-- Basic Examples --> 
                
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    DATA VISIT
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                   
                                </ul>
                            </div>
                            <div class="body">
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>OTC Name</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($data['plan'] as $plan) : ?>

                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $plan['namamr']; ?></td>
                                                <td><?= date('d F Y', strtotime($plan['tanggal'])); ?></td>
                                                <?php if($plan['stat_verifikasi']==0){ ?>
                                                    <td align="center"><a href="<?= BASEURL; ?>/Kunreal/detailvisitmr/<?= $plan['tanggal']; ?>/<?= $plan['kodemr']; ?>" class="label label-danger">Set Verifikasi</a></td>
                                                <?php }else{ ?>
                                                    <td align="center"><span class="label label-success">Verificated</span></td>
                                                <?php } ?>
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
                </div>
        
                <!-- #END# Basic Examples -->
     
