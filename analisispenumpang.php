<?php include("analisispenumpang.inc.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title><?php funjadul(); ?></title>
<script language="javascript">
function funcekhide(namea,nameb) {
	var ceklist=document.getElementById(namea);
	var hiddentext=document.getElementById(nameb);
	if (ceklist.checked==true) { hiddentext.value=ceklist.value; }
	else { hiddentext.value=null; }
}
</script>
</head>
<body>
<?php funbodyopen(); ?>


<?php include($deflink."inc/header.php"); ?>


<tr><td><div id="divmain">

<?php include("analisispenumpang_tabel.php"); ?>

</div></td></tr>

<?php funbodyclose(); ?>
</body>
</html>