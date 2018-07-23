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
                                    <div class="box-header">
                                        <h3 class="box-title"><span id="visitorscount"><b>0</b></span>&nbsp;visitors found</h3>

                                        <div class="col-md-4 pull-right" id="notcollegepage">
                                        </div>
                                    </div>

                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>#</th>
                                                <th>Student name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Visited on</th>
                                                <th>Qualification</th>
                                                <th>Attachments</th>
                                                <th>Complete Profile</th>
                                            </tr>

                                            <tbody id="visitors">

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



<div class="modal" id="studProfile">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #424344">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white">X</span></button>
                <h4 class="modal-title text-center" style="color: white">
                    Student Profile
                </h4>
            </div>
            <div class="modal-body" id="Studbody">

                <div class="col-md-9 table-responsive ">
                    <table class="table table-striped">
                        <tbody>
                      <tr><td><img src="" class="profile-user-img img-responsive" id="proimage" width="200px" height="180px" style="padding-top:5px;" >
                          </td>   </tr>
                        <tr><th>Name :</th><td id="proname"></td></tr>
                      <tr><th>Father name :</th><td id="profather"></td></tr>
                        <tr><th>Mobile :</th><td id="promobile"></td></tr>
                        <tr><th>Address :</th><td id="proaddress"></td></tr>
                      <tr><th>Temporary address :</th><td id="protaddress"></td></tr>
                        <tr><th>Gender :</th><td id="progender"></td></tr>
                      <tr><th>DOB :</th><td id="prodob"></td></tr>
                      <tr><th>Place :</th><td id="proplace"></td></tr>
                      <tr><th>Nationality :</th><td id="pronationality"></td></tr>



                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>



<!-- new code for editing -->


<script type="text/javascript" src="<?=base_url()?>assets/backend/scripts/in_visitors.js"></script>
<script type="text/javascript">
    $('document').ready(function(){

        $("#visitorssidebar").css('color','white');
    });
</script>

