<div class="content-wrapper">
<section class="content-header"><h1> Dashboard  </h1>
<ol class="breadcrumb"><li><a href="<?= base_url()?>institution-home"><i class="fa fa-dashboard active"></i>Dashboard</a></li></ol>
</section>
<section class="content">
<div class="row">
<div class="col-md-12 ">
<div class="box box-widget widget-user">
<div id="cover" class="widget-user-header bg-black" style="height:300px;max-width:100%;">
<div  class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <div  class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">  
<img src="<?=base_url()?>assets/backend/images/collegeprofile/<?=$propic?>" class="profile-user-img img-responsive " width="200px" height="180px" style="padding-top:5px;" >
</div>
 <div  class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> 
<h2 ><?=$title?></h2>
<h4><?=$username?></h4>
</div>
</div>    
</div>
</div>
 </div>	
</div>
<div class="row">    
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner"><h3 id="coursecount">0</h3><p>Courses Grid List</p></div>
<div class="icon"><i class=" ion-ios-list"></i></div>
<a href="<?=base_url();?>institution-courses" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>       
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-green">
<div class="inner"><h3 id="enquirycount">0</h3><p>Student Enquiries</p></div>
<div class="icon"><i class="ion ion-android-contacts"></i></div>
<a href="<?=base_url();?>student-enquiry" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>    
<div class="col-lg-3 col-xs-6">
 <div class="small-box bg-yellow">
 <div class="inner"><h3 id="reviewcount">0</h3><p>Reviews</p></div>
<div class="icon"><i class="ion ion-images"></i></div>
<a href="<?=base_url();?>college-reviews-page" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
 <div class="col-lg-3 col-xs-6">
 <div class="small-box bg-red">
<div class="inner"><h3 id="visitorscount"></h3><p>Unique Visitors</p></div>
<div class="icon"><i class="ion ion-pie-graph"></i></div>
<a href="<?=base_url();?>institution-visitors" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
</div>    
 <!---- modal for message goes here --->
<div class="modal" id="mapModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                  <h4 class="modal-title text-center">
                     Enter Google Map HTML Iframe Code Here
                  </h4>
              </div>
              <div class="modal-body">
                  <form id="mapform">
                <textarea class="hidden-border " name="mapcode" id="mapcode" placeholder="Iframe code Refer FAQ to know how you get the iframe code" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;  padding: 10px;"></textarea>
                </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-info btn-sm" id="savemap">Upload</button>
              </div>
            </div>
          </div>
     </div>
 <!---- modal for  message goes here --->       
    
<script>
    $("#homesidebar").css('color','white');
</script>
    <script>

        var site_url= '<?= base_url()?>';
    </script>
<script type="text/javascript" src="<?= base_url()?>assets/backend/scripts/in_home.js"></script> 
</section>
</div>
