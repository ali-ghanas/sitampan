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
    <title>Ubah BCF 15</title>
    <!--       jquery anytimes -->
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script> 
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#arsipsptahu").submit(function() {
                 if ($.trim($("#nomor_sptahu").val()) == "") {
                   alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Isikan nomor surat pemberitahuan, Misalnya: 001 sd 050");
                    $("#nomor_sptahu").focus();
                    return false;  
                 }
                  
                 
                 
              });      
           });
        </script>
       
    
    </head>
    <body>
       
        
	     
        <div id="kotakinput">
        <form method="post" id="arsipsptahu" name="arsipsptahu" action="?hal=page_arsip&pilih=input_sptahu">
        
        
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Upload Arsip Surat Pemberitahuan</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" border="0" bgcolor="#98badd">
                            <tr>
                                <td  ><font color="#000" >No Surat Pemberitahuan</font></td><td width="3">:</td>
                                <td colspan="4">
                                    <input id="nomor_sptahu" name="nomor_sptahu" type="text"  value="<?php echo $_POST['nomor_sptahu'] ?>" /> Mis: 001 sd 100 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" ><b>Tahun<br/></b></font></td><td width="3">:</td>
                                <td colspan="8">
                                    <input id="tahun_sptahu" size="4" name="tahun_sptahu" type="text"  value="<?php echo $_POST['tahun_sptahu'] ?>" />
                                </td>
                                
                            </tr>
                             <tr>
                                <td  ><font color="#000" >Keterangan </font></td><td width="3">:</td>
                                <td colspan="8">
                                    <textarea  id="catatan" rows="2" cols="50" name="catatan" type="text"><?php echo $_POST['catatan']; ?></textarea> 
                                </td>
                                
                            </tr>
                           
                            
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
            
            

        </div>
        
        
	<?php 


                $nomor_sptahu = $_POST['nomor_sptahu']; 
                $tahun_sptahu = $_POST['tahun_sptahu'];
		$catatan=$_POST['catatan'];
                $tglarsip=date('Y-m-d H:i:s');
                $iduser = $_SESSION['iduser'];


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                
		
		$input=mysql_query("INSERT INTO arsip_sptahu(
                                                        nomor_sptahu,
							catatan,
							tahun_sptahu,
                                                        iduser
							
                                                        
                                                        
                        ) value (
                                                        '$nomor_sptahu',
							'$catatan',
							'$tahun_sptahu',
                                                        '$iduser'
							
                        )");
                if($input){
                $sqlupload = "select * FROM arsip_sptahu WHERE nomor_sptahu='$nomor_sptahu' and tahun_sptahu='$tahun_sptahu'"; // memanggil data dengan id yang ditangkap tadi
                $queryupload = mysql_query($sqlupload);
                $bcf15upload = mysql_fetch_array($queryupload);
                $idarsip_sptahu=$bcf15upload[idarsip_sptahu];
                
                 echo "<script type='text/javascript'>window.location='index.php?hal=page_arsip&pilih=upload_sptahu&id=$bcf15upload[idarsip_sptahu]'</script>";
                }
                else {
                    echo "tidak dapat menyimpan";
                }
     }
     ?>
      
                

</body>
</html>
<?php
};
?>