<!DOCTYPE html>
<html>
<head>
    <title>Yescolleges | Online Admission Portal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/126fe952f4.js"></script>

    <!-- Main style sheet -->
    <link href="<?=base_url();?>assets/frontend/style.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url();?>css/ionicons.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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





        /* Page Header */
        .page-header {
            margin: 60px 0px 40px;
            padding: 30px 0px;
            color: #999;
        }

        .page-header h3 {
            line-height: 0.88rem;
            color: #000;
            letter-spacing: 3px;
            font-weight: bold;
        }





        .mu-footer {
            background-color: #242c42;
            overflow-x: hidden;
        }



    </style>



</head>

<body>

<!-- Start menu -->
<section id="mu-menu">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand hidden-xs hidden-sm" href="<?=base_url();?>"><img class="img-responsive" src="<?=base_url();?>assets/frontend/img/logo-lat.gif"
                                                                                         style="margin-top:-6px;" alt="" width="100%" height="100%"></a>
            </div>

        </div>
    </nav>
</section>
<!-- End menu -->


<div class="container ">

    <div class="col-md-6 well "  style="margin-top: 20px;">
        <div class="row">
            <form>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter Your Name Here.." class="form-control">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>Email</label>
                            <input type="email" placeholder="Enter Your Email id here.." class="form-control">
                        </div>

                    <div class="col-sm-12 form-group">
                        <label>Mobile</label>
                        <input type="text" placeholder="Enter Mobile number Here.." class="form-control">
                    </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">

                           <label>State</label>
                            <select id="guest" name="guest" class="form-control ">

                                <option value="1" disabled selected>Select your city</option>
                                <option value="4">All</option>
                                <option value="2">College</option>
                                <option value="3">Course</option>

                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>City</label>
                            <select id="guest" name="guest" class="form-control ">

                                <option value="1" disabled selected>Select your state</option>
                                <option value="4">All</option>
                                <option value="2">College</option>
                                <option value="3">Course</option>

                            </select>
                        </div>

                    </div>


                    <div class="form-group">
                        <label>Address</label>
                        <textarea placeholder="Enter Address Here.." rows="2" class="form-control"></textarea>
                    </div>


                    <div class="col-sm-12 form-group">
                        <label>Confirm Password</label>
                        <input type="text" placeholder="Enter Your Password.." class="form-control">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>Confirm password</label>
                        <input type="text" placeholder="Re-enter your password Here.." class="form-control">
                    </div>

                    <button type="button" class="btn btn-lg btn-info">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>





<!-- Footer  -->




</body>
</html>