
<?php error_reporting(0) ?>
<?php
session_start(); //memulai session
include "lib/koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username= antiinjection($_POST['username']);
$password= antiinjection($_POST['pass']);

//query untuk mendapatkan record username
$query="select * from user where username='$username' and status_user='aktif'";
$hasil=  mysql_query($query);
$data=  mysql_fetch_array($hasil);

$sql="Select * from userhak,userlevel where userhak.iduserlevel=userlevel.iduserlevel and iduser =$data[iduser] group by iduser";
$querylevel=mysql_query($sql);
$datalevel=  mysql_fetch_array($querylevel);
//cek kesesuain password
$pengacak = "AJWKXLAJSCLWLW";
if (md5($pengacak . md5($password) . $pengacak) == $data['password']) 
    
    {
    
    
    //menyimpan username dan password ke dalam session
    $_SESSION['level']=$datalevel['level'];
    $_SESSION['username']=$data['username'];
    $_SESSION['nm_lengkap']=$data['nm_lengkap'];
    $_SESSION['nip_baru']=$data['nip_baru'];
    $_SESSION['jabatan']=$data['jabatan'];
    $_SESSION['avatar']=$data['avatar'];
    $_SESSION['iduser']=$data['iduser'];
    $_SESSION['idtpp']=$data['idtpp'];
    $_SESSION['seksi']=$data['seksi'];
    $_SESSION['id']=$data['iduser'];
    $_SESSION['appadmin']=$data['admin'];
    $_SESSION['appoa']=$data['oa'];
    $_SESSION['appbtd']=$data['btd'];
    $_SESSION['appbdn']=$data['bdn'];
    $_SESSION['appbmn']=$data['bmn'];
    $_SESSION['insertbdn']=$data['insertbdn'];
    $_SESSION['updatebdn']=$data['updatebdn'];
    $_SESSION['deletebdn']=$data['deletebdn'];
    $_SESSION['uploadbdn']=$data['uploadbdn'];
    $_SESSION['viewbdn']=$data['viewbdn'];
    $_SESSION['logged']=time();
    $ip_user= $_SERVER['REMOTE_ADDR'];
    
   
    $jam = date("H:i:s");
    $tgl = date("Y-m-d");
    if($_SESSION['id'])
    { 
        $ses = $_SESSION['id']; //tell freichat the userid of the current user

        setcookie("freichat_user", "LOGGED_IN", time()+3600, "/"); // *do not change -> freichat code
    }
    else {
        $ses = 0; //tell freichat that the current user is a guest

        setcookie("freichat_user", null, time()+3600, "/"); // *do not change -> freichat code
    } 
  
    mysql_query("INSERT INTO log(username,
                                 tanggal,
                                 jamin,
                                 jamout,
                                 status,
                                 ip)
                           VALUES('$_SESSION[username]',
                                '$tgl',
                                '$jam',
                                'logged',
                                'online',
                                '$ip_user')");
//    mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,nama_user,nip_user,userdiupdate,nipuserdiupdate)VALUES('login','$tgl','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");

    
   
       echo '<script type="text/javascript">window.location="index.php"</script>';
  
}
else 
    echo "<table width=300 border=0 cellspacing=0 cellpadding=0 align=center>
            <tr>
              <td align='center' bgcolor='#FF0000'><div id='font-error'>Kesalahan</div></td>
            </tr>
            <tr>
              <td align='center'>Maaf..!!,silakan periksa kembali data yang anda inputkan, pastikan data yang anda masukkan benar.</td>
            </tr>
          </table>";
    echo '<script type="text/javascript">window.location="login.php"</script>';
     
?>


