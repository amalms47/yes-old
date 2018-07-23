<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Colleges List<small>manage all registered or inaactive colleges  in yescolleges.com</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin-home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-users"></i> Not activated colleges</a></li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">

                    <div class="box-body">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h2 class="page-header"> <i class="fa fa-institution"></i> College Search Options</h2>
                                        <div class="col-md-12">
                                            <div class="has-feedback">
                                                <input type="text" class="form-control input-sm" autocomplete="off"  id="searchclg"  placeholder="Search colleges ">
                                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-header">



                                        <h3 class="box-title">All colleges |<!--(via SMS/Email)-->&nbsp;&nbsp;<span><b id="collegescount">0</b>&nbsp;colleges found</span></h3>

                                        <div class="col-md-4 pull-right" id="notcollegepage">
                                        </div>
                                    </div>

                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>#</th>
                                                <th>College name</th>
                                                <th>Emailid</th>
                                                <th>slugname</th>
                                                <th>Mobile</th>
                                                <th>Registered</th>
                                                <th>Edit metatag</th>
                                                <th>view</th>
                                            </tr>

                                            <tbody id="notactivated">

                                            </tbody>

                                        </table>
                                    </div>
                                </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- new code for editing -->


    <div class="modal" id="collegeform">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-blue-active">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"><i class="fa  fa-institution"></i>&nbsp;<span id="title"></span></h4>
                </div>
                <div class="modal-body">
                    <section class="invoice">
                        <!-- title row -->

                        <div class="row invoice-info">
                            <div class=" col-sm-12 widget-user-header bg-black" id="ccover" style="height:200px;">
                                <div  class=" col-sm-8">
                                    <img src="" width="100px" height="100px" style="padding-top:5px;" id="clogo">
                                    <h3 class="widget-user-username" id="username"></h3>
                                    <h5 class="widget-user-desc" id="subtitle"></h5>
                                </div>
                                <div  class=" col-sm-4" id="mapcode">

                                </div>

                            </div>

                            <div class="col-xs-5 table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr><th>University</th><td id="university"></td></tr>
                                    <tr><th>Location</th><td id="location"></td></tr>
                                    <tr><th>District</th><td id="locatio2"></td></tr>
                                    <tr><th>Category</th><td id="category"></td></tr>
                                    <tr><th>Address</th><td>
                                            <address>
                                                <strong id="address1"></strong><br>
                                                <span id="address2"></span><br>
                                                <span id="address3"></span><br>
                                                Phone: <span id="phoneno"></span><br>
                                                Email:<span id="emailid"></span><br>
                                                Fax no: <span id="faxno"></span><br>
                                            </address>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Brochure</th><td><a id="brochure" href="javascript:void(0);" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i> Download</a></td>
                                    </tr>
                                    <tr>
                                        <th>Site Url</th><td><a id="hurl" href="javascript:void(0);" target="_blank"><i class="fa  fa-external-link"></i><span id="url"> visite Now</span></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-7 invoice-col ">
                                <h3>History/Details</h3>
                                <div class="text-justify" id="details">

                                </div>
                            </div>
                        </div>
                    </section>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-right" data-dismiss="modal" ><i class="fa  fa-close"></i>  Close </button>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- new code for editing -->

<div class="modal" id="collegecourse">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-active">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="fa  fa-institution"></i>&nbsp;<span>Course Details</span></h4>
            </div>
            <div class="modal-body">
                <div class="text-justify" id="ins_courses">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" data-dismiss="modal" ><i class="fa  fa-close"></i>  Close </button>

            </div>
        </div>
    </div>

</div>

<div class="modal" id="uptag">
    <form name="admin_form" id="updatetagform" method="POST" action="javascript:void(0);">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue-active">
                    <button type="button" class="close" id="" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"><i class="fa  fa-user-plus"></i>Colleges details</h4>
                </div>
                <input type="hidden" id="selid"  value="-1" name="seleid">
                <div class="modal-body">

                    <div class="form-group ">
                        <label class="control-label" for="uptitletag"><i class="fa  fa-user"></i>Type title</label><textarea  class="form-control" name="uptitletag" id="uptitletag" placeholder="Enter administrator full name"></textarea>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group ">
                        <label class="control-label" for="upnametag"><i class="fa  fa-envelope"></i>Meta keyword tag  </label><textarea class="form-control" name="upnametag" id="upnametag" placeholder="Enter administrator emailid"></textarea>
                        <span class="help-block"></span>
                    </div>
                    <input type="hidden" value="" id="tagid">
                    <div class="form-group">

                        <label class="control-label" for="upkeytag"><i class="fa  fa-mobile"></i>Meta description tag </label><textarea class="form-control" name="upkeytag" id="upkeytag" placeholder="Enter administrator mobile no"></textarea>
                        <span class="help-block"></span>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" id="uptagcancel" data-dismiss="modal" ><i class="fa  fa-close"></i>  Cancel </button>
                    <button type="submit" class="btn btn-primary"  ><i class="fa  fa-floppy-o"></i>Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal" id="collegefeat">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-active">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="fa  fa-institution"></i>&nbsp;<span>Feature Details</span></h4>
            </div>
            <div class="modal-body"  id="">
                <div class="text-justify" id="ins_feature">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" data-dismiss="modal" ><i class="fa  fa-close"></i>  Close </button>

            </div>
        </div>
    </div>

</div>

<!-- new code for editing -->


<script type="text/javascript" src="<?=base_url()?>assets/backend/Orgscripts/adm_notact_colleges.js"></script>
<script type="text/javascript">
    $('document').ready(function(){

        $("#collegemenu").addClass("active");
        $("#collegesubmenu3").addClass("active");
        $("#collegesubmenu3").css('color','white');


    });
</script>

