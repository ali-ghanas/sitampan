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
    <title>Pembatalan Status BCF 1.5</title>
    <!--       jquery anytimes -->
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
<!--        <script type="text/javascript" src="lib/js/jquery.tools.min.js"></script>-->
         
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#stripping").submit(function() {
                 
                
                 
                 if ($.trim($("#nosrt").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No Surat Kosong Harap diisi");
                    $("#nosrt").focus();
                    return false;  
                 }
                 if ($.trim($("#tglsrt").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Tanggal surat kosong, Harap diisi");
                    $("#tglsrt").focus();
                    return false;  
                 }
                 
                 
              });      
           });
        </script>
        

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
       
<?php // aksi untuk edit
            session_start();


        if(isset($_POST['submit1'])) // jika tombol editsubmit ditekan
	{ 
                
            $id=$_POST['id'];
            $idtpp=$_POST['idtpp'];
            $idpelayaran=$_POST['idpelayaran'];
            $nosrt=$_POST['nosrt'];
            $tglsrtsql=$_POST['tglsrt'];
            $tglsrt=sql($tglsrtsql);
            $user_permohonan=$_SESSION['nip_baru'];
            $tgl_ajupermohonan=date('Y-m-d H:i:s');
            
                $sql = "SELECT * FROM suratmasukstripping where idbcf15='$id' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("GAGAL SIMPAN..Data telah ada di DB.");</script>';
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagefront&pilih=formstriping&id=$id'</script>";
                }
                                
                else
                {
                    $input=mysql_query("INSERT INTO suratmasukstripping(idbcf15, idtpp, idpelayaran,nosrt,tglsrt,user_permohonan,tgl_ajupermohonan)
                    VALUES('$id', '$idtpp', '$idpelayaran','$nosrt','$tglsrt','$user_permohonan','$tgl_ajupermohonan')");
                     echo "<script type='text/javascript'>window.location='index.php?hal=pagefront&pilih=formstriping&id=$id'</script>";
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select *  FROM bcf15,tpp,typecode WHERE bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tglsurat=view($bcf15['SuratBatalDate']);
        
        
       
        ?>
        <form method="post" id="stripping" name="stripping" action="?hal=pagefront&pilih=formstriping">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="status" id="status" value="<?php echo $bcf15['idstatusakhir']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" >
                
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>PERMOHONAN STRIPING CONTAINER DI TPP</b></td></tr>
                
                <tr>
                    <td>
                        <table class="isitabel" width="60%">
                            <tr>
                                <td class="isitabelnew" width="25%">No BCF 1.5</td><td class="isitabelnew">:</td><td><?php echo "$bcf15[bcf15no]"; ?></td>
                                <td class="isitabelnew">Tgl</td><td class="isitabelnew">:</td><td><?php echo tglindo($bcf15[bcf15tgl]); ?></td>
                            </tr>
                            <tr>
                                <td class="isitabelnew">No /Pos BC 1.1 </td><td class="isitabelnew">:</td><td><?php echo "$bcf15[bc11no]"; ?> Pos  <?php echo "$bcf15[bc11pos]"; ?> Sub Pos <?php echo "$bcf15[bc11subpos]"; ?></td>
                                <td class="isitabelnew">Tgl</td><td class="isitabelnew">:</td><td><?php echo tglindo($bcf15[bc11tgl]); ?></td>
                            </tr>
                            <tr>
                                <td class="isitabelnew">Consignee </td><td class="isitabelnew">:</td><td><?php echo "$bcf15[consignee]"; ?></td>
                                
                            </tr>
                            <tr>
                                <td class="isitabelnew">Notify </td><td class="isitabelnew">:</td><td><?php echo "$bcf15[notify]"; ?></td>
                                
                            </tr>
                        </table>
                        <?php
                        $sqlstrip = "select *  FROM suratmasukstripping where idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                        $querystrip = mysql_query($sqlstrip);
                        $datastrip = mysql_fetch_array($querystrip);
                        
                        ?>
                        <div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Permohonan Striping</a></li>   
                              </ul>
                        
                                <div id="tabs-1" >
                                    <table class="data isitabel">
                                        <tr>
                                            <td bgcolor="#d2d945" colspan="4">
                                                <span  style="text-decoration: none;color: #273372;font-size: 11pt; font-weight: bolder;font-family: verdana;">Rekam Surat Permohonan Striping Container</span> 
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">No Surat</td><td>:</td><td><input class="required" type="text" size="50" name="nosrt" id="nosrt" value="<?php echo $datastrip['nosrt'] ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Tanggal</td><td>:</td><td><input class="required" type="text" size="10" name="tglsrt" id="tglsrt" value="<?php echo my_ke_tgl($datastrip['tglsrt'])?>" />(DD-MM-YYYY)</td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">TPP</td><td>:</td>
                                            <td>
                                                <select class="required" id="idtpp" name="idtpp" >
                                                    <option value = "" >--T P P--</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idtpp]==$bcf15[idtpp]) {
                                                                    $cek="selected";
                                                                    }
                                                               else {
                                                                    $cek="";
                                                                    }
                                                                    echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                                                }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Agen Pengangkut</td><td>:</td>
                                            <td>
                                                <select class="required" id="idpelayaran" name="idpelayaran" >
                                                    <option value = "" >--Pelayaran--</option>
                                                    <?php
                                                        $sql = "SELECT * FROM pelayaran ORDER BY idpelayaran";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idpelayaran]==$bcf15[idpelayaran]) {
                                                                    $cek="selected";
                                                                    }
                                                               else {
                                                                    $cek="";
                                                                    }
                                                                    echo "<option value='$data[idpelayaran]' $cek>$data[nm_pelayaran]</option>";
                                                                }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td colspan="3"><input type="submit" name="submit1" value="Simpan" class="button putih " onclick="javascript:return confirm('Simpan ?')"  /></td>
                                        </tr>
                                        <?php
                                        $sql = "SELECT * FROM suratmasukstripping where idbcf15='$id' ";
                                        $query = mysql_query($sql);
                                        $cek=mysql_numrows($query);
                                        if($cek>0){
                                            echo "<tr height=50><td colspan=3 bgcolor='#1e2233'><span style='text-decoration: none;color: #fff;font-size: 11pt; font-weight: bolder;font-family: verdana;'>Segera Sampaikan Ke Pemeriksa Pengawas TPP</span></td></tr>";
                                        }
                                        ?>
                                    </table>
                                                
                                    
                                </div>
                                
                            
                            
                            </div>
                    </td>
                </tr>
                
                <tr>
                
                </tr>
                
            
            </table>
        </form>
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>
     
            

</body>
</html>
<?php
};
?>