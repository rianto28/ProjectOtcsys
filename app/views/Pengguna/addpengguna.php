 <!-- Vertical Layout -->
            <div class="row clearfix" id="formUser">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD DATA USER
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <form action="<?= BASEURL; ?>/pengguna/tambah" method="POST">
                            	<label for="fullname">Full Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fullname" name="nama" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                                <label for="username">User Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your email address">
                                    </div>
                                </div>
                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                    </div>
                                </div>
                                 <label for="levelaccess">Level Access</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="levelaccess" name="levelaccess">
	                                        <option value="">-- Please select --</option>
	                                        <option value="MR">MR</option>
	                                        <option value="SPV">SPV</option>
	                                        <option value="Admsupport">Admin Support</option>
	                                        <option value="Finance">Finance</option>
	                                        <option value="SM">SM</option>
	                                        <option value="PM">PM</option>
	                                        <option value="Direktur">Direktur</option>
	                                        <option value="Admin">IT</option>
                                    	</select>
                                    </div>
                                </div>

                                <label for="branch">Branch</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="branch" name="branch">
                                        	<option value="">-- Please select --</option>
                                        	<?php foreach ($data['branch'] as $branch) : ?>
		                                        
		                                        <option value="<?= $branch['kodecabang']; ?>"><?= $branch['namacabang']; ?></option>
		                                        
		                                    <?php endforeach; ?>
                                    	</select>
                                    </div>
                                </div>

                                <label for="fotoname">Foto Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fotoname" name="fotoname" class="form-control" placeholder="Enter Foto Name ex : fotoname.jpg">
                                    </div>
                                </div>

                                <div class="button-demo">
                                	<button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                	<a href="<?= BASEURL; ?>/pengguna"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                            	</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->