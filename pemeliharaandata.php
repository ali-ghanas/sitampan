<?php include("pemeliharaandata.inc.php"); ?>
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
<form enctype="multipart/form-data" method="post" action="<?php echo($PHP_SELF); ?>">
<table border="0" cellpadding="0" cellspacing="0">
<tr>




<td width="250" valign="top" id="namtdrightpanel"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox250top($deflink); ?>
<?php funbox250midopen($deflink); ?>

<tr><td><div style="cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namdivpanelsubmit');"><img src="<?php echo($deflink); ?>slices/forpemeliharaandata.jpg"></div></td></tr>
<tr><td height="25" class="clabiggie"><?php echo($nambiggie[text]); ?></td></tr>
<tr><td width="222" height="1" align="center" class="clagreyline"></td></tr>

<?php funbox250midclose(); ?>
<?php funbox250bot($deflink); ?>
</table></td>




<td width="750" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox750lblopen($deflink); ?>Pemeliharaan Data<?php funbox750lblclose(); ?>
<?php funbox750midopen($deflink); ?>
<?php funrow(13); ?>

<tr>
<td width="14"></td><!-- BUFFER KIRI -->

<!-- BOF: ISI (BUFFER TENGAH) -->
<td><table border="0" cellpadding="0" cellspacing="0">



<!-- BOF: ROW 1: DATA -->
<tr><td><table cellpadding="0" cellspacing="0" border="0">
<tr>


<td><table cellpadding="0" cellspacing="0" border="0" class="clainputan">
	<tr>
		<td width="140">Metode Proses:&nbsp;</td>
		<td><select style="width:150px;" name="namtextmetode" id="namtextmetode" onChange="if (document.getElementById('namtextmetode').value=='impor') { document.getElementById('namtrimpordata').style.visibility='visible'; } else { document.getElementById('namtrimpordata').style.visibility='hidden'; document.getElementById('namtextlokasifile').value=null; }">
		<option value=""></option>
		<option value="ekspor">Pencadangan Data</option>
		<option value="impor">Pemulihan Data</option>
		<option value="c&r">Cek dan Perbaiki Basis Data</option>
		</select>&nbsp;<span style="color:#cc0000;">*</span></td>
		<td></td>
	</tr>
	<script language="javascript" type="text/javascript">document.getElementById('namtextmetode').focus();</script>
	<tr id="namtrimpordata" style="visibility:hidden;">
		<td>Lokasi Berkas:&nbsp;</td>
		<td><input type="file" id="namtextlokasifile" name="namtextlokasifile">&nbsp;<span style="color:#cc0000;">*</span></td>
		<td></td>
	</tr>
</table></td>


</tr>
</table></td></tr>
<!-- EOF: ROW 1: DATA -->


</table></td>
<!-- EOF: ISI (BUFFER TENGAH) -->



<td></td><!-- BUFFER KANAN -->
</tr>

<?php funrow(40); ?>

<!-- BOF: PANEL SUBMIT -->
<tr><td colspan="3"><div id="namdivpanelsubmit"><table cellpadding="0" cellspacing="0" border="0" class="clasoftback">
<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>
<tr><td height="7"></td></tr>

<tr><td><table cellpadding="0" cellspacing="0" border="0"><tr>
<td width="100" align="center">
</td>
<td width="538" align="center" class="clabuttbig">
<button type="submit" id="namsubmitproses" name="namsubmitproses" value="proses"><strong>Proses</strong></button>
</td>
<td width="100" align="center">
</td>
</tr></table></td></tr>

<tr><td height="7"></td></tr>
<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>
</table></div></td></tr>
<!-- EOF: PANEL SUBMIT -->

<?php funbox750midclose(); ?>
<?php funbox750bot($deflink); ?>




</table>
</td>





</tr>


</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

</form>
<!-- END OF: DIVMAIN -->

</div></td></tr>

<?php funbodyclose(); ?>
</body>
</html>