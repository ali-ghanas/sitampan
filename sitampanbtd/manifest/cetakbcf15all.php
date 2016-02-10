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
    <title>Cetak BCF 1.5</title>
    
    
    </head>
    <body>
        
           
        <form method="post" id="cetakbcf15" name="cetakbcf15" action="report/cetakbcf15all.php" target="_blank">
        
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
                <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>Cetak BCF 1.5</b> </td></tr>
                <tr>
                    <td  align="left" >No BCF 1.5 </td> 
                    <td><input name="bcf15no1" size="5" class="required" type="text" value="" title="harus diisi 6 digit"/> sd. <input name="bcf15no2" size="5"  class="required" type="text" value="" title="isi dengan 6 digit"/>
                    </td> 
                </tr>
                <tr>
                    <td  align="left" >Tahun </td> 
                    <td><input name="tahun" size="5" class="required" title="contoh '2013'" type="text" value="" />
                    </td> 
                </tr>
                <tr>
                    <td  align="left" >TPP </td> 
                    <td  >
                        <select class="required" id="tpp" name="tpp" >
                        <option value="" selected>::Pilih TPP::</option>
                                <?php
                                    $sql = "SELECT * FROM tpp";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idtpp]==$_POST[idtpp]) {
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
             
            <tr><td><input class="button putih bigrounded " type="submit" name="cetakbcf15all" value="Cetak" /></td><td><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>
      
        
     
</body>
</html>
<?php
};
?>