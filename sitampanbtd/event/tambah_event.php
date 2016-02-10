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
        <script type="text/javascript" src="event/tinymce/tiny_mce.js"></script>
        <script type="text/javascript">
        tinyMCE.init({
                 // General options
                 mode : "textareas",
                 theme : "advanced"
        });
        </script> 
        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#tgl_pelaksanaan').mask('99/99/9999');
               
               $('#tgl_selesai').mask('99/99/9999');
           });
         </script>
    
    </head>
    <body>
       
        
	     
        <div id="kotakinput">
        <form method="post" id="event" name="event" action="?hal=add_event">
               
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Tambah Kegiatan Penimbunan (Lelang, Musnah, Hibah)</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" border="0" bgcolor="#98badd">
                            
                            <tr>
                                <td  ><font color="#000" >Event</font> </td><td width="3">:</td>
                                <td colspan="2"><select id="idevenkategori" name="idevenkategori">
                                          <option value="" selected>::Pilih::</option>
                                                    <?php
                                                        $sql = "SELECT * FROM eventkategori ORDER BY ideventkategori";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[ideventkategori]==$_POST[ideventkategori]) {
                                                                        $cek="selected";
                                                                }
                                                                else {
                                                                        $cek="";
                                                                }
                                                                echo "<option value='$data[ideventkategori]' $cek>$data[nm_kategori]</option>";
                                                        }
                                                        ?>
                                            </select>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" >Judul </font></td><td width="3">:</td>
                                <td colspan="4">
                                   <input id="judulevent" name="judulevent" size="100" type="text"  value="<?php echo $_POST['judulevent'] ?>" />
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" >Tanggal dimulai </font></td><td width="3">:</td>
                                <td >
                                   <input id="tgl_pelaksanaan" name="tgl_pelaksanaan" type="text"  value="<?php echo $_POST['tgl_pelaksanaan'] ?>" />
                                </td>
                                <td  ><font color="#000" >Tanggal selesai </font></td><td width="3">:</td>
                                <td >
                                   <input id="tgl_selesai" name="tgl_selesai" type="text"  value="<?php echo $_POST['tgl_selesai'] ?>" />
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  ><font color="#000" >Uraian Kegiatan </font></td><td width="3">:</td>
                                <td colspan="8">
                                    <textarea  id="uraian" rows="9" cols="100" name="uraian" type="text"><?php echo $_POST['uraian']; ?></textarea> 
                                </td>
                                
                            </tr>
                            <tr>
                                     <td colspan="6"><input type="checkbox" name="publish" value="1"  <?php  if($_POST['publish'] == 1){echo 'checked="checked"';}?>>Publish </td>
                                     
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


                $idevenkategori = $_POST['idevenkategori']; 
                $tgl_pelaksanaan = sql($_POST['tgl_pelaksanaan']); 
                $tgl_selesai = sql($_POST['tgl_selesai']); 
                $uraian = $_POST['uraian']; 
                $publish = $_POST['publish'];
                $judulevent = $_POST['judulevent'];
                $tglpublish=date('Y-m-d H:i:s');
                               
		$iduser = $_SESSION['iduser'];

echo "$idevenkategori";
if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                
		
		$input=mysql_query("INSERT INTO event(
                                                        idevenkategori,
							uraian,
							tgl_pelaksanaan,
							tgl_selesai,
                                                        publish,
                                                        iduser,
                                                        tglpublish,
                                                        judulevent
                                                        
                        ) value (
                                                        '$idevenkategori',
							'$uraian',
							'$tgl_pelaksanaan',
							'$tgl_selesai',
                                                        '$publish',
                                                        '$iduser',
                                                        '$tglpublish',
                                                        '$judulevent'
                        )");
                
                echo "berhasil";
                 echo "<script type='text/javascript'>window.location='index.php?hal=daf_event'</script>";
         }
            
               
                

?>
      
                

</body>
</html>
<?php
};
?>