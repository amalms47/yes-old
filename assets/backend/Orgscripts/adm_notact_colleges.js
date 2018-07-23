$(function () {

    $("#searchclg").on("keyup",function(){
        getnotavtivated(1);
    });
    submitupdate();
    getnotavtivated(1);
});

var getnotavtivated=function (page) {

    var search=$("#searchclg").val();

    var my_page=1;
    if(page!==null&&page!==undefined&&page!=="") {my_page=page;}
    $.post(site_url+"Administrator/getnotactivated",{page:page,search:search},function (data) {
        console.log(data);
        $("#collegescount").html(data.clgcount);
        var content="";
        var i=1;
        if(data.iserror===0){
            var msg="Ok";

            var colleges=data.colleges;
            for (var college in colleges) {

                var mycollege = colleges[college];

               content+='<tr>';
                content+='<td>'+i+'</td>';i++;
                content+='<td>'+mycollege.title+'</td>';
                content+='<td>'+mycollege.emailid+'</td>';
                content+='<td>'+mycollege.slug+'</td>';
                content+='<td>'+mycollege.contactno+'</td>';
                content+='<td>'+mycollege.regdate+'</td>';
                content+='<td><button class="btn-flat btn-info" onclick="updatetag('+mycollege.id+')">Edit tag</button></td>';

                content+='<td><button class="btn-flat btn-danger" onclick="details('+mycollege.id+')">View</button></td>';
                content+='</tr>';


                    $("#notactivated").html(content);

            }


            var page_cotent='';var page_count=data.page_count;
            if(my_page>1)
            page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getnotavtivated('+(my_page-1)+')">«&nbsp;Prev</a></li>';
            if(my_page<page_count)
                page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getnotavtivated('+(my_page+1)+')">Next&nbsp;»</a></li>';

            //page_cotent+='<li><a href="javascript:void(0);"  onclick="getnotavtivated('+page_count+')">»</a></li>';
            $('#notcollegepage').html(page_cotent);

        }
        else if(data.error===1){

            content+=data.message;
            $("#notactivated").html(content);
        }
    });
};
/*
var deletenotactive=function (delid) {

    var c=confirm('Are you sure');
    if(c==true) {
        $.post("Administrator/deleteinactiveclg", {id: delid}, function (data) {

            getnotavtivated(1);
            $("#custom_heading").html('Server response');
            $("#custom_message").html(data.msg);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
        });
    }
};
*/


var details=function(id)
{
    $.post(site_url+"Administrator/getcollegebyid",{"id":id},function(data){
        //console.log(data);
        $('#title').html(data.colleges.title);
        $('#ccover').css({"background":"url('"+data.colleges.cover+"') center center"});
        $('#clogo').attr("src",data.colleges.logo);
        $('#username').html(data.colleges.title);
        $('#subtitle').html(data.colleges.subtitle);
        $('#mapcode').html(data.colleges.mapcode);
        $('#mapcode').find('iframe').css({"width":"260px","height":"200px"});
        $('#address1').html(data.colleges.address);
        $('#address2').html(data.colleges.city+', '+data.colleges.district+"(district)");
        $('#address3').html(data.colleges.state+"(state), pin."+data.colleges.pincode);
        $('#category').html(data.colleges.type);
        $('#university').html(data.colleges.university);
        $('#phoneno').html(data.colleges.contactno);
        $('#emailid').html(data.colleges.emailid);
        $('#faxno').html(data.colleges.faxno);
        $('#brochure').attr("href",data.colleges.brochure);
        $('#hurl').attr("href",data.colleges.url);
        $('#url').html(data.colleges.url);
        $('#details').html(data.colleges.content);
        $('#shortname').html(data.colleges.shortname);
        $("#location").html(data.colleges.state);
        $("#locatio2").html(data.colleges.district);
    });

    $('#collegeform').modal({  keyboard: false,backdrop:'static'});
}

var updatetag=function(id)
{


    $.post(site_url+'Administrator/getTags',{"id":id},function(data)
    {


        var content=data.content;
        for(var datas in content ){
            var mydata=content[datas];
        }
        $('#selid').val(mydata.id);
        $('#uptitletag').val(mydata.titletag);
        $('#upnametag').val(mydata.metanametag);
        $('#upkeytag').val(mydata.metakeytag);




        $('#uptag').modal({  keyboard: false,backdrop:'static'});
    });

};


var submitupdate=function () {

    $('#updatetagform').on('submit',function (event) {


        var tid=$('#selid').val();
        var ttag=$('#uptitletag').val();
        var ntag=$('#upnametag').val();
        var ktag=$('#upkeytag').val();
        event.preventDefault();
        if (!$("#updatetagform").valid()) {
            return false;
        }


        $.post(site_url + 'Administrator/updatatTags', {'tid':tid,'ttag':ttag,'ntag':ntag,'ktag':ktag}, function (data) {

            $("#custom_heading").html('Server response');
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
            $("#uptagcancel").click();

        });

    });
    getnotavtivated(1);
};