<style>
#applicationform1 label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
#applicationform2 label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
#applicationform3 label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
#attachform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: left;}
</style>
<script type="text/javascript" src="<?= base_url()?>assets/backend/plugins/state/state.js"></script>

<style>
    .hidden {
        display: none;
    }
    span a{
        text-decoration: none;
    }
    .control-label{font-weight: 500;font-family: 'Montserrat', sans-serif}
</style>

<!-- main-cont -->


<div class="main-cont">
    <div class="body-wrapper">
        <div class="wrapper-padding">

            <div class="sp-page">

                <div class="sp-page-a">
                    <div class="sp-page-l">
                        <div class="sp-page-lb">
                            <div class="sp-page-p">




                                <div class="content-tabs">
                                    <div class="content-tabs-head">
                                        <nav>
                                            <ul>
                                                <li><a class="active" href="#">PERSONAL INFORMATIONS</a></li>
                                                <li><a id="contactstep" href="#">CONTACT DETAILS</a></li>
                                                <li><a id="qualicationstep" href="#">QUALIFICATIONS</a></li>
                                                <li><a id="attachmentstep" href="#">ATTACHMENTS</a></li>
                                            </ul>
                                        </nav>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="content-tabs-body">
                                        <!-- // content-tabs-i // -->
                                        <div class="content-tabs-i">
                                            <form id="applicationform1" method="post" action="javascript:void(0)">
                                                <!-- Form start -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="fname">First name:</label>
                                                            <input id="fname" name="fname" type="text" placeholder="Firstname" class="form-control input-md">

                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="lname">Last name:</label>
                                                            <input id="lname" name="lname" type="text" placeholder="Lastname" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="frname">Fathers name:</label>
                                                            <input id="frname" name="frname" type="text" placeholder="Father or Guardian name" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="dob">Date of birth:</label>
                                                            <input id="dob" name="dob" type="date" placeholder="Mobile number" class="form-control input-md">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="religion">Religion:</label>
                                                            <input id="religion" name="religion" type="text" placeholder="Religion (without subdivision)" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="caste">Caste:</label>
                                                            <input id="caste" name="caste" type="text" placeholder="Caste (Subdivision if any)" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="gender">Gender:</label>
                                                            <select id="gender" name="gender" class="form-control">

                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="control-label" for="mobile">Mobile:</label>
                                                            <input id="mobile" name="mobile" type="text" placeholder="Mobile number" class="form-control input-md">
                                                        </div>
                                                    </div>



                                                </div>

                                                <!-- form end -->
                                                <span id="form1msg"></span>
                                                <div class="booking-complete" id="buttons">
                                                    <button type="button" onclick="checklogin();" class="booking-complete-btn pull-left">COMPLETE LATER</button>

                                                    <button type="submit" id="formbutton1" class="booking-complete-btn2 bg-gray pull-right">CONTINUE</button>

                                                </div>

                                            </form>
                                            <div class="clear"></div>

                                        </div>
                                        <!-- \\ content-tabs-i \\ -->
                                        <!-- // content-tabs-i // -->
                                        <div class="content-tabs-i">


                                            <form id="applicationform2" method="post" action="javascript:void(0)">


                                                <!-- Form start -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="address">Address Line 1   :</label>
                                                            <textarea id="address" name="address"  placeholder="Address Line 1:" class="form-control input-md"></textarea>

                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="address2">Address Line 2:</label>
                                                            <input id="address2" name="address2" type="text" placeholder="Addresss Line 2" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="city">Town:</label>
                                                            <input id="city" name="city" type="text" placeholder="Town or City name" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="pincode">Pincode:</label>
                                                            <input id="pincode" name="pincode" type="text" placeholder="Enter your pincode" class="form-control input-md">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="country">Nationality:</label>
                                                            <input id="country" name="country" type="text" value="India" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="state2">State:</label>
                                                            <select id="state" name="state" class="form-control">

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label"  for="district2">City:</label>
                                                            <select id="district" name="district"  class="form-control">

                                                            </select>
                                                        </div>
                                                    </div>



                                                </div>



                                                <div class="booking-devider"></div>
                                                <div class="h-liked-lbl" id="tempshow"><a style="text-decoration: none" href="javascript:void(0)"><i class="fa fa-plus-circle"></i>&nbsp;Temporary Address (optional)</a></div>


                                                <br>
                                                <div id="tempaddress" class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="taddress">Temporary Address:</label>
                                                            <textarea id="taddress" name="taddress"  placeholder="Address Line 1:" class="form-control input-md"></textarea>

                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="taddress2">Address Line 2:</label>
                                                            <input id="taddress2" name="taddress2" type="text" placeholder="Addresss Line 2" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="tcity">Town:</label>
                                                            <input id="tcity" name="tcity" type="text" placeholder="Town or City name" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="tpincode">Pincode:</label>
                                                            <input id="tpincode" name="tpincode" type="text" placeholder="Enter your pincode" class="form-control input-md">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="tcountry">Nationality:</label>
                                                            <input id="tcountry" name="tcountry" type="text" value="India" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="tstate">State:</label>
                                                            <input id="tstate" name="tstate" type="text" placeholder="Eg: Kerala" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="tdistrict">City:</label>
                                                            <input id="tdistrict" name="tdistrict" type="text" placeholder="Eg: Ernakulam" class="form-control input-md">
                                                        </div>
                                                    </div>




                                                </div>
                                                <span id="term_error" style="color:red;"></span>
                                                <div class="form-group" >
                                                    <label style="color: black;font-weight: normal">
                                                        <input type="checkbox" id="terms" value="" />
                                                        &nbsp;I accept the <span><a href="javascript:void(0)" style="color: #233044">Terms And Conditions</a></span>
                                                    </label>
                                                </div>
                                                <span id="form2msg"></span>
                                                <div class="booking-complete" id="buttons">

                                                    <button type="submit" id="formbutton2" class="booking-complete-btn2 bg-gray pull-right">SUBMIT</button>

                                                </div>
                                            </form>
                                            <div class="clear"></div>


                                        </div>
                                        <!-- \\ content-tabs-i \\ -->

                                        <!-- // content-tabs-i // -->
                                        <div class="content-tabs-i">

                                            <span id="qualmsg" style="color: green"></span>
                                            <header class="fly-in page-lbl">
                                                <div class="booking-complete" id="buttons">

                                                    <button type="submit" id="addqual" class="booking-complete-btn2 bg-gray pull-left">CLICK TO ADD</button>

                                                    <p style="width: 300px;margin-left: -192px;margin-top: 30px;">Add your Qualifications details (max 5)
                                                    </p>

                                                </div>

                                            </header>
                                            <div class="todo-devider"></div>

                                            <div class="register-box-body" id="Appqualform" >


                                                <form id="applicationform3" method="post" action="javascript:void(0)">

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


                                        <div class="content-tabs-i">

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
                                        <div class="todo-devider"></div>





                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="sp-page-r">





                <div class="h-reasons">
                    <div class="h-liked-lbl">Reasons to join with us</div>
                    <div class="h-reasons-row">
                        <!-- // -->
                        <div class="reasons-i">
                            <div class="reasons-h">
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

                    </div>
                </div>


            </div>
            <div class="clear"></div>
        </div>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="dismissmodal" aria-label="Close">
                            <span aria-hidden="true">x</span></button>
                        <h4 class="modal-title text-center">
                            <img src="<?= base_url();?>assets/images/logo-lat.gif">
                        </h4>
                    </div>
                    <div class="modal-body">

                        <p style="color:red;font-family: 'Montserrat', sans-serif;" id="custom_message" class="text-bold text-logogreen text-center"></p>


                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="reqModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="cancelsubrequest" aria-label="Close">
                            <span aria-hidden="true">x</span></button>
                        <h4 class="modal-title text-center">
                            <img src="<?= base_url()?>assets/images/logo-lat.gif">
                        </h4>
                    </div>
                    <div class="modal-body">

                        <div class="register-box-body" id="register_form" >


                            <form  action="javascript:void(0);" id="admissionrequestform" method="post">



                                <div class="form-group has-feedback">


                                    <textarea class="form-control" id="reqmsg"  name="reqmsg" placeholder="Type your message here"></textarea>
                                    <span class="help-block"></span>
                                </div>










                                <div class="form-group has-feedback">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Send Request</button>


                                </div>




                            </form>



                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-------- SUBMIT FORM MODAL STARTS HERE   --->

        <div class="modal" id="detailsModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="cancelrequest" aria-label="Close">
                            <span aria-hidden="true">x</span></button>
                        <h4 class="modal-title" style="height: 30px;">
                            <img src="<?= base_url()?>assets/images/logo-lat.gif" style="width: 100px;height: 30px;">
                            <p  style="font-size: 10px;
    color: #626262;" class="text-center" >APPLICATION FORM</p>
                        </h4>
                    </div>
                    <div class="modal-body">

                        <div class="complete-info">
                            <h2 style="font-family: 'Montserrat', sans-serif;color: #626262;font-size: 12px;font-weight: 300" class="text-center">Your Personal Information</h2><br>
                            <div class="complete-info-table " style="margin-left: 10%;">
                                <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                    <div class="complete-info-l">FULL NAME :</div>
                                    <div class="complete-info-r" style="text-transform: uppercase" id="subfname"> &nbsp;<span id="sublname">s</span></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                    <div class="complete-info-l">FATHER'S NAME :</div>
                                    <div class="complete-info-r" style="text-transform: uppercase" id="subfrname"></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                    <div class="complete-info-l">D.O.B :</div>
                                    <div class="complete-info-r" style="text-transform: uppercase" id="subdob"></div>
                                    <div class="clear"></div>
                                </div>

                                <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                    <div class="complete-info-l">MOBILE :</div>
                                    <div class="complete-info-r" style="text-transform: uppercase" id="submobile"></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                    <div class="complete-info-l">GENDER :</div>
                                    <div class="complete-info-r" style="text-transform: uppercase" id="subgender"></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                    <div class="complete-info-l">RELIGION :</div>
                                    <div class="complete-info-r" style="text-transform: uppercase" id="subreligion"> &nbsp;<span id="subcaste"></span></div>
                                    <div class="clear"></div>
                                </div>

                                <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                    <div class="complete-info-l">ADDRESS :</div>
                                    <div class="complete-info-r" style="text-transform: lowercase"><span id="subaddress"></span>&nbsp;<span id="subcity"></span>&nbsp;<span id="subdistrict"></span>&nbsp;<span id="substate"></span>&nbsp;<span id="subcountry"></span>
                                    </div>
                                    <div class="clear"></div>&nbsp;
                                </div>






                                <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                    <div class="complete-info-l">TEMPORARY ADDRESS :</div>
                                    <div class="complete-info-r" style="text-transform: lowercase"><span id="tsubaddress"></span>&nbsp;<span id="tsubcity"></span>&nbsp;<span id="tsubdistrict"></span>&nbsp;<span id="tsubstate"></span>&nbsp;<span id="tsubcountry"></span>
                                    </div>
                                    <div class="clear"></div>&nbsp;
                                </div>


                                <hr>

                                <h2 style="margin-left: -10%;font-family: 'Montserrat', sans-serif;color: #626262;font-size: 12px;font-weight: 300" class="text-center">Qualification Details</h2><br>







                                <div id="qualsubsection">
                                    <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                        <div class="complete-info-l">QUALIFICATION NAME 1 :</div>
                                        <div class="complete-info-r" style="text-transform: lowercase">s.s.l.c</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                        <div class="complete-info-l">QUALIFICATION NAME 1 :</div>
                                        <div class="complete-info-r" style="text-transform: lowercase">s.s.l.c</div>
                                        <div class="clear"></div>
                                    </div>

                                </div>


                                <hr>

                                <h2 style="margin-left: -10%;font-family: 'Montserrat', sans-serif;color: #626262;font-size: 12px;font-weight: 300" class="text-center">Attachment List</h2><br>


                                <div id="attachsubsection">

                                    <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">
                                        <div class="complete-info-l">ATTACHMENT NAME 1 :</div>
                                        <div class="complete-info-r" style="text-transform: lowercase">s.s.l.c</div>
                                        <div class="clear"></div>
                                    </div>


                                </div>

                                <hr>

                                <h2 style="margin-left: -10%;font-family: 'Montserrat', sans-serif;color: #626262;font-size: 12px;font-weight: 300" class="text-center">Applying for</h2><br>


                                <div class="complete-info-i"  style="font-size: 10px;
    color: #626262;">

                                    <div class="complete-info-l">COURSE NAME :</div>
                                    <div class="complete-info-r" id="subcoursename" style="text-transform: lowercase"></div>
                                    <div class="clear"></div>
                                </div>


                                <div class="complete-info-i">

                                    <button type="submit" style="width: 80px;" class="booking-complete-btn" id="submitrequest">SEND</button>


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <!-------- SUBMIT FORM MODAL ENDS HERE   --->


        <div class="modal" id="infoModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="dismissmodal" aria-label="Close">
                            <span aria-hidden="true">x</span></button>
                        <h4 class="modal-title text-center">
                            <img src="<?= base_url()?>assets/images/logo-lat.gif">
                        </h4>
                    </div>
                    <div class="modal-body">

                        <ul style="font-family: Raleway;font-weight: bold;color:#3d3e3f">
                            <li style="padding:8px;">Go to course section in your selected college.</li>
                            <li style="padding:8px;">Select your course.</li>
                            <li style="padding:8px;">check eligibility criteria provided by college.</li>
                            <li style="padding:8px;">Submit form</li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>

        var collegeid="<?=$collegeid;?>";
        var site_url="<?=base_url();?>";


    </script>

    <script>

        var checklogin=function () {
            $.post(site_url+"Student/checkloginstatus",function (data) {
                if(data.value==1){
                    window.location.href=site_url+'student-home';
                }
                else if(data.value){
                    window.location.href=site_url+'Exceptions';
                }
            });
        };
    </script>
    <script>
        $(function() {
            function reposition() {
                var modal = $(this),
                    dialog = modal.find('.modal-dialog');
                modal.css('display', 'block');

                // Dividing by two centers the modal exactly, but dividing by three
                // or four works better for larger screens.
                dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
            }
            // Reposition when a modal is shown
            $('.modal').on('show.bs.modal', reposition);
            // Reposition when the window is resized
            $(window).on('resize', function() {
                $('.modal:visible').each(reposition);
            });
        });

    </script>
    <script>

        $("#tempaddress").hide();
        $("#tempshow").click(function () {
            $("#tempaddress").toggle();
        });
    </script>
    <script>
        $("#Appqualform").hide();
        $("#addqual").click(function () {
            $("#Appqualform").slideDown('fast');
        });
    </script>
    <script>
        $("#getadm").click(function () {
            $('#infoModal').modal({backdrop: 'static', keyboard: false});
            $("#selectcourse").click();
            setInterval(function () {
                $('#dismissmodal').click();
            },10000);


        });
    </script>

    <script src="<?=base_url();?>assets/backend/scripts/student/applicationform2.js"></script>

 <!--   <script type="application/javascript" src="<?=base_url();?>assets/frontend/scripts/ins_frontpage.js"></script>-->

