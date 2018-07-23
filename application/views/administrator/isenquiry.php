<div class="content-wrapper">
    <section class="content-header">
        <h1>Student Enquiry<small>manage all student enquiry</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>institution-home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-comments"></i> Enquiry</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">

                    <div class="box-header with-border">
                        <h2 class="page-header"> <i class="fa fa-comments"></i> Enquiry Lists</h2>
                        <!--
                        <div class=" col-lg-4  col-md-4 col-sm-12 col-xs-12   bg-gray-ligh border-left border-right" style="padding:3px;">
                        <div class="form-group  ">
                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12"><label><input type="radio" name="option" id="option" class="choice" value="1" checked> NEW ENQUIRY</label></div>
                        <div class="col-lg-6  col-md-6 col-sm-12  col-xs-12"><label><input type="radio" name="option" id="option" class="choice" value="0"> OLD ENQUIRY</label></div>
                        </div>
                        </div>
                        -->
                        <div class="col-md-8" >
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" id="search"  placeholder="Search courses ">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>

                        <div class="col-md-12"  >
                            <ul class="pagination pagination-sm  pull-right" id="enquirypage" style="margin:0px;">     </ul>
                        </div>

                    </div>




                    <div class="box-body" id="enquirybody" style="background-color:#e8eaed">

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal" id="attachModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #424344">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">X</span></button>
                    <h4 class="modal-title text-center" style="color: white">
                        Attachments
                    </h4>
                </div>
                <div class="modal-body" id="attachbody">
                    <form name="info_form" id="" class="form-inline" action="" method="post">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" id="requestmsg" name="requestmsg"  placeholder="Enter Message">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-sm" style="background-color: #424344;color:white" data-dismiss="modal" aria-label="OK">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!---- modal for qualification goes here --->
    <div class="modal" id="qualModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #424344">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">X</span></button>
                    <h4 class="modal-title text-center" style="color: white">
                        Qualification
                    </h4>
                </div>
                <div class="modal-body" id="qualbody">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-sm" style="background-color: #424344;color:white" data-dismiss="modal" aria-label="OK">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!---- modal for qualification goes here --->
    <!---- modal for message goes here --->
    <div class="modal" id="msgModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #e8eaed">
                <div class="modal-header "style="background-color: #424344">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">X</span></button>
                    <h4 class="modal-title text-center" style="color:white">
                        Enquiry/Reply to Student
                    </h4>
                </div>
                <div class="modal-body" >
                    <div class="alert">

                        <h4><i class="icon fa fa-comment"></i> Student Comment!</h4>
                        <div id="smessage"></div>

                    </div>
                    <div class="alert">
                        <h4><i class="icon fa fa-comments-o"></i> College Reply </h4>
                        <div id="replymsg"></div>
                    </div>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-sm" style="background-color:#424344 ;color:white" data-dismiss="modal" id="enquirydismiss" aria-label="OK"><i class="icon fa fa-check"></i> OK</button>
                </div>
            </div>
        </div>
    </div>
    <!---- modal for message goes here --->

</div>
<script>
    $("#enquirysidebar").css('color','white');
</script>
<script type="text/javascript" src="<?= base_url()?>assets/backend/Orgscripts/adm_enquiry.js"></script>

