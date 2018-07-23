<!DOCTYPE html>
<html lang="en">
<head>
    <script> site_url="<?=base_url();?>"</script>
    <title><?php if($title==""){echo "Yescolleges.com";} else {echo $title;} ?></title>

    <meta charset="utf-8"/>
	<noscript>
	<style>html{display:none;}</style>
	<meta http-equiv="refresh" content="0.0;url=<?= base_url()?>no-script">
	</noscript>

    <link rel="shortcut icon" href="<?=base_url();?>assets/frontend/img/fav-icon.png" type="image/x-icon">
    <meta name="yandex-verification" content="1390fa802219a3b4" />
    <meta name="description" id="metanametag" content="<?php if($metadesc==""){echo "Yescolleges.com";} echo $metadesc;?>" />
    <meta name="keywords" id="metakeywordtag" content="<?php if($metaname==""){echo "Yescolleges.com";} echo $metaname;?>" />


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />


    <!-- Latest compiled and minified CSS -->
    <script src="https://yescolleges.azureedge.net/assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://yescolleges.azureedge.net/assets/backend/plugins/getBrowser.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/frontend/js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>assets/backend/bootstrap/css/bootstrap.min.css">
    <script src="https://yescolleges.azureedge.net/assets/backend/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://yescolleges.azureedge.net/assets/frontend/css/jquery-ui.css" />
    <link rel="stylesheet" href="https://yescolleges.azureedge.net/assets/frontend/css/owl.carousel.css" />
    <link rel="stylesheet" href="https://yescolleges.azureedge.net/assets/frontend/css/idangerous.swiper.css" />
     <link rel="stylesheet" href="<?=base_url();?>assets/backend/libs/css/font-awesome.min.css">
    <script src="https://yescolleges.azureedge.net/assets/backend/plugins/jQueryCookie/js.cookie.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/style.css" />
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,600,700,800' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css' />

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-102234321-1', 'auto');
        ga('send', 'pageview');

    </script>


    <style>
        #studloginform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
        #studregform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}

    </style>


    <style>
    .header-nav ul ul{
    left: -177px;
    }
    .header-nav ul ul.colleges{
    position: absolute;
    left: -265px;
    }
    .header-nav-mega-menu{
    background-color: #FFFFFF;
    height: 360px;
    margin-left: -100px;
    }
    .header-nav-mega-menu b{
    color: #1C5B75;
    text-transform: lowercase;
    }
    .mega-menu-dropdown{
    width: 555px;
    background-color: #000;
    display: block;
    left: -15px;
    top: 175px;
    position: absolute;
    }
    .mega-menu-dropdown-college {
    left: -102px;
    top: 175px;
    position: absolute;
    }

    .mega-menu ul{
    align-content: right;
    margin-left: 200px;
    margin-top: -175px;
    display: block;
    background-color: #FFFFFF;
    height: 360px;
    }
    .mega-menu-2 ul{
    align-content: right;
    margin-left: 390px;
    margin-top: -175px;
    display: block;
    background-color: #FFFFFF;
    height: 360px;

    }

    .mega-menu-3 ul{
    align-content: right;
    margin-left: 590px;
    margin-top: -175px;
    display: block;
    background-color: #FFFFFF;
    height: 360px;
    /*border: 2px solid red;*/
    }




    .header-nav h2{
    color: #ff7200;
    }
    .mega-menu-dropdown{

    }
    .mega-menu-dropdown li h2{
    /*text-align: center;*/

    }
    .mega-menu-dropdown li b{
    color: #1C5B75;
    }



    /* ------------------------------------------- */
    /* 	RESPONSIVE DESIGN: */
    /* ------------------------------------------- */


    @media only screen and (max-width: 1350px){

    .header-nav ul ul.courses{
    left: -277px;
    }
    .header-nav ul ul.colleges{
    position: absolute;
    left: -365px;
    }

    .mega-menu ul{
    align-content: right;
    margin-left: 100px;
    margin-top: -175px;
    display: block;
    background-color: #FFFFFF;
    height: 330px;
    }
    .mega-menu-2 ul{
    align-content: right;
    margin-left: 290px;
    margin-top: -175px;
    display: block;
    background-color: #FFFFFF;
    height: 330px;

    }

    .mega-menu-3 ul{
    align-content: right;
    margin-left: 490px;
    margin-top: -175px;
    display: block;
    background-color: #FFFFFF;
    height: 330px;
    /*border: 2px solid red;*/
    }

    }


    @media only screen and (max-width: 1130px) {

    .header-nav ul ul.courses{
    left: -287px;
    }
    .header-nav ul ul.colleges{
    position: absolute;
    left: -365px;
    }

    }
</style>

    <script>
        $( document ).ready(function() {
            // Handler for .ready() called.
            $(window).load(function(){
                $('#preloader').hide();
            });
        });
    </script>


    <style>
        .hidden{
            display: none;
        }
        .search-item {
            top: -220px;
            /*margin-top: 150px;*/
            margin-left: 10%;
            width: 80%;
            z-index: 99;
            /* position: absolute; */
        }
        .autorize-tab-a{
            padding-bottom: 26px;
        }
        .autorize-tab-b{
            padding-bottom: 26px;
        }
    </style>
<script>
   /* $(function(){

        console.log('name'+$.browser.name+" - version"+$.browser.version);
        if((($.browser.name=="Chrome" && $.browser.version<45)||($.browser.name=="Edge 14" && $.browser.version<45)||($.browser.name=="Internet Explorer")||($.browser.name=="Safari" && $.browser.version<3)||($.browser.name=="Firefox" && $.browser.version<48)))
        {
            window.location.href="browser-support-error";
        }


    });*/
 </script>
</head>
<body class="index-page">
<div id="preloader">
    <div id="spinner"></div>
</div>
<!-- // authorize // -->
<div class="overlay"></div>
<div class="autorize-popup text-center">
    <div class="autorize-tabs">
        <a href="#" class="autorize-tab-a current">Sign in</a>
        <a href="#" class="autorize-tab-b">Sign up</a>
        <a href="#" class="autorize-close"></a>
        <div class="clear"></div>
    </div>
    <section class="autorize-tab-content" style="margin-top:60px;">
        <div class="autorize-padding" >
            <form action="javascript:void(0);" autocomplete="off" novalidate id="studloginform" method="post">
            <h6 class="autorize-lbl" id="errorlogin">Welcome! Login in to Your Account</h6>
                <div class="form-group">
                    <label for="studemailid" class="error" style="color: red"></label>
                    <input type="text" autocomplete="off"  class="form-control"   id="studemailid" name="studemailid" placeholder="Email id">





                </div>
                <div class="form-group">
                    <label for="studpassword" class="error"></label>
            <input type="password" class="form-control" autocomplete="off" id="studpassword" name="studpassword" placeholder="Password">


                </div>

            <footer class="autorize-bottom">
                <div class="form-group col-md-8">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="studremember"> Remember Me
                        </label>
                    </div>
                </div>
                <button  class="authorize-btn pull-right" id="studloginbutton">Login</button>
                <a href="<?=base_url();?>student-account-register" class="pull-right authorize-forget-pass">Forgot your password?</a>

                <div class="clear"></div>
            </footer>
            </form>
        </div>
    </section>

    <section class="autorize-tab-content">
        <div class="autorize-padding">
      <h6 class="autorize-lbl" id="errorloginreg">Register for Your Account</h6>
            <form action="javascript:void(0);" novalidate id="studregform" method="post">

                <div class="form-group">
                    <label for="studfname" class="error"></label>
                    <input type="text" id="studfname" class="form-control" autocomplete="off" name="studfname" placeholder="ENTER YOUR FIRST NAME">
                </div>

                <div class="form-group">
                    <label for="studregemailid" class="error"></label>
            <input type="text" id="studregemailid" class="form-control" autocomplete="off" name="studregemailid" placeholder="ENTER YOUR EMAIL ID">
                </div>

                <div class="form-group">
                    <label for="studregmobile" class="error"></label>
                    <input type="text" id="studregmobile" class="form-control" autocomplete="off" name="studregmobile" placeholder="MOBILE NUMBER">
                </div>


                <div class="form-group">
                    <label for="studregpass" class="error"></label>
            <input type="password" id="studregpass" autocomplete="off" class="form-control" name="studregpass" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="studregcpass" class="error"></label>
            <input type="password" id="studregcpass" autocomplete="off" class="form-control" name="studregcpass"  placeholder="Confirm Password">
                </div>

            <footer class="autorize-bottom">
                <button class="authorize-btn"   id="studregbutton">Register</button>
                <div class="clear"></div>
            </footer>
            </form>
        </div>
    </section>
</div>
<!-- \\ authorize \\-->

<header id="top">





    <div class="header-b">
        <!-- // mobile menu // -->
        <!-- // mobile menu // -->
        <div class="mobile-menu">
            <nav>
                <ul>
                    <li><a href="<?=base_url();?>info">ONLINE ADMISSION</a>

                    </li>
                    <li><a href="<?=base_url();?>course-search">COURSES</a>

                    </li>
                    <li><a href="<?=base_url();?>search">COLLEGES</a>

                    </li>
                    <li><a href="<?=base_url();?>career">CAREER</a>

                    </li>
                    <!-- <li><a href="#">BLOG</a>
                        <ul>
                            <li><a href="about_us.html">about us style one</a></li>

                            <li><a href="services.html">services</a></li>
                            <li><a href="contacts.html">contact us</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Portfolio</a>
                        <ul>
                            <li><a href="portfolio_three_collumns.html">Portfolio three columns</a></li>
                            <li><a href="portfolio_four_collumns.html">portfolio four columns</a></li>
                            <li><a href="item_page.html">item page</a></li>
                            <li><a href="item_page_full_width.html">Item page full width style</a></li>
                        </ul>
                    </li> -->
                    <li><a href="<?=base_url();?>blog">BLOG</a>

                    </li>
                    <!-- <li><a href="#">Features</a>
                        <ul>
                            <li><a href="typography.html">typography</a></li>
                            <li><a href="shortcodes.html">shortcodes</a></li>
                            <li><a href="interactive_elements.html">interactive elements</a></li>
                            <li><a href="cover_galleries.html">cover galleries</a></li>
                            <li><a href="columns.html">columns</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-student-account"><a  href="javascript:void(0)" id="studentacc2">LOGIN</a></li>
                </ul>
            </nav>
        </div>
        <!-- \\ mobile menu \\ -->

        <!-- \\ mobile menu \\ -->

        <div class="wrapper-padding">
            <div class="header-logo"><a href="<?=base_url();?>"><img alt="" src="<?=base_url()?>assets/frontend/img/logo.png" /></a></div>
            <div class="header-right">



                <a href="#" class="menu-btn"></a>
                <nav class="header-nav" >
                    <ul>
                        <li><a href="<?=base_url();?>info">ONLINE ADMISSION</a>
                        <li><a href="#">COURSES</a>
                            <ul class="header-nav-mega-menu courses">
                                <li><h2>Top Categories</h2></li>
                                <li id="management"><a href="javascript:void(0);">Management</a>

                                </li>


                                <li id="engineering"><a href="javascript:void(0);">Engineering</a>

                                </li>


                                <li id="medical"><a href="javascript:void(0);">Medical</a>


                                </li>

                                <li id="arts"><a href="javascript:void(0);">Arts</a>

                                </li>
                                <li id="law"><a href="javascript:void(0);">Law</a></li>
                                <li id="computer-application"><a href="javascript:void(0);">Computer Application</a></li>
                                <li id="paramedical"><a href="javascript:void(0);">paramedical</a></li>
                                <li id="aviation"><a href="javascript:void(0);">Aviation</a></li>
                                <li><small><a href="<?=base_url()?>courses-category"><b>+ view all courses</b></a></small></li>
                            </ul>


                            <!-- mega menu -->

                            <!-- MANAGEMENT -->

                            <div class="mega-menu-dropdown sub-menu-management hidden">
                                <div class="mega-menu">
                                    <ul>
                                        <li><h2>BBA/BBM</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=LLB">LLB</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=airport-management">AIRLINE&AIRPORT MANAGEMENT</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=BBM">BBM REGULAR</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=avation">AVIATION</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=llb">LLB HONS</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=BBA">BBA</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-2" style="float: right;">
                                    <ul>



                                        <li><h2>MBA/PGDM</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=MBA">MBA</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=agriculture">AGRICULTUE BUSINESS MANAGEMENT</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=health-care">HEALTH CARE ADMINSTRATION</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=international-business">INTERNATIONAL BUSINESS</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>

                            </div>
                            <!-- END OF MANAGEMENT -->
                            <!-- ENGINEERING -->

                            <div class="mega-menu-dropdown sub-menu-engineering hidden">
                                <div class="mega-menu">
                                    <ul>
                                        <li><h2>BE/BTECH</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=B.tech-computer-science">COMPUTER SCIENCE</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=B.tech-electronics-and-communication">ELECTRONICS & COMMUNICATION</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=B.tech-mechanical-engineering">MECHANICAL ENGINEERING</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=B.tech-civil-engineering">CIVIL ENGINEERING</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=B.tech-electrical-engineering">ELECTRICAL ENGINEERING</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=B.tech-aernotical-engineering">AERNOTICAL ENGINEERING</a></li>

                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-2" style="float: right;">
                                    <ul>
                                        <li><h2>ME/MTECH</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=M.tech-structural-engineering"">STRUCTURAL ENGINEERING</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=M.tech-mechanical-engineering"">MECHANICAL ENGINEERING</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=M.tech-civil-engineering"">CIVIL ENGINEERING</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=M.tech-soil-and-water-engineering"">SOIL AND WATER ENGINEERING</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>

                            </div>
                            <!-- END OF ENGINEERING -->

                            <!-- MEDICAL -->

                            <div class="mega-menu-dropdown sub-menu-medical hidden">
                                <div class="mega-menu">
                                    <ul>
                                        <li><h2>MEDICAL</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=mbbs-allopathy">MBBS ALLOPATY</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=bams">BAMS</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=md-ortho">MD ORTHO</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=md-anaesthesiloigy">MD ANAESTHESILOIGY</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=md-paediatrics">MD PAEDIATRICS</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=md-homeopathy">MD HOMEOPATHY</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>






                                    </ul>
                                </div>
                                <div class="mega-menu-2" style="float: right;">
                                    <ul>
                                        <li><h2>MS</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=ms-anatomy">ANATOMY </a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ms-ent">ENT </a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ms-ophthalmology">OPTHALMOLOGY </a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ms-general-surgery">GENERAL SURGERY </a></li>

                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>

                            </div>
                            <!-- END OF MEDICAL -->


                            <!-- ARTS -->

                            <div class="mega-menu-dropdown sub-menu-arts hidden">
                                <div class="mega-menu">
                                    <ul>
                                        <li><h2>BA</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=ba-english">ENGLISH</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ba-tamil">TAMIL</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ba-economics">ECONOMICS</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ba-ociology">SOCIOLOGY</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ba-history">HISTORY</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ba-political-science">POLITICAL SCIENCE</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-2" style="float: right;">
                                    <ul>
                                        <li><h2>MA</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=ma-sociology">SOCIOLOGY </a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ma-malayalam">MALAYALAM</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ma-english">ENGLISH</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ma-economics">ECONOMICS</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ma-tamil">TAMIL</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=ma-history">HISTORY</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>

                            </div>
                            <!-- END OF ARTS -->

                            <!-- LAW -->

                            <div class="mega-menu-dropdown sub-menu-law hidden">
                                <div class="mega-menu">
                                    <ul>
                                        <li><h2>LLB</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=llb-hons">LLB HONS</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=llb-integrated">LLB INTEGRATED </a></li>
                                        <li><a href="<?=base_url();?>course-search?course=bca-llb">BCA LLB</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=bba-llb">BBA LLB</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=bcom-llb">BCOM LLB  </a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-2" style="float: right;">
                                    <ul>
                                        <li><h2>LLM</h2></li>
                                        <li><a href="<?=base_url();?>course-search?course=llm">LLM </a></li>
                                        <li><a href="<?=base_url();?>course-search?course=llm-property-law">LLM PROPERTY LAW</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=llb-commercial-law">LLM COMMERCIAL LAW</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=llm-business-law">LLM BUSINESS LAW</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=llm-constitutional-law">LLM CONSTITUTIONAL LAW AND HUMAN RIGHTS</a></li>
                                        <li><a href="<?=base_url();?>course-search?course=llm-labour-law">LLM LABOUR LAW AND ADMINISTRATION LAW</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>

                            </div>
                            <!-- END OF LAW -->

                            <!-- COMPUTER APPLICATION -->

                            <div class="mega-menu-dropdown sub-menu-computer-application hidden">
                                <div class="mega-menu">
                                    <ul>
                                        <li><h2>BCA</h2></li>
                                        <li><a href="<?=base_url()?>course-search?course=bca">BCA </a></li>
                                        <li><a href="<?=base_url()?>course-search?course=bca-llb-hons">BCA LLB HONS</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-2" style="float: right;">
                                    <ul>
                                        <li><h2>MCA</h2></li>

                                    </ul>
                                </div>

                            </div>
                            <!-- END OF COMPUTER APPLICATION -->

                            <!-- PARAMEDICAL -->

                            <div class="mega-menu-dropdown sub-menu-paramedical hidden">
                                <div class="mega-menu">
                                    <ul>
                                        <li><h2>BSC(NURSING)</h2></li>
                                        <li><a href="<?=base_url()?>course-search?course=optometry">OPTOMETRY</a></li>
                                        <li><a href="<?=base_url()?>course-search?course=radio-therapy">RADIO THERAPY</a></li>
                                        <li><a href="<?=base_url()?>course-search?course=imaging-tech">IMAGING TECH</a></li>
                                        <li><a href="<?=base_url()?>course-search?course=cardioc-tech">CARDIOC TECH</a></li>
                                        <li><a href="<?=base_url()?>course-search?course=anesthesia-tech">ANESTHESIA TECH</a></li>

                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-2" style="float: right;">
                                    <ul>
                                        <li><h2>MSC(NURSING)</h2></li>
                                        <li><a href="">NURSING</a></li>
                                        <li><a href="">PEDIATRICS</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>

                            </div>
                            <!-- END OF PARAMEDICAL -->

                            <!-- AVIATION -->

                            <div class="mega-menu-dropdown sub-menu-aviation hidden">
                                <div class="mega-menu">
                                    <ul>
                                        <li><h2>BSC(AVIATION)</h2></li>
                                        <li><a href="">AVIATION MANAGEMENT</a></li>
                                        <li><a href="">FLIGHT ATTENDANTS TRAINING</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-2" style="float: right;">
                                    <ul>
                                        <li><h2>MSC(AVIATION)</h2></li>
                                        <li><a href="">AVIATION MANAGEMENT</a></li>
                                        <li><a href="">FLIGHT ATTENDANTS TRAINING</a></li>
                                        <li><a href="<?=base_url()?>courses-category"><b><small>+ VIEW MORE</small></b></a></li>
                                    </ul>
                                </div>

                            </div>
                            <!-- END OF AVIATION -->




                            <!-- end of mega-menu -->


                        </li><!-- END OF COURSES -->




                        <li><a href="#">COLLEGES</a>
                            <ul style="margin-left:120px;">
                                <li><a href="<?=base_url();?>allcolleges?page=1">All Colleges</a></li>
                                <li><a href="<?=base_url();?>top-colleges">Top colleges</a></li>
                                <li><a href="<?=base_url();?>search">Featured colleges</a></li>
                                <li><a href="<?=base_url();?>search">Colleges by location</a></li>
                              <!--  <li><a href="flight_detail.html">Compare colleges</a></li>-->
                                <li><a href="<?=base_url();?>college-reviews">College reviews</a></li>
                                <li><a href="<?=base_url();?>course-content-section?page=1">course section</a></li>


                            </ul>
                        </li>
                        <li><a href="<?=base_url();?>career">CAREER</a>

                        </li>
                        <li><a href="<?=base_url();?>blog">BLOG</a>

                        </li>




                        <li class="nav-student-account"><a  href="javascript:void(0)" id="studentacc" style="font-weight: bold;color: #575d66;">LOGIN | REGISTER</a></li>


                    </ul>
                </nav>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>


<script>
    $(document).ready(function(){
        $('.sub-menu-management').removeClass('hidden');
    });
</script>

<script type="text/javascript">

    $("#management").hover(function(){
        $('.sub-menu-management').removeClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
    });

    $("#engineering").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').removeClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
    });

    $("#medical").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').removeClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
    });

    $("#arts").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-arts').removeClass('hidden');
    });

    $("#law").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-law').removeClass('hidden');
    });

    $("#computer-application").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-computer-application').removeClass('hidden');
    });

    $("#paramedical").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-paramedical').removeClass('hidden');
    });

    $("#aviation").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-aviation').removeClass('hidden');
    });

</script>
