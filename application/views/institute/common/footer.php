<!-- modal for information -->
 <!---- modal for message goes here --->
<div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                  <h4 class="modal-title text-center">
                          <img src="<?= base_url()?>assets/images/logo-lat.gif">
                  </h4>
              </div>
              <div class="modal-body">
                <p id="custom_message" class="text-bold text-logogreen text-center"></p>
              </div>
            </div>
          </div>
     </div>
 <!---- modal for  message goes here --->   


<footer class="main-footer">
    <strong>Copyright &copy; 2016-2017 <a href="www.yescolleges.com">YesColleges.com</a>.</strong> All rights reserved.
</footer>
<script>
$(function() {
    function reposition() {
        var modal = $(this),
            dialog = modal.find('.modal-dialog');
        modal.css('display', 'block');
        
        // Dividing by two centers the modal exactly, but dividing by three 
        // or four works better for larger screens.
        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
    }
    // Reposition when a modal is shown
    $('.modal').on('show.bs.modal', reposition);
    // Reposition when the window is resized
    $(window).on('resize', function() {
        $('.modal:visible').each(reposition);
    });
});

</script>


<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
</body>
</html>

