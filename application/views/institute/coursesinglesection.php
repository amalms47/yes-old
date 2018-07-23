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
<script>
    var name='<?=$term;?>';
    var cat='<?=$cat;?>';
</script>
<!-- main-cont -->

<div class="main-cont">
    <div class="body-wrapper">
        <div class="wrapper-padding">
            <div class="page-head">
                <div class="page-title"><span><!-- booking complete --></span></div>
                <div class="breadcrumbs">
                    <a href="<?=base_url();?>">Home</a> / <span>Course Name</span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="sp-page">
                <div class="sp-page-a">
                    <div class="sp-page-l">
                        <div class="sp-page-lb">
                            <div class="sp-page-p">
                                <h1 style="text-align: center;text-transform: uppercase" id="chead"></h1>
                                <div class="booking-left">

                                    <!-- ALL ABOUT COURSES -->

                                    <!-- // content-tabs : Course Description // -->
                                    <div class="content-tabs-i">
                                        <h1>Lets Know About It</h1>
                                        <p class="small" id="contentsection" style="font-family: Montserrat;font-size: 14px;"></p>
                                        <div class="todo-devider"></div>

                                    </div>
                                    <!-- \\ content-tabs-i \\ -->


                                    <!-- // Entry Requirement // -->
                                    <div class="complete-txt">
                                        <h1>Eligibility Criteria</h1> <br>
                                        <!-- <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, ipsam praesentium culpa ipsum in atque ad, autem iusto sint asperiores aliquam natus, fuga quas eligendi nostrum iure labore? Pariatur, alias!</p> -->

                                        <nav class="marked-c">
                                            <ul id="eligibilitysection" style="font-family: Montserrat;font-size: 14px">

                                            </ul>
                                        </nav>

                                        <div class="todo-devider"></div>

                                    </div>
                                    <!-- \\ content-tabs-i \\ -->


                                    <!-- // content-tabs Future of courses // -->
                                    <div class="complete-txt">
                                        <h1>Future of the Course </h1>
                                        <p class="small" id="futuresection" style="font-family: Montserrat;font-size: 14px"></p>
                                        <div class="todo-devider"></div>

                                    </div>
                                    <!-- \\ content-tabs-i \\ -->


                                    <!-- // content-tabs Scope for H.studies // -->
                                    <div class="complete-txt">
                                        <h1>Scope for Higher Studies</h1>
                                        <p class="small" id="scopesection" style="font-family: Montserrat;font-size: 14px"></p>
                                        <div class="todo-devider"></div>

                                    </div>
                                    <!-- \\ content-tabs-i \\ -->






                                    <!-- END OF ALL ABOUT COURSES -->


                                    <div class="complete-info">







                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="sp-page-r">


                    <div class="h-reasons">
                        <div class="h-liked-lbl">Related Courses</div>
                        <div class="h-reasons-row" id="similiarcontnet">
                            <!-- // -->


                            <!-- \\ -->
                        </div>
                    </div>

                </div>
                <div class="clear"></div>
            </div>

        </div>
    </div>
</div>
<!-- /main-cont -->
<script type="text/javascript" src="<?= base_url()?>assets/frontend/Orgscripts/courseindividual.js"></script>