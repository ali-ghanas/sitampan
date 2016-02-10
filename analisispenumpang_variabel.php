<!-- BEGINNING OF: DIVMAINSUB -->
<table border="0" cellpadding="0" cellspacing="0">
<tr>

<td width="500" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox500lblopen($deflink); ?>Atur Variabel Analisis<?php funbox500lblclose(); ?>
<?php funbox500midopen($deflink); ?>

<?php funrow(5); ?>
<tr>
<td width="5"></td><!-- BUFFER KIRI -->

<!-- BOF: ISI (BUFFER TENGAH) -->
<td><table border="0" cellpadding="0" cellspacing="0">



<!-- BOF: ROWPERIODE -->
<tr><td><div id=""><table cellpadding="0" cellspacing="0" border="0">
<tr>


<td><table cellpadding="0" cellspacing="0" border="0" class="clainputan">
</table></td>


</tr>
</table></div></td></tr>
<!-- EOF: ROWPERIODE -->



<tr><td><table cellpadding="0" cellspacing="0" border="0" class="clanavigator">
	<?php funrow(23); ?>
	<tr><td width="10"></td><td><div onclick="funhiddenobj('namdivrowcekbok');"><strong>Metode Identifikasi Identitas</strong></div></td></tr>
	<tr><td width="10"></td><td width="442" height="1" align="center" class="clagreyline"></td></tr>
	<?php funrow(10); ?>
</table></td></tr>



<!-- BOF: ROWCEKBOK -->
<tr><td><div id="namdivrowcekbok" style=""><table cellpadding="0" cellspacing="0" border="0">
<tr>


<td><table cellpadding="0" cellspacing="0" border="0">
	<tr><td><table border="0" cellpadding="0" cellspacing="0" class="clainputan">
		<tr>
			<td><input type="checkbox" name="namtextsaringvariabel1" id="namtextsaringvariabel1" <?php if (!empty($hidenamtextsaringvariabel[1])) { echo("checked"); } ?> value="penumpangnama" onClick="funcekhide('namtextsaringvariabel1','hidenamtextsaringvariabel1');"></td>
			<input type="hidden" id="hidenamtextsaringvariabel1" name="hidenamtextsaringvariabel1" value="<?php if (!empty($hidenamtextsaringvariabel[1])) { echo($hidenamtextsaringvariabel[1]); } ?>">
			<td>Nama</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="namtextsaringvariabel2" id="namtextsaringvariabel2" <?php if (!empty($hidenamtextsaringvariabel[2])) { echo("checked"); } ?> value="penumpangpasporno" onClick="funcekhide('namtextsaringvariabel2','hidenamtextsaringvariabel2');"></td>
			<input type="hidden" id="hidenamtextsaringvariabel2" name="hidenamtextsaringvariabel2" value="<?php if (!empty($hidenamtextsaringvariabel[2])) { echo($hidenamtextsaringvariabel[2]); } ?>">
			<td>No. Paspor</td>
		</tr>
	</table></td></tr>
</table></td>

<td><table cellpadding="0" cellspacing="0" border="0">
	<tr><td><table border="0" cellpadding="0" cellspacing="0" class="clainputan">
		<tr>
			<td><input type="checkbox" name="namtextsaringvariabel3" id="namtextsaringvariabel3" <?php if (!empty($hidenamtextsaringvariabel[3])) { echo("checked"); } ?> value="penumpangjeniskelamin" onClick="funcekhide('namtextsaringvariabel3','hidenamtextsaringvariabel3');"></td>
			<input type="hidden" id="hidenamtextsaringvariabel3" name="hidenamtextsaringvariabel3" value="<?php if (!empty($hidenamtextsaringvariabel[3])) { echo($hidenamtextsaringvariabel[3]); } ?>">
			<td>Jenis Kelamin</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="namtextsaringvariabel4" id="namtextsaringvariabel4" <?php if (!empty($hidenamtextsaringvariabel[4])) { echo("checked"); } ?> value="penumpangkebangsaan" onClick="funcekhide('namtextsaringvariabel4','hidenamtextsaringvariabel4');"></td>
			<input type="hidden" id="hidenamtextsaringvariabel4" name="hidenamtextsaringvariabel4" value="<?php if (!empty($hidenamtextsaringvariabel[4])) { echo($hidenamtextsaringvariabel[4]); } ?>">
			<td>Kebangsaan</td>
		</tr>
	</table></td></tr>
</table></td>

<td valign="top"><table cellpadding="0" cellspacing="0" border="0">
	<tr><td><table border="0" cellpadding="0" cellspacing="0" class="clainputan">
		<tr>
			<td><input type="checkbox" name="namtextsaringvariabel5" id="namtextsaringvariabel5" <?php if (!empty($hidenamtextsaringvariabel[5])) { echo("checked"); } ?> value="penumpangwaktulahir" onClick="funcekhide('namtextsaringvariabel5','hidenamtextsaringvariabel5');"></td>
			<input type="hidden" id="hidenamtextsaringvariabel5" name="hidenamtextsaringvariabel5" value="<?php if (!empty($hidenamtextsaringvariabel[5])) { echo($hidenamtextsaringvariabel[5]); } ?>">
			<td>Tgl. Lahir</td>
		</tr>
	</table></td></tr>
</table></td>

<?php for ($x=1;$x<=5;$x++) {
	$formfetchercarriersaringvariabel=$formfetchercarriersaringvariabel.
	"hidenamtextsaringvariabel[".$x."]='+document.getElementById('hidenamtextsaringvariabel".$x."').value+'&";
} 
$filefetchercarriersaring.=$formfetchercarriersaringvariabel;
?>

</tr>
</table></div></td></tr>
<!-- EOF: ROWCEKBOK -->





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
<td width="228" align="center" class="clabuttbig">
<button type="button" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort."&".$filefetchercarriersaring); ?>','namtextsaringpenumpangnama')"><strong>Atur</strong></button>
</td>
</tr></table></td></tr>

<tr><td height="7"></td></tr>
<tr><td width="472" height="1" align="center" class="clagreyline"></td></tr>
</table></div></td></tr>
<!-- EOF: PANEL SUBMIT -->

<?php funbox500midclose(); ?>
<?php funbox500bot($deflink); ?>
</table></td>

<?php funrow(40); ?>



</tr>


</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

<!-- END OF: DIVMAINSUB -->
