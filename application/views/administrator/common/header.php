<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yescolleges.com | Administration</title>
    <link rel="shortcut icon" href="<?=base_url();?>assets/frontend/img/fav-icon.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/libs/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/libs/css/ionicons.min.css">
    <!-- Theme style -->
  <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/plugins/pace/pace.min.css">
    <script src="<?= base_url()?>assets/backend/plugins/pace/pace.min.js"></script>
  <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/plugins/iCheck/all.css">
      <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/plugins/select2/select2.min.css">
  
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/dist/css/Institute/skin-blue.min.css">
    <!-- iCheck -->
    <script src="<?= base_url()?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]-->

    <script src="<?=base_url(); ?>assets/backend/libs/js/html5shiv.min.js"></script>
    <script src="<?=base_url(); ?>assets/backend/libs/js/respond.min.js"></script>

     <![endif]-->

<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url()?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/backend/plugins/select2/select2.full.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url()?>assets/backend/plugins/iCheck/icheck.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?=base_url(); ?>/assets/backend/dist/js/app.min.js"></script>
    <script src="<?= base_url()?>assets/backend/plugins/jQueryValidation/jquery.validate.min.js"></script>
   <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
     <script src="<?= base_url();?>assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <script>
        var site_url='<?=base_url();?>';
    </script>
    <script src="<?= base_url();?>assets/backend/scripts/adm_header.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>yc</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>yescolleges.</b>com</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li data-toggle="tooltip" data-placement="bottom" title="Unread requests" id="newreq">

                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
               <!--     <li >
                        <a href="#" class="" data-toggle="dropdown">
                            <i class="fa fa-users "></i>
                         <!--   <span class="label label-warning">10</span> --
                        </a>

                    </li>-->
                    <!-- Tasks: style can be found in dropdown.less --
                    <li >
                      <!--  <a href="#" class="dropdown-toggle" title="New colleges" data-toggle="dropdown">
                            <i class="fa fa-institution"></i>
                  <!--         <span class="label label-danger">9</span>--
                        </a>--

                    </li>-->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=$photo; ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?=$fullname; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?=$photo; ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?=$fullname; ?>&nbsp;[<?=$role;?>]
                                    <small>Last login :  <?=$logdate; ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer" style="background-color: darkgrey">
                                <div class="pull-left">
                                    <a href="<?=base_url()?>profile-setting" style="background-color: #1f262d;color: #fff" class="btn  "><i class="fa  fa-user"></i> Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?=base_url()?>Administrator/logout" style="background-color: #1f262d; color: #fff" class="btn  "><i class="fa   fa-power-off"> </i> Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>

    <script>

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>