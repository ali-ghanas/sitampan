<?php
include "lib/koneksi.php";
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
    <title>Input Batal Tarik Secara Simultan</title>
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
   
        
        <?php
        
        $tgl=date('Y-m-d 00:00:00');
        $tgl2=date('Y-m-d 23:59:00');
        ?>
    
    </head>
    <body>
        
           
        <form method="post" id="updatelongstay" name="updatelongstay" action="loket/rekap_konf_proses.php" >
        
            <table width="100%" border="0" align="center"  bgcolor="#1a334c" class="isitabel">
                <tr>
                    <td colspan="2"><font color="#fff">Rekap Laporan merupakan modul yang digunakan untuk mencetak laporan konfirmasi yang di masuk dan telah dijawab melalui aplikasi </font></td>
                </tr>
                
                <tr>
                    <td  align="left" width="20%"><font color="#fff">Tgl Konfirmasi </font> </td> 
                    <td ><input name="tgl" id="tgl" type="text" value="<?php echo $tgl ?>"/><font color="#fff"> sd </font> <input name="tgl2" id="tgl2" type="text" value="<?php echo $tgl2 ?>"/> <font color="#FFF">YYYY/MM/DD H:m:s</font>
                        
                    </td> 
                </tr>
                
                
                
                
            
            <tr><td><input class="button putih bigrounded" type="submit" name="Simpan" value="Proses" /></td></tr>
            
            </table>
        </form>
      
        
     
</body>
</html>
<?php
};
?>