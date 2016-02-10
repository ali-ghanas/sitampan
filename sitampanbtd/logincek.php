
<?php
//if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
//    //redirect ke halaman login
//    header('location:login.php?hal=login');
//}


if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	echo "<b>[ Status : Belum Login ";
	echo "| User : tamu ] </b>";        echo "| User : tamu ] </b>";

      
       
}
else {
	echo "<b> Selamat Datang ";
	echo " ".$_SESSION['nm_lengkap']." ";
        echo "(".$_SESSION['level'].") </b>";
	
}
?>