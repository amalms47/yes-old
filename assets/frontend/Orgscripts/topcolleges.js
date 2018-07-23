$(function () {

    gettopcolleges();

});

var gettopcolleges=function () {

    var tclg="";

    $.post(site_url+"Yescolleges/getTopcolleges",function (data) {

        var content=data.value;
        for(var contents in content){
            var mydata=content[contents];

            tclg += '<div class="alt-flight fly-in">';


            tclg += '<div class="alt-flight-a">';
            tclg += '<div class="alt-flight-l">';
            tclg += '<div class="alt-flight-lb">';
            tclg += '<div class="alt-center">';
            tclg += '<div class="alt-center-l">';
            tclg += '<div class="alt-center-lp">';
            tclg += '<div class="alt-logo">';
            tclg += ' <a><img alt=""  width="100px" height="100px" style="border-radius: 6px;" src="'+mydata.profile+'"></a>';
            tclg += ' </div>';
            tclg += '</div>';
            tclg += '</div>';
            tclg += '<div class="alt-center-c">';
            tclg += ' <div class="alt-center-cb">';
            tclg += '<div class="alt-center-cp">';
            tclg += '<div class="alt-lbl"><a target="_blank" style="text-decoration: none;color: #4a90a4" href="javascript:void(0)" onclick="getcollegedata(\'' + mydata.slug + '\');">'+mydata.title+'</a></div>';
            tclg += ' <div class="alt-info">'+mydata.city+'&nbsp; '+mydata.state+'</div>';
            tclg += '<div class="alt-devider"></div>';


            tclg += '<div class="alt-data-i">';
            tclg += '<b>College Type</b>';
            tclg += '<span>'+mydata.type+'</span>';
            tclg += '</div>';
            tclg += '<div class="clear"></div>';
            tclg += '</div>';
            tclg += '</div>';
            tclg += '<div class="clear"></div>';
            tclg += '</div>';
            tclg += '</div>';
            tclg += '<div class="clear"></div>';
            tclg += '</div>';
            tclg += '<div class="clear"></div>';
            tclg += '</div>';
            tclg += '</div>';
            tclg += '<div class="alt-flight-lr">';
            tclg += '<div class="padding">';

            tclg += '<br>';

            tclg += '<a target="_blank" class="cat-list-btn" style="background-color: #455B45;color: white" href="javascript:void(0)" onclick="getcollegedata(\'' + mydata.slug + '\');">View</a>';
            tclg += '</div>';
            tclg += '<div class="clear"></div>';
            tclg += '</div>';


            tclg += '<div class="clear"></div>';

            tclg += '</div>';


        }
        $("#topcolleges").html(tclg);
    });

};


var getcollegedata=function(name){


    window.location.href=site_url+"college/"+name;

};