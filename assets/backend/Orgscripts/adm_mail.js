$(function () {


    $("#searchmail").on("keyup",function(){getmail(1);});
    $.validator.setDefaults({errorClass: 'help-block', highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); }, unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }  });
    $.validator.addMethod( "pattern", function( value, element, param )  { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  }  return param.test( value );   }, "Invalid input information." );


    $('#composeemail').wysihtml5({toolbar: {
        "font-styles": true, // Font styling, e.g. h1, h2, etc.
        "emphasis": true, // Italics, bold, etc.
        "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
        "html": true, // Button which allows you to edit the generated HTML.
        "link": true, // Button to insert a link.
        "image": false, // Button to insert an image.
        "color": false, // Button to change color of font
        "blockquote": true// Blockquote
    }});
    $('#mailmsg2').wysihtml5({toolbar: {
        "font-styles": true, // Font styling, e.g. h1, h2, etc.
        "emphasis": true, // Italics, bold, etc.
        "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
        "html": true, // Button which allows you to edit the generated HTML.
        "link": true, // Button to insert a link.
        "image": false, // Button to insert an image.
        "color": false, // Button to change color of font
        "blockquote": true// Blockquote
    }});
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    getcollegelist();
    sendmailbox();
    sendmultiplemailbox();
    getmail(1);
});

var getcollegelist=function () {

    $.post("Administrator/getcollegecategorylist", function (data) {

        var conten = "";
        if (data.iserror === 0) {
            var content = data.content;
            for (var contents in content) {

                var mydata = content[contents];

                conten += '<label>';
                conten += '<input id="categorylist" name="categorylist" value="' + mydata.category + '" type="checkbox" class="minimal" >';
                conten += '<span style="padding:5px;">' + mydata.category + '</span>';
                conten += '</label>';
                conten += '<br/>';
            }
        }
        else {
            conten += 'No value found on server';
        }
        $("#collegelist").html(conten);

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({checkboxClass: 'icheckbox_flat-blue'});


        $checks = $('input[type="checkbox"].minimal');

       $checks.on('ifChanged', function() {
            var string = $checks.filter(":checked").map(function(){
                return this.value;
            }).get().join(" ");
            $('#mailto2').val(string);

        });


    });
};
var sendmailbox=function () {

    $("#mailboxcustom").validate({

        rules: {mailto: {required: true}, mailsubject: {required: true}, composeemail: {required: true},mailtocollege: {required: true}},
        messages: {
            mailto: {required: "Please enter reciepient emailid."},
            mailsubject: {required: "Please provide any subject"},
            composeemail: {required: "Please type your message"},
            mailtocollege: {required: "Please type college name"}
        }
    });

    $("#mailboxcustom").on("submit", function (event) {
        event.preventDefault();
        if (!$("#mailboxcustom").valid()) {
            return false;
        }

        $("#singlesendbtn").html('sending');
        $("#singlesendbtn").prop('disabled',true);
        var to = $("#mailto").val();
        var mailtocollege = $("#mailtocollege").val();
        var mailsubject = $("#mailsubject").val();
        var message = $("#mailmsg").val();


        $.post(site_url+"Administrator/sendcustommail",{to:to,mailtocollege:mailtocollege,mailsubject:mailsubject,message:message}, function (data) {

            $("#singlesendbtn").html('Send');
            $("#singlesendbtn").prop('disabled',false);
            $("#mailto").val("");
           $("#mailtocollege").val("");
           $("#mailsubject").val("");
           $("#mailmsg").val("");
            $("#custom_heading").html('Server response');
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
        });
    });
};
var sendmultiplemailbox=function () {


    $("#mailboxcustom2").validate({

        rules: {mailto2: {required: true}, mailsubject2: {required: true}, mailsubject2: {required: true}},
        messages: {
            mailto: {required: "Please enter reciepient emailid."},
            mailsubject: {required: "Please provide any subject"},
            mailsubject2: {required: "Please type your message"}

        }
    });

    $("#mailboxcustom2").on("submit", function (event) {
        event.preventDefault();
        if (!$("#mailboxcustom2").valid()) {
            return false;
        }

        $("#mulsendbtn").html('sending');
        $("#mulsendbtn").prop('disabled',true);

        var category=[];
        $.each($("input[name='categorylist']:checked"),function () {

            category.push($(this).val());
        });

        var to = $("#mailto2").val();

        //console.log(to);
        var mailsubject = $("#mailsubject2").val();
        var message = $("#mailmsg2").val();


        $.post("Administrator/sendmultiplemail",{to:category,mailsubject:mailsubject,message:message}, function (data) {

            $("#mulsendbtn").html('Send');
            $("#mulsendbtn").prop('disabled',false);

            $("#mailto2").val("");
            $("#mailsubject2").val("");
            $("#composeemail2").val("");
            $("#custom_heading").html('Server response');
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
        });
    });
};
var getmail=function (page) {

    var search=$("#searchmail").val();
    var my_page=1;
    if(page!==null&&page!==undefined&&page!=="") {my_page=page;}
    $.post(site_url+"Administrator/getallmails",{page:my_page,search:search},function (data) {

        var j=0;
        if(data.iserror==0) {
            var content = "";
            var value = data.value;
            for (var values in value) {

                j++;
                var mydata = value[values];
                content += '<tr>';
                content += '<td>' + j + '</td>';

                content += '<td><button type="button" class="btn btn-default btn-sm" onclick="deletemail(' + mydata.id + ')"><i class="fa fa-trash-o"></i></button></td>';

                content += '<td class="mailbox-subject"><b>' + mydata.collegename + '</b>';
                content += ' <td class="mailbox-name"><a href="javascript:void(0)" onclick="mailreadpage(' + mydata.id + ')">' + mydata.collegeemail + '</a></td>';
                content += '<td class="mailbox-subject"><b>' + mydata.subject + '</b>';
                content += '</td>';
                content += '</td>';
                content += '<td class="mailbox-subject">' + mydata.message + '</td>';
                content += '<td class="mailbox-date">' + mydata.date + '</td>';
                content += '</tr>';

            }
            $("#allmailbox").html(content);
                var page_cotent = '';
                var page_count = data.page_count;
            if(my_page>1)
                page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getmail('+(my_page-1)+')">«&nbsp;Prev</a></li>';
            if(my_page<page_count)
                page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getmail('+(my_page+1)+')">Next&nbsp;»</a></li>';

            $('#mailpage').html(page_cotent);



        }
        if(data.iserror===1){
            $("#allmailbox").html('No information found on server');
        }
    });

   $("#mailrefresh").click(function () {

      getmail(1);
   });


};

var mailreadpage=function (id) {

    $.post("Administrator/getmailcontent",{id:id},function (data) {

        if(data.iserror===0) {
            var value = data.value;
            for (var values in value) {
                var mydata = value[values];

                $("#collegemailname").html(mydata.collegename);
                $("#frommail").html(mydata.collegeemail);
                $("#maildate").html(mydata.date);
                $("#mailsubject").html(mydata.subject);
                $("#mailcontent").html(mydata.message);
                if(mydata.isiview==0) $("#mailstatus").html('&#x2715; not read');
                if(mydata.isiview==1) $("#mailstatus").html('&#10003; read');

            }
        }
    });
    $('#collegeform').modal({  keyboard: false,backdrop:'static'});
};

var deletemail=function (id) {

    var c=confirm('Are you sure');
    if(c==true){
  $.post("Administrator/deletemailbyid",{id:id},function (data) {

      getmail(1);
      $("#custom_heading").html('Server response');
      $("#custom_message").html(data.message);
      $('#alertmodal').modal({backdrop: 'static', keyboard: false});
  });

    }
};
