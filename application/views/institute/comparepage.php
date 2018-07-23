<script>
    var comparedclg="<?=$url;?>";
    var clgid="<?=$clgid;?>";
    var site_url="<?=base_url();?>";

</script>
<!-- main-cont -->
<div class="main-cont">
    <div class="body-wrapper">
        <div class="wrapper-padding">
            <div class="page-head">
                <div class="page-title">COLLEGE - <span>COMPARE COLLEGES</span></div>
                <div class="breadcrumbs">
                    <a href="<?=base_url();?>">Home</a> / <span>COMPARE COLLEGES</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="two-colls">
                <div class="two-colls-left">







                </div>
                <div class="two-colls-right">
                    <div class="two-colls-right-b">
                        <div class="padding">



                            <div class="catalog-row grid">




                            </div>

                            <div class="clear"></div>

                            <!-- <div class="pagination">
                              <a class="active" href="#">1</a>
                              <a href="#">2</a>
                              <a href="#">3</a>
                              <div class="clear"></div>
                            </div> -->
                        </div>
                    </div>
                    <br class="clear" />
                </div>
            </div>
            <div class="clear"></div>
            <div class="shortcodes" style="margin-left: 25px;">
                <table class="table-a">
                    <tr>


                        <!-- College Select -->
                        <th style="width: 30%;">


                            <div class="side-block fly-in">
                                <div class="side-block-search">




                                    <div id="add-college" class="page-search-p">

                                        <form id="searchclgform" action="javascript:void(0)" method="post">
                                        <!-- // -->
                                        <div class="srch-tab-line">
                                            <div class="srch-tab">

                                                <label>Search college</label>
                                                <div class="input-a"><input type="text" value="" id="searchclg" placeholder="Type college name here . . ."></div>

                                            </div>

                                            <div class="clear"></div>
                                        </div>

                                        <div class="srch-tab-line no-margin-bottom">

                                            <div class="clear"></div>
                                            <button style="display: none" class="srch-btn">select</button>
                                        </div>
                                        <!-- \\ -->

                                        </form>
                                    </div>

                                </div>
                            </div>

                        </th>

                        <!-- End of college select -->
                        <!-- COLLEGE 1 -->
                        <th style="width: 35%">
                            <!-- // -->
                            <div class="offer-slider-i catalog-i tour-grid fly-in">
                                <a href="#" class="offer-slider-img">
                                    <img alt=""  src="" id="clgimage1"  style="border-radius: 4px;width: 250px;height: 200px;margin-left:0 auto;">

                                </a>
                                <div class="offer-slider-txt">
                                    <div class="offer-slider-link" id="clg1name"><a>Scms college of engineering</a></div>
                                    <div class="offer-slider-l">
                                        <div class="offer-slider-location" id="clg1type">Engineering</div>
                                        <nav class="stars">
                                            <ul>
                                                <li><a><img alt="" src="<?=base_url();?>assets/frontend/img/star-b.png" /></a></li>
                                                <li><a><img alt="" src="<?=base_url();?>assets/frontend/img/star-b.png" /></a></li>
                                                <li><a><img alt="" src="<?=base_url();?>assets/frontend/img/star-b.png" /></a></li>
                                                <li><a><img alt="" src="<?=base_url();?>assets/frontend/img/star-b.png" /></a></li>
                                                <li><a><img alt="" src="<?=base_url();?>assets/frontend/img/star-a.png" /></a></li>
                                            </ul>
                                            <div class="clear"></div>
                                        </nav>
                                    </div>


                                    <div class="clear"></div>
                                </div>
                            </div>
                            <!-- \\ -->
                        </th>

                        <!-- COLLEGE 1 -->


                        <!-- COLLEGE 2 -->

                        <th style="35%">
                            <!-- // -->
                            <div class="offer-slider-i catalog-i tour-grid fly-in">
                                <a href="#" class="offer-slider-img">
                                    <img alt="" style="border-radius: 4px;width: 250px;height: 200px;margin-left:0 auto" id="clgimage2" src="<?=base_url();?>assets/backend/images/collegeprofile/none.jpg">



                                </a>
                                <div class="offer-slider-txt">
                                    <div class="offer-slider-link"><a id="clg2name">No college selected</a></div>
                                    <div class="offer-slider-l">
                                        <div class="offer-slider-location" id="clg2type"></div>
                                        <nav class="stars">
                                            <ul>
                                                <li><a href="#"><img alt="" src="<?=base_url();?>assets/frontend/img/star-b.png" /></a></li>
                                                <li><a href="#"><img alt="" src="<?=base_url();?>assets/frontend/img/star-b.png" /></a></li>
                                                <li><a href="#"><img alt="" src="<?=base_url();?>assets/frontend/img/star-b.png" /></a></li>
                                                <li><a href="#"><img alt="" src="<?=base_url();?>assets/frontend/img/star-b.png" /></a></li>
                                                <li><a href="#"><img alt="" src="<?=base_url();?>assets/frontend/img/star-a.png" /></a></li>
                                            </ul>
                                            <div class="clear"></div>
                                        </nav>
                                    </div>


                                    <div class="clear"></div>

                                </div>
                            </div>
                            <!-- \\ -->
                        </th>


                        <!-- COLLEGE 2 -->
                        <!-- <th>Column four</th> -->
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td id="clglocation1"></td>
                        <td id="clglocation2"></td>
                        <!-- <td>Total #1</td> -->
                    </tr>
                    <tr>
                        <th>College Type</th>
                        <td id="clgtype1"></td>
                        <td id="clgtype2"></td>
                        <!-- <td>Total #1</td> -->
                    </tr>
                    <tr>
                        <th>Affiliation</th>
                        <td id="clgaff1"></td>
                        <td id="clgaff2"></td>
                        <!-- <td>Total #1</td> -->
                    </tr>
                    <tr>
                        <th>University</th>
                        <td id="clguniversity1"></td>
                        <td id="clguniversity2"></td>
                        <!-- <td>Total #1</td> -->
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td id="clgaddr1"></td>
                        <td id="clgaddr2"></td>
                        <!-- <td>Total #1</td> -->
                    </tr>
                    <tr>
                        <th>courses</th>
                        <td>
                            <select class="selectpicker" style="width: 100%;" id="courseselect1" data-style="btn-inverse" >

                            </select>

                        </td>
                        <td>
                            <select class="selectpicker" style="width: 100%;" id="courseselect2" data-style="btn-inverse" >

                            </select>

                        </td>
                        <!-- <td>Total #1</td> -->
                    </tr>

                    <tr id="coursedetails">
                        <th>Course details</th>
                        <td id="selectcourses1">


                        </td>



                        <td id="selectcourses2">

                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- /main-cont -->
<script>
    $("#coursedetails").hide();

</script>
<script src="<?=base_url();?>assets/frontend/Orgscripts/collegescompare.js?op"></script>