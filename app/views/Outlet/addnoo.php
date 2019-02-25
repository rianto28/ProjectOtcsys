 <!-- Vertical Layout -->
            <div class="row clearfix" id="formUser">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD DATA NEW OPEN OUTLET (NOO)
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <?php Flasher::flash(); ?>
                            <form action="<?= BASEURL; ?>/outlet/tambahnoo" method="POST">
                            	                                                                                             
                                <label for="outletname">Outlet Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="outletname" name="outletname" class="form-control" placeholder="Enter Outlet Name" style="text-transform:uppercase">
                                    </div>
                                </div>
                                <label for="outletcode">Outlet Code</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="outletcode" name="outletcode" class="form-control" placeholder="Enter Outlet Code KP (If There is)" style="text-transform:uppercase">
                                    </div>
                                </div>
                                <label for="outletaddress">Outlet Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="outletaddress" name="outletaddress" class="form-control" placeholder="Enter Outlet Address" style="text-transform:uppercase">
                                    </div>
                                </div>
                                <label for="segment">Segment</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="segment" name="segment">
                                            <option value="">-- Please select --</option>
                                            <?php foreach ($data['segment'] as $segment) : ?>
                                                
                                                <option value="<?= $segment['kodesegment']; ?>"><?= $segment['segment']; ?></option>
                                                
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                
                                <div class="button-demo">
                                	<button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                	<a href="<?= BASEURL; ?>/outlet"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
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
                                DATA NEW OPEN OUTLET
                               
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>OUTLET CODE</th>
                                        <th>OUTLET NAME</th>
                                        <th>ADDRESS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($data['noo'] as $noo) : 
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $noo['outletcode']; ?></td>
                                        <td><?= $noo['outletname']; ?></td>
                                        <td><?= $noo['address']; ?></td>
                                        <td><a href="<?= BASEURL; ?>/outlet/deletenoo/<?= $noo['outletid']; ?>" onclick="return confirm('Are You Sure Delete Data Outlet ?');"><button type="button" class="btn bg-red m-t-15 waves-effect">Delete</button></a></td>
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