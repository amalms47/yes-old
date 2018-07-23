<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SeoAdmin | Login</title>
    <style>
        .row{
            margin-bottom: 5%;
        }
    </style>
<style>
    /* Form */
    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 300px;
        margin: 0 auto 100px;
        padding: 30px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        text-align: center;
    }
    .form .thumbnail {
        background: #EBEDED;
        border: 2px solid #ff7200;
        width: 150px;
        height: 150px;
        margin: 0 auto 30px;
        padding: 50px 30px;
        border-top-left-radius: 100%;
        border-top-right-radius: 100%;
        border-bottom-left-radius: 100%;
        border-bottom-right-radius: 100%;
        box-sizing: border-box;
    }
    .form .thumbnail img {
        display: block;
        width: 100%;
    }
    .form input {
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        box-sizing: border-box;
        font-size: 14px;
    }
    .form button {
        outline: 0;
        background: #ff7200;
        width: 100%;
        border: 0;
        padding: 15px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }
    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #ff7200;
        text-decoration: none;
    }
    .form .register-form {
        display: none;
    }

    .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
    }
    .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
    }
    .container .info {
        margin: 50px auto;
        text-align: center;
    }
    .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
    }
    .container .info span {
        color: #4d4d4d;
        font-size: 12px;
    }
    .container .info span a {
        color: #000000;
        text-decoration: none;
    }
    .container .info span .fa {
        color: #EF3B3A;
    }

    /* END Form */
    /* Demo Purposes */
    body {
        background: #ccc;
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    body:before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        display: block;
        background: rgba(255, 255, 255, 0.8);
        width: 100%;
        height: 100%;
    }

    #video {
        z-index: -99;
        position: fixed;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
    }

</style>

</head>
<body>
<div class="container">
    <div class="row"><br><br>

        <div class="info">
            <!-- <div class="info">
              <h1>Flat Login Form</h1><span>Made with <i class="fa fa-heart"></i> by <a href="http://andytran.me">Andy Tran</a></span>
            </div> -->
        </div>
        <div class="form">
            <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
            <p class="login-box-msg" style="color: gray" id="errormsg">Sign in to start your session</p>
            <form class="login-form" method="post" id="seologinform" action="javascript:void(0)">
                <input type="text" name="username" id="username" placeholder="username"/>
                <input type="password" placeholder="password" id="password" name="password"/>
                <button type="button" id="seologin">login</button>
            </form>
        </div>

    </div>
</div>

<script>
    var site_url='<?=base_url();?>';
</script>
<!-- jQuery library -->
<!-- iCheck -->
<script src="<?= base_url()?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?= base_url()?>assets/backend/plugins/jQueryValidation/jquery.validate.min.js"></script>
<script src="<?=base_url();?>assets/backend/scripts/seologin.js?io"></script>
</body>
</html>