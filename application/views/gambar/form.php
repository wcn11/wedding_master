
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- Menampilkan Error jika validasi tidak valid -->
<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>

<?php echo form_open("gambar/tambah", array('enctype'=>'multipart/form-data')); ?>
	<table cellpadding="8">
		<tr>
			<td>Nama paket</td>
			<td><input type="text" name="nama_paket" value="<?php echo set_value('nama_paket'); ?>"></td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td><input type="text" name="input_deskripsi" value="<?php echo set_value('input_deskripsi'); ?>"></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td><input type="text" name="input_harga" value="<?php echo set_value('input_harga'); ?>"></td>
		</tr>
		<tr>
			<td>Tag</td>
			<td><input type="text" name="input_tag" value="<?php echo set_value('input_tag'); ?>"></td>
		</tr>
		<tr>
			<td>Thumbnail</td>
			<td><input type="file" name="input_gambar"></td> 
		</tr>
		<br>
	</table>
	<hr>

	<input type="submit" name="submit" value="Simpan">
	<a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
	<?php echo form_close(); ?>