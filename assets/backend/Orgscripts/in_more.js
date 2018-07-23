$(function()
{ 
    uploadcover();
    savecover();
    getcover();
    uploadlogo();
    savelogo();
    uploadpropic();
    savepropic();
    showmapdialogue();
    savemap();
    getmap();
    uploabrochure();
    savebrochure();
    getbrochure();
}).ajaxStart(function() { Pace.restart(); });



var uploadcover=function(){     $("#covertriger").on("click",function(){   $('#icover').trigger('click');    });     };
var savecover=function()
{
$("#icover").change(function(event)
 {
 event.preventDefault();
var formdata=new FormData(document.getElementById("coverform"));
$.ajax({url:'Institute/uploadCover', type: 'POST', data: formdata, processData: false, contentType: false, enctype: 'multipart/form-data',
success: function (data) {

    $("#custom_message").html(data.message); $('#myModal').modal({backdrop: 'static', keyboard: false});
    $('#myModal').on('click', function () {location.reload(true);});

       }


});

});
    getcover();
};
var getcover=function()
{
$.post('Institute/getInstitute',{'data':['cover']},function(mydata){
   var cover=(mydata.data.cover);
 if(cover!=="none.jpg"&&cover!=="none.png")
 {
 $('#cover').css({"background":"url('"+cover+"') center center"});        
 }
},'json');
};

var uploadlogo=function(){    $("#logotriger").on("click",function(){   $('#logo').trigger('click');    });    };


var uploadpropic=function(){      $("#profiletriger").on("click",function(){   $('#profilepic').trigger('click');    });  };



var savelogo=function()
{
$("#logo").change(function(event)
 {
 event.preventDefault();
var formdata=new FormData(document.getElementById("logoform"));
$.ajax({url:'Institute/uploadLogo', type: 'POST', data: formdata, processData: false, contentType: false, enctype: 'multipart/form-data',
success: function (data) {

    console.log(data);
    $("#custom_message").html(data.message); $('#myModal').modal({backdrop: 'static', keyboard: false});
    $('#myModal').on('click', function () {location.reload(true);});
}

});

});
};



var savepropic=function()
{
    $("#profilepic").change(function(event)
    {
        event.preventDefault();
        var formdata=new FormData(document.getElementById("profileform"));
        $.ajax({url:'Institute/uploadPropic', type: 'POST', data: formdata, processData: false, contentType: false, enctype: 'multipart/form-data',
            success: function (data) {
                $("#custom_message").html(data.message); $('#myModal').modal({backdrop: 'static', keyboard: false});
                $('#myModal').on('click', function () {location.reload(true);});
            }

        });

    });
};
var showmapdialogue=function()
{
    $("#maptriger").on("click",function(){$('#mapModal').modal({backdrop: 'static', keyboard: false});});
};

var savemap=function()
{
 $("#savemap").on("click",function() {
var data=$("#mapform").serializeArray();
if($("#mapcode").val()!="")
{
$.post("Institute/updateInstitute",data,function(data){$("#custom_message").html(data.message); $('#myModal').modal({backdrop: 'static', keyboard: false});
$("#mapform")[0].reset();
    if(data.error==0) {
        $('#myModal').on('click', function () {
            location.reload(true);
        });
    }
});

}
 });
};
var getmap=function()
{
$.post('Institute/getInstitute',{'data':['mapcode']},function(mydata){
   var mapcode=(mydata.data.mapcode);
 $("#map").html(mapcode);  
   $("#map iframe").attr("width","100%");
   $("#map iframe").attr("height","230px");

},'json');

};



var uploabrochure=function(){     $("#brchuretriger").on("click",function(){   $('#brofile').trigger('click');    });    };


var savebrochure=function()
{
$("#brofile").change(function(event)
 {
 event.preventDefault();
var formdata=new FormData(document.getElementById("brochureform"));
$.ajax({url:'Institute/uploadBrochure', type: 'POST', data: formdata, processData: false, contentType: false, enctype: 'multipart/form-data',
success: function (data) {  $("#custom_message").html(data.message); $('#myModal').modal({backdrop: 'static', keyboard: false});getbrochure();

    if(data.error==0){
        $('#myModal').on('click', function () {location.reload(true);});}
}
});
     $('#myModal').on('click', function () {location.reload(true);});
});
};

var getbrochure=function(){

$.post('Institute/getInstitute',{'data':['brochure']},function(mydata){
$("#brochure").html(mydata.data.brochure);
$("#brochurelink").attr("href",mydata.data.brochureurl);

},'json');
};