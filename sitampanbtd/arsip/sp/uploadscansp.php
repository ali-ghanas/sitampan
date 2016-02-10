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
        
        
    </head>
    <body>
       
        
	     <?php // aksi untuk edit
session_start();

	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM arsip_sp_detail WHERE idarsip_sp_detail=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <div id="kotakinput">
        
            <form enctype="multipart/form-data" action="arsip/sp/uploadscanspproses.php" method="POST">
                <input name="idarsip_sp_detail" type="hidden" value="<?php echo $bcf15['idarsip_sp_detail'] ?>" />
                <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Upload Arsip Surat Pengantar</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" border="0" bgcolor="#98badd">
                            <tr>
                                <td  ><font color="#000" >No/Tgl Surat Pengantar (4digit)</font></td><td width="3">:</td>
                                <td colspan="4">
                                    <input id="nosp" name="nosp" type="text"  value="<?php echo $bcf15['nosp'] ?>" /> / <input id="tglsp" name="tglsp" type="text"  value="<?php echo $bcf15['tglsp'] ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" ><b>Masukan No BCF 1.5 <br/>(contoh : 005155,005156,005157)</b></font></td><td width="3">:</td>
                                <td colspan="8">
                                    <textarea  id="det_nobcf" rows="2" cols="30" name="det_nobcf" type="text"><?php echo $bcf15['det_nobcf']; ?></textarea> 
                                </td>
                                
                            </tr>
                            
                            
                            <tr>
                                <td  ><font color="#000" >TPP</font> </td><td width="3">:</td>
                                <td colspan="2"><select id="idtpp" name="idtpp">
                                          <option value="" selected>::Pilih TPP::</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idtpp]==$bcf15[idtpp]) {
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
                                <td  ><font color="#000" >Jumlah BCF 1.5</font> </td><td width="3">:</td>
                                <td colspan="2">
                                    <input id="jumlah_bcf15" name="jumlah_bcf15" type="text"  value="<?php echo $bcf15['jumlah_bcf15'] ?>" /> 
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" >Keterangan </font></td><td width="3">:</td>
                                <td colspan="8">
                                    <textarea  id="Keterangan" rows="2" cols="50" name="Keterangan" type="text"><?php echo $bcf15['Keterangan']; ?></textarea> 
                                </td>
                                
                            </tr>
                           
                            
                                   
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000000000000" />
                Pilih File PDF: <input name="userfile" type="file" />
                <input type="submit" value="Upload PDF" />
                <table>
                    <tr>
                        <td>Hasil Upload PDF</td>
                        <td>
                            <?php
                            $query  = "SELECT * FROM arsip_sp_detail where idarsip_sp_detail='$id'";
                            $hasil  = mysql_query($query);

                            while($data = mysql_fetch_array($hasil))
                            {
                               echo "<p><a href='arsip/sp/download.php?id=".$data['idarsip_sp_detail']."'>".$data['name']."</a> (".$data['size']." bytes) [ <a href='arsip/sp/sp_delete.php?id=".$data['idarsip_sp_detail']."'>Delete</a> ]</p>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="?hal=page_arsip&pilih=input_sp"><input type="button" value="Rekam Lagi" /></a></td>
                    </tr>
                </table>
            </form>


        </div>
        
        
	
                

</body>
</html>
<?php
};
?>