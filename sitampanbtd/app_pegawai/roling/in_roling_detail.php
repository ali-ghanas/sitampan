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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
      <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal_skep").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#in_arsip_det").submit(function() {
                 if ($.trim($("#noagenda").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Agenda Awal dari Skep BMN Tak Boleh kosong");
                    $("#noagenda").focus();
                    return false;  
                 }
                  if ($.trim($("#noskepbmn").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Skep BMN Tak Boleh kosong");
                    $("#noskepbmn").focus();
                    return false;  
                 }
                 if ($.trim($("#kantor_asal").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Kantor Asal Kep BMN Harus Dipilih dulu.");
                    $("#kantor_asal").focus();
                    return false;  
                 }
                 
                
              });      
           });
        </script> 

</head>

<body>
<?php // aksi untuk edit
session_start();
                $noagenda = $_POST['noagenda']; // variable nama = apa yang diinput pada name "nama" 
		$keterangan = $_POST['keterangan'];
		$idkantor_asal = $_POST['kantor_asal'];
		$tanggal_skep = $_POST['tanggal_skep'];
                $noskepbmn = $_POST['noskepbmn'];
                $iduser = $_SESSION['iduser'];
                $now=date('Y-m-d');
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
if(isset($_POST['editsubmit'])) // jika tombol editsubmit ditekan
	{               
		
		$sql = "SELECT * FROM arsip_rinci where noskepbmn='$noskepbmn' and noagenda='$noagenda' and  idkantor_asal='$idkantor_asal'";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Arsip Kep BMN ini Pernah di input Silahkan cari ke menu edit");</script>';
                    
                }
                
                                
                else
                {
		
		$input=mysql_query("INSERT INTO arsip_rinci(
                                                        idarsip,
							iduser,
							noskepbmn,
							tanggal_skep,
                                                        idkantor_asal,
                                                        keterangan,
                                                        noagenda,
                                                        tglinput
                                                        
                        ) value (
                                                        '$id',
							'$iduser',
							'$noskepbmn',
							'$tanggal_skep',
                                                        '$idkantor_asal',
                                                        '$keterangan',
                                                        '$noagenda',
                                                        '$now'
                        )");}
                        
            
                        
               
             if($input)   {
               echo "<script type='text/javascript'>window.location='index.php?hal=in_arsip_det&id=$id'</script>";
             }
             else {
                 echo "tidak dapat menyimpan";
             
        }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM ndroling WHERE idndroling=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="in_arsip_det" name="in_arsip_det" action="?hal=in_arsip_det">
        <input type="hidden" name="id" value="<?php echo  $data['idarsip']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Tambah Daftar  Pegawai yang diroling </td>
                </tr>
                
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            
                            <tr>
                                <td  >Tujuan ND</td><td width="3">:</td>
                                <td >
                                    <textarea class="required" disabled id="kepada" name="kepada" type="text"   ><?php echo $data['kepada']; ?></textarea> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Hal</td><td width="3">:</td>
                                <td >
                                    <textarea class="required" disabled id="hal_roling" name="hal_roling" type="text" size="3"  ><?php echo $data['hal_roling']; ?></textarea>
                                </td>
                                
                            </tr>
                            
                                      
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="isitabel" bgcolor="#f8f88f">
                            <tr>
                                <td>Nama Pegawai</td>
                                <td>:</td>
                                <td>
                                    <select class="required" id="kantor_asal" name="kantor_asal" >
                                        <option value = "" >--Kantor Asal--</option>
                                        <?php
                                            $sql = "SELECT * FROM pegawai ORDER BY idpegawai";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data1 =mysql_fetch_array($qry)) {
                                                    if ($data1[idpegawai]==$data[idpegawai]) {
                                                        $cek="selected";
                                                        }
                                                   else {
                                                        $cek="";
                                                        }
                                                        echo "<option value='$data1[idpegawai]' $cek>$data1[nm_pegawai]</option>";
                                                    }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lama</td>
                                <td>:</td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lama</td>
                                <td>:</td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>
                                    
                                </td>
                            </tr>
                            
                            
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="editsubmit" value="Rekam"   /></td>
                            </tr> 
                            
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print() {
                    window.open('arsip/cetak_batch.php?id=<?php echo  $data['idarsip']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=900,height=1300,left=50,top=50,titlebar=yes')
                    }
                    </script>
                    <input type="button" class="button putih bigrounded " value="Cetak Batch <?php echo $data[nobatch] ?>" onClick="popup_print()"/></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <th class="judultabel">No Urut</th>
                                <th class="judultabel">No Kep BMN</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Kantor Asal</th>
                                <th class="judultabel">Edit</th>
                                <th class="judultabel">Del</th>
                                
                            </tr>
                            <?php 
                            include "lib/function.php";
                            $dataSql = "SELECT *  FROM arsip_rinci,kantor_asal where arsip_rinci.idkantor_asal=kantor_asal.idkantor_asal and idarsip=$data[idarsip]";
                            $dataQry = mysql_query($dataSql)  or die ("Query arsip detail salah : ".mysql_error());
                            $nomor  = 0;
                            while ($data1 = mysql_fetch_array($dataQry)) {
                            $nomor++;
                            ?>
                            <tr>
                                <td class="isitabel"><?php echo $nomor; ?></td>
                                <td class="isitabel"><?php echo $data1['noskepbmn']; ?></td>
                                <td class="isitabel"><?php echo tglindo($data1['tanggal_skep']); ?></td>
                                <td class="isitabel"><?php echo $data1['nm_kantor']; ?></td>
                                <td class="isitabel"><a href="?hal=edit_arsip_det&id=<?php echo $data1['idarsip_rinci'] ?>"><img src="images/new/update.png" /></a></td>
                                <td class="isitabel"><a href="?hal=del_arsip_det&id=<?php echo $data1['idarsip_rinci'] ?>&idarsip=<?php echo $data1['idarsip'] ?>"><img src="images/new/delete.png" onclick="javascript:return confirm('Anda Yakin Hapus Data Penting ini? ?')"/></a></td>
                               
                            </tr>
                            <?php };?>
                        </table>
                    </td>
                </tr>
                
             </form>
	<?php
        
        
        }; // penutup else
?>

</body>
</html>
<?php
};
?>