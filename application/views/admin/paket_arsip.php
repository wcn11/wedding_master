<main class="container pt-5 ">
          <h1>Galeri</h1>
        <div class="table-responsive">
        <table class="table table-lg">
            <thead class="table-info">
                <tr>
                    <th><center> Thumbnail </center></th>
                    <th><center> Option </center></th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($galeri as $g){ ?>
                <tr>
                    <td><img src="<?php echo base_url().'assets/gambar/galeri/'.$g->id_galeri.'/'.$g->thumbnail ?>"></td>
                    <td>
                      <?php echo anchor("Admin/hapus_galeri/".$g->id_galeri, "<button class='btn btn-outline-danger btn-rounded'>hapus</button>") ?>
                    </td>
                </tr>

            </tbody>
              <?php } ?>
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
                    <form action="<?php echo base_url('admin/add_galeri') ?>" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <!-- form  -->

                      <div class="form-group">
                        
                          <div class="col-xs-6">
                              <label for="thumbnail"><h4>Thumbnail</h4></label>
                              <input type="file" class="form-control" name="thumbnail"title="Masukkan gambar" >
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

