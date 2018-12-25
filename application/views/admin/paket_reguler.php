<main class="container pt-5 ">
          <h1>Daftar paket reguler</h1>
        <div class="table-responsive">
        <table class="table table-lg">
            <thead class="table-info">
                <tr>
                    <th><center> Id paket </center></th>
                    <th><center> Nama paket </center></th>
                    <th><center> Class </center></th>
                    <th><center> Harga </center></th>
                    <th><center> Deskripsi </center></th>
                    <th><center> Tag </center></th>
                    <th><center> Option </center></th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($reguler as $reguler){ ?>
                <tr>
                    <td><center> <?php echo $reguler->id ?> </center></td>
                    <td><center> <?php echo $reguler->nama_paket ?> </center></td>
                    <td><?php echo $reguler->class ?></td>
                    <td><?php echo $reguler->harga ?></td>
                    <td><?php echo $reguler->deskripsi ?></td>
                    <td><?php echo $reguler->tag ?></td>
                    <td colspan="2">
                      <button class="btn btn-outline-info btn-rounded" data-toggle="modal" data-target="#modal-edit-paket-regular<?php echo $reguler->id ?>">edit</button> |
                      <?php echo anchor("Admin/hapus_paket_reguler/".$reguler->id, "<button class='btn btn-outline-danger btn-rounded'>hapus</button>") ?>
                      <!--modal edit -->
                        <div class="modal fade" id="modal-edit-paket-regular<?php echo $reguler->id ?>" role="dialog">
                            <div class="modal-dialog">
                                
                                <div class="modal-content"> 
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit paket <?php echo $reguler->id ?></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                        <form action="<?php echo base_url('admin/edit_paket_reguler/'.$reguler->id) ?>" method="post">

                                    <div class="modal-body">
                                        <!-- form  -->
                                          <div class="form-group">
                                            
                                              <div class="col-xs-6">
                                                  <label for="nama_lengkap"><h4>Nama paket</h4></label>
                                                  <input type="text" class="form-control" name="nama_paket" placeholder="Nama paket" title="Masukkan nama paket" value="<?php echo $reguler->nama_paket ?>">
                                              </div>
                                          </div>

                                          <div class="form-group">
                                            
                                              <div class="col-xs-6">
                                                  <label for="harga"><h4>Class</h4></label>
                                                  <input type="text" class="form-control" name="class" placeholder="Class" title="Masukkan class" value="<?php echo $reguler->class ?>">
                                              </div>
                                          </div>

                                          <div class="form-group">
                                            
                                              <div class="col-xs-6">
                                                  <label for="harga"><h4>Harga</h4></label>
                                                  <input type="text" class="form-control" name="harga" placeholder="Harga" title="Masukkan harga" value="<?php echo $reguler->harga ?>">
                                              </div>
                                          </div>

                                          <div class="form-group">
                                            
                                              <div class="col-xs-6">
                                                  <label for="deskripsi"><h4>Deskripsi</h4></label>
                                                  <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" title="Masukkan deskripsi" value="<?php echo $reguler->deskripsi ?>">
                                              </div>
                                          </div>   

                                          <div class="form-group">
                                            
                                              <div class="col-xs-6">
                                                  <label for="tag"><h4>Tag</h4></label>
                                                  <input type="text" class="form-control" name="tag" placeholder="Masukkan tag" title="Masukkan tag" value="<?php echo $reguler->tag ?>">
                                              </div>
                                          </div>          
                                        </div>
                                         <div class="modal-footer">
                                          <button type="submit" name="submit" class="btn btn-info"><i class="glyphicon glyphicon-ok-sign"></i> Simpan perubahan</button>
                                          <div class="form-group">
                                    </div>
                                    </form> 
                                </div>
                            </div>
                        </div> <!--end modal edit -->
                        </td>

                </tr>
              <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th colspan="6">
                        <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#modal-paket-regular">Tambah paket</button>
                    </th>
                </tr>
            </tfoot>
        </table>
      </div>
    </main>

    <!--modal tambah -->
    <div class="modal fade" id="modal-paket-regular" role="dialog">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah paket</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <form action="<?php echo base_url('admin/tambah_paket_reguler') ?>" method="post">

                <div class="modal-body">
                    <!-- form  -->
                      <div class="form-group">
                        
                          <div class="col-xs-6">
                              <label for="nama_lengkap"><h4>Nama paket</h4></label>
                              <input type="text" class="form-control" name="nama_paket" placeholder="Nama paket" title="Masukkan nama paket" >
                          </div>
                      </div>

                      <div class="form-group">
                        
                          <div class="col-xs-6">
                              <label for="harga"><h4>Class</h4></label>
                              <input type="text" class="form-control" name="class" placeholder="Class" title="Masukkan class" >
                          </div>
                      </div>

                      <div class="form-group">
                        
                          <div class="col-xs-6">
                              <label for="harga"><h4>Harga</h4></label>
                              <input type="text" class="form-control" name="harga" placeholder="Harga" title="Masukkan harga" >
                          </div>
                      </div>

                      <div class="form-group">
                        
                          <div class="col-xs-6">
                              <label for="deskripsi"><h4>Deskripsi</h4></label>
                              <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" title="Masukkan deskripsi" >
                          </div>
                      </div>   

                      <div class="form-group">
                        
                          <div class="col-xs-6">
                              <label for="tag"><h4>Tag</h4></label>
                              <input type="text" class="form-control" name="tag" placeholder="Masukkan tag" title="Masukkan tag" >
                          </div>
                      </div>          
                    </div>
                     <div class="modal-footer">
                      <button type="submit" name="submit" class="btn btn-info"><i class="glyphicon glyphicon-ok-sign"></i> Simpan perubahan</button>
                      <div class="form-group">
                </div>
                </form> 
            </div>
        </div>
    </div> <!--end modal tambah -->

