 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Dashboard/Home<small>Control panel</small></h1>
<ol class="breadcrumb"><li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home / Dashboard</a></li></ol>
</section>
<section class="content">
<div class="row">

<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box"><span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
<div class="info-box-content"><span class="info-box-text">Requests</span><span class="info-box-number" id="enqcount"></span></div>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box"><span class="info-box-icon bg-green"><i class="fa fa-group"></i></span>
<div class="info-box-content"><span class="info-box-text">Vistors</span><span class="info-box-number" id="viscount"></span></div>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box"><span class="info-box-icon bg-yellow"><i class="fa fa-comments-o"></i></span>
<div class="info-box-content"><span class="info-box-text">College Category</span><span class="info-box-number" id="clgcat"></span></div>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box"><span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
<div class="info-box-content"><span class="info-box-text">Featured College</span><span class="info-box-number" id="featuredcount"></span></div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="box box-widget widget-user-2">
<div class="widget-user-header  text-center bg-blue">
<div class="widget-user-image"><img class="img-circle" src="<?=$photo;?>" alt="User Avatar"></div>
<h5 class="widget-user-username">Adminstrator Name</h5>
</div>
<div class="box-footer no-padding">
<ul class="nav nav-stacked">
<li><a href="javascript:void(0);">Assigned Role<span class="pull-right badge bg-blue"><?=$role;?></span></a></li>
<li><a href="javascript:void(0);">Email ID <span class="pull-right badge bg-blue"><?=$emailid;?></span></a></li>
<li><a href="javascript:void(0);">Mobile no<span class="pull-right badge bg-blue"><?=$phoneno;?></span></a></li>
<li><a href="javascript:void(0);">Last Login <span class="pull-right badge bg-blue"><?=$logdate;?></span></a></li>
</ul>
</div>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner"><h3 id="clgcound"></h3><p>Colleges</p></div>
<div class="icon"><i class="icon ion-ios-list"></i></div>
<a href="<?=base_url();?>colleges-grid" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-green"><div class="inner"><h3 id="studcount"></h3><p>Students</p></div>
<div class="icon"><i class="icon ion-person-stalker"></i></div>
<a href="<?=base_url();?>student-list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner"><h3 id="coursecat"></h3><p>Category</p></div>
<div class="icon"><i class="icon ion-ios-paper"></i></div>
<a href="<?=base_url();?>admin-categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-orange">
<div class="inner"><h3 id="inactcound"></h3><p>Blocked Colleges</p></div>
<div class="icon"><i class="ion ion-university"></i></div>
<a href="<?=base_url();?>colleges-grid" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red"><div class="inner"><h3 id="blockedstud"></h3><p>Blocked Students</p></div>
<div class="icon"><i class="icon ion-person-add"></i></div>
<a href="<?=base_url();?>student-list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-light-blue">
<div class="inner"><h3 id="coursecount"></h3><p>Courses</p></div>
<div class="icon"><i class="icon ion-android-folder-open""></i></div>
<a href="<?=base_url();?>admin-courses" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

</div>
    <div class="row">
<div class="col-md-6">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Currently added students</h3>
<div class="box-tools pull-right">

<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button>
<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
</button>
</div>
</div>
<div class="box-body no-padding">

 <ul class="users-list clearfix" id="studentgridlist">

 </ul>
</div>
<div class="box-footer text-center">
<a href="<?=base_url();?>student-list" class="small-box-footer pull-right">View all student <i class="fa fa-arrow-circle-right"></i></a>
</div>
 </div>
 </div>


 <div class="col-md-6">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Currently added colleges</h3>
<div class="box-tools pull-right">

<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button>
<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
</button>
</div>
</div>
<div class="box-body no-padding">
 <ul class="users-list clearfix" id="collegegridlist">
 </ul>
</div>
<div class="box-footer text-center">
<a href="<?=base_url();?>colleges-grid" class="small-box-footer pull-right">View all college <i class="fa fa-arrow-circle-right"></i></a>
</div>
 </div>
 </div>
 </div>       
</section>
</div>
<!-- /.content-wrapper -->

 <script>
     $("#dashboardsidebar").css('color','white');
 </script>
<script>
 var site_url= '<?=base_url();?>';
</script>
 <script type="text/javascript" src="<?= base_url()?>assets/backend/Orgscripts/adm_dashboard.js"></script>