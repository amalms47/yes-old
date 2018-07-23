$(function () {
    getvisitors(1);
});


var getvisitors=function (page) {

    $.post(site_url+"Institute/getvisitors",{page:page},function (data) {

        $("#visitorscount").html(data.count);

        var content="";
        var i=1;
        if(data.iserror!=1){


            var visitors=data.value;
            for (var visit in visitors) {

                var vdata = visitors[visit];

                content+='<tr>';
                content+='<td>'+i+'</td>';i++;
                content+='<td>'+vdata.firstname+'&nbsp;'+vdata.lastname+'</td>';
                content+='<td>'+vdata.email+'</td>';
                content+='<td>'+vdata.mobile+'</td>';
                content+='<td>'+vdata.regdate+'</td>';
                content+='<td><button class="btn-flat btn-success" onclick="qualification('+vdata.student+')">Qualifications</button></td>';
                content+='<td><button class="btn-flat bg-gray" onclick="attachments('+vdata.student+')">Attachments</button></td>';
                content+='<td><button class="btn-flat bg-blue" onclick="viewprofile('+vdata.student+')">View Profile</button></td>';
                content+='</tr>';


                $("#visitors").html(content);

            }


            var page_cotent='';var page_count=data.page_count;
            page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getvisitors(1)">«</a></li>';
            for(var i =1;i<=page_count;i++){page_cotent+=' <li><a  href="javascript:void(0);" onclick="getvisitors('+i+')">'+i+'</a></li>';}
            page_cotent+='<li><a href="javascript:void(0);"  onclick="getvisitors('+page_count+')">»</a></li>';
            $('#notcollegepage').html(page_cotent);

        }
        else if(data.error==1){

            content+=data.message;
            $("#visitors").html(content);
        }


    });
};


var qualification=function(student)
{
    $.post(site_url+"Institute/getQual",{'student':student},function(data){
        var content='';

        console.log(data);
        if(data.iserror==="0")
        {
            content+='<table class="table table-bordered">';
            content+='<tbody><tr>';
            content+='<th style="width: 10px">#</th>';
            content+='<th>Course Name</th>';
            content+='<th>University/Board Name</th>';
            content+='<th>College Name</th>';
            content+='<th>Year of Passout</th>';
            content+='<th style="width: 40px">Percentage</th>';
            content+='</tr>';
            var quals=data.quals;
            var i=1;
            for (var qual in quals)
            {
                var qual=quals[qual];

                content+='<tr>';
                content+='  <td>'+i+'</td>';i=i+1;
                content+='  <td>'+qual.coursetitle+'</td>';
                content+='  <td>'+qual.courseuniversity+'</td>';
                content+='  <td>'+qual.collegename+'</td>';
                content+='  <td>'+qual.coursepassdate+'</td>';
                content+='  <td><span class="badge bg-green">'+qual.coursemarks+'</span></td>';
                content+='  </tr>';



            }
            content+=' </tbody></table>';

        }
        else{
            content=data.message;
        }
        $("#qualbody").html(content);

    }).done(function(){$('#qualModal').modal({backdrop: 'static', keyboard: false}); });
    //
};

var attachments=function(student)
{

    $.post(site_url+"Institute/getAttachments",{'student':student},function(data){
        var content='';

        if(data.error=="0")
        {
            content+='<table class="table table-bordered">';
            content+='<tbody><tr>';

            content+='<th style="width:10px">#</th>';
            content+='<th>Attachment for</th>';
            content+='<th>Updated on</th>';
            content+='<th style="width: 40px">View</th>';
            content+='</tr>';
            var quals=data.contents;
            var i=1;
            for (var qual in quals)
            {
                var attach=quals[qual];

                content+='<tr>';
                content+='  <td>'+i+'</td>';i=i+1;
                content+='  <td>'+attach.name+'</td>';
                content+='  <td>'+attach.date+'</td>';

                content+='  <td><a target="_blank"  href="'+attach.attachment+'"><span class="badge bg-green">View</span></a></td>';

                content+='  </tr>';



            }
            content+=' </tbody></table>';

        }
        else{
            content=data.message;
        }
        $("#attachbody").html(content);

    }).done(function(){$('#attachModal').modal({backdrop: 'static', keyboard: false}); });
    //
};

var viewprofile=function (student) {


    $.post(site_url+"Institute/getstudentPro",{sid:student},function (data) {

        if(data.iserror==0){

            var value=data.value;
            for(var values in value) {

                var mydata=value[values];

                $("#proimage").attr("src", mydata.photo);
                $("#proname").html(mydata.firstname + '&nbsp;' + mydata.lastname);
                $("#proaddress").html(mydata.address + '&nbsp;' + mydata.address2);
                $("#protaddress").html(mydata.taddress + '&nbsp;' + mydata.taddress2);
                $("#proplace").html(mydata.city + '&nbsp;' + mydata.district + '&nbsp;' + mydata.state);
                $("#profather").html(mydata.fathername);
                $("#promobile").html(mydata.mobile);
                $("#progender").html(mydata.gender);
                $("#prodob").html(mydata.dob);
                $("#pronationality").html(mydata.nationality);
                $("#promobile").html(mydata.mobile);

            }
        }else{

        }
    }).done(function () {
        $('#studProfile').modal({backdrop: 'static', keyboard: false});
    });


};