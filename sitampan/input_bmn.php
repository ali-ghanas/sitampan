<?php
include "../lib/koneksi.php";
include "../lib/function.php";
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
<script src="../lib/js/jquery-1.5.1.js"></script>

 <script type="text/javascript" src="../lib/js/jquery.maskedinput-1.3.min.js"></script>

<script type="text/javascript" src="../lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script> 
<link rel="stylesheet" type="text/css" href="../lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />
        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
              
               $('#tglkepbmn').mask('99/99/9999');
           });
         </script>    
        
        

</head>

<body>
<?php // aksi untuk edit
session_start();


	$id = $_GET['id']; // menangkap id
	$sql = "select idbcf15,bcf15no,bcf15tgl,bcf15.idtpp,SetujuBatalNo,SetujuBatalDate FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and setujubatal='1' and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunnow=date('Y');
        
        ?>
    
        
            <form enctype="multipart/form-data" action="?hal=input_bmn" method="POST">
                <input name="idbcf15" type="hidden" value="<?php echo $bcf15['idbcf15'] ?>" />
                
                    <h1>Rekam Skep Barang Milik Negara (BMN)</h1>
              
                
                        <table  border="0" bgcolor="#98badd">
                            <tr>
                               <td>Nomor Kep BMN</td><td>:</td><td><input  type="text" name="nokepbm" id="nokepbm" /><input type="text" name="kopbmn" id="kopbmn" value="/KPU.01/<?php echo "$tahunnow" ?>"/></td>
                            </tr>
                            
                            <tr>
                                <td>Tgl Kep BMN</td><td>:</td><td><input type="text" name="tglkepbmn" id="tglkepbmn" /></td>
                            </tr>
                            
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Simpan"   /></td>
                            </tr>     
                                   
                          
                        </table>
                        
        </form>
    
   
	<?php
        $nokepbm=$_POST['nokepbm'];
        $kopbmn=$_POST['kopbmn'];
        $tglkepbmnindo=$_POST['tglkepbmn'];
        $tglkepbmn=sql($tglkepbmnindo);
        
        $tahun_kep=substr($tglkepbmn,0,4);
        
        
        if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM bmn where (nokepbm='$nokepbm' and tahun_kep='$tahun_kep') ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Simpan gagal..BMN ini sudah ada di data base");</script>';
                   
                }
                
               
                
                else
                {
		
		mysql_query("INSERT INTO bmn(
                        nokepbm,
                        kopbmn, 
                        tglkepbmn, 
                        tahun_kep
                        )
                        
		VALUES(
                        '$nokepbm',
                        '$kopbmn', 
                        '$tglkepbmn', 
                        '$tahun_kep'
                        )");
                        
            
                        
               $_SESSION['logged']=time();
               
                
//               echo "<script type='text/javascript'>window.location='..bmn/index.php?hal=browsebmn</script>";
                $sqlbmn = "SELECT * FROM bmn where (nokepbm='$nokepbm' and tahun_kep='$tahun_kep') ";
                $querybmn = mysql_query($sqlbmn);
                $databmn=mysql_fetch_array($querybmn);
                $idbmn=$databmn['idbmn'];
                echo "<meta http-equiv='refresh' content='0; url=?hal=inputupload_brgbmn&id=$idbmn'>";
                }
	}; // if(kondisi) {hasil};
        }; // penutup else
?>

</body>
</html>
