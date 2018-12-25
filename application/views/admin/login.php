<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ----------> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/admin_login.css' ?>">
<style type="text/css">
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
</style>
<body class="hero-bkg-animated">
    <div id="login">
        <h3 class="text-center text-info pt-5">Login Admin Crystall</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo base_url('admin/proses_login') ?>" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group"><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
