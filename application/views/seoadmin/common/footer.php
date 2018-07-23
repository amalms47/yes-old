<!-- modal for information -->
<div class="modal modal-primary" id="alertmodal">
<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span></button><h4 class="modal-title" id="custom_heading"></h4></div>
<div class="modal-body"><p id="custom_message"></p></div>
<div class="modal-footer "><button type="button" class="btn btn-primary pull-right" data-dismiss="modal">OK</button></div>
</div></div>
</div>
<!-- modal for information -->
<footer class="main-footer"><strong>Copyright &copy; 2016-2017 <a href="www.yescolleges.com">YesColleges.com</a>.</strong> All rights reserved.</footer>
<script type="text/javascript">

$(function() 
{ 
function reposition() { var modal = $(this), dialog = modal.find('.modal-dialog'); modal.css('display', 'block');dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));   }
 $('.modal').on('show.bs.modal', reposition);    
 $(window).on('resize', function() {   $('.modal:visible').each(reposition); });
});
</script>
</div>
</body>
</html>

