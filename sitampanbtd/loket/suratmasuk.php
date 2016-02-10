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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
        <script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>
        
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
           $(document).ready(function(){
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               
           });
        </script>
         <script type="text/javascript">
           $(document).ready(function() {    
              $("#addsuratmasuk").submit(function() {
                  if ($.trim($("#cmbseksipenimbunan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Seksi Penimbunan Belum dipilih");
                    $("#cmbseksipenimbunan").focus();
                    return false;  
                 }
                 if ($.trim($("#txtnoagenda").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Agenda Kosong");
                    $("#txtnoagenda").focus();
                    return false;  
                 }
                 if ($.trim($("#txtnosurat").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Surat Kosong (jika harus kosng pake tanda minus (-))");
                    $("#txtnosurat").focus();
                    return false;  
                 }
                 if ($.trim($("#txtperihal").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Perihal Kosong");
                    $("#txtperihal").focus();
                    return false;  
                 }
                 if ($.trim($("#txtasalsurat").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Asal Surat kosong");
                    $("#txtasalsurat").focus();
                    return false;  
                 }
                 
                 
              });      
           });
        </script>
</head>

<body>
      
   
<form method="post" id="addsuratmasuk" name="addsuratmasuk" action="?hal=addsuratmasuk">
   
<table width="100%" border="0"  cellpadding="3" cellspacing="3">
    <tr align="center"> 
            <td height="22" colspan="5" bgcolor="#84B9D5" class="judulbreadcrumb"><b>Input Surat Masuk Ekstern</b> </td>
    </tr>
    <?php
                    $sqlag = "SELECT max(noagenda) as noagenda  FROM suratmasuk";
                    $qryag = @mysql_query($sqlag) or die ("Gagal query");
                    $data =mysql_fetch_array($qryag);
                    $noagendalast=$data['noagenda']+1;
                    $now=date('Y-m-d');
    ?>
    <tr> 
        
            <td  class="judulform">Agenda</td>
            <td ><input name="txtnoagenda" id="txtnoagenda" class="required" type="text" size="10" maxlength="6" value="<?php echo $noagendalast; ?>" />
            <input class="required" id="tanggal" type="text" name="txttglagenda" value="<?php echo $now; ?>" ></input></td>
    </tr>
    
    
    <tr>
            <td  class="judulform">Seksi </td>
            <td ><select class="required" id="cmbseksipenimbunan" name="cmbseksipenimbunan" >
                            <option value="">:.:Pilih Seksi Penimbunan:.:</option>
                            <option value="1">SEKSI PABEAN CUKAI III BID. PFPC II</option>
                </select></td>
    </tr>
    
    
    <tr>
            <td class="judulform">No Surat Masuk </td>
            <td ><input class="required" name="txtnosurat" id="txtnosurat" type="text" value="<?php echo $_POST['txtnosurat']; ?>" />
            <input class="required" id="tanggal1" name="txttanggalsurat" type="text" value="<?php echo $_POST['txttanggalsurat']; ?>" /></td>
    </tr>
    
    <tr>
            <td  class="judulform">Asal Surat :</td>
            <td  colspan="3"><input size="50" class="required" name="txtasalsurat" id="txtasalsurat" type="text"  value="<?php echo $_POST['txtasalsurat']; ?>" /></td>
    </tr>
    <tr>
            <td class="judulform">Hal :</td>
            <td  colspan="3"><input class="required" name="txtperihal" id="txtperihal" type="text" size="60" value="<?php echo $_POST['txtperihal']; ?>" /></td>
    </tr>
    <tr>
            <td  class="judulform">Disposisi Surat :</td>
            <td  colspan="3"><select class="required" id="cmbdisposisi" name="cmbdisposisi" >
                <option value = "<?php echo $_POST['cmbdisposisi']; ?>" >--Pilih Disposisi Surat--</option>
                <?php
                    $sql = "SELECT * FROM disposisi ORDER BY iddisposisi";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data =mysql_fetch_array($qry)) {
                            if ($data[iddisposisi]==$Datadisposisi) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data[iddisposisi]' $cek>$data[nm_disposisi]</option>";
                            }
		?>
            </select></td>
    </tr>
    
    <tr>
            <td><input  class="required" name="txtstatus" id="txtstatus" type="hidden" value="open"/></td>
            <td><input class="button putih bigrounded " type="submit" name="addsubmit1" value="Rekam" /></td>
    </tr>
    
    

  </table>
</form>
    

<?php 

if(isset($_POST['addsubmit1']))  {
$txtnoagenda = $_POST['txtnoagenda']; 
$txttglagenda = $_POST['txttglagenda'];
$txtnosurat = $_POST['txtnosurat'];
$txttanggalsurat = $_POST['txttanggalsurat'];
$txtperihal = $_POST['txtperihal'];
$txtasalsurat = $_POST['txtasalsurat'];
$cmbdisposisi = $_POST['cmbdisposisi'];
$check1_hgr = $_POST['check1_hgr'];
$check2_hgr = $_POST['check2_hgr'];
$check3_hgr = $_POST['check3_hgr'];
$check4_hgr = $_POST['check4_hgr'];
$check5_hgr = $_POST['check5_hgr'];
$check1_pem = $_POST['check1_pem'];
$check2_pem = $_POST['check2_pem'];
$check3_pem = $_POST['check3_pem'];
$check4_pem = $_POST['check4_pem'];
$txtattumum = $_POST['txtattumum'];
$txtstatus = $_POST['txtstatus'];
$jenissurat='umum';
$cmbseksipenimbunan = $_POST['cmbseksipenimbunan'];
$tahun=date('Y');
$now=date('Y-m-d');
            $sql = "SELECT * FROM suratmasuk where noagenda='$txtnoagenda' and nosurat='$txtnosurat'";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Agenda Surat Pernah di input");</script>';
                }
                
                else
                {
                            
               $oke = mysql_query("INSERT INTO suratmasuk(
                        noagenda, 
                        tglagenda, 
                        nosurat, 
                        tanggalsurat, 
                        perihal,
                        asalsurat,
                       iddisposisi,
                       atthagr_setujudilayani,
                       atthgr_attjumlahjenis,
                       atthgr_lap,
                       atthgr_koordp2,
                       atthgr_unpencacahan,
                       attpem_unpencacahan,
                       attpem_jumjen,
                       attpem_koordp2,
                       attpem_lap,
                       attumum,
                       status,
                       seksipenimbunan,
                       tahun,
                       jenissurat)
                        
		VALUES(
                        '$txtnoagenda', 
                        '$txttglagenda', 
                        '$txtnosurat', 
                        '$txttanggalsurat', 
                        '$txtperihal',
                        '$txtasalsurat',
                        '$cmbdisposisi',
                       '$check1_hgr',
                       '$check2_hgr',
                       '$check3_hgr',
                       '$check4_hgr',
                       '$check5_hgr',
                       '$check1_pem',
                       '$check2_pem',
                       '$check3_pem',
                       '$check4_pem',
                       '$txtattumum',
                       '$txtstatus',
                       '$cmbseksipenimbunan',
                       '$tahun',
                       '$jenissurat')");

       		if ($oke) {
                    
                    mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,noagenda,tanggalagenda,nosurat,hal,asalsurat,nama_user,nip_user,tahun)VALUES('Surat Masuk','$now','$txtnoagenda','$txttglagenda','$txtnosurat','$txtperihal','$txtasalsurat','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$tahun')");
                    
			// Konfirmasi Sukses
			echo '<script type="text/javascript">window.location="index.php?hal=suratmasukok&act=3"</script>';
                
                             
                }
	}
        }; // if(kondisi) {hasil};
         

?>
     
</body>
</html>
<?php
};
?>
