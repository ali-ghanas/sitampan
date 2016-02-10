<?php
include "lib/koneksi.php";
include "lib/function.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>
<html>
    <head>
    <title>Pencarian Container Yang akan distripping</title>
    <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
    <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
     <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#tglsrt').mask('99/99/9999');
               
           });
         </script>
         <script type="text/javascript">
      $(document).ready(function() {
	       $('#ceksemua').click(function () {
		        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
	       });
      });  
    </script>
    <script type="text/javascript"> 
      $(document).ready(function(){
        $(".flip").click(function(){
          $(".pesan").slideToggle("slow");
        });
      });
    </script>
    <script type="text/javascript"> 
      $(document).ready(function(){
        	$("#flowtabs").tabs("#flowpanes > div");


	    });
	</script>


    <style type="text/css"> 
      div.pesan {
        height:250px;
        display:none;
        float: none;
      }
      div.pesan, p.flip {
        margin: 0px;
        padding: 5px;
        text-align: center;
        background: #bed4e9;
        border: 1px solid black;
        cursor: pointer;
        
      }
      
      .ui-widget { 
      font-family: Arial,Verdana,sans-serif; 
      font-size: 1.0em;
   }  
   .ui-widget-header { 
      border: 1px solid #2b3846; 
      background: #2b3846;
      font-weight: bold; }
   .ui-widget-content { 
      border: 1px solid #2b3846; 
      background: #f1f2f9;
      color: #182e43; 
      
   }
   .tabs-bottom .ui-tabs-panel { 
      height: 450px; 
      overflow: auto; 
   } 
   .tabs-bottom .ui-tabs-nav { 
      position: absolute; 
      left: 0; 
      bottom: 0; 
      right:0; 
      padding: 0 0.2em 0.2em 0; 
   }  
   .tabs-bottom .ui-tabs-nav li { 
      margin-top: -2px; 
      margin-bottom: 1px; 
      border-bottom-width: 1px; 
      border-top: none;
      background: #f1f2f9;
   }
  #suratbataltpp ul li a  {
       background: #f1f2f9;
   }
   .tabs-bottom .ui-tabs-nav li.ui-tabs-selected { 
      margin-top: -10px; 
      background: #eee;
   }   

     
    </style>
    <script type="text/javascript">
           $(document).ready(function() {
              $("#suratbataltpp").tabs({collapsible:"true"}).find(".ui-tabs-nav").sortable();
              $("#suratbataltpp").tabs({
                  fx:{
                      opacity :"toggle",
                      duration: "slow"
                  }
              })
           });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
  	    $(':input:not([type="submit"])').each(function() {
	        $(this).focus(function() {
	            $(this).addClass('hilite');
	        }).blur(function() {
	            $(this).removeClass('hilite');});
	     });
      });  
    </script>    
    <style>   
      .hilite{
	       background-color: #adb9eb;
      }
    </style> 
        
        
    
    </head>
    <body>
        
           
        <form method="post" id="stripping" name="stripping" action="?hal=pagebcf15pemwas&pilih=caricont_hasil">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="status" id="status" value="<?php echo $bcf15['idstatusakhir']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" >
                
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>PENCARIAN CONTAINER STRIPPING</b></td></tr>
                
                <tr>
                    <td>
                        <table class="data isitabel" width="100%">
                            <tr>
                                <td bgcolor="#d2d945" colspan="4">
                                     <span  style="text-decoration: none;color: #273372;font-size: 11pt; font-weight: bolder;font-family: verdana;">Pencarian Container</span> 
                                </td>
                                                               
                            </tr>
                            <tr>
                                <td class="isitabelnew">
                                    <ul></ul>
                                    <li>Pastikan status container apakah part off atau bukan, Jika part off maka masukkan nomor cont yang sama sehingga akan muncul 2 atau lebih BCF 1.5  yang akan diupdate, jika bukan partoff masukkan salah satu nomor container yang anda ketahui..</li>
                                    <li>Masukkan nomor container dan tahun bcf1.5 pada kotak pencarian container stripping.</li>
                                    <li>Silahkan input surat permohonan stripping, jika muncul 2 bcf 1.5 maka inputlah salah satu saja dengan mengklik "REKAM".</li>
                            
                                </td>
                            </tr>
                            
                            
                        </table>
                        
                        <div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Pencarian Container</a></li>  
                                  
                                  
                              </ul>
                        
                                <div id="tabs-1" >
                                    <table class="data isitabel">
                                        <tr>
                                            <td bgcolor="#dbd98f" colspan="6">
                                                <span  style="text-decoration: none;color: #28271b;font-size: 11pt; font-weight: bolder;font-family: verdana;">Form Pencarian Container</span> 
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">No Container</td><td>:</td><td><input class="required"  type="text" size="30" name="nocontainer" id="nocontainer" value="<?php echo $_POST['nocontainer'] ?>" /></td>
                                        
                                            <td class="isitabelnew">Tahun</td><td>:</td><td><input class="required"  type="text" size="10" name="tahun" id="tahun" value="<?php echo $_POST['tahun']?>" /></td>
                                        </tr>
                                        
                                        
                                        
                                        <tr>
                                            <td colspan="3"><input type="submit" name="submit1" value="Cari" class="button putih " onclick="javascript:return confirm('Lanjut ?')"  /></td>
                                        </tr>
                                        
                                    </table>
                                                
                                    
                                </div>
                            
                            
                            
                            </div>
                    </td>
                </tr>
                
                <tr>
                
                </tr>
                
            
            </table>
        </form>
      
        
     
</body>
</html>
<?php
};
?>