<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yescolleges.com/Institute</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <noscript>
        <meta HTTP-EQUIV="REFRESH" content="0;url=<?= base_url()?>no-script">
    </noscript>

    <style>
        #studloginform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
        #studpasswordform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
        #studregform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
    </style>

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
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?= base_url()?>assets/backend/plugins/iCheck/icheck.min.js"></script>
    <script src="<?= base_url()?>assets/backend/plugins/browsers/bowser.js"></script>
    <script src="<?= base_url()?>assets/backend/plugins/jQueryValidation/jquery.validate.min.js"></script>
    <script src="<?= base_url()?>assets/backend/plugins/jQueryCookie/js.cookie.js"></script>


    <script>
        var site_url='<?=base_url();?>';
    </script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo"  >
        <img src="<?= base_url()?>assets/images/logo-lat.gif">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" id="studlogin_form" style="display:none">
        <div  id="loginmessages"  style="color: red;" >
            <p id="loginmessages2" style="text-align:center">

            </p>

        </div>

        <p class="login-box-msg" id="studloginerrors" style="color: red"></p>
        <p class="login-box-msg">Sign in to start your session</p>


        <form  action="javascript:void(0);" name="studloginform" method="post" novalidate id="studloginform">
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <input type="email" class="form-control" autocomplete="off" name="studemailid" id="studemailid" placeholder="Email">
                <span class="help-block"></span>
            </div>
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <input type="password" class="form-control" id="studpassword" name="studpassword" placeholder="Password">
                <span class="help-block"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" id="studremember"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <div class="box" style="border:0px;">
                        <div class="overlay hidden" > <i class="fa fa-refresh fa-spin "></i></div>
                    <button type="submit" id="studloginbutton" class="btn btn-primary btn-block btn-flat" >Login</button>
                        </div>
                </div>
                <!-- /.col -->
            </div>

        </form>


        <!-- /.social-auth-links -->

        <a href="javascript:void(0);" onClick="studloadform(3)">I forgot my password</a><br>
        <!-- Large modal -->





    </div>
    <!-- /.login-box-body -->
    <!--
    <div class="login-box-body" id="studreg_form" style="display:none">
        <div  id="loginmessages"  style="color: red;" >
            <p id="loginmessages2" style="text-align:center">

            </p>

        </div>
        <p class="login-box-msg">Sign in to start your session</p>


        <form  action="javascript:void(0);" name="studregform" novalidate method="post" id="studregform">
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <input type="email" class="form-control" autocomplete="off" name="studregemailid" id="studregemailid" placeholder="Email">
                <span class="help-block"></span>
            </div>
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <input type="password" class="form-control" id="studregpassword" name="studregpassword" placeholder="Password">
                <span class="help-block"></span>
            </div>
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <input type="password" class="form-control" id="studregcpassword" name="studregcpassword" placeholder="Confirm Password">
                <span class="help-block"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <span id="studterm_error" style="color:red;"></span>
                    <div class="checkbox icheck">
                        <label>

                            <input type="checkbox" name="terms" id="studterms" title="please agree to our terms and condition"> I agree to the <a href="javascript:void(0);">terms & condition</a>

                        </label>
                    </div>
                </div>
                <!-- /.col --
                <div class="col-xs-4">
                    <div class="box" style="border:0px;">
                        <div class="overlay hidden" > <i class="fa fa-refresh fa-spin "></i></div>
                    <button type="submit" id="studregbutton" class="btn btn-primary btn-block btn-flat " >Register</button>
                        </div>
                </div>
                <!-- /.col --
            </div>


        </form>


        <!-- /.social-auth-links --
        <a href="javascript:void(0);" onClick="studloadform(1)">Already have account</a><br>

        <!-- Large modal --





    </div>


-->

    <!-- /.form-box -->


    <div class="login-box-body" id="studpassword_form" style="display:none">

        <p class="login-box-msg">Please enter your email-id to send setting link</p>
        <form action="javascript:void(0);" id="studpasswordform" method="post">
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <input type="email" class="form-control" name="studforgotemailid" id="studforgotemailid" autocomplete="on" placeholder="Email">
                <span class="help-block"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="javascript:void(0);" onClick="studloadform(1)">Go back to login</a>
                </div>

                <!-- /.col -->
                <div class="col-xs-4 pull-right">
                    <div class="box" style="border:0px;">
                        <div class="overlay hidden" > <i class="fa fa-refresh fa-spin "></i></div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Send Link</button>
                        </div>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!--password retrieve form -->

    <div class="lockscreen-footer text-center">
        Copyright © 2017 <b><a href="http://www.yescolleges.com" class="text-black">Yescolleges.com</a></b>  All rights reserved<br>

    </div>



</div>



<!---- modal for error message goes here --->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title text-center">
                    <img src="<?= base_url()?>assets/images/logo-lat.gif">
                </h4>
            </div>
            <div class="modal-body">
                <p id="custom_message" class="text-bold text-danger"></p>
            </div>
            <div class="modal-footer" id="act_link">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!---- modal for error message goes here --->


<script type="text/javascript" src="<?= base_url()?>assets/backend/scripts/student/stud_login.js"></script>
<script type="text/javascript">
    $("document").ready(function() {

        studloadform(3);
        studloaddata();
        //detect();

    });
    $(function () {$('input').iCheck({checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%' });
    });
</script>
</body>
</html>
