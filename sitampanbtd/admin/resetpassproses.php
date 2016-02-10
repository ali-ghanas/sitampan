
 <?php
   
 
session_start(); //memulai session
include "lib/koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
 
        
        $passwordlama= antiinjection($_POST['oldPass']);
        $passwordbaru1= antiinjection($_POST['newPass1']);
        $passwordbaru2= antiinjection($_POST['newPass2']);
        $username=$_SESSION['username'];
        $nip=$_SESSION['nip_baru'];
       
        

        

        // cek benar tidaknya password yang lama

        $query="select * from user where username='$username' and status_user='aktif'";
        $hasil=  mysql_query($query);
        $data=  mysql_fetch_array($hasil);
        $tglkini=date('Y-m-d');

//cek kesesuain password
        $pengacak = "AJWKXLAJSCLWLW";
        $passwordbaruenkrip = md5($pengacak . md5($passwordbaru1) . $pengacak );

                $query = "UPDATE user SET password = '$passwordbaruenkrip' WHERE username = '$username' and nip_baru='$nip' ";
                $hasil = mysql_query($query);
                
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,nama_user,nip_user,userdiupdate,nipuserdiupdate)VALUES('updatepassword','$tglkini','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
                if ($hasil) 
                echo "<div><img  src='images/new/warning.png'/> <font color='blue' size='4'>Reset Password Sukses</font></div> ";
              
                echo '<script type="text/javascript">window.location="index.php?hal=home"</script>';
        
       
?>