<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Course List<small>manage all  available courses  in yes college.com</small></h1>
<ol class="breadcrumb">
<li><a href="<?= base_url()?>admin-home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="javascript:void(0);"><i class="fa fa-users"></i> Courses</a></li>
</ol>
</section>
<section class="content"> 
<div class="row">   
<div class="col-md-12"> 
 <div class="box box-solid">
<form name="courseform" id="courseform" method="post">
<div class="box-header with-border">
<h2 class="page-header"> <i class="fa fa-list-alt"></i> Create / Update Course  details</h2>

  <div class="col-md-4">
              <div class="form-group">
                <label>Course Category</label>
                <select class="form-control select2"  id="category" name="category" style="width: 100%;">
                </select>
                    <span class="help-block"></span>
              </div>
  </div>
<div class="col-md-5">
<div class="form-group">
<label>Course Name</label>

 <input type="text" class="form-control" placeholder="Course name" name="name" id="name" style="text-transform: capitalize;">
     <span class="help-block"></span>
</div>
</div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Short Name</label>

            <input type="text" class="form-control" placeholder="Short name" name="shortname" id="shortname" style="text-transform: capitalize;">
            <span class="help-block"></span>
        </div>
    </div>


  </div>   
<div class="box-footer">
<div class="pull-right">
<button type="reset" class="btn btn-warning" id="cleardata"><i class="fa fa-times"></i> Cancel</button>
<button type="submit" class="btn btn-primary" id="btn_save" selid="-1" value="insert"><i class="fa fa-floppy-o"></i> Save</button>
</div>
</div>
    
  </form>
  </div>   
</div>     
</div>
    
    
<div class="row">   
<div class="col-md-12"> 
<div class="box box-solid">
<div class="box-header with-border">
<h2 class="page-header"> <i class="fa fa-list-ol"></i> Course Grid details</h2>

<div class="col-md-12">
<div class="has-feedback">
<input type="text" class="form-control input-sm" id="search" placeholder="Enter course name or category">
<span class="glyphicon glyphicon-search form-control-feedback"></span>
</div>
</div>
<div class="box-tools">
<ul class="pagination pagination-sm no-margin pull-right" id="coursepages">
</ul>
</div>
</div>
<div class="box-body">
<table class="table table-striped">
    <thead>
        <tr>
<th style="width: 10px">#</th>
<th>Course Category</th>
<th>Course name</th>
            <th>Short name</th>
            <th>Added by</th>
            <th>Status</th>
            <th>Block/Active</th>
<th>Activity</th>
</tr>
    </thead>   
<tbody  id="coursebody">

</tbody>
</table>    
</div>    
</div>
</div>   
</div>


    <div class="modal" id="editcourse">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #424344">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">x</span></button>
                    <h4 class="modal-title text-center" style="color: white">
                        Edit course
                    </h4>
                </div>
                <div class="modal-body" >
                    <form id="newcourseform"  action="javascript:void(0);" method="post">
                        <label>Selecy category</label>
                        <select class="form-control"  id="catselname" name="catselname">



                        </select>
                        <br>
                        <label>Type your course name</label>
                        <span class="glyphicon  form-control-feedback"></span>
                        <input type="text" placeholder="Type new course name" class="form-control" id="newcoursename" name="newcoursename">

                    </form>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" id="cancelcou"  class="pull-left btn  btn-sm" style="background-color: #424344;color:white" >Cancel</button>

                        <button type="button"  class="pull-right btn btn-sm" data-dismiss="modal"  style="background-color: #424344;color:white;" id="cousubmit" >Save</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
    
    
</section>
    <script>
        $("#coursemenu").addClass('active');
        $("#coursessidebar").css('color','white');
    </script>
 <script type="text/javascript" src="<?=base_url()?>assets/backend/Orgscripts/adm_courses.js?ll"></script>
<script type="text/javascript">
    
    

</script>

</div>
