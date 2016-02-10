<!--
Referances 
jQuery Cookie : https://github.com/carhartl/jquery-cookie
Modal : http://getbootstrap.com/javascript/#modals
-->
<script src="js/jquery-ui-modal.js"></script>
<script type="text/javascript"> 
                          $(document).ready(function(){
    //Referances 
    //jQuery Cookie : https://github.com/carhartl/jquery-cookie
    //Modal : http://getbootstrap.com/javascript/#modals
    var my_cookie = $.cookie($('.modal-check').attr('name'));
    if (my_cookie && my_cookie == "true") {
        $(this).prop('checked', my_cookie);
        console.log('checked checkbox');
    }
    else{
        $('#myModal1').modal('show');
        console.log('uncheck checkbox');
    }

    $(".modal-check1").change(function() {
        $.cookie($(this).attr("name"), $(this).prop('checked'), {
            path: '/',
            expires: 1
        });
    });
});
   
  

                        </script> 
<div class="container">
	<div class="row">
        <div class='modal fade' id='myModal1'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        
                        <h4 class='modal-title'>
                          <strong>Info Admin</strong>
                        </h4>
                    </div>
                    <!-- / modal-header -->
                    <div class='modal-body'>
                        
                        <div class="span12">
                            <br/>from : ADMIN SITAMPAN
                            Yth. Para User SITAMPAN,<br/>
                            Sehubungan dengan server SIAP yang masih error. Maka SITAMPAN DIOPERASIKAN LAGI di server 192.168.39.35:8080 (server lama)
                            
                        </div>
                    </div>
                    <!-- / modal-body -->
                   <div class='modal-footer'>
                       <div class="checkbox pull-right">
                          
                          
<!--                            <label>
                              <input class='modal-check' name='modal-check1' type="checkbox"> Don't Show
                            </label>-->
                        </div>
                        <!--/ checkbox -->
                  </div>
                  <!--/ modal-footer -->
                </div>
                <!-- / modal-content -->
          </div>
          <!--/ modal-dialog -->
        </div>
        <!-- / modal -->
	</div>
    <!-- / row -->
</div>
<!-- / container -->