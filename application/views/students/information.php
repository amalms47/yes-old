<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yescollege.com | Institute Panel</title>
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
  <script src="<?= base_url()?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url()?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/backend/plugins/browsers/bowser.js"></script>
</head>
<body >
    <div class="wrapper">
<!-- if you need to add nay thing on header -->
<header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
       </div>
    </nav>
</header>
<!-- if you need to add nay thing on header -->


<section class="content" style="margin-top:100px;">
<div class="login-logo"><img src="<?= base_url()?>assets/images/logo-lat.gif"></div>
<div class="error-page">

<div class="error-content">
<h3><i class="fa fa-info text-logogreen" ></i>&nbsp; &nbsp; <?=$message?></h3>
<p>you may <a href="<?=base_url()?>">return to website </a> or page redirects you in 5 seconds</p>
</div>       
</div>      
</section>
</div>
<footer class="main-footer navbar-fixed-bottom" style="margin:0px;">
<div class="pull-right hidden-xs"><b><a href="javascript:void(0);">Terms and condition</a></b> </div>
<strong>Copyright © 2017 <a href="javascript:void(0);">yescolleges.com</a>.</strong> All rights reserved.
</footer>    
   

</body>
<script>
   var site_url='<?=base_url();?>';
    window.setTimeout(function(){
        window.location.href=site_url;
    },5000)
</script>
</html>