                    <div class="card">
                        <div class="header">
                            <h2>
                                DAILY VISIT PERIOD : <?= date('d F Y', strtotime($data['tanggal'])); ?>
                                <br><br>NAMA MR : <?= $data['mr']['namamr']; ?>
                                <small>Jika Outlet dikunjungi silahkan anda isi ceklis...!</small>
                            </h2>
                            
                        </div>
                        <form action="<?= BASEURL; ?>/Kunreal/confreal" method="POST">
                        <div class="body">
                            <ul class="list-group">
                                <?php 
                                $no=1;
                                foreach ($data['real'] as $real) : ?>
                                <input type="hidden" name="<?= "id".$no; ?>" value="<?= $real['idvisit']; ?>">
                                
                                <li class="list-group-item"><?= $no.". ".$real['outletname']."  // Activity => ".$real['ket'];?>
                                
                                <span class="badge bg-red">
                                <input type="checkbox" id="<?= $no; ?>" class="filled-in" name="<?= "cek".$no; ?>" />
                                <label for="<?= $no; ?>">Visited</label>
                                </span></li>
                                <?php 
                                $no++;
                                endforeach; 
                                $x=$no-1;
                                ?>
                                <input type="hidden" name="total" value="<?= $x; ?>" >
                            </ul>
                            <small>Dengan Menekan tombol SAVE, berarti anda setuju untuk melakukan approve realisasi kunjungan</small><br><br>
                            <div class="button-demo">
                                    <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                                    <a href="<?= BASEURL; ?>/Kunreal"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a>
                            </div>
                        </div>
                        
                        </form>
                        
                    </div>
                    