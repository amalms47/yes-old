<style>#reviewform label.error{color:#FB3A3A;font-weight:normal;font-size: small;float: left;}</style>
<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/jquery.rateyo.min.css">
<script src="<?=base_url();?>assets/frontend/js/jquery.rateyo.min.js"></script>
<style>
    .hidden {
        display: none;
    }
    span a{
        text-decoration: none;
    }
</style>
<script>
    $(document).ready(function(){
        'use strict';
        $('.review-ranger').each(function(){
            var $this = $(this);
            var $index = $(this).index();
            if ( $index=='0' ) {
                var $val = '3.0'
            } else if ( $index=='1' ) {
                var $val = '3.8'
            } else if ( $index=='2' ) {
                var $val = '2.8'
            } else if ( $index=='3' ) {
                var $val = '4.8'
            } else if ( $index=='4' ) {
                var $val = '4.3'
            } else if ( $index=='5' ) {
                var $val = '5.0'
            }
            $this.find('.slider-range-min').slider({
                range: "min",
                step: 0.1,
                value: $val,
                min: 0.1,
                max: 5.1,
                create: function( event, ui ) {
                    $this.find('.ui-slider-handle').append('<span class="range-holder"><i></i></span>');
                },
                slide: function( event, ui ) {
                    $this.find(".range-holder i").text(ui.value);
                }
            });
            $this.find(".range-holder i").text($val);
        });

        $('#reasons-slider').bxSlider({
            infiniteLoop: true,
            speed: 500,
            mode:'fade',
            minSlides: 1,
            maxSlides: 1,
            moveSlides: 1,
            auto: true,
            slideMargin: 0
        });

        $('#gallery').bxSlider({
            infiniteLoop: true,
            speed: 500,
            slideWidth: 108,
            minSlides: 1,
            maxSlides: 6,
            moveSlides: 1,
            auto: false,
            slideMargin: 7
        });
    });
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
                                <div class="h-tabs">
                                    <div class="h-tabs-left hidden">
                                        <div class="h-tab-i active">
                                            <a href="#" class="h-tab-item-01">
                                                <i></i>
                                                <span>photo</span>
                                                <span class="clear"></span>
                                            </a>
                                        </div>
                                        <div class="h-tab-i">
                                            <a href="#" class="h-tab-item-03">
                                                <i></i>
                                                <span>calendar</span>
                                                <span class="clear"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="h-tabs-right">
                                        <a href="#">
                                            <!-- <i></i> -->
                                             <a href="" id="brochurelink" target="_blank"><span>DOWNLOAD E-BROCHURE</span></a>
                                            <div class="clear"></div>
                                        </a>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="mm-tabs-wrapper">
                                    <!-- // tab item // -->
                                    <div class="tab-item">
                                        <div class="flight-image">

                                            <img alt="<?=base_url();?>assets/backend/images/collegecover/noimage.png" id="collegecover" width="724px" height="325px">
                                        </div>
                                    </div>
                                    <!-- \\ tab item \\ -->
                                    <!-- // tab item // -->
                                    <div class="tab-item">
                                        <div class="calendar-tab">
                                            <div class="calendar-tab-select">
                                                <label>Select month</label>
                                                <select class="custom-select">
                                                    <option>january 2015</option>
                                                    <option>january 2015</option>
                                                    <option>january 2015</option>
                                                </select>
                                            </div>
                                            <div class="tab-calendar-colls">
                                                <div class="tab-calendar-collsl">
                                                    <div class="tab-calendar-collslb">
                                                        <table>
                                                            <thead>
                                                            <tr>
                                                                <td>sun</td>
                                                                <td>mon</td>
                                                                <td>tue</td>
                                                                <td>wed</td>
                                                                <td>thu</td>
                                                                <td>fri</td>
                                                                <td>sat</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="date-passed"><span><label></label></span></td>
                                                                <td class="date-passed"><span><label></label></span></td>
                                                                <td class="date-passed"><span><label></label></span></td>
                                                                <td><span><label>1</label></span></td>
                                                                <td><span><label>2</label></span></td>
                                                                <td><span><label>3</label></span></td>
                                                                <td><span><label>4</label></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span><label>5</label></span></td>
                                                                <td><span><label>6</label></span></td>
                                                                <td><span><label>7</label></span></td>
                                                                <td><span><label>8</label></span></td>
                                                                <td><span><label>9</label></span></td>
                                                                <td><span><label>10</label></span></td>
                                                                <td><span><label>11</label></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span><label>12</label></span></td>
                                                                <td><span><label>13</label></span></td>
                                                                <td><span><label>14</label></span></td>
                                                                <td><span><label>15</label></span></td>
                                                                <td><span><label>16</label></span></td>
                                                                <td><span><label>17</label></span></td>
                                                                <td><span><label>18</label></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span><label>19</label></span></td>
                                                                <td><span><label>20</label></span></td>
                                                                <td><span><label>21</label></span></td>
                                                                <td><span><label>22</label></span></td>
                                                                <td><span><label>23</label></span></td>
                                                                <td><span><label>24</label></span></td>
                                                                <td><span><label>25</label></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span><label>26</label></span></td>
                                                                <td class="date-available"><span><label>27</label></span></td>
                                                                <td class="date-available"><span><label>28</label></span></td>
                                                                <td class="date-available"><span><label>29</label></span></td>
                                                                <td class="date-unavailable"><span><label>30</label></span></td>
                                                                <td class="date-unavailable"><span><label>31</label></span></td>
                                                                <td class="date-passed"><span><label></label></span></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="tab-calendar-collsr">
                                                <div class="tab-calendar-s">

                                                    <div class="map-symbol passed">
                                                        <div class="map-symbol-l"></div>
                                                        <div class="map-symbol-r">Date past</div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="map-symbol available">
                                                        <div class="map-symbol-l"></div>
                                                        <div class="map-symbol-r">available</div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="map-symbol unavailable">
                                                        <div class="map-symbol-l"></div>
                                                        <div class="map-symbol-r">unavailable</div>
                                                        <div class="clear"></div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="clear"></div>

                                        </div>
                                    </div>
                                    <!-- \\ tab item \\ -->

                                </div>

                                <div class="content-tabs">
                                    <div class="content-tabs-head">
                                        <nav>
                                            <ul>
                                                <li><a class="active" href="#">INFO</a></li>
                                                <li><a href="#">FACILITIES</a></li>
                                                <li><a id="selectcourse" href="#">COURSES</a></li>
                                                <li><a href="#">EVENTS</a></li>
                                                <li><a href="#">GALLERY</a></li>
                                                <li><a href="#">REVIEWS</a></li>
                                                <li><a href="#">CONTACT</a></li>
                                            </ul>
                                        </nav>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="content-tabs-body">
                                        <!-- // content-tabs-i // -->
                                        <div class="content-tabs-i">
                                            <h2 id="collegetitle">COLLEGE NAME</h2>
                                            <div class="flight-d-logo"><img alt="COLLEGE-LOGO" id="collegelogo"
                                                                            width="100px" height="100px"></div>
                                            <div class="flight-d-i">
                                                <div class="flight-d-left">


                                                    <div class="flight-da" id="collegeaff">AFFILIATION</div>
                                                    <div class="flight-da" id="collegeuni">UNIVERSITY</div>
                                                    <div class="flight-da">LOCATION</div>


                                                    <div class="flight-da">ADDRESS</div>
                                                    <div class="flight-da" id="collgesiteurl">COLLEGE SITE</div>
                                                </div>
                                                <div class="flight-d-right">
                                                    <div class="flight-d-rightb">
                                                        <div class="flight-d-rightp">
                                                            <div class="flight-d-depart" style="font-weight: 100">
                                                                <div class="flight-da" id="collegeaffiliation2">AFFILIATION</div>
                                                                <div class="flight-da"  id="collegeuniversity">UNIVERSITY</div>
                                                                <div class="flight-da" id="collegecity2">LOCATION</div>
                                                                <div class="flight-da" id="collegeaddress">address</div>

                                                                <div class="flight-da" id="collegeurl">url</div>


                                                            </div>


                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                            </div>
                                            <div class="clear"></div>

                                            <div class="flight-d-devider"></div>

                                            <div class="flight-d-text">
                                                <h2>About College</h2>
                                                <p id="collegedetails">college details</p>

                                            </div>

                                        </div>
                                        <!-- \\ content-tabs-i \\ -->
                                        <!-- // content-tabs-i // -->
                                        <div class="content-tabs-i">
                                            <h2>College Facilities</h2>
                                            <ul class="preferences-list">
                                                <li class="internet">Wifi-Campus</li>
                                                <li class="conf-room">Bus service</li>
                                                <li class="play-place">Play Place</li>
                                                <li class="hot-tub">Placement</li>
                                                <li class="restourant">Canteen</li>
                                                <li class="doorman">Hostel</li>

                                                <li class="entertaiment">Entertaiment</li>
                                                <li class="pool">Swimming Pool</li>
                                                <li class="parking">Free parking</li>
                                                <li class="tv">Library</li>
                                                <li class="secure">ATM</li>
                                                <li class="gym">Gym</li>
                                            </ul>
                                            <div class="clear"></div>
                                            <div class="preferences-devider"></div>


                                        </div>
                                        <!-- \\ content-tabs-i \\ -->

                                        <!-- // content-tabs-i // -->
                                        <div class="content-tabs-i">
                                            <div class="todo-devider"></div>
                                            <header class="fly-in page-lbl">

                                                <p id="coursemsg">College offered courses
                                                </p>
                                                <div class="pagination" id="coursepagination">

                                                </div>
                                            </header>
                                            <div class="faq-row" id="courselists">



                                            </div>
                                        </div>
                                        <!-- \\ content-tabs-i \\ -->

                                        <!-- // content-tabs-i // -->


                                        <!-- // content-tabs-i // -->
                                        <div class="content-tabs-i">




                                            <div class="todo-devider"></div>
                                            <header class="fly-in page-lbl">

                                                <p id="eventmsg">College latest events or news
                                                </p>
                                            </header>
                                            <div class="accordeons-toggles">

                                                <div class="shortcodes">
                                                    <!-- // toggle // -->
                                                    <div class="toggle" id="collegeevents">




                                                        <!-- \\ -->
                                                    </div>
                                                    <!-- \\ toggle \\ -->
                                                </div>

                                                <div class="clear"></div>
                                            </div>







                                            <div class="clear"></div>




                                        </div>
                                        <!-- \\ content-tabs-i \\ -->

                                        <!-- // content-tabs-i // -->
                                        <div class="content-tabs-i">
                                            <h2> <b>GALLERY</b> </h2>


                                            <div class="offer-slider">
                                                <header class="fly-in page-lbl">

                                                    <p id="gallerymsg">College facility,features images
                                                    </p>
                                                </header>

                                                <div class="fly-in offer-slider-c">
                                                    <div id="offers" class="owl-slider">



                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="content-tabs-i">
                                            <h2> <b>REVIEWS</b> </h2>


                                            <div class="alt-flight fly-in">
                                                <div class="alt-flight-a">
                                                    <div class="alt-flight-l">
                                                        <div class="alt-flight-lb">
                                                            <div class="alt-center">

                                                                <div class="alt-center-c" style="margin:0px 0px 0px 61px">
                                                                    <div class="alt-center-cb">
                                                                        <div class="alt-center-cp" id="reviewsection">







                                                                            <div class="clear"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                    <div class="pagination" id="reviewpagination">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>

                                                <div class="clear"></div>

                                            </div>


                                        </div>





                                        <div class="content-tabs-i">
                                            <h2> <b>CONTACT</b> </h2>

                                            <div class="flight-d-i">
                                                <div class="flight-d-left">


                                                    <div class="flight-da">Contact</div>
                                                    <div class="flight-da">Pincode</div>
                                                    <div class="flight-da">FAX</div>
                                                    <div class="flight-da">Address</div>

                                                </div>
                                                <div class="flight-d-right">
                                                    <div class="flight-d-rightb">
                                                        <div class="flight-d-rightp">
                                                            <div class="flight-d-depart">

                                                                <span><a id="collegephone2">Phone no</a></span><br>
                                                                <span><a id="collegepin">000000</a></span><br>
                                                                <span><a id="collegefax">00000</a></span><br>
                                                                <span><a id="collegeaddress2">address</a></span><br>

                                                            </div>


                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                            </div>

                                            <div class="clear"></div>
                                            <div class="flight-d-devider"></div>
                                             <!--Google map-->
                                    <div id="map"  style="height: 250px">


                                    </div>




                                            <div class="clear"></div>




                                        </div>
                                        <!-- \\ content-tabs-i \\ -->

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="sp-page-r">
                    <div class="h-detail-r">
                        <div class="h-detail-lbl">
                            <div class="h-detail-lbl-a"><span id="collegetitle2">COLLEGE NAME</span>&nbsp;<span id="shortnamespan">[<span id="collegename">SHORTNAME</span>]</span></div>
                            <div class="h-detail-lbl-b"><span class="" id="collegestate"></span>&nbsp;, <span id="collegedistrict">&nbsp;</span>,&nbsp;<span id="collegecity">&nbsp;</span></div>
                        </div>
                        <div class="h-detail-stars fligts-s" id="affilicationside">
                            <div class="flight-line-d">

                            </div>
                            <div class="flight-line-a">
                                <b id="collegeaffiliation">affiliation</b>

                            </div>




                            <div class="clear"></div>
                        </div>

                        <div class="h-detail-stars fligts-s">
                            <div class="flight-line-d">

                            </div>
                            <div class="flight-line-a">
                                <a href="javascript:void(0)" style="text-decoration: none" id="addcompare">Add to compare</a>

                            </div>




                            <div class="clear"></div>
                        </div>

                        <div class="h-details-text">
                            <p><span style="padding-left:20px;" class="fa fa-university"></span>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;" id="collegetype"></span> </p>
                        </div>
                        <a href="javascript:void(0)" style="text-decoration: none" id="getadm"  class="book-btn">

                            <span class="book-btn-r" style="float: none" id="getadm">GET ADMISSION</span>


                        </a>

                        <a href="javascript:void(0)" style="text-decoration: none;background-color: #1d3d70;border: 1px solid #1d3d70;" id="getadm"   class="book-btn">

                            <span class="book-btn-r" style="float: none" id="submitreview">SUBMIT A REVIEW</span>


                        </a>
                    </div>





                    <div class="h-liked">
                        <div class="h-liked-lbl">Similar Colleges</div>
                        <div class="h-liked-row" id="similiarclg">




                        </div>
                    </div>

                    <div class="h-reasons">
                        <div class="h-liked-lbl">Reasons to join with us</div>
                        <div class="h-reasons-row">
                            <!-- // -->
                            <div class="reasons-i">
                                <div class="reasons-h">
                                    <div class="reasons-l">
                                        <img alt="" src="<?=base_url();?>assets/frontend/img/reasons-a.png">
                                    </div>
                                    <div class="reasons-r">
                                        <div class="reasons-rb">
                                            <div class="reasons-p">
                                                <div class="reasons-i-lbl">Better exposure</div>
                                                <p>Provides a platform to interactive with prospective students and lure them into seaking admission</p>
                                            </div>
                                        </div>
                                        <br class="clear" />
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
                                                <div class="reasons-i-lbl">perfect partner</div>
                                                <p>Gives you a marketing partner who will make sure you get the right exposure in the right way</p>
                                            </div>
                                        </div>
                                        <br class="clear"/>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!-- \\ -->
                            <!-- // -->

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
                                <img src="<?= base_url()?>assets/images/logo-lat.gif">
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


                                <form  action="javascript:void(0);" id="reviewform" method="post">

                                    <div class="form-group has-feedback">

                                            <input type="text" placeholder="Your name" id="revname" name="revname" class="form-control">
                                           <span class="help-block"></span>
                                    </div>
                                    <div class="form-group has-feedback">


                                        <textarea class="form-control" id="revcontent"  name="revcontent" placeholder="Type your review about college"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <input type="hidden"  id="starscoun" name="starscoun" class="form-control">


                                    <p style="font-weight: bold;color: darkgray;font-family: 'Montserrat', sans-serif" >Select your stars</p><div id="rateYo"></div>


                                    <br>


                                    <div class="form-group has-feedback">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">SUBMIT REVIEW</button>


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
                            <button type="button" class="close" data-dismiss="modal" id="cancelrequest1" aria-label="Close">
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
                                        <div class="complete-info-r" style="text-transform: uppercase" id="subfname"> &nbsp;<span id="sublname"></span></div>
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



                                    </div>


                                    <hr>

                                    <h2 style="margin-left: -10%;font-family: 'Montserrat', sans-serif;color: #626262;font-size: 12px;font-weight: 300" class="text-center">Attachment List</h2><br>


                                    <div id="attachsubsection">




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

                                        <button type="submit" style="width: 80px;" colid="-1" colname="" couid="-1" couname="" class="booking-complete-btn" id="submitrequest">SEND</button>


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
                            <button type="button" class="close" data-dismiss="modal" id="dismissmodals" aria-label="Close">
                                <span aria-hidden="true">x</span></button>
                            <h4 class="modal-title text-center">
                                <img src="<?= base_url()?>assets/images/logo-lat.gif">
                            </h4>
                        </div>
                        <div class="modal-body">

                            <ul style="font-family: Raleway;font-weight: bold;color:#3d3e3f">
                                <li style="padding:8px;">Login to your account.</li>
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

    </div>
</div>
        <script>

            var collegeid="<?=$collegeid;?>";
    var collegename="<?=$collegename;?>";
    var site_url="<?=base_url();?>";


        </script>


        <script>
            $("#addcompare").click(function () {


                window.open(site_url+"compare-colleges/"+collegename+"/"+collegeid, '_blank');
            });
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

$("#submitreview").click(function () {
    $('#reqModal').modal({backdrop: 'static', keyboard: false});
});
</script>
        <script>


            $("#getadm").click(function () {
                $('#infoModal').modal({backdrop: 'static', keyboard: false});
                $("#selectcourse").click();

                setTimeout(function () {

                    $("#dismissmodals").click();
                },8000);


            });

        </script>

        <script>
            $(function () {



                $("#rateYo").rateYo()
            });
        </script>
        <script type="application/javascript" src="<?=base_url();?>assets/backend/scripts/student/studsubmitform.js"></script>
        <script type="application/javascript" src="<?=base_url();?>assets/frontend/Orgscripts/ins_frontpage.js?jk"></script>

