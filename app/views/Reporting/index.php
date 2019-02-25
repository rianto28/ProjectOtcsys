<div class="card">
    <div class="header">
        <h2>
            Weekly Plan <small>Reporting Weekly plan MR</small>
        </h2>
                            
    </div>
    <div class="body">
                            </p>
                                <form action="<?= BASEURL; ?>/Reporting" method="POST">
                                             <input type="hidden" name="kodemr" value="<?= $data['mr']['kodeana'] ?>">    
                                             <input type="hidden" name="report" value="month">  
                                            
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
                                    </p><br>

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


    </div>
</div>