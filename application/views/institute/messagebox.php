
<?php
echo '  <link rel="stylesheet" href="'. base_url().'assets/backend/bootstrap/css/bootstrap.min.css">';
echo '<link rel="stylesheet" href="'. base_url().'assets/backend/libs/css/font-awesome.min.css">';
echo ' <link rel="stylesheet" href="'. base_url().'assets/backend/libs/css/ionicons.min.css">';
echo '<link rel="stylesheet" href="'. base_url().'assets/backend/dist/css/AdminLTE.min.css">';
echo '<script src="'. base_url().'assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>';
echo '<script src="'. base_url().'assets/backend/bootstrap/js/bootstrap.min.js"></script>';
$mymessage="Something went wrong , Please contact administrator";
if(isset($message)){$mymessage=$message;}

echo ' <!---- modal for error message goes here --->
<div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                  <h4 class="modal-title text-center">
                          <img src="'. base_url().'assets/images/logo-lat.gif">
                  </h4>
              </div>
              <div class="modal-body">
                <h4 class="text-aqua text-center">'.$mymessage.'</h4> 
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
     </div>
 <!---- modal for error message goes here --->   ';

echo '<script>
    $(function(){
    $("#myModal").modal({backdrop:"static", keyboard: false});
    $("#myModal").on("hidden.bs.modal", function () {
    window.location.href="'.  base_url().'institution-login";
    });
});
</script>';