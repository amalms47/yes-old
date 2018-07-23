$(function () {

    $.validator.setDefaults({errorClass: 'help-block',highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }});
    $.validator.addMethod( "pattern", function( value, element, param ) { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  } return param.test( value ); }, "Invalid input information." );



    $("#newcatform").validate({
        rules:{newcatname:{required:true}},
        messages:{newcatname:{ required:"Please enter the course name ." } }
    });



    $("#searchclg").on("keyup",function(){
        getcategory(1);
    });
    getcategory(1);

    newcategory();
});



var newcategory=function () {


    $("#catsubmit").on("click",function () {

        event.preventDefault();
        if(!$("#newcatform").valid()){return false;}

        var category=$("#newcatname").val();

        $.post(site_url+"Administrator/savenewclgCat", { category: category}, function (data) {

            $("#newcatname").val("");
            getcategory(1);
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
        });

    });

    getcategory(1);
};



var getcategory=function (page) {

    var search=$("#searchclg").val();

    $.post(site_url+"Administrator/getClgCategory",{page:page,search:search},function (data) {

        $("#collegescount").html(data.num);
        var contents="";
        var i=1;
        if(data.error===0){


            var cat=data.content;
            for (var category in cat) {

                var mydata = cat[category];
                var active="Active";
                if(mydata.active==0){active="Blocked"}
                var msg="Active";
                var button='<td><button  class="btn-flat  btn-success" onclick="updatecat('+mydata.id+','+mydata.active+')">'+msg+'</button></td>';
                if(mydata.active==1){msg="Block";
                    button='<td><button  class="btn-flat  btn-danger" onclick="updatecat('+mydata.id+','+mydata.active+')">'+msg+'</button></td>';
                }
                contents+='<tr>';
                contents+='<td>'+i+'</td>';i++;
                contents+='<td>'+mydata.category+'</td>';
                contents+='<td>'+mydata.date+'</td>';
                contents+='<td>'+active+'</td>';
                contents+=button;
                contents+='</tr>';


                $("#notactivated").html(contents);

            }


            var page_cotent='';var page_count=data.pagecount;
            page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getcategory(1)">«</a></li>';
            for(var i =1;i<=page_count;i++){page_cotent+=' <li><a  href="javascript:void(0);" onclick="getcategory('+i+')">'+i+'</a></li>';}
            page_cotent+='<li><a href="javascript:void(0);"  onclick="getcategory('+page_count+')">»</a></li>';
            $('#notcollegepage').html(page_cotent);

        }
        else if(data.error===1){

            contents+=data.message;
            $("#notactivated").html(contents);
        }
    });
};

var updatecat=function(id,status)
{
    var flag=1;
    if(status==1)flag=0;
  $.post(site_url+"Administrator/updateclgCategory",{id:id,flag:flag},function (data) {
      getcategory(1);
  });

};
