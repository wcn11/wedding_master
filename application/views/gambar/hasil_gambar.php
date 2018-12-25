
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<h1>Data Gambar</h1><hr>

<table border="1" cellpadding="8">
<tr>
	<th>Id</th>
	<th>Gambar</th>
</tr>

<?php
if( ! empty($data)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
	$id = $this->uri->segment(3);
	foreach($data as $data){ // Lakukan looping pada variabel gambar dari controller
		echo "<tr>";
		echo "<th>".$data->id."</th>";
		echo "<td><img src='".base_url("./assets/gambar/".$id.'/'.$data->nama_file)."' width='100' height='100'></td>";

		echo "</tr>";
	}
}else{ // Jika data tidak ada
	echo "<tr><td colspan='9' style='text-align: center;'>Data tidak ada</td></tr>";
}
?>
</table>
