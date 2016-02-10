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
   
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tgl").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tgl1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
    
    </head>
    <body>
        
           
        <form method="post" id="updatelongstay" name="updatelongstay" action="?hal=pagemonitoring&pilih=updatelongstay_proses" >
        
            <table width="100%" border="0" align="center"  bgcolor="#1a334c" class="isitabel">
                <tr>
                    <td colspan="2"><font color="#fff">Update Longstay adalah modul yang digunakan untuk memberi tanda terhadap BCF 1.5 yang dikategorikan longstay di TPS karena TPS nya TUTUP, Pengosongan TPS dan Longstay LCL Lainnya.Fungsinya yaitu memisahkan BCF 1.5 yang karena case tertentu diharuskan untuk di tetapkan sebagai Barang Yang Tidak Dikuasai (BCF 1.5) dengan Penetapan atas BCF 1.5 yang dalam kondisi normal, sehingga mudah untuk memonitoring penarikan BCF 1.5 nya. </font></td>
                </tr>
                <tr>
                    <td  align="left" width="20%"><font color="#fff">Nama TPP </font></td> 
                    <td ><select id="cmbtpp" name="cmbtpp" >
                            <option value = "" >--Pilih TPP--</option>
                            <?php
                            include 'lib/koneksi.php';
                                $sql = "SELECT idtpp,nm_tpp FROM tpp ORDER BY idtpp";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                       
                                            echo "<option value='$data[idtpp]' >$data[nm_tpp]</option>";
                                        }
                            ?>
                        </select>
                        
                    </td> 
                </tr>
                <tr>
                    <td  align="left" width="20%"><font color="#fff">Tanggal BCF 1.5 </font> </td> 
                    <td ><input name="tgl" id="tgl" type="text" value="<?php echo $_POST['tgl'] ?>"/>
                        
                    </td> 
                </tr>
                
                <tr>
                    <td  align="left" width="20%"><font color="#fff">TPS </font></td> 
                    <td ><input name="tps" id="tps"  type="text" value="<?php echo $_POST['tps'] ?>"/>
                        
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