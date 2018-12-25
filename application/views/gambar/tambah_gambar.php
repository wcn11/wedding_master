<!DOCTYPE html>
<html>
<head>
	<title>adf</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>	
	<? $id = $this->uri->segment(3); ?>

<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
	<form method="post" action="<? echo base_url('gambar/tes'); ?>" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<? echo $id; ?>">
		<input type="file" name="gambar[]" multiple>
		<input type="submit" name="submit" value="Simpan">
	</form>
</body>
</html>

