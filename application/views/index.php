<!DOCTYPE html>
<html> 
<head>
	<title>CRYSTALL WEDDING</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-control" content="no-cache">
	
	<!-- LINK CSS -->

	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets/gambar/fav.png' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/style_carousel.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/style_content.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/side-bar.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/style_galeri.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/side-bar-kanan.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/toolbar.css' ?>">
	 
	<!-- CDN LINK  -->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- LINK JQUERY & JAVASCRIPT -->

	<script src="<?php echo base_url().'assets/js/content.js' ?>"></script>
	<script src="<?php echo base_url().'assets/js/side-bar.js' ?>"></script>
	<script src="<?php echo base_url().'assets/js/galeri.js' ?>"></script>
	<script src="<?php echo base_url().'assets/js/index.js' ?>"></script>
</head>
<style type="text/css">
	.body{
		background-color: #f1f1f1 !important;
	}

.garis-atau-daftar {
	width: 100%;
	text-align: center;
	border-bottom: 1px solid #e9d3d3;
	line-height: 0.1em;
	margin: 10px 0 20px;
	z-index: 1 !important;
}
.atau-paket {
	padding: 0 10px;
	background-color: #F1F1F1;
	color: #FC97A0;
	border-radius: 20px;
	padding: 20px !important;
	font-size: 20px;
	z-index: 1 !important;
}
.gambar-rotate{
	-ms-transform: rotate(180deg);
	-webkit-transform: rotate(180deg);
	transform: rotate(180deg);
}
.btn-tab{
	padding: 15px !important;
	margin-left: 10px;
	margin-right: 10px;
	width: 150px;
	z-index: 1 !important;
} 
html, body {
  margin: 0; padding: 0;
}
.hero-bkg-animated {
  background: url(<?php echo base_url().'assets/gambar/background.jpg' ?>) repeat 0 0;
  width: 100% !important;
  margin: 0;
  text-align: center;
  height: 100% !important;
  background-attachment: fixed;
  background-size: cover !important;
  box-sizing: border-box;
  -webkit-animation: slide 20s linear infinite;
}

.hero-bkg-animated h1 {
  font-family: sans-serif;
}

@-webkit-keyframes slide {
    from { background-position: 0 0; }
    to { background-position: -400px 0; }
}
.alert-login{
	position: absolute;
}
</style>

<body style="background-color: #f1f1f1 !important;">

		<script>
			$(document).ready(function(){
				$('#btn-nav').toggleClass('btn-nav');	
			}); 
		</script>
		<?php include 'partial/nav.php'; ?>
		
		<?php include 'partial/carousel.php'; ?>

	<div class="hero-bkg-animated">
	
		<h1 class="garis-atau-daftar animated"><span class="atau-paket">PAKET & GALERI</span></h1>
		<div class="latr-belakang">
	</div>
		<div>
		<center>
			<img src="<?php echo base_url().'assets/gambar/line-vector-atas.png'?>">
		</center>
		<center>
			<button type="button" class="btn btn-danger btn-lg text-center btn-tab btn-paket">PAKET</button>
			<button type="button" class="btn btn-danger btn-lg text-center btn-tab btn-galeri">GALERI</button>
		</center>
	</div>
		<div class="galeri">
          <script type="text/javascript">
            $(document).ready(function(){
              $(".galeri").load("<?php echo base_url()?>konten/paket");
            });
          </script>
		</div>
		<div>
			<center><img src="<?php echo base_url().'assets/gambar/line-vector-atas.png'?>" class="gambar-rotate"></center>
		</div>
</div>
		<?php include 'partial/footer.php'; ?>
		

		<script type="text/javascript">
			var base_url = "<? print base_url(); ?>";

          $(document).ready(function(){
            $('.btn-paket').click(function(){
              $('.galeri').load("<?php echo base_url(); ?>konten/paket");
            });
            $('.btn-galeri').click(function(){
              $('.galeri').load("<?php echo base_url(); ?>konten/galeri");
            });
          });
		</script>
			<!--alert-->
		<?php if($this->session->userdata("pesan_login") == "login"){ ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#pesan_login").modal("show");
				});
			</script>

				<div class="modal fade" id="pesan_login" role="dialog">
					<div class="modal-dialog modal-xs">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-center">Pesan</h4>
							</div>
							<div class="modal-body">
								<h3 class="text-center">Anda berhasil login!</h3>
							</div>
						</div>
					</div>
				</div>

		<?php unset($_SESSION['pesan_login']); }
			elseif ($this->session->userdata("pesan_daftar") == "daftar") { ?>
				
				<script type="text/javascript">
					$(document).ready(function(){
						$("#pesan_daftar").modal("show");
					});
				</script>

				<div class="modal fade" id="pesan_daftar" role="dialog">
					<div class="modal-dialog modal-xs">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-center">Pesan</h4>
							</div>
							<div class="modal-body">
								<h3 class="text-center">Anda berhasil mendaftar<br>
									<p class="text-danger">HARAP UNTUK SEGERA MENGISI KESELURUHAN PROFIL ANDA</p>
								</h3>
							</div>
						</div>
					</div>
				</div>


		<?php unset($_SESSION['pesan_daftar']); } 
			if ($this->session->userdata("pesan_bayar") == "sukses") { ?>
				
				<script type="text/javascript">
					$(document).ready(function(){
						$("#pesan_bayar").modal("show");
					});
				</script>

				<div class="modal fade" id="pesan_bayar" role="dialog">
					<div class="modal-dialog modal-xs">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-center">Pesan</h4>
		text/javascript					</div>
							<div class="modal-body">
								<h3 class="text-center">Anda berhasil membayar!</h3>
								<h6 class="text-center">Silahkan tunggu telepon konfirmasi pengecekan pembayaran dari pegawai kami!</h6>
							</div>
						</div>
					</div>
				</div>


			<?php unset($_SESSION['pesan_bayar']); } ?>

		<!-- END ALERT -->
<script type="text/javascript">function add_chatinline(){var hccid=96012404;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>

</body>
</html>