<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Profile and Password<small>user  profile and password can be managed here</small> </h1>
     <ol class="breadcrumb"><li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">User Profile Setting</li></ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"   src="assets/backend/images/collegelogo/<?=$logo; ?>" title="<?=$title; ?>">
                        <h3 class="profile-username text-center" id="susername"><?=$username; ?></h3>

                         <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Email ID</b> <a class="pull-right" id="semailid"><?=$emailid; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Mobile no</b> <a class="pull-right" id="sconatctno"><?=$contactno; ?></a>
                            </li>
                             <li class="list-group-item">
                                 <b>Last Login date</b><a class="pull-right" id="slogdate"><?=$logdate; ?></a>
                             </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="nav-tabs-custom " style="border-top-color:red; ">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile Data</a></li>
                        <li><a href="#passsetting" data-toggle="tab">Password Setting</a></li>
                   </ul>
                    <div class="tab-content ">
                        <div class="active tab-pane" id="profile">
                            <form class="form-horizontal" name="Profileform" id="Profileform" method="post">
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">User name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control hidden-border" name="username"  id="username" value="<?=$username;?>" placeholder="User name">
                                              <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mobileno" class="col-sm-2 control-label">Phone no</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control hidden-border"  name="contactno" id="contactno" value="<?=$contactno;?>"  placeholder="Mobile no">
                                              <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn bg-gray-active pull-right ajax"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                            <!-- /.post -->
            
                            
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="passsetting">

                            <form class="form-horizontal" name="PasswordForm" id="PasswordForm" method="post">
                                <div class="form-group">
                                    <label for="oldpass" class="col-sm-3 control-label">Old Password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control hidden-border" name="oldpass" id="oldpass" placeholder="Old Password">
                                         <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="newpass" class="col-sm-3 control-label">New Password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control hidden-border" name="newpass" id="newpass" placeholder="New Password">
                                         <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reppass" class="col-sm-3 control-label">Repeat Password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control hidden-border" name="reppass" id="reppass" placeholder="Repeat Password">
                                         <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn bg-gray-active pull-right ajax"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
 

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

 <script>
     $("#usersidebar").css('color','white');
 </script>
<script type="text/javascript" src="<?= base_url()?>assets/backend/Orgscripts/in_userprofile.js"></script>
    <!-- here goes script content   -->

    </div>