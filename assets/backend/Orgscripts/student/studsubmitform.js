
$(function(){
    submitstudentdata();

    getstudentqualifications();

    getstudentattachs();
});


var submitstudentdata=function () {

    $.post(site_url+"Student/getstudentprofile",function (data) {

        var content=data.content;

        for(var contents in content){
            var mydata=content[contents];


            $("#subfname").html(mydata.firstname);
            $("#sublname").html(mydata.lastname);
            $("#subfrname").html(mydata.fathername);
            $("#subdob").html(mydata.dob);
            $("#submobile").html(mydata.mobile);
            $("#subgender").html(mydata.gender);
            $("#subreligion").html(mydata.religion);

            $("#subcaste").html(mydata.caste);
            $("#subcountry").html(mydata.nationality);
            $("#subaddress").html(mydata.address);
            $("#subtaddress").html(mydata.taddress);
            $("#subpincode").html(mydata.pincode);
            $("#subcity").html(mydata.city);
            $("#substate").html(mydata.state);
            $("#subdistrict").html(mydata.district);


        }
    });
};

var getstudentqualifications=function () {

    $.post(site_url+"Student/getstudentdata",function (data) {

        var cl = "";
        var content = data.students;

        var i=1;
        for (var contents in content) {

            var mydata = content[contents];

            cl+='<div class="complete-info-i"  style="font-size: 10px;color: #626262;">';
            cl+='<div class="complete-info-l">QUALIFICATION NAME '+i+' :</div>';i++;
            cl+='<div class="complete-info-r" style="text-transform: lowercase">'+mydata.coursetitle+'</div>';
            cl+='<div class="clear"></div>';
            cl+='</div>';
        }
        $("#qualsubsection").html(cl);
    });
};


var getstudentattachs=function () {


    $.post(site_url+"Student/getAttachments",function (data) {

        var cl = "";
        var content = data.contents;

        var i=1;
        for (var contents in content) {

            var mydata = content[contents];

            cl+='<div class="complete-info-i"  style="font-size: 10px;color: #626262;">';
            cl+='<div class="complete-info-l">ATTACHMENT NAME '+i+' :</div>';i++;
            cl+='<div class="complete-info-r" style="text-transform: lowercase">'+mydata.name+'</div>';
            cl+='<div class="clear"></div>';
            cl+='</div>';
        }
        $("#attachsubsection").html(cl);
    });
};



