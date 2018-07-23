$(function () {


    $('#featuredview').on("click", function () {
        $('#featuredmodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#teleview').on("click", function () {
        $('#telemodal').modal({keyboard: false, backdrop: 'static'}); });

    $('#emailview').on("click", function () {
        $('#emailmodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#socialview').on("click", function () {
        $('#socialmodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#adview').on("click", function () {
        $('#admodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#proview').on("click", function () {
        $('#promodal').modal({keyboard: false, backdrop: 'static'});
    });
    $('#contentview').on("click", function () {
        $('#contentmodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#expoview').on("click", function () {
        $('#expomodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#fieldview').on("click", function () {
        $('#fieldmodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#placeview').on("click", function () {
        $('#placemodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#videoview').on("click", function () {
        $('#videomodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#seoview').on("click", function () {
        $('#seomodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#studview').on("click", function () {
        $('#studmodal').modal({keyboard: false, backdrop: 'static'});
    });

    $('#branview').on("click", function () {
        $('#branmodal').modal({keyboard: false, backdrop: 'static'});
    });

    submitservices();
    getapplied();

});

var submitservices=function () {

  $("#featuresubmit").on("click",function () {



      $.post("Institute/applyfeatured",function (data) {

          $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
      });
  });

    $("#telesubmit").on("click",function () {


        $.post("Institute/applytele",function (data) {

            $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
        });
    });
    $("#emailsubmit").on("click",function () {

        $.post("Institute/applyemail",function (data) {
            $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
        });
    });
    $("#socialsubmit").on("click",function () {

        $.post("Institute/applysocial",function (data) {
            $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
        });
    });

    $("#adsubmit").on("click",function () {

        $.post("Institute/applyad",function (data) {
            $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
        });
    });

};

var getapplied=function () {
    $.post("Institute/Getapplied",function (data) {

        var content="Applied on ";

        var service=data.datas;

        for (var services in service) {
            var myservice = service[services];

            if(myservice.featured!=null){$("#featuredview").html(content+myservice.featured);$("#daysleft").html('12 more days left');}
            if(myservice.telecalling!=null){$("#teleview").html(content+myservice.telecalling);}
            if(myservice.ad!=null){$("#adview").html(content+myservice.ad);}
            if(myservice.social!=null){$("#socialview").html(content+myservice.social);}
            if(myservice.email!=null){$("#emailview").html(content+myservice.email);}
        }

        });
}