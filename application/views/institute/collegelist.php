
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
            <form id="searchsubmit" action="javascript:void(0)" method="post">
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
                        <span style="text-transform: lowercase;"><b id="searchcount"></b> results found.</span>
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
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="streamsearch" class="streamsearch" value="" checked/>
                                        All
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="streamsearch" class="streamsearch" value="Engineering college"/>
                                        ENGINEERING
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="streamsearch" class="streamsearch" value="Medical college"/>
                                        MEDICAL
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="streamsearch" class="streamsearch" value="Management college" />
                                        MANAGEMENT
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="streamsearch" class="streamsearch"  value="Arts and science college"/>
                                        ARTS
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="streamsearch" class="streamsearch" value="Nursing or Paramedical College"/>
                                        NURSING
                                    </label>
                                </div>

                               </div>
                            </div>
                        </div>
                    </div>




                    <!-- \\ side \\ -->
                    <!-- // side // -->
                    <div class="side-block fly-in">
                        <div class="side-stars">
                            <div class="side-padding">

                                <div class="side-lbl" id="stateshow"><a style="text-decoration: none" href="javascript:void(0)"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Sort by <b>state</b></a></div>
                               <div id="stateslide">
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
                                        <input type="radio" class="stateselect" name="stateselect" value="Arunanchal Pradesh" />
                                        Arunanchal Pradesh
                                    </label>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>


                    <div class="side-block fly-in" id="sortcity">
                        <div class="side-stars">
                            <div class="side-padding">
                                <div class="side-lbl">Sort by <b>city</b></div>
                                <div id="listcity">

                                </div>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="two-colls-right">
                    <div class="two-colls-right-b">
                        <div class="padding">

                            <div class="catalog-row list-rows" id="searchcollegelist">

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

    //$("#stateslide").hide();
    $("#sortcity").hide();
    $("#streamshow").click(function () {
        $("#streamslide").toggle();
    });
    $("#stateshow").click(function () {
        $("#stateslide").toggle();
    });
</script>
<script src="<?=base_url();?>assets/frontend/Orgscripts/ins_listpage.js?kl"></script>