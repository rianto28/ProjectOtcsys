<!-- Tabs With Icon Title -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA VISIT CUSTOMER
                            </h2>
                           
                        </div>
                        <div class="body">
                            <?php Flasher::flash(); ?>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="<?= $data['tpclassmonth']; ?>">
                                    <a href="#visitmonth" data-toggle="tab">
                                        <i class="material-icons">timeline</i> WEEKLY PLAN
                                    </a>
                                </li>
                                <li role="presentation" class="<?= $data['tpclassday']; ?>">
                                    <a href="#visitday" data-toggle="tab">
                                        <i class="material-icons">today</i> REPORT VISIT BY DAY
                                    </a>
                                </li>
                                <li role="presentation" class="<?= $data['tpclassout']; ?>">
                                    <a href="#messages_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">account_balance</i> REPORT VISIT BY OUTLET
                                    </a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane animated flipInX <?= $data['tpclassmonth']; ?>" id="visitmonth">
                                    <b><em>Report Visit By Month :</em></b>
                                    <p>
                                       <form action="<?= BASEURL; ?>/Kunreal/reportkun" method="POST">
                                             <input type="hidden" name="kodemr" value="<?= $data['mr']['kodeana'] ?>">    
                                             <input type="hidden" name="report" value="month">  

                                             <label for="month">WEEK</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" id="week" name="week">
                                                        <option value="">-- Please select --</option>
                                                        <?php foreach ($data['week'] as $week) : ?>
                                                            
                                                            <option value="<?= $week['idweekly']; ?>"><?= $week['description']; ?></option>
                                                            
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                                                                                                             
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
                                                <button type="submit" class="btn btn-primary waves-effect">VIEW</button>
                                                <a href="<?= BASEURL; ?>/Kunjungan"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                            </div>
                                        </form>
                                    </p>
                                    <?php if($_POST['month']<>""){ 
                                            $tpclass="active";    
                                    ?>
                                        <!-- List Example -->
                                        <div class="row clearfix">
                                                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2>
                                                                DATA WEEKLY PLAN
                                                                
                                                            </h2>
                                                        
                                                        </div>
                                                        <div class="body">
                                                        <div class="row clearfix">

                                                        <div class="body table-responsive">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr bgcolor="#F44336">
                                                                            
                                                                            <th><p class="font-bold col-white">TANGGAL</th>
                                                                            <th><p class="font-bold col-white">URUT</th>
                                                                            <th><p class="font-bold col-white">OUTLET NAME</th>
                                                                            <th><p class="font-bold col-white">KEGIATAN</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                        <?php 
                                                          $y = "";
                                                          $no = 1;
                                                          $x = 0;
                                                          foreach ($data['wpc'] as $wpc) : 
                                                        ?>

                                                            
                                                                        <tr>
                                                                            
                                                                            <?php if($y<>$wpc['tanggal']){ 
                                                                                    if($x<>1){
                                                                                        $x = 1;
                                                                                    }else{
                                                                                        $x = $x + 1;
                                                                                    }
                                                                            ?>
                                                                                    <td bgcolor="#009688" align="center">
                                                                                    <p class="font-bold col-white">
                                                                                    <?= date('d F Y', strtotime($wpc['tanggal'])) ;  ?></p></td>
                                                                                    
                                                                            <?php }else{ 
                                                                            
                                                                            ?>
                                                                                    <td>&nbsp;</td>
                                                                                    
                                                                            <?php } 
                                                                                $y=$wpc['tanggal'];
                                                                                if($x==2){
                                                                                    $no = 1;
                                                                                    $x = 0;
                                                                                }
                                                                            ?>
                                                                            
                                                                            <?php 
                                                                                if($no==1){
                                                                            ?>
                                                                                <td bgcolor="#009688"><p class="font-bold col-white"><?= $no; ?></td>
                                                                                <td bgcolor="#009688"><p class="font-bold col-white"><?= $wpc['outletname']; ?></td>
                                                                                <td bgcolor="#009688"><p class="font-bold col-white"><?= $wpc['ket']; ?></p></td>
                                                                            <?php }else{ ?>
                                                                                <td><?= $no; ?></td>
                                                                                <td><?= $wpc['outletname']; ?></td>
                                                                                <td><?= $wpc['ket']; ?></td>

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
                                            <!-- #END# List Example -->
                                        <?php }else{
                                            $tpclass="";
                                        } ?>

                                </div>
                                <div role="tabpanel" class="tab-pane animated flipInX <?= $data['tpclassday']; ?>" id="visitday">
                                   <b><em>Report Visit By Day :</em></b>
                                    <p>
                                       <form action="<?= BASEURL; ?>/Kunreal/reportkun" method="POST">
                                            <input type="hidden" name="kodemr" value="<?= $data['mr']['kodeana'] ?>">    
                                            <input type="hidden" name="report" value="day">                                                                                   
                                             <label for="outletcode">Visit Date</label>
                                            <div class="sample">
                                                <input type="text" name="tgl" data-beatpicker="true"/>
                                            
                                            </div>S/D
                                            <div class="sample">
                                                <input type="text" name="tgl2" data-beatpicker="true"/>
                                            
                                            </div><br>                                            


                                            
                                            <div class="button-demo">
                                                <button type="submit" class="btn btn-primary waves-effect">VIEW</button>
                                                <a href="<?= BASEURL; ?>/Kunjungan"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                            </div>
                                        </form>
                                    </p>

                                <?php if($_POST['tgl']<>""){ 
                                        $tpclas="active";
                                ?>
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
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #END# Bordered Table -->
                                 <?php }else{
                                     $tpclas="";
                                 } ?>
                                </div>
                                <div role="tabpanel" class="tab-pane animated flipInX <?= $data['tpclassout']; ?>" id="messages_with_icon_title">
                                    <b><em>Input MCL By Outlet Child :</em></b>
                                    <p>
                                       <form action="<?= BASEURL; ?>/mcl/tambah" method="POST">
                                             <input type="hidden" name="kodemr" value="<?= $data['mr']['kodeana'] ?>">    
                                             <input type="hidden" name="grupoutlet" value="child">                                                                                      
                                            <label for="outlet">Outlet Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" id="outlet" name="outlet">
                                                        <option value="">-- Please select --</option>
                                                        <?php foreach ($data['child'] as $child) : ?>
                                                            
                                                            <option value="<?= $child['outletid']; ?>"><?= $child['outletname']." &nbsp [".$child['address']."]"; ?></option>
                                                            
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
                                                <button type="submit" class="btn btn-primary waves-effect">VIEW</button>
                                                <a href="<?= BASEURL; ?>/Kunjungan"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
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
   