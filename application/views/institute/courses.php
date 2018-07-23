<style>
    .ui-autocomplete-input {
        border: none;
        font-size: 14px;

        margin-bottom: 5px;
        padding-top: 2px;
        border: 1px solid #DDD !important;
        padding-top: 0px !important;
        z-index: 1511;
        position: relative;
    }

    .ui-autocomplete {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1510 !important;
        float: left;
        display: none;
        min-width: 160px;
        width: 160px;
        padding: 4px 0;
        margin: 2px 0 0 0;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
    }
</style>
<style>
    #newcatform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: right;}
</style>
<div class="content-wrapper">
<section class="content-header">
<h1>Institution Course Management<small>maintain all registered course information</small></h1>
<ol class="breadcrumb">
    <li><a href="<?=base_url()?>/institution-home"><i class="fa fa-university"></i> Home</a></li>
    <li class="active"><i class="fa fa-list-alt"></i> Institution Courses</li>
 </ol>   
</section>

    <!---- modal for qualification goes here --->
    <div class="modal" id="seatupdateModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #424344">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">x</span></button>
                    <h4 class="modal-title text-center" style="color: white">
                        Update seat
                    </h4>
                </div>
                <div class="modal-body" id="seatupdatebody">
                    <form  action="javascript:void(0);" id="" method="post">
                        <label>Current seat</label>
                            <span class="glyphicon  form-control-feedback"></span>
                            <input type="text"  class="form-control" id="seatupdate" name="seats">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-sm" style="background-color: #424344;color:white" id="seatsubmit" sid="-1" data-dismiss="modal" aria-label="OK">Update</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="newcourse">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #424344">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">x</span></button>
                    <h4 class="modal-title text-center" style="color: white">
                        Add new course
                    </h4>
                </div>
                <div class="modal-body" >
                    <form id="newcourseform"  action="javascript:void(0);" method="post">
                        <label>Selecy category</label>
                        <select class="form-control"  id="catselname" name="catselname">
                            <option value="">SELECT CATEGORY</option>


                        </select>
<br>
                        <label>Type course shortname</label>
                        <span class="glyphicon  form-control-feedback"></span>
                        <label for="newcatname"></label>
                        <input type="text" placeholder="Type course  shortname" class="form-control" id="newcoursesname" name="newcoursesname">
<br>
                        <label>Type your course name</label>
                        <span class="glyphicon  form-control-feedback"></span>
                        <label for="newcatname"></label>
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



    <div class="modal" id="newcat">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #424344">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">x</span></button>
                    <h4 class="modal-title text-center" style="color: white">
                       Category name
                    </h4>
                </div>
                <div class="modal-body" >
                    <form id="newcatform"  action="javascript:void(0);" method="post">
                        <label>Type your category name</label>
                        <span class="glyphicon  form-control-feedback"></span>
                        <input type="text" placeholder="Type new category name" class="form-control" id="newcatname" name="newcatname">

                    </form>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" id="cancelcat"  class="pull-left btn  btn-sm" style="background-color: #424344;color:white" >Cancel</button>

                    <button type="button"  class="pull-right btn btn-sm" data-dismiss="modal"  style="background-color: #424344;color:white;" id="catsubmit" >Save</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!---- modal for qualification goes here --->
    <section class="content">
<div class="row">
<div class="col-md-12">

<div class="box box-solid">
     
<div class="box-header with-border">
<h2 class="box-title">Add your courses here</h2>
<div class="box-tools pull-right">
<div class="has-feedback">
<!--<input type="text" class="form-control input-sm" placeholder="Search Course" id="course_term">
<span class="glyphicon glyphicon-search form-control-feedback"></span>-->
</div>
</div>
</div>

<div class="mailbox-controls">
<button type="button" class="btn btn-small" style="background-color: #26292d;color: white" id="new_course"><i class="fa fa-plus-circle"></i> New Course</button>
<ul  class="pagination pagination-sm no-margin pull-right" id="course_page"></ul>
</div>
</div>

    <form name="feeform" id="feeform" ><input type="file" name="feefile" id="feefile" style="display:none;visiblity:hidden;z-index:99999;"><input type="text"  name="couid" id="couid" value="" style="display:none;visibility:hidden;z-index:99999;"> </form>

<div class="box box-solid" style="display:none;" id="new_course_panel">
<form name="courseform" id="courseform" method="post">
<div class="box-header with-border"><h3 class="box-title">Create/Update Course Information For Institution </h3></div>
<div class="box-body">
<div class="row">


    <div class="col-xs-12  col-sm-12 col-md-4 col-lg-6">
        <div class="form-group input-group" >



            <span class="input-group-addon hidden-borderall" >Category &nbsp;<a href="javascript:void(0)" id="addnewcat" style="font-size: smaller" data-toggle="modal" class="fa fa-plus-circle" data-target="#newcat">Add</a></span>

            <select class="form-control hidden-border"  id="category" name="category_id">




            </select>
            <span class="help-block"></span>
        </div>
    </div>


    <div class="col-xs-12  col-sm-12 col-md-4 col-lg-6">
        <div class="form-group input-group" >



            <span class="input-group-addon hidden-borderall" >Course &nbsp;<a href="javascript:void(0)" id="addnewcourse" style="font-size: smaller" data-toggle="modal" class="fa fa-plus-circle" data-target="#newcourse">Add</a></span>

            <select class="form-control hidden-border"  id="name" name="name">
                <option value="">SELECT COURSE</option>


            </select>
            <span class="help-block"></span>
        </div>
    </div>




</div>


    <div class="row">


        <div class="col-xs-12  col-sm-12 col-md-4 col-lg-6">
            <div class="form-group input-group" >
                <span class="input-group-addon hidden-borderall" >Level </span>
                <select class="form-control hidden-border"  id="level" name="level">
                </select>
                <span class="help-block"></span>
            </div>
        </div>


        <div class="col-xs-12  col-sm-12 col-md-4 col-lg-6">
            <div class="form-group input-group" >
                <span class="input-group-addon hidden-borderall" >Course Duration </span>
                <input class="form-control hidden-border" placeholder="Course Duration" id="duration" name="duration">
                <span class="help-block"></span>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12  col-sm-12 col-md-4 col-lg-4">
            <div class="form-group input-group" >
                <span class="input-group-addon hidden-borderall" >Course type </span>
                <select class="form-control hidden-border"  id="type" name="type">
                    <option value="">Select Course type</option>

                    <option value="private">Private</option>
                    <option value="govt">Government</option>
                    <option value="others">Others</option>
                </select>
                <span class="help-block"></span>
            </div>
        </div>






        <div class="col-xs-12  col-sm-12 col-md-4 col-lg-8">
            <div class="form-group input-group" >
                <span class="input-group-addon hidden-borderall" >Scheme </span>
                <select class="form-control hidden-border"  id="scheme" name="scheme">
                    <option value="">Course scheme</option>
                    <option value="Year">Year</option>
                    <option value="Semester">Semester</option>
                    <option value="Monthly">Month</option>
                    <option value="Others">Others</option>
                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
 <div class="row">
<div class="col-xs-12  col-sm-12 col-md-4 col-lg-4">  
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" >Total Seats </span>
<input class="form-control hidden-border" placeholder="Total Management Seat" id="totalseats" name="totalseats">
<span class="help-block"></span>
    </div>   
</div>


     <div class="col-xs-12  col-sm-12 col-md-4 col-lg-4">
         <div class="form-group input-group" >
             <span class="input-group-addon hidden-borderall" >Available Seats </span>
             <input class="form-control hidden-border" placeholder="Available Management Seat" id="seats" name="seats">
             <span class="help-block"></span>
         </div>
     </div>

<div class="col-xs-12  col-sm-12 col-md-4 col-lg-4">  
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" >Course Total Fees </span>
<input class="form-control hidden-border" placeholder="Course Total Fees" id="fees" name="fees">
<span class="help-block"></span>
    </div>   
</div>   
</div>   
 <div class="row">
<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">  
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall"  style="vertical-align: top;">Course Eligibility  </span>
<textarea class="textarea hidden-border " name="eligibility" id="eligibility" placeholder="Enter course eligiblility details.Use list order style " style="width: 100%; height: 100px; font-size: 14px; line-height: 18px;  padding: 10px;"></textarea>
<span class="help-block"></span> 
</div>            
</div>   
  </div>   
 <div class="row">
<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">  
<div class="form-group input-group">
<span class="input-group-addon hidden-borderall"  style="vertical-align: top;">Course Details</span>
<textarea class="textarea hidden-border " name="details" id="details" placeholder="Give course details if any" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px;  padding: 10px;"></textarea>
<span class="help-block"></span> 
</div>            
</div>   
  </div>   
</div>
<div class="box-footer ">
 <div class="row"> 
 <div class="  col-md-12">    
<div class="pull-right">
 <button type="reset" class="btn" style="background-color: #373b42;color: white" id="cancel" ><i class="fa fa-refresh"></i> Cancel</button>
 <button type="submit" class="btn" style="background-color: #373b42;color: white" id="reg" selid="-1" value="Register"><i class="fa fa-plus-circle"></i>&nbsp;Save Course</button>
 </div>
     </div>
   </div>  
</div>
</form>
</div>

<!---code start here -->    
 <div class="box box-solid">
<div class="box-body">
<div class="box-group" id="accordion">
</div>   
</div>
 </div>
    
<!-- code end here -->
</div>
</section>
 </div>
<script>
    $("#coursesidebar").css('color','white');
</script>

<script type="text/javascript" src="<?= base_url()?>assets/backend/Orgscripts/in_courses.js?khg"></script>
  

