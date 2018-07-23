<style>
    .ui-autocomplete-input {
        border: none;
        font-size: 14px;

        margin-bottom: 5px;
        padding-top: 2px;
        border: 1px solid #DDD !important;
        padding-top: 0px !important;
        z-index: 1511;
        position: relative;
    }

    .ui-autocomplete {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1510 !important;
        float: left;
        display: none;
        min-width: 160px;
        width: 160px;
        padding: 4px 0;
        margin: 2px 0 0 0;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
    }
</style>
<style>
    #newcatform label.error, .output {color:#FB3A3A;font-weight:normal;font-size: small;float: right;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Institution reviews Management<small>maintain all reviews information</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>institution-home"><i class="fa fa-university"></i> Home</a></li>
            <li class="active"><i class="fa fa-list-alt"></i> Institution Reviews</li>
        </ol>
    </section>





    <section class="content">
        <div class="row">
            <div class="col-md-12">





                    <div class="mailbox-controls">
                        <ul  class="pagination pagination-sm no-margin pull-right" id="course_page"></ul>
                    </div>

<br>
                <br>
                <br>

                <!---code start here -->
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="box-group" id="accordion">
                        </div>
                    </div>
                </div>

                <!-- code end here -->
            </div>
    </section>
</div>
<script>
    $("#reviewbar").css('color','white');
</script>

<script type="text/javascript" src="<?= base_url()?>assets/backend/scripts/in_reviews.js"></script>


