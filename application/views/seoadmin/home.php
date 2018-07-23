<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Pages List<small>manage all title.. seo contents</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>seoadmin-home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-users"></i>seocontent</a></li>
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



                                    </div>

                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>#</th>
                                                <th>Page name</th>
                                                <th>Last updated</th>
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


    <div class="modal" id="tagform">
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

                            <div class="col-md-8 table-responsive">
                                <table class="table table-striped">
                                    <tbody>

                                    <tr><th>Title tag</th><td id="metatitle"></td></tr>
                                    <tr><th>Meta name tag</th><td id="metaname"></td></tr>
                                    <tr><th>Meta description tag</th><td id="metadesc"></td></tr>



                                    </tbody>
                                </table>
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


<div class="modal" id="uptag">
    <form name="admin_form" id="updatetagform" method="POST" action="javascript:void(0);">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue-active">
                    <button type="button" class="close" id="" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"><i class="fa  fa-user-plus"></i>Page details</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="selid" value="-1" id="selid">
                    <div class="form-group ">
                        <label class="control-label" for="uptitletag"><i class="fa  fa-user"></i>Type title</label><textarea  class="form-control" name="uptitletag" id="uptitletag" placeholder="Enter title tag details "></textarea>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group ">
                        <label class="control-label" for="upnametag"><i class="fa  fa-envelope"></i> Meta keyword tag </label><textarea class="form-control" name="upnametag" id="upnametag" placeholder="Enter meta keyword details"></textarea>
                        <span class="help-block"></span>
                    </div>
                    <input type="hidden" value="" id="tagid">
                    <div class="form-group">

                        <label class="control-label" for="upkeytag"><i class="fa  fa-mobile"></i> Meta description tag</label><textarea class="form-control" name="upkeytag" id="upkeytag" placeholder="Enter meta description details"></textarea>
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


<!-- new code for editing -->


<script type="text/javascript" src="<?=base_url()?>assets/backend/Orgscripts/seocontent.js?kl"></script>

