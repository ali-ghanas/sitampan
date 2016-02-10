<?php 
// Cek IP address apakah user menggunakan IP forward atau direct
if (getenv(HTTP_X_FORWARDED_FOR)){ 
	$IPaddr = getenv(HTTP_X_FORWARDED_FOR); 
	$ipVIAss = getenv(REMOTE_ADDR); 
} 
else { 
	$IPaddr = getenv(REMOTE_ADDR); 
} 

// Bagian ini adalah fungsi untuk mendapatkan Hostname resolve dari Ipaddress
function hostname($hostname) { 
	global $yourhost; 
	$yourhost = gethostbyaddr($hostname); 
} 

hostname($IPaddr); 

// Cek apakah Ipaddress merupakan IP forward, jika ya IP aslinya (diforward lewat mana)
if ($ipVIAss) { 
	$viasProxy = "via $ipVIAss<br>" . getenv(HTTP_COMING_FROM) ."<br>"; 
} 

// Cek apakah nilai hostname (IP resolve) dipenuhi atau tidak
if (!$yourhost) { 
	$yourhost = "unknown"; 
} 

// Bagian ini untuk mendapatkan informasi UserAgent
$pageagent = $_SERVER["HTTP_USER_AGENT"]; 

$pageagent = str_replace("(","",$pageagent); 
$pageagent = str_replace(")","",$pageagent); 

// Pisahkan Browser dan operasi sistem
list($mozila,$bws,$osname,$dig) = explode(";",$pageagent); 
$bws	= trim($bws); 
$osname	= trim($osname); 
$osname	= strval($osname); 
if (eregi("Windows NT 5.1",$osname)) { 
	$osname = "Microsoft Windows XP"; 
} 
if (eregi("Windows NT 5.0",$osname)) { 
	$osname = "Microsoft Windows 2000"; 
} 
if (eregi("Windows NT 5.2",$osname)) { 
	$osname = "Microsoft Windows 2003"; 
} 
if (eregi("Win 9x",$osname)) { 
	$osname = "Microsoft Windows ME"; 
} 
if (eregi("Windows 98",$osname)) { 
	$osname = "Microsoft Windows 98"; 
} 

// Simpan hasil
echo " 
	IP Address <b>$IPaddr</b> resolve <b>$yourhost</b> <br>
	<b>$viasProxy</b> Browser <b>$bws</b> ($mozila) OS <b>$osname</b> <br>
	"; 

// User Aget PHP Version 
echo $_SERVER["HTTP_USER_AGENT"]; 
?>