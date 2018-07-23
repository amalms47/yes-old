<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title id="collegetitletag">Yescolleges - Online Admission portal </title>
  <!-- Tell the browser to be responsive to screen width -->

    <meta name="description" id="metanametag" content=""/>
    <meta name="keywords" id="metakeywordtag" content="" />
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
  <![endif]-->
<!-- jQuery 2.2.3 -->
<script src="<?= base_url()?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
    <script type="text/javascript" src="<?=base_url();?>assets/frontend/scripts/gettags.js"></script>
<script src="<?= base_url()?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
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
<div class=" login-box">
  <div class="login-logo"  >
    <img src="<?= base_url()?>assets/images/logo-lat.gif">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" id="login_form" style="display:none">
   <img class="profile-user-img img-responsive img-circle" id="cover" src="<?= base_url()?>assets/backend/images/none.png" alt="cover  picture">
    <p class="login-box-msg" id="errormsg">Sign in to start your session</p>

    <form  action="javascript:void(0);" name="loginforms" method="post" id="loginform">
      <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>       
        <input type="email" class="form-control" data-toggle="tooltip" data-placement="right" title="Enter valid emailid" autocomplete="off" name="emailid" id="username" placeholder="Email">
         <span class="help-block"></span>
      </div>
      <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
         <span class="help-block"></span>
      </div>
            
      <div class="row">
        <div class="col-xs-7">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" id="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
            <div class="box" style="border:0px;">
               <div class="overlay hidden" > <i class="fa fa-refresh fa-spin "></i></div>
              <button type="submit" class="btn btn-primary btn-block btn-flat ajax"  id="login" >Click to Login</button>
          </div>          
        </div>
        <!-- /.col -->
      </div>
    </form>
      <input type="hidden" id="tagidsection" value="6">

    <!-- /.social-auth-links -->

   <a href="javascript:void(0);" onClick="loadform(3)">Forgot password or send activation link</a><br>
    <a href="javascript:void(0);" onClick="loadform(2)">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
  
  <div class="register-box-body" id="register_form" style="display:none">
    <p class="login-box-msg">Register a new membership</p>

    <form  action="javascript:void(0);" id="registerform" method="post">
      <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <input type="text" class="form-control" data-toggle="tooltip" data-placement="right" title="Type your username" name="username" placeholder="User name">
           <span class="help-block"></span>
      </div>
        <div class="form-group has-feedback">
            <span class="fa fa-university form-control-feedback"></span>
            <input type="text" class="form-control" data-toggle="tooltip" data-placement="right" title="Institution full name" name="title" placeholder="College name">
            <span class="help-block"></span>
        </div>
      <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <input type="email" class="form-control" data-toggle="tooltip" data-placement="right" title="Type your emailid" name="emailid" placeholder="EmailID">
           <span class="help-block"></span>
      </div>
        <div class="form-group has-feedback">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <input type="text" class="form-control" name="contactno" data-toggle="tooltip" data-placement="right" title="Enter Mobile number"  placeholder="Mobile number">
           <span class="help-block"></span>
      </div>
      <div class="form-group has-feedback">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <input type="password" class="form-control" name="password" id="mypass" placeholder="Password">
       
           <span class="help-block"></span>
        
      </div>
      <div class="form-group has-feedback">
           <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <input type="password" class="form-control" name="reppassword" placeholder="Retype password">
        <span class="help-block"></span>
      </div>
        <div class="col-xs-12">      
             <span id="term_error" style="color:red;"></span>        
          <div class="checkbox icheck">              
          <input type="checkbox" name="terms" id="terms"  title="please agree to our terms and condition"> I agree to the <a href="javascript:void(0);">terms & condition</a>
          </div>
             
        </div>
           

        <!-- /.col -->
		 <div class="row">
        <div class="col-xs-4 pull-right">
            <div class="box" style="border:0px;">
               <div class="overlay hidden" > <i class="fa fa-refresh fa-spin "></i></div>
          <button type="submit" id="registerbutton" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="javascript:void(0);" onclick="loadform(1)" class="text-center">I already have a membership</a>

  </div>
  <!-- /.form-box -->
  
  
  <div class="login-box-body" id="password_form" style="display:none">
      <img class="profile-user-img img-responsive img-circle" id="pcover" src="<?= base_url()?>assets/backend/images/none.png" alt="cover  picture">
    <p class="login-box-msg">Please enter your email-id to send setting link</p>
    <form action="javascript:void(0);" id="passwordform" method="post">
      <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <input type="email" class="form-control" data-toggle="tooltip" data-placement="right" title="Enter registered emailid" name="emailid" id="pusername" autocomplete="off" placeholder="Email">
          <span class="help-block"></span>
      </div>
        <div class="form-group">
                <label>    <input type="radio" name="option"  checked value="Password"> Send Password             </label>&nbsp;
                <label>                  <input type="radio" name="option" value="Activation" > Send Activation                </label>
         </div>
        
        
        
      <div class="row">
        <div class="col-xs-8">
            <a href="javascript:void(0);" onClick="loadform(1)">Go back to login</a>
        </div>
        
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
            <div class="box" style="border:0px;">
               <div class="overlay hidden" > <i class="fa fa-refresh fa-spin "></i></div>
          <button type="submit" class="btn btn-primary btn-block btn-flat">  Send Mail</button>
          </div>
        </div>
        <!-- /.col -->
        </div>
    </form>
   
  </div>
  <!--password retrieve form -->

   <div class="lockscreen-footer text-center">
       Copyright © 2017 <b><a href="<?=  base_url();  ?>" class="text-black">Yescolleges.com</a></b>  All rights reserved<br>  
  </div>
   
</div>
 <!---- modal for error message goes here --->
<div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                  <h4 class="modal-title text-center">
                          <img src="<?= base_url()?>assets/images/logo-lat.gif">
                  </h4>
              </div>
              <div class="modal-body">
                <p id="custom_message" class="text-bold text-danger text-center"></p>
              </div>
            </div>
          </div>
     </div>
 <!---- modal for error message goes here --->
<script>

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script type="text/javascript" src="<?= base_url()?>assets/backend/Orgscripts/in_login2.js?kl"></script>
</body>
</html>
