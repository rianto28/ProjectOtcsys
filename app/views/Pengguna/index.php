<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA USER
                            </h2>

                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <?php Flasher::flash(); ?>
                            <a href="<?= BASEURL; ?>/pengguna/addpengguna"><button type="button" class="btn bg-light-blue waves-effect">TAMBAH USER</button></a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>User Name</th>
                                            <th>Password</th>
                                            <th>Level Access</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach ($data['datauser'] as $user) : ?>

                                        <tr>
                                            <td><?= $user['nama']; ?></td>
                                            <td><?= $user['username']; ?></td>
                                            <td><?= $user['password']; ?></td>
                                            <td><?= $user['level']; ?></td>
                                            <td><a href="<?= BASEURL; ?>/pengguna/delete/<?= $user['userid']; ?>" onclick="return confirm('Are You Sure Delete Data User ?');"><button type="button" class="btn bg-red m-t-15 waves-effect">Delete</button></a></td>
                                        </tr>

                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

           