$(function(){$(".stateselect").on("click ",function(a){var i=$("input[name='stateselect']:checked").val();$("#streamslide").slideUp(),$("#sortcity").slideDown(),getcity(i)}),$(".streamsearch").on("click ",function(a){$("input[name='streamsearch']:checked").val();getresult(1)}),$(".stateselect").on("click ",function(a){$("input[name='stateselect']:checked").val();getresult(1)}),search(),getresult(1),getchoice()});var search=function(){$("#searchsubmit").on("submit",function(a){a.preventDefault(),getresult(1)})},getresult=function(a){$.urlParam=function(a){var i=new RegExp("[?&]"+a+"=([^&#]*)").exec(window.location.href);return null==i?null:i[1]||0};var i=$.urlParam("q"),e=1;null!==a&&void 0!==a&&""!==a&&(e=a);var t=$("#search_term").val(),l=$("input[name='streamsearch']:checked").val(),s=$("input[name='stateselect']:checked").val(),c=$("input[name='cityselect']:checked").val();$.post(site_url+"Yescolleges/getResult",{term:t,page:e,stream:l,stream2:i,state:s,city:c},function(a){$("#search_term").val("");var i="",t="";if("0"===a.iserror){var l=a.institutes;for(var s in l){var c=l[s];i+='<div class="cat-list-item fly-in">',i+='<div class="cat-list-item-l">',i+='<a><img alt="" src="'+c.profile+'" style="width: 240px;height: 160px;border-radius: 4px;"></a>',i+="</div>",i+='<div class="cat-list-item-r">',i+='<div class="cat-list-item-rb">',i+='<div class="cat-list-item-p">',i+='<div class="cat-list-content">',i+='<div class="cat-list-content-a">',i+='<div class="cat-list-content-l">',i+='<div class="cat-list-content-lb">',i+='<div class="cat-list-content-lpadding">',i+='<div class="offer-slider-link"><a target="_blank" href="javascript:void(0)" onclick="getcollegedata(\''+c.title+"',"+c.id+');">'+c.title+"</a></div>",i+="<p>"+c.address+"</p>",i+='<div class="offer-slider-location">'+c.type+"</div>",i+="</div>",i+="</div>",i+='<br class="clear"/>',i+="</div>",i+="</div>",i+='<div class="cat-list-content-r">',i+='<div class="cat-list-content-p">',i+='<nav class="stars">',i+="<ul>",i+='<div class="offer-slider-r">',i+="</div>",i+='<a href="javascript:void(0)"  class="cat-list-btn" style="background-color: #455B45;color: white" onclick="getcollegedata(\''+c.title+"',"+c.id+');" target="_blank">APPLY</a>',i+="</div>",i+="</div>",i+='<div class="clear"></div>',i+="</div>",i+="</div>",i+="</div>",i+='<br class="clear" />',i+="</div>",i+='<div class="clear"></div>',i+=" </div>"}$("#pages").removeClass("hidden");var t="",r=a.page_count;e>1&&(t+='<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="getresult('+(e-1)+')"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;...PREV</a></li>'),e<r&&(t+='<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="getresult('+(e+1)+')">NEXT...&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>'),$("#pages").html(t)}else i+='<div class="cat-list-item fly-in">',i+='<div class="cat-list-item-l">',i+='<a><img alt="" src="'+(site_url+"assets/backend/images/collegeprofile/none.jpg")+'" style="width: 240px;height: 160px;"></a>',i+="</div>",i+='<div class="cat-list-item-r">',i+='<div class="cat-list-item-rb">',i+='<div class="cat-list-item-p">',i+='<div class="cat-list-content">',i+='<div class="cat-list-content-a">',i+='<div class="cat-list-content-l">',i+='<div class="cat-list-content-lb">',i+='<div class="cat-list-content-lpadding">',i+="<p>No colleges found on this details</p>",i+="</div>",i+="</div>",i+='<br class="clear"/>',i+="</div>",i+="</div>",i+='<div class="clear"></div>',i+="</div>",i+="</div>",i+="</div>",i+='<br class="clear" />',i+="</div>",i+='<div class="clear"></div>',i+=" </div>",$("#pages").addClass("hidden");a.inst_count>0?$("#searchcount").html(a.inst_count):$("#searchcount").html(0),$("#searchcollegelist").html(i)})},getcollegedata=function(a,i){var e=a.replace(/\s/g,"-");window.open(site_url+"college-profile-view/"+e+"/"+i,"_blank")},comparecollege=function(a,i){var e=a.replace(/\s/g,"-");window.location.href=site_url+"compare-colleges/"+e+"/"+i},getchoice=function(){},getcity=function(a){if("Kerala"==a){var i=["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thrissur","Thiruvananthapuram","Wayanad"];$(function(){for(var a="",e=0;e<i.length;e++)a+='<div class="checkbox">',a+='<label><input type="radio" class="cityselect" name="cityselect" value="'+i[e]+'" />&nbsp;'+i[e]+" </label>",a+="</div>";$("#listcity").html(a)})}if("Tamilnadu"==a){var e=["Ariyalur","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Mandapam","Nagapattinam","Nilgiris","Namakkal","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Thiruvallur","Tirupur","Tiruchirapalli","Theni","Tirunelveli","Thanjavur","Thoothukudi","Tiruvallur","Tiruvannamalai","Vellore","Villupuram","Viruthunagar"];$(function(){for(var a="",i=0;i<e.length;i++)a+='<div class="checkbox">',a+='<label><input type="radio" class="cityselect" name="cityselect" value="'+e[i]+'" />&nbsp;'+e[i]+" </label>",a+="</div>";$("#listcity").html(a)})}if("Karnataka"==a){var t=["Bagalkot","Bangalore","Bangalore Urban","Belgaum","Bellary","Bidar","Bijapur","Chamarajnagar","Chikkamagaluru","Chikkaballapur","Chitradurga","Davanagere","Dharwad","Dakshina Kannada","Gadag","Gulbarga","Hassan","Haveri district","Kodagu","Kolar","Koppal","Mandya","Mysore","Raichur","Shimoga","Tumkur","Udupi","Uttara Kannada","Ramanagara","Yadgir"];$(function(){for(var a="",i=0;i<t.length;i++)a+='<div class="checkbox">',a+='<label><input type="radio" class="cityselect" name="cityselect" value="'+t[i]+'" />&nbsp;'+t[i]+" </label>",a+="</div>";$("#listcity").html(a)})}if("Maharashtra"==a){var l=["Ahmednagar","Akola","Alibag","Amaravati","Arnala","Aurangabad","Aurangabad","Bandra","Bassain","Belapur","Bhiwandi","Bhusaval","Borliai-Mandla","Chandrapur","Dahanu","Daulatabad","Dighi (Pune)","Dombivali","Goa","Jaitapur","Jalgaon","Miraj","Mumbai (ex Bombay)","Murad","Nagapur","Nagpur","Nalasopara","Nanded","Nandgaon","Nasik","Navi Mumbai","Nhave","Osmanabad","Palghar","Panvel","Pimpri","Pune","Ratnagiri","Sholapur","Thane","Trombay","Varsova","Vengurla","Virar","Wada"];$(function(){for(var a="",i=0;i<l.length;i++)a+='<div class="checkbox">',a+='<label><input type="radio" class="cityselect" name="cityselect" value="'+l[i]+'" />&nbsp;'+l[i]+" </label>",a+="</div>";$("#listcity").html(a)})}if("Hyderabad"==a){var s=["Anjaw","Changlang","Dibang Valley","East Siang","East Kameng","Kurung Kumey","Lohit","Longding","Lower Dibang Valley","Lower Subansiri","Papum Pare","Tawang","Tirap","Upper Siang","Upper Subansiri","West Kameng","West Siang"];$(function(){for(var a="",i=0;i<s.length;i++)a+='<div class="checkbox">',a+='<label><input type="radio" class="cityselect" name="cityselect" value="'+s[i]+'" />&nbsp;'+s[i]+" </label>",a+="</div>";$("#listcity").html(a)})}$(".cityselect").on("click ",function(a){$("#stateslide").slideUp();$("input[name='cityselect']:checked").val();getresult(1)})};