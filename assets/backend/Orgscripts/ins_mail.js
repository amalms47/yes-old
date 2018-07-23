$(function () {
    $("#searchcollegemail").on("keyup",function(){getcollegemail(1);});
   getcollegemail(1);
    collegetostudentmail();
});

var getcollegemail=function (page) {

    var search=$("#searchcollegemail").val();
  $.post(site_url+"Institute/getcollegemail",{page:page,search:search},function (data) {
      var j=0;
      if(data.iserror===0) {
          var content = "";
          var value = data.value;
          for (var values in value) {

              j++;
              var mydata = value[values];

              if(mydata.isiview==0)content += '<tr style="background-color:lightgray">';
              else if(mydata.isiview==1)content += '<tr>';
              content += '<td>' + j + '</td>';

              content += '<td class="mailbox-subject"><b>' + mydata.collegename + '</b>';
              content += '<td class="mailbox-name"><a href="javascript:void(0)" onclick="mailreadpage(' + mydata.id + ')">' + mydata.collegeemail + '</a></td>';
              content += '<td class="mailbox-subject"><b>' + mydata.subject + '</b>';
              content += '</td>';
              content += '</td>';
              content += '<td class="mailbox-subject">' + mydata.message + '</td>';
              content += '<td class="mailbox-date">' + mydata.date + '</td>';
              content += '</tr>';
          }

          var page_cotent = '';
          var page_count = data.page_count;
          console.log(data);
          page_cotent += '<ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getcollegemail(1)">«</a></li>';
          for ( var i = 1; i <= page_count; i++) {
              page_cotent += '<li><a href="javascript:void(0);" onclick="getcollegemail(' + i + ')">' + i + '</a></li>';
          }
          page_cotent += '<li><a href="javascript:void(0);"  onclick="getcollegemail(' + page_count + ')">»</a></li>';
          $('#mailpage').html(page_cotent);


          $("#allmailbox").html(content);
      }
      else if(data.iserror===1){
          $("#allmailbox").html('No information found on server');
      }
  });

    $("#mailrefresh").click(function () {

        getcollegemail(1);
    });
};

var mailreadpage=function (id) {


    $.post(site_url+"Institute/getmailcontent",{id:id},function (data) {

        if(data.iserror===0) {
            var value = data.value;
            for (var values in value) {
                var mydata = value[values];

                $("#collegemailname").html(mydata.collegename);
                $("#frommail").html(mydata.collegeemail);
                $("#maildate").html(mydata.date);
                $("#mailsubject").html(mydata.subject);
                $("#mailcontent").html(mydata.message);
            }
        }
    }).done(function () {
        getcollegemail(1);
        checknewmail();
    });
    $('#collegeform').modal({  keyboard: false,backdrop:'static'});
};

var collegetostudentmail=function () {
    $.validator.setDefaults({

        // errorClass:'help-block',
        highlight: function (element) {
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                .closest('.form-group')
                .removeClass('has-error')
                .addClass('has-success');
        }
    });
    $("#mailboxcustom").validate({

        rules: {mailto: {required: true}, mailsubject: {required: true}, composeemail: {required: true}},
        messages: {
            mailto: {required: "Please enter reciepient emailid."},
            mailsubject: {required: "Please provide any subject"},
            composeemail: {required: "Please type your message"}

        }
    });

    $("#mailboxcustom").on("submit", function (event) {
        event.preventDefault();
        if (!$("#mailboxcustom").valid()) {
            return false;
        }

        $("#instmailbutton").html('sending');
        $("#instmailbutton").prop('disabled',true);
        var to = $("#mailto").val();
        var mailsubject = $("#mailsubject").val();
        var message = $("#composeemail").val();
        var subject = $("#mailsubject").val();


        $.post(site_url+"Institute/collegetostudentmail",{to:to,mailsubject:mailsubject,message:message}, function (data) {

            $("#instmailbutton").html('Send');
            $("#instmailbutton").prop('disabled',false);

            $("#mailto").val("");
            $("#mailsubject").val("");
            $("#mailsubject").val("");
            $("#composeemail").val("");




            $("#custom_message").html(data.message);
            $('#myModal').modal({backdrop: 'static', keyboard: false});
        });
    });



};