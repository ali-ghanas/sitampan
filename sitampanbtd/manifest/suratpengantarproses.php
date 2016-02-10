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
    <title>Edit Surat Pemberitahuan Secara Simultan</title>
   <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tglawal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tglakhir").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
    
    </head>
    <body>
        
           
        <form method="post" id="editsp" name="editsp" action="?hal=pagemanifest&pilih=editsp_proses" >
        
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
                <tr >
                    <td >
                        <table class="groupmodul1" >
                            
                            <tr valign="top">
                                <td colspan="3">Modul ini digunakan untuk mengedit Surat Pengantar, adapun langkah langkah dalam menjalankan modul ini adalah sebagai berikut:</td>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">1</td><td>Tentukan nama TPP</td>

                            </tr>
                            <tr valign="top">
                                <td colspan="2">2</td><td>Tentukan rentang waktu surat pengantar yang akan diedit. Parameter tanggal yang dipakai adalah parameter <b>Tanggal BCF 1.5 yang baru terbit</b></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <table border="0" class="isitabel">
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
                            <tr>
                                <td  align="left" width="20%">Tanggal Surat </td> 
                                <td ><input class="required" name="tglawal" id="tglawal" type="text" /> sd. <input class="required" name="tglakhir" id="tglakhir" type="text" />

                                </td> 
                            </tr>
                            <tr>
                                <td  align="left" width="20%" colspan="2">Tanggal Surat Berdasarkan Tanggal Surat Pengantar/ BCF 1.5 </td> 
                                
                            </tr>
                            
                        </table>
                    </td>
                    
                </tr>
                
             
                
            
            <tr><td><input class="button putih bigrounded " type="submit" name="Simpan" value="Proses" /></td></td></tr>
            
            </table>
        </form>
      
        
     
</body>
</html>
<?php
};
?>