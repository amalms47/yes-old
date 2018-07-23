<div class="content-wrapper">
    <section class="content-header">
        <h1>     Institution Features     <small> institution features can be managed here</small>      </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>institution-home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><i class="fa fa-list-ul"></i> Features</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h2 class="box-title">Features List</h2>
                    </div>
                    <div class="mailbox-controls">
                        <button type="button" class="btn btn-small" style="background-color: #26292d;color: white"  id="new_feature"><i class="fa fa-plus-circle"></i> New Feature/Event</button>
                        <ul  class="pagination pagination-sm no-margin pull-right" id="feature_page"></ul>
                    </div>
                </div>
                <div class="box box-solid" style="display:none;" id="new_feature_panel">


                    <form name="featureform" id="featureform" method="post">
                        <div class="box-header with-border"><h3 class="box-title">Create/Update Feature Information For Institution </h3></div>
                        <div class="box-body">
                            <div class="col-md-5 bg-gray-ligh border-left border-right" style="padding:13px;">
                                <div class="form-group ">
                                    <div class="col-lg-4"><label><input type="radio" name="option" id="option" class="choice" value="feature" checked>&nbsp; Features</label></div>

                                    <div class="col-lg-4"><label><input type="radio" name="option" id="option" class="choice" value="event"> &nbsp;Events </label></div>


                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <div class="form-group input-group" >
                                        <label class="input-group-addon hidden-borderall" >Title </label>
                                        <input type="text" class="form-control hidden-border" name="title" id="title"  placeholder="ENTER  TITLE/HEADING eg:Hostel/Canteen/Wifi-campus " >
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12  col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon hidden-borderall" >Picture</span>
                                        <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> Event or Feature Picture<input type="file" name="pic" id="pic"></div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon hidden-borderall"  style="vertical-align: top;">Details </span>
                                        <textarea class="textarea hidden-border " name="details" id="details" placeholder="Give a details " style="width: 100%; height: 120px; font-size: 14px; line-height: 18px;  padding: 10px;"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer ">
                            <div class="row">
                                <div class="  col-md-12">
                                    <div class="pull-right">
                                        <button type="reset" class="btn" id="cancel" style="background-color: #373b42;color: white" ><i class="fa fa-refresh"></i> Cancel</button>
                                        <button type="submit" class="btn" style="background-color: #373b42;color: white" id="save" selid="-1" value="New"><i class="fa fa-plus-circle"></i>&nbsp;Save Feature</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>





                </div>
                <div class="box-body" id="feature_body">
                </div>
            </div>
        </div>
    </section>

    <script>
        $("#featuresidebar").css('color','white');
    </script>

    <script type="text/javascript" src="<?= base_url()?>assets/backend/scripts/in_features.js"></script>

</div>