<!-- BEGINNING OF: DIVMAINSUB -->
<form action="javascript:funffdivmainsub('<?php echo($filefetcher); ?>','<?php echo($carrier."&".$carriersort."&proses=buatdata&".$filefetchercarrierbuat); ?>','namtextbuatpenumpangnama')">
<table border="0" cellpadding="0" cellspacing="0">
<tr>

<td width="750" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox750lblopen($deflink); ?>Data Penumpang<?php funbox750lblclose(); ?>
<?php funbox750midopen($deflink); ?>
<?php funrow(13); ?>

<tr>
<td width="14"></td><!-- BUFFER KIRI -->

<!-- BOF: ISI (BUFFER TENGAH) -->
<td><table border="0" cellpadding="0" cellspacing="0">


<!-- BOF: ROW 1: DATA DAN FOTO -->
<tr><td><table cellpadding="0" cellspacing="0" border="0">
<tr>


<td><table cellpadding="0" cellspacing="0" border="0" class="clainputan">
	<tr>
		<td>Nama Penumpang:&nbsp;</td>
		<td><input type="text" style="width:260px;" maxlength="64" name="namtextbuatpenumpangnama" id="namtextbuatpenumpangnama" value="<?php if ($proses!="buatdata") { echo($buatpenumpangnama); } ?>">&nbsp;<span style="color:#cc0000;">*</span></td>
		<td><?php funhelptip(2); ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin:&nbsp;</td>
		<td><select style="width:100px;" name="namtextbuatpenumpangjeniskelamin" id="namtextbuatpenumpangjeniskelamin">
			<option value=""></option>
			<option <?php if ($proses!="buatdata"&&$buatpenumpangjeniskelamin=="L") { echo("selected"); } ?> value="L">Laki-laki</option>
			<option <?php if ($proses!="buatdata"&&$buatpenumpangjeniskelamin=="P") { echo("selected"); } ?> value="P">Perempuan</option>
		</select>&nbsp;<span style="color:#cc0000;">*</span></td>
		<td><?php funhelptip(3); ?></td>
	</tr>
	<tr>
		<td>Tempat Lahir:&nbsp;</td>
		<td><input type="text" style="width:260px;" maxlength="32" name="namtextbuatpenumpangtempatlahir" id="namtextbuatpenumpangtempatlahir" value="<?php if ($proses!="buatdata") { echo($buatpenumpangtempatlahir); } ?>"></td>
		<td><?php funhelptip(4); ?></td>
	</tr>
	<tr>
		<td>Waktu Lahir:&nbsp;</td>
		<td><select name="namtextbuatpenumpangwaktulahirtanggal" id="namtextbuatpenumpangwaktulahirtanggal">
			<option value=""></option>
			<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
			<option <?php if ($proses!="buatdata"&&$d==$buatpenumpangwaktulahirtanggal) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
			<?php } ?>
			</select>
			-
			<select name="namtextbuatpenumpangwaktulahirbulan" id="namtextbuatpenumpangwaktulahirbulan">
			<option value=""></option>
			<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
			<option <?php if ($proses!="buatdata"&&$m==$buatpenumpangwaktulahirbulan) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
			<?php } ?>
			</select>
			-
			<select name="namtextbuatpenumpangwaktulahirtahun" id="namtextbuatpenumpangwaktulahirtahun">
			<option value=""></option>
			<?php for ($y=date("Y");$y>=date("Y")-200;$y--) { ?>
			<option <?php if ($proses!="buatdata"&&$y==$buatpenumpangwaktulahirtahun) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
			<?php } ?>
			</select></td>
		<td><?php funhelptip(5); ?></td>
	</tr>
	<tr>
		<td>Agama:&nbsp;</td>
		<td><input type="text" style="width:260px;" maxlength="32" name="namtextbuatpenumpangagama" id="namtextbuatpenumpangagama" value="<?php if ($proses!="buatdata") { echo($buatpenumpangagama); } ?>"></td>
		<td><?php funhelptip(6); ?></td>
	</tr>
	<tr>
		<td>Alamat:&nbsp;</td>
		<td><textarea style="width:260px; height:50px;" id="namtextbuatpenumpangalamatjalan" name="namtextbuatpenumpangalamatjalan"><?php if ($proses!="buatdata") { echo($buatpenumpangalamatjalan); } ?></textarea></td>
		<td><?php funhelptip(10); ?></td>
	</tr>
	<tr>
		<td>Kota:&nbsp;</td>
		<td><input type="text" style="width:260px;" maxlength="32" name="namtextbuatpenumpangalamatkota" id="namtextbuatpenumpangalamatkota" value="<?php if ($proses!="buatdata") { echo($buatpenumpangalamatkota); } ?>"></td>
		<td><?php funhelptip(11); ?></td>
	</tr>
	<tr>
		<td>Kode Pos:&nbsp;</td>
		<td><input type="text" style="width:70px;" maxlength="6" name="namtextbuatpenumpangalamatkodepos" id="namtextbuatpenumpangalamatkodepos" value="<?php if ($proses!="buatdata") { echo($buatpenumpangalamatkodepos); } ?>"></td>
		<td><?php funhelptip(12); ?></td>
	</tr>
	<tr>
		<td>Telepon:&nbsp;</td>
		<td><input type="text" style="width:260px;" maxlength="16" name="namtextbuatpenumpangalamatnotel" id="namtextbuatpenumpangalamatnotel" value="<?php if ($proses!="buatdata") { echo($buatpenumpangalamatnotel); } ?>"></td>
		<td><?php funhelptip(13); ?></td>
	</tr>
	<tr>
		<td>Status:&nbsp;</td>
		<td><input type="text" style="width:260px;" maxlength="32" name="namtextbuatpenumpangatensistatus" id="namtextbuatpenumpangatensistatus" value="<?php if ($proses!="buatdata") { echo($namtextbuatpenumpangatensistatus); } ?>"></td>
		<td><?php funhelptip(24); ?></td>
	</tr>
	<tr>
		<td>Keterangan:&nbsp;</td>
		<td><textarea style="width:260px; height:50px;" id="namtextbuatpenumpangatensiketerangan" name="namtextbuatpenumpangatensiketerangan"><?php if ($proses!="buatdata") { echo($namtextbuatpenumpangatensiketerangan); } ?></textarea></td>
		<td><?php funhelptip(31); ?></td>
	</tr>
</table></td>

<td width="60"></td>

<td valign="top"><table cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"></td></tr>
<tr><td width="160" height="240" style="max-width:160px; max-height:240px;" align="center">
<?php
if ($proses=="buatdata") {
	unset($_POST["namtexttmplokasifotobinary1"]);
	unset($_POST["namtexttmplokasifotobinary2"]);
	unset($_POST["namtexttypefoto"]);
}
?>
<iframe width="160" height="270" scrolling="no" style="max-width:160px; max-height:270px;" name="namiframefoto" id="namiframefoto" src="identifikasipenumpang_foto.php?<?php echo("tmplokasifotobinary1=".$_POST["namtexttmplokasifotobinary1"]."&tmplokasifotobinary2=".$_POST["namtexttmplokasifotobinary2"]."&tmptype=".$_POST["namtexttypefoto"]."&tmptampil=".$_POST["namtexttmplokasifotobinary1"]); ?>"></iframe>
</td></tr>
</table></td>


</tr>
</table></td></tr>
<!-- EOF: ROW 1: DATA DAN FOTO -->



<tr><td><table cellpadding="0" cellspacing="0" border="0" class="clanavigator">
	<?php funrow(23); ?>
	<tr><td width="10"></td><td><div onclick="funhiddenobj('namdivdatapnppaspor');"><strong>Paspor</strong></div></td></tr>
	<tr><td width="10"></td><td width="670" height="1" align="center" class="clagreyline"></td></tr>
	<?php funrow(10); ?>
</table></td></tr>


<!-- BOF: ROWPASPOR -->
<tr><td><table cellpadding="0" cellspacing="0" border="0">
<tr>


<td valign="top"><table cellpadding="0" cellspacing="0" border="0" class="clainputan">
	<tr>
		<td>No. Paspor:&nbsp;</td>
		<td><input type="text" style="width:260px;" maxlength="16" name="namtextbuatpenumpangpasporno" id="namtextbuatpenumpangpasporno" value="<?php if ($proses!="buatdata") { echo($namtextbuatpenumpangpasporno); } ?>"></td>
		<td><?php funhelptip(21); ?></td>
	</tr>
	<tr>
		<td>Tempat Diterbitkan:&nbsp;</td>
		<td><input type="text" style="width:260px;" maxlength="32" name="namtextbuatpenumpangpasporpoi" id="namtextbuatpenumpangpasporpoi" value="<?php if ($proses!="buatdata") { echo($namtextbuatpenumpangpasporpoi); } ?>"></td>
		<td><?php funhelptip(22); ?></td>
	</tr>
	<tr>
		<td>Tanggal Diterbitkan:&nbsp;</td>
		<td><select name="namtextbuatpenumpangpaspordoitanggal" id="namtextbuatpenumpangpaspordoitanggal">
			<option value=""></option>
			<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
			<option <?php if ($proses!="buatdata"&&$d==$namtextbuatpenumpangpaspordoitanggal) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
			<?php } ?>
			</select>
			-
			<select name="namtextbuatpenumpangpaspordoibulan" id="namtextbuatpenumpangpaspordoibulan">
			<option value=""></option>
			<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
			<option <?php if ($proses!="buatdata"&&$m==$namtextbuatpenumpangpaspordoibulan) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
			<?php } ?>
			</select>
			-
			<select name="namtextbuatpenumpangpaspordoitahun" id="namtextbuatpenumpangpaspordoitahun">
			<option value=""></option>
			<?php for ($y=date("Y");$y>=date("Y")-200;$y--) { ?>
			<option <?php if ($proses!="buatdata"&&$y==$namtextbuatpenumpangpaspordoitahun) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
			<?php } ?>
			</select></td>
		<td><?php funhelptip(23); ?></td>
	</tr>
	<tr>
		<td>Kebangsaan:&nbsp;</td>
		<td><input type="text" style="width:260px;" maxlength="32" name="namtextbuatpenumpangkebangsaan" id="namtextbuatpenumpangkebangsaan" value="<?php if ($proses!="buatdata") { echo($namtextbuatpenumpangkebangsaan); } ?>"></td>
		<td><?php funhelptip(24); ?></td>
	</tr>
	<tr>
		<td>Ciri-ciri:&nbsp;</td>
		<td><textarea style="width:260px; height:50px;" id="namtextbuatpenumpangciriciri" name="namtextbuatpenumpangciriciri"><?php if ($proses!="buatdata") { echo($namtextbuatpenumpangciriciri); } ?></textarea></td>
		<td><?php funhelptip(31); ?></td>
	</tr>
</table></td>

<td width="60"></td>

<td valign="top"><table cellpadding="0" cellspacing="0" border="0">
<tr><td width="160" height="240" style="max-width:160px; max-height:240px;" align="center">
<?php
if ($proses=="buatdata") {
	unset($_POST["namtexttmplokasifotopasporbinary1"]);
	unset($_POST["namtexttmplokasifotopasporbinary2"]);
	unset($_POST["namtexttypefotopaspor"]);
}
?>
<iframe width="160" height="270" scrolling="no" style="max-width:160px; max-height:270px;" name="namiframefotopaspor" id="namiframefotopaspor" src="identifikasipenumpang_fotopaspor.php?<?php echo("tmplokasifotobinary1=".$_POST["namtexttmplokasifotopasporbinary1"]."&tmplokasifotobinary2=".$_POST["namtexttmplokasifotopasporbinary2"]."&tmptype=".$_POST["namtexttypefotopaspor"]."&tmptampil=".$_POST["namtexttmplokasifotopasporbinary1"]); ?>"></iframe>
</td></tr>
</table></td>


</tr>
</table></td></tr>
<!-- EOF: ROWPASPOR -->





</table></td>
<!-- EOF: ISI (BUFFER TENGAH) -->



<td></td><!-- BUFFER KANAN -->
</tr>

<?php funrow(40); ?>

<!-- BOF: PANEL SUBMIT -->
<tr><td colspan="3"><div id="namdivpanelsubmitbuat"><table cellpadding="0" cellspacing="0" border="0" class="clasoftback">
<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>
<tr><td height="7"></td></tr>

<tr><td><table cellpadding="0" cellspacing="0" border="0"><tr>
<td width="100" align="center">
</td>
<td width="538" align="center" class="clabuttbig">
<button type="submit" name="namsubmitbuatdatapribadipenumpang"><strong>Buat Baru</strong></button>
&nbsp;
<button type="button" onClick="funffdivmainsub('<?php echo($filefetcher); ?>','ffswbuatcase=saatproses&<?php echo($carrier."&".$carriersort); ?>','namtextbuatpenumpangnama')">Ulang</button>
</td>
<td width="100" align="center">
<div class="clatautkembali" id="divkembali" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort); ?>','namtextsaringpenumpangnama')">Kembali&#8250;</div>
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

<tr><td><div style="cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namdivpanelsubmitbuat');"><img src="<?php echo($deflink); ?>slices/foridentifikasipenumpang.jpg"></div></td></tr>
<tr><td height="25" class="clabiggie"><?php echo($nambiggie[text]); ?></td></tr>
<tr><td width="222" height="1" align="center" class="clagreyline"></td></tr>

<?php funbox250midclose(); ?>
<?php funbox250bot($deflink); ?>
</table></td>


<?php funrow(40); ?>



</tr>


</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

</form>
<!-- END OF: DIVMAINSUB -->
