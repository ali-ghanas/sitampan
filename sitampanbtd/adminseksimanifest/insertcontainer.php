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
  
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#addcont").submit(function() {
                 if ($.trim($("#nocontainer").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Container tidak boleh kosong");
                    $("#nocontainer").focus();
                    return false;  
                 }
                
                 
              });      
           });
        </script> 

</head>

<body>
    
   

    <?php 
    session_start();
    require_once "lib/tanggal.php";
    include "lib/function.php";
    
        $id = $_GET['id']; // menangkap id
        $sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        $now=date('Y-m-d');
     
    ?>

<form method="post" id="addcont" name="addcont" action="?hal=pagebcf15&pilih=insert_cont">
    <input type="hidden" name="id" value="<?php echo  $data['idcontainer']; ?>" />
    <input type="hidden" name="idbcf15" value="<?php echo  $data['idbcf15']; ?> "/>
    <input type="hidden" name="bcf15no" value="<?php echo  $data['bcf15no']; ?> "/>
    <input type="hidden" name="tahun" value="<?php echo  $data['tahun']; ?> "/>
    <table width="100%" border="0" >
        <tr>
            <td width="150">Nomor BCF 1.5</td><td width="5">:</td><td><?php echo $data['bcf15no']; ?> tanggal <?php echo tglindo($data['bcf15tgl']); ?> </td>
        </tr>
        <tr>
            <td >BC 1.1</td><td >:</td><td><?php echo $data['bc11no']; ?> tanggal <?php echo tglindo($data['bc11tgl']); ?> pos <?php echo $data['bc11pos']; ?></td>
        </tr>
        
    
    </table>
    <table width="50%" border="0"  cellpadding="2" cellspacing="2">
    
    
    <tr>
        <th class="judultabel">Nomor</th>
        <th class="judultabel">Ukuran </th>
    </tr>
    
    <tr> 
            
            <td witdh="30"><input class="required" id="nocontainer" name="nocontainer" type="text" size="30" value="" /></td>
            <td width="50"><input class="required" id="idsize" name="idsize" type="text" size="10"  value="" /></td>
            
    </tr>
    
    
        
    
    <tr>
            
            <td colspan="2"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"  onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"  /></td>
    </tr>

  </table>
</form>



<?php 



$bcf15no = $_POST['bcf15no']; 
$tahun = $_POST['tahun']; 
$nocontainer = $_POST['nocontainer']; 
$idsize = $_POST['idsize'];
$idbcf15 = $_POST['idbcf15']; 
$id = $_POST['idcontainer']; 

$now=date('Y-m-d');


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
               
		
		$cont=mysql_query("INSERT INTO bcfcontainer
                        (
                        tahun,
                        bcf15no,
                        nocontainer,
                        idsize,
                        idbcf15
                        
                        
                        )
                        
		VALUES(
                        '$tahun',
                        '$bcf15no', 
                        '$nocontainer', 
                        '$idsize',
                        '$idbcf15'
                        
                        )");
                        
            
                        
               if($cont){
                
               echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15&pilih=editbcf15&id=$idbcf15'</script>";
               }
               else{
                   echo "belum berhasil";
               }
	}; // if(kondisi) {hasil};
         
?>
      
</body>
</html>
<?php
};
?>