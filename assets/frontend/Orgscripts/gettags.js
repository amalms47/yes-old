$(function () {

    var tagid=$("#tagidsection").val();
        gettagby(tagid);
});

var gettagby=function (id) {

    $.post(site_url+'Seoadmin/getTagsfront',{"id":id},function(data)
    {
        var content=data.content;
        for(var datas in content ){
            var mydata=content[datas];
        }
        $('#collegetitletag').html(mydata.title);
        $('#metakeywordtag').html(mydata.metaname);
        $('#metanametag').html(mydata.metadescription);

    });
};