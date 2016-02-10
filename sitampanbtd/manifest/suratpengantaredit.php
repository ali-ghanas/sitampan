<?php
include "lib/koneksi.php";
include "lib/function.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}

 elseif($_SESSION['level']=="tpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="seksitpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="p2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
else
{
  
?>
<html>
    <head>
    <title>Ubah BCF 15</title>
    
       
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script> 
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#spedit").submit(function() {
                 if ($.trim($("#sp").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nomor Surat Pengantar Tidak Boleh Kosong");
                    $("#sp").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggalsp").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
    
    </head>
    <body>
        
          


<?php // aksi untuk edit
session_start();


if(isset($_POST['editsubmit3'])) // jika tombol editsubmit ditekan
	{
                $tahun= $_POST['tahun']; 
                $bcf15no=$_POST['bcf15no'];
		$sp = $_POST['sp']; 
                $tanggalsp = $_POST['tanggalsp'];
                
               
                $id = $_POST['id'];
                $tglkini=date('Y-m-d');
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
							suratpengantarno=$sp,
                                                        suratpengantartgl=$tanggalsp
                                                        
                                                        
                                                        	WHERE idbcf15='$id'");
                mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('Edit Surat Pengantar','$tglkini','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
                
                    echo '<script type="text/javascript">window.location="index.php?hal=pagemanifest&pilih=editsp"</script>';
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        ?>
<div id="kotakdetail">
	
        <form method="post" id="spedit" name="spedit" action="?hal=pagemanifest&pilih=editspproses">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo  $bcf15['tahun']; ?>" />
         <input type="hidden" name="bcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
              
            <tr>
                <td class="judulform" width="150">No Surat Pengantar </td><td class="judulform">:</td>
                <td class="isitabel"><input class="required" id="sp" name="sp" type="text" value="<?php echo $bcf15['suratpengantarno']; ?>" size="10" /> / <input class="required" name="tanggalsp" id="tanggalsp" type="text" value="<?php echo $bcf15['suratpengantartgl']; ?>" size="10" /></td>
            </tr>
            
            <tr>
                <td class="judulform" width="150">No BCF 1.5 </td><td class="judulform">:</td>
                <td class="isitabel"><?php echo $bcf15['bcf15no']; ?> / <?php echo tglindo($bcf15['bcf15tgl']); ?></td>
            </tr>
            <tr>
                <td class="judulform" width="150">TPP </td><td class="judulform">:</td>
                <td class="isitabel"><?php echo $bcf15['nm_tpp']; ?> </td>
            </tr>
            <tr>
                <td class="judulform" width="150">TPS </td><td class="judulform">:</td>
                <td class="isitabel"><?php echo $bcf15['idtps']; ?> </td>
            </tr>
            
            <tr><td colspan="3"><input type="submit" name="editsubmit3" value="Save" class="button putih bigrounded " /></td></tr>

           
            </table>
        </form>
</div>   
	<?php
//        if
//                    (strlen(bcf15no)<6){
//                    echo '<script type="text/javascript">
//                    alert("NIP harus diisi 6 digit");</script>';
//                }
        
        }; // penutup else
?>
      </div>
        </div>
</body>
</html>
<?php
};
?>