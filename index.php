<?php include("dependencies.php"); ?>
<?php
switch ($error) {
	case 1: $pesanpesan=$statusstart[32]; break;
	case 2: $pesanpesan=$statusstart[31]; break;
	case 3: $pesanpesan=$statusstart[33]; break;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title><?php funjadul(); ?></title>
</head>
<body>
<?php funbodyopen(); ?>

<tr><td><div id="divmain">
<form method="post" action="beranda.php" autocomplete="off">
<table border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td height="150"></td></tr>
<?php funbox500lblopen($deflink); ?>Masukkan ID dan Kata Sandi anda...
<?php funbox500lblclose(); ?>
<?php funbox500midopen($deflink); ?>
<?php funrow(13); ?>


<tr>
<td width="14"></td><!-- BUFFER KIRI -->

<!-- BOF: ISI (BUFFER TENGAH) -->
<td><table border="0" cellpadding="0" cellspacing="0">


<!-- BOF: ROW 1 -->
<tr><td><table cellpadding="0" cellspacing="0" border="0">
<tr>

<td><table cellpadding="0" cellspacing="0" border="0" class="clainputan">
	<tr>
		<td width="100">ID Pengguna:&nbsp;</td>
		<td><input type="text" style="width:150px;" maxlength="19" name="namtextloginpenggunaid" id="namtextloginpenggunaid"></td>
	</tr>
	<script language="javascript" type="text/javascript">document.getElementById('namtextloginpenggunaid').focus();</script>
	<tr>
		<td>Kata Sandi:&nbsp;</td>
		<td><input type="password" style="width:150px;" maxlength="32" name="namtextloginpenggunasandi" id="namtextloginpenggunasandi"></td>
	</tr>
</table></td>

</tr>
</table></td></tr>
<!-- EOF: ROW 1 -->


</table></td>
<!-- EOF: ISI (BUFFER TENGAH) -->


<td></td><!-- BUFFER KANAN -->
</tr>


<?php funrow(13); ?>

<!-- BOF: PANEL SUBMIT -->
<tr><td colspan="3"><table cellpadding="0" cellspacing="0" border="0" class="clasoftback">
<tr><td width="472" height="1" align="center" class="clagreyline"></td></tr>
<tr><td height="7"></td></tr>

<tr><td><table cellpadding="0" cellspacing="0" border="0"><tr>
<td width="50" align="center">
</td>
<td width="388" align="center" class="clabuttbig">
<button type="submit" name="namsubmitloginmasuk" id="namsubmitloginmasuk" value="masuk"><strong>Masuk</strong></button>
&nbsp;
<button type="reset" name="namsubmitloginreset" id="namsubmitloginreset">Ulang</button>
</td>
<td width="50" align="center" class="clanormall">
</td>
</tr></table></td></tr>

<tr><td height="7"></td></tr>
<tr><td width="472" height="1" align="center" class="clagreyline"></td></tr>
</table></td></tr>
<!-- EOF: PANEL SUBMIT -->


<?php funbox500midclose(); ?>
<?php funbox500bot($deflink); ?>
</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

</form>
</div></td></tr>


<?php funbodyclose(); ?>
</body>
</html>
