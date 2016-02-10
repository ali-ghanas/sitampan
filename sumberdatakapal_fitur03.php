<!-- BEGINNING OF: DIVMAINSUB -->
<table border="0" cellpadding="0" cellspacing="0">
<tr>


<td width="750" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox750lblopen($deflink); ?>
<table border="0" cellpadding="0" cellspacing="0" class="clalabeller"><tr>
	<td width="40" align="center">#</td>
	<?php jar(); ?>
	<td width="170" align="left">Nama Penumpang</td>
	<?php jar(); ?>
	<td width="30" align="center">L/P</td>
	<?php jar(); ?>
	<td width="70" align="center">Tgl. Lahir</td>
	<?php jar(); ?>
	<td width="110" align="center">No. Paspor</td>
	<?php jar(); ?>
	<?php jar(); ?>
</tr></table>

<?php funbox750lblclose(); ?>
<?php funbox750midopen($deflink); ?>

<?php
$selectfromtblanalisispenumpangsumber=mysql_query("select penumpangpasporno from tblanalisispenumpangsumber where sumberid='".$linsumberid."'");
$namvarnavsubline=1;
while ($selectfromtblanalisispenumpangsumberarray=mysql_fetch_array($selectfromtblanalisispenumpangsumber)) {
	$penumpangpasporno=$selectfromtblanalisispenumpangsumberarray["penumpangpasporno"];
	$selectfromtblanalisispenumpangsumber2=mysql_query("select
		penumpangnama,penumpangjeniskelamin,penumpangwaktulahir
		from tblanalisispenumpangsumber
		where penumpangpasporno='".$penumpangpasporno."'
		group by penumpangnama,penumpangjeniskelamin,penumpangwaktulahir
	");
	if (mysql_num_rows($selectfromtblanalisispenumpangsumber2)>1) {
		while ($selectfromtblanalisispenumpangsumberarray2=mysql_fetch_array($selectfromtblanalisispenumpangsumber2)) {
?>

	<tr class="clawithiceon"><td><table border="0" cellpadding="0" cellspacing="0" class="clanormall">
		<tr>
		<td width="40" height="20" align="center"><?php echo(wordwrap("$namvarnavsubline",6,"\n",true)); ?>.</td>
	<?php jar(); ?>
		<td width="170" align="left" style="max-width:170px; overflow:hidden;"><strong><?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangnama"]); ?></strong></td>
	<?php jar(); ?>
		<td width="30" align="center"><?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangjeniskelamin"]); ?></td>
	<?php jar(); ?>
		<td width="70" align="center" style="max-width:70px; overflow:hidden;"><?php echo(funconvtanggalmiring($selectfromtblanalisispenumpangsumberarray2["penumpangwaktulahir"])); ?></td>
	<?php jar(); ?>
		<td width="110" align="center" style="max-width:110px; overflow:hidden;"><?php echo($selectfromtblanalisispenumpangsumberarray["penumpangpasporno"]); ?></td>
	<?php jar(); ?>
		</tr>
	</table></td></tr>
	<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>

<?php } $namvarnavsubline++; } } ?>


<!-- BOF: PANEL SUBMIT -->
<tr><td><div id="namdivpanelsubmitbuat"><table cellpadding="0" cellspacing="0" border="0" class="clasoftback">
<tr><td height="7"></td></tr>

<tr><td><table cellpadding="0" cellspacing="0" border="0"><tr>
<td width="100" align="center">
</td>
<td width="538" align="center" class="clabuttbig">
	<table cellpadding="0" cellspacing="0" border="0"><tr>
	<td width="65" height="" class="clanavigator" align="center"><?php echo($namvarnavsubprev); ?></td>
	<td width="65" height="" class="clanavigator" align="center"><?php echo($namvarnavsubnext); ?></td>
	</tr></table>
</td>
<td width="100" align="center">
<div class="clatautkembali" id="divkembali" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelkapal&<?php echo($carrier."&".$carriersort); ?>','namtextsaringshipsailstatus')">Kembali&#8250;</div>
</td>
</tr></table></td></tr>

<tr><td height="7"></td></tr>
<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>
</table></div></td></tr>
<!-- EOF: PANEL SUBMIT -->

<?php funbox750midclose(); ?>
<?php funbox750bot($deflink); ?>




</table></td>




<td width="250" valign="top" id="namtdrightpanel"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox250top($deflink); ?>
<?php funbox250midopen($deflink); ?>

<tr><td><div style="cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namdivpanelsubmitbuat');"><img src="<?php echo($deflink); ?>slices/foranalisispenumpang.jpg"></div></td></tr>
<tr><td height="25" class="clabiggie"><?php echo($nambiggie[text]); ?></td></tr>
<tr><td width="222" height="1" align="center" class="clagreyline"></td></tr>

<?php include("sumberdatakapal_pilihsalahsatu.php"); ?>

<?php funbox250midclose(); ?>
<?php funbox250bot($deflink); ?>
</table></td>


<?php funrow(40); ?>



</tr>


</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

<!-- END OF: DIVMAINSUB -->
