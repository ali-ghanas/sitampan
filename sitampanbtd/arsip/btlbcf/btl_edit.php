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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
     
        
        

</head>

<body>
<?php // aksi untuk edit
session_start();
if(isset($_POST['addsubmit'])) // jika tombol editsubmit ditekan
	{               
		$SetujuBatalNo = $_POST['SetujuBatalNo']; // variable nama = apa yang diinput pada name "nama" 
		$SetujuBatalDate = $_POST['SetujuBatalDate'];
                $bcf15no = $_POST['bcf15no'];
		$bcf15tgl = $_POST['bcf15tgl'];
                $tahun = $_POST['tahun'];
                $now=date('Y-m-d');		
		$id = $_POST['idbcf15'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE bcf15 SET
                        
							SetujuBatalNo='$SetujuBatalNo',
							SetujuBatalDate='$SetujuBatalDate'
						
                                                        
                        
							
                        
					WHERE idbcf15='$id'");
                if($edit){
                $_SESSION['logged']=time();
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Arsip Edit Surat Persetujuan','$now','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$SetujuBatalNo','$SetujuBatalDate')");
		echo "<script type='text/javascript'>window.location='index.php?hal=page_arsip&pilih=input_btl&id=$id'</script>";
                }
                else {
                    echo "tidak berhasil di edit";
                }
        }
        else 
	{ 

	$id = $_GET['id']; // menangkap id
	$sql = "select idbcf15,bcf15no,bcf15tgl,tahun,bcf15.idtpp,SetujuBatalNo,SetujuBatalDate FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and setujubatal='1' and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
    <div id="bingkai">
        
            <form enctype="multipart/form-data" action="?hal=page_arsip&pilih=edit_btl" method="POST">
                <input name="idbcf15" type="hidden" value="<?php echo $bcf15['idbcf15'] ?>" />
                <input name="bcf15no" type="hidden" value="<?php echo $bcf15['bcf15no'] ?>" />
                <input name="bcf15tgl" type="hidden" value="<?php echo $bcf15['bcf15tgl'] ?>" />
                <table width="100%">
                    <tr>
                        <td colspan="3">Edit Surat Persetujuan Pembatalan</td>
                    </tr>
                    <tr>
                        <td>BCF 15</td><td>:</td>
                        <td><?php  echo $bcf15['bcf15no']?> / Tanggal <?php  echo $bcf15['bcf15tgl']?></td>
                        
                    </tr>
                    <tr>
                        <td>No Persetujuan Pembatalan</td><td>:</td>
                        <td><input name="SetujuBatalNo" type="text" value="<?php echo $bcf15['SetujuBatalNo'] ?>" /></td>
                        
                    </tr>
                    <tr>
                        <td>Tanggal Persetujuan Pembatalan</td><td>:</td>
                        <td><input name="SetujuBatalDate" type="text" value="<?php echo $bcf15['SetujuBatalDate'] ?>" /></td>
                        
                    </tr>
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Edit"   /></td>
                            </tr>
                   
                </table>
        </form>
    </div>
	<?php
        
        
        };
};// penutup else
?>

</body>
</html>
