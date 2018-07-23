<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Administrator List<small>manage all site sub- admin in yes college.com</small></h1>
<ol class="breadcrumb">
<li><a href="<?= base_url()?>admin-home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="javascript:void(0);"><i class="fa fa-users"></i> Sub-Administrator</a></li>
</ol>
</section>
<section class="content">
 
<div class="row">    
    
<div class="col-md-12">
<div class="box box-solid">
<div class="box-header with-border">
<button type="submit" class="btn btn-default" id="new_button"><i class="fa  fa-user-plus"></i> New</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="text-center text-green" id="ccustom_message" ></label>
</div>
<div class="box-body" id="adminbody">
 
</div>
 </div>
</div>   
    
 </div>
 <!-- insert or edit form for administrator -->   

<div class="modal" id="adminform">
<form name="admin_form" id="admin_form" method="POST" action="javascript:void(0);">   
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-blue-active">
<button type="button" class="close" id="subadmindismiss" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span></button>
<h4 class="modal-title"><i class="fa  fa-user-plus"></i> Administrator Information</h4>
</div>
<div class="modal-body">

<div class="form-group ">
<label class="control-label" for="fullname"><i class="fa  fa-user"></i> Full name</label><input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter administrator full name">
<span class="help-block"></span>
</div>
<div class="form-group">
<label class="control-label" for="role"><i class="fa  fa-user"></i> Administrator role </label>
<select class="form-control" name="role" id="role">
<option value="">Choose Administrator Role</option>
<!--<option value="admin">Super Adminstrator Role(View All)</option>-->
 <option value="finance">Financial Role(View Only Financial Pages)</option>
 <option value="data">Data Entry Administration(View Only Data Entry Pages)</option>
</select>
</div>
<div class="form-group ">
<label class="control-label" for="emailid"><i class="fa  fa-envelope"></i> Email ID </label><input type="text" class="form-control" name="emailid" id="emailid" placeholder="Enter administrator emailid">
<span class="help-block"></span>
</div>        
<div class="form-group">
<label class="control-label" for="phoneno"><i class="fa  fa-mobile"></i> Mobile no</label><input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="Enter administrator mobile no">
<span class="help-block"></span>
</div>    
<div class="form-group ">
<label class="control-label" for="username"><i class="fa  fa-sign-in"></i> User name</label><input type="text" class="form-control" name="username" id="username" placeholder="Enter administrator user name">
<span class="help-block"></span>
</div>     
   <div class="form-group ">
<label class="control-label" for="password"><i class="fa  fa-user-secret"></i> Password</label><input type="password" class="form-control" name="password" id="password" placeholder="Enter administrator password">
<span class="help-block"></span>
</div> 
    <!--
    <p class="text-center text-info" id="custom_message"></p>    -->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default pull-left" data-dismiss="modal" ><i class="fa  fa-close"></i>  Cancel </button>
<button type="submit" class="btn btn-primary" id="save_button"   ><i class="fa  fa-floppy-o"></i> Save</button>
</div>
</div>
</div>
</form>    
</div>

    <div class="modal" id="upadminform">
        <form name="admin_form" id="updateadmin_form" method="POST" action="javascript:void(0);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-blue-active">
                        <button type="button" class="close" id="upsubadmindismiss" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title"><i class="fa  fa-user-plus"></i> Administrator Information</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group ">
                            <label class="control-label" for="fullname"><i class="fa  fa-user"></i> Full name</label><input type="text" class="form-control" name="fullname" id="upfullname" placeholder="Enter administrator full name">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="role"><i class="fa  fa-user"></i> Administrator role </label>
                            <select class="form-control" name="role" id="uprole">
                                <option value="">Choose Administrator Role</option>
                                <!--<option value="admin">Super Adminstrator Role(View All)</option>-->
                                <option value="finance">Financial Role(View Only Financial Pages)</option>
                                <option value="data">Data Entry Administration(View Only Data Entry Pages)</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="control-label" for="emailid"><i class="fa  fa-envelope"></i> Email ID </label><input type="text" class="form-control" name="emailid" id="upemailid" placeholder="Enter administrator emailid">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="phoneno"><i class="fa  fa-mobile"></i> Mobile no</label><input type="text" class="form-control" name="phoneno" id="upphoneno" placeholder="Enter administrator mobile no">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                           <input type="hidden" class="form-control" name="upid" id="upid" placeholder="Enter administrator mobile no">

                        </div>
                        <div class="form-group ">
                            <label class="control-label" for="username"><i class="fa  fa-sign-in"></i> User name</label><input type="text" class="form-control" name="username" id="upusername" placeholder="Enter administrator user name">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label class="control-label" for="password"><i class="fa  fa-user-secret"></i> Password</label><input type="password" class="form-control" name="password" id="uppassword" placeholder="Enter administrator password">
                            <span class="help-block"></span>
                        </div>
                        <!--
                        <p class="text-center text-info" id="custom_message"></p>    -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" id="cancelupdate" data-dismiss="modal" ><i class="fa  fa-close"></i>  Cancel </button>
                        <button type="submit" class="btn btn-primary"  ><i class="fa  fa-floppy-o"></i>Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
   
 <!-- insert or edit form for administrator -->      
</section>
    <script>
        $("#subadminsidebar").css('color','white');
    </script>
<script type="text/javascript" src="<?=base_url()?>assets/backend/scripts/adm_subadmin.js?ty"></script>
<script type="text/javascript">$('document').ready(function(){  newentry();  loadadmin();  saveadmin();    });</script>
</div>
