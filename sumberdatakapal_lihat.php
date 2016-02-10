<!-- BEGINNING OF: DIVMAINSUB -->
<?php
$selectfromtblanalisispenumpangsumber=mysql_query("select shipname,shipdeparturedate from tblanalisispenumpangsumber where sumberid='".$linlihatsumberdata."' group by sumberid");
$selectfromtblanalisispenumpangsumberarray=mysql_fetch_array($selectfromtblanalisispenumpangsumber);
?>
<table border="0" cellpadding="0" cellspacing="0">



<tr><td width="900" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox900lblopen($deflink); ?>
<table border="0" cellpadding="0" cellspacing="0" class="clalabeller"><tr>
	<td width="40" align="center">No.</td>
	<?php jar(); ?>
	<td width="180" align="left">Nama Penumpang</td>
	<?php jar(); ?>
	<td width="30" align="center">L/P</td>
	<?php jar(); ?>
	<td width="65" align="center">Tanggal<br>Lahir</td>
	<?php jar(); ?>
	<td width="90" align="center">Kebangsaan</td>
	<?php jar(); ?>
	<td width="100" align="center">Nomor<br>Paspor</td>
	<?php jar(); ?>
	<td width="100" align="center">Tempat<br>Diterbitkan</td>
	<?php jar(); ?>
	<td width="70" align="center">Waktu<br>Diterbitkan</td>
	<?php jar(); ?>
	<td width="95" align="center">Keterangan</td>
	<?php jar(); ?>
	<td><button type="button" id="nambuttxsumberdatalihat" onClick="funfadedoutlilbox(1); funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelkapal&<?php echo($carrier."&".$carriersort); ?>','namtextsaringshipname')">X</button></td>
</tr></table>

<?php funbox900lblclose(); ?>
<?php funbox900midopen($deflink); ?>

<tr><td><div style="max-height:420px; overflow:scroll; overflow-x:hidden;"><table border="0" cellpadding="0" cellspacing="0">

<?php
$selectfromtblanalisispenumpangsumber=mysql_query("select * from tblanalisispenumpangsumber where sumberid='".$linlihatsumberdata."' order by penumpangnobarissheet");
while ($selectfromtblanalisispenumpangsumberarray=mysql_fetch_array($selectfromtblanalisispenumpangsumber)) {
?>

	<tr class="clawithiceon"><td><table border="0" cellpadding="0" cellspacing="0" class="clanormall">
		<tr>
		<td width="40" height="20" align="center"><?php echo(wordwrap("$line",6,"\n",true)); ?>.</td>
	<?php jar(); ?>
		<td width="180" align="left" style="max-width:180px; overflow:hidden;"><?php echo($selectfromtblanalisispenumpangsumberarray["penumpangnama"]); ?></td>
	<?php jar(); ?>
		<td width="30" align="center"><?php echo($selectfromtblanalisispenumpangsumberarray["penumpangjeniskelamin"]); ?></td>
	<?php jar(); ?>
		<td width="65" align="center" style="max-width:65px; overflow:hidden;"><?php echo(funconvtanggalmiring($selectfromtblanalisispenumpangsumberarray["penumpangwaktulahir"])); ?></td>
	<?php jar(); ?>
		<td width="90" align="center" style="max-width:90px; overflow:hidden;"><?php echo($selectfromtblanalisispenumpangsumberarray["penumpangkebangsaan"]); ?></td>
	<?php jar(); ?>
		<td width="100" align="center" style="max-width:100px; overflow:hidden;"><?php echo($selectfromtblanalisispenumpangsumberarray["penumpangpasporno"]); ?></td>
	<?php jar(); ?>
		<td width="100" align="center" style="max-width:100px; overflow:hidden;"><?php echo($selectfromtblanalisispenumpangsumberarray["penumpangpasporpoi"]); ?></td>
	<?php jar(); ?>
		<td width="70" align="center" style="max-width:70px; overflow:hidden;"><?php if ($selectfromtblanalisispenumpangsumberarray["penumpangpaspordoi"]!="0000-00-00") { echo(funconvtanggalmiring($selectfromtblanalisispenumpangsumberarray["penumpangpaspordoi"])); } ?></td>
	<?php jar(); ?>
		<td width="95" align="center" style="max-width:95px; overflow:hidden;"><?php echo($selectfromtblanalisispenumpangsumberarray["penumpangremarks"]); ?></td>
	<?php jar(); ?>
		</tr>
	</table></td></tr>
	<tr><td width="972" height="1" align="center" class="clagreyline"></td></tr>
	<?php $line++; } ?>

</table></div></td></tr>

<?php funbox900midclose(); ?>
<?php funbox900bot($deflink); ?>
</table></td></tr>

<?php funrow(40); ?>

</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

<!-- END OF: DIVMAINSUB -->
