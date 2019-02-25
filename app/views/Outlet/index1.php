<!-- Basic Examples --> 
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA MASTER OUTLET
                            </h2>
                            <ul class="header-dropdown m-r--5">
                               
                            </ul>
                        </div>
                        <div class="body">
                            <div class="button-demo">
                            <a href="<?= BASEURL; ?>/outlet/addnoo"><button type="button" class="btn bg-light-blue waves-effect">TAMBAH OUTLET NOO</button></a>
                                 <a href="<?= BASEURL; ?>/outlet/addchild"><button type="button" class="btn bg-light-blue waves-effect">TAMBAH OUTLET CHILD</button></a><br>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Branch</th>
                                            <th>Outlet Code</th>
                                            <th>Outlet Name</th>
                                            <th>Address</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
                                        $no=1;
                                        foreach ($data['outlet'] as $outlet) : ?>

                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $outlet['namacabang']; ?></td>
                                            <td><?= $outlet['outletcode']; ?></td>
                                            <td><?= $outlet['outletname']; ?></td>
                                            <td><?= $outlet['address']; ?></td>
                                            
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
            <!-- #END# Basic Examples