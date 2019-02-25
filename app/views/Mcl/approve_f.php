<!-- Select -->
             <?php Flasher::flash(); ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                APPROVE MCL
                                <small>Pilih Nama MR Terlebih dahulu untuk menampilkan data MCL</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                             <form action="<?= BASEURL; ?>/mcl/approve" method="POST">
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
                                </div>
                               
                                <button type="submit" class="btn btn-primary waves-effect">VIEW</button>
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
                                    DATA MCL
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
                                                <th>Outlet Code</th>
                                                <th>Outlet Name</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($data['mcl'] as $mcl) : ?>

                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $mcl['namamr']; ?></td>
                                                <td><?= $mcl['outletcode']; ?></td>
                                                <td><?= $mcl['outletname']; ?></td>
                                                <?php if($mcl['status']==0){ ?>
                                                    <td align="center"><a href="<?= BASEURL; ?>/mcl/setapprove/<?= $mcl['idmcl']; ?>" class="label label-danger" onclick="return confirm('Are You Sure Approve MCL ?');">Set Approve</a></td>
                                                <?php }else{ ?>
                                                    <td align="center"><span class="label label-success">MCL Active</span></td>
                                                <?php } ?>
                                            </tr>

                                            <?php 
                                            $no++;
                                            endforeach; 
                                            ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                <a href="<?= BASEURL; ?>/mcl/setapproveall"><button type="button" class="btn btn-primary waves-effect mb-3">Set Approve All</button></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- #END# Basic Examples -->
     
