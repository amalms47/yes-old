<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yescolleges.com | Institute admin</title>
    <link rel="shortcut icon" href="<?=base_url();?>assets/frontend/img/fav-icon.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/libs/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/libs/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/dist/css/skin-blue.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/plugins/iCheck/all.css">
        <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/plugins/pace/pace.min.css">
    <script src="<?= base_url()?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/jquery-ui.css" />
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="<?= base_url()?>assets/frontend/jquery-ui.js"></script>
    <!--[if lt IE 9]-->
    <script src="<?=base_url(); ?>assets/backend/libs/js/html5shiv.min.js"></script>
    <script src="<?=base_url(); ?>assets/backend/libs/js/respond.min.js"></script>

     <![endif]-->

<script src="<?= base_url()?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/backend/plugins/iCheck/icheck.min.js"></script>
<script src="<?= base_url()?>assets/backend/plugins/pace/pace.min.js"></script>
    <script src="<?=base_url(); ?>/assets/backend/dist/js/app.min.js"></script>
    <script src="<?= base_url()?>assets/backend/plugins/jQueryValidation/jquery.validate.min.js"></script>
   <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
     <script src="<?= base_url()?>assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <script>

        var site_url= '<?= base_url()?>';
    </script>
    <script type="text/javascript" src="<?= base_url()?>assets/backend/scripts/in_header.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="javascript:void(0);" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>YC</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>YESCOLLEGES.</b>com</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">



                    <li  data-toggle="tooltip" data-placement="bottom" title="Profile settings" id="profileerrror"></li>


                    <li id="newmail" data-toggle="tooltip" data-placement="bottom" title="Mailbox"></li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <!-- Tasks: style can be found in dropdown.less -->

                    <li id="unreadrequests" data-toggle="tooltip" data-placement="bottom" title="Enquiry" class="dropdown messages-menu"></li>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=base_url()?>assets/backend/images/collegelogo/<?=$logo?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?=$username;?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?=base_url()?>assets/backend/images/collegelogo/<?=$logo?>" class="img-circle" alt="User Image">
                                <p>
                                <small><?=$username;?></small>
                                 <small>Last login : <?=$logdate;?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer" style="background-color: #817D7D;">
                                <div class="pull-left">
                                    <a href="<?=base_url()?>institution-userprofile" class="btn bg-gray-active">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?=base_url()?>instituion-logout" class="btn bg-gray-active ">Sign out</a>
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