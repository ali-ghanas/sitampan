<?php include("tentangsahkapal.inc.php"); ?>
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

<!-- BEGINNING OF: DIVMAIN -->
<table border="0" cellpadding="0" cellspacing="0">
<tr>




<td width="250" valign="top" id="namtdrightpanel"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox250top($deflink); ?>
<?php funbox250midopen($deflink); ?>

<tr><td><div style="cursor:pointer;" onClick="funhiddenobj('divmainheader,divmaininfo');"><img src="<?php echo($deflink); ?>slices/fortentangsah.jpg"></div></td></tr>
<tr><td height="25" class="clabiggie"><?php echo($nambiggie[text]); ?></td></tr>
<tr><td width="222" height="1" align="center" class="clagreyline"></td></tr>

<?php funbox250midclose(); ?>
<?php funbox250bot($deflink); ?>
</table></td>




<td width="750" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox750lblopen($deflink); echo($nambiggie[text]); funbox750lblclose(); ?>
<?php funbox750midopen($deflink); ?>
<?php funrow(13); ?>

<tr>
<td width="14"></td><!-- BUFFER KIRI -->

<!-- BOF: ISI (BUFFER TENGAH) -->
<td><table border="0" cellpadding="0" cellspacing="0">



<!-- BOF: ROW 1: DATA -->
<tr><td><table cellpadding="0" cellspacing="0" border="0">
<tr>


<td><table cellpadding="0" cellspacing="0" border="0">
<tr><td><strong><?php funjadul(); ?>&nbsp;<?php echo($sahver); ?></strong></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><a href="http://senatara.net"><strong>&copy;2011 M. Iqbal Sembiring, ST &amp; M. Nazir Sembiring, SKom</strong></a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;M. Nazir Sembiring, SKom (muhnazir@yahoo.com) (021-93862571)</td></tr>
<tr><td>&nbsp;M. Iqbal Sembiring, ST (mui2k@yahoo.com) (0818-04393888)</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;Thanks to: Bagoes Maulana, SKom</td></tr>

<tr><td>&nbsp;</td></tr>

</table></td>


</tr>
</table></td></tr>
<!-- EOF: ROW 1: DATA -->


</table></td>
<!-- EOF: ISI (BUFFER TENGAH) -->



<td></td><!-- BUFFER KANAN -->
</tr>

<?php funrow(20); ?>


<?php funbox750midclose(); ?>
<?php funbox750bot($deflink); ?>




</table>
</td>





</tr>


</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

<!-- END OF: DIVMAIN -->

</div></td></tr>

<?php funbodyclose(); ?>
</body>
</html>