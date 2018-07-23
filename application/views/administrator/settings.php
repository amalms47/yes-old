<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Account Settings <small>administrator account details management</small> </h1>
        <ol class="breadcrumb"><li><a href="<?= base_url()?>admin-home"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Profile Setting</li></ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" title="change picture!..(150px  X 150px : 50KB)" style="cursor: pointer;" src="<?=$photo; ?>" alt="<?=$fullname; ?>">
                            <p style="text-align: center;"><button class="btn  btn-primary btn-xs"  id="propictriger">Change photo</button></p>
                        <form name="propicform" id="propicform" >                        
                        <input type="file" name="propic" id="propic" style="display:none;visiblity:hidden;z-index:99999;">
                        </form>
                        <h3 class="profile-username text-center"><?=$fullname;?></h3>

                         <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Email ID</b> <a class="pull-right"><?=$emailid;?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Mobile no</b> <a class="pull-right"><?=$phoneno; ?></a>
                            </li>
                             <li class="list-group-item">
                                 <b>Last Login</b><a class="pull-right"><?=$logdate; ?></a>
                             </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="nav-tabs-custom tab-primary " style="border-top-color:red; ">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile Data</a></li>
                        <li><a href="#passsetting" data-toggle="tab">Password Setting</a></li>
                   </ul>
                    <div class="tab-content ">
                        <div class="active tab-pane " id="profile">
                            <form class="form-horizontal" name="Profileform" id="Profileform" method="post">
                                <div class="form-group">
                                    <label for="fullname" class="col-sm-2 control-label">Full name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fullname"  id="fullname" value="<?=$fullname;?>" placeholder="Full name">
                                              <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">User name</label>
                                    <div class="col-sm-10">
                                        <input type="text" disabled class="form-control" name="username"  id="username" value="<?=$username;?>" placeholder="User name">
                                              <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailid" class="col-sm-2 control-label">Email ID</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="emailid" id="emailid"  value="<?=$emailid;?>"  placeholder="Email ID">
                                              <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobileno" class="col-sm-2 control-label">Phone no</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="phoneno" id="phoneno" value="<?=$phoneno;?>"  placeholder="Mobile no">
                                              <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Save</button>
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
                                        <input type="password" class="form-control" name="oldpass" id="oldpass" placeholder="Old Password">
                                         <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="newpass" class="col-sm-3 control-label">New Password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="newpass" id="newpass" placeholder="New Password">
                                         <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reppass" class="col-sm-3 control-label">Repeat Password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="reppass" id="reppass" placeholder="Repeat Password">
                                         <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Save</button>
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

    <!-- here goes script content   -->
    <script>
        $("#profilesidebar").css('color','white');
    </script>
<script type="text/javascript" src="<?= base_url()?>assets/backend/scripts/adm_profile.js?ol"></script>
    <script type="text/javascript">
        $(document).ready(function ()
        {
            saveprofile();
            savepasword();
            savephoto();
            uploadpicture();
        });
    </script>
    <!-- here goes script content   -->

    </div>