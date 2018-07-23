$(function()
{

    $('input[type="radio"].category').iCheck({radioClass: 'iradio_flat-blue'});
    $('input[type="radio"].choice').iCheck({radioClass: 'iradio_flat-blue'});

    $("#new_feature").click(function(){$("#new_feature_panel").slideToggle();});
    $("#cancel").click(function(){var validator = $( "#featureform" ).validate();validator.resetForm();$("#new_feature_panel").slideToggle(); $("#save").val("New"); $("#save").attr("selid",-1);});

    $('#details').wysihtml5({toolbar: {
        "font-styles": true, // Font styling, e.g. h1, h2, etc.
        "emphasis": true, // Italics, bold, etc.
        "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
        "html": true, // Button which allows you to edit the generated HTML.
        "link": false, // Button to insert a link.
        "image": false, // Button to insert an image.
        "color": true, // Button to change color of font
        "blockquote": false // Blockquote
    }});

    $.validator.setDefaults({errorClass: 'help-block',highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }});
    $.validator.addMethod( "pattern", function( value, element, param ) { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  } return param.test( value ); }, "Invalid input information." );
    savefeature();
    loadfeatures();
}).ajaxStart(function() { Pace.restart(); });

var savefeature=function()
{
    $("#featureform").validate({ ignore: ":hidden:not(textarea)",
        rules:{title:{required:true},pic:{required:true},details:{required:true}},
        messages:{title:{ required:"Please enter title."},pic:{ required:"Please enter picture."},details:{ required:"Please enter details."}}
    });

    $("#featureform").on("submit",function(event)
    {

        event.preventDefault();
        if(!$("#featureform").valid()){return false;}

        var v=$("input[name='option']:checked").val();
        if($("#save").val()==="New")
        {
            var data=new FormData(document.getElementById("featureform"));
            $.ajax({ url: "Institute/createFeature", type: 'POST',data: data,processData: false,contentType: false, enctype: 'multipart/form-data',
                success: function (data)
                {
                    $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
                    $("#featureform")[0].reset();         $("#new_feature_panel").slideToggle();
                    $("#save").val("New"); $("#save").attr("selid",-1);
                }

            }).done(function(){loadfeatures();});
        }
        else if($("#save").val()==="Update")
        {
            var mydata=$("#featureform").serializeArray(); mydata.push({name:"id",value:$("#save").attr("selid")});
            $.post("Institute/saveFeature",mydata,function(data){$("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false}); }).done(function(){loadfeatures();});
            $("#featureform")[0].reset();         $("#new_feature_panel").slideToggle();
            $("#save").val("New"); $("#save").attr("selid",-1);
            $('input#pic').prop('disabled', false);
            $('iframe').contents().find('.wysihtml5-editor').html('');
        }

    });


};



var loadfeatures=function()
{

    $.post("Institute/getFeature",function(data)
    {

        var content='';
        if(data.iserror==0)
        {

            var features=data.features;
            var i=1;
            for (var feature in features)
            {
                var myfeature=features[feature];

                content+='<div class="row" style="background-color: #dee2e8">';
                content+='<div class="col-md-3"><img class="img-responsive pad featphoto" src="'+myfeature.picture+'" alt="Photo"></div>';
                content+='<div class="col-md-9" >';
                content+='<h3 id="title">'+myfeature.title+'&nbsp;('+myfeature.type+')</h3>';
                content+='<div  id="content" style="height:140px;text-align:justify;overflow:auto;background-color: #dee2e8";>'+myfeature.content+'</div>';
                content+='<div class="box-footer" style="background-color: #dee2e8">';
                content+='<div class="pull-right"> <button type="submit" class="btn" style="background-color: #302d2c;color:white"" onclick="editfeatures('+myfeature.id+')"><i class="fa fa-pencil"></i> Edit</button></div>';
                content+='<button type="reset" class="btn" style="background-color: #af311d;color:white" onclick="deletefeatures('+myfeature.id+')"><i class="fa fa-times"></i> Delete</button>';
                content+='</div>';
                content+='</div>';
                content+='</div>';
            }

        }
        else{content+='<tr><td class="mailbox-star" colspan="3">no information found at server</td>';$('#course_page').html("");}
        $("#feature_body").html(content);


    });
};
var deletefeatures=function(id)
{
    $.post("Institute/deleteFeature",{"id":id},function(data){$("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});   }).done(function(){loadfeatures();});
};
var editfeatures=function(id)
{
    $.post("Institute/getFeatureById",{"id":id},function(data){
        $("#title").val(data.features.title);
        $('iframe').contents().find('.wysihtml5-editor').html(data.features.content);
        if ($('#new_feature_panel').is(':visible')===false)$("#new_feature_panel").slideToggle();
        $("#save").val("Update"); $("#save").attr("selid",id);
        $('input#pic').prop('disabled', true);
    });
};