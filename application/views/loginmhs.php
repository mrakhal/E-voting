<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Mahasiswa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition">
  <div style="background-image: url('<?php echo base_url('assets/uploads/files/background.jpg');?>'); img-responsive pad; no-repeat center center fixed; background-size: 1620px; width:100%; height: 100%">
    <div class="wrapper">
      <div class="col-md-4">
      </div>
      <div  style="margin-top:250px;" class="login-box login-page col-md-6">
        <div class="login-logo">
          <br>
          <a class="d-block" href="<?php echo base_url(); ?>" rel="home"><img style="height:250px;" class="d-block" src="<?php echo base_url("assets/uploads/files/logo.png") ?>" alt="logo"></a>
        </div>
        <!-- /.login-logo -->
        <div class="wrapper box-body">

        <div class="login-box-body">
          <p>Masukkan Nim Yang Telah Didaftarkan</p>
          <p class="login-box-msg"></p>

          <form action="<?php echo site_url('login'); ?>" method="post">
            <div class="form-group has-feedback">
              <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM anda" required autofocus>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <input type="reset" name="reset" id="reset" class="btn btn-primary btn-block btn-flat" value="Reset">
              </div>
              <div class="col-xs-4">
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="LOGIN">
              </div>
              <!-- /.col -->
            </div>
          </form>

          <!-- /.social-auth-links -->

        </div>
        <n
      </div>
        <!-- /.login-box-body -->
      </div>
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url();?>assets/styles/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url();?>assets/styles/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url();?>assets/styles/plugins/iCheck/icheck.min.js"></script>
  <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '30%' // optional
    });
  });
  </script>
</body>
</html>
