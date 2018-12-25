<style type="text/css">
	.judul-order th, .body-order td{
		text-align: center;
	}
	 .body-order td img{
	 	width: 30% !important;
	 }
</style>
	<div class="container pt-5">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr class="judul-order">
						<th>Invoice</th>
						<th>Id user</th>
						<th>Bukti pembayaran</th>
						<th>Tanggal pembayaran</th>
						<th>Status pembayaran</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($order as $o){ ?>
					<tr class="body-order">
						<td><?php echo $o->invoice ?></td>
						<td><?php echo $o->id_user ?></td>
						<td><img src="<?php echo base_url().'assets/gambar/user/'.$o->id_user.'/'.$o->nama_file ?>"></td>
						<td><?php echo $o->tanggal_upload ?></td>
						<td><?php echo $o->status ?></td>
						<?php if($o->status != "Terkonfirmasi"){ ?>
						<td>
							<?php echo anchor("admin/konfirmasi_salah/", "<button class='btn btn-outline-danger'>salah</button>"); ?> |
							<?php echo anchor("admin/konfirmasi_berhasil/".$o->invoice, "<button class='btn btn-outline-success'>konfirmasi</button>"); ?>
						</td>
						<?php }else{ ?>
							<td><em>tidak ada</em></td>
						<?php } ?>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>