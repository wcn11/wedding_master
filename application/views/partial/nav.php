
    <script src="<?php echo base_url().'assets/js/nav.js' ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style_nav.css' ?>">
 
<nav id="nav" class="navbar navbar-default navbar-fixed-top nav-tinggi"> 
	

	<div id="contain" class="container-fluid contain">
		<!--wrapper-->
		<div class="navbar-header">
			<button id="btn-nav" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle Navigasi</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>"> <span class="fas fa-gem"></span> Crystall Wedding</a> 
		</div>

		<!--kedua-->
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url(); ?>"><span class="fas fa-home"></span> Beranda</a></li>
				<?php if($this->session->userdata('status') != 'login'){ ?>
				<li class="vertical-line">|</li>
					<li><a href="#modal_login" data-toggle="modal" data-backdrop="false"><span class="fas fa-sign-in-alt"></span> Masuk</a></li>
					<li><a href="#modal_daftar" data-toggle="modal" data-backdrop="false"><span class="fas fa-user-plus"></span> Daftar</a></li>
				<?php }else{ ?>
				<li><a href="#modal_konfirmasi" data-toggle="modal"><span class="fas fa-book-open"></span> Konfirmasi</a></li>
				<li class="vertical-line">|</li>
				<li id="user-profile" data-toggle="dropdown"><span class="fas fa-user-cog"></span> <?php echo $this->session->userdata('username') ?> 
					<span class="fas fa-chevron-circle-down" id="panah-bawah"></span>
				</li>
				<ul class="dropdown-menu" role="menu" aria-labelledby="user-profile">
					<li role="presentation"><a href="<?php echo base_url('users/pengaturan/') ?>" role="menuitem" tabindex="-1" class="link-profile"><span class="fas fa-cogs"></span> Profil</a></li>
					
					<li role="presentation" class="divider"></li>
					<li role="presentation"><a href="#modal-logout" data-toggle="modal" role="menuitem" tabindex="-1" class="link-profile"><span class="fas fa-sign-out-alt"></span> Keluar</a></li>
				</ul>
			<?php } ?>
				<li class="btn-cari">
					<a href="#nav-collapse-2" class="btn btn-default btn-outline btn-circle" data-toggle="collapse" aria-expanded="true" aria-control="nav-collapse-2">  <span class="fas fa-search" style="font-size: 12px;"></span> Cari</a>
				</li>
			</ul>
			<div class="collapse nav navbar-nav nav-collapse" id="nav-collapse-2">
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Cari" name="cari">
					</div>
					<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</form>
			</div>
		</div>
	</div>
</nav>


<!-- Modal login -->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="modal_loginTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-radius: 23px;">
			<div class="modal-header" style="background-color: #FB7D88; border-top-left-radius: 20px; border-top-right-radius: 20px;">
				<h5 class="text-center" style="color: white; font-size: 20px;">Login</h5>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url('login/aksi_login') ?>">
					<div class="form-group">
						<label for="email" style="color: #ec9393;">Email</label>
						<input type="email" class="form-control" name="email" placeholder="email">
					</div>
					<div class="form-group">
						<label for="password" style="color: #ec9393;">password</label>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>
					<div class="text-center">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Login</button>
					</div>
					<h2 class="garis-atau"><span class="kata-atau">atau</span></h2>
					<center>
						<button type="button" class="btn btn-danger btn-circle btn-lg btn-atau-daftar" style="margin-top: 20px;"><span class="fas fa-sign-in-alt"></span> Daftar
						</button>
					</center>
			</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal daftar -->
<div class="modal fade" id="modal_daftar" tabindex="-1" role="dialog" aria-labelledby="modal_daftarTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-radius: 23px;">
			<div class="modal-header" style="background-color: #FB7D88; border-top-left-radius: 20px; border-top-right-radius: 20px;">
				<h5 class="text-center" style="color: white; font-size: 20px;">Daftar</h5>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url('daftar/aksi_daftar') ?>">
					<div class="form-group">
						<h5 class="text-danger">Harap isi bidang *</h5>
					</div>
					<div class="form-group">
						<label for="nama" style="color: #ec9393;">Nama lengkap</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama">
					</div>
					<div class="form-group">
						<label for="username" style="color: #ec9393;">Username</label><span class="text-danger"> *</span>
						<input type="text" class="form-control" name="username" placeholder="username">
					</div>
				<form method="post" action="<?php echo base_url('login/aksi_login') ?>">
					<div class="form-group">
						<label for="email" style="color: #ec9393;">Email</label><span class="text-danger"> *</span>
						<input type="email" class="form-control" name="email" placeholder="email" required="">
					</div>
					<div class="form-group">
						<label for="telepon" style="color: #ec9393;">Telepon</label>
						<input type="text" class="form-control" name="telepon" placeholder="Telepon">
					</div>
					<div class="form-group">
						<label for="alamat" style="color: #ec9393;">Alamat</label>
						<input type="text" class="form-control" name="alamat" placeholder="Alamat">
					</div>
					<div class="form-group">
						<label for="pekerjaan" style="color: #ec9393;">Pekerjaan</label>
						<input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
					</div>
					<div class="form-group">
						<label for="password" style="color: #ec9393;">password</label><span class="text-danger"> *</span>
						<input type="password" class="form-control" name="password" placeholder="password" required>
					</div>
					<div class="text-center">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Daftar</button>
					</div>
					<h2 class="garis-atau"><span class="kata-atau">atau</span></h2>
					<center>
						<button type="button" class="btn btn-danger btn-circle btn-lg btn-atau-login" style="margin-top: 20px;"><span class="fas fa-sign-in-alt"></span> Login
						</button>
					</center>
				
			</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-logout">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4>Pemberitahuan</h4>
			</div> 
			<div class="modal-body">
				<h3 class="text-center">Apakah anda yakin ingin keluar ?</h3>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal">batal</button>
				<a href="<?php echo base_url('login/logout') ?>"><button class="btn btn-danger">keluar</button></a>
			</div>
		</div>		
	</div>
</div>


					<script type="text/javascript">
						$(document).ready(function(){
							$(".btn-atau-daftar").click(function(){
								$("#modal_login").modal("hide");
								$("#modal_daftar").modal("show");
							});
							$(".btn-atau-login").click(function(){
								$("#modal_daftar").modal("hide");
								$("#modal_login").modal("show");
							});
						});
					</script>