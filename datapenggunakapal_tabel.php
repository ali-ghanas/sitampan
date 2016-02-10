<!-- BEGINNING OF: DIVMAIN -->
<form action="javascript:funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier); ?>','namtextbuatubahpenggunaid')">
<table border="0" cellpadding="0" cellspacing="0">

<!-- BOF: CONTROL PANEL -->
<tr><td width="1000" valign="top" colspan="2"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox1000top($deflink); ?>
<?php funbox1000midopen($deflink); ?>


<!-- BEGINNING OF: ROW ATAS (ROWSPAN) -->
<tr>
<td rowspan="3" width="130" valign="top"><div style="cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namtdbigbutts');"><img src="<?php echo($deflink); ?>slices/fordatapengguna.jpg"></div></td><!-- ILLUSTRATION (ROWSPAN HERE) -->

<td width="842" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<tr><td><table border="0" cellpadding="0" cellspacing="0"><tr>
	<td width="350" height="25" class="clabiggie"><?php echo($nambiggie[text]); ?></td>
	<td width="30"></td>
	<td id="namtdbigbutts" width="400" valign="top"><table border="0" cellpadding="0" cellspacing="0" align="right"><tr>
		<td class="clabuttbuatbaru"><div onClick="funffdivmain('<?php echo($filefetcher); ?>','<?php echo($carrier."&".$carriersort); ?>&ffswitch=ffswbuat','namtextbuatsiswanoinduk')">Buat Baru</div></td>
		<td width="10"></td>
	</tr></table></td>
</tr></table></td></tr>

<tr><td width="842" height="1" align="center" class="clagreyline"></td></tr>
<tr valign="top"><td height="90" class="clasoftback"></td></tr>
<tr><td width="842" height="1" align="center" class="clagreyline"></td></tr>

</table></td>

</tr>
<!-- END OF: ROW ATAS (ROWSPAN) -->


<?php funbox1000midclose(); ?>
<?php funbox1000bot($deflink); ?>
</table></td></tr>
<!-- EOF: CONTROL PANEL -->




<!-- BOF: TABEL -->
<tr><td width="1000" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox1000lblopen($deflink); ?>
<table border="0" cellpadding="0" cellspacing="0" class="clalabeller"><tr>
	<td width="40" align="center">#</td>
	<?php jar(); ?>
	<?php jar(); ?>
	<td width="150" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo("sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penggunaid&changesort=ok"); ?>','')">ID Pengguna</a></td>
	<?php jar(); ?>
	<?php jar(); ?>
	<td width="80" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo("sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penggunalevel&changesort=ok"); ?>','')">Tingkatan</a></td>
	<?php jar(); ?>
	<?php jar(); ?>
	<td width="400" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo("sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penggunaketerangan&changesort=ok"); ?>','')">Keterangan</a></td>
	<?php jar(); ?>
	<?php jar(); ?>
</tr></table>

<?php funbox1000lblclose(); ?>
<?php funbox1000midopen($deflink); ?>

	<?php
	$selectfromtblpengguna=mysql_query("select * from tblpengguna order by ".$orderlist." ".$sortlist);
	$selectfromtblpenggunaresult=mysql_num_rows($selectfromtblpengguna);
	$line=1;
	while ($selectfromtblpenggunaarray=mysql_fetch_array($selectfromtblpengguna)) {
	?>

	<tr class="clawithiceon"><td><table border="0" cellpadding="0" cellspacing="0" class="clanormall">
		<tr>
		<td width="40" height="20" align="center"><?php echo(wordwrap("$line",6,"\n",true)); ?>.</td>
	<?php jar(); ?>
	<?php jar(); ?>
		<td width="150" height="20" align="left" style="max-width:150px; overflow:hidden;"><?php echo($selectfromtblpenggunaarray["penggunaid"]); ?></td>
	<?php jar(); ?>
	<?php jar(); ?>
		<td width="80" align="center" style="max-width:80px; overflow:hidden;"><?php echo($selectfromtblpenggunaarray["penggunalevel"]." - ".$arrpenggunalevel[$selectfromtblpenggunaarray["penggunalevel"]]); ?></td>
	<?php jar(); ?>
	<?php jar(); ?>
		<td width="400" align="left" style="max-width:400px; overflow:hidden;"><?php echo($selectfromtblpenggunaarray["penggunaketerangan"]); ?></td>
	<?php jar(); ?>
	<?php jar(); ?>
		<td><table border="0" cellpadding="0" cellspacing="0"><tr>
			<td><div class="clatautubah" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswubah&<?php echo($carrier."&".$carriersort."&linubahdatapengguna=".$selectfromtblpenggunaarray["penggunaid"]); ?>','namtextubahpenggunaid')">Lihat</div></td>
		</tr></table></td>
	<?php jar(); ?>
		<td><table border="0" cellpadding="0" cellspacing="0"><tr>
			<td><div class="clatauthapus" onClick="funconfirmdelete('<?php echo($filefetcher); ?>','tandahapus=1&ffswitch=ffswtabel&<?php echo("sortlist=".$sortlist."&orderlist=".$orderlist."&linhapusdatapengguna=".$selectfromtblpenggunaarray["penggunaid"]); ?>','<?php echo($statusding[31].$selectfromtblpenggunaarray["penggunaid"]); ?>')">Hapus</div></td>
		</tr></table></td>
		</tr>
	</table></td></tr>
	<tr><td width="972" height="1" align="center" class="clagreyline"></td></tr>
	<?php $line++; } ?>



<?php funbox1000midclose(); ?>
<?php funbox1000bot($deflink); ?>




</table></td></tr>
<!-- EOF: TABEL -->


</table>


<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

</form>
<!-- END OF: DIVMAIN -->
