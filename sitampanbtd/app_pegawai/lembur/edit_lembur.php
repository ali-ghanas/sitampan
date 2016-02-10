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
  
      
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tglnd").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#editcuti").submit(function() {
                 if ($.trim($("#nond").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Nota Dinas Roling  Tak Boleh kosong");
                    $("#nond").focus();
                    return false;  
                 }
                  if ($.trim($("#tglnd").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tanggal Nota Dinas  Tak Boleh kosong");
                    $("#tglnd").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit'])) // jika tombol editsubmit ditekan
	{               
		$nond = $_POST['nond']; // variable nama = apa yang diinput pada name "nama" 
		$tglnd = $_POST['tglnd'];
		
                $idseksi = $_POST['idseksi'];
                $waktu_lembur = $_POST['waktu_lembur'];
                
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE ndlembur SET
							nond='$nond',
							tglnd='$tglnd',
							
                                                        idseksi='$idseksi',
                                                        waktu_lembur='$waktu_lembur'
                                                        
                        
					WHERE idndlembur='$id'");
                if($edit){
		echo '<script type="text/javascript">window.location="index.php?hal=in_lembur"</script>';
                }
                else {
                    echo "tidak berhasil di edit";
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM ndlembur WHERE idndlembur=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="edit_roling" name="edit_roling" action="?hal=edit_lembur">
        <input type="hidden" name="id" value="<?php echo  $data['idndlembur']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Edit Nota Dinas Lembur</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            <tr>
                                <td  >No Nota Dinas</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nond" name="nond" type="text"  value="<?php echo $data['nond']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Tanggal Nota Dinas</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="tglnd" name="tglnd" type="text"  value="<?php echo $data['tglnd']; ?>" size="10" /> <img src="images/calendar.png" /> (<font color="red">yyyy-mm-dd</font>)
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Waktu Lembur </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="waktu_lembur" name="waktu_lembur" type="text"  value="<?php echo $data['waktu_lembur']; ?>"  size="10"/><img src="images/calendar.png" /> (<font color="red">yyyy-mm-dd</font>)
                                </td>
                            </tr>
                            <tr>
                                <td  >Penanda Tangan ND</td><td width="3">:</td>
                                <td >
                                    <select class="required" id="idseksi" name="idseksi" >
                                        <option value = "" >--Seksi--</option>
                                        <?php
                                            $sql = "SELECT * FROM seksi where status_seksi='aktif' and (kdseksi='tpp3' or kdseksi='tpp2') ORDER BY idseksi";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data1 =mysql_fetch_array($qry)) {
                                                    if ($data1[idseksi]==$data['idseksi']) {
                                                        $cek="selected";
                                                        }
                                                   else {
                                                        $cek="";
                                                        }
                                                        echo "<option value='$data1[idseksi]' $cek>$data1[plh] $data1[jabatan] $data1[nm_seksi] </option>";
                                                    }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="editsubmit" value="Edit"   /></td>
                            </tr>           
                        </table>
                    </td>
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