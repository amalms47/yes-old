
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
            <form id="searchsubmit" style="display: none" action="javascript:void(0)" method="post">
                <div class="input-group" style="width: 250px;">

                    <input type="hidden" class="form-control" id="search_term" value="<?=$term?>" placeholder="Search College">
                    <span class="input-group-btn">
          <button class="btn btn-default" id="btn_search" type="submit">
              search
          </button>
        </span>


                </div>
            </form>
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

                    <div class="side-block fly-in">
                        <div class="side-stars">
                            <div class="side-padding">

                                <div class="side-lbl" id="levelslide"><a style="text-decoration: none" href="javascript:void(0)"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Sort by <b>Course level</b></a></div>

                                <div id="levelshow">
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" class="levelselect" name="levelselect" value="" checked/>
                                        ALL
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label id="state">
                                        <input type="radio" class="levelselect" name="levelselect" value="Under Graduation(UG)" />
                                        Under Graduation(UG)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label id="state">
                                        <input type="radio" class="levelselect" name="levelselect" value="Post Graduation(PG)" />
                                        Post Graduation(PG)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label id="state">
                                        <input type="radio" class="levelselect" name="levelselect" value="Doctorate Programs(D.Phil)" />
                                        Doctorate Programs(D.Phil)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label id="state">
                                        <input type="radio" class="levelselect" name="levelselect" value=" Masters Programs(M.Phil)" />
                                        Masters Programs(M.Phil)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label id="state">
                                        <input type="radio" class="levelselect" name="levelselect" value="Diploma and Others" />
                                        Diploma and Others
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label id="state">
                                        <input type="radio" class="levelselect" name="levelselect" value="ITI and Others" />
                                        ITI and Others
                                    </label>
                                </div>
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



</script>
<script src="<?=base_url();?>assets/backend/Orgscripts/category_list.js?mm"></script>