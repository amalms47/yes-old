
<style>
    .img-thumbnail {
        border: 1px solid #ddd; /* Gray border */
        border-radius: 4px;  /* Rounded border */
        padding: 5px; /* Some padding */
        width: 150px; /* Set a small width */
        margin-top: 0%;
    }
    .complete-info-l{
        font-weight: bold;
    }

</style>
<style>
#qualform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
#brochureform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
</style>
<script>
    $("#unreadmsg").hide();
</script>
<!-- main-cont -->
<div class="main-cont">
    <div class="body-wrapper">
        <div class="wrapper-padding">


            <div class="sp-page">
                <div class="sp-page-a">
                    <div class="sp-page-l">
                        <div class="sp-page-lb">
                            <div class="sp-page-p">
                                <div class="booking-left">
                                    <h2>STUDENT PROFILE</h2>

                                    <div class="comlete-alert">
                                        <div class="">
                                            <!-- \\ -->
                                            <div class="columns-block" style="margin-bottom: 4px;">
                                                <!-- <div class="columns-block-lbl"><span>3 four layout / 1 third</span></div> -->
                                                <div class="columns-row">
                                                    <div class="column mm-4">
                                                        <img data-toggle="tooltip" data-placement="bottom" title="Change image" class="img-thumbnail" id="propictriger" src="<?=base_url();?>assets/backend/images/studimages/<?=$photo; ?>" width="150px" height="150px"
                                                             alt="YESCOLLEGES">

                                                        <form name="propicform" id="propicform">
                                                            <input type="file" name="propic" id="propic" style="display:none;visiblity:hidden;z-index:99999;">

                                                        </form>

                                                    </div>
                                                    <div class="column mm-12" style="margin-left: 10px;">
                                                        <h1><a style="text-decoration: none;text-transform: uppercase" href="javascript:void(0)"><?=$firstname;?>&nbsp;<?=$lastname?></a></h1>
                                                        <!-- contact details -->
                                                        <div class="complete-info-table">
                                                            <div class="complete-info-i">
                                                                <div class="complete-info-l"><b>E-mail :</b></div>
                                                                <div class="complete-info-r"><?=$emailid;?></div>
                                                                <div class="complete-info-l"><b>Phone :</b></div>
                                                                <div class="complete-info-r"><?=$phoneno?></div>
                                                                <div class="complete-info-l"><b>Status :</b></div>
                                                                <?php
                                                                if($active==1){$status="Active";}else{$status="Not active";}
                                                                ?>
                                                                <div class="complete-info-r"><?=$status?></div>
                                                                <div class="clear"></div>
                                                            </div>

                                                        </div>
                                                        <!-- End of Contact details -->
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <!-- \\ -->
                                        </div>
                                    </div>

                                    <div class="complete-info">
                                        <h2>Your Personal Information</h2><br>
                                        <div class="complete-info-table">
                                            <div class="complete-info-i">
                                                <div class="complete-info-l">FULL NAME</div>
                                                <div class="complete-info-r"><?=$firstname?>&nbsp;<?=$lastname?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="complete-info-i">
                                                <div class="complete-info-l">FATHER'S NAME</div>
                                                <div class="complete-info-r"><?=$frname;?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="complete-info-i">
                                                <div class="complete-info-l">D.O.B</div>
                                                <div class="complete-info-r"><?=$dob;?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="complete-info-i">
                                                <div class="complete-info-l">GENDER</div>
                                                <div class="complete-info-r"><?=$gender?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="complete-info-i">
                                                <div class="complete-info-l">RELIGION</div>
                                                <div class="complete-info-r"><?=$religion?>&nbsp;<?=$caste?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="complete-info-i">
                                                <div class="complete-info-l">PLACE</div>
                                                <div class="complete-info-r"><?=$state?>&nbsp;,&nbsp;<?=$city?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="complete-info-i">
                                                <div class="complete-info-l">COUNTRY</div>
                                                <div class="complete-info-r"><?=$country?></div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>

                                        <div class="complete-devider"></div>

                                        <div class="complete-txt">
                                            <h2>Education Info</h2>

                                            <!-- TAB CONTENTS -->

                                            <div class="content-tabs">
                                                <div class="content-tabs-head">
                                                    <nav>
                                                        <ul>
                                                            <li><a class="active" href="#">QUALIFICATIONS</a></li>
                                                            <li><a href="#">APPLIED COLLEGES</a></li>
                                                            <li><a href="#">NOTIFICATIONS&nbsp;</a></li>
                                                            <li><a href="#">ATTACHMENTS</a></li>
                                                            <!-- <li><a href="#">PLACEMENT</a></li>
                                                            <li><a href="#">GALLERY</a></li>
                                                            <li><a href="#">CONTACT</a></li> -->
                                                        </ul>
                                                    </nav>

                                                    <div class="clear"></div>
                                                </div>
                                                <div class="content-tabs-body">
                                                    <!-- // content-tabs-i // -->
                                                    <div class="content-tabs-i">
                                                        <div class="h-help-lbl-a"><a id="addqual" style="text-decoration: none;" href="javascript:void(0)"><i class="fa fa-plus-circle"></i><b>&nbsp;ADD QUALIFICATIONS</b></a></div>

                                                        <div class="flight-d-i">

                                                            <div class="flight-d-right">
                                                                <div class="flight-d-rightb">
                                                                    <div class="flight-d-rightp">


                                                                        <div class="clear"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                        </div>
                                                        <div class="clear"></div>

                                                        <div class="preferences-devider"></div>


                                                    <!------ QUALIFICATION SECTION ----------->


                                                        <div class="faq-row" id="qualificationlist">








                                                        </div>




                                                    </div>
                                                    <!-- \\ content-tabs-i \\ -->


                                                    <!-- // content-tabs-i // -->
                                                    <div class="content-tabs-i" id="requestsection">



                                                    </div>
                                                    <!-- \\ content-tabs-i \\ -->

                                                    <!-- // content-tabs-i // -->
                                                    <div class="content-tabs-i" id="notificationsection">


                                                    </div>
                                                    <!-- \\ content-tabs-i \\ -->

                                                    <!-- // content-tabs-i // -->
                                                    <div class="content-tabs-i">

                                                        <div class="h-help-lbl-a"><a  id="uploadattach" style="text-decoration: none;" href="javascript:void(0)"><i class="fa fa-plus-circle"></i><b>&nbsp;ADD ATTACHMENTS</b></a></div>

                                                        <div class="tables">
                                                            <!-- <div class="typography-heading">tables</div> -->
                                                            <div class="shortcodes">
                                                                <table class="table-a" id="attachs">


                                                                </table>
                                                            </div>

                                                            <div class="clear"></div>
                                                        </div>


                                                            <div class="clear"></div>







                                                    </div>
                                                    <!-- \\ content-tabs-i \\ -->






                                                </div>
                                            </div>




                                            <!-- END  OF TAB CONTENTS -->


                                        </div>

                                        <div class="complete-devider"></div>



                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="sp-page-r">

                    <div class="h-help">
                        <div class="h-help-lbl">Last login at:</div>
                        <div class="h-help-lbl-a" style="font-family: 'Montserrat', sans-serif"><?=$logdate;?></div>
                        <div class="h-help-lbl-a"><a style="text-decoration: none;" href="<?=base_url();?>application-form"><b>EDIT PROFILE&nbsp;&nbsp;</b><span style="font-weight: bold ;color:#9e350f;text-transform: lowercase;font-size: small" id="pronotcomplete"></span></a></div>
                        <div class="h-help-lbl-a"><a style="text-decoration: none;" href="<?=base_url();?>user-accout-signout" > <button class="footer-subscribe-btn">LOGOUT</button></a></div>
                        <span style="font-weight: bold ;color:#9e350f;text-transform: lowercase;font-size: small;" id="unreadmsg"></span>
                    </div>

                    <div class="h-reasons">
                        <div class="h-liked-lbl">Reasons to join with us</div>

                        <div class="h-reasons-row">
                            <!-- // -->


                            <div class="reasons-i">

                                <div class="reasons-h">
                                    <br>
                                    <div class="reasons-l">
                                        <img alt="" src="<?=base_url();?>assets/frontend/img/reasons-c.png">
                                    </div>
                                    <div class="reasons-r">
                                        <div class="reasons-rb">
                                            <div class="reasons-p">
                                                <div class="reasons-i-lbl">Online admission</div>
                                                <p>Save time and efforts by enabling online admission.</p>
                                            </div>
                                        </div>
                                        <br class="clear">
                                    </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="reasons-i">
                                <div class="reasons-h">
                                    <div class="reasons-l">
                                        <img alt="" src="<?=base_url();?>assets/frontend/img/reasons-a.png">
                                    </div>
                                    <div class="reasons-r">
                                        <div class="reasons-rb">
                                            <div class="reasons-p">
                                                <div class="reasons-i-lbl">Complete guidance</div>
                                                <p>Assist students through professional guidance to achieve the goals.</p>
                                            </div>
                                        </div>
                                        <br class="clear">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!-- \\ -->
                            <!-- // -->
                            <div class="reasons-i">
                                <div class="reasons-h">
                                    <div class="reasons-l">
                                        <img alt="" src="<?=base_url();?>assets/frontend/img/reasons-b.png">
                                    </div>
                                    <div class="reasons-r">
                                        <div class="reasons-rb">
                                            <div class="reasons-p">
                                                <div class="reasons-i-lbl">Instant notifications</div>
                                                <p>Keep students updated by sending email notifications and sms alerts</p>
                                            </div>
                                        </div>
                                        <br class="clear">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <div class="reasons-i">
                                <div class="reasons-h">
                                    <div class="reasons-l">
                                        <img alt="" src="<?=base_url();?>assets/frontend/img/reasons-c.png">
                                    </div>
                                    <div class="reasons-r">
                                        <div class="reasons-rb">
                                            <div class="reasons-p">
                                                <div class="reasons-i-lbl">Easy communication</div>
                                                <p>We help students establish a direct line of communication with the institutes of their choice</p>
                                            </div>
                                        </div>
                                        <br class="clear">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!-- \\ -->
                            <!-- // -->

                            <!-- \\ -->
                        </div>
                    </div>

                </div>
                <div class="clear"></div>
            </div>

        </div>
    </div>

<div class="modal" id="qualeditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="qualeditdismissbutton" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                <h4 class="modal-title text-center">
                    <img src="<?= base_url()?>assets/images/logo-lat.gif">
                </h4>
            </div>
            <div class="modal-body">

                <div class="register-box-body" id="register_form" >


                    <form  action="javascript:void(0);" id="qualeditform" method="post">

                            <div class="form-group has-feedback">


                                <input type="text" class="form-control" id="qualeditname" value="" name="qualeditname" placeholder="Name of your Qualification">
                                <span class="help-block"></span>
                            </div>


                        <div class="form-group has-feedback">


                            <input type="hidden" class="form-control" id="qualid" value="" name="qualid" >
                            <span class="help-block"></span>
                        </div>
                            <div class="form-group has-feedback">


                                <input type="text" class="form-control" id="qualedituniversity" value="" name="qualedituniversity" placeholder="Name of your university">
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group has-feedback">


                                <input type="text" class="form-control" id="qualeditinstitution" value="" name="qualeditinstitution" placeholder="Name of your institution">
                                <span class="help-block"></span>
                            </div>


                            <div class="form-group has-feedback">


                            <input type="text" class="form-control" id="qualedityear" value="" name="qualedityear" placeholder="Year of passing">
                            <span class="help-block"></span>
                        </div>


                        <div class="form-group has-feedback">


                            <input type="text" class="form-control" id="qualeditpercent" value="" name="qualeditpercent" placeholder="% of Marks Scored">
                            <span class="help-block"></span>
                        </div>


                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Update Qualification details</button>


                        </div>




                    </form>



                </div>

            </div>
        </div>
    </div>
</div>

    <div class="modal" id="qualModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="qualdismissbutton" aria-label="Close">
                        <span aria-hidden="true">x</span></button>
                    <h4 class="modal-title text-center">
                        <img src="<?= base_url()?>assets/images/logo-lat.gif">
                    </h4>
                </div>
                <div class="modal-body">

                    <div class="register-box-body" id="register_form" >


                        <form  action="javascript:void(0);" id="qualform" method="post">

                            <div class="form-group has-feedback">


                                <input type="text" class="form-control" id="qualname" value="" name="qualname" placeholder="Name of your Qualification">
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group has-feedback">


                                <input type="text" class="form-control" id="qualuniversity" value="" name="qualuniversity" placeholder="Name of your university">
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group has-feedback">


                                <input type="text" class="form-control" id="qualinstitution" value="" name="qualinstitution" placeholder="Name of your institution">
                                <span class="help-block"></span>
                            </div>


                            <div class="form-group has-feedback">


                                <input type="text" class="form-control" id="qualyear" value="" name="qualyear" placeholder="Year of passing">
                                <span class="help-block"></span>
                            </div>


                            <div class="form-group has-feedback">


                                <input type="text" class="form-control" id="qualpercent" value="" name="qualpercent" placeholder="% of Marks Scored">
                                <span class="help-block"></span>
                            </div>


                            <div class="form-group has-feedback">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit Qualification details</button>


                            </div>




                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="attachModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="attachadismissbutton" aria-label="Close">
                        <span aria-hidden="true">x</span></button>
                    <h4 class="modal-title text-center">
                        <img src="<?= base_url()?>assets/images/logo-lat.gif">
                    </h4>
                </div>
                <div class="modal-body">


                        <span id="Attachmsg" style="color: green"></span>

                        <header class="fly-in page-lbl">
                            <div class="booking-complete" id="buttons">




                                <button type="submit" style="margin-top: 0px;" id="brchuretriger" class="booking-complete-btn2 bg-gray pull-left">CLICK TO ADD</button>
                                <form name="brochureform" id="brochureform" >
                                    <div class="row">

                                        <div class="col-md-6">
                                            <input type="file" name="brofile" id="brofile" style="display:none;visiblity:hidden;z-index:99999;">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input id="attchname" name="attchname" type="text" placeholder="Attachment name" class="form-control input-md">
                                        </div>
                                </form>
                            </div>
                            <!--    <p style="width: 300px;margin-left: -192px;margin-top: 30px;">File size below 2MB,max 4 attachments.
                                </p>
                            -->


                        </header>



                </div>
            </div>
        </div>
    </div>

</div>
<!-- /main-cont -->
<script src="<?=base_url();?>assets/backend/scripts/student/stud_profile.js?er"></script>
<script>
    var sudid='<?=$studid;?>';

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    $("#addqual").click(function () {
        $('#qualModal').modal({backdrop: 'static', keyboard: false});

    });

    $("#uploadattach").click(function () {
        $('#attachModal').modal({backdrop: 'static', keyboard: false});

    });
</script>
<script>
    $(document).ready(function(){
        'use strict';
        (function($) {
            $(function() {
                $('.checkbox input').styler({
                    selectSearch: true
                });
            });
        })(jQuery);
    });
</script>
<!-- \\ scripts \\ -->
<script>


    var blink_speed = 600;
    var t = setInterval(function () {
        var ele = document.getElementById('unreadmsg');
        ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
    }, blink_speed);


</script>