
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/backend/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/backend/dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page bg-purple">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Login</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan login Terlebih Dahulu</p>
    <?php $this->load->view('flash_messages');?>
    <form action="<?=site_url('Auth/proses')?>" method="post">
    <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="username" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-sm" class="text-center">Sign In</button>
          <div class="text-center">
        </div>
      </div>
    </form>
  </div>
 </div>
<script src="<?=base_url()?>assets/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
