<!-- BEGINNING OF: DIVMAIN -->
<table border="0" cellpadding="0" cellspacing="0">

<!-- BOF: CONTROL PANEL -->
<tr><td width="1000" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox1000top($deflink); ?>
<?php funbox1000midopen($deflink); ?>


<!-- BEGINNING OF: ROW ATAS (ROWSPAN) -->
<tr>
<td rowspan="3" width="130" valign="top"><div style="cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namtdbigbutts,namdivfilterbutts');"><img src="<?php echo($nambiggie[slices]); ?>"></div></td><!-- ILLUSTRATION (ROWSPAN HERE) -->

<td width="842" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<tr><td><table border="0" cellpadding="0" cellspacing="0"><tr>
	<td width="300" height="25" class="clabiggie"><?php echo($nambiggie[text]); ?></td>
	<td width="30"></td>
	<td id="namtdbigbutts" width="450" valign="top"><table border="0" cellpadding="0" cellspacing="0" align="right"><tr>
		<td width="90"></td>
		<td width="10"></td>
	</tr></table></td>
</tr></table></td></tr>

<tr><td width="842" height="1" align="center" class="clagreyline"></td></tr>
</table></td>

</tr>
<!-- END OF: ROW ATAS (ROWSPAN) -->





<!-- BOF: ROW TENGAH (PANEL FILTER) -->
<tr valign="top" class="clawithsofton"><td width="842">
<form action="javascript:funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&".$filefetchercarriersaring); ?>','')">
<table border="0" cellpadding="0" cellspacing="0">
	<tr><td height="2"></td></tr>
	<tr><td><table border="0" cellpadding="0" cellspacing="0" class="claborderinset">

		<tr>

		<td><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20">Tanggal:&nbsp;</td>
				<td>
				<select name="namtextsaringuserlogtanggal" id="namtextsaringuserlogtanggal">
					<option value=""> </option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringuserlogtanggal) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringuserlogbulan" id="namtextsaringuserlogbulan">
					<option value=""> </option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringuserlogbulan) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringuserlogtahun" id="namtextsaringuserlogtahun">
					<option value=""> </option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringuserlogtahun) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
					<?php } ?>
				</select>
				</td>
			</tr>
			<script language="javascript" type="text/javascript">document.getElementById('namtextsaringuserlogtanggal').focus();</script>
			<tr>
				<td height="20">Jam:&nbsp;</td>
				<td>
				<select name="namtextsaringuserlogjam" id="namtextsaringuserlogjam">
					<option value=""> </option>
					<?php for ($h=0;$h<=23;$h++) { if ($h<10) { $h="0".$h; } ?>
					<option <?php if ($h==$namtextsaringuserlogjam) { echo("selected"); } ?> value="<?php echo($h); ?>"><?php echo($h); ?></option>
					<?php } ?>
				</select><select name="namtextsaringuserlogmenit" id="namtextsaringuserlogmenit">
					<option value=""> </option>
					<?php for ($mn=0;$mn<=59;$mn++) { if ($mn<10) { $mn="0".$mn; } ?>
					<option <?php if ($mn==$namtextsaringuserlogmenit) { echo("selected"); } ?> value="<?php echo($mn); ?>"><?php echo($mn); ?></option>
					<?php } ?>
				</select><select name="namtextsaringuserlogdetik" id="namtextsaringuserlogdetik">
					<option value=""> </option>
					<?php for ($s=0;$s<=59;$s++) { if ($s<10) { $s="0".$s; } ?>
					<option <?php if ($s==$namtextsaringuserlogdetik) { echo("selected"); } ?> value="<?php echo($s); ?>"><?php echo($s); ?></option>
					<?php } ?>
				</select>
				</td>
			</tr>
			<tr>
				<td height="20">Alamat IP:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="15" name="namtextsaringuserlogipadd" id="namtextsaringuserlogipadd" value="<?php echo($namtextsaringuserlogipadd); ?>"></td>
			</tr>
		</table></td>
		
		<td width="15"></td>
		
		<td><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20">ID Pengguna:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="19" name="namtextsaringuserloguserid" id="namtextsaringuserloguserid" value="<?php echo($namtextsaringuserloguserid); ?>"></td>
			</tr>
			<tr>
				<td height="20">Aksi:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="64" name="namtextsaringuserlogact" id="namtextsaringuserlogact" value="<?php echo($namtextsaringuserlogact); ?>"></td>
			</tr>
			<tr>
				<td height="20"></td>
				<td></td>
			</tr>
		</table></td>

		<td width="15"></td>
		
		<td><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20">Proses:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="8" name="namtextsaringuserlogproc" id="namtextsaringuserlogproc" value="<?php echo($namtextsaringuserlogproc); ?>"></td>
			</tr>
			<tr>
				<td height="20">Target:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="32" name="namtextsaringuserlogtar" id="namtextsaringuserlogtar" value="<?php echo($namtextsaringuserlogtar); ?>"></td>
			</tr>
			<tr>
				<td height="20"></td>
				<td></td>
			</tr>
		</table></td>

		<td width="15"></td>

		<td><div id="namdivfilterbutts"><table border="0" cellpadding="0" cellspacing="0" align="center">
			<tr><td><button class="clabuttshort" type="submit" name="nambuttonsaring"><strong>Proses</strong></button></td></tr>
			<tr><td><button class="clabuttshort" type="button" name="nambuttonbatalsaring" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel','namtextsaringuserlogipadd')">Ulang</button></td></tr>
		</table></div></td>

		</tr>
		
	</table></td></tr>
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
	<?php jar(); ?>
	<td width="110" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=plogtime&changesort=ok"); ?>','')">Waktu</a></td>
	<?php jar(); ?>
	<td width="90" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=plogipaddress&changesort=ok"); ?>','')">Alamat IP</a></td>
	<?php jar(); ?>
	<td width="120" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penggunaid&changesort=ok"); ?>','')">ID Pengguna</a></td>
	<?php jar(); ?>
	<td width="200" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=plogaction&changesort=ok"); ?>','')">Aksi</a></td>
	<?php jar(); ?>
	<td width="70" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=plogprocess&changesort=ok"); ?>','')">Proses</a></td>
	<?php jar(); ?>
	<td width="310" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=plogtargettable&changesort=ok"); ?>','')">Target</a></td>
	<?php jar(); ?>
	<?php jar(); ?>
</tr></table>

<?php funbox1000lblclose(); ?>
<?php funbox1000midopen($deflink); ?>

	<?php $result=mysql_num_rows($sort); ?>
	<?php while ($sortarray=mysql_fetch_array($sort)) { ?>

	<tr class="clawithiceon"><td><table border="0" cellpadding="0" cellspacing="0" class="clanormall">
		<tr>
	<?php jar(); ?>
		<td width="110" height="15" align="left" style="max-width:110px; overflow:hidden;"><?php echo($sortarray["plogtime"]); ?></td>
	<?php jar(); ?>
		<td width="90" align="left" style="max-width:90px; overflow:hidden;"><?php echo($sortarray["plogipaddress"]); ?></td>
	<?php jar(); ?>
		<td width="120" align="left" style="max-width:120px; overflow:hidden;"><?php echo($sortarray["penggunaid"]); ?></td>
	<?php jar(); ?>
		<td width="200" align="left" style="max-width:200px; overflow:hidden;"><?php echo($sortarray["plogaction"]); ?></td>
	<?php jar(); ?>
		<td width="70" align="left" style="max-width:70px; overflow:hidden;"><?php echo($sortarray["plogprocess"]."(".$sortarray["plogprocessstatus"].")"); ?></td>
	<?php jar(); ?>
		<td width="310" align="left" style="max-width:310px; overflow:hidden;"><?php echo($sortarray["plogtargettable"]); if (!empty($sortarray["plogtargetid"])) { echo(".".$sortarray["plogtargetid"]); } ?></td>
	<?php jar(); ?>
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
