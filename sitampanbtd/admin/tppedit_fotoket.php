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
        
        
        
        
</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['addsubmit'])) // jika tombol editsubmit ditekan
	{               
		$keterangan_gbr = $_POST['keterangan_gbr']; // variable nama = apa yang diinput pada name "nama" 
		
		
		$id = $_POST['idtppfoto'];
                $idtpp= $_POST['idtpp'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE tppfoto SET
                        
							keterangan_gbr='$keterangan_gbr'
							                     
							
                        
					WHERE idtppfoto='$id'");
                if($edit){
		echo "<script type='text/javascript'>window.location='index.php?hal=pageadmin&pilih=tppedit&id=$idtpp'</script>";
                }
                else {
                    echo "tidak berhasil di edit";
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM tppfoto WHERE idtppfoto=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>
        <div id="kotakinput">
        
            <form method="post" id="foto_ket" name="foto_ket"  action="?hal=pageadmin&pilih=tppedit_fotoket" >
                <input name="idtppfoto" type="hidden" value="<?php echo $data['idtppfoto'] ?>" />
                <input name="idtpp" type="hidden" value="<?php echo $data['idtpp'] ?>" />
                <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Tambah Keterangan Foto</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" border="0" bgcolor="#98badd">
                            <tr>
                                
                                <td colspan="4">
                                    <span><h3><?php echo $data['name'] ?></h3></span><br/>
                                    <span><img src="admin/fototpp/<?php echo $data['name'] ?>" width="250"/></span><br/>
                                    <textarea  id="keterangan_gbr" rows="2" cols="50" name="keterangan_gbr" type="text"><?php echo $data['keterangan_gbr']; ?></textarea> 
                                </td>
                                
                            </tr>
                            
                             <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Simpan"   /></td>
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