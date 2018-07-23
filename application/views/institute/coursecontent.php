
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

    .cat-list-content-lpadding{
        border-right: 0px solid #000;
    }

</style>
<!-- main-cont -->
<div class="main-cont">
    <div class="body-wrapper">
        <div class="wrapper-padding">
            <div class="page-head">
                <div class="booking-form">
                    <div class="booking-form-i">
                        <div class="input"><input type="text" id="ccontentsearch" value="" placeholder="Search your course here . . . . . "></div>

                    </div>
                </div>
                <div class="page-title"> <span><!-- booking complete --></span></div>
                <div class="breadcrumbs">
                    <a href="<?=base_url();?>">Home</a> / <span>All Courses</span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="sp-page">
                <div class="sp-page-a">
                    <div class="sp-page-l">
                        <div class="sp-page-lb">
                            <div class="sp-page-p">
                                <div class="booking-left">

                                    <!-- ALL ABOUT COURSES -->

                                    <!-- // content-tabs-i // -->
                                    <div class="content-tabs-i">
                                        <h1>About courses</h1>
                                        <p class="small">Are you confused of choosing a course after plustwo? Here you can find plenty of courses with relevant informations.</p>
                                        <div class="todo-devider"></div>
                                        <div class="todo-row" id="coursecontents">



                                        </div>
                                        <div class="paginate"><!-- remove width id you don't need it-->
                                            <ul class="pagination" id="pages">

                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>

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
                        <div class="h-liked-lbl">Recent Articles</div>
                        <div class="h-reasons-row" id="bloglist">


                        </div>
                    </div>

                </div>
                <div class="clear"></div>
            </div>

        </div>
    </div>
</div>
<!-- /main-cont -->

<script  type="text/javascript" src="<?=base_url()?>assets/frontend/Orgscripts/coursecontents.js"></script>