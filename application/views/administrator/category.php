<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Course List<small>manage all  available courses  in yes college.com</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin-home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-users"></i> Courses</a></li>
        </ol>
    </section>
    <div class="modal" id="newcatmodal">
        <div class="modal-dialog modal-sm">
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
                        <input type="text" class="form-control" id="catname" name="catname">

                    </form>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" id="cancelcat"  class="pull-left btn  btn-sm" style="background-color: #424344;color:white" >Cancel</button>

                        <button type="button"  class="pull-right btn btn-sm" data-dismiss="modal"  style="background-color: #424344;color:white;" id="admincatsubmit" >Save</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="updatecatmodal">
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
                    <form id="updatecatform"  action="javascript:void(0);" method="post">
                        <label>Type your category name</label>
                        <span class="glyphicon  form-control-feedback"></span>
                        <input type="text" class="form-control" id="updatecatname" name="updatecatname">

                    </form>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" id="cancelcat"  class="pull-left btn  btn-sm" style="background-color: #424344;color:white" >Cancel</button>

                        <button type="submit"  class="pull-right btn btn-sm" data-dismiss="modal"  style="background-color: #424344;color:white;" id="updatecatsubmit" >Update</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h2 class="page-header"> <i class="fa fa-list-ol"></i> Category Grid details</h2>

                        <div class="row">
                        <div class="col-md-3">
                            <div class="has-feedback">
                            <button type="button" class="btn btn-primary" id="addnewcat" style="font-size: smaller" data-toggle="modal"  data-target="#newcatmodal" ><i class="fa fa-plus"></i>Add new</button>


                            </div>
                        </div>
                            <div class="col-md-9">
                                <div class="has-feedback">

                                        <input type="text" class="form-control input-sm" id="catsearch" placeholder="Enter  category name to search ">
                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>

                                </div>
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
                                <th>Category</th>
                                <th>Added date</th>
                                <th >Added by</th>

                                <th>Status</th>
                                <th>Activity</th>
                                <th>Block/Active</th>
                            </tr>
                            </thead>
                            <tbody  id="categorybody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </section>
    <script>
        $("#coursemenu").addClass('active');
        $("#categorysidebar").css('color','white');
    </script>
    <script type="text/javascript" src="<?=base_url()?>assets/backend/scripts/adm_category.js?lo"></script>
    <script type="text/javascript">



    </script>

</div>
