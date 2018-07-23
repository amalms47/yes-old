  <div class="content-wrapper">
 <section class="content-header">

  <h1>Institution Profile Information<small> college  profile  can be managed here</small></h1>
 <ol class="breadcrumb"> 
 <li><a href="<?= base_url()?>institution-home"><i class="fa fa-dashboard"></i> Home</a></li>
 <li class="active"><i class="fa fa-institution"></i> Institution Profile</li>
 </ol>
</section>
<section class="profile-white">
      <form name="profileform" id="profileform">   
    <div class="row">
<div class="col-xs-12">
<h2 class="page-header">
<i class="fa fa-institution"></i> Institution Basic Information
<small class="pull-right">Registration Date: <span id="regdate"></span></small>
</h2>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" >Name </span>
<input type="text" class="form-control hidden-border" name="title" id="title"  title="ENTER COLLEGE NAME e.g: Federal Institute Of Engineering and Technology " placeholder="ENTER COLLEGE NAME e.g: Federal Institute Of Engineering and Technology ">
</div>
</div>
<div class="col-xs-12  col-sm-12 col-md-4 col-lg-4">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" >Short name </span>
<input type="text" class="form-control hidden-border" name="shortname" id="shortname"  title="ENTER SHORT NAME e.g: FISAT" placeholder="ENTER SHORT NAME e.g: FISAT">
</div>
</div>
</div>
<div class="row">

    <div class="col-xs-4">
        <div class="form-group input-group" >
            <span class="input-group-addon hidden-borderall" > Type </span>
            <select class="form-control hidden-border" id="collegetype" name="collegetype"  style="width: 100%;"  title="SELECT COLLEGE TYPE">

                <option value="private" >Private</option>
                <option value="govt" >Government</option>
                <option value="other" >Other</option>

            </select>
        </div>
    </div>
<div class="col-xs-4">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > Affiliation </span>
<input type="text" class="form-control hidden-border" name="subtitle" id="subtitle" title="Affiliation or certification name" placeholder="Affiliation or certification name ">
</div>
</div>



<div class="col-xs-4">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > Site url </span>
<input type="text" class="form-control hidden-border" name="url" id="url" title="ENTERSITE URL e.g.: https://www.fista.com " placeholder="College site url">
</div>
</div>
</div>    
<div class="row">
<div class="col-xs-6">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > Category </span>
<select class="form-control hidden-border" id="type" name="type"  style="width: 100%;"  title="SELECT CATEGORY">

</select>
</div>
</div>
 <div class="col-xs-6">
 <div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > University </span>
<input type="text" class="form-control hidden-border" name="university" id="university" title="ENTER UNIVERSITY NAME e.g. Mahathma Gandhi University Kottayam" placeholder="ENTER UNIVERSITY NAME e.g. Mahathma Gandhi University Kottayam">
</div>
</div>
</div>
<div class="row">
<div class="col-xs-6">
 <div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > Address </span>
<input type="text" class="form-control hidden-border" name="address" id="address" title="ENTER ADDRESS LINES" placeholder="ENTER ADDRESS LINES">
</div>
</div>
<div class="col-xs-3">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > State </span>
<select class="form-control select2 hidden-border" id="state" name="state"style="width: 100%;" title="SELECT STATE">

</select>
</div>
</div>
<div class="col-xs-3">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > District </span>
<select class="form-control select2 hidden-border" id="district" name="district" style="width: 100%;"  title="SELECT  DISTRICT">

</select>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-6">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > City </span>
<input type="text" class="form-control hidden-border" name="city" id="city" title="ENTER CITY" placeholder="ENTER CITY">
</div>
</div>
<div class="col-xs-6">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > Pincode </span>
<input type="text" class="form-control hidden-border" name="pincode" id="pincode" title="ENTER PINCODE" placeholder="ENTER PINCODE">
</div>
</div>

    <!--
<div class="col-xs-6">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > Email ids </span>
<input type="text" class="form-control hidden-border" name="emailids" id="emailids" title="ENTER EMAILI ID(multiple mail can be seperated by comma)" placeholder="ENTER EMAILI ID(multiple mail can be seperated by comma)">
</div>


</div>
</div>
<div class="row">
<div class="col-xs-6">
<div class="form-group input-group" >
<span class="input-group-addon hidden-borderall" > Contact no's </span>
<input type="text" class="form-control hidden-border" name="contactnos" id="contactnos" title="ENTER CONTACT NUMBER/MOBILE NO(multiple no can be seperated by comma)" placeholder="ENTER CONTACT NUMBER/MOBILE NO(multiple no can be seperated by comma)">
</div>
</div>
-->
</div>
<div class="row">
<div class="col-xs-12">
<h2 class="page-header g">
<i class="fa fa-list"></i> Institution Features & Short details
</h2>
<div class="form-group" id="faclist" name="faclist">
<label><input type="checkbox" class="minimal"  name="f_hostel" id="f_hostel"> Hostel </label>&nbsp;
 <label><input type="checkbox" class="minimal" name="f_library" id="f_library"> Library </label>&nbsp;
<label><input type="checkbox" class="minimal" name="f_bus" id="f_bus"> Bus transportation </label>&nbsp;
<label><input type="checkbox" class="minimal" name="f_wifi" id="f_wifi"> Wifi</label>&nbsp;
<label><input type="checkbox" class="minimal" name="f_canteen" id="f_canteen"> Canteen and Cafeteria </label>&nbsp;
<label><input type="checkbox" class="minimal" name="f_atm" id="f_atm"> ATM </label>&nbsp;
<label><input type="checkbox" class="minimal" name="f_sports" id="f_sports"> PlayGround</label>&nbsp;
</div>
</div>
</div>    
    
<div class="row">
<div class="col-xs-12">
<textarea class="textarea hidden-border " name="details" id="details" placeholder="Give a paragraph about college history " style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;  padding: 10px;"></textarea>
 </div>            
</div>
<div class="row">
<div class="col-xs-12">
<button type="submit" class="btn btn-primary pull-right ajax"  style="margin-right: 5px;">         <i class="fa fa-save"></i> Save         </button>
</div>
</div>
</form>
</section>
    <!-- /.content -->
    <div class="clearfix"></div>
      <script>
          $("#profilesidebar").css('color','white');
      </script>

      <script type="text/javascript" src="<?= base_url()?>assets/backend/plugins/state/state.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/backend/scripts/in_profile.js?jk"></script>
</div>


