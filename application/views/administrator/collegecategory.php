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

                                        <div class="row">
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-bg-gray" id="">&nbsp;<a href="javascript:void(0)" id="addnewcat" style="font-size: smaller" data-toggle="modal" data-target="#newcat">Add New</a></button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="text-center text-green" id="ccustom_message" ></label>
                                            </div>
                                        <div class="col-md-9">

                                            <div class="has-feedback">
                                                <input type="text" class="form-control input-sm" autocomplete="off"  id="searchclg"  placeholder="Search category ">
                                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="box-header">



                                        <h3 class="box-title">All category |<!--(via SMS/Email)-->&nbsp;&nbsp;<span><b id="collegescount">0</b>&nbsp;categories found</span></h3>

                                        <div class="col-md-4 pull-right" id="notcollegepage">
                                        </div>
                                    </div>

                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>#</th>
                                                <th>Category name</th>
                                                <th>Added date</th>
                                                <th>Status</th>
                                                <th>Block/Active</th>


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

<!-- new code for editing -->


<script type="text/javascript" src="<?=base_url()?>assets/backend/scripts/adm_clgcategory.js"></script>
<script type="text/javascript">
    $('document').ready(function(){
        $("#collegecat").css('color','white');
    });
</script>

