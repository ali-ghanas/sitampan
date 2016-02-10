<?php include("aktifitaspengguna.inc.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title><?php funjadul(); ?></title>
</head>
<body>
<?php funbodyopen(); ?>


<?php include($deflink."inc/header.php"); ?>


<tr><td><div id="divmain">

<?php include("aktifitaspengguna_tabel.php"); ?>

</div></td></tr>

<?php funbodyclose(); ?>
</body>
</html>