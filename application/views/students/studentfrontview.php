<!DOCTYPE html>
<html>
<style type="text/css">

    #newmobileform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: right;}
    #studentqualificationtenform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: right;}
    #studentqualification12form label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: right;}
    #completeprofileform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: right;}
    #studenteditpasswordform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: right;}

</style>

<style>
    /*    --------------------------------------------------
	:: General      STUDENT COLLEGE LIST STYLE
	-------------------------------------------------- */

    .content h1 {
        text-align: center;
    }
    .content .content-footer p {
        color: #6d6d6d;
        font-size: 12px;
        text-align: center;
    }
    .content .content-footer p a {
        color: inherit;
        font-weight: bold;
    }

    /*	--------------------------------------------------
        :: Table Filter
        -------------------------------------------------- */
    .panel {
        border: 1px solid #ddd;
        background-color: #fcfcfc;
    }
    .panel .btn-group {
        margin: 15px 0 30px;
    }
    .panel .btn-group .btn {
        transition: background-color .3s ease;
    }
    .table-filter {
        background-color: #fff;
        border-bottom: 1px solid #eee;
    }
    .table-filter tbody tr:hover {
        cursor: pointer;
        background-color: #eee;
    }
    .table-filter tbody tr td {
        padding: 10px;
        vertical-align: middle;
        border-top-color: #eee;
    }
    .table-filter tbody tr.selected td {
        background-color: #eee;
    }
    .table-filter tr td:first-child {
        width: 38px;
    }
    .table-filter tr td:nth-child(2) {
        width: 35px;
    }
    .ckbox {
        position: relative;
    }
    .ckbox input[type="checkbox"] {
        opacity: 0;
    }
    .ckbox label {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .ckbox label:before {
        content: '';
        top: 1px;
        left: 0;
        width: 18px;
        height: 18px;
        display: block;
        position: absolute;
        border-radius: 2px;
        border: 1px solid #bbb;
        background-color: #fff;
    }
    .ckbox input[type="checkbox"]:checked + label:before {
        border-color: #2BBCDE;
        background-color: #2BBCDE;
    }
    .ckbox input[type="checkbox"]:checked + label:after {
        top: 3px;
        left: 3.5px;
        content: '\e013';
        color: #fff;
        font-size: 11px;
        font-family: 'Glyphicons Halflings';
        position: absolute;
    }
    .table-filter .star {
        color: #ccc;
        text-align: center;
        display: block;
    }
    .table-filter .star.star-checked {
        color: #F0AD4E;
    }
    .table-filter .star:hover {
        color: #ccc;
    }
    .table-filter .star.star-checked:hover {
        color: #F0AD4E;
    }
    .table-filter .media-photo {
        width: 35px;
    }
    .table-filter .media-body {
        display: inline;
        /* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
    }
    .table-filter .media-meta {
        font-size: 11px;
        color: #999;
    }
    .table-filter .media .title {
        color: #2BBCDE;
        font-size: 14px;
        font-weight: bold;
        line-height: normal;
        margin: 0;
    }
    .table-filter .media .title span {
        font-size: .8em;

    }
    .table-filter .media .title span.pagado {
        color: #5cb85c;
    }

    .table-filter .media .summary {
        font-size: 14px;
    }
</style>
<link rel="stylesheet" href="<?= base_url()?>assets/backend/libs/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?= base_url()?>assets/backend/libs/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url()?>assets/backend/dist/css/AdminLTE.min.css">
<head>
    <title>Yescolleges | Online Admission Portal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/126fe952f4.js"></script>

    <!-- Main style sheet -->
    <link href="<?=base_url()?>assets/frontend/style.css" rel="stylesheet" type="text/css">

    <link  href="http://fonts.googleapis.com/css?family=Roboto:sans-serif" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/fav-icon.gif" type="image/x-icon">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>


        .college-profile{
            background-image: url('cover-2.jpg');
            height: 350px;
            width: 100%;
        }

        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
            color: #fff;
            background-color: #f1ae48;
        }
        .nav-pills>li>a {
            border-radius: 0px;
            padding-right: 1em;
            padding-left: 1em;
        }


        .nav-pills>li>a {
            border-radius: 0px;
            padding-right: 1.5em;
            padding-left: 1.5em;
            color: #AAA;
        }


        .bg-grey{
            background-color: #DEDEDE;
        }


    </style>

</head>

<body>



<section>
    <div class="container-fluid img-responsive">
        <div class="row">



            <div class="col-sm-12">
                <!-- Start menu -->
                <section id="mu-menu">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- LOGO -->
                                <!-- TEXT BASED LOGO -->
                                <a class="navbar-brand" href="index.html"><img class="img-responsive" src="<?=base_url();?>assets/frontend/img/logo-lat.gif"
                                                                               style="margin-top:-6px; "  alt="" width="100%" height="100%"></a>


                            </div>


                            <div id="navbar" class="navbar-collapse collapse">
                                <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                                    <li>  <a href="<?=base_url();?>search-result" >Search Colleges</a></li>
                                    <li>  <a href="" data-toggle="modal"  data-target=".requestbox">College Requests</a></li>
                                    <li><a href="<?=base_url();?>user-accout-signout">Logout</a></li>
                                </ul>
                            </div>
                        </div><!--/.nav-collapse -->
                        </nav>
                    </section>
            </div>
            </div>

<!-- End menu -->


        <div class="modal fade requestbox" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <button type="button" id="dismissbutton" hidden style="display: none;" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4 class="modal-title pull-left">
                                        <img src="<?= base_url()?>assets/images/logo-lat.gif">

                                    </h4>
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <button type="button" class=" btn btn-success btn-filter"  data-target="requests">All Requests</button>

                                        </div>
                                    </div>
                                    <div class="table-container">
                                        <table class="table table-filter">
                                            <tbody id="requesttable">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>


        <div class="modal fade completeprofile " id="completeprofilemodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content" style="border-color: #687589;border-width: 6px">

                    <div class="modal-header">
                        <h4 class="modal-title pull-left">
                            <img src="<?= base_url()?>assets/images/logo-lat.gif">

                        </h4>
                        <button type="button" id="dismissbutton" hidden style="display: none;" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        </div><p style="font-weight: 200;font-family: cursive" class="text-center">Complete your profile</p>
                    <div class="register-box-body" id="register_form" >


                        <form  action="javascript:void(0);" id="completeprofileform" method="post">
                            <div class="form-group has-feedback">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                               
                                <input type="text" class="form-control" id="firstname" value="<?=$username;?>" name="firstname" placeholder="First name">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <input type="text" class="form-control" id="lastname" value="<?=$lastname;?>" name="lastname" placeholder="Last name">
                                <span class="help-block"></span>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 has-feedback">
                                    <select id="gender" name="gender" class="form-control ">

                                        <option value="<?=$gender;?>"  selected="">Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6 has-feedback">
                                    <span class=" form-control-feedback"></span>
                                    <input type="date" class="form-control" value="<?=$dob;?>" id="dob" name="dob" placeholder="Date of birth">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                <input type="text" class="form-control" id="contactno" name="contactno" value="<?=$phoneno;?>"  placeholder="Mobile number">
                                <span class="help-block"></span>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 has-feedback">
                                    <select id="state" name="studstate" class="form-control ">



                                    </select>
                                </div>
                                <div class="form-group col-md-6 has-feedback">
                                    <select id="district" value="<?=$city;?>" name="studcity" class="form-control ">



                                    </select>
                                </div>
                            </div>


                            <!-- /.col -->
                            <div class="row">
                                <div class="col-xs-12">

                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Save your profile</button>
                                    </div>
                            </div>
                                <!-- /.col -->

                        </form>



                    </div>


                </div>
            </div>
        </div>


        <button id="probutton" hidden style="display:none" data-toggle="modal"  data-target=".completeprofile" >dd</button>



    </div>
    <!-- /.login-box-body -->




<section>

    <div class="col-sm-2 emblem">
     <!--   <img src="<?=base_url();?>assets/frontend/student/studimages/akhila.jpg" style="margin-top:20px;" class="img-thumbnail" alt="Cinque Terre" width="80%" height="80%">-->
        <img class="profile-user-img img-responsive img-thumbnail"   id="propictriger" style="margin-top:20px;" title="change picture!..(180px  X 200 px : 50KB)" style="cursor: pointer;" src="<?=base_url();?>assets/backend/images/studimages/<?=$photo; ?>" alt="<?=$username; ?>">
        <form name="propicform" id="propicform" >
            <input type="file" name="propic" id="propic" style="display:none;visiblity:hidden;z-index:99999;">

        </form>

    </div>

    <div class="col-sm-10" style="margin-top:40px;">
        <h2><?=$username;?>&nbsp;<?=$lastname;?></h2>
        <h4><span class="glyphicon glyphicon-map-marker">&nbsp;<?=$state;?>,<?=$city;?></span></h4>


    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-11 col-sm-offset-1">
                <ul class="nav nav-pills" style="">
                    <li class="active"><a data-toggle="pill" href="#home">INFO</a></li>
                    <li><a data-toggle="pill" href="#menu1">QUALIFICATIONS</a></li>
                    <li><a data-toggle="pill" href="#menu2">GENERAL SETTINGS</a></li>
                    <!--<li><a data-toggle="pill" href="#menu3">ACCOUNT SETTINGS</a></li>
                    <li><a data-toggle="pill" href="#menu4">REVIEWS</a></li>-->


                </ul>



                <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a class="navbar-brand hidden-xs hidden-sm" href="<?=base_url();?>"><img class="img-responsive" src="<?=base_url();?>assets/frontend/img/logo-lat.gif"
                                                                                                         style="margin: 0 auto;"  alt="" width="100%" height="100%"></a>

                                <button type="button" id="qualdismissbutton" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span></button>

                                <div class="col-md-12" >
                                    <div  id="registercontainer"  style="color: red;" >
                                        <p id="registermessages" style="text-align:center">

                                        </p>

                                    </div>


                                </div>
                            </div>
                            <div class="register-box-body" id="studentqualificationten" >

                                <form  action="javascript:void(0);" id="qualificationform" method="post">
                                    <div class="form-group  has-feedback">


                                        <label for="qualificationname">Select your qualification</label>
                                        <select id="qualificationname" name="qualificationname" class="form-control ">

                                            <option value="" disabled selected>Select your type of qualification</option>

                                            <option value="S.S.L.C">S.S.L.C</option>
                                            <option value="Plus two">Plus two</option>
                                            <option value="Degree(B.com)">Degree(B.com)</option>
                                            <option value="Degree(B.sc)">Degree(B.sc)</option>
                                            <option value="B.tech">B.tech</option>
                                            <option value="Diploma">Diploma</option>

                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 has-feedback">


                                            <label for="qualificationyear">Year of completion</label>


                                      <select id="qualificationyear" name="qualificationyear" class="form-control ">

                                                <option value="" disabled selected>Select your year</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                                <option value="2005">2005</option>
                                                <option value="2006">2006</option>
                                                <option value="2007">2007</option>
                                                <option value="2008">2008</option>
                                                <option value="2009">2009</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 has-feedback">
                                            <label for="board">Select your board</label>
                                            <select id="board" name="board" class="form-control ">

                                                <option value="" disabled selected>Select your board</option>
                                                <option value="STATE">STATE</option>
                                                <option value="ICSE">ICSE</option>
                                                <option value="CBSE">CBSE</option>
                                                <option value="Others">Others</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group  has-feedback">
                                        <label for="qualificationmarks">Marks in %</label>
                                        <select id="qualificationmarks" name="qualificationmarks" class="form-control ">

                                            <option value="" disabled selected>Select your marks</option>
                                            <option value="lessthan 50%">lessthan 50%</option>
                                            <option value="40%-50%">40%-50%</option>
                                            <option value="50%-60%">50%-60%</option>
                                            <option value="60%-70%">60%-70%</option>
                                            <option value="70%-80%">70%-80%</option>
                                            <option value="80%-90%">80%-90%</option>
                                            <option value="90%-100%">90%-100%</option>

                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <span class=" form-control-feedback"></span>
                                        <button type="submit" id="classtensave" class="btn btn-primary btn-block btn-flat">Save your qualification details</button>
                                    </div>



                                </form>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bs-example-modal-md2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a class="navbar-brand hidden-xs hidden-sm" href="<?=base_url();?>"><img class="img-responsive" src="<?=base_url();?>assets/frontend/img/logo-lat.gif"
                                                                                                         style="margin: 0 auto;"  alt="" width="100%" height="100%"></a>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span></button>

                                <div class="col-md-12" >

                                    <div  id="registercontainer"  style="color: red;" >
                                        <p id="registermessages" style="text-align:center">

                                        </p>

                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <br>
                        <h4>PERSONAL INFORMATIONS</h4>
                        <hr>
                        <span><br>

                            <b><span class="glyphicon glyphicon-envelope"></b> &nbsp;<?=$emailid?><br>
                            <hr style=" display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 0.1em;">
                             <b><span class="glyphicon glyphicon-earphone"></b> &nbsp;<?=$phoneno;?></span><br>

                            <hr  style=" display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 0.08em;">
                            <b>Course intrested :<span "></b> &nbsp;Add course name here</span><br>
                            <hr  style=" display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 0.08em;">
                            <b>User last login at : </b> &nbsp;<?=$logdate;?> <span id="lastlogdate"></span><br>



                        <section>

                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-1">
                                        <h3 style="color: #f1ae48;"><b>PREFERED COLLEGES</b> </h3>
                                        <div class="col-sm-3 text-center">
                                            <div class="thumbnail">
                                                <a href="college-page.html"><img src="http://placehold.it/360x240" alt="">
                                                    <h4>COLLEGE</h4></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <div class="thumbnail">
                                                <a href="college-page.html"><img src="http://placehold.it/360x240" alt="">
                                                    <h4>COLLEGE</h4></a>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 text-center">
                                            <div class="thumbnail">
                                                <a href="college-page.html"><img src="http://placehold.it/360x240" alt="">
                                                    <h4>COLLEGE</h4></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <div class="thumbnail">
                                                <a href="college-page.html"><img src="http://placehold.it/360x240" alt="">
                                                    <h4>COLLEGE</h4></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <br>
                        <h4>QUALIFICATION DETAILS</h4>
                        <hr style=" display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 0.1em;">

                        <b><span  class="glyphicon glyphicon-plus-sign"></b> &nbsp;<a href="" data-toggle="modal"  data-target=".bs-example-modal-md"> Add/Edit details</a><br>

                        <br>
                        <table class="table" id="notableshow">

                            <tbody id="nodata">
                            </tbody>
                        </table>

                        <table class="table" id="qualificationtable" border="1px" >

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Qualification name</th>
                                <th>Marks (in percent)</th>
                                <th>Passdate (in year)</th>
                                <th>University/Board</th>

                            </tr>
                            </thead>
                            <tbody id="tableshow">
                            </tbody>

                        </table>



                        <hr>
                       <!-- <h4 id="title">Not found</h4>

                        <h5><b>Class of <span id="year">2012</span></b></h5>
                        <h5><b><span id="university"></span></b></h5>
                        <h5><b>Marks obtained:</b>&nbsp;<span id="marks"></span></h5>
                        -->
                        <br>

                        <hr>


                    </div>
                    <br>




                    <div class="modal fade editpassword" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a class="navbar-brand hidden-xs hidden-sm" href="<?=base_url();?>"><img class="img-responsive" src="<?=base_url();?>assets/frontend/img/logo-lat.gif"
                                                                                                             style="margin: 0 auto;"  alt="" width="100%" height="100%"></a>

                                    <button type="button" id="passdismissbutton" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">x</span></button>

                                </div>
                                <div class="register-box-body" id="studenteditpassword" >

                                    <form  action="javascript:void(0);" id="studenteditpasswordform" method="post">


                                        <div class="row">
                                            <div class="form-group  has-feedback">
                                                <label for="newpass">Enter new password (min 6 charactors)</label>


                                                <input type="password" name="newpass" placeholder="Enter your new password" id="newpass" class="form-control"><br>
                                                <input type="password" name="cnewpass" placeholder="Confrim password" id="cnewpass" class="form-control"><br>
                                                <input type="password" name="oldpass" placeholder="Enter your old password" id="oldpass" class="form-control">

                                            </div>

                                        </div>


                                        <div class="form-group ">
                                            <span class=" form-control-feedback"></span>
                                            <button type="submit" id="resetstudpassword" class="btn btn-primary pull-right">Reset password</button>
                                            <button type="reset" data-dismiss="modal" id="studpassworddiscard" class="btn btn-primary ">Cancel</button>
                                        </div>



                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="menu2" class="tab-pane fade">
                        <h4>CHANGE YOUR DETAILS</h4>
                        <hr><span class="pull-right"><a href="" class="glyphicon glyphicon-edit" data-toggle="modal"  data-target=".completeprofile">Edit Profile</a></span>

                        <h5><span class="glyphicon glyphicon-calendar">&nbsp;<?=$dob;?></span></h5>
                        <hr style=" display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">
                        <h5><span class="glyphicon glyphicon-map-marker">&nbsp;<?=$state;?>,<?=$city;?></span></h5>
                        <hr style=" display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">

                        <h5><span class="glyphicon glyphicon-lock">&nbsp;</span>******************<span class="pull-right"><a href="" class="glyphicon glyphicon-edit" data-toggle="modal"  data-target=".editpassword">Reset Password</a></span></h5>
                        <hr style=" display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">


                        <br>
                    </div>








                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <h3>GALLERY</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>



<!-- similar colleges -->




<!--


<section>
<!-- Start footer -->


    <!-- Footer  -->

    <footer class="nb-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about">
                        <!--<img src="" class="img-responsive center-block" alt="IMAGE-LOGO">-->
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, non temporibus sed, ipsum molestias quasi officia harum possimus omnis doloremque expedita minima earum assumenda sit cum dolorem incidunt ipsa. Ipsam.</p>

                        <div class="social-media">
                            <ul class="list-inline">
                                <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-info-single">
                        <h2 class="title">Help Center</h2>
                        <ul class="list-unstyled">
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> How to Pay</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> FAQ's</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Sitemap</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Delivery Info</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-info-single">
                        <h2 class="title">Customer information</h2>
                        <ul class="list-unstyled">
                            <li><a href="<?=base_url();?>institution-login" title=""><i class="fa fa-angle-double-right"></i> College Login</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> FAQ's</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Sell Your Items</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> RSS</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-info-single">
                        <h2 class="title">Security & privacy</h2>
                        <ul class="list-unstyled">
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Terms Of Use</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Return / Refund Policy</a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Store Locations</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-info-single">
                        <h2 class="title">NEWSLETTER</h2>
                        <p>Subscribe to our news letter for latest update, news & academic offers :</p>
                        <p>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="enter e-mail..">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                      </span>
                        </div><!-- /input-group -->
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <section class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Copyright &copy; 2017 Yescolleges. All rights reserved.</p>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </section>
    </footer>


<!-- End footer -->
</section>



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



</body>
<script type="text/javascript" src="<?= base_url()?>assets/backend/plugins/state/state.js"></script>
<script src="<?=base_url();?>assets/backend/scripts/student/stud_profiles.js"></script>
<script src="<?= base_url()?>assets/backend/plugins/jQueryValidation/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        isprofilecomplete();
        completeprofile();
        uploadstudpicture();
        savestudphoto();
        savequalification();

        getalldata();
        resetpassword();

        getrequests();


    });
</script>

<script>
    $(document).ready(function () {

        $('.star').on('click', function () {
            $(this).toggleClass('star-checked');
        });

        $('.ckbox label').on('click', function () {
            $(this).parents('tr').toggleClass('selected');
        });

        $('.btn-filter').on('click', function () {
            var $target = $(this).data('target');
            if ($target != 'requests') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
            }
        });

    });
</script>
</html>