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
              $("#edit_pel").submit(function() {
                 if ($.trim($("#namapel").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Nama Agen Pengangkut Tak Boleh kosong");
                    $("#namapel").focus();
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
		$namapel = $_POST['namapel']; // variable nama = apa yang diinput pada name "nama" 
                $alamat = $_POST['alamat'];
                $kota = $_POST['kota'];
                $telp = $_POST['telp'];
                $faks = $_POST['faks'];
                $email = $_POST['email'];
                $now=date('Y-m-d');
		
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE pelayaran SET
							nm_pelayaran='$namapel',
							alamat_pelayaran='$alamat',
							
                                                        kota='$kota',
                                                        Telp='$telp',
                                                        Fax='$faks',
							email='$email'
                        
					WHERE idpelayaran='$id'");
                if($edit){
		echo '<script type="text/javascript">window.location="index.php?hal=daf_pelayaran"</script>';
                }
                else {
                    echo "tidak berhasil di edit";
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM pelayaran WHERE idpelayaran=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="edit_pel" name="edit_pel" action="?hal=edit_pelayaran">
        <input type="hidden" name="id" value="<?php echo  $data['idpelayaran']; ?>" />
            <div><table border="0" width="80%">
    <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>EDIT AGEN PENGANGKUT</b> </td>
    </tr>
    
    
    <tr><td>Nama Pelayaran *)</td><td>:</td><td> <input size="40" class="required" id="namapel" name="namapel" type="text" value="<?php echo $data['nm_pelayaran'] ?>" /></td></tr>
    <tr><td>Alamat Alamat Pelayaran </td><td>:</td><td> <textarea rows="2" cols="30" class="required" id="alamat"  name="alamat" type="text" value="" ><?php echo $data['alamat_pelayaran'] ?></textarea></td></tr>
    <tr><td>Kota </td><td>:</td><td> <input size="15" class="required" id="kota" name="kota" type="text" value="<?php echo $data['kota'] ?>" /></td></tr>
    <tr><td>Telp </td><td>:</td><td> <input size="40" class="required" id="telp" name="telp" type="text" value="<?php echo $data['Telp'] ?>" /></td></tr>
    <tr><td>Faks </td><td>:</td><td> <input size="40" class="required" id="faks" name="faks" type="text" value="<?php echo $data['Fax'] ?>" /></td></tr>
    <tr><td>Email </td><td>:</td><td> <input size="40" class="required" id="faks" name="email" type="email" value="<?php echo $data['email'] ?>" /></td></tr>
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
    </tr>
    <tr><td colspan="4"><input class="button putih bigrounded " type="submit" name="editsubmit" value="Edit" /></td></tr>
</table></div>
        </form>
        
	<?php
        
        
        }; // penutup else
?>

</body>
</html>
<?php
};
?>