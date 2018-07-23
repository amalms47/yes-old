<style>
    .ui-autocomplete-input {
        border: none;
        font-size: 14px;

        margin-bottom: 5px;
        padding-top: 2px;
        border: 1px solid #DDD !important;
        padding-top: 0px !important;
        z-index: 1511;
        position: relative;
    }

    .ui-autocomplete {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1510 !important;
        float: left;
        display: none;
        min-width: 160px;
        width: 160px;
        padding: 4px 0;
        margin: 2px 0 0 0;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
    }
</style>
<style>
    #newcatform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: right;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Institution Course Management<small>maintain all registered course information</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>/institution-home"><i class="fa fa-university"></i> Home</a></li>
            <li class="active">Institution Courses</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-solid">

                    <div class="box-header with-border">
                        <h2 class="box-title">Add course content here</h2>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <!--<input type="text" class="form-control input-sm" placeholder="Search Course" id="course_term">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>-->
                            </div>
                        </div>
                    </div>

                    <div class="mailbox-controls">
                        <button type="button" class="btn btn-small" style="background-color: #26292d;color: white" id="new_course"><i class="fa fa-plus-circle"></i> Add Course Content</button>
                        <ul  class="pagination pagination-sm no-margin pull-right" id="course_page"></ul>
                    </div>
                </div>

                <form name="feeform" id="feeform" ><input type="file" name="feefile" id="feefile" style="display:none;visiblity:hidden;z-index:99999;"><input type="text"  name="couid" id="couid" value="" style="display:none;visibility:hidden;z-index:99999;"> </form>

                <div class="box box-solid" style="display:none;" id="new_course_panel">
                    <form name="courseform" id="courseform" method="post">
                        <div class="box-header with-border"><h3 class="box-title">Create/Update Course Information For Institution </h3></div>
                        <div class="box-body">


                            <div class="row">
                                <div class="col-xs-12  col-sm-12 col-md-4 col-lg-6">
                                    <div class="form-group input-group" >
                                        <span class="input-group-addon hidden-borderall" >Course heading </span>
                                        <input class="form-control hidden-border" placeholder="Enter Course Heading" id="name" name="name">
                                        <span class="help-block"></span>
                                    </div>
                                </div>


                                <div class="col-xs-12  col-sm-12 col-md-4 col-lg-6">
                                    <div class="form-group input-group" >
                                        <span class="input-group-addon hidden-borderall" >Category name </span>
                                        <input class="form-control hidden-border" placeholder="Course Category name" id="catname" name="catname">
                                        <span class="help-block"></span>
                                    </div>
                                </div>



                            </div>





                            <div class="row">
                                <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group input-group" >
                                        <span class="input-group-addon hidden-borderall"  style="vertical-align: top;">Content</span>
                                        <textarea class="textarea hidden-border " name="content" id="content" placeholder="Enter course content details" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px;  padding: 10px;"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group input-group" >
                                        <span class="input-group-addon hidden-borderall"  style="vertical-align: top;">Eligibility</span>
                                        <textarea class="textarea hidden-border " name="eligibility" id="eligibility" placeholder="Enter course eligiblility details.Use list order style " style="width: 100%; height: 100px; font-size: 14px; line-height: 18px;  padding: 10px;"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon hidden-borderall"  style="vertical-align: top;">Scope</span>
                                        <textarea class="textarea hidden-border " name="scope" id="scope" placeholder="Give course details if any" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px;  padding: 10px;"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon hidden-borderall"  style="vertical-align: top;">Future</span>
                                        <textarea class="textarea hidden-border " name="future" id="future" placeholder="Give course details if any" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px;  padding: 10px;"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer ">
                            <div class="row">
                                <div class="  col-md-12">
                                    <div class="pull-right">
                                        <button type="reset" class="btn" style="background-color: #373b42;color: white" id="cancel" ><i class="fa fa-refresh"></i> Cancel</button>
                                        <button type="submit" class="btn" style="background-color: #373b42;color: white" id="reg" selid="-1" value="Register"><i class="fa fa-plus-circle"></i>&nbsp;Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <form name="coverform2" id="coverform2">
                    <input id="hidid" type="hidden" name="hidid" value="">
                    <input style="display: none" type="file" name="upimage" id="upimage">
                </form>

                <!---code start here -->
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="box-group" id="accordion">
                        </div>
                    </div>
                </div>

                <!-- code end here -->
            </div>
    </section>
</div>

<script type="text/javascript" src="<?= base_url()?>assets/backend/Orgscripts/coursecontent.js"></script>


<script type="text/javascript">
    $('document').ready(function(){

        $("#careercoursemenu").addClass("active");
        $("#coursesub").addClass("active");
        $("#coursesub").css('color','white');

    });
</script>

