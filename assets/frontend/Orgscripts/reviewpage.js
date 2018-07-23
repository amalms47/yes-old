$(function () {
    getreviews(1);

});

var getreviews=function (page) {

    $.post(site_url+"Yescolleges/getReviews",{page:page},function (data) {

        var rev = "";

        var simage=site_url+"assets/backend/images/studimages/default.png";
        var star=site_url+"assets/frontend/img/sstar-b.png";
        var nostar=site_url+"assets/frontend/img/star-a.png";
        if(data.error==0) {
            var content = data.reviews;
            for (var contents in content) {

                var mydata = content[contents];

                rev += '<div class="alt-flight fly-in">';
                rev += '<div class="alt-flight-a">';
                rev += '<div class="alt-flight-l">';
                rev += '<div class="alt-flight-lb">';
                rev += '<div class="alt-center">';
                rev += '<div class="alt-center-l">';
                rev += '<div class="alt-center-lp">';
                rev += '<div class="alt-logo">';
                rev += '<a href="javascript:void(0)"><img alt="" style="border-radius: 4px;" width="100px" height="100px" src="' + mydata.profile + '"></a>';
                rev += '</div>';
                rev += '</div>';
                rev += '</div>';
                rev += '<div class="alt-center-c">';
                rev += '<div class="alt-center-cb">';
                rev += '<div class="alt-center-cp">';

                rev += '<div class="alt-info pull-right"><b style="color: #747d7e">rating &nbsp;&nbsp;<span style="font-size:small">'+mydata.stars+'</span>&nbsp;/&nbsp;5</b></div>';

                rev += '<div style="color: #4a90a4;font-weight: bold" class="alt-lbl"><a target="_blank" style="color: #4a90a4;font-weight: bold;text-decoration: none" class="alt-lbl" href="javascript:void(0)" onclick="getcollegedata(\'' + mydata.slug + '\')">' + mydata.title + '</a></div>';
                rev += '<div class="alt-info"><b style="color: #747d7e">' + mydata.city + '</b>' + mydata.state + '</div>';


                rev += '<div class="alt-devider"></div>';

                rev += '<div class="blog-comment-i">';
                rev += '<div class="guest-reviews-a">';
                rev += '<div class="guest-reviews-l">';
                rev += '<img alt="" width="60px" height="60px" src="' + simage + '">';
                rev += '</div>';
                rev += '<div class="guest-reviews-r">';
                rev += '<div class="guest-reviews-rb">';
                rev += '<div class="blog-comment-lbl">' + mydata.student + '</div>';
                rev += '<div class="blog-comment-info">Posted at <span>' + mydata.date + '</span></div>';
                rev += '<div class="blog-comment-txt">' + mydata.content + '</div>';
                rev += '</div>';
                rev += '<br class="clear">';
                rev += '</div>';
                rev += '</div>';
                rev += '<div class="clear"></div>';
                rev += '</div>';
                rev += '<div class="clear"></div>';
                rev += '</div>';
                rev += '</div>';
                rev += '<div class="clear"></div>';
                rev += '</div>';
                rev += '</div>';
                rev += '<div class="clear"></div>';
                rev += '</div>';
                rev += '<div class="clear"></div>';
                rev += '</div>';
                rev += '</div>';
                rev += '</div>';
            }
            $("#reviewlist").html(rev);

            var pages='';
            var count=data.pagecount;


            pages+=' <a  href="javascript:void(0);" style="color: #4a90a4" onclick="getreviews(1)">«</a>';
            for(var i=1;i<=count;i++) {   pages+= '<a href="javascript:void(0)" onclick="getreviews('+i+')">'+i+'</a>';  }
            pages+= '<a href="javascript:void(0);" style="color: #4a90a4" onclick="getreviews(' + count + ')">»</a>';


            $("#reviewpagination").html(pages);
        }


        else{
            alert('no college found');
        }

    });
};


var getcollegedata=function(name){


    window.location.href=site_url+"college/"+name;

};