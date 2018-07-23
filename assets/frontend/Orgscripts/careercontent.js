
$(function () {


    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
            return null;
        }
        else{
            return decodeURI(results[1]) || 0;
        }
    };



    var my_page=$.urlParam('page');
    getcareer(my_page);

    $("#ccontentsearch").on("keyup",function(event)
    {
        event.preventDefault();
        getcareer(1);
    }) ;


});

var getcareer=function (page) {


    var my_page=1;
    if(page!==null&&page!==undefined&&page!=="") {my_page=page;}
    $.post(site_url+"Yescolleges/getCareer",{"pages":my_page,"like":$("#ccontentsearch").val()},function (data) {
        var d = "";
        if(data.error==1){
            my_page=0;

            d+='<div class="cat-list-item cat-list-item-custom">';
            d+='<div class="cat-list-item-l">';
            d+='<a href="#"><img alt="" src="img/career/category/civil-engineer.jpg" width="174px" height="138px"></a>';
            d+='</div>';
            d+='<div class="cat-list-item-r">';
            d+='<div class="cat-list-item-rb">';
            d+='<div class="cat-list-item-p">';
            d+='<div class="cat-list-content">';
            d+='<div class="cat-list-content-a">';
            d+='<div class="cat-list-content">';
            d+='<div class="cat-list-content-lb">';
            d+='<div class="cat-list-content-lpadding">';

            d+='<div class="offer-slider-link">';
            d+='<a href="#">';
            d+='<div class="h-detail-lbl">';
            d+='<div class="h-detail-lbl-a"><b>No career</b></div>';
            d+='<div class="h-detail-lbl-b">sorry</div>';
            d+='</div></a>';
            d+='</div>';






            d+=' </div>';
            d+='</div>';

            d+='</div>';
            d+=' </div>';


            d+='</div>';
            d+='</div>';
            d+='</div>';

            d+='  </div>';


            d+='</div>';
            d+='</div>';
            d+='</div>';
        }

        else {


            var contents = data.values;

            for (var mydata in contents) {

                var mycourse = contents[mydata];
                var cont = mycourse.content;
                if(mycourse.acdpressure=="High")var press='<span class="offer-rate" style="color: #ff7b11;"><b>'+mycourse.acdpressure+'</b></span>';
                if(mycourse.acdpressure=="Medium")var press='<span class="offer-rate" style="color: darkolivegreen;"><b>'+mycourse.acdpressure+'</b></span>';

                if(mycourse.acdpressure=="Low")var press='<span class="offer-rate" style="color: #0bd360;"><b>'+mycourse.acdpressure+'</b></span>';


                if(mycourse.jobpressure=="High")var presss='<span class="offer-rate" style="color: #ff7b11;"><b>'+mycourse.jobpressure+'</b></span>';
                if(mycourse.jobpressure=="Medium")var presss='<span class="offer-rate" style="color: darkolivegreen;"><b>'+mycourse.jobpressure+'</b></span>';

                if(mycourse.jobpressure=="Low")var presss='<span class="offer-rate" style="color: #0bd360;"><b>'+mycourse.jobpressure+'</b></span>';

                d+='<div class="cat-list-item cat-list-item-custom">';
                d+='<div class="cat-list-item-l">';
                d+='<a href="#"><img alt="" src="'+mycourse.photo+'" style="border-radius: 4px;" width="174px" height="150px"></a>';
                d+='</div>';
                d+='<div class="cat-list-item-r">';
                d+='<div class="cat-list-item-rb">';
                d+='<div class="cat-list-item-p">';
                d+='<div class="cat-list-content">';
                d+='<div class="cat-list-content-a">';
                d+='<div class="cat-list-content">';
                d+='<div class="cat-list-content-lb">';
                d+='<div class="cat-list-content-lpadding">';

                d+='<div class="offer-slider-link">';
                d+='<a  href="javascript:void(0);" onclick="gotocourse(\'' + mycourse.category + '\',\'' + mycourse.name + '\');">';
                d+='<div class="h-detail-lbl">';
                d+='<div class="h-detail-lbl-a"><b>'+mycourse.name+'</b></div>';
                d+='<div class="h-detail-lbl-b">'+mycourse.category+'&nbsp;</div>';
                d+='</div></a>';
                d+='</div>';

                d+='<div class="offer-rate">Academic pressure : '+press+'';
                d+='</div>';
                d+='<div class="offer-rate">Job pressure : '+presss+'';
                d+='</div>';
                d+='<div class="h-detail-stars fligts-s" style="border-bottom: 0px;">';
                d+='<div class="about-percent">';
                d+=' <div class="flight-line-a">';
                d+='<b>'+mycourse.minsal+'</b></div>';

                d+=' <div class="flight-line-a avg">';
                d+='<b>Avg. Salary</b></div>';

                d+='<div class="flight-line-a max">';
                d+='<b class="">'+mycourse.maxsal+'</b></div>';
                d+='<div data-percentage="62" class="about-percent-a"><span  style="width: '+mycourse.salpercent+';"></span></div>';

                d+='<div class="flight-line-a">';
                d+='<b>MIN</b></div>';

                d+='<div class="flight-line-a max">';
                d+='<b>MAX</b></div>';
                d+=' </div>';
                d+=' <div class="clear"></div>';
                d+=' </div>';

                d+=' </div>';
                d+='</div>';

                d+='</div>';
                d+=' </div>';


                d+='</div>';
                d+='</div>';
                d+='</div>';
                d+=' <br class="clear">';
                d+='  </div>';

                d+='<a href="#" class="add-passanger">Add to Shortlist</a>';

                d+=' <div class="checkbox">';
                d+=' <label>';
                d+='<a href="#" class="todo-btn follow-btn" style="padding-bottom: 20px">FOLLOW</a>';
                d+='</label>';
                d+='</div>';

                d+='</div>';
            }
            var page_cotent = '';
            var page_count = data.page_count;


            if (my_page > 1) page_cotent += '<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="pagecourse(' + parseInt(parseInt(my_page) - 1) + ')"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;...PREV</a></li>';

            if (my_page < page_count)
                page_cotent += '<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="pagecourse(' + parseInt(parseInt(my_page)+1) + ')">NEXT...&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>';


            $('#pages').html(page_cotent);



        }
        $("#careerlist").html(d);
    });

};


var pagecourse=function (page) {

    window.location.href = site_url+"career"+"?page="+page;
};

var gotocourse=function (catname,name) {

    var insname=name.replace(/\s/g,"+");
    var inname=catname.replace(/\s/g,"+");

    window.open(site_url+"career-individual-section/"+inname+"/"+insname, '_blank');
};