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


	$id = $_GET['id']; // menangkap id
	$sql = "select idbcf15,bcf15no,bcf15tgl,bcf15.idtpp,SetujuBatalNo,SetujuBatalDate FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and setujubatal='1' and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
    <div id="bingkai">
        
            <form enctype="multipart/form-data" action="arsip/btlbcf/uploadscanspproses.php" method="POST">
                <input name="idbcf15" type="hidden" value="<?php echo $bcf15['idbcf15'] ?>" />
                <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                    <h1>Form Upload Pembatalan BCF 1.5</h1>
                
                <tr >
                    <td>
                        <table  border="0" bgcolor="#98badd">
                            <tr>
                                <td>No BCF 1.5</td><td>:</td><td><?php echo $bcf15['bcf15no']?> / <?php echo tglindo($bcf15['bcf15tgl'])?></td>
                            </tr>
                            <tr>
                                <td>No Agenda Pembatalan(Surat Pembatalan)<td>:</td><td><?php echo $bcf15['SetujuBatalNo']?> / <?php echo tglindo($bcf15['SetujuBatalDate'])?></td>
                            </tr>
                            <tr>
                                <td colspan="3"><input type="hidden" name="MAX_FILE_SIZE" value="30000000000000" />
                                    Pilih File PDF: <input size="50" name="userfile" type="file" />
                                    
                            </tr>
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Upload"   /></td>
                            </tr>     
                                   
                            
                            <tr>
                                
                                <td colspan="3">
                                    <?php
                                    $query  = "SELECT * FROM arsip_btl_detail where idbcf15='$id'";
                                    $hasil  = mysql_query($query);

                                    while($data = mysql_fetch_array($hasil))
                                    {
                                       echo "<p><a href='arsip/btlbcf/download.php?id=".$data['idarsip_btl_detail']."'>".$data['name']."</a> (".$data['size']." bytes) [ <a href='arsip/btlbcf/btl_delete.php?id=".$data['idarsip_btl_detail']."'>Delete</a> ]</p>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><a href="?hal=page_arsip&pilih=browse_btl"><font color="#FFF" size="5">Upload Lagi</font></a></td>
                            </tr>
                   
                            
                        
                    </td>
                </tr>
                
                
                

              </table>
        </form>
    </div>
	<?php
        
        
        }; // penutup else
?>

</body>
</html>
