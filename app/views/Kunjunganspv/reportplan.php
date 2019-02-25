<!-- Select -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REPORT PLAN SUPERVISOR
                               
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form action="<?= BASEURL; ?>/Kunreal" method="POST">
                                <div class="row clearfix">
                                    <div class="col-sm-4">
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
                                    </div>
                                    <div class="col-sm-4">
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

                                    </div>
                                    <div class="col-sm-4">
                                                <div class="button-demo">
                                                    <button type="submit" class="btn btn-primary waves-effect">VIEW</button>
                                                    <a href="<?= BASEURL; ?>/Kunjunganspv"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                                                </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Select -->