<?php
if (empty($namvarnavsubpage) || !isset($namvarnavsubpage)) { $namvarnavsubpage=1; }
if (empty($namvarnavsubline) || !isset($namvarnavsubline)) { $namvarnavsubline=1; }
if (empty($namvarnavsublimitawal) || !isset($namvarnavsublimitawal)) { $namvarnavsublimitawal=0; }
if (empty($namvarnavsublimit) || !isset($namvarnavsublimit)) { $namvarnavsublimit=15; }

$namvarnavsubjml=mysql_query("select
	penumpangpasporno,count(*) as varjmlduplikat
	from (select penumpangpasporno from tblanalisispenumpangsumber where (shipdeparturedate between '".$linfiturperiodeawal."' and '".$linfiturperiodeakhir."' or shipdestinationdate between '".$linfiturperiodeawal."' and '".$linfiturperiodeakhir."') group by penumpangnama,penumpangjeniskelamin,penumpangwaktulahir) as tblanalisispenumpangsumbersubquery
	group by penumpangpasporno
	having varjmlduplikat>1
");
$namvarnavsubrjml=mysql_num_rows($namvarnavsubjml);

if ($_POST[namvarnavsublimit]) { $namvarnavsublimit=$_POST[namvarnavsublimit]; }
if ($namvarnavsublimit=="*") {
	$namvarnavsublimit=$namvarnavsubrjml;
	$namvarnavsubjmlhal=1;
}
else {
	$namvarnavsubjmlhal=intval($namvarnavsubrjml/$namvarnavsublimit);
	if ($namvarnavsubrjml%$namvarnavsublimit) {$namvarnavsubjmlhal++;}
}

if ($_POST[namvarnavsubhal]) {
	if ($namvarnavsubjmlhal < 1) { $namvarnavsubpage=1; $namvarnavsublimitawal=0; }
	elseif ($_POST[namvarnavsubhal] > $namvarnavsubjmlhal) { $namvarnavsubpage=$namvarnavsubjmlhal; $namvarnavsublimitawal=$namvarnavsublimit*($namvarnavsubjmlhal-1); }
	elseif ($_POST[namvarnavsubhal] < 1) { $namvarnavsubpage=1; $namvarnavsublimitawal=0; }
	else { $namvarnavsubpage=$_POST[namvarnavsubhal]; $namvarnavsublimitawal=$namvarnavsublimit*($_POST[namvarnavsubhal]-1); }
}

for ($i=1;$i<=$namvarnavsubjmlhal;$i++) {
	$namvarnavsubbaru=$namvarnavsublimit*($i-1);
	if ($namvarnavsublimitawal==$namvarnavsubbaru) {$namvarnavsubhal=$namvarnavsubpage=$i; }
}

if ($namvarnavsublimit>=$namvarnavsubrjml) {
	$namvarnavsublimit=$namvarnavsubrjml;
	$namvarnavsubhal=$namvarnavsubpage=$namvarnavsubline=$namvarnavsubjmlhal=1;
	$namvarnavsubprev="&#8249;Sebelum";
	$namvarnavsubnext="Sesudah&#8250;";
}
$namvarnavsubline=$namvarnavsublimitawal+1;
$namvarnavsublimitakhir=$namvarnavsublimit;
if ($namvarnavsubjmlhal<=1) { $namvarnavsublimitawal=0; }

/* KE HALAMAN SEBELUM */
if ($namvarnavsubpage>1) {
	$namvarnavsubprevpage=$namvarnavsubpage-1;
	$namvarnavsubprevlimit=($namvarnavsublimit*($namvarnavsubpage-1))-$namvarnavsublimit;
	if ($namvarnavsubpage>$namvarnavsubjmlhal) { $namvarnavsubprevlimit=($namvarnavsublimit*($namvarnavsubpage-1))-(2*$namvarnavsublimit); }
	$namvarnavsubprev="<div onClick=\"funffdivmain('".$filefetcher."?ffswitch=ffswfitur03&namvarnavsubpage=".$namvarnavsubprevpage."&namvarnavsublimit=".$namvarnavsublimit."&namvarnavsublimitawal=".$namvarnavsubprevlimit."&".$carrier."','')\">&#8249;Sebelum</div>";
}
else { $prev="&#8249;Sebelum"; }

/* KE HALAMAN SESUDAH */
if ($namvarnavsubjmlhal>0&&$namvarnavsubpage<$namvarnavsubjmlhal) {
	$namvarnavsubnextpage=$namvarnavsubpage+1;
	$namvarnavsubnextlimit=$namvarnavsubpage*$namvarnavsublimit;
	$namvarnavsubnext="<div onClick=\"funffdivmain('".$filefetcher."?ffswitch=ffswfitur03&namvarnavsubpage=".$namvarnavsubnextpage."&namvarnavsublimit=".$namvarnavsublimit."&namvarnavsublimitawal=".$namvarnavsubnextlimit."&".$carrier."','')\">Sesudah&#8250;</div>";
}
else { $namvarnavsubnext="Sesudah&#8250;"; }
?>

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
$selectfromtblanalisispenumpangsumber=mysql_query("select
	penumpangpasporno,count(*) as varjmlduplikat
	from (select penumpangpasporno from tblanalisispenumpangsumber where (shipdeparturedate between '".$linfiturperiodeawal."' and '".$linfiturperiodeakhir."' or shipdestinationdate between '".$linfiturperiodeawal."' and '".$linfiturperiodeakhir."') group by penumpangnama,penumpangjeniskelamin,penumpangwaktulahir) as tblanalisispenumpangsumbersubquery
	group by penumpangpasporno
	having varjmlduplikat>1
	limit ".$namvarnavsublimitawal.",".$namvarnavsublimitakhir."
");
while ($selectfromtblanalisispenumpangsumberarray=mysql_fetch_array($selectfromtblanalisispenumpangsumber)) {
	$penumpangpasporno=$selectfromtblanalisispenumpangsumberarray["penumpangpasporno"];
	$selectfromtblanalisispenumpangsumber2=mysql_query("select penumpangnama,penumpangjeniskelamin,penumpangwaktulahir,penumpangpasporno,penumpangpasporpoi,penumpangpaspordoi,penumpangkebangsaan from tblanalisispenumpangsumber where penumpangpasporno='".$penumpangpasporno."'");
	while ($selectfromtblanalisispenumpangsumberarray2=mysql_fetch_array($selectfromtblanalisispenumpangsumber2)) {
		$formfetchercarrieridentifikasi=
		"identifikasipenumpangnama=".$selectfromtblanalisispenumpangsumberarray2["penumpangnama"]."&".
		"identifikasipenumpangjeniskelamin=".$selectfromtblanalisispenumpangsumberarray2["penumpangjeniskelamin"]."&".
		"identifikasipenumpangwaktulahir=".$selectfromtblanalisispenumpangsumberarray2["penumpangwaktulahir"]."&".
		"identifikasipenumpangpasporno=".$selectfromtblanalisispenumpangsumberarray2["penumpangpasporno"]."&".
		"identifikasipenumpangpasporpoi=".$selectfromtblanalisispenumpangsumberarray2["penumpangpasporpoi"]."&".
		"identifikasipenumpangpaspordoi=".$selectfromtblanalisispenumpangsumberarray2["penumpangpaspordoi"]."&".
		"identifikasipenumpangkebangsaan=".$selectfromtblanalisispenumpangsumberarray2["penumpangkebangsaan"]."&";
		unset($arrpenumpangwaktulahir);
		$arrpenumpangwaktulahir=explode("-",$selectfromtblanalisispenumpangsumberarray2["penumpangwaktulahir"]);
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
		<td width="110" align="center" style="max-width:110px; overflow:hidden;"><?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangpasporno"]); ?></td>
	<?php jar(); ?>
		<td class="clanopadding"><div class="clatautubah" onClick="
		document.getElementById('namdivubahatensi3').style.display='block'; 
		document.getElementById('namtextoripenumpangnama').value='<?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangnama"]); ?>';
		document.getElementById('namtextoripenumpangjeniskelamin').value='<?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangjeniskelamin"]); ?>';
		document.getElementById('namtextoripenumpangwaktulahir').value='<?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangwaktulahir"]); ?>';
		document.getElementById('namtextoripenumpangpasporno').value='<?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangpasporno"]); ?>';
		document.getElementById('namtextubahpenumpangnama').value='<?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangnama"]); ?>';
		document.getElementById('namtextubahpenumpangjeniskelamin').value='<?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangjeniskelamin"]); ?>';
		document.getElementById('namtextubahpenumpangwaktulahirtanggal').value='<?php echo($arrpenumpangwaktulahir[2]); ?>';
		document.getElementById('namtextubahpenumpangwaktulahirbulan').value='<?php echo($arrpenumpangwaktulahir[1]); ?>';
		document.getElementById('namtextubahpenumpangwaktulahirtahun').value='<?php echo($arrpenumpangwaktulahir[0]); ?>';
		document.getElementById('namtextubahpenumpangpasporno').value='<?php echo($selectfromtblanalisispenumpangsumberarray2["penumpangpasporno"]); ?>';
		document.getElementById('namtextubahpenumpangnama').focus();
		">Ubah</div></td>
	<?php jar(); ?>
		<td class="clanopadding"><div class="clatautidentifikasi" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswidentifikasi&<?php echo($carrier."&".$carriersort."&carrierffsw=ffswfitur03&".$formfetchercarrieridentifikasi); ?>','namtextidentifikasipenumpangnama')">Identifikasi</div></td>
	<?php jar(); ?>
		</tr>
	</table></td></tr>
	<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>

<?php } $namvarnavsubline++; } ?>


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
<div class="clatautkembali" id="divkembali" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort); ?>','namtextsaringshipsailstatus')">Kembali&#8250;</div>
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

<?php include("analisispenumpang_pilihsalahsatu.php"); ?>

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

<div id="namdivubahatensi3" style="position:fixed; top:0px; display:none; z-index:50;">
<div style="position:inherit; bottom:250px; left:350px;">
<?php include("analisispenumpang_fitur03_ubah.php"); ?>
</div>
</div>
