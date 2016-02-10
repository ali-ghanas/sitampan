<?php
include "lib/koneksi.php";
include 'lib/function.php';
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title></title>
<!--        <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />-->
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <link type="text/css" rel="stylesheet" href="themes/main.css" />
</head>
    <script type="text/javascript">
           $(document).ready(function() {    
              $("#cont").submit(function() {
                 if ($.trim($("#txtbcfcontno").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Kontainer Wajib di isi, Jika LCL isikan dengan LCL (ukuran dikosongkan)");
                    $("#txtbcfcontno").focus();
                    return false;  
                 }
                 if ($.trim($("#txtbcfcontsegel").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Segel COntainer wajib di isi (setidaknya memuat keterangan segel ex : segel rusak, segel tdk ada)");
                    $("#txtbcfcontsegel").focus();
                    return false;  
                 }
                 
                 });      
           });
        </script>
<body>
    
   
          
<?php
session_start();
    $idpegawai = $_POST['idpegawai']; 
    $id = $_POST['id'];
    
                
  
  
    
    if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                
               $sql = "SELECT idpegawai,idndlembur FROM ndlembur_detail where idpegawai='$idpegawai' and idndlembur='$id' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Pegawai tsb sudah ada di Nota dinas");</script>';
                    
                }
                
                
                else
                {
		
		$edit=mysql_query("INSERT INTO ndlembur_detail(
                        idpegawai,
                        idndlembur
                        )
                        
		VALUES(
                        '$idpegawai',
                        '$id'
                        
                        )");}
                        
            
                        
               $_SESSION['logged']=time();
                

		if($edit) {echo "Input berhasil";
                
                
               echo "<script type='text/javascript'>window.location='index.php?hal=indet_lembur&id=$id'</script>";
                }
                else {
                    echo "Tidak berhasil";
                
                
               echo "<script type='text/javascript'>window.location='index.php?hal=indet_lembur&id=$id'</script>";
                }
                
	}
        else{



	$id = $_GET['id']; 
        
        //// menangkap id
	$sql = "SELECT * FROM ndlembur WHERE  idndlembur=$id "; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        

?>
    <div id="kotakinput">
<table width="50%" border="0" align="center" cellpadding="0" cellspacing="2">
  
  <tr align="center"> 
        <td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>NOTA DINAS LEMBUR</b></td>
  </tr>
  <tr> 
      <td class="isitabel" width="50">Nomor </td><td class="isitabel" width="1">:</td>
        <td  class="isitabel"><a href="?hal=cet_lembur&id=<?php echo $bcf15['idndlembur']; ?>"><? echo $bcf15['nond']; ?></a></td>
        
        
  </tr>
  <tr>
      <td class="isitabel" >Tanggal</td><td class="isitabel" width="1">:</td>
        <td class="isitabel" ><? echo tglindo($bcf15['tglnd']); ?></td>
  </tr>
    <tr>
      <td class="isitabel" >Tgl Lembur</td><td class="isitabel" width="1">:</td>
        <td class="isitabel" ><? echo tglindo($bcf15['waktu_lembur']); ?></td>
  </tr>
 
  
    
</table><br/>
<table width="100%" align="center" class="isitabel" bgcolor="#fff">
        <tr>
            
            <th class="judultabel">Nama </th>
            <th class="judultabel">NIP</th>
            <th class="judultabel">Gol.</th>
            <th class="judultabel">Tempat Tugas</th>
            
            <th class="judultabel">Del</th>
        </tr>
        <?php
        $sql = "SELECT * FROM pegawai,ndlembur_detail where pegawai.idpegawai=ndlembur_detail.idpegawai and idndlembur='$bcf15[idndlembur]'  "; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	while($data = mysql_fetch_array($query)){
            

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
                    
                    <td  class="isitabel"><?php echo  $data['nm_pegawai']; ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['nip_baru']; ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['golongan']; ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['tempat_tugas']; ?> </td>
                                        
                    <td align="center" class="isitabel"><a href="?hal=deldet_lembur&id=<?php echo $data[idndlembur_detail] ?>&idlembur=<?php echo $data[idndlembur] ?>" ><img src="images/new/delete.png" onclick="javascript:return confirm('Anda Yakin Hapus Data Penting ini? ?')"/></a></td>
                    </tr>
                    
                    <?php
                    
                  ;
                    };
                    ?>
       
    </table>
    </div>
   <?php
        $sql = "SELECT * FROM ndlembur WHERE  idndlembur=$id "; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
   ?>
<form method="post" id="addbcf15" name="addbcf15" action="?hal=indet_lembur">
<table width="100%" border="0" align="left" cellpadding="2" cellspacing="2">
   <input type="hidden" name="id" value="<?php echo  $bcf15['idndlembur']; ?>" /> 
    
       
    <tr> 
        <td  align="left" width="100">Input Pegawai </td><td>:</td>
            <td >
            
            <select class="required" id="idpegawai" name="idpegawai" >
                <option value = "" >::Pilih Pegawai::</option>
                <?php
                    $sql = "SELECT * FROM pegawai ORDER BY idpegawai";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data =mysql_fetch_array($qry)) {
                            if ($data[idpegawai]==$_POST['idpegawai']) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data[idpegawai]' $cek>$data[nm_pegawai]</option>";
                            }
		?>
            </select><a href="?hal=in_pegawaitpp">Pegawai Baru klik <img src="images/new/adduser.png"/></a>
            </td>
            
    </tr>
    <tr>
            <td></td>
            <td></td>
            <td><input class="button putih bigrounded " type="submit" name="addsubmit" value="Tambah Ke Nota Dinas"   /></td>
    </tr>
</table>
</form>
  
 
</body>

</html>
<?php
}
};
?>


  
  

      
  

