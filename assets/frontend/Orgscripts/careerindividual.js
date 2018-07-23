$(function () {

    getdetails();
    getsimiliarcourse();
});


var getdetails=function () {

    $.post(site_url+"Yescolleges/getCareerdetails",{name:name},function (data) {

        if(data.error==0){
            var datas=data.values;
            for(var mydata in datas){

                var mycourse=datas[mydata];
                $("#carheading").html(mycourse.name);
                $("#carimage").attr("src", mycourse.photo);

                $("#carcontent").html(mycourse.content);
                $("#cargood").html(mycourse.good);
                $("#carbad").html(mycourse.bad);
                $("#carhowto").html(mycourse.howto);
                $("#carskills").html(mycourse.skills);

            }
        }
        else {
            alert("No section found");
        }
    });
};


var getsimiliarcourse=function () {



    $.post(site_url+"Yescolleges/getSimiliarcareer",{cat:cat,name:name},function (data) {


        var content="";
        var datas=data.datas;
        for(var mydata in datas){

            var mycourse=datas[mydata];

            var url=site_url+"assets/images/course-a.png";
            var cont=mycourse.content;
            var res = cont.slice(0, 150);
            content+='<div class="reasons-i">';
            content+='<div class="reasons-h">';
            content+='<div class="reasons-l">';
            content+='<img alt=""  src="'+url+'">';
            content+='</div>';
            content+='<div class="reasons-r">';
            content+='<div class="reasons-rb">';
            content+='<div class="reasons-p">';
            content+='<div class="chk-lbl"><a href="javascript:void(0)" onclick="gotocourse(\'' + mycourse.category + '\',\'' + mycourse.name + '\');"><b>'+mycourse.name+'</b></a></div>';
            content+='<p>'+res+' . . . . . . </p>';
            content+='</div>';
            content+='</div>';
            content+='<br class="clear">';
            content+='</div>';
            content+='</div>';
            content+='<div class="clear"></div>';
            content+=' </div>';

        }

        $("#similiarcontnet").html(content);

    });
};

var gotocourse=function (catname,name) {
    var insname=name.replace(/\s/g,"+");
    var inname=catname.replace(/\s/g,"+");

    window.open(site_url+"career-individual-section/"+inname+"/"+insname, '_blank');
};