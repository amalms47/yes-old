<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-3">
            <a href="<?=base_url();?>create-mail" class="btn btn-primary btn-block margin-bottom">Create mail</a>
        </div>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mailbox</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            <!-- /.col -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Inbox</h3>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" id="searchmail" class="form-control input-sm" placeholder="Search by email ">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                           <div class="row">
                               <div class="col-md-8">

                             <button type="button" class="btn btn-default btn-sm" id="mailrefresh"><i class="fa fa-refresh">&nbsp;&nbsp;Refresh</i></button>
                               </div>

                            <div class="col-md-3"  >
                                <ul class="pagination pagination-sm  pull-right" id="mailpage" style="margin:0px;">     </ul>
                            </div>
                           </div>
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tr style="color: darkgray">
                                    <td style="font-weight: bold">#</td>
                                    <td style="font-weight: bold">Remove</td>
                                    <td style="font-weight: bold">Collegename</td>
                                    <td style="font-weight: bold">Email</td>
                                    <td style="font-weight: bold">subject</td>
                                    <td style="font-weight: bold">Message</td>
                                    <td style="font-weight: bold">Date/Time</td>
                                </tr>
                                <tbody id="allmailbox">




                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal" id="collegeform">
    <div class="modal-dialog  modal-md">
        <div class="modal-content">
            <div class="modal-header bg-blue-active">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="fa  fa-institution"></i>&nbsp;<span id="title"></span></h4>
            </div>
            <div class="modal-body">



                <section class="content">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Read Mail</h3>
                                    <span class="mailbox-read-time pull-right" id="maildate"></span><br>
                                    <span class="mailbox-read-time pull-right" id="mailstatus"></span>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="mailbox-read-info">
                                        <h3 id="collegemailname"></h3>
                                        <h5 id="frommail"></h5>
                                        <h4 id="mailsubject"></h4>


                                    </div>
                                    <!-- /.mailbox-read-info -->
                                  <hr>
                                    <div class="mailbox-read-message" style="background-color: #e3e3e3" id="mailcontent">

                                        <p>
                                        </p>

                                    </div>

                                </div>

                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" data-dismiss="modal" ><i class="fa  fa-close"></i>  Close </button>
            </div>
        </div>
    </div>

</div>

<script>

    $("#mailmenu").addClass('active');
    $("#mailsubmenu2").css('color','white');
</script>
<script src="<?=base_url();?>assets/backend/Orgscripts/adm_mail.js"></script>

