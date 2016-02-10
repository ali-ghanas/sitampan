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
  
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>

        <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
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
              $("#suratmasukdetail").submit(function() {
                 if ($.trim($("#txtsuratbalasan").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No Surat Balasan tidak boleh kosong (jika memang kosong beri tanda minus '-') ");
                    $("#txtsuratbalasan").focus();
                    return false;  
                 }
                 if ($.trim($("#perihal").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Wajib diisi (jika memang kosong beri tanda minus '-') ");
                    $("#perihal").focus();
                    return false;  
                 }
                 if ($.trim($("#keterangan").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Wajib diisi (jika memang kosong beri tanda minus '-') ");
                    $("#keterangan").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbstatussurat").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Wajib di pilih untuk proses selanjutnya ");
                    $("#cmbstatussurat").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 

</head>

<body>
<?php // aksi untuk edit
 session_start();

if(isset($_POST['addsubmit2'])) // jika tombol editsubmit ditekan
	{       
                $txtsuratbalasan=$_POST['txtsuratbalasan'];
                $tanggal=$_POST['tanggal'];
                $perihal=$_POST['perihal'];
                $keterangan=$_POST['keterangan'];
                $cmbstatussurat=$_POST['cmbstatussurat'];
                $txtnoagenda=$_POST['txtnoagenda'];
                $tglagenda=$_POST['tglagenda'];
                $nosurat=$_POST['nosurat'];
               
                $asalsurat=$_POST['asalsurat'];
                $tahun = $_POST['tahun'];
                
                $now=date('Y-m-d');
                
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE suratmasuk SET
							
                                        status='$cmbstatussurat'               
					WHERE idsuratmasuk='$id'");
                
                if ($edit) {
                        mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,noagenda,tanggalagenda,nosurat,hal,asalsurat,nama_user,nip_user,tahun,keterangan)VALUES('Proses Surat','$now','$txtnoagenda','$txttglagenda','$txtsuratbalasan','$perihal','re : $txtasalsurat','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$tahun','$keterangan')");
                    
                    
			// Konfirmasi Sukses
			echo '<script type="text/javascript">window.location="index.php?hal=suratmasukumum&act=1"</script>';
                
                             
                }
		
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM suratmasuk WHERE idsuratmasuk=$id "; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="suratmasukdetail" name="suratmasukdetail" action="?hal=suratmasukdetail">
        <input type="hidden" name="id" value="<?php echo  $data['idsuratmasuk']; ?>" />
        <input type="hidden" name="txtnoagenda" value="<?php echo  $data['noagenda']; ?>" />
        <input type="hidden" name="txttglagenda" value="<?php echo  $data['tglagenda']; ?>" />
        <input type="hidden" name="txtnosurat" value="<?php echo  $data['nosurat']; ?>" />
        <input type="hidden" name="txtperihal" value="<?php echo  $data['perihal']; ?>" />
        <input type="hidden" name="txtasalsurat" value="<?php echo  $data['asalsurat']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo  $data['tahun']; ?>" />
        <table width="100%" border="0" bgcolor="#ddd2ee" align="" cellpadding="1" cellspacing="3">
                <tr align="center"> 
                        <td height="22" colspan="3" bgcolor="#84B9D5" class="HEAD"><b>Modul Update Surat</b> </td>
                </tr>

                
                <tr>
                    <td  align="right" >Seksi </td><td>:</td>
                    <td>    <?php if ($data["seksipenimbunan"]=='1'){echo  "Seksi Penimbunan PPC II";} else {echo "Seksi Penimbunan PPC III";} ?></td>
                </tr>

                <tr> 

                    <td  align="right">No Agenda Kabid</td><td>:</td>
                    <td ><?php echo  $data['noagenda']; ?> / <?php echo $data['tglagenda']; ?></td>
                       
                </tr>
                <tr>
                    <td  align="right">No Surat Masuk </td><td>:</td>
                    <td ><?php echo $data['nosurat']; ?> / <?php echo $data['tanggalsurat']; ?> </td>
                        
                </tr>

                <tr>
                    <td align="right">Asal Surat </td><td>:</td>
                    <td ><?php echo $data['asalsurat']; ?></td>
                </tr>
                <tr>
                    <td  align="right">Perihal</td><td>:</td>
                    <td ><?php echo $data['perihal']; ?> </td>
                </tr>
                <tr>
                        <td  align="right">Disposisi Surat </td><td>:</td>
                        <td  ><select disabled class="required" id="cmbdisposisi" name="cmbdisposisi" >
                            <option value = "<?php echo $_POST['cmbdisposisi']; ?>" >--Pilih Disposisi Surat--</option>
                            <?php
                                $sql = "SELECT * FROM disposisi ORDER BY iddisposisi";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data1 =mysql_fetch_array($qry)) {
                                        if ($data1[iddisposisi]==$data[iddisposisi]) {
                                            $cek="selected";
                                            }
                                       else {
                                            $cek="";
                                            }
                                            echo "<option value='$data1[iddisposisi]' $cek>$data1[nm_disposisi]</option>";
                                        }
                            ?>
                        </select></td>
                </tr>
                
                
                
        </table><br>
        <table cellspacing="3" cellpadding="3">
                    <tr>
                        <th class="judultabel" >No Surat</th>
                       
                        <th class="judultabel">Perihal</th>
                        <th class="judultabel">Keterangan</th>
                    </tr>
                        <?php
                            $rowset = mysql_query("select * from historybcf15 where noagenda=$data[noagenda] and tahun=$data[tahun]");
                             while($data1 = mysql_fetch_array($rowset)){
                                 
                                 if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
			echo "<tr class=highlight1>";
			$j++;
			}
	else
			{
			echo "<tr class=highlight2>";
			$j--;
			}
                                 
                         
                        ?>
                    <tr>
                        <td class="isitabel"><?php echo $data1['nosurat'];?></td>
                        
                        <td class="isitabel"><?php echo $data1['hal'];?></td>
                        <td class="isitabel"><?php if ($data1['keterangan']=='') {echo $data1[namaaksi];  echo $data1[nama_user]; }  else {echo $data1[keterangan]; echo $data1[nama_user];} ?></td>
                        
                    </tr>
                    <?php };?>
        </table><br></br>
        <table border="0" width="100%" cellpadding="0" cellspacing="3" >
            
            <tr>
                <th class="judultabel" >No Surat (balasan)</th>
                <th class="judultabel">Tgl Surat</th>
                <th class="judultabel">Perihal</th>
                <th class="judultabel">Keterangan</th>
                <th class="judultabel" >Status Surat</th>
            </tr>
            <tr>
                <td  >
                    <input class="required" type="text" name="txtsurat" id="txtsuratbalasan" ></input>
                </td>
                <td >
                    <input class="required" type="text" value="" name="tanggal" id="tanggal"></input>
                </td>
                <td >
                    <input class="required" type="text" size="30" name="perihal" id="perihal"></input>
                </td>
                <td >
                    <input class="required" type="text" size="30" name="keterangan" id="keterangan"></input>
                </td>
                <td>
                    <select class="required" name="cmbstatussurat" id="cmbstatussurat"><option value="">:..Status Surat..:</option>
                            <option value="proses">Menunggu Konfirmasi</option>
                            <option value="selesai">Arsipkan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="5"><input type="submit" class="button putih bigrounded " value="Input" name="addsubmit2"></input></td>
            </tr>
        </table>
        
        
        </form>



	<?php
        
        
        }; // penutup else
?>

</body>
</html>
<?php
};
?>