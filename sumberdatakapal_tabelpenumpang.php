<!-- BEGINNING OF: DIVMAIN -->
<table border="0" cellpadding="0" cellspacing="0">

<!-- BOF: CONTROL PANEL -->
<tr><td width="1000" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox1000top($deflink); ?>
<?php funbox1000midopen($deflink); ?>


<!-- BEGINNING OF: ROW ATAS (ROWSPAN) -->
<tr>
<td rowspan="3" width="130" valign="top"><div style="cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namtdbigbutts,namdivfilterbutts');"><img src="<?php echo($deflink); ?>slices/forsumberdatakapal.jpg"></div></td><!-- ILLUSTRATION (ROWSPAN HERE) -->

<td width="842" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<tr><td><table border="0" cellpadding="0" cellspacing="0"><tr>
	<td width="350" height="25" class="clabiggie"><?php include("sumberdatakapal_pilihsubmenu.php"); ?></td>
	<td width="30"></td>
	<td id="namtdbigbutts" width="450" valign="top"><table border="0" cellpadding="0" cellspacing="0" align="right"><tr>
		<td width="10"></td>
	</tr></table></td>
</tr></table></td></tr>

<tr><td width="842" height="1" align="center" class="clagreyline"></td></tr>
</table></td>

</tr>
<!-- END OF: ROW ATAS (ROWSPAN) -->





<!-- BOF: ROW TENGAH (PANEL FILTER) -->
<tr valign="top" class="clawithsofton"><td width="842">
<form action="javascript:funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&".$filefetchercarriersaringpenumpang); ?>','namtextsaringshipname')">
<table border="0" cellpadding="0" cellspacing="0">
	<tr><td height="2"></td></tr>
	<tr><td><table border="0" cellpadding="0" cellspacing="0" class="claborderinset">

		<tr>

		<td><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="20">Nama Penumpang:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="64" name="namtextsaringpenumpangnama" id="namtextsaringpenumpangnama" value="<?php echo($namtextsaringpenumpangnama); ?>"></td>
			</tr>
			<script language="javascript" type="text/javascript">document.getElementById('namtextsaringpenumpangnama').focus();</script>
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
				<td height="20">No. Paspor:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="32" name="namtextsaringpenumpangpasporno" id="namtextsaringpenumpangpasporno" value="<?php echo($namtextsaringpenumpangpasporno); ?>"></td>
			</tr>
			<tr>
				<td height="20">Tempat Diterbitkan:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="32" name="namtextsaringpenumpangpasporpoi" id="namtextsaringpenumpangpasporpoi" value="<?php echo($namtextsaringpenumpangpasporpoi); ?>"></td>
			</tr>
			<tr>
				<td height="20">Waktu Diterbitkan:&nbsp;</td>
				<td>
				<select name="namtextsaringpenumpangpaspordoitanggal" id="namtextsaringpenumpangpaspordoitanggal">
					<option value=""></option>
					<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
					<option <?php if ($d==$namtextsaringpenumpangpaspordoitanggal) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
					<?php } ?>
				</select><select name="namtextsaringpenumpangpaspordoibulan" id="namtextsaringpenumpangpaspordoibulan">
					<option value=""></option>
					<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
					<option <?php if ($m==$namtextsaringpenumpangpaspordoibulan) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
					<?php } ?>
				</select><select name="namtextsaringpenumpangpaspordoitahun" id="namtextsaringpenumpangpaspordoitahun">
					<option value=""></option>
					<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
					<option <?php if ($y==$namtextsaringpenumpangpaspordoitahun) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
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
				<td height="20">Keterangan:&nbsp;</td>
				<td><input type="text" style="width:150px;" maxlength="64" name="namtextsaringpenumpangremarks" id="namtextsaringpenumpangremarks" value=<?php echo($namtextsaringpenumpangremarks); ?>></td>
			</tr>
			<tr>
				<td height="20"></td>
			</tr>
		</table></td>
		
		<td width="15"></td>

		<td><div id="namdivfilterbutts"><table border="0" cellpadding="0" cellspacing="0" align="center">
			<tr><td><button class="clabuttshort" type="submit" name="nambuttonsaring"><strong>Proses</strong></button></td></tr>
			<tr><td><button class="clabuttshort" type="button" name="nambuttonbatalsaring" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang','namtextsaringshipname')">Ulang</button></td></tr>
		</table></div></td>

		</tr>
		
	</table></td></tr>
	<tr><td height="2"></td></tr>
</table>
</form>
</td></tr>
<!-- EOF: ROW TENGAH (PANEL FILTER) -->






<!-- BEGINNING OF: ROW BAWAH (PANEL NAVIGASI)-->
<tr valign="bottom"><td><form action="javascript:funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&hal='+hal.value+'&<?php echo("limit=".$limit."&".$carriersort."&".$carrier."&sortlist=".$sortlist."&orderlist=".$orderlist); ?>','limit')"><table border="0" cellpadding="0" cellspacing="0" class="claborderinset">

<tr><td width="842" height="1" align="center" class="clagreyline"></td></tr>

<tr class="clawithsofton"><td><table border="0" cellpadding="0" cellspacing="0"><tr>
	<td width="140" height="25" align="center">
	Data:&nbsp;<strong><?php echo($rjml); ?></strong>
	</td>
	<?php jar(); ?>
	<td width="100" align="center">
	Batas:&nbsp;
	<select name="limit" id="limit" style="width:50px;" onChange="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&limit='+limit.value+'&<?php echo($carrier."&page=".$page."&limitawal=".$limitawal."&sortlist=".$sortlist."&orderlist=".$orderlist); ?>','limit')">
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
	Halaman:&nbsp;<input type="text" style="width:40px; text-align:right;" name="hal" id="hal" value="<?php echo($hal); ?>" onChange="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&hal='+hal.value+'&<?php echo($carriersort."&".$carrier."&sortlist=".$sortlist."&orderlist=".$orderlist); ?>','limit')"> / <?php echo($jmlhal); ?>
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
	<td width="170" align="left"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangnama&changesort=ok"); ?>','')">Nama Penumpang</a></td>
	<?php jar(); ?>
	<td width="30" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangjeniskelamin&changesort=ok"); ?>','')">L/P</a></td>
	<?php jar(); ?>
	<td width="70" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangwaktulahir&changesort=ok"); ?>','')">Tgl. Lahir</a></td>
	<?php jar(); ?>
	<td width="90" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangkebangsaan&changesort=ok"); ?>','')">Kebangsaan</a></td>
	<?php jar(); ?>
	<td width="110" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangpasporno&changesort=ok"); ?>','')">No. Paspor</a></td>
	<?php jar(); ?>
	<td width="100" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangpasporpoi&changesort=ok"); ?>','')">Tempat<br>Diterbitkan</a></td>
	<?php jar(); ?>
	<td width="70" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangpaspordoi&changesort=ok"); ?>','')">Waktu<br>Diterbitkan</a></td>
	<?php jar(); ?>
	<td width="95" align="center"><a href="#" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&sortlist=".$sortlist."&oldorderlist=".$orderlist."&orderlist=penumpangremarks&changesort=ok"); ?>','')">Keterangan</a></td>
	<?php jar(); ?>
	<?php jar(); ?>
</tr></table>

<?php funbox1000lblclose(); ?>
<?php funbox1000midopen($deflink); ?>

	<?php $result=mysql_num_rows($sort); ?>
	<?php while ($sortarray=mysql_fetch_array($sort)) { ?>

	<tr class="clawithiceon"><td><table border="0" cellpadding="0" cellspacing="0" class="clanormall">
		<tr>
		<td width="40" height="20" align="center"><?php echo(wordwrap("$line",6,"\n",true)); ?>.</td>
	<?php jar(); ?>
		<td width="170" align="left" style="max-width:170px; overflow:hidden;"><?php echo($sortarray["penumpangnama"]); ?></td>
	<?php jar(); ?>
		<td width="30" align="center"><?php echo($sortarray["penumpangjeniskelamin"]); ?></td>
	<?php jar(); ?>
		<td width="70" align="center" style="max-width:70px; overflow:hidden;"><?php echo(funconvtanggalmiring($sortarray["penumpangwaktulahir"])); ?></td>
	<?php jar(); ?>
		<td width="90" align="center" style="max-width:90px; overflow:hidden;"><?php echo($sortarray["penumpangkebangsaan"]); ?></td>
	<?php jar(); ?>
		<td width="110" align="center" style="max-width:110px; overflow:hidden;"><?php echo($sortarray["penumpangpasporno"]); ?></td>
	<?php jar(); ?>
		<td width="100" align="center" style="max-width:100px; overflow:hidden;"><?php echo($sortarray["penumpangpasporpoi"]); ?></td>
	<?php jar(); ?>
		<td width="70" align="center" style="max-width:70px; overflow:hidden;"><?php if ($sortarray["penumpangpaspordoi"]!="0000-00-00") { echo(funconvtanggalmiring($sortarray["penumpangpaspordoi"])); } ?></td>
	<?php jar(); ?>
		<td width="95" align="center" style="max-width:95px; overflow:hidden;"><?php echo($sortarray["penumpangremarks"]); ?></td>
	<?php jar(); ?>
	<?php jar(); ?>
		<td><table border="0" cellpadding="0" cellspacing="0"><tr>
			<td><div class="clatautubah" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswubahpenumpang&<?php echo($carrier."&".$carriersort."&linubahsumberdata=".$sortarray["sumberid"]."&linubahpenumpangnama=".$sortarray["penumpangnama"]."&linubahpenumpangjeniskelamin=".$sortarray["penumpangjeniskelamin"]."&linubahpenumpangwaktulahir=".$sortarray["penumpangwaktulahir"]."&linubahpenumpangpasporno=".$sortarray["penumpangpasporno"]."&linubahpenumpangkebangsaan=".$sortarray["penumpangkebangsaan"]); ?>','namtextubahpenumpangnama')">Lihat</div></td>
		</tr></table></td>
	<?php jar(); ?>
		<td><table border="0" cellpadding="0" cellspacing="0"><tr>
			<td><div class="clatauthapus" onClick="funconfirmdelete('<?php echo($filefetcher); ?>','tandahapus=2&ffswitch=ffswtabelpenumpang&<?php echo($carrier."&".$carriersort."&linhapussumberdata=".$sortarray["sumberid"]."&linhapuspenumpangnama=".$sortarray["penumpangnama"]."&linhapuspenumpangjeniskelamin=".$sortarray["penumpangjeniskelamin"]."&linhapuspenumpangwaktulahir=".$sortarray["penumpangwaktulahir"]."&linhapuspenumpangpasporno=".$sortarray["penumpangpasporno"]."&linhapuspenumpangkebangsaan=".$sortarray["penumpangkebangsaan"]); ?>','<?php echo($statusding[31].$sortarray["penumpangnama"]); echo(", ".$sortarray["penumpangjeniskelamin"]); echo(", ".$sortarray["penumpangwaktulahir"]); ?>')">Hapus</div></td>
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

<!-- END OF: DIVMAIN -->

