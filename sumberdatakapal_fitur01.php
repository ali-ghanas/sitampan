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
	<td width="190" align="center">Perjalanan Sebelum</td>
	<?php jar(); ?>
	<td width="190" align="center">Perjalanan Sesudah</td>
	<?php jar(); ?>
	<td width="80" align="center">Jarak</td>
	<?php jar(); ?>
</tr></table>

<?php funbox750lblclose(); ?>
<?php funbox750midopen($deflink); ?>

<?php
if (empty($namtextvarfitur1)&&!isset($namtextvarfitur1)) { $namtextvarfitur1=15; }
$selectfromtblanalisispenumpangsumber=mysql_query("select penumpangnama,penumpangjeniskelamin,penumpangwaktulahir,penumpangpasporno from tblanalisispenumpangsumber where sumberid='".$linsumberid."'");
$namvarnavsubline=1;
while ($selectfromtblanalisispenumpangsumberarray=mysql_fetch_array($selectfromtblanalisispenumpangsumber)) {
	$i=0; unset($datearray);
	$penumpangnama=$selectfromtblanalisispenumpangsumberarray["penumpangnama"];
	$penumpangjeniskelamin=$selectfromtblanalisispenumpangsumberarray["penumpangjeniskelamin"];
	$penumpangwaktulahir=$selectfromtblanalisispenumpangsumberarray["penumpangwaktulahir"];
	$penumpangpasporno=$selectfromtblanalisispenumpangsumberarray["penumpangpasporno"];
	$selectfromtblanalisispenumpangsumber2=mysql_query("select shipsailstatus,shipname,shipdeparturedate,shipdestinationdate from tblanalisispenumpangsumber where penumpangnama='".$penumpangnama."' and penumpangjeniskelamin='".$penumpangjeniskelamin."' and penumpangwaktulahir='".$penumpangwaktulahir."' and penumpangpasporno='".$penumpangpasporno."'");
	if (mysql_num_rows($selectfromtblanalisispenumpangsumber2)>1) {
		unset($datearray);
		while ($selectfromtblanalisispenumpangsumberarray2=mysql_fetch_array($selectfromtblanalisispenumpangsumber2)) {
			if ($selectfromtblanalisispenumpangsumberarray2["shipsailstatus"]=="D"&&$selectfromtblanalisispenumpangsumberarray2["shipdeparturedate"]!="0000-00-00") { $datearray[$i]=$selectfromtblanalisispenumpangsumberarray2["shipdeparturedate"]; }
			if ($selectfromtblanalisispenumpangsumberarray2["shipsailstatus"]=="A"&&$selectfromtblanalisispenumpangsumberarray2["shipdestinationdate"]!="0000-00-00") { $datearray[$i]=$selectfromtblanalisispenumpangsumberarray2["shipdestinationdate"]; }
			$shipname[$i]=$selectfromtblanalisispenumpangsumberarray2["shipname"];
			$i++;
		}
	}
	if (isset($datearray)) { sort($datearray); }
	for ($x=1;$x<$i;$x++) {
		$datediff=(strtotime($datearray[$x])-strtotime($datearray[$x-1]))/86400;
		if ($datediff<=$namtextvarfitur1) {
?>

	<tr class="clawithiceon"><td><table border="0" cellpadding="0" cellspacing="0" class="clanormall">
		<tr>
		<td width="40" height="20" align="center"><?php echo(wordwrap("$namvarnavsubline",6,"\n",true)); ?>.</td>
	<?php jar(); ?>
		<td width="170" align="left" style="max-width:170px; overflow:hidden;"><?php echo($penumpangnama); ?></td>
	<?php jar(); ?>
		<td width="190" align="center" style="max-width:190px; overflow:hidden;"><?php echo($shipname[$x-1]); ?> (<?php echo(funconvtanggalmiring($datearray[$x-1])); ?>)</td>
	<?php jar(); ?>
		<td width="190" align="center" style="max-width:190px; overflow:hidden;"><?php echo($shipname[$x]); ?> (<?php echo(funconvtanggalmiring($datearray[$x])); ?>)</td>
	<?php jar(); ?>
		<td width="80" align="center" style="max-width:80px; overflow:hidden;"><?php echo(floor($datediff)." hari"); ?></td>
	<?php jar(); ?>
		</tr>
	</table></td></tr>
	<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>

<?php $namvarnavsubline++; } } } ?>


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
