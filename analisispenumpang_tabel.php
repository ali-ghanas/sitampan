<?php
$selectfromtblanalisispenumpangsumber=mysql_query("select shipname from tblanalisispenumpangsumber group by shipname asc");
$i=0;
while ($selectfromtblanalisispenumpangsumberarray=mysql_fetch_array($selectfromtblanalisispenumpangsumber)) {
	$varselectshipname[$i]=$selectfromtblanalisispenumpangsumberarray["shipname"];
	$i++;
}
?>

<!-- BEGINNING OF: DIVMAIN -->
<table border="0" cellpadding="0" cellspacing="0">

<!-- BOF: CONTROL PANEL -->
<tr><td width="1000" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox1000top($deflink); ?>
<?php funbox1000midopen($deflink); ?>


<!-- BEGINNING OF: ROW ATAS (ROWSPAN) -->
<tr>
<td rowspan="3" width="130" valign="top"><div id="namforanalisispenumpangh120" style="display:none; cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namtdbigbutts,namdivfilterbutts,namdivfilterbuttsdown');"><img src="<?php echo($deflink); ?>slices/foranalisispenumpang.jpg"></div>
<div id="namforanalisispenumpangh220" style="display:block; cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namtdbigbutts,namdivfilterbutts,namdivfilterbuttsup');"><img src="<?php echo($deflink); ?>slices/foranalisispenumpangh220.jpg"></div></td><!-- ILLUSTRATION (ROWSPAN HERE) -->

<td width="842" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<tr><td><table border="0" cellpadding="0" cellspacing="0"><tr>
	<td width="300" height="25" class="clabiggie"><?php echo($nambiggie[text]); ?></td>
	<td width="30"></td>
	<td id="namtdbigbutts" width="450" valign="top"><table border="0" cellpadding="0" cellspacing="0" align="right"><tr>
		<td class="clabuttvariabel"><div onClick="funfadedinlilbox(0); funffdivmainlilbox('<?php echo($filefetcher); ?>','ffswitch=ffswvariabel&<?php echo($carrier."&".$carriersort."&".$filefetchercarriersaring); ?>','')">Atur Variabel</div></td>
		<td width="10"></td>
		<td class="clabuttpilihfitur"><div onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswfitur01&<?php echo($carrier."&".$carriersort."&linfiturperiodeawal=".$namtextsaringperiodeawaltahun."-".$namtextsaringperiodeawalbulan."-".$namtextsaringperiodeawaltanggal."&linfiturperiodeakhir=".$namtextsaringperiodeakhirtahun."-".$namtextsaringperiodeakhirbulan."-".$namtextsaringperiodeakhirtanggal); ?>','')">Fitur Atensi</div></td>
		<td width="10"></td>
	</tr></table></td>
</tr></table></td></tr>

<tr><td width="842" height="1" align="center" class="clagreyline"></td></tr>
</table></td>

</tr>
<!-- END OF: ROW ATAS (ROWSPAN) -->





<!-- BOF: ROW TENGAH (PANEL FILTER) -->
<tr valign="top" class="clawithsofton"><td width="842">
<form action="javascript:funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&".$filefetchercarriersaring); ?>','namtextsaringpenumpangnama')">
<table border="0" cellpadding="0" cellspacing="0">
	<tr><td height="2"></td></tr>
	<tr><td>
	
	<div id="namdivfilter"><table border="0" cellpadding="0" cellspacing="0" class="claborderinset">

		<tr>
		
		<td colspan="5"><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="21">Periode&nbsp;<select name="namtextsaringshipsailstatus" id="namtextsaringshipsailstatus">
					<option <?php if ($namtextsaringshipsailstatus=="") { echo("selected"); } ?> value="">Keberangkatan dan Kedatangan</option>
					<option <?php if ($namtextsaringshipsailstatus=="D") { echo("selected"); } ?> value="D">Keberangkatan</option>
					<option <?php if ($namtextsaringshipsailstatus=="A") { echo("selected"); } ?> value="A">Kedatangan</option>
				</select>:&nbsp;
				<select name="namtextsaringperiodeawaltanggal" id="namtextsaringperiodeawaltanggal">
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodeawaltanggal) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodeawalbulan" id="namtextsaringperiodeawalbulan">
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodeawalbulan) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodeawaltahun" id="namtextsaringperiodeawaltahun">
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodeawaltahun) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
				&nbsp;s.d&nbsp;
				<select name="namtextsaringperiodeakhirtanggal" id="namtextsaringperiodeakhirtanggal">
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodeakhirtanggal) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodeakhirbulan" id="namtextsaringperiodeakhirbulan">
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodeakhirbulan) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodeakhirtahun" id="namtextsaringperiodeakhirtahun">
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodeakhirtahun) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
				</td>
			</tr>
		</table></td>

		</tr>

		<tr>

		<td><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20">Nama Penumpang:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="64" name="namtextsaringpenumpangnama" id="namtextsaringpenumpangnama" value="<?php echo($namtextsaringpenumpangnama); ?>"></td>
			</tr>
			<script language="javascript" type="text/javascript">document.getElementById('namtextsaringpenumpangnama').focus();</script>
			<tr>
				<td height="20">No. Paspor:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="32" name="namtextsaringpenumpangpasporno" id="namtextsaringpenumpangpasporno" value="<?php echo($namtextsaringpenumpangpasporno); ?>"></td>
			</tr>
		</table></td>
		
		<td width="15"></td>
		
		<td><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20">Jenis Kelamin:&nbsp;</td>
				<td><select style="width:126px;" name="namtextsaringpenumpangjeniskelamin" id="namtextsaringpenumpangjeniskelamin">
					<option value=""></option>
					<option <?php if ($namtextsaringpenumpangjeniskelamin=="L") { echo("selected"); } ?> value="L">Laki-laki</option>
					<option <?php if ($namtextsaringpenumpangjeniskelamin=="P") { echo("selected"); } ?> value="P">Perempuan</option>
				</select></td>
			</tr>
			<tr>
				<td height="20">Tgl. Lahir:&nbsp;</td>
				<td>
				<select name="namtextsaringpenumpangwaktulahirtanggal" id="namtextsaringpenumpangwaktulahirtanggal">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringpenumpangwaktulahirtanggal) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringpenumpangwaktulahirbulan" id="namtextsaringpenumpangwaktulahirbulan">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringpenumpangwaktulahirbulan) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringpenumpangwaktulahirtahun" id="namtextsaringpenumpangwaktulahirtahun">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringpenumpangwaktulahirtahun) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
		</table></td>

		<td width="15"></td>

		<td><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20">Kebangsaan:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="64" name="namtextsaringpenumpangkebangsaan" id="namtextsaringpenumpangkebangsaan" value="<?php echo($namtextsaringpenumpangkebangsaan); ?>"></td>
			</tr>
			<tr>
				<td height="20">Nama Kapal:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="64" name="namtextsaringshipnametext" id="namtextsaringshipnametext" value=<?php echo($namtextsaringshipnametext); ?>></td>
			</tr>
		</table></td>

		<td width="15"></td>

		<td><div id="namdivfilterbuttsup" style="display:block; position:relative; top:-10px;"><table border="0" cellpadding="0" cellspacing="0" align="center">
			<tr><td><button style="width:21px; height:38px;" type="button" onClick="document.getElementById('namdivfilterbuttsdown').style.display='block'; document.getElementById('namdivfilterbuttsup').style.display='none'; document.getElementById('namdivfilterexpanded').style.display='none'; document.getElementById('namdivfilterexpandedgrs').style.display='none'; document.getElementById('namforanalisispenumpangh120').style.display='block'; document.getElementById('namforanalisispenumpangh220').style.display='none';"><img src="slices/mnuarrownorth.gif"></button></td></tr>
		</table></div>
		<div id="namdivfilterbuttsdown" style="display:none; position:relative; top:-10px;"><table border="0" cellpadding="0" cellspacing="0" align="center">
			<tr><td><button style="width:21px; height:38px;" type="button" onClick="document.getElementById('namdivfilterbuttsup').style.display='block'; document.getElementById('namdivfilterbuttsdown').style.display='none'; document.getElementById('namdivfilterexpanded').style.display='block'; document.getElementById('namdivfilterexpandedgrs').style.display='block'; document.getElementById('namforanalisispenumpangh120').style.display='none'; document.getElementById('namforanalisispenumpangh220').style.display='block';"><img src="slices/mnuarrowsouth.gif"></button></td></tr>
		</table></div></td>

		<td><div id="namdivfilterbutts" style="position:relative; top:-10px;"><table border="0" cellpadding="0" cellspacing="0" align="center">
			<tr><td><button class="clabuttshort" type="submit" name="nambuttonsaring"><strong>Proses</strong></button></td></tr>
			<tr><td><button class="clabuttshort" type="button" name="nambuttonbatalsaring" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel','namtextsaringpenumpangnama')">Ulang</button></td></tr>
		</table></div></td>

		</tr>

	</table></div>
	
	<div id="namdivfilterexpandedgrs" style="display:block;"><table border="0" cellpadding="0" cellspacing="0">
	<tr><td height="2"></td></tr>
	<tr><td width="685" height="1" align="left" class="clagreyline"></td></tr>
	<tr><td height="2"></td></tr>
	</table></div>
	
	<div id="namdivfilterexpanded" style="display:block;"><table border="0" cellpadding="0" cellspacing="0" class="claborderinset">

		<tr>

		<td><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20">Kapal 1:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname1" id="namtextsaringshipname1">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[1]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal1" id="namtextsaringperiodetanggal1">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[1]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan1" id="namtextsaringperiodebulan1">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[1]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun1" id="namtextsaringperiodetahun1">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[1]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
			<tr>
				<td height="20">Kapal 2:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname2" id="namtextsaringshipname2">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[2]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal2" id="namtextsaringperiodetanggal2">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[2]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan2" id="namtextsaringperiodebulan2">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[2]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun2" id="namtextsaringperiodetahun2">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[2]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
			<tr>
				<td height="20">Kapal 3:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname3" id="namtextsaringshipname3">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[3]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal3" id="namtextsaringperiodetanggal3">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[3]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan3" id="namtextsaringperiodebulan3">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[3]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun3" id="namtextsaringperiodetahun3">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[3]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
			<tr>
				<td height="20">Kapal 4:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname4" id="namtextsaringshipname4">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[4]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal4" id="namtextsaringperiodetanggal4">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[4]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan4" id="namtextsaringperiodebulan4">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[4]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun4" id="namtextsaringperiodetahun4">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[4]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
			<tr>
				<td height="20">Kapal 5:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname5" id="namtextsaringshipname5">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[5]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal5" id="namtextsaringperiodetanggal5">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[5]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan5" id="namtextsaringperiodebulan5">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[5]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun5" id="namtextsaringperiodetahun5">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[5]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
		</table></td>
		
		<td width="15"></td>

		<td><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20">Kapal 6:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname6" id="namtextsaringshipname6">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[6]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal6" id="namtextsaringperiodetanggal6">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[6]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan6" id="namtextsaringperiodebulan6">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[6]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun6" id="namtextsaringperiodetahun6">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[6]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
			<tr>
				<td height="20">Kapal 7:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname7" id="namtextsaringshipname7">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[7]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal7" id="namtextsaringperiodetanggal7">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[7]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan7" id="namtextsaringperiodebulan7">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[7]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun7" id="namtextsaringperiodetahun7">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[7]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
			<tr>
				<td height="20">Kapal 8:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname8" id="namtextsaringshipname8">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[8]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal8" id="namtextsaringperiodetanggal8">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[8]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan8" id="namtextsaringperiodebulan8">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[8]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun8" id="namtextsaringperiodetahun8">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[8]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
			<tr>
				<td height="20">Kapal 9:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname9" id="namtextsaringshipname9">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[9]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal9" id="namtextsaringperiodetanggal9">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[9]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan9" id="namtextsaringperiodebulan9">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[9]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun9" id="namtextsaringperiodetahun9">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[9]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
			<tr>
				<td height="20">Kapal 10:&nbsp;</td>
				<td><select style="width:165px;" name="namtextsaringshipname10" id="namtextsaringshipname10">
					<option value=""></option>
					<?php
					$i=0;
					while ($i<count($varselectshipname)) {
					?>
					<option <?php if ($varselectshipname[$i]==$namtextsaringshipname[10]) { echo("selected"); } ?> value="<?php echo($varselectshipname[$i]); ?>"><?php echo($varselectshipname[$i]); ?></option>
					<?php $i++; } ?>
				</select></td>
				<td>
				<select name="namtextsaringperiodetanggal10" id="namtextsaringperiodetanggal10">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringperiodetanggal[10]) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodebulan10" id="namtextsaringperiodebulan10">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringperiodebulan[10]) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringperiodetahun10" id="namtextsaringperiodetahun10">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringperiodetahun[10]) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
                </td>
			</tr>
		</table></td>
		
		<td width="15"></td>

		</tr>

	</table></div>

	</td></tr>
	<tr><td height="2"></td></tr>
</table>
</form>
</td></tr>
<!-- EOF: ROW TENGAH (PANEL FILTER) -->






<!-- BEGINNING OF: ROW BAWAH (PANEL NAVIGASI)-->
<tr valign="bottom"><td><form action="javascript:funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&hal='+hal.value+'&<?php echo("limit=".$limit."&".$carriersort."&".$carrier."&sortlist=".$sortlist."&orderlist=".$orderlist); ?>','limit')"><table border="0" cellpadding="0" cellspacing="0" class="claborderinset">

<tr><td width="842" height="1" align="center" class="clagreyline"></td></tr>

<tr class="clawithsofton"><td><table border="0" cellpadding="0" cellspacing="0"><tr>
	<td width="140" height="25" align="center">
	Data:&nbsp;<strong><?php echo($rjml); ?></strong>
	</td>
	<?php jar(); ?>
	<td width="100" align="center">
	Batas:&nbsp;
	<select name="limit" id="limit" style="width:50px;" onChange="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&limit='+limit.value+'&<?php echo($carrier."&page=".$page."&limitawal=".$limitawal."&sortlist=".$sortlist."&orderlist=".$orderlist); ?>','limit')">
	<option value="<?php echo($limit); ?>"><?php echo($limit); ?></option>
	<option value="10">10</option>
	<option value="15">15</option>
	<option value="20">20</option>
	<option value="25">25</option>
	<option value="30">30</option>
	<option value="100">100</option>
	<option value="<?php echo($rjml); ?>">*</option>
	</select>
	</td>
	<?php jar(); ?>
	<td width="150" align="center">
	Halaman:&nbsp;<input type="text" style="width:40px; text-align:right;" name="hal" id="hal" value="<?php echo($hal); ?>" onChange="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&hal='+hal.value+'&<?php echo($carriersort."&".$carrier."&sortlist=".$sortlist."&orderlist=".$orderlist); ?>','limit')"> / <?php echo($jmlhal); ?>
	</td>
	<?php jar(); ?>
	<td width="50" height="23" class="clanavigator" align="center"><?php echo($first); ?></td>
	<td width="65" height="" class="clanavigator" align="center"><?php echo($prev); ?></td>
	<td width="65" height="" class="clanavigator" align="center"><?php echo($next); ?></td>
	<td width="50" height="" class="clanavigator" align="center"><?php echo($last); ?></td>
</tr></table></td></tr>

</table></form></td></tr>
<!-- END OF: ROW BAWAH (PANEL NAVIGASI)-->


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
	<td width="170" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangnama&changesort=ok"); ?>','')">Nama Penumpang</a></td>
	<?php jar(); ?>
	<td width="110" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangpasporno&changesort=ok"); ?>','')">No. Paspor</a></td>
	<?php jar(); ?>
	<td width="30" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangjeniskelamin&changesort=ok"); ?>','')">L/P</a></td>
	<?php jar(); ?>
	<td width="70" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangwaktulahir&changesort=ok"); ?>','')">Tgl. Lahir</a></td>
	<?php jar(); ?>
	<td width="110" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangkebangsaan&changesort=ok"); ?>','')">Kebangsaan</a></td>
	<?php jar(); ?>
	<td width="85" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=arrival&changesort=ok"); ?>','')">Kedatangan</a></td>
	<?php jar(); ?>
	<td width="95" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=departure&changesort=ok"); ?>','')">Keberangkatan</a></td>
	<?php jar(); ?>
	<?php jar(); ?>
</tr></table>

<?php funbox1000lblclose(); ?>
<?php funbox1000midopen($deflink); ?>
	<?php $result=mysql_num_rows($sort); ?>
	<?php while ($sortarray=mysql_fetch_array($sort)) {
		$formfetchercarrieridentifikasi=
		"identifikasipenumpangnama=".$sortarray["penumpangnama"]."&".
		"identifikasipenumpangjeniskelamin=".$sortarray["penumpangjeniskelamin"]."&".
		"identifikasipenumpangwaktulahir=".$sortarray["penumpangwaktulahir"]."&".
		"identifikasipenumpangpasporno=".$sortarray["penumpangpasporno"]."&".
		"identifikasipenumpangpasporpoi=".$sortarray["penumpangpasporpoi"]."&".
		"identifikasipenumpangpaspordoi=".$sortarray["penumpangpaspordoi"]."&".
		"identifikasipenumpangkebangsaan=".$sortarray["penumpangkebangsaan"]."&";
	?>

	<tr class="clawithiceon"><td><table border="0" cellpadding="0" cellspacing="0" class="clanormall">
		<tr>
		<td width="40" height="20" align="center"><?php echo(wordwrap("$line",6,"\n",true)); ?>.</td>
	<?php jar(); ?>
		<td width="170" align="left" style="max-width:170px; overflow:hidden;"><?php echo($sortarray["penumpangnama"]); ?></td>
	<?php jar(); ?>
		<td width="110" align="center" style="max-width:110px; overflow:hidden;"><?php echo($sortarray["penumpangpasporno"]); ?></td>
	<?php jar(); ?>
		<td width="30" align="center"><?php echo($sortarray["penumpangjeniskelamin"]); ?></td>
	<?php jar(); ?>
		<td width="70" align="center" style="max-width:70px; overflow:hidden;"><?php echo(funconvtanggalmiring($sortarray["penumpangwaktulahir"])); ?></td>
	<?php jar(); ?>
		<td width="110" align="center" style="max-width:110px; overflow:hidden;"><?php echo($sortarray["penumpangkebangsaan"]); ?></td>
	<?php jar(); ?>
		<td width="85" align="center" style="max-width:85px; overflow:hidden;"><?php echo($sortarray["arrival"]); ?></td>
	<?php jar(); ?>
		<td width="95" align="center" style="max-width:95px; overflow:hidden;"><?php echo($sortarray["departure"]); ?></td>
	<?php jar(); ?>
	<?php jar(); ?>
		<td><table border="0" cellpadding="0" cellspacing="0"><tr>
			<td><div class="clatautubah" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswlihat&<?php echo($carrier."&".$carriersort."&linfiturperiodeawal=".$namtextsaringperiodeawaltahun."-".$namtextsaringperiodeawalbulan."-".$namtextsaringperiodeawaltanggal."&linfiturperiodeakhir=".$namtextsaringperiodeakhirtahun."-".$namtextsaringperiodeakhirbulan."-".$namtextsaringperiodeakhirtanggal."&linlihatpenumpangnama=".$sortarray["penumpangnama"]."&linlihatpenumpangjeniskelamin=".$sortarray["penumpangjeniskelamin"]."&linlihatpenumpangwaktulahir=".$sortarray["penumpangwaktulahir"]."&linlihatpenumpangpasporno=".$sortarray["penumpangpasporno"]); ?>','divkembali')">Lihat</div></td>
		</tr></table></td>
	<?php jar(); ?>
		<td><table border="0" cellpadding="0" cellspacing="0"><tr>
			<td><div class="clatautidentifikasi" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswidentifikasi&<?php echo($carrier."&".$carriersort."&carrierffsw=ffswtabel&".$formfetchercarrieridentifikasi); ?>','namtextidentifikasipenumpangnama')">Identifikasi</div></td>
		</tr></table></td>
	<?php jar(); ?>
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

<!-- END OF: DIVMAIN -->

<div id="divmainlilbox" style="display:none; z-index:50;">
<?php include("analisispenumpang_variabel.php"); ?>
</div>
