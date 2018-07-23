
$(function () {


    getjson();

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

   getCourses(my_page);

    $("#ccontentsearch").on("keyup",function(event)
    {
        event.preventDefault();
        getCourses(1);
    }) ;


});


var getjson=function () {

    $.get('https://yescolleges.com/blog/?json=get_recent_posts',function (data) {

        console.log(data);
        var posts=data.posts;
        var val = "";
        for(var post in posts) {

            var mydata = posts[post];


            var titles=mydata.title;
           var title=titles.split(' ').slice(0,8).join(' ');


            val += '<div class="checkout-headl">';
            val += '<a target="_blank" href="'+mydata.url+'"><img style="width: 95px;height:90px;border-radius: 4px;" alt="" src="'+mydata.thumbnail+'"></a>';
            val += '</div>';
            val += '<div class="checkout-headr">';
            val += '<div class="checkout-headrb">';
            val += '<div class="checkout-headrp">';
            val += '<div class="chk-left">';
            val += '<div class="chk-lbl"><a target="_blank" href="'+mydata.url+'">'+title+'</a></div>';
            val += '<div class="chk-lbl-a">'+mydata.modified+'</div>';
            val += '</div>';

            val += '</div>';
            val += '</div>';
            val += '<div class="clear"></div>';
            val += '</div>';
            val += '<br>';



        }
        $("#bloglist").html(val);
    });

};

var getCourses=function (page) {


    var my_page=1;
    if(page!==null&&page!==undefined&&page!=="") {my_page=page;}
    $.post(site_url+"Yescolleges/getCoursecontent",{"pages":my_page,"like":$("#ccontentsearch").val()},function (data) {

        var content = "";
    if(data.error==1){
         my_page=0;
        content += '<div class="cat-list-item">';

        content += '<div class="cat-list-item-r">';
        content += '<div class="cat-list-item-rb">';
        content += '<div class="cat-list-item-p">';
        content += '<div class="cat-list-content">';
        content += '<div class="cat-list-content-a">';
        content += '<div class="cat-list-content">';
        content += '<div class="cat-list-content-lb">';
        content += '<div class="cat-list-content-lpadding">';
        content += '<div class="offer-slider-link"><a href="javascript:void(0);" ><h1>No courses found</h1></a></div>';

        content += '</div>';
        content += '</div>';
        content += '<br class="clear">';
        content += '</div>';
        content += '</div>';

        content += '<div class="clear"></div>';
        content += '</div>';
        content += '</div>';
        content += '</div>';
        content += '<br class="clear">';
        content += '</div>';
        content += '<div class="clear"></div>';
        content += '</div>';
    }

    else {


        var contents = data.values;

        for (var mydata in contents) {

            var mycourse = contents[mydata];
            var cont = mycourse.content;
            var res = cont.slice(0, 250);
            content += '<div class="cat-list-item">';
            content += '<div class="cat-list-item-l">';
            content += '<a href="javascript:void(0);"><img style="border-radius: 5px; width: 180px; height=150px;" alt="" src="' + mycourse.image + '"></a>';
            content += '</div>';
            content += '<div class="cat-list-item-r">';
            content += '<div class="cat-list-item-rb">';
            content += '<div class="cat-list-item-p">';
            content += '<div class="cat-list-content">';
            content += '<div class="cat-list-content-a">';
            content += '<div class="cat-list-content">';
            content += '<div class="cat-list-content-lb">';
            content += '<div class="cat-list-content-lpadding">';
            content += '<div class="offer-slider-link"><a href="javascript:void(0);" onclick="gotocourse(\'' + mycourse.catname + '\',\'' + mycourse.name + '\');"><h1>' + mycourse.name + '</h1></a></div>';
            content += '<div class="offer-rate">' + mycourse.catname + '</div>';
            content += '<p>' + res + ' &nbsp;<a  href="javascript:void(0);" style="color: red;text-decoration: none;" class="offer-rate" onclick="gotocourse(\'' + mycourse.catname + '\',\'' + mycourse.name + '\')">read more...</a> </p>';

            content += '</div>';
            content += '</div>';
            content += '<br class="clear">';
            content += '</div>';
            content += '</div>';
            content += '<div class="hidden cat-list-content-r">';
            content += '<div class="cat-list-content-p">';

            content += '<a href="javascript:void(0);" class="todo-btn" onclick="gotocourse(\'' + mycourse.catname + '\',\'' + mycourse.name + '\')">Read more</a>';
            content += '</div>';
            content += '</div>';
            content += '<div class="clear"></div>';
            content += '</div>';
            content += '</div>';
            content += '</div>';
            content += '<br class="clear">';
            content += '</div>';
            content += '<div class="clear"></div>';
            content += '</div>';
        }
        var page_cotent = '';
        var page_count = data.page_count;


        if (my_page > 1)
            //page_cotent += '<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="getCourses(' + (my_page - 1) + ')"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;...PREV</a></li>';
            page_cotent += '<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="pagecourse(' + parseInt(parseInt(my_page) - 1) + ')"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;...PREV</a></li>';

        if (my_page < page_count)
           // page_cotent += '<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="getCourses(' + (my_page + 1) + ')">NEXT...&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>';
            page_cotent += '<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="pagecourse(' + parseInt(parseInt(my_page) + 1) + ')">NEXT...&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>';


        $('#pages').html(page_cotent);



    }
        $("#coursecontents").html(content);
    });

};

var pagecourse=function (page) {

   window.location.href = site_url+"course-content-section"+"?page="+page;
};

var gotocourse=function (catname,name) {

    var insname=name.replace(/\s/g,"+");
    var inname=catname.replace(/\s/g,"+");

    window.open(site_url+"course-individual-section/"+inname+"/"+insname, '_blank');
};