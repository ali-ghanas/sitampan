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
   
        
        <?php
        
        $tgl=date('Y-m-d 00:00:00');
        $tgl2=date('Y-m-d 23:59:50');
        ?>
    
    </head>
    <body>
        
           
        <form method="post" id="updatelongstay" name="updatelongstay" action="penindakan/rekap_konf_proses.php" >
        
            <table width="100%" border="0" align="center"  bgcolor="#1a334c" class="isitabel">
                <tr>
                    <td colspan="2"><font color="#fff">Rekap Laporan merupakan modul yang digunakan untuk mencetak Rekapan Laporan Konfirmasi BCF 1.5 berdasarkan tanggal kirim balasan ke Seksi Tempat Penimbunan </font></td>
                </tr>
                
                <tr>
                    <td  align="left" width="20%"><font color="#fff">Tgl Konfirmasi </font> </td> 
                    <td ><input name="tgl" id="tgl" type="text" value="<?php echo $tgl ?>"/><font color="#fff"> sd </font> <input name="tgl2" id="tgl2" type="text" value="<?php echo $tgl2 ?>"/> <font color="#FFF">YYYY/MM/DD H:m:s</font>
                        
                    </td> 
                </tr>
                <tr>
                    <td  align="left" width="20%"><font color="#fff">Penindakan </font> </td> 
                    <td >
                        <select id="idp2" name="idp2" >
                                <option value="" selected>::Pilih::</option>
                                        <?php
                                            $sql = "SELECT * FROM p2 ORDER BY idp2";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idp2]==$_POST[idp2]) {
                                                            $cek="selected";
                                                    }
                                                    else {
                                                            $cek="";
                                                    }
                                                    echo "<option value='$data[idp2]' $cek>$data[nm_p2]</option>";
                                            }
                                            ?>
                                </select>
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