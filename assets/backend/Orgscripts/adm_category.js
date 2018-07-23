$(function () {
   getcategory(1);
   searchcategory();
    newcategory();

});

var getcategory=function (page) {


    $.post(site_url+"Administrator/getCategory",{"search":$('#catsearch').val(),page:page}, function (data) {
        var content="";
        var status="";

        var j=1;
        if (data.error === 0) {
            var category = data.content;
            for (var cate in category) {
                var mycat = category[cate];
                if(mycat.active==1){status="Active"}else{status="Blocked"}
                content+='<tr>';
                content+='<td>'+j+'.</td>';j++;
                content+='<td>'+mycat.categoryname+'</td>';
                content+='<td>'+mycat.date+'</td>';
                content+='<td>'+mycat.caddedby+'</td>';
                content+='<td>'+status+'</td>';
                content+='<td><button type="button" class="btn bg-gray " onclick="Updatecategory('+mycat.id+',\'' + mycat.categoryname + '\')"><i class="fa fa-edit"></i> Edit</button></td>';
                if(mycat.active==1)content+='<td><span  style="color: green;font-size: large" class="fa fa-check" onclick="activecategory('+mycat.id+','+mycat.active+')"></span></td>';
                else if(mycat.active==0)content+='<td><span  style="color: darkred;font-size: large" class="fa fa-times" onclick="activecategory('+mycat.id+','+mycat.active+')"></span></td>';
                content+='<tr>';
            }
            var page_cotent='';var page_count=data.page_count;
            page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getcategory(1)">«</a></li>';
            for(var i =1;i<=page_count;i++){page_cotent+=' <li><a  href="javascript:void(0);" onclick="getcategory('+i+')">'+i+'</a></li>';}
            page_cotent+='<li><a href="javascript:void(0);"  onclick="getcategory('+page_count+')">»</a></li>';
            $('#coursepages').html(page_cotent);

        }
        else {
            content='<tr><td>no information found at server</td></tr>';
        }
        $("#categorybody").html(content);
    });

};


var searchcategory=function()
{
    $("#catsearch").on("keyup",function(event)
    {
        event.preventDefault();
        getcategory(1);
    }) ;
};

var newcategory=function () {


    $("#admincatsubmit").on("click",function () {

        var category=$("#catname").val();
        $.post("Administrator/newCategory", { category: category}, function (data) {
            $("#catname").val("");
            getcategory(1);

            $("#custom_heading").html('Server response');
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});

        });

    });

};

var Updatecategory=function (catid,catname) {


    $('#updatecatmodal').modal({backdrop: 'static', keyboard: false});
    $("#updatecatname").val(catname);

   $("#updatecatsubmit").click(function () {

       var category=$("#updatecatname").val();
       $.post("Administrator/updateCategory", { catid:catid,category: category}, function (data) {

           $("#updatecatname").val("");
           getcategory(1);

           $("#custom_heading").html('Server response');
           $("#custom_message").html(data.message);
           $('#alertmodal').modal({backdrop: 'static', keyboard: false});

       });

   });

};

var activecategory=function (catid,val) {

    var option="0";
    if(val==0){option=1;}
    $.post("Administrator/blockCategory",{option:option,id:catid},function (data) {

    getcategory(1);
    });

};