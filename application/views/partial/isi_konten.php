	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style_isi_konten.css' ?>">

  <?php $this->load->view('partial/nav'); ?>

<div class="container">
	<div class="col-md-9">
	<h2><?php 
			foreach($data as $data){
			$nama_paket = $data->nama_paket;
			$harga = $data->harga;
			$tag = $data->tag;
			echo $nama_paket;}
		?>
	</h2>
			<?php $id = $this->uri->segment(3); 
			foreach ($data as $data) {?>
				<img src="<?php echo base_url().'assets/gambar/'.$id.'/'.$paket->nama_file; ?>" style="border-radius: 20px">
			<?php } ?>
		</div>
		<div class="side">
			<div class="judul">
				<h3 class="judul-sub">Nama paket </h3>
				<ol style="list-style-type: circle;">
					<li><h4 class="judul-sub-2"><?php echo $nama_paket; ?></h4></li>
				</ol>
			</div>
			<div class="judul">
				<h3 class="judul-sub">Harga </h3>
				<ul style="list-style-type: circle;">
					<li><h4 class="judul-sub-2"><?php echo 'Rp.'.$harga; ?></h4></li>
				</ul>
			</div>
			<div class="judul">
				<h3 class="judul-sub">Tag </h3>
				<ul style="list-style-type: circle;">
					<li><h4 class="judul-sub-2"><?php echo $tag; ?></h4></li>
				</ul>
			</div>
			<div class="judul">
				<h3 class="judul-sub">Benefit paket</h3>
				<ul style="list-style-type: circle;">
					<li><h4 class="judul-sub-2">Catering </h4></li>
					<li><h4 class="judul-sub-2">Photo studio </h4></li>
					<li><h4 class="judul-sub-2">Make up </h4></li>
				</ul>
			</div>
			<div class="judul">
				<a href="<?php echo base_url('bayar/bayar_paket_arsip/'.$id); ?>"><button class="btn btn-danger">Bayar paket</button></a>
			</div>
		</div>
</div>
<?php include 'footer.php' ?>