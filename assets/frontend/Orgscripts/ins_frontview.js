$(function(){

  /*  $("#onlineadmimage" ).mouseover(function() {
        $( "#onlineadmimage" ).effect( "shake",'slow');
    });


    $("#supportimage" ).mouseover(function() {
        $( "#supportimage" ).effect( "shake",'slow');
    });


    $("#topclgimage" ).mouseover(function() {
        $( "#topclgimage" ).effect( "shake",'slow');
    });


    $("#expertimage" ).mouseover(function() {
        $( "#expertimage" ).effect( "shake",'slow');
    });



    $("#topreviewimage" ).mouseover(function() {
        $( "#topreviewimage" ).effect( "shake",'slow');
    });




    $("#paymentimage" ).mouseover(function() {
        $( "#paymentimage" ).effect( "shake",'slow');
    });
*/

    $("#how-create").on("click",function () {
        $("#studentacc").click();
    });



    $(document).ajaxStart(function(e) { var val='<img src="assets/images/loaderIcon.gif">';  $("#loadicon").html(val); });
    $(document).ajaxStop(function(e) {  var val='<span class="glyphicon glyphicon-search"></span>'; $("#loadicon").html(val); });
    indexsearch();
    indexcoursesearch();
    getfeaturedclg();

});

var indexsearch=function() {


    $("#search_query").keyup(function () {

        if(($("#search_query").val().length)>=3) {


            var search = $("#search_query").val();

            $.post(site_url + "Yescolleges/getsearchcollege", {"datas": search}, function (data) {


                if (data.error == 0) {
                    var titles = data.content;

                    var sug = titles.map(function (mytitle) {
                        return mytitle.title + "(" + mytitle.shortname + ")";
                    });
                }
                else {
                    sug = "no colleges found";
                }
                $("#search_query").autocomplete({source: sug});

            });
        }

    });



};



var indexcoursesearch=function() {


    $("#courseterm").keyup(function () {

        if(($("#courseterm").val().length)>=3) {


            var search = $("#courseterm").val();


            $.post(site_url + "Yescolleges/getsearchcourse", {"datas": search}, function (data) {


                if (data.error == 0) {
                    var titles = data.content;

                    var sug = titles.map(function (mytitle) {
                        return mytitle.name + "(" + mytitle.shortname + ")";
                    });
                }
                else {
                    sug = "no colleges found";
                }
                $("#courseterm").autocomplete({source: sug});

            });

        }
    });


};


/*
var getfeaturedclg=function () {

    $.post(site_url+"Yescolleges/getSimiliarcollege",function (data) {


        var colleges = "";
        var content = data.content;
        for (var mycollege in content) {
            var clg = content[mycollege];
            colleges+='<div class="offer-slider-i">';
            colleges+='<a class="offer-slider-img" href="javascript:void(0);" onclick="getcollegedata(\'' + clg.title + '\',' + clg.id + ');">';
            colleges+='<img  height="180px" alt="" src="'+clg.profile+'" style="padding: 10px;border-radius: 14px;" />';
            colleges+='<span class="offer-slider-overlay">';
            colleges+='<span class="offer-slider-btn">view details</span>';
            colleges+=' </span>';
            colleges+='</a>';
            colleges+='<div class="offer-slider-txt">';
            colleges+='<div class="offer-slider-link"><a  href="javascript:void(0);" onclick="getcollegedata(\'' + clg.title + '\',' + clg.id + ');">'+clg.title+'</a></div>';
            colleges+='<div class="offer-slider-l">';
            colleges+='<div class="offer-slider-location">'+clg.district+' , '+clg.state+' </div>';
            colleges+='</div>';
            colleges+='</div>';
            colleges+='<div class="clear"></div>';
            colleges+='</div>';
            colleges+=' </div>';

        }
        $("#offers").html(colleges);

    }).done(function () {
        $(".owl-slider").owlCarousel({
            items:5,
            autoPlay: 3000,
            itemsDesktop : [1120,4], //5 items between 1000px and 901px
            itemsDesktopSmall : [900,2], // betweem 900px and 601px
            itemsTablet: [620,2], //2 items between 600 and 479
            itemsMobile: [479,1], //1 item between 479 and 0
            stopOnHover: true
        });
    });

};
*/


var getfeaturedclg=function () {

    $.post(site_url+"Yescolleges/getSimiliarcollege",function (data) {

        var contents = "";
        var content = data.content;
        for (var mycollege in content) {
            var clg = content[mycollege];


            contents += '<div class="portfolio-i photography" onclick="getcollegedata(\'' + clg.slug + '\');">';
            contents += '<div class="portfolio-i-img">';
            contents += '<div class="portfolio-i-over">';
            contents += '<div class="portfolio-i-over-a">';
            contents += '<div class="portfolio-i-over-b">';
            contents += '<a href="javascript:void(0)" data-fancybox-group="gallery" class="fancybox portfolio-zoom" ></a>';
            contents += '<a href="javascript:void(0)" class="portfolio-more" onclick="getcollegedata(\'' + clg.slug + '\');"></a>';
            contents += '</div>';
            contents += '</div>';
            contents += '</div>';

            contents += '<img style="border-radius: 3px;height: 180px;width: 250px;"  alt="" src="'+clg.profile+'" onclick="getcollegedata(\'' + clg.slug + '\');">';
            contents += '</div>';
            contents += '<div class="portfolio-i-text">';
            contents += '<b>'+clg.title+'</b>';
            contents += '<span>'+clg.district+','+clg.state+'</span>';
            contents += '</div>';
            contents += '</div>';
        }
        $("#featuredclglists").html(contents);

    }).done(function () {


        $(document).ready(function(){
            'use strict';
            var $container = $('.portfolio-four-colls');
            $container.isotope({
                itemSelector: '.portfolio-i',
                columnWidth: 120,
                rowHeight: 320
            });
            $(".fancybox").fancybox({
                helpers:  {
                    overlay : {
                        locked : false
                    },
                    title : { type : 'over' }
                },
                beforeShow : function() {
                    this.title = (this.title ? '' + this.title + '' : '')  + (this.index + 1) + ' of ' + this.group.length;
                }
            });
            $('.portfolio-filters li a').on('click',function(){
                var $sort = $(this).data('sort');
                if ($sort=='all') {
                    var $sort = '*';
                    $container.isotope({ filter: $sort });
                } else {

                    $container.isotope({ filter: '.'+$sort });
                }
                $('.portfolio-filters li').removeClass('active');
                $(this).closest('li').addClass('active');
                return false;
            });
        });
    });

};





var getcollegedata=function(name){



    window.open(site_url+"college/"+name, '_blank');

};