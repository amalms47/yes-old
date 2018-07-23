<div class="content-wrapper">
<section class="content-header"><h1> Institution Images/Brochure/Google Map  </h1>
<ol class="breadcrumb"><li><a href="<?= base_url()?>institution-home"><i class="fa fa-map-signs active"></i>More Institution Information</a></li></ol>
</section>
 <section class="content">
<div class="row">
<div class="col-md-12 ">
<div class="box box-widget widget-user">
<div id="cover" class="widget-user-header bg-black" style="height:300px;">
<div  class=" col-xs-2 col-sm-2 col-md-2 col-lg-2 pull-left">
    <!--
<img src="<?=base_url()?>assets/backend/images/collegelogo/<?=$logo?>"  class="profile-user-img img-responsive img-circle" width="100%" height="100%" style="padding-top:5px;" >
-->
    <img src="<?=base_url()?>assets/backend/images/collegeprofile/<?=$propic?>" class="profile-user-img img-responsive " width="200px" height="180px" style="padding-top:5px;" >
    <p class="text-center"><button class="btn  btn-success btn-xs"  id="profiletriger" ><i class="fa fa-cloud-upload"></i> Profile(500px x 500px)</button></p>
    <form name="profileform" id="profileform" ><input type="file" name="profilepic" id="profilepic" style="display:none;visiblity:hidden;z-index:99999;"> </form>

    <p class="text-center"><button class="btn  btn-info btn-xs"  id="logotriger" ><i class="fa fa-cloud-upload"></i> Logo (160px x 160px)</button></p>
<form name="logoform" id="logoform" ><input type="file" name="logo" id="logo" style="display:none;visiblity:hidden;z-index:99999;"> </form>




 <p class="text-center"><button class="btn  btn-info btn-xs"  id="covertriger" ><i class="fa fa-cloud-upload"></i> Upload Cover(1200px x 600px) </button></p>
<form name="coverform" id="coverform" ><input type="file" name="icover" id="icover" style="display:none;visiblity:hidden;z-index:99999;"> </form>
 </div>


    <div  class=" col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width:20%;margin-left: 210px;">
        </div>



    <div  class="col-xs-2 col-sm-2 col-md-2 col-lg-2 pull-right" >

<span class="mailbox-attachment-icon text-black bg-blue-active"><i class="fa fa-file-pdf-o"></i></span>
<div class="mailbox-attachment-info">
<a href="javascript:void(0);" class="mailbox-attachment-name" ><i class="fa fa-paperclip"></i> <span id="brochure"></span></a>
<a href="#" class="btn btn-default btn-xs pull-right" id="brochurelink" target="_blank"><i class="fa fa-cloud-download"></i></a>
</div>

<p  class="text-center"><button class="btn  btn-info btn-xs"  id="brchuretriger" ><i class="fa fa-cloud-upload"></i> Upload  brochure </button></p>
<form name="brochureform" id="brochureform" ><input type="file" name="brofile" id="brofile" style="display:none;visiblity:hidden;z-index:99999;"> </form>
</div>       
    
    
 </div>
</div>
 </div>	
</div>   
     
<div class="row">
<div class="col-md-12 ">
<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
 <div class="pad">
 <div id="map" style="height: 250px;"></div>   
 </div>
<p class="text-center"><button class="btn  btn-info btn-xs"  id="maptriger" ><i class="fa fa-cloud-upload"></i> Upload Google Map </button></p>
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
 </section>

    <script>
        $("#infosidebar").css('color','white');
    </script>

    <script type="text/javascript" src="<?= base_url()?>assets/backend/scripts/in_more.js"></script>
    
</div>

