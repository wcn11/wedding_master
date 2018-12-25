<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/ccs/style_profile.css' ?>">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
  background-color: #CCCCCC;
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
</style>
                      <div class="panel-heading resume-heading">
                  <div class="row">dfgdfg
                     <div class="col-lg-12">
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                              <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
                           </figure>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                           <ul class="list-group">
                            <?php echo foreach($data_profil as $data_profil){?>
                              <li class="list-group-item nama"><i class="fa fa-id-card"></i><?php echo $data_profil->nama ?></li>
                              <li class="list-group-item username"><i class="fa fa-id-badge"></i> <?php echo $data_profil->username ?></li>
                              <li class="list-group-item pekerjaan"><i class="fa fa-briefcase"></i> <?php echo $data_profil->pekerjaan ?></li>
                              <li class="list-group-item jenis-kelamin">
                                <?php if($data_profil->gender == 'pria'){ ?>
                                <i class="fa fa-male"></i>
                                <?php}elseif($data_profil->gender == 'wanita'){ ?>
                                <i class="fa fa-female"></i>

                                <?php} echo $data_profil->gender ?></li>
                              <li class="list-group-item nomor-telepon"><i class="fa fa-phone"></i> <?php echo $data_profil->telepon ?></li>
                              <li class="list-group-item email"><i class="fa fa-envelope"></i> <?php echo $data_profil->email ?></li>
                              <li class="list-group-item alamat"><i class="fa fa-address-card"></i> <?php echo $data_profil->alamat ?></li>
                            <?php } ?>
                           </ul>
                        <button class="btn btn-success btn-md edit" type="button">Edit profil</button>
                        </div>
                     </div>
                  </div>
               </div>