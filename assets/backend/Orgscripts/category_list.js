$(function(){

    $('.levelselect').on('click ', function(event){
        var level=$("input[name='levelselect']:checked").val();
        getCategoryresult(1);
    });


    getCategoryresult(1);
});


var getCategoryresult=function (page)
{
    var my_page=1;
    if(page!==null&&page!==undefined&&page!=="") {my_page=page;}

    var term=$("#search_term").val();

    var level=$("input[name='levelselect']:checked").val();

    $.post(site_url+"Yescolleges/getCategoryResult",{"term":term,"page":my_page,level:level},function(data) {

        //$("#search_term").val("");

        var clg= '';
        var page_cotent = '';
        if (data.iserror === "0") {
            var institutes = data.course;
            for (var institute in institutes) {
                var mydata = institutes[institute];


                clg+='<div class="cat-list-item fly-in">';
                clg+='<div class="cat-list-item-l">';
                clg+='<a><img alt="" src="'+mydata.profile+'" style="width: 240px;height: 160px;border-radius: 4px"></a>';
                clg+='</div>';
                clg+='<div class="cat-list-item-r">';
                clg+='<div class="cat-list-item-rb">';
                clg+='<div class="cat-list-item-p">';
                clg+='<div class="cat-list-content">';
                clg+='<div class="cat-list-content-a">';
                clg+='<div class="cat-list-content-l">';
                clg+='<div class="cat-list-content-lb">';
                clg+='<div class="cat-list-content-lpadding">';
                clg+='<div class="offer-slider-link"><a href="javascript:void(0)" onclick="getcollegedata(\'' + mydata.slug + '\');">'+mydata.title+'</a></div>';
                clg+='<p>'+mydata.address+'</p>';
                clg+='<div class="offer-slider-location">'+mydata.type+'</div>';
                clg+='</div>';
                clg+='</div>';
                clg+='<br class="clear" />';
                clg+='</div>';
                clg+='</div>';
                clg+='<div class="cat-list-content-r">';
                clg+='<div class="cat-list-content-p">';
                clg+='<nav class="stars">';
                clg+='<ul>';
               /* clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-b.png" /></a></li>';
                clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-b.png" /></a></li>';
                clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-b.png" /></a></li>';
                clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-b.png" /></a></li>';
                clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-a.png" /></a></li>';
                clg+='</ul>';
                clg+='<div class="clear"></div>';
                clg+='</nav>';
                clg+='<div class="cat-list-review">0 reviews</div>';*/
                clg+='<div class="offer-slider-r">';

                clg+='</div>';
                clg+='<a href="javascript:void(0)" class="cat-list-btn" style="background-color: #455B45;color: white" onclick="getcollegedata(\'' + mydata.slug + '\');">APPLY</a>';
                clg+='</div>';
                clg+='</div>';
                clg+='<div class="clear"></div>';
                clg+='</div>';
                clg+='</div>';
                clg+='</div>';
                clg+='<br class="clear" />';
                clg+='</div>';
                clg+='<div class="clear"></div>';
                clg+=' </div>';

            }
            $("#pages").removeClass('hidden');
            var page_cotent = '';
            var page_count = data.page_count;
            if(my_page>1)

                page_cotent+='<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="getCategoryresult('+(my_page-1)+')"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;...PREV</a></li>';

            if(my_page<page_count)
                page_cotent+='<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="getCategoryresult('+(my_page+1)+')">NEXT...&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>';

            $('#pages').html(page_cotent);

        }
        else {

            var url=site_url+'assets/backend/images/collegeprofile/none.jpg';
            clg+='<div class="cat-list-item fly-in">';
            clg+='<div class="cat-list-item-l">';
            clg+='<a><img alt="" src="'+url+'" style="width: 240px;height: 160px;"></a>';
            clg+='</div>';
            clg+='<div class="cat-list-item-r">';
            clg+='<div class="cat-list-item-rb">';
            clg+='<div class="cat-list-item-p">';
            clg+='<div class="cat-list-content">';
            clg+='<div class="cat-list-content-a">';
            clg+='<div class="cat-list-content-l">';
            clg+='<div class="cat-list-content-lb">';
            clg+='<div class="cat-list-content-lpadding">';

            clg+='<p>No colleges found on this details</p>';
            clg+='</div>';
            clg+='</div>';
            clg+='<br class="clear"/>';
            clg+='</div>';
            clg+='</div>';

            clg+='<div class="clear"></div>';
            clg+='</div>';
            clg+='</div>';
            clg+='</div>';
            clg+='<br class="clear" />';
            clg+='</div>';
            clg+='<div class="clear"></div>';
            clg+=' </div>';


            $("#pages").addClass('hidden');
        }
        if (data.inst_count > 0) {
            $("#searchcount").html(data.inst_count);
        }
        else {
            $("#searchcount").html(0);
        }
        $("#searchcollegelist").html(clg);


    });

};


var getcollegedata=function(name){


    window.location.href=site_url+"college/"+name;

};



var comparecollege=function(name,id){


    window.location.href=site_url+"compare-colleges/"+name+"/"+id;

};


