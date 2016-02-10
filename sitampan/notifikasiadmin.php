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
                        <?php
                        //cek apakah ada notifikasi yang telah expired
                        $now = date('Y-m-d');
                        $sqlceknotif = "SELECT *  from app_notifikasi where statusnotif ='posting' and  tglakhirnotif < '$now' ";
                        $querynot = mysql_query($sqlceknotif);
                        $ceknot = mysql_numrows($querynot);
                        if ($ceknot > 0) {
                            $updatenotif = mysql_query("UPDATE app_notifikasi SET
                                                       statusnotif ='expired' WHERE statusnotif='posting' and  tglakhirnotif < '$now'");
                        }
                        
                        //mengecek apakah ada nitif dari admin
                        $sqlnotif = "select *  from app_notifikasi where statusnotif ='posting' ";
                        $resultnotif = mysql_query($sqlnotif);
                        $data = mysql_fetch_array($resultnotif);
                        ?>
                        <h4 class='modal-title'>
                            <strong>Info Admin</strong>
                        </h4>
                    </div>
                    <!-- / modal-header -->
                    <div class='modal-body'>

                        <div class="span12">
                            <?php echo $data['notifikasiadmin']; ?>
                            <br/>from : <?php echo $data['nama_admin']; ?>
                        </div>
                    </div>
                    <!-- / modal-body -->
                    <div class='modal-footer'>
                        <div class="checkbox pull-right">
                            Tgl Posting: <?php echo $data['tglrekam']; ?>

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