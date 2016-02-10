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
               
               $('#tglsp').mask('99/99/9999');
               $('#nosp').mask('9999');
               $('#tanggal2').mask('99/99/9999');
           });
         </script>
    
    </head>
    <body>
       
        
	     
        <div id="kotakinput">
        <form method="post" id="arsipsp" name="arsipsp" action="?hal=page_arsip&pilih=input_sp">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="bcf15tgl" value="<?php echo  $bcf15['bcf15tgl']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo  $bcf15['tahun']; ?>" />
        
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
                                    <input id="nosp" name="nosp" type="text"  value="<?php echo $_POST['nosp'] ?>" /> / <input id="tglsp" name="tglsp" type="text"  value="<?php echo $_POST['tglsp'] ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" ><b>Masukan No BCF 1.5 <br/>(contoh : 005155,005156,005157)</b></font></td><td width="3">:</td>
                                <td colspan="8">
                                    <textarea  id="det_nobcf" rows="2" cols="30" name="det_nobcf" type="text"><?php echo $_post['det_nobcf']; ?></textarea> 
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
                                <td  ><font color="#000" >Jumlah BCF 1.5</font> </td><td width="3">:</td>
                                <td colspan="2">
                                    <input id="jumlah_bcf15" name="jumlah_bcf15" type="text"  value="<?php echo $_POST['jumlah_bcf15'] ?>" /> 
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" >Keterangan </font></td><td width="3">:</td>
                                <td colspan="8">
                                    <textarea  id="Keterangan" rows="2" cols="50" name="Keterangan" type="text"><?php echo $_POST['Keterangan']; ?></textarea> 
                                </td>
                                
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


                $nosp = $_POST['nosp']; 
                $tglsp = sql($_POST['tglsp']);
		$det_nobcf = $_POST['det_nobcf'];
		$Keterangan=$_POST['Keterangan'];
                $jumlah_bcf15=$_POST['jumlah_bcf15'];
                $tahun_sp=substr($tglsp,0,4);
                $bulan_sp=substr($tglsp,5,2);
                $idtpp=$_POST['idtpp'];
                $tglarsip=date('Y-m-d H:i:s');
                               
		$iduser = $_SESSION['iduser'];


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                
		
		$input=mysql_query("INSERT INTO arsip_sp_detail(
                                                        nosp,
							tglsp,
							det_nobcf,
							Keterangan,
                                                        idtpp,
                                                        tglarsip,
                                                        iduser,
                                                        jumlah_bcf15,
                                                        tahun_sp,
                                                        bulan_sp
                                                        
                                                        
                        ) value (
                                                        '$nosp',
							'$tglsp',
							'$det_nobcf',
							'$Keterangan',
                                                        '$idtpp',
                                                        '$tglarsip',
                                                        '$iduser',
                                                        '$jumlah_bcf15',
                                                        '$tahun_sp',
                                                        '$bulan_sp'
                        )");
                $sqlupload = "select * FROM arsip_sp_detail WHERE nosp=$nosp and tahun_sp='$tahun_sp' and bulan_sp='$bulan_sp'"; // memanggil data dengan id yang ditangkap tadi
                $queryupload = mysql_query($sqlupload);
                $bcf15upload = mysql_fetch_array($queryupload);
                
                 echo "<script type='text/javascript'>window.location='index.php?hal=page_arsip&pilih=upload_sp&id=$bcf15upload[idarsip_sp_detail]'</script>";
                        }
            
               
                

?>
      
                

</body>
</html>
<?php
};
?>