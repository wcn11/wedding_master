
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<h1>Data Gambar</h1><hr>
<a href="<?php echo base_url("gambar/view_tambah_gambar"); ?>">Tambah Gambar</a><br><br>

<table border="1" cellpadding="8">
<tr>
	<th>Id</th>
	<th>Gambar</th>
	<th>Deskripsi</th>
	<th>Tag</th>
	<th>Harga</th>
	<th>Nama File</th>
	<th>Ukuran File</th>
	<th>Tipe File</th>
	<th>Pilihan</th>
</tr>

<?php
if( ! empty($gambar)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
	foreach($gambar as $data){ // Lakukan looping pada variabel gambar dari controller
		$id = $data->id;
		echo "<tr>";
		echo "<th>".$data->id."</th>";
		echo "<td><img src='".base_url("./assets/gambar/".$data->nama_file)."' width='100' height='100'></td>";
		echo "<td>".$data->deskripsi."</td>";
		echo "<td>".$data->tag."</td>";
		echo "<td>".$data->harga."</td>";
		echo "<td>".$data->nama_file."</td>";
		echo "<td>".$data->ukuran_file." kB</td>";
		echo "<td>".$data->tipe_file."</td>";
		echo "<td>".anchor('gambar/edit/'.$data->id, 'EDIT').' | '. 
			   	  	anchor('gambar/hapus/'.$data->id, 'HAPUS').' | '.
			   	  	anchor('gambar/view_tambah_gambar/'.$data->id,'TAMBAH GAMBAR').
			   	  	"</td>";

		echo "</tr>";
	}
}else{ // Jika data tidak ada
	echo "<tr><td colspan='9' style='text-align: center;'>Data tidak ada</td></tr>";
}
?>
</table>

	<!--<div id="modal_gambar" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			

			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4>Modal header</h4>
				</div>
				<div class="modal-body">
					<form class="form-gambar" method="POST">
						<input type="hidden" name="id" id="id" value="<? //echo $id ?>">
						<input type="file" name="input_gambar">
						<input type="submit" name="submit" value="Simpan">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="bt btn-default" data-dismiss="modal">close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="tampung-gambar">
		
	</div>
-->