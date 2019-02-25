<!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD DATA MASTER CUSTOMER LIST (MCL) SUPERVISOR
                            </h2>
                           
                        </div>
                        <div class="body">
                            <?php Flasher::flash(); ?>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">home</i> OUTLET EXISTING
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">new_releases</i> OUTLET NOO
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#messages_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">child_friendly</i> OUTLET CHILD
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">assignment</i> OUTLET KUOTA
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane animated flipInX active" id="home_with_icon_title">
                                    <b><em>Input MCL By Master Outlet Existing :</em></b>
                                    <p>
                                       <form action="<?= BASEURL; ?>/mcl/tambahmclspv" method="POST">
                                             <input type="hidden" name="kodespv" value="<?= $data['mr']['kodeana'] ?>">    
                                             <input type="hidden" name="grupoutlet" value="exist">  
                                                                                                                             
                                            <label for="outlet">Outlet Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" id="outlet" name="outlet">
                                                        <option value="">-- Please select --</option>
                                                        <?php foreach ($data['outlet'] as $outlet) : ?>
                                                            
                                                            <option value="<?= $outlet['outletid']; ?>"><?= $outlet['outletname']." &nbsp [".$outlet['namacabang']."]"; ?></option>
                                                            
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="area">Area Outlet</label>
                                            <div class="form-group">
                                                <div class="demo-radio-button">
                                                     <input name="ket" type="radio" value="DK" id="radio_30" class="with-gap radio-col-red" checked /><label for="radio_30">Dalam Kota</label>
                                                     <input name="ket" type="radio" id="radio_39" class="with-gap radio-col-green" value="LK" />
                                                    <label for="radio_39">Luar Kota</label>
                                                </div>

                                            </div>

                                            
                                            <div class="button-demo">
                                                <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                                <a href="<?= BASEURL; ?>/mcl"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                            </div>
                                        </form>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane animated flipInX" id="profile_with_icon_title">
                                    <b><em>Input MCL By Outlet NOO :</em></b>
                                    <p>
                                       <form action="<?= BASEURL; ?>/mcl/tambahmclspv" method="POST">
                                            <input type="hidden" name="kodespv" value="<?= $data['mr']['kodeana'] ?>">    
                                             <input type="hidden" name="grupoutlet" value="exist">                                                                                     
                                            <label for="outlet">Outlet Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" id="outlet" name="outlet">
                                                        <option value="">-- Please select --</option>
                                                        <?php foreach ($data['noo'] as $noo) : ?>
                                                            
                                                            <option value="<?= $noo['outletid']; ?>"><?= $noo['outletname']." &nbsp [".$noo['namacabang']."]"; ?></option>
                                                            
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="area">Area Outlet</label>
                                            <div class="form-group">
                                                <div class="demo-radio-button">
                                                     <input name="ket" type="radio" value="DK" id="radio_1" class="with-gap radio-col-red" checked /><label for="radio_1">Dalam Kota</label>
                                                     <input name="ket" type="radio" id="radio_2" class="with-gap radio-col-green" value="LK" />
                                                    <label for="radio_2">Luar Kota</label>
                                                </div>

                                            </div>


                                            
                                            <div class="button-demo">
                                                <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                                <a href="<?= BASEURL; ?>/mcl"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                            </div>
                                        </form>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane animated flipInX" id="messages_with_icon_title">
                                    <b><em>Input MCL By Outlet Child :</em></b>
                                    <p>
                                       <form action="<?= BASEURL; ?>/mcl/tambahmclspv" method="POST">
                                             <input type="hidden" name="kodespv" value="<?= $data['mr']['kodeana'] ?>">    
                                             <input type="hidden" name="grupoutlet" value="child">                                                                                      
                                            <label for="outlet">Outlet Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" id="outlet" name="outlet">
                                                        <option value="">-- Please select --</option>
                                                        <?php foreach ($data['child'] as $child) : ?>
                                                            
                                                            <option value="<?= $child['outletid']; ?>"><?= $child['outletname']." &nbsp [".$child['namacabang']."]"; ?></option>
                                                            
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="area">Area Outlet</label>
                                            <div class="form-group">
                                                <div class="demo-radio-button">
                                                     <input name="ket" type="radio" value="DK" id="radio_3" class="with-gap radio-col-red" checked /><label for="radio_3">Dalam Kota</label>
                                                     <input name="ket" type="radio" id="radio_4" class="with-gap radio-col-green" value="LK" />
                                                    <label for="radio_4">Luar Kota</label>
                                                </div>

                                            </div>


                                            
                                            <div class="button-demo">
                                                <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                                <a href="<?= BASEURL; ?>/mcl"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                            </div>
                                        </form>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane animated flipInX" id="settings_with_icon_title">
                                    <b><em>Input MCL By Outlet Kuota :</em></b>
                                    <p>
                                       <form action="<?= BASEURL; ?>/mcl/tambahmclspv" method="POST">
                                             <input type="hidden" name="kodemr" value="<?= $data['mr']['kodeana'] ?>">    
                                             <input type="hidden" name="grupoutlet" value="kuota">                                                                                      
                                            <label for="outlet">Outlet Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" id="outlet" name="outlet">
                                                        <option value="">-- Please select --</option>
                                                        <?php foreach ($data['kuota'] as $kuota) : ?>
                                                            
                                                            <option value="<?= $kuota['outletid']; ?>"><?= $kuota['outletname']." &nbsp [".$kuota['namacabang']."]"; ?></option>
                                                            
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="area">Area Outlet</label>
                                            <div class="form-group">
                                                <div class="demo-radio-button">
                                                     <input name="ket" type="radio" value="DK" id="radio_5" class="with-gap radio-col-red" checked /><label for="radio_5">Dalam Kota</label>
                                                     <input name="ket" type="radio" id="radio_6" class="with-gap radio-col-green" value="LK" />
                                                    <label for="radio_6">Luar Kota</label>
                                                </div>

                                            </div>


                                            
                                            <div class="button-demo">
                                                <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                                <a href="<?= BASEURL; ?>/mcl"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                            </div>
                                        </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->

 
            <!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA MCL
                                <small>Data Mcl ini <code>TIDAK AKAN TAMPIL</code> di Master MCL, jika belum disetujui Pusat</small>
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
                                        <th>BRANCH NAME</th>
                                        <th>OUTLET NAME</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($data['mcl'] as $mcl) : 
                                        
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $mcl['outletcode']; ?></td>
                                        <td><?= $mcl['namacabang']; ?></td>
                                        <td><?= $mcl['outletname']; ?></td>
                                        
                                        
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