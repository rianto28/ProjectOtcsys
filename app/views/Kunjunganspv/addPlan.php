


<div class="row clearfix" id="formUser">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD VISIT PLAN SUPERVISOR
                            </h2>
                            
                        </div>
                        <div class="body">
                            <?php Flasher::flash(); ?>
                                
                                <form action="<?= BASEURL; ?>/Kunjunganspv/tambahplan" method="POST">
                                    <input type="hidden" name="kodespv" value="<?= $data['mr']['kodeana'] ?>">
                                    <div id="simple" class="demo">
                                        <label for="outletcode">Visit Date</label>
                                        <div class="sample">
                                            <input type="text" name="tgl" data-beatpicker="true"/>
                                           
                                        </div>
                                    </div><br>
                                                                  
                                            <label for="outlet">Outlet Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" id="outlet" name="outlet">
                                                        <option value="">-- Please select --</option>
                                                        <?php foreach ($data['outlet'] as $outlet) : ?>
                                                            
                                                            <option value="<?= $outlet['outletid']; ?>"><?= $outlet['outletname']." &nbsp [".$outlet['address']."]"; ?></option>
                                                            
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="ket">Note (Visit Activity)</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="ket" name="ket" class="form-control" placeholder="Enter Note">
                                                </div>
                                            </div>


                                
                                                                
                                <div class="button-demo">
                                    <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
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
                                        <th>TANGGAL</th>
                                        <th>OUTLET CODE</th>
                                        <th>OUTLET NAME</th>
                                        <th>NOTE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($data['plan'] as $plan) : 
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= date('d F Y', strtotime($plan['tanggal'])); ?></td>
                                        <td><?= $plan['outletcode']; ?></td>
                                        <td><?= $plan['outletname']; ?></td>
                                        <td><?= $plan['ket']; ?></td>
                                        <td><a href="<?= BASEURL; ?>/Kunjunganspv/deleteplan/<?= $plan['idvisit']; ?>" onclick="return confirm('Are You Sure Delete Data Plan ?');"><button type="button" class="btn bg-red m-t-15 waves-effect">Delete</button></a></td>
                                    </tr>

                                    <?php 
                                        $no++;
                                        endforeach; 
                                    ?>
                                </tbody>
                            </table>
                            <a href="<?= BASEURL; ?>/Kunjunganspv/sendplan">
                            <button type="submit" class="btn btn-primary waves-effect">SEND VISIT PLAN</button>
                             </a>       
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Bordered Table -->