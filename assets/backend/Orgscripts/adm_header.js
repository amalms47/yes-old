$(function () {

    isnewRequests();

});

var isnewRequests=function () {
    $.post(site_url+"Administrator/isnewRequests",function (data) {

        content="";
        if(data.newreq==1){
            content+= '<a href="javascript:void(0);" onclick=studenquiry();>';
            content+='<i class="fa fa-envelope-o"></i>';
            content+='<span class="label label-danger">'+data.rowcount+'</span>';
            content+='</a>';
            $("#newreq").html(content);
        }
    });
};

var studenquiry=function () {
    window.location.href=site_url+"admin-enquiry";
}

