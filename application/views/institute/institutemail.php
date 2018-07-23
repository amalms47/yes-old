

<style>
    textarea.error{ border: 1px solid #FF0000 !important;}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            College Mailbox

        </h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Mailbox</li>
        </ol>
    </section>






    <!-- Main content -->
    <section class="content">
        <div class="row">




            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">


                        <li class="active" ><a href="#singlemail" style="font-weight: bold" data-toggle="tab " >Create mail</a></li>
                    </ul>
                    <div class="box" style="background-color: #e3e4e5">
                        <div class="box-header with-border">
                            <h3 class="box-title">Compose New Message</h3>
                        </div>
                        <div class="tab-content">








                            <div class="tab-pane active" id="singlemail">
                                <form id="mailboxcustom">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <input type="email" class="form-control" name="mailto" id="mailto" placeholder="To:(Student email id)">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" id="mailsubject" name="mailsubject" placeholder="Subject:">
                                        </div>
                                        <div class="form-group">
                                            <label for="composeemail" class="control-label"></label>
                                            <textarea id="composeemail" name="composeemail"  class="form-control" placeholder=" Type your messages here" style="height: 250px;"></textarea>

                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <div class="pull-right">

                                            <button type="submit" id="instmailbutton" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                                        </div>
                                        <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /. box -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $("#mailmenu").addClass('active');
    $("#mailsidebar1").css('color','white');
</script>
<script src="<?=base_url();?>assets/backend/scripts/ins_mail.js?kl"></script>