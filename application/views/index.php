
<!-- main-cont -->
<style>
    /*.how-to-div{
        background-color: silver;
        -webkit-clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%);
        clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%);
        transform: scale(.8);
    }*/
    .how-to-div a {
        text-decoration: none;
    }
    .how-to-div a:hover{
        color: #ff7200;
    }
    .how-to-div{
        padding: 1em;
        transition: all .2s ease-in-out;
    }

    .how-to-div img{
        transform: scale(1);
    }

    .how-to-div:hover{
        transform: scale(1.04);
        background-color: #F0F4F5;
        color: #ff7200;
    }

    #career-div{
        background-color: #0b2d70;
        padding: 3%;
        height: 630px;
    }
    #career-row{
        position: relative;
        left: 5%;
        height: 130px;
    }
    .btn-career{
        background-color: #082866;
        text-align: center;
        /*border: 1px solid #c1bcbc;*/
        padding: 40px;
        margin: 5px;
        transition: all .3s ease-in-out;
    }
    .btn-career:hover{
        transform: scale(1.07);
        border: 1px solid #1B2A4D;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .btn-career a{
        color: #FFFFFF;
        text-decoration: none;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 19px;
    }
    .btn-career h6,h5,h4,h3{
        text-transform: none;
    }

    /*.offer-slider{
        margin-bottom: 0px;
    }*/

    .columns-block {
        margin-bottom: 0px;
    }

    @media only screen and (max-width: 660px){
        #career-row{
            position: relative;
            left: 0%;
            height: auto;
        }

        #career-div{
            height: auto;
        }


    }
</style>
<style>

    select {font-size:1.3em}

    option {color:#6666;font-weight:bold; padding:5px}

</style>
<div class="main-cont">
    <div class="body-padding">
        <div class="mp-slider">






            <!-- // slider // -->
            <div class="mp-slider-row">
                <div class="swiper-container">


                    <a href="#" class="arrow-left"></a>
                    <a href="#" class="arrow-right"></a>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slide-section" style="background:url('https://yescolleges.azureedge.net/assets/frontend/img/carousel/cover-6.jpg') center top no-repeat;">

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-section slide-b" style="background:url('https://yescolleges.azureedge.net/assets/frontend/img/carousel/cover-2.jpg') center top no-repeat;">

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-section slide-b" style="background:url('https://yescolleges.azureedge.net/assets/frontend/img/carousel/cover-3.jpg') center top no-repeat;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- \\ slider \\ -->
        </div>


        <!-- Search item -->
        <div  class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 search-item">
            <div class="search-type-padding">
                <nav class="page-search-tabs">
                        <div class="search-tab active"  style="height: 40px;">COLLEGES</div>
                    <div class="search-tab"  style="height: 40px;">COURSES</div>

                    <div class="clear"></div>
                </nav>
                <div class="page-search-content" style="min-height: 0px;">

                    <!-- // tab content hotels // -->
                    <div class="search-tab-content" >
                        <form class="" id="collegessearch" action="<?=base_url();?>search" method="post" style="display: block">
                        <div class="page-search-p" style="padding: 20px 21px 20px 21px">
                            <!-- // -->
                            <div class="search-large-i" style="width: 100%">
                                <!-- // -->
                                <div class="srch-tab-line no-margin-bottom" >

                                    <div class="srch-tab-left" style="width: 91%">
                                        <div class="input-a"><input id="search_query" name="search_term" class="placeholder-type-writter" type="text" value="" placeholder="">

                                        </div>
                                    </div>

                                 <div class="srch-tab-right" style="width: 6%">
                                        <div class=""> <a class="srch-btn" id="clgsubmit" style="width: 50px;padding-bottom: 20px"><i class="fa fa-search"></i> </a></div>
                                    </div>



                                    <div class="clear"></div>
                                </div>
                                <!-- // -->
                            </div>

                            <div class="clear"></div>



                    </div>
                        </form>
                    <!-- // tab content hotels // -->
                    </div>
                    <!-- // tab content tours // -->
                    <div class="search-tab-content" >
                        <form class="" id="coursesearch" action="<?=base_url();?>course-search" method="post"  style="display: block">
                            <div class="page-search-p" style="padding: 20px 21px 20px 21px">
                                <!-- // -->
                                <div class="search-large-i" style="width: 100%">
                                    <!-- // -->
                                    <div class="srch-tab-line no-margin-bottom" >

                                        <div class="srch-tab-left" style="width: 91%">
                                            <div class="input-a"><input type="text" value="" name="courseterm" id="courseterm" placeholder="Search your course here"></div>
                                        </div>

                                       <div class="srch-tab-right" style="width: 6%">
                                            <div class=""> <a class="srch-btn" id="cousubmit" style="width: 50px;padding-bottom: 20px"><i class="fa fa-search"></i> </a></div>
                                        </div>



                                        <div class="clear"></div>
                                    </div>
                                    <!-- // -->
                                </div>

                                <div class="clear"></div>



                            </div>
                        </form>
                        <!-- // tab content hotels // -->
                    </div>
                    <!-- // tab content tours // -->

                    <!-- // tab content tickets // -->

                    <!-- // tab content tickets // -->
                </div>
            </div>
            <center>



             <!--   <form class="form-group" id="search-item" action="javascript:void(0);" method="post" name="sign-up">

                    <select class="" name="search_option" id="search-type">
                        <option value="college">College</option>
                        <option value="course">Course</option>

                    </select>
                    <input style="border-radius: 0px;" type="text" class="input placeholder-type-writter"
                           id="search_query" placeholder="What are you Looking for?">


                    <div class="overlay" > <i class="fa fa-refresh fa-spin "></i></div>
                    <button type="submit" class="button"  id="submitbt"><span id="loadicon"><span class="glyphicon glyphicon-search"></span></span></button>
                </form>-->
            </center>
        </div>

        <style>

            /* -- Search-bar -- */

            .search-item form {
                display: flex;
                align-items: center;
            }

            .search-item .input-group{
                margin-left: -15px;
                border-radius: 0px;

            }


            .search-item{
                /*top: -230px;*/
                /*margin-top: 150px;
                margin: auto;
                width: 100%;*/
                /*position: absolute;*/
            }




            #search-item{

            }

            #search-item select option:hover{

            }

            #search-item > select {
                width: 15%;
                height: 50px;
                background: #0c9063;
                border: 1px solid #000;
                border-radius: 0px 0 0 0px;
                border: none;
                font-family: inherit;
                color: #efebeb;
                letter-spacing: 1px;
                text-indent: 3%;
                font-weight: bold;
                border-top-left-radius: 2px;
                border-top-right-radius: 0px;
                border-bottom-right-radius: 0px;
                border-bottom-left-radius: 2px;

            }

            #search-item > .button {
                width: 10%;
                height: 50px;

                background-color: #f7a23d;

                border: none;
                border-radius: 0 5px 5px 0;
                font-size: 20px;
                font-family: inherit;
                font-weight: bold;
                color: white;
                letter-spacing: 1px;

                cursor: pointer;
            }

            #search-item .input {
                width: 70%;
                height: 50px;

                background: #FDFCFB;

                border-radius: 5px 0 0 5px;
                border: none;

                font-family: inherit;
                color: #737373;
                letter-spacing: 1px;
                text-indent: 5%;
            }


            /*.search-box select#search-type {
          color: #565656;
          }
          .search-box input, .search-box select {
          color: #AAA;
          float: left;
          }
          #search-btn {
            color: #000000;
          } */

            @media only screen and (max-width: 991px){

                .search-item {
                    /* left: 0%;
                     top: -130px;
                     margin: auto;
                     position: absolute;*/
                }

            }

            @media only screen and (max-width: 881px){



                @media only screen and (max-width: 771px){

                    /*.search-item {
                      left: 10%;
                      top: -90px;
                      margin: auto;
                      position: absolute;
                  }*/
                }



                @media only screen and (max-width: 555px){

                    .search-item {
                        width: 100%;
                        margin-left: 2%;
                    }




            /* -- End of Search-bar -- */
        </style>



        <!-- End of Search item -->



        <!-- FEATURES SECTION -->
        <div class="mp-offesr">
            <div class="">
                <div class="offer-slider">

                    <input type="hidden" id="tagidsection" value="1">



                    <div class="">
                        <div class="wrapper-padding">
                            <!-- <header class="fly-in page-lbl">
                                <b>helpful information</b>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                            </header> -->
                            <div class="fly-in advantages-row flat">
                                <div class="flat-adv large">
                                    <div class="flat-adv-a">
                                        <div class="flat-adv-l">
                                            <img alt="" id="onlineadmimage" src="<?=base_url();?>assets/frontend/img/features/online-admission-min.png" width="99" height="99" />
                                        </div>
                                        <div class="flat-adv-r">
                                            <div class="flat-adv-rb">
                                                <div class="flat-adv-b" id="onlines">Online Admission</div>
                                                <div class="flat-adv-c">Apply​ ​via​ ​the​ ​hassle-free​ ​admission​ ​portal​ ​and​ ​breeze​ ​through​ ​the​ ​process​ ​to​ ​get​ ​one​ ​step​ ​closer to​ ​grabbing​ ​your​ ​desired​ ​seat.</div>
                                                <a class="flat-adv-btn" href="<?=base_url();?>online-admission">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flat-adv large">
                                    <div class="flat-adv-a">
                                        <div class="flat-adv-l">
                                            <img alt="" id="expertimage" src="<?=base_url();?>assets/frontend/img/features/expert-guidance-min.png" width="99" height="99" />
                                        </div>
                                        <div class="flat-adv-r">
                                            <div class="flat-adv-rb">
                                                <div class="flat-adv-b">Expert Guidance</div>
                                                <div class="flat-adv-c">Here’s​ ​the​ ​solution​ ​to​ ​all​ ​your​ ​worries​ ​on​ ​finding​ ​options​ ​corresponding​ ​to​ ​your​ ​field​ ​of​ ​study​ ​and Interest.​ Talk to the industry experts.</div>
                                                <a class="flat-adv-btn" href="<?=base_url();?>expert-guidance">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flat-adv large">
                                    <div class="flat-adv-a">
                                        <div class="flat-adv-l">
                                            <img alt="" id="topclgimage" src="<?=base_url();?>assets/frontend/img/features/top-colleges-min.png"
                                                 width="99" height="99" />
                                        </div>
                                        <div class="flat-adv-r">
                                            <div class="flat-adv-rb">
                                                <div class="flat-adv-b">Top Colleges</div>
                                                <div class="flat-adv-c">We​ ​have​ ​a​ ​long-established​ ​and​ ​trusted​ ​relationship​ ​with​ ​the​ ​best-in-class​ ​colleges​ ​and universities​ ​from​ ​around​ ​South​ ​India.</div>
                                                <a class="flat-adv-btn" href="<?=base_url();?>colleges-top">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flat-adv large">
                                    <div class="flat-adv-a">
                                        <div class="flat-adv-l">
                                            <img alt="" id="topreviewimage" src="<?=base_url();?>assets/frontend/img/features/top-reviews-min.png"
                                                 width="99" height="99" />
                                        </div>
                                        <div class="flat-adv-r">
                                            <div class="flat-adv-rb">
                                                <div class="flat-adv-b">Top Reviews</div>
                                                <div class="flat-adv-c">We​ ​have​ ​a​ ​long-established​ ​and​ ​trusted​ ​relationship​ ​with​ ​the​ ​best-in-class​ ​colleges​ ​and universities​ ​from​ ​around​ ​South​ ​India.</div>
                                                <a class="flat-adv-btn" href="<?=base_url();?>top-reviews">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flat-adv large">
                                    <div class="flat-adv-a">
                                        <div class="flat-adv-l">
                                            <img alt="" id="paymentimage" src="<?=base_url();?>assets/frontend/img/features/secure-payment-min.png"
                                                 width="99" height="99" />
                                        </div>
                                        <div class="flat-adv-r">
                                            <div class="flat-adv-rb">
                                                <div class="flat-adv-b">Secure Payment</div>
                                                <div class="flat-adv-c">We​ ​present​ ​you​ ​a​ ​secure​ ​and​ ​attractively​ ​hassle-free​ ​method​ ​of​ ​remitting​ ​the admission/application​ ​fees​ ​as​ ​well​ ​as​ ​course​ ​fee.​</div>
                                                <a class="flat-adv-btn" href="<?=base_url();?>secure-payment">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flat-adv large">
                                    <div class="flat-adv-a">
                                        <div class="flat-adv-l">
                                            <img alt="" id="supportimage" src="<?=base_url();?>assets/frontend/img/features/24x7-support-min.png"
                                                 width="99" height="99" />
                                        </div>
                                        <div class="flat-adv-r">
                                            <div class="flat-adv-rb">
                                                <div class="flat-adv-b">24x7 Support</div>
                                                <div class="flat-adv-c">Any queries on the matters of payment or for intel on your desired institute, we’re only a phone call away and available round the clock.</div>
                                                <a class="flat-adv-btn" href="<?=base_url();?>customer-support">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!--  ABOUT SECTION -->

        <div class="mp-b">
            <div class="wrapper-padding">
                <div class="mp-b-lbl">About Us</div>


                <div class="fly-in">

                    <div class="col-sm-12">
                        <div class="reasons-txt">
                            <p>It isn’t acceptable to have a society where the primary needs to make academic explorations and liberty of choice are not granted to a student. We empower you with the knowledge. It is upto you to let it serve your ambitions. YesColleges is the one-stop portal for all your higher education. Join the movement to a sensibly educated society. Begin your future with us, it only takes a few minutes.</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </div>


    <!-- END OF ABOUT SECTION -->



    <!-- END OF FEATURES SECTION -->



    <div class="">

        <div class="offer-slider">
            <header class="fly-in page-lbl">
                <div class="offer-slider-lbl">FEATURED COLLEGES</div>
                <p>Discover colleges with competence in terms of quality of faculty, a solid syllabus, facilitation of extra-curriculars and pays genuine heed to the needs of its pupils. Also, find one at the most convenient location to gratify your checklist.</p>
            </header>


            <div class="portfolio-holder">
                <div class="portfolio-four-colls" id="featuredclglists" >
                    <!-- // -->






                </div>
            </div>



        </div>
    </div>
    <div class="">
        <div class="container-fluid offer-slider">
            <header class="fly-in">
                <div class="offer-slider-lbl">HOW TO ?</div>
                <p>Get set to make the right moves, beginning with your profile creation. Here’s the startlingly simple few steps to get your wheels up and running.</p>
            </header>


            <div class=" text-center">
                <!-- <header class="fly-in page-lbl">
                    <b>helpful information</b>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                </header> -->

                <div class="fly-in advantages-row flat ">
                    <center>
                        <div class=" col-md-2 col-md-offset-1 how-to-div">
                            <div class="flat-adv-a">
                                <a href="javascript:void(0);" id="how-create">
                                    <img alt="" src="<?=base_url();?>assets/frontend/img/how-to/create-account.png" width="99px" height="99px" />
                                    <h4>Create Account</h4>
                                </a>

                            </div>
                    </center>

                </div>
                <div class="col-md-2 how-to-div">
                    <div class="flat-adv-a">
                        <div class="flat-adv-2">
                            <a href="<?=base_url();?>search">
                                <img alt="" src="<?=base_url();?>assets/frontend/img/how-to/find-college.png" width="99" height="99" />
                                <h4>Find College/Course</h4>
                            </a>

                        </div>

                    </div>
                </div>
                <div class=" col-md-2 how-to-div" id="indexsubmitform">
                    <div class="flat-adv-a">
                        <a href="javascript:void(0)">
                            <img alt="" src="<?=base_url();?>assets/frontend/img/how-to/submit-form.png" width="99" height="99" />
                            <h4>Submit Form</h4>
                        </a>

                    </div>
                </div>
                <div class=" col-md-2 how-to-div">
                    <div class="flat-adv-a">
                        <a href="<?=base_url()?>not-available">
                            <img alt="" src="<?=base_url();?>assets/frontend/img/how-to/make-payment.png" width="99" height="99" />
                            <h4>Make Payment</h4>
                        </a>

                    </div>
                </div>

                <div class=" col-md-2 how-to-div" id="getnot">
                    <div class="flat-adv-a">
                        <a href="javascript:void(0)">
                            <img alt="" src="<?=base_url();?>assets/frontend/img/how-to/get-notified.png" width="99" height="99" />
                            <h4>Get Notified</h4>
                        </a>

                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>



    </div>

    <!-- CAREER -->

    <div class="offer-slider" style="background-color: #0b2d70;margin-bottom: 0px;">



        <!-- \\ -->
        <div id="career-div" class="content-wrapper columns-block">
            <!-- <div class="columns-block-lbl"><span>4 COLUMNS LAYOUT</span></div> -->
            <header class="fly-in page-lbl">
                <div class="offer-slider-lbl"><span style="color: #FFF;">CAREER BUILDER</span></div>
                <p style="color: #dad7d7;">


                    Here you can find the neccessary resources to take a better decision about your life
                </p>
            </header>
            <div id="career-row" class=" columns-row columns">

                <div class="btn-career column mm-4">
                    <a href="<?=base_url();?>career">
                        <!-- // -->
                        <div class="icons-item">
                            <div class="icons-item-img"><img alt="" src="<?=base_url();?>assets/images/career/career.png" /></div>
                            About Career
                            <!-- <div class="todo-devider"></div> -->
                            <div class="icons-item-txt"><h5><small>
                                        Enlight your future with our umptene number of carrer list
                                    </small></h5></div>
                        </div>
                        <!-- \\ -->
                    </a>
                </div>

                <div class="btn-career column mm-4">
                    <a href="<?=base_url();?>course-content-section?page=1">
                        <!-- // -->
                        <div class="icons-item">
                            <div class="icons-item-img"><img alt="" src="<?=base_url();?>assets/images/career/after-plus-two.png" /></div>
                            After Plus Two
                            <!-- <div class="todo-devider"></div> -->
                            <div class="icons-item-txt"><h5><small>
                                        Click here to get the best fitcourse for you <br><br>
                                    </small></h5></div>
                        </div>
                        <!-- \\ -->
                    </a>
                </div>

                <div class="btn-career column mm-4">
                    <a href="">
                        <!-- // -->
                        <div class="icons-item">
                            <div class="icons-item-img"><img alt="" src="<?=base_url();?>assets/images/career/career.png" /></div>
                            Exams <br><br>
                            <!-- <div class="todo-devider"></div> -->
                            <div class="icons-item-txt"><h5><small>
                                        Here you get trusted information about various exams
                                        <br>

                                    </small></h5></div>
                        </div>
                        <!-- \\ -->
                    </a>
                </div>

                <div class="btn-career column mm-4">
                    <a href="<?=base_url();?>allcolleges?page=1">
                        <!-- // -->
                        <div class="icons-item">
                            <div class="icons-item-img"><img alt="" src="<?=base_url();?>assets/images/career/career.png" /></div>
                            All colleges
                            <!-- <div class="todo-devider"></div> -->
                            <div class="icons-item-txt"><h5><small>
                                        Didn't you applied for these colleges yet?<br><br>
                                    </small></h5></div>
                        </div>
                        <!-- \\ -->
                    </a>
                </div>

            </div>
            <div class="clear"></div>
        </div>
        <!-- \\ -->


    </div>

    <!-- CAREER -->
</div>


<div class="modal" id="getnotified">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="attachadismissbutton" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                <h4 class="modal-title text-center">
                    <img  alt="yescolleges" src="<?= base_url()?>assets/images/logo-lat.gif">
                </h4>
            </div>
            <div class="modal-body">


                <div class="container-fluid offer-slider">
                    <header class="fly-in" >
                        <p style="width:450px;height: 80px;">We will send you email notifications and sms once you gain admission in the college of your choice.
                            We wil also help you monitor the status of your admission application by offering timely updates.</p>
                    </header>
                </div>
            </div>



        </div>
    </div>
</div>

<script>
    var site_url= '<?= base_url()?>';
</script>
<script>


    $("#indexsubmitform").click(function(){


        $.post(site_url+"Student/checkloginstatus",function (data) {
            if(data.value==1){

                window.location.href=site_url+'student-home';
            }
            else if(data.value==0){

                $("#custom_message").html(data.message);
                $('#myModal').modal({backdrop: 'static', keyboard: false});

            }
        });
    });
</script>
<script>
    $("#getnot").click(function(){
        $('#getnotified').modal({backdrop: 'static', keyboard: false});
    })
</script>
<style>
    /*.how-to-div{
        background-color: silver;
        -webkit-clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%);
        clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%);
        transform: scale(.8);
    }*/
    .how-to-div a {
        text-decoration: none;
    }
    .how-to-div a:hover{
        color: #ff7200;
    }
    .how-to-div{
        padding: 1em;
        transition: all .2s ease-in-out;
    }

    .how-to-div img{
        transform: scale(1);
    }

    .how-to-div:hover{
        transform: scale(1.04);
        background-color: #F0F4F5;
        color: #ff7200;
    }
</style>
<script>

</script>



<script src="<?=base_url();?>assets/frontend/js/placeholderTypewriter.js">
</script>
<script>



    var placeholderText = [
        "Have you decided on what you want to pursue?",
        "Let the mind free,Life gets easier.",
        "We make sure of it.",
        "It is a YesColleges promise.",
        "That you will be provided with all necessary informations.",
        "You’ll need to make the right decisions.",
        "Let the next few years of your academic life be glorious....."
    ];

    $('.placeholder-type-writter').placeholderTypewriter({
        text: placeholderText,
        delay: 90
    });



</script>


<script src="<?=base_url();?>assets/frontend/source/jquery.fancybox.js"></script>
<script src="<?=base_url();?>assets/frontend/js/isotope.js"></script>
<script src="<?=base_url();?>assets/frontend/Orgscripts/ins_frontview.js" type="text/javascript"></script>
<script>




    $(function(){
       $("#clgsubmit").click(function () {
           $("#collegessearch").submit();
        });

       /* $("#cousubmit").click(function () {
            $("#coursesearch").submit();
        });*/

        $.validator.setDefaults({errorClass: 'help-block',
            highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },
            unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }
        });

        $('#search-item').validate({
            rules:{
                search_query:{required:true}

            },
            messages:{
                search_query:{ required:'This field is req'}

            }
        });


        search();

    });


    var search=function ()
    {
        $("#search_query").autocomplete({
            autoFocus: true,
            select: function (event, ui) {
                $(event.target).val(ui.item.value);
                $('#collegessearch').submit();
                return false;
            }
        });

        $("#courseterm").autocomplete({
            autoFocus: true,
            select: function (event, ui) {
                $(event.target).val(ui.item.value);
                $('#coursesearch').submit();
                return false;
            }
        });

    };







</script>