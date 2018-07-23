

<style>
    textarea.error{ border: 1px solid #FF0000 !important;}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mailbox
            <small>13 new messages</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mailbox</li>
        </ol>
    </section>






    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="<?=base_url();?>mailbox-list" class="btn btn-primary btn-block margin-bottom">Back to Mailbox</a>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">College category list</h3>

                    </div>



                        <div class="box-body" >
                            <div class="form-group" id="collegelist">

                            </div>
                        </div>

                </div>
                <!-- /. box -->

            </div>
            <!-- /.col -->



            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#multiplemail" style="font-weight: bold" data-toggle="tab">Multiple mails</a></li>
                        <li ><a href="#singlemail" style="font-weight: bold" data-toggle="tab">Create single mail</a></li>
                    </ul>
                <div class="box" style="background-color: #e3e4e5">
                    <div class="box-header with-border">
                        <h3 class="box-title">Compose New Message</h3>
                    </div>
                    <div class="tab-content">


                        <!---------------        Multiple mail form   ------------------->

                        <div class="tab-pane active" id="multiplemail">
                            <form id="mailboxcustom2">
                                <div class="box-body">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mailto2" id="mailto2" placeholder="To: 'select from college category list' ">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="mailsubject2" name="mailsubject2" placeholder="Subject:">
                                    </div>
                                    <div class="form-group">


                                        <label class="error"></label>
                                        <textarea class="textarea hidden-border form-control" id="mailmsg2" name="mailmsg2" placeholder=" Type your messages here" style="height: 250px;"></textarea>
                                        <span class="help-block"></span>

                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="pull-right">

                                        <button type="submit" id="mulsendbtn" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                                    </div>
                                    <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>


                        <div class="tab-pane" id="singlemail">
                            <form id="mailboxcustom">
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mailtocollege" id="mailtocollege" placeholder="College:">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="mailto" id="mailto" placeholder="To:(email)">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="mailsubject" name="mailsubject" placeholder="Subject:">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailmsg" class="control-label"></label>
                                        <textarea id="mailmsg" name="mailmsg"  class="form-control" placeholder=" Type your messages here" style="height: 250px;"></textarea>

                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="pull-right">

                                        <button type="submit" id="singlesendbtn" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
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
    $("#mailsubmenu1").css('color','white');
</script>
<script src="<?=base_url();?>assets/backend/scripts/adm_mail.js?ui"></script>