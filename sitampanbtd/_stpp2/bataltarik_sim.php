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
        
           
        <form method="post" id="cetakpemberitahuanall" name="cetakpemberitahuanall" action="?hal=pagemonitoring&pilih=bataltarik_sim_pro" >
        
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
                
                <tr>
                    <td  align="left" width="20%">Nama TPP </td> 
                    <td ><select class="required" id="cmbtpp" name="cmbtpp" >
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
                    <td  align="left" width="20%">Tanggal BCF 1.5 awal </td> 
                    <td ><input name="tgl" id="tgl" class="required" type="text" value="<?php echo $_POST['tgl'] ?>"/>
                        
                    </td> 
                </tr>
                <tr>
                    <td  align="left" width="20%">TPS </td> 
                    <td ><input name="tps" id="tps" class="required" type="text" value="<?php echo $_POST['tps'] ?>"/>
                        
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