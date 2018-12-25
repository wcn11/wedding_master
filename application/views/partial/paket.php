
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style_paket.css' ?>">
<style type="text/css">
html, body {
  margin: 0; padding: 0;
}
.image-preview-input { 
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
.tabel-booking thead th, .tabel-booking-body tr td, .table-bayar tr th,  .table-bayar-body tr td {
	font-size: 20px; 
}
</style>
<div class="container content">
	<div class="row">
		<!-- Pricing -->
		<?php foreach($reguler as $reguler) { ?>
		<div class="col-md-3  animated">
			<div class="pricing hover-effect kotak-paket">
				<div class="pricing-head">
					<h3><?php echo $reguler->nama_paket ?> <span>
					<?php echo $reguler->tag ?></span>
					</h3>
					<h4><i>Rp</i><?php echo $reguler->harga ?><i>JT</i>
					<span>
					Full Service </span>
					</h4>
				</div>
				<ul class="pricing-content list-unstyled">
					<li>
						Full dressed
					</li>
					<li>
						Pakaian Groomsman + Grommsmaid
					</li>
					<li>
						Photo pre-wedding
					</li>
					<li>
						Catering
					</li>
					<li> 
						Full Decoration
					</li>
					<li>
						MC + Music
					</li>
					<li>
						Dokumentasi full
					</li>
				</ul>
				<div class="pricing-footer">
					<p>
						 <?php echo $reguler->deskripsi ?>
					</p>
					<?php if($this->session->userdata('status') == 'login'){ ?>
					<button class="btn btn-danger" data-toggle="modal" data-target="#modal_bayar<?php echo $reguler->id ?>">Booking</button>
				<?php }else{ ?>
					<button class="btn btn-danger" data-toggle="modal" data-target="#modal_login">Booking</button>
				<?php } ?>
				</div>
			</div>
		</div>

	<!--MODAL BAYAR -->
	<div class="modal fade" id="modal_bayar<?php echo $reguler->id; ?>" role="dialog">
		<div class="modal-dialog dialog-bayar">
			<div class="modal-content">
				<div class="modal-body hero-bkg-animated2">
					<div class="row">
						<form method="post" action="<?php echo base_url('order/bayar_order') ?>">
							<div class="col-md-12" style="background-color: rgba(255, 255, 255, 0.5);">
								<address style="font-size: 20px;">
						            <strong>Crystall wedding</strong>
						            <br>
						            Jl.Pesona intiland Cilebut Raya
						            <br>
						            Kota bogor, BOO 16161
						            <br>
						            <abbr title="Phone">P:</abbr> (+62) 85791419696
						        </address>
						        <div class="pull-right">
						        	<label for="tanggal"  style="font-size: 20px;">Tanggal meeting</label>
						        	<input type="date" name="tanggal" required="" style="font-size: 20px;">
						        	<input type="hidden" name="id_paket" value="<?php echo $reguler->id ?>">
						        	<input type="hidden" name="nama_paket" value="<?php echo $reguler->nama_paket ?>">
						        	<input type="hidden" name="class" value="<?php echo $reguler->class ?>">
						        	<input type="hidden" name="tag" value="<?php echo $reguler->tag ?>">
						        	<input type="hidden" name="harga" value="<?php echo $reguler->harga ?>">
						        </div>
						        <center><img src="<?php echo base_url().'assets/gambar/line1.png' ?>" class="garis-header-modal"></center>

						        <div class="table-responsive" style="margin-top: -5%;"> <!-- TABLE DALAM MODAL -->
						        	<table class="table tabel-booking">
						        		<thead>
						        			<tr>
						        				<th><center>Nama paket</center></th>
						        				<th><center>Kelas paket</center></th>
						        				<th><center>Kategori</center></th>
						        				<th><center>Harga</center></th>
						        			</tr>
						        		</thead>
						        		<tbody class="tabel-booking-body">
						        			<tr>
						        				<td><?php echo $reguler->nama_paket ?></td>
						        				<td><?php echo $reguler->class ?></td>
						        				<td><?php echo $reguler->tag ?></td>
						        				<td><sup>Rp</sup><?php echo $reguler->harga ?>Jt</td>
						        			</tr>
						        		</tbody>
						        	</table>
						        </div>  <!-- END TABLE DALAM MODAL -->
							</div>
							<div class="col-md-12">
								<textarea name="catatan" class="form-control" placeholder="Tambah catatan untuk paket ini" rows="3"></textarea>
						    </div>
						    <button class="btn btn-danger booking-final" type="submit">Booking paket</button>
						    <p class="text-danger tambah-catatan"><em class="text-danger">tambahkan catatan ?</em></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- END MODAL BAYAR -->

	<?php } ?>
		<!--//End Pricing -->
	</div>
</div>

<!--MODAL PEMBERITAHUAN -->
	<div class="modal fade" id="modal_pemberitahuan" role="dialog">
		<div class="modal-dialog dialog-bayar">
			<div class="modal-content">
				<div class="modal-body hero-bkg-animated2">
					<div class="row">
							<div class="col-md-12" style="background-color: rgba(255, 255, 255, 0.5);">
								<address style="font-size: 20px;">
						            <strong>Crystall wedding</strong>
						            <br>
						            Jl.Pesona intiland Cilebut Raya
						            <br>
						            Kota bogor, BOO 16161
						            <br>
						            <abbr title="Phone">P:</abbr> (+62) 85791419696
						        </address>
						        <img src="<?php echo base_url().'assets/gambar/line1.png' ?>" class="garis-header-modal-pemberitahuan">

						        <div class="table-responsive" style="margin-top: -5%;"> <!-- TABLE DALAM MODAL -->
						        	<table class="table table-bayar">
						        		<thead>
						        			<tr>
						        				<th><center>Invoice</center></th>
						        				<th><center>BANK</center></th>
						        				<th><center>Atas nama</center></th>
						        				<th><center>No rekening</center></th>
						        			</tr>
						        		</thead>
						        		<tbody class="table-bayar-body">
						        			<tr>
						        				<td><?php echo $this->session->userdata("invoice") ?></td>
						        				<td>BTN</td>
						        				<td>WAHYU CHANDRA</td>
						        				<td>1111 2222 3333 4444</td>
						        			</tr>
						        			<tr>
						        				<td><?php echo $this->session->userdata("invoice") ?></td>
						        				<td>MANDIRI</td>
						        				<td>WAHYU CHANDRA</td>
						        				<td>1111 2222 3333 4444</td>
						        			</tr>
						        			<tr>
						        				<td><?php echo $this->session->userdata("invoice") ?></td>
						        				<td>BCA</td>
						        				<td>WAHYU CHANDRA</td>
						        				<td>1111 2222 3333 4444</td>
						        			</tr>
						        			<tr>
						        				<td><?php echo $this->session->userdata("invoice") ?></td>
						        				<td>BJB</td>
						        				<td>WAHYU CHANDRA</td>
						        				<td>1111 2222 3333 4444</td>
						        			</tr>
						        		</tbody>
						        	</table>
						        </div>  <!-- END TABLE DALAM MODAL -->
							</div>
						    <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
						    </div>
						    <button class="btn btn-danger konfirmasi" type="button" data-dismiss="modal" data-toggle="modal" data-target="#modal_konfirmasi">Konfirmasi transfer</button>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- END MODAL PEMBERITAHUAN -->
 
	<!--MODAL KONFIRMASI -->
	<div class="modal fade" id="modal_konfirmasi" role="dialog">
		<div class="modal-dialog dialog-bayar">
			<div class="modal-content">
				<div class="modal-body hero-bkg-animated2">
					<form method="post" action="<?php echo base_url("bayar/aksi_bayar"); ?>" enctype="multipart/form-data">
					<div class="row">
							<div class="col-md-12" style="background-color: rgba(255, 255, 255, 0.5);">
								<address  style="font-size: 20px;">
						            <strong>Crystall wedding</strong>
						            <br>
						            Jl.Pesona intiland Cilebut Raya
						            <br>
						            Kota bogor, BOO 16161
						            <br>
						            <abbr title="Phone">P:</abbr> (+62) 85791419696
						        </address>
						        <img src="<?php echo base_url().'assets/gambar/line1.png' ?>" class="garis-header-modal-pemberitahuan">

						        	<div class="form-group">
						        		<h3>Nomor invoice bisa dapatkan di profil anda dibagian tab tagihan</h3>
						        	</div>

						        	<div class="form-group">
						        		<label for="invoice">Invoice paket</label>
						        		<input type="text" name="invoice" placeholder="Masukkan nomor invoice paket yang ingin di Konfirmasi">
						        	</div>
						        	<div class="form-group">
						        		<center><input type="file" name="bukti" required=""></center>
						        	</div>

							</div>
						    <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
						    <button class="btn btn-danger" type="submit">Konfirmasi transfer</button>
						    </form>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- END MODAL KONFIRMASI -->

<script type="text/javascript">

	$(function(){
		$('a[title]').tooltip();
	});

	$(document).ready(function(){
		$("[name='catatan']").hide();
		$(".tambah-catatan").click(function(){
			$("[name='catatan']").show(1000, function(){
				$(".tambah-catatan").hide(1000);
			});
		});
		<?php if($this->session->userdata("status_booking") == "success"){ ?>
			$("#modal_pemberitahuan").modal("show");
		<?php unset($_SESSION["status_booking"]); } ?>
	});

	$(document).ready(function(){
		$(".konfirmasi").click(function(){
			$(".modal_pemberitahuan").modal("hide");
			$(".modal_konfirmasi").modal("show");
		});
	});
</script>