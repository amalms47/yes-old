

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
                    <a href="<?=base_url();?>">Home</a> / <a></a>Career</a>
                </div>
                <div class="clear"></div>
            </div>

            <div class="sp-page" style="border: 1px solid #FFF;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="sp-page-a">
                    <div class="sp-page-l">
                        <div class="sp-page-lb">
                            <div class="sp-page-p">
                                <div class="booking-left">

                                    <!-- ALL ABOUT COURSES -->

                                    <!-- // content-tabs : Course Description // -->
                                    <div class="content-tabs-i">
                                        <span class="career-heading"><h1 id="carheading"></h1></span>
                                        <div class="columns-row">

                                            <div class="column mm-5">
                                                <img src="" id="carimage" alt=""  width="600px" height="250px" ">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="columns-row">
                                            <p id="carcontent" style="font-family: Montserrat;font-size: 14px;"></p>
                                        </div>

                                       <div class="todo-devider"></div>

                                    </div>
                                    <!-- \\ content-tabs-i \\ -->


                                    <!-- // Entry Requirement // -->
                                    <div class="complete-txt">
                                        <h1>Skills Required</h1> <br>
                                        <!-- <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, ipsam praesentium culpa ipsum in atque ad, autem iusto sint asperiores aliquam natus, fuga quas eligendi nostrum iure labore? Pariatur, alias!</p> -->

                                        <nav class="marked-c">
                                            <ul id="carskills" style="font-family: Montserrat;font-size: 14px;">

                                            </ul>
                                        </nav>

                                        <div class="todo-devider"></div>

                                    </div>
                                    <!-- \\ content-tabs-i \\ -->


                                    <!-- // content-tabs How do i get there // -->
                                    <div class="complete-txt">
                                        <h1>How Do I Get There</h1>
                                        <p class="small" id="carhowto" style="font-family: Montserrat;font-size: 14px"></p>
                                        <div class="todo-devider"></div>

                                    </div>
                                    <!-- \\ content-tabs-i \\ -->


                                    <!-- // content-tabs Scope for H.studies // -->
                                    <div class="complete-txt">
                                        <h1>Good about this</h1>
                                        <p class="small" id="cargood" style="font-family: Montserrat;font-size: 14px"></p>
                                        <div class="todo-devider"></div>

                                    </div>
                                    <!-- \\ content-tabs-i \\ -->

                                    <div class="complete-txt">
                                        <h1>Bad about this</h1>
                                        <p class="small" id="carbad" style="font-family: Montserrat;font-size: 14px"></p>
                                        <div class="todo-devider"></div>

                                    </div>






                                    <!-- END OF ALL ABOUT COURSES -->




                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="sp-page-r">


                    <div class="h-reasons">
                        <div class="h-liked-lbl">Related Careers</div>
                        <div class="h-reasons-row" id="similiarcontnet">



                        </div>
                    </div>

                </div>
                <div class="clear"></div>
            </div>

        </div>
    </div>
</div>
<!-- /main-cont -->

<script type="text/javascript" src="<?= base_url()?>assets/frontend/Orgscripts/careerindividual.js?mk"></script>
