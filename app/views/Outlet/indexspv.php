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
                            <form action="<?= BASEURL; ?>/outlet/outallspv" method="POST">
                            <label for="branch">Branch</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="branch" name="branch">
                                            <option value="">-- Please select --</option>
                                            <?php foreach ($data['branch'] as $branch) : ?>                                          
                                                <option value="<?= $branch['branchcode']; ?>"><?= $branch['namacabang']; ?></option>
                                                
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="button-demo">
                                        <button type="submit" class="btn btn-primary waves-effect">VIEW</button>
                                        
                                </div>
                             </form>
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