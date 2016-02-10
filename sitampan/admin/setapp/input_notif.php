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
  
     
         <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.8.11.custom.css" />
        
	
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
              $("#inputgllibur").submit(function() {
                 if ($.trim($("#tanggal").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tanggal Tidak boleh kosong");
                    $("#tanggal").focus();
                    return false;  
                 }
                  if ($.trim($("#ketlibur").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan libur hari besar apa?");
                    $("#ketlibur").focus();
                    return false;  
                 }
                if ($.trim($("#lamanya").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Berapa lama liburnya?");
                    $("#lamanya").focus();
                    return false;  
                 }
              });      
           });
        </script> 

</head>

<body>


	
        <form method="post" id="input" name="input" action="?hal=settapp&pilih=input_notif">
        
            <table width="100%"  align="left" cellpadding="2"  cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td ><h3>POSTING PEMBERITAHUAN KE USER</h3></td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8" width="80%">
                            
                            <tr>
                                <td  class="isitabelnew">Tgl Mulai  Posting</td><td width="3">:</td>
                                <td >
                                     <input class="required" id="tanggal" placeholder="tgl awal posting" name="tglmulainotif" type="text"  value="<?php echo $_POST['tglmulainotif']; ?>" /> 
                                <small>Tanggal mulai diposting ke Aplikasi</small>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  class="isitabelnew">Tgl Akhir Posting</td><td width="3">:</td>
                                <td >
                                     <input class="required" placeholder="tgl akhir posting" id="tanggal1" name="tglakhirnotif" type="text"  value="<?php echo $_POST['tglakhirnotif']; ?>" /> 
                                <small>Tanggal berakhir posting pemberitahuan </small>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  class="isitabelnew"> Pesan untuk diposting </td><td width="3">:</td>
                                <td >
                                   <textarea class="textarea" name="notifikasiadmin" placeholder="isikan pesan anda disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $_POST['notifikasiadmin']; ?></textarea>                      
                                   
                                </td>
                                
                            </tr>
                            
                            <tr>

                                 <td colspan="3" align="center"><input class="btn btn-primary " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
    
   
    
    <?php 


                $tglmulainotif= $_POST['tglmulainotif']; 
		$tglakhirnotif = $_POST['tglakhirnotif']; 
                $notifikasiadmin = $_POST['notifikasiadmin'];
                $statusnotif='posting';
                $nip_admin=$_SESSION['nip_baru'];
                $nama_admin=$_SESSION['nm_lengkap'];
                $tglinput = date("Y-m-d H:i:s");
                


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                
		
		$input=mysql_query("INSERT INTO app_notifikasi
                        (nama_admin, nip_admin, tglmulainotif,tglakhirnotif,notifikasiadmin,statusnotif)
		VALUES('$nama_admin', '$nip_admin', '$tglmulainotif','$tglakhirnotif','$notifikasiadmin','$statusnotif')");
                        
              
             if($input)   {
               echo '<script type="text/javascript">window.location="index.php?hal=settapp&pilih=input_notif"</script>';
             }
             else {
                 echo "tidak dapat menyimpan";
             }
                
	}; // if(kondisi) {hasil};
         
?>
    <?php
                $sql = "SELECT * FROM app_notifikasi order by tglmulainotif desc";
                $query = mysql_query($sql);
                
    ?>
      <table class="table table-bordered">
          <tr>
              <th class="isitabel">No</th>
              <th class="isitabel">Pesan</th>
              <th class="isitabel">Tgl Mulai</th>
              <th class="isitabel">Tgl Akhir</th>
              <th class="isitabel">Admin</th>
              <th class="isitabel">Tanggal Rekam</th>
              <th class="isitabel">Status</th>
              <th class="isitabel">Hapus</th>
              
          </tr>
          <?php
          $awal='1';
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
            <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
            <td class="isitabel"><?php echo  $data['notifikasiadmin']; ?></td>
            <td class="isitabel"><?php echo tglindo($data['tglmulainotif']); ?></td>
            <td class="isitabel"><?php echo  tglindo($data['tglakhirnotif']); ?></td>
            <td class="isitabel"><?php echo  $data['nama_admin']; ?> / <?php echo  $data['nip_admin']; ?></td>
            <td class="isitabel"><?php echo  $data['tglrekam']; ?></td>
            <td class="isitabel"><?php echo  $data['statusnotif']; ?></td>
            <td align="center" class="isitabel"><a href="?hal=settapp&pilih=input_notif_del&id=<?php echo $data[idapp_notifikasi] ?>" class='btn btn-mini btn-warning' onclick="javascript:return confirm('Anda Yakin Hapus Data Penting ini? ?')"> <i class="icon-trash icon-white"></i><span><strong>Hapus</strong></a></td>
            <tr/>
            <?php }; ?>
      </table>
</body>
</html>
<?php

};
?>
        
	