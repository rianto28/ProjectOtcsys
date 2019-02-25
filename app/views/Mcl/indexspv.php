<!-- Basic Examples --> 
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA MASTER CUSTOMER LIST (MCL) SUPERVISOR
                            </h2>
                            <ul class="header-dropdown m-r--5">
                               
                            </ul>
                        </div>
                        <div class="body">
                        	                	
                        	<div class="button-demo">
                        	<a href="<?= BASEURL; ?>/mcl/addmclspv"><button type="button" class="btn bg-light-blue waves-effect">TAMBAH MCL</button></a><br>
                        	</div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Branch Name</th>
                                            <th>Outlet Code</th>
                                            <th>Outlet Name</th>
                                            <th>Address</th>
                                            <th>Status</th>          
                                        </tr>
                                    </thead>
                                    <tbody>                              	
                                    	<?php 
                                        $no=1;
                                        foreach ($data['mcl'] as $mcl) : 
                                        if($mcl['status']==0){
                                            $color="label label-danger";
                                            $pesan="Not Active";
                                        }else{
                                            $color="label label-success";
                                            $pesan="Active";
                                        }
                                        ?>

                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $mcl['outletid']; ?></td>
                                            <td><?= $mcl['outletcode']; ?></td>
                                            <td><?= $mcl['outletname']; ?></td>
                                            <td><?= $mcl['address']; ?></td>
                                            <td align="center">
                                            <span class="<?= $color; ?>"><?= $pesan; ?></span> 
                                            </td>                                           
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