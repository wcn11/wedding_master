<?php if($this->session->userdata('pesan_error_gambar') == "error"){ ?>
  <script type="text/javascript">
    alert("Maksimal ukuran file gambar yang bisa di upload adalah 4mb.");
  </script>
<?php unset($_SESSION['pesan_error_gambar']); } ?>

<?php if(!empty($pesan_error)){ ?>
  <script type="text/javascript">
    alert("<?php echo $pesan_error ?>");
  </script>
<?php } ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets/gambar/fav.png' ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!-- Include the above in your HEAD tag -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style_pengaturan.css' ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/js/pengaturan.js' ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/ccs/style_profile.css' ?>">

<style type="text/css">
.nama:hover:before{
  content: "Nama : ";
  background-color: #CCCCCC;
  color: white;
  padding: 7px;
  border-radius: 10px 10px;
  margin-right: 5px;
}
.username:hover:before{
  content: "Username : ";
  background-color: #CCCCCC;
  color: white;
  padding: 7px;
  border-radius: 10px 10px;
  margin-right: 5px;
}
.pekerjaan:hover:before{
  content: "Pekerjaan : ";
  background-color: #CCCCCC;
  color: white;
  padding: 7px;
  border-radius: 10px 10px;
  margin-right: 5px;
}
.jenis-kelamin:hover:before{
  content: "Jenis kelamin : ";
  background-color: #CCCCCC;
  color: white;
  padding: 7px;
  border-radius: 10px 10px;
  margin-right: 5px;
}
.nomor-telepon:hover:before{
  content: "Nomor telepon : ";
  background-color: #ffffff;
  color: white;
  padding: 7px;
  border-radius: 10px 10px;
  margin-right: 5px;
}
.email:hover:before{
  content: "Email : ";
  background-color: #CCCCCC;
  color: white;
  padding: 7px;
  border-radius: 10px 10px;
  margin-right: 5px;
}
.alamat:hover:before{
  content: "Alamat : ";
  background-color: #CCCCCC;
  color: white;
  padding: 7px;
  border-radius: 10px 10px;
  margin-right: 5px;
}  
.edit-form{
  display: none;
}
.tagihan thead tr th, .tagihan tbody tr td{
  text-align: center;
}

.dialog-bayar{
  width: 60% !important;
}

.garis-header-modal-pemberitahuan {
  margin-top: -10% !important;
}
</style>
  <?php $this->load->view('partial/nav'); ?>
<div class="container-fluid">
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="side-bar">
                    <div class="user-info">
                      <?php foreach($data2 as $data2){ ?>
                      <?php if(empty($data2->foto_profil)){ ?>
                        <img class="img-circle img-responsive" alt="" src="<?php echo base_url().'assets/gambar/default.png' ?>">
                        </img>
                      <?php } else{ ?>
                        <img class="img-circle img-responsive" alt="" src="<?php echo base_url().'./assets/gambar/user/'.$data2->id.'/'.$data2->foto_profil ?>" style="width: 300px; height: auto;">
                        </img>
                      <?php }} ?>
                    </div>
                    <nav class="side-menu">
                        <ul class="nav nav-tabs">
                            <li class="active">
                              <a href="#profil" data-toggle="tab">
                                <span class="fa fa-user"></span> Profil</a>
                            </li>
                            <li>
                              <a href="#tagihan" data-toggle="tab">
                                <span class="fas fa-money-check-alt"></span> Tagihan</a>
                            </li> 
                        </ul>
                    </nav>
                </div>
                <?php foreach($data as $data){ ?>
                <div class="content-panel">
                    <div class="content-header-wrapper">
                        <h2 class="title"><?php echo $data->username; echo " (".$data->id.")" ?></h2>
                        <div class="actions">
                            <a href="<?php echo base_url(); ?>" style="color: white;"><button class="btn btn-success"><i class="fa fa-home"></i> Kembali ke halaman utama</button></a>
                        </div>
                    </div>
                    <div id="penampung" class="drive-wrapper drive-grid-view" style="overflow: auto;">
                    <div class="tab-content">


<!-- TAB CONTENT PROFIl -->
                      <div class="tab-pane fade in active" id="profil"> 
                        <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="col-xs-12 col-sm-4">
                          <figure>
                           <?php if(empty($data->foto_profil)){ ?>
                              <img class="img-circle img-responsive" alt="" src="<?php echo base_url().'assets/gambar/default.png' ?>"></img>
                           <?php } else{ ?>
                              <img class="img-circle img-responsive" alt="" src="<?php echo base_url().'./assets/gambar/user/'.$data->id.'/'.$data->foto_profil ?>" style="width: 300px; height: auto;"></img>
                              <?php } ?>
                           </figure>
                          <br> 
                          
                           <figure>
                             <form method="post" action="<?php echo base_url("users/ganti_foto/".$data->id) ?>" enctype="multipart/form-data">
                              Ganti foto profil : <input type="file" name="ganti_foto">
                              <input type="submit" class="btn btn-info" name="submit" style="margin-top: 5px;" value="Ganti foto">
                            </form> 
                            </figure>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                           <ul class="list-group">
                            <?php if(!empty($data->nama)){ ?>
                              <li class="list-group-item nama"><i class="fa fa-id-card"></i>  <?php echo $data->nama ?></li>
                            <?php } ?>
                              <li class="list-group-item username"><i class="fa fa-id-badge"></i>  <?php echo $data->username ?></li>
                              <?php if(!empty($data->pekerjaan)){ ?>
                              <li class="list-group-item pekerjaan"><i class="fa fa-briefcase"></i>  <?php echo $data->pekerjaan ?></li>
                            <?php } 
                            if(!empty($data->gender)){?>
                              <li class="list-group-item jenis-kelamin">
                                <?php if($data->gender == 'pria'){ ?>
                                <i class="fas fa-male"></i>
                                <?php } elseif($data->gender == 'wanita'){ ?>
                                <i class="fas fa-female"></i>

                                <?php echo $data->gender; }?></li>
                                <?php } if(!empty($data->telepon)){ ?>
                              <li class="list-group-item nomor-telepon"><i class="fa fa-phone"></i>  <?php echo $data->telepon ?></li>
                            <?php } ?>
                              <li class="list-group-item email"><i class="fa fa-envelope"></i>  <?php echo $data->email ?></li>
                              <?php if(!empty($data->alamat)){ ?>
                              <li class="list-group-item alamat"><i class="fa fa-address-card"></i>  <?php echo $data->alamat ?></li>
                            <?php } ?>
                           </ul>
                        <button class="btn btn-success btn-md edit" type="button" style="float: right;">Edit profil</button>
                        </div>
                     </div>
                  </div>
               </div>
                      </div>

                      <!-- EDIT FORM -->
                    <div class="edit-form">
                      <form class="form" action="<?php echo base_url('users/aksi_edit/'.$data->id) ?>" method="post">

                      <div class="form-group">
                        
                          <div class="col-xs-6">
                              <label for="nama_lengkap"><h4>Nama</h4></label>
                              <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="nama lengkap" title="Masukkan nama lengkap anda" value="<?php echo $data->nama ?>">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="username"><h4>Username</h4></label><span class="text-danger"> *penting</span>
                              <input type="text" class="form-control" name="username" id="username" placeholder="masukkan username" title="Masukkan username anda" value="<?php echo $data->username ?>" required>
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label><span class="text-danger"> *penting</span>
                              <input type="email" class="form-control" name="email" id="email" placeholder="email" title="masukkan alamat email anda" value="<?php echo $data->email ?>" required>
                          </div>
                      </div>
          
                      <div class="form-group">

                          <div class="col-xs-6">
                             <label for="pekerjaan"><h4>Pekerjaan</h4></label>
                              <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="pekerjaan" title="masukkan pekerjaan anda" value="<?php echo $data->pekerjaan ?>">
                          </div>
                      </div>
          
                      <div class="form-group">

                          <div class="col-xs-6">
                             <label for="telepon"><h4>Telepon</h4></label>
                              <input type="text" class="form-control" name="telepon" id="telepon" placeholder="nomor telepon" title="masukkan nomor telepon" value="<?php echo $data->telepon ?>">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="alamat"><h4>Alamat</h4></label>
                              <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat anda" title="alamat tempat tinggal anda" value="<?php echo $data->alamat ?>">
                          </div>
                      </div>

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Simpan perubahan</button>

                                <button class="btn btn-md btn-danger" type="button" data-toggle="modal" data-target="#modal_edit_password"><i class="glyphicon "></i> Ganti password</button>
                            </div>
                      </div>
                      </form>
                                
                                <!--<button class="btn btn-lg btn-primary reset" style="margin-top: 10px; margin-left: 15px;"><i class="glyphicon glyphicon-repeat"></i> Reset form</button>-->
                                <button class="btn btn-lg btn-primary kembali" style="float: right; margin-top: 11px;"><i class="fa fa-chevron-circle-left"></i> Kembali</button>
              </div>

                  

<!-- TAB CONTENT PENGATURAN -->
            <div class="tab-pane fade" id="tagihan">
              <div class="table-responsive">
                <table class="table table-hover tagihan">
                  <thead>
                    <tr>
                      <th>invoice</th>
                      <th>Nama paket</th>
                      <th>Class</th>
                      <th>Tag</th>
                      <th>Harga</th>
                      <th>Tanggal</th>
                      <th>Catatan</th>
                      <th>Status</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($tagihan as $t){ ?>
                    <tr>
                      <td><?php echo $t->invoice ?></td>
                      <td><?php echo $t->nama_paket ?></td>
                      <td><?php echo $t->class ?></td>
                      <td><?php echo $t->tag ?></td>
                      <td><sup>Rp</sup>.<?php echo $t->harga ?>Jt</td>
                      <td><?php echo $t->tanggal ?></td>
                      <td><?php echo $t->catatan ?></td>
                      <td><?php echo $t->status ?></td>
                      <?php if($t->status == 'menunggu konfirmasi'){ ?>
                      <td>
                          <button class='btn btn-danger' data-toggle="modal" data-target="#modal_peringatan">batalkan</button>
                        </td>
                      <?php }else if($t->status == 'Salah'){ ?>
                        <td>
                          <button class='btn btn-danger' data-toggle="modal" data-target="#modal_peringatan">batalkan</button>
                        </td>
                      <?php }elseif($t->status == 'Belum dibayar'){ ?>
                        <td>
                          <button class='btn btn-danger' data-toggle="modal" data-target="#modal_peringatan">batalkan</button>
                        </td>
                      <?php }elseif($t->status == 'Terkonfirmasi'){ ?>
                        <td>Tidak ada
                        </td>
                      <?php } ?>
                          <!--MODAL peringatan batal -->
                        <div class="modal fade" id="modal_peringatan" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h1 class="text-center">Peringatan</h1>
                              </div>
                              <div class="modal-body hero-bkg-animated2">
                                <form method="post" action="<?php echo base_url("users/batal_order/.$t->invoice"); ?>">

                                  <div class="form-group">
                                    <h4>Apakah anda yakin ingin membatalkan paket <?php echo $t->nama_paket ?> anda ?</h4>
                                  </div>

                                </div>

                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger ">Batalkan</button>
                                    <button type="button" class="btn btn-info " data-dismiss="modal">tutup</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div> <!-- END MODAL peringatan -->
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
       </div>

              <?php } ?>
            </div>
        </section>
    </div>
</div>

  
      <!--MODAL KONFIRMASI -->
      <div class="modal fade" id="modal_konfirmasi" role="dialog">
        <div class="modal-dialog dialog-bayar">
          <div class="modal-content">
            <div class="modal-body hero-bkg-animated2">
              <form method="post" action="<?php echo base_url("bayar/aksi_bayar"); ?>" enctype="multipart/form-data">
              <div class="row"> 
                  <div class="col-md-12" style="background-color: rgba(255, 255, 255, 0.5);">
                    <address  style="font-size: 20px; text-align: center;">
                            <strong>Crystall wedding</strong>
                            <br>
                            Jl.Pesona intiland Cilebut Raya
                            <br>
                            Kota bogor, BOO 16161
                            <br>
                            <abbr title="Phone">P:</abbr> (+62) 85791419696
                        </address>
                        <center><img src="<?php echo base_url().'assets/gambar/line1.png' ?>" class="garis-header-modal-pemberitahuan text-center"></center>

                          <center><div class="form-group">
                            <label for="invoice">Invoice paket</label>
                            <input type="text" name="invoice" placeholder="Masukkan nomor invoice paket yang ingin di Konfirmasi">
                          </div></center>
                          <div class="form-group">
                            <center><input type="file" name="bukti" required=""></center>
                          </div>

                  </div>
                  <center>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" type="submit">Konfirmasi transfer</button></center>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- END MODAL KONFIRMASI -->

            <!--MODAL ganti password -->
      <div class="modal fade" id="modal_edit_password" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">&times;</button>
              <h4 class="text-center">Edit password</h4>
            </div>
            <div class="modal-body hero-bkg-animated2">
              <form method="post" action="<?php echo base_url("users/ganti_password"); ?>">

                <div class="form-group">
                  <label for="password_baru">Password baru</label>
                  <input type="password" name="password_baru">
                </div>

                <div class="form-group">
                  <label for="password_lama">Password lama</label>
                  <input type="password" name="password_lama">
                </div>

              </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger ">Ganti</button>
                  <button type="button" class="btn btn-info " data-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div> <!-- END MODAL password -->

       

<script type="text/javascript">

  $(document).ready(function(){
    $('.penampung-edit').hide();
    $('.reset').click(function(){
      $('.form-control').val('');
    });
    $('.edit').click(function(){
      $("#profil").hide(1000, function(){
        $(".edit-form").show(1000);
      });
    });
  });

  $(document).ready(function(){

      $("#profil").click(function(){
        $('#profil').addClass('active');
        $('#tagihan').removeClass('active')
      });

      $("#tagihan").click(function(){
        $('#profil').removeClass('active');
        $('#tagihan').addClass('active');
      });

      $('.kembali').click(function(){
        $(".edit-form").hide(1000);
        $("#profil").show(1000);
      });
    });


</script>