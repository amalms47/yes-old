$(function () {

    getpages();
    update();

});

var getpages=function () {

    $.post(site_url+"Seoadmin/getpages",function (data) {

        var content="";
        var i=1;
        var pages=data.message;
        for (var page in pages) {

            var mydata = pages[page];

            content+='<tr>';
            content+='<td>'+i+'</td>';i++;
            content+='<td>'+mydata.name+'</td>';
            content+='<td>'+mydata.updatedon+'</td>';
            content+='<td><button class="btn-flat btn-info" onclick="updatetag('+mydata.id+')">Edit tag</button></td>';
            content+='<td><button class="btn-flat btn-danger" onclick="details('+mydata.id+')">View</button></td>';
            content+='</tr>';

            $("#notactivated").html(content);
        }

    });
};

var updatetag=function (id) {


    $.post(site_url + 'Seoadmin/getTags', {"id": id}, function (data) {


        var mydata = data.content;
        $('#selid').val(mydata.id);
        $('#uptitletag').val(mydata.title);
        $('#upnametag').val(mydata.metaname);
        $('#upkeytag').val(mydata.metadescription);


    }).done(function () {
        $('#uptag').modal({keyboard: false, backdrop: 'static'});
    });

};

var update=function () {



    $('#updatetagform').on('submit',function (event) {

        var id=$('#selid').val();
        var ttag=$('#uptitletag').val();
        var ntag=$('#upnametag').val();
        var ktag=$('#upkeytag').val();
        event.preventDefault();
        if (!$("#updatetagform").valid()) {
            return false;
        }


        $.post(site_url + 'Seoadmin/updatatTags', {'ttag':ttag,'ntag':ntag,'ktag':ktag,'id':id}, function (data) {


            $("#custom_heading").html('Server response');
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
            $("#uptagcancel").click();
            $('#selid').val(-1);


        });

    });

    getpages();


};

var details=function (id) {

    $.post(site_url+'Seoadmin/getTags',{"id":id},function(data){

        var mydata=data.content;


        $('#metatitle').html(mydata.title);

        $('#metaname').html(mydata.metaname);
        $('#metadesc').html(mydata.metadescription);

    });

    $('#tagform').modal({  keyboard: false,backdrop:'static'});
};