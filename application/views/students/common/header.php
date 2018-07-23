<!DOCTYPE html>
<html>
<head>
    <title>Yescolleges | Online Admission Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .error{color: red;font-weight:400;font-size: small}
    </style>
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/126fe952f4.js"></script>

    <!-- Main style sheet -->
    <link href="<?=base_url();?>assets/frontend/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url();?>assets/frontend/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url();?>assets/frontend/img/logo/fav-icon.png" type="image/x-icon">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css">

    <link href="<?=base_url();?>assets/frontend/css/mega-menu.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url();?>assets/frontend/slick/slick.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url();?>assets/frontend/slick/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url();?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <!-- jQuery library -->
    <script src="<?= base_url()?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="<?= base_url()?>assets/backend/bootstrap/js/bootstrap.min.js"></script>


    <script src="<?= base_url()?>assets/backend/plugins/jQueryValidation/jquery.validate.min.js"></script>
    <script src="<?= base_url()?>assets/backend/plugins/jQueryCookie/js.cookie.js"></script>

    <style>

        html,body {
            font-family: 'Open Sans', sans-serif;
        }

        *:focus {
            outline: none;
        }

        * {
            box-sizing: border-box;
        }

        .btn:focus {
            outline: none;
        }

        body{
            overflow-x: hidden !important;

        }
        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
            color: #fff;
            background-color: #278787;
        }

        li{
            list-style: none;
        }

        .slider {
            width: 100%;
            margin: 100px auto;
        }

        .slick-slide {
            margin: 50px 20px;
        }

        .slick-slide img {
            width: 100%;
        }



        .slider0 {
            width: 95%;
            margin: 0px auto;
            bottom: 40px;
            border: 0px solid #E0E0E0;
            background-color: #ffffff;
            padding: 0px;
        }

        .content{
            margin: 0px;
            margin-left: 0px;
            left: 0px;
            padding-left: 0px;
        }

        .main-slider .slick-next{
            left: -51px;
            position: absolute;
            bottom: -20px;
            font-size: 15px
            text-transform: uppercase;
            background-color: silver;
            padding: .5em;
            z-index: 100;
        }

        .slick-prev:before,.slick-next:before {
            display: none;
        }

        .classic-title {
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid #D9D9D9;
            font-weight: bold;
        }

        .classic-title span {
            padding-bottom: 5px;
            border-bottom: 1px solid;
            font-weight: bold;

        }

        .classic-title span {
            border-bottom-color: teal;
        }

        sup{
            color: #FFFFFF;
            background-color: #11BF7A;
            font-size: xx-small;
            border-radius: 2px;
            top: -12px;
            padding: 0px 2px 0 2px;
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            50% { opacity: .5; }
        }

        .navbar-default .navbar-nav>li>a {
            color: #969696;
            font-weight: normal;

        }
        .navbar-default .navbar-nav>li>a:hover {
            color: #969696;
            font-weight: normal;

        }

        #header{
            float: left;
            display: inline;
            width: 100%;
        }

        .header-top{
            background-color: #333;
            display: none;
            float: left;
            width: 100%;
            padding: 20px 0;
        }

        #search{
            margin: 0 auto;
            width: 70%;
        }

        #search input {
            background-color: black;
            border: medium none;
            color: #fff;
            float: left;
            height: 100%;
            text-align: center;
            width: 95%;
        }

        #search button[type="submit"] {
            background: black;
            border: medium none;
            color: #fff;
            height: 20px;
            width: 30px;
        }

        #search-icon {
            font-weight: bold;
        }
    </style>

</head>

<body>

<div class="col-sm-10 col-sm-offset-1 hidden-xs" style="margin-top: 10px;margin-bottom: 0px;color: grey;font-size: 12px;">

    <ul class="list-inline pull-left">
        <li><i class="glyphicon glyphicon-earphone"></i>&nbsp;484 278456</li>
        <li>|</li>
        <li><i class="glyphicon glyphicon-envelope"></i>&nbsp;info@yescolleges.com</li>
    </ul>



    <ul id="header-start" class="list-inline pull-right">
        <li><a href="">Faq</a></li>
        <li>|</li>
        <li><a href="">Feedback</a></li>
    </ul>


</div>
<div class="clearfix"></div>

<header>
    <!-- header top search -->
    <div class="header-top">
        <div class="container">
            <form action="">
                <div id="search">
                    <input type="text" placeholder="Type your search keyword here and hit Enter..." name="s" id="m_search" style="display: inline-block;">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- BEGIN MENU -->
    <section id="menu-area">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img class="img-responsive" src="<?=base_url();?>assets/frontend/img/logo/logo.png" width="100%" height="100%" alt="" style="margin-bottom: 20px;"></a><br><br><br><br>
            </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ONLINE ADMISSION<sup>new</sup></a>
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">COURSES <span class="caret caret-reversed"></span></a>
                        <ul class="dropdown-menu mega-dropdown-menu">
                            <li class="col-sm-3">
                                <ul class="menu-1" style="">
                                    <li class="dropdown-header">Top Categories</li>
                                    <li id="management"><a href="#">Management <small class="pull-right"><span class="glyphicon glyphicon-menu-right"></span></small></a></li>
                                    <li id="engineering"><a href="#">Engineering <small class="pull-right"><span class="glyphicon glyphicon-menu-right"></span></small>
                                        </a></li>
                                    <li id="medical"><a href="#">Medical <small class="pull-right"><span class="glyphicon glyphicon-menu-right"></span>
                                            </small></a></li>
                                    <li id="arts"><a href="#">Arts <small class="pull-right"><span class="glyphicon glyphicon-menu-right"></span></small>
                                        </a></li>
                                    <li id="law"><a href="#">Law <small class="pull-right"><span class="glyphicon glyphicon-menu-right"></span></small></a>
                                    </li>
                                    <li id="computer-application"><a href="#">Computer Application <small class="pull-right"><span class="glyphicon glyphicon-menu-right"></span></small></a></li>
                                    <li id="paramedical"><a href="#">Paramedical <small class="pull-right"><span class="glyphicon glyphicon-menu-right"></span></small></a></li>
                                    <li id="aviation"><a href="#">Aviation <small class="pull-right"><span class="glyphicon glyphicon-menu-right"></span></small></a></li>
                                    <li id="more"><a href="#" style="color: #1C5B75;"><b>+ view all categories</b></a></li>

                                    <!-- <li class="divider"></li>
                                   <li class="dropdown-header">Fonts</li>
                                                  <li><a href="#">Glyphicon</a></li>
                                    <li><a href="#">Google Fonts</a></li>     -->

                                </ul>
                            </li>

                            <!-- Management sub-menu -->
                            <li class="col-sm-3 sub-menu-management hidden">
                                <ul>
                                    <li class="dropdown-header">BBA/BBM</li>

                                    <li><a href="#">GENERAL</a></li>
                                    <li><a href="#">TOURISM MANAGEMENT</a></li>
                                    <li><a href="#">BANKING</a></li>
                                    <li><a href="#">CORPORATE LAW</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>


                                </ul>
                            </li>
                            <li class="col-sm-3 sub-menu-management hidden">

                                <ul>
                                    <li class="dropdown-header">MBA/PGDM </li>


                                    <li><a href="#">FINANCE</a></li>
                                    <li><a href="#">HUMAN RESOURCES MANAGEMENT</a></li>
                                    <li><a href="#">MARKETING</a></li>                           <li><a href="#">OPERATIONS MANAGEMENT</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>
                                </ul>
                            </li>
                            <!-- End of Management sub-menu -->

                            <!-- Engineering sub-menu -->
                            <li class="col-sm-3 sub-menu-engineering hidden">
                                <ul>
                                    <li class="dropdown-header">BE/BTECH</li>

                                    <li><a href="#">COMPUTER SCIENCE</a></li>
                                    <li><a href="#">ELECTRONICS & COMMUNICATION</a></li>
                                    <li><a href="#">MECHANICAL ENGINEERING</a></li>
                                    <li><a href="#">CIVIL ENGINEERING</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>


                                </ul>
                            </li>
                            <li class="col-sm-3 sub-menu-engineering hidden">
                                <ul>
                                    <li class="dropdown-header">ME/MTECH</li>


                                    <li><a href="#">DESIGN ENGINEERING</a></li>
                                    <li><a href="#">INDUSTRIAL ENGINEERING</a></li>
                                    <li><a href="#">SOFTWARE ENGINEERING</a></li>
                                    <li><a href="#">CONTROL ENGINEERING</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>
                                </ul>
                            </li>
                            <!-- End of Engineering sub-menu -->


                            <!-- Medical sub-menu -->
                            <li class="col-sm-3 sub-menu-medical hidden">
                                <ul>
                                    <li class="dropdown-header">MBBS</li>

                                    <li><a href="#">GENERAL</a></li>

                                </ul>
                            </li>
                            <li class="col-sm-3 sub-menu-medical hidden">

                                <ul>
                                    <li class="dropdown-header">MS</li>

                                    <li><a href="#">SURGERY</a></li>
                                    <li><a href="#">ORTHOPAEDICS</a></li>
                                    <li><a href="#">E.N.T</a></li>
                                    <li><a href="#">OPHTHALMOLOGY</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>
                                </ul>
                            </li>
                            <!-- End of Medical sub-menu -->

                            <!-- Arts sub-menu -->
                            <li class="col-sm-3 sub-menu-arts hidden">
                                <ul>
                                    <li class="dropdown-header">BA</li>

                                    <li><a href="#">ENGLISH</a></li>
                                    <li><a href="#">GENERAL</a></li>
                                    <li><a href="#">ECONOMICS</a></li>
                                    <li><a href="#">HISTORY</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>


                                </ul>
                            </li>
                            <li class="col-sm-3 sub-menu-arts hidden">

                                <ul>
                                    <li class="dropdown-header">MA</li>


                                    <li><a href="#">SOCIAL WORK</a></li>
                                    <li><a href="#">MALAYALAM</a></li>
                                    <li><a href="#">ENGLISH</a></li>
                                    <li><a href="#">SANSKRIT</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>
                                </ul>
                            </li>
                            <!-- End of Arts sub-menu -->




                            <!-- Law sub-menu -->
                            <li class="col-sm-3 sub-menu-law hidden">
                                <ul>
                                    <li class="dropdown-header">LLB</li>

                                    <li><a href="#">CIVIL LAW</a></li>
                                    <li><a href="#">CORPORATE LAW</a></li>
                                    <li><a href="#">CRIMINAL LAW</a></li>
                                    <li><a href="#">INTELLECTUAL PROPERTY LAW</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>


                                </ul>
                            </li>
                            <li class="col-sm-3 sub-menu-law hidden">

                                <ul>
                                    <li class="dropdown-header">LLM</li>


                                    <li><a href="#">Navbar Inverse</a></li>
                                    <li><a href="#">Pull Right Elements</a></li>
                                    <li><a href="#">Coloured Headers</a></li>
                                    <li><a href="#">Primary Buttons & Default</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>
                                </ul>
                            </li>
                            <!-- End of Law sub-menu -->

                            <!-- Computer application sub-menu -->
                            <li class="col-sm-3 sub-menu-computer-application hidden">
                                <ul>
                                    <li class="dropdown-header">BCA</li>

                                    <li><a href="#">Auto Carousel</a></li>
                                    <li><a href="#">Carousel Control</a></li>
                                    <li><a href="#">Left & Right Navigation</a></li>
                                    <li><a href="#">Four Columns Grid</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>


                                </ul>
                            </li>
                            <li class="col-sm-3 sub-menu-computer-application hidden">




                                <ul>
                                    <li class="dropdown-header">MCA</li>

                                    <li><a href="#">GENERAL</a></li>
                                    <li><a href="#">DIGITAL EDUCATION</a></li>
                                    <li><a href="#">NETWORKING TECHNOLOGIES</a></li>             <li><a href="#">SOFTWARE ENGINEERING</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>
                                </ul>
                            </li>
                            <!-- End of Computer application sub-menu -->


                            <!-- Paramedical sub-menu -->

                            <li class="col-sm-3 sub-menu-paramedical hidden">
                                <ul>
                                    <li class="dropdown-header">MSC(NURSING)</li>

                                    <li><a href="#">OPTOMETRY</a></li>
                                    <li><a href="#">CARDIAC TECHNOLOGY</a></li>
                                    <li><a href="#">HEALTH CARE PERSONNEL</a></li>
                                    <li><a href="#">RADIOTHERAPY</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>

                                </ul>
                            </li>
                            <li class="col-sm-3 sub-menu-paramedical hidden">

                                <ul>
                                    <li class="dropdown-header">BSC(NURSING)</li>

                                    <li><a href="#">NURSING</a></li>
                                    <li><a href="#">PEDIATRICS</a></li>
                                    <li><a href="#">Coloured Headers</a></li>                    <li><a href="#">Primary Buttons & Default</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>
                                </ul>
                            </li>
                            <!-- End of Paramedical sub-menu -->

                            <!-- Aviation sub-menu -->
                            <li class="col-sm-3 sub-menu-aviation hidden">
                                <ul>


                                    <li class="dropdown-header">BSC(AVIATION)</li>

                                    <li><a href="#">AVIATION MANAGEMENT</a></li>
                                    <li><a href="#">FLIGHT ATTENDANTS</a></li>
                                    <li><a href="#">TRAINING</a></li>
                                    <li><a href="#">GENERAL</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>

                                </ul>
                            </li>
                            <li class="col-sm-3 sub-menu-aviation hidden">

                                <ul>
                                    <li class="dropdown-header">MSC(AVIATION)</li>

                                    <li><a href="#">Navbar Inverse</a></li>
                                    <li><a href="#">Pull Right Elements</a></li>
                                    <li><a href="#">Coloured Headers</a></li>
                                    <li><a href="#">Primary Buttons & Default</a></li>
                                    <li><a href="#" style="color: #1C5B75;"><b>+ view all courses</b></a></li>
                                </ul>
                            </li>
                            <!-- End of Aviation sub-menu -->

                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Much more</li>
                                    <li><a href="#">Easy to Customize</a></li>
                                    <li><a href="#">Calls to action</a></li>
                                    <li><a href="#">Custom Fonts</a></li>
                                    <li><a href="#">Slide down on Hover</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">COLLEGES <span class="caret caret-reversed"></span></a>
                        <ul class="dropdown-menu mega-dropdown-menu">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Features</li>
                                    <li><a href="#">Auto Carousel</a></li>
                                    <li><a href="#">Carousel Control</a></li>
                                    <li><a href="#">Left & Right Navigation</a></li>
                                    <li><a href="#">Four Columns Grid</a></li>

                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Plus</li>
                                    <li><a href="#">Navbar Inverse</a></li>
                                    <li><a href="#">Pull Right Elements</a></li>
                                    <li><a href="#">Coloured Headers</a></li>
                                    <li><a href="#">Primary Buttons & Default</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Much more</li>
                                    <li><a href="#">Easy to Customize</a></li>
                                    <li><a href="#">Calls to action</a></li>
                                    <li><a href="#">Custom Fonts</a></li>
                                    <li><a href="#">Slide down on Hover</a></li>
                                </ul>
                            </li>

                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Much more</li>
                                    <li><a href="#">Easy to Customize</a></li>
                                    <li><a href="#">Calls to action</a></li>
                                    <li><a href="#">Custom Fonts</a></li>
                                    <li><a href="#">Slide down on Hover</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">BLOG</a></li>
                    <li><a href="#">CAREER</a></li>
                    <li><a href="#" id="search-icon"><span class="fa fa-search"></span></a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"  data-toggle="dropdown" style="background-color: #0c9063;color: #fff;font-weight: bold;padding: 10px;margin-top: 5px;">SIGN IN <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">

                                        <form  action="javascript:void(0);" name="studloginform" method="post" id="studloginform">
                                            <div  class="form-group has-feedback">

                                                <label class="sr-only" for="studemailid">Email address</label>
                                                <input type="email" class="form-control" autocomplete="off" name="studemailid" id="studemailid" placeholder="Email">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label class="sr-only" for="studpassword">Password</label>
                                                <input type="password" class="form-control" id="studpassword" name="studpassword" placeholder="Password">
                                                <div class="help-block text-right"><a href="http://www.yescolleges.com/student-account-register">Forget password ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input id="studremember" type="checkbox"> keep me logged-in
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        <p>New here ?</p> <a href="http://www.yescolleges.com/student-account-register"><b>Sign up</b></a>
                                    </div>
                                </div>
                            </li>


                        </ul>

                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
            </div><!-- /.nav-collapse -->
        </nav>
    </section>

</header>