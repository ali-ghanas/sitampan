
<?php
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    //redirect ke halaman login
    header('location:login.php');
}


if (isset($_SESSION['username'])=="") {
	echo "<b>[ Status : Belum Login ";
	echo "| User : tamu ] </b>";
       
}
else {
	echo "<b> Selamat Datang ";
	echo " User : ".$_SESSION['username']." | ";
        echo "<b> Anda Login Sebagai ";
	echo " User : ".$_SESSION['level']." | ";
	echo " <a href=?hal=logout>Logout </a> </b>";	
}
?>