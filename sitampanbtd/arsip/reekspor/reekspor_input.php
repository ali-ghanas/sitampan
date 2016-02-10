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
              $("#bapenarikan").submit(function() {
                 if ($.trim($("#nosuratredress").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No SUrat Redress wajib diisi, tdk boleh kosong");
                    $("#nosuratredress").focus();
                    return false;  
                 }
                  
                 
                 
              });      
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#tgl_dok').mask('99/99/9999');
               $('#bc11tgl').mask('99/99/9999');
               $('#tanggal2').mask('99/99/9999');
           });
         </script>
    
    </head>
    <body>
       
        
	     <?php // aksi untuk edit
        session_start();

	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        $sqlsetre = "select * FROM arsip_loket_pembatalan WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$querysetre = mysql_query($sqlsetre);
	$setre = mysql_fetch_array($querysetre);
        
        ?>
        <div id="kotakinput">
        <form enctype="multipart/form-data" action="arsip/reekspor/uploadscan.php" method="POST">
                
                
                <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
                
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Upload Setuju Reekspor</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#1f4c7a">
                            <tr>
                                <td  ><font color="#fff" >No Surat Persetujuan Reekspor </font></td><td width="3">:</td>
                                <td colspan="4">
                                    <input class="required" id="no_dok" name="no_dok" type="text"  value="<?php echo $setre['no_dok'] ?>" /> / <input class="required" id="tgl_dok" name="tgl_dok" type="text"  value="<?php echo view($setre['tgl_dok']) ?>" /><font size="3" color="#fff"><b>(dd/mm/yyyy)</b></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#fff" >Pilih File PDF </font></td><td width="3">:</td>
                                <td colspan="4"><input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                                   <input class="required" value="<?php echo $setre['name'] ?>"  name="userfile" type="file" /></td>
                            </tr>
                            
                            
                            <tr>

                                 <td colspan="3" align="center"><input type="submit" value="Upload PDF" class="button putih bigrounded " /> </td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
            
            
                <table>
                    <tr>
                        <td>Hasil Upload PDF</td>
                        <td>
                            <?php
                            $query  = "SELECT * FROM arsip_loket_pembatalan where idbcf15='$id' and jenis_dok='2'";
                            $hasil  = mysql_query($query);

                            while($data = mysql_fetch_array($hasil))
                            {
                               echo "<p><a href='arsip/reekspor/download.php?id=".$data['idbcf15']."'>".$data['name']."</a> (".$data['size']." bytes) [ <a href='arsip/reekspor/delete.php?id=".$data['idbcf15']."'>Delete</a> ]</p>";
                            }
                            ?>
                        </td>
                    </tr>
            
        </div>
        
        
	<?php
            

                    }; // penutup else
            ?>
      
                

</body>
</html>
