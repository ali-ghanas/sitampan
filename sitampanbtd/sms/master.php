<?php
session_start();
error_reporting(0);

if (empty($_SESSION[username]) AND empty($_SESSION[password])){
	echo "<link href='css/login.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<html>
<head>
	<title> SITAMPAN-SMS</title>
	<link rel="stylesheet" href="css/adminstyle.css" type="text/css">
        <link rel="stylesheet" href="../themes/main.css" type="text/css">
	<link rel="stylesheet" href="css/standar.css" type="text/css">
	<link type="text/css" href="js/development-bundle/themes/base/ui.all.css" rel="stylesheet" />   
        
    <script type="text/javascript" src="js/development-bundle/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="js/development-bundle/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/development-bundle/ui/ui.datepicker.js"></script>   
    <script type="text/javascript" src="js/development-bundle/ui/i18n/ui.datepicker-id.js"></script>
	
</head>
<body>
<table border="0" width="850" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center"><img src="../images/user.jpg" width="150" height="100"><img src="../images/new/sitampan.png" width="700" height="100"></td>
	</tr>
</table>
<?php
include "koneksi/koneksi.php";
$hitung = mysql_num_rows(mysql_query("SELECT * FROM inbox WHERE Processed = 'false'"));
if($hitung > 0){
	$hitung = "<b>$hitung</b>";
}
else{
	$hitung = "$hitung";
}
?>

<table align="center" width="850" cellpadding="0" cellspacing="0">
	<tr>
		<td width="170" bgcolor="#9fbad5" valign="top">
		<table class="data" align="left">
                    
			
					<tr><td class="judulform"> <a href=?module=home>&#187; Home </a> </td></tr>
					<tr><td class="judulform"> <a href=?module=compose>&#187; Tulis Pesan </a> </td></tr>
					<tr><td class="judulform"><a href=?module=inbox>&#187; Inbox (<?php echo "$hitung"; ?>)</a> </td></tr>
					<tr><td class="judulform"> <a href=?module=outbox>&#187; Outbox </a> </td></tr>
					<tr><td class="judulform"> <a href=?module=sentitems>&#187; Sentitems </a> </td></tr>
					<tr><td class="judulform"> <a href=?module=phonebook>&#187; Phonebook Manager </a> </td></tr>
					<tr><td class="judulform"> <a href=?module=laporan>&#187; Laporan </a> </td></tr>
					<tr><td class="judulform"> <a href='/../gammu/step6.php' target="_blank">&#187; Jalankan Services </a> </td></tr>
                                        <tr><td class="judulform"> <a href='/../gammu/step9.php' target="_blank">&#187; Stop Services </a> </td></tr>
                                        <tr><td class="judulform"> <a href=?module=services>&#187; Cek Services </a> </td></tr>
                                        <tr><td class="judulform"> <a href='../sms/services_cekpulsa.php'>&#187; Cek Pulsa </a> </td></tr>
                                        <tr><td class="judulform"> <a href='../sms/smsautoreply.php'>&#187; Cek Services Auto Reply Konfirmasi</a> </td></tr>
                                        <tr><td class="judulform"> <a href=../?hal=home>&#187; Back </a> </td></tr>
                
                </table>	
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		</td>
		<td width="20" bgcolor="#9fbad5"></td>
		<td width="640" bgcolor="#9fbad5" valign="top">
			<p>&nbsp;</p>
			<?php include "konten.php"; ?>
			<p>&nbsp;</p>
		</td>
		<td width="30" bgcolor="#9fbad5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4" align="center" bgcolor="#C0C0C0" height=50><font color="#333333" face=tahoma size=2>
			<font color="#2c6baa" face=tahoma size=2> Copyright &copy; 2013 SITAMPAN 2 </font>
		</td>
	</tr>
</table>
</body>
</html>
<?php
}
?>