<?php
$pag=$_GET['page'];

?>
<script>
    var my_page='<?=$pag;?>';
    var totalcount='<?=$tot_pages;?>';

    $(function(){


        search();

        $("#search_terms").change(function () {

            functionName();
        });

            $('input[name=streamsearch]').change(function(){
                $('form').submit();
                functionName();
            });

            $('input[name=stateselect]').change(function(){

                var vals=$('input:radio[name=stateselect]:checked').val();

                $("#search_terms").val(vals);
                $('form').submit();
                functionName();
            });


        var val='<?=$term;?>';
        var pla='<?=$place;?>';
        var page_count='<?=$count;?>';
        val = val.replace(/\s+/g, '+');
        if(pla!="null") $("#search_terms").val(pla);
        $("input[value=\""+val+"\"]").attr('checked',true);
        $("input[value=\""+pla+"\"]").attr('checked',true);

        var page_cotent="";
       
        if(my_page>1)

            page_cotent+='<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="functionName('+parseInt(parseInt(my_page)-1)+')"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;...PREV</a></li>';


        if((totalcount-my_page)>0) {

            page_cotent += '<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="functionName(' + parseInt(parseInt(my_page) + 1) + ')">NEXT...&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>';
        }

        $('#pages').html(page_cotent);


    });



    function functionName(pagecot){

        var my_page=1;
        if(pagecot!==null&&pagecot!==undefined&&pagecot!=="") {my_page=pagecot;}
        var radios = document.getElementsByName('streamsearch'),
            value  = '';

        var radioss = $("#search_terms").val();



        for (var i = radios.length; i--;) {
            if (radios[i].checked) {
                value = radios[i].value;
                break;
            }
        }



        if(value=="")value=null;
        if(radioss=="")radioss=null;


        window.location.href=site_url+'allcolleges/'+ value+'/'+radioss+'?page='+my_page
    }





</script>
<!-- main-cont -->
<div class="main-cont">

    <div class="body-wrapper">
        <div class="wrapper-padding">
            <div class="page-head">
                <div class="page-title"> <span>Colleges</span></div>
                <div class="breadcrumbs">
                    <a href="<?=base_url();?>">Home</a> /<span>List of colleges</span>
                </div>
                <div class="clear"></div>
            </div>
            <form id="searchsubmit" action="javascript:void(0)" style="display: none" method="post">
                <div class="input-group" style="width: 250px;">

                    <input type="text" class="form-control" id="search_term" value="<?=$term?>" placeholder="Search College">
                    <span class="input-group-btn">
          <button class="btn btn-default" id="btn_search" type="submit">
              search
          </button>
        </span>
                    <input type="hidden" id="tagidsection" value="9">

                </div>
            </form>
            <br>

            <div class="two-colls">
                <div class="two-colls-left">

                    <div class="srch-results-lbl fly-in" style="font-weight: 100">
                        <span style="text-transform: lowercase;"><b id="searchcount"></b><?=$count;?> results found.</span>
                    </div>

                    <div class="side-block fly-in hidden">
                        <div class="side-block-search">
                            <div class="page-search-p">
                                <!-- // -->
                                <div class="srch-tab-line">
                                    <label>Place / hotel name</label>
                                    <div class="input-a"><input type="text" value="" placeholder="Example:france"></div>
                                </div>
                                <!-- // -->
                                <!-- // -->
                                <div class="srch-tab-line">
                                    <div class="srch-tab-left">
                                        <label>Check in</label>
                                        <div class="input-a"><input type="text" value="" class="date-inpt" placeholder="mm/dd/yy"> <span class="date-icon"></span></div>
                                    </div>
                                    <div class="srch-tab-right">
                                        <label>Check out</label>
                                        <div class="input-a"><input type="text" value="" class="date-inpt" placeholder="mm/dd/yy"> <span class="date-icon"></span></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- \\ -->
                                <!-- // -->
                                <div class="srch-tab-line no-margin-bottom">
                                    <div class="srch-tab-3c">
                                        <label>Rooms</label>
                                        <div class="select-wrapper">
                                            <select class="custom-select">
                                                <option>--</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="srch-tab-3c">
                                        <label>adult</label>
                                        <div class="select-wrapper">
                                            <select class="custom-select">
                                                <option>--</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="srch-tab-3c">
                                        <label>Child</label>
                                        <div class="select-wrapper">
                                            <select class="custom-select">
                                                <option>--</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- \\ -->
                                <button class="srch-btn">Search</button>
                            </div>
                        </div>
                    </div>

                    <!-- // side // -->
                    <div class="side-block fly-in hidden">
                        <div class="side-price">
                            <div class="side-padding">
                                <div class="side-lbl">Price</div>
                                <div class="price-ranger">
                                    <div id="slider-range"></div>
                                </div>
                                <div class="price-ammounts">
                                    <input type="text" id="ammount-from" readonly>
                                    <input type="text" id="ammount-to" readonly>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- \\ side \\ -->
                    <!-- // side // -->
                    <div class="side-block fly-in hidden">
                        <div class="side-stars">
                            <div class="side-padding">
                                <div class="side-lbl">Star rating</div>
                                <div class="star-rating-l">Choose Rating</div>
                                <div class="star-rating-r">
                                    <a href="#"><img alt="" src="img/rating-b.png"></a>
                                    <a href="#"><img alt="" src="img/rating-b.png"></a>
                                    <a href="#"><img alt="" src="img/rating-b.png"></a>
                                    <a href="#"><img alt="" src="img/rating-b.png"></a>
                                    <a href="#"><img alt="" src="img/rating-a.png"></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <!-- \\ side \\ -->
                    <!-- // side // -->
                    <div class="side-block fly-in">
                        <div class="side-stars">
                            <div class="side-padding">
                                <div class="side-lbl" id="streamshow"><a style="text-decoration: none" href="javascript:void(0)"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Sort by <b>stream</b></a></div>

                                <div id="streamslide">
                                    <form method="post" id="streamlist" action="javascript:void(0)">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="streamsearch" class="streamsearch" value="" checked/>
                                            All
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="streamsearch" class="streamsearch" value="Engineering+College"/>
                                            ENGINEERING
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="streamsearch" class="streamsearch" value="Medical+College"/>
                                            MEDICAL
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="streamsearch" class="streamsearch" value="Business+Management+College" />
                                            MANAGEMENT
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="streamsearch" class="streamsearch"  value="Arts+and+Science+College"/>
                                            ARTS
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="streamsearch" class="streamsearch" value="Agriculture"/>
                                            AGRICULTURE
                                        </label>
                                    </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="streamsearch" class="streamsearch" value="Nursing+or+Paramedical+College"/>
                                                NURSING
                                            </label>
                                        </div>
                                            <div class="checkbox">
                                            <label>
                                                <input type="radio" name="streamsearch" class="streamsearch" value="Law+College"/>
                                                LAW
                                            </label>
                                            </div>
                                    </form>
                                        </div>


                                </div>
                            </div>
                        </div>
                    <form id="searchsubmit" action="javascript:void(0)"  method="post">
                        <span class="checkbox"><a style="text-decoration: none;color: darkgray">search for location</a></span>

                        <div class="input-group" style="width: 200px;">


                            <input type="text" class="form-control" id="search_terms" value="" placeholder="Search location">
                            <span class="input-group-btn">
          <button class="btn btn-default"  type="submit">
             <span class="fa fa-search"></span>
          </button>
        </span>
                            <input type="hidden" id="tagidsection" value="9">

                        </div>
                    </form>
                    <div class="side-block fly-in">
                        <div class="side-stars">
                            <div class="side-padding">

                                <div class="side-lbl" id="stateshow"><a style="text-decoration: none" href="javascript:void(0)"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Sort by <b>place</b></a></div>
                                <div id="stateslide">
                                    <form method="post" id="statelist" action="javascript:void(0)">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" class="stateselect" name="stateselect" value="" checked/>
                                            ALL
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label id="state">
                                            <input type="radio" class="stateselect" name="stateselect" value="Kerala" />
                                            KERALA
                                        </label>
                                    </div>
                                        <div class="checkbox">
                                            <label id="state">
                                                <input type="radio" class="stateselect" name="stateselect" value="Ernakulam" />
                                                ERNAKULAM
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label id="state">
                                                <input type="radio" class="stateselect" name="stateselect" value="Kochi" />
                                                KOCHI
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label id="state">
                                                <input type="radio" class="stateselect" name="stateselect" value="Chennai" />
                                                CHENNAI
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label id="state">
                                                <input type="radio" class="stateselect" name="stateselect" value="Goa" />
                                                GOA
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label id="state">
                                                <input type="radio" class="stateselect" name="stateselect" value="Trissur" />
                                                TRISSUR
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label id="state">
                                                <input type="radio" class="stateselect" name="stateselect" value="Madras" />
                                                MADRAS
                                            </label>
                                        </div>
                                    <div class="checkbox">
                                        <label id="state">
                                            <input type="radio" class="stateselect" name="stateselect" value="Tamilnadu" />
                                            TAMIL NADU
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label id="state">
                                            <input type="radio" class="stateselect" name="stateselect" value="Karnataka" />
                                            KARNATAKA
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label id="state">
                                            <input type="radio" class="stateselect" name="stateselect" value="Maharashtra" />
                                            MAHARASHTRA
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label id="state">
                                            <input type="radio" class="stateselect" name="stateselect" value="Hyderabad" />
                                            HYDERABAD
                                        </label>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- \\ side \\ -->
                    <!-- // side // -->





                </div>
                <div class="two-colls-right">
                    <div class="two-colls-right-b">
                        <div class="padding">


                            <div class="catalog-row list-rows">
                            <?php if($count==0){
                                ?><script>
                                alert('No colleges found');
                            </script>
                            <?php
                            }
                            ?>
                            <?php

                            foreach ($colleges as $key => $value) {
                            ?>
                                <div class="cat-list-item fly-in">
                                    <div class="cat-list-item-l">
                                        <a href="<?=base_url();?>college/<?=$value['slug'];?>">
                                            <img alt="" src="<?=base_url();?>assets/backend/images/collegeprofile/<?=$value['profile'];?>" style="width: 240px;height: 160px;border-radius: 4px;">
                                        </a>
                                    </div>
                                    <div class="cat-list-item-r">
                                        <div class="cat-list-item-rb">
                                            <div class="cat-list-item-p">
                                                <div class="cat-list-content">
                                                    <div class="cat-list-content-a">
                                                        <div class="cat-list-content-l">
                                                            <div class="cat-list-content-lb">
                                                                <div class="cat-list-content-lpadding">
                                                                    <div class="offer-slider-link"><a href="<?=base_url();?>college/<?=$value['slug'];?>"><?php echo $value['title']; ?></a></div>
                                                                    <div class="offer-slider-location"><?php echo $value['state'];?>&nbsp;&nbsp;<?php  echo $value['district'];?></div>
                                                                    <p><?=$value['type'];?></p>

                                                                </div>
                                                            </div>
                                                            <br class="clear" />
                                                        </div>
                                                    </div>
                                                    <div class="cat-list-content-r">
                                                        <div class="cat-list-content-p">


                                                            <a href="<?=base_url();?>college/<?=$value['slug'];?>" class="cat-list-btn" style="background-color: #455B45;color: white">APPLY</a>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <?php


                            }
                            ?>


                            </div>



                            <div class="clear"></div>

                            <!--  <div class="pagination" id="pages">
                              <a>PREV</a>
                                  <a>NEXT</a>
                              </div>
  -->

                            <div class="paginate"><!-- remove width id you don't need it-->
                                <ul class="pagination" id="pages">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <br class="clear" />
                </div>
            </div>
            <div class="clear"></div>

        </div>
    </div>
</div>
<!-- /main-cont -->
<script>

    site_url="<?=base_url();?>";



    $("#streamshow").click(function () {
        $("#streamslide").toggle();
    });
    $("#stateshow").click(function () {
        $("#stateslide").toggle();
    });

var search=function () {


    $("#search_terms").keyup(function () {

        $( function() {
            var availableTags = [
                "Andhrapradesh",
                "Kerala",
                "Tamilnadu",
                "Karnataka",
                "Goa",
                "Ernakulam",
                "Idukki",
                "Kochi",
                "Madras",
                "Chennai",
                "Alapuzha",
                "Trissur",
                "Kozhikode"

            ];
            $( "#search_terms" ).autocomplete({
                source: availableTags
            });
        } );



    });
}


</script>
