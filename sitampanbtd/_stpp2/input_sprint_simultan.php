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
    <title>Input Surat Perintah Secara Simultan</title>
   
        
    </head>
    <body>
        
           
        <form method="post" id="cetakpemberitahuanall" name="cetakpemberitahuanall" action="?hal=pagetpp2&pilih=newbcf15" >
        
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
                
                <tr>
                    <td  align="left" width="20%">Nama TPP </td> 
                    <td ><select class="required" id="cmbtpp" name="cmbtpp" >
                            <option value = "" >--Pilih TPP--</option>
                            <?php
                            include 'lib/koneksi.php';
                                $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                       
                                            echo "<option value='$data[idtpp]' >$data[nm_tpp]</option>";
                                        }
                            ?>
                        </select>
                        
                    </td> 
                </tr>
                
             
                
            
            <tr><td><input class="button putih bigrounded" type="submit" name="Simpan" value="Proses" /></td><td><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>
      
        
     
</body>
</html>
<?php
};
?>