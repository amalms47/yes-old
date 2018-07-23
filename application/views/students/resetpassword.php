<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yescolleges.com | Reset password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <noscript>
  <meta HTTP-EQUIV="REFRESH" content="0;url=<?= base_url()?>no-script">
  </noscript>
  
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/libs/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/libs/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]-->
  <script src="<?= base_url()?>assets/backend/libs/js/html5shiv.min.js"></script>
  <script src="<?= base_url()?>assets/backend/libs/js/respond.min.js"></script>
  <!--[endif]-->
<!-- jQuery 2.2.3 -->
<script src="<?= base_url()?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url()?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url()?>assets/backend/plugins/iCheck/icheck.min.js"></script>
<script src="<?= base_url()?>assets/backend/plugins/browsers/bowser.js"></script>
<script src="<?= base_url()?>assets/backend/plugins/jQueryValidation/jquery.validate.min.js"></script>
<script src="<?= base_url()?>assets/backend/plugins/jQueryCookie/js.cookie.js"></script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"  >
    <img src="<?= base_url()?>assets/images/logo-lat.gif">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" id="_form">
      <p class="login-box-msg">Hello , <?=$emailid; ?><br>reset your account password<br><span style="color:red;">DO NOT REFRESH THE PAGE</span></p>

    <form  action="javascript:void(0);" name="studresetpasswordform" method="post" id="studresetpasswordform">
        <input type="hidden" name="email" id="email" value="<?=$emailid?>">
      <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <input type="password" class="form-control"  name="password" placeholder="Password" id="mypass">
         <span class="help-block"></span>
      </div>
      <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <input type="password" class="form-control"  name="reppassword" placeholder="Repeat Password">
         <span class="help-block"></span>
      </div>
            
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat" >Reset</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
     <div class="lockscreen-footer text-center">
    Copyright © 2017 <b><a href="http://www.yescolleges.com" class="text-black">Yescolleges.com</a></b>  All rights reserved<br>
  
  </div>
  
</div>
    <script type="text/javascript" src="<?= base_url()?>assets/backend/scripts/student/stud_setting.js"></script>
  </body>
</html>
