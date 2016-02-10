<!-- BEGINNING OF: DIVMAINSUB -->
<table border="0" cellpadding="0" cellspacing="0">
<tr>

<td width="500" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox500lblopen($deflink); ?>Ubah Sumber Data <blink>*PERINGATAN*</blink><?php funbox500lblclose(); ?>
<?php funbox500midopen($deflink); ?>

<?php funrow(5); ?>

<tr>
<td width="5"></td><!-- BUFFER KIRI -->

<!-- BOF: ISI (BUFFER TENGAH) -->
<td><table border="0" cellpadding="0" cellspacing="0">

<!-- BOF: UBAHLAH -->
<tr><td><table cellpadding="0" cellspacing="0" border="0">
<tr>


<td><table cellpadding="0" cellspacing="0" border="0" class="clainputan">
<input type="hidden" id="namtextoripenumpangnama">
<input type="hidden" id="namtextoripenumpangjeniskelamin">
<input type="hidden" id="namtextoripenumpangwaktulahir">
<input type="hidden" id="namtextoripenumpangpasporno">
<tr>
	<td>Nama Penumpang:&nbsp;</td>
	<td><input type="text" style="width:260px;" maxlength="64" name="namtextubahpenumpangnama" id="namtextubahpenumpangnama"></td>
</tr>
<tr>
	<td>Jenis Kelamin:&nbsp;</td>
	<td><select style="width:100px;" name="namtextubahpenumpangjeniskelamin" id="namtextubahpenumpangjeniskelamin">
		<option value=""></option>
		<option <?php if ($namtextubahpenumpangjeniskelamin=="L") { echo("selected"); } ?> value="L">Laki-laki</option>
		<option <?php if ($namtextubahpenumpangjeniskelamin=="P") { echo("selected"); } ?> value="P">Perempuan</option>
	</select></td>
</tr>
<tr>
	<td>Tanggal Lahir:&nbsp;</td>
	<td><select name="namtextubahpenumpangwaktulahirtanggal" id="namtextubahpenumpangwaktulahirtanggal">
		<option value=""></option>
		<?php for ($d=1;$d<=31;$d++) { if ($d<10) { $d="0".$d; } ?>
		<option <?php if ($d==$namtextubahpenumpangwaktulahirtanggal) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
		<?php } ?>
	</select>
	-
	<select name="namtextubahpenumpangwaktulahirbulan" id="namtextubahpenumpangwaktulahirbulan">
		<option value=""></option>
		<?php for ($m=1;$m<=12;$m++) { if ($m<10) { $m="0".$m; } ?>
		<option <?php if ($m==$namtextubahpenumpangwaktulahirbulan) { echo("selected"); } ?> value="<?php echo($m); ?>"><?php echo($m); ?></option>
		<?php } ?>
	</select>
	-
	<select name="namtextubahpenumpangwaktulahirtahun" id="namtextubahpenumpangwaktulahirtahun">
		<option value=""></option>
		<?php for ($y=date("Y");$y>=date("Y")-100;$y--) { ?>
		<option <?php if ($y==$namtextubahpenumpangwaktulahirtahun) { echo("selected"); } ?> value="<?php echo($y); ?>"><?php echo($y); ?></option>
		<?php } ?>
	</select></td>
</tr>
<tr>
	<td>No. Paspor:&nbsp;</td>
	<td><input type="text" style="width:150px;" maxlength="32" name="namtextubahpenumpangpasporno" id="namtextubahpenumpangpasporno"></td>
</tr>
<?php
$formfetchercarrierubah=
	"namsubmitubahdatapribadipenumpang=ok&".
	"namtextoripenumpangnama='+document.getElementById('namtextoripenumpangnama').value+'&".
	"namtextoripenumpangjeniskelamin='+document.getElementById('namtextoripenumpangjeniskelamin').value+'&".
	"namtextoripenumpangwaktulahir='+document.getElementById('namtextoripenumpangwaktulahir').value+'&".
	"namtextoripenumpangpasporno='+document.getElementById('namtextoripenumpangpasporno').value+'&".
	"namtextubahpenumpangnama='+document.getElementById('namtextubahpenumpangnama').value+'&".
	"namtextubahpenumpangjeniskelamin='+document.getElementById('namtextubahpenumpangjeniskelamin').value+'&".
	"namtextubahpenumpangwaktulahirtanggal='+document.getElementById('namtextubahpenumpangwaktulahirtanggal').value+'&".
	"namtextubahpenumpangwaktulahirbulan='+document.getElementById('namtextubahpenumpangwaktulahirbulan').value+'&".
	"namtextubahpenumpangwaktulahirtahun='+document.getElementById('namtextubahpenumpangwaktulahirtahun').value+'&".
	"namtextubahpenumpangpasporno='+document.getElementById('namtextubahpenumpangpasporno').value+'&";
?>
</table></td>


</tr>
</table></td></tr>
<!-- EOF: UBAHLAH -->

</table></td>
<!-- EOF: ISI (BUFFER TENGAH) -->

<td width="5"></td><!-- BUFFER KANAN -->
</tr>

<?php funrow(10); ?>

<!-- BOF: PANEL SUBMIT -->
<tr><td colspan="3"><div id="namdivpanelsubmitbuat"><table cellpadding="0" cellspacing="0" border="0" class="clasoftback">
<tr><td width="472" height="1" align="center" class="clagreyline"></td></tr>
<tr><td height="7"></td></tr>

<tr><td><table cellpadding="0" cellspacing="0" border="0"><tr>
<td width="100" align="center">
</td>
<td width="288" align="center" class="clabuttbig">
<button type="button" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswfitur02&<?php echo($carrier."&".$carriersort."&".$formfetchercarrierubah."&linfiturperiodeawal=".$linfiturperiodeawal."&linfiturperiodeakhir=".$linfiturperiodeakhir); ?>','')"><strong>Ubah</strong></button>
</td>
<td width="100" align="center">
<div class="clatautkembali" onClick="document.getElementById('namdivubahatensi2').style.display='none';">Tutup&#8250;&#8249;</div>
</td>
</tr></table></td></tr>

<tr><td height="7"></td></tr>
<tr><td width="472" height="1" align="center" class="clagreyline"></td></tr>
</table></div></td></tr>
<!-- EOF: PANEL SUBMIT -->


<?php funbox500midclose(); ?>
<?php funbox500bot($deflink); ?>
</table></td>




</tr>


</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

<!-- END OF: DIVMAINSUB -->
