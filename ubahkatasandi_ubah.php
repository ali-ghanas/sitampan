<!-- BEGINNING OF: DIVMAINSUB -->
<?php
$selectfromtblpengguna=mysql_query("select * from tblpengguna where penggunaid='".$linubahdatapengguna."' limit 1");
$selectfromtblpenggunaarray=mysql_fetch_array($selectfromtblpengguna);
?>
<form action="javascript:funffdivmainsub('<?php echo($filefetcher); ?>','<?php echo($carrier."&".$carriersort."&linubahdatapengguna=".$linubahdatapengguna."&".$filefetchercarrierubah); ?>','namtextubahpenggunaid')" autocomplete="off">
<table border="0" cellpadding="0" cellspacing="0">
<tr>






<td width="250" valign="top" id="namtdrightpanel"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox250top($deflink); ?>
<?php funbox250midopen($deflink); ?>

<tr><td><div style="cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namdivpanelsubmit');"><img src="<?php echo($deflink); ?>slices/forubahkatasandi.jpg"></div></td></tr>
<tr><td height="25" class="clabiggie"><?php echo($nambiggie[text]); ?></td></tr>
<tr><td width="222" height="1" align="center" class="clagreyline"></td></tr>

<?php funbox250midclose(); ?>
<?php funbox250bot($deflink); ?>
</table></td>





<td width="750" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox750lblopen($deflink); ?>Ubah Kata Sandi<?php funbox750lblclose(); ?>
<?php funbox750midopen($deflink); ?>
<?php funrow(13); ?>

<tr>
<td width="14"></td><!-- BUFFER KIRI -->

<!-- BOF: ISI (BUFFER TENGAH) -->
<td><table border="0" cellpadding="0" cellspacing="0">


<!-- BOF: ROW 1: DATA -->
<tr><td><table cellpadding="0" cellspacing="0" border="0">
<tr>


<td><table cellpadding="0" cellspacing="0" border="0" class="clainputan">
<?php if (isset($_SESSION["penggunaid"])) { ?>
	<tr>
		<td width="140">Kata Sandi Lama:&nbsp;</td>
		<td><input type="password" style="width:200px;" maxlength="32" name="namtextubahpenggunasandilama" id="namtextubahpenggunasandilama" value="">&nbsp;<span style="color:#cc0000;">*</span></td>
		<td><?php funhelptip(1); ?></td>
    </tr>
	<script language="javascript" type="text/javascript">document.getElementById('namtextubahpenggunasandilama').focus();</script>
	<tr class="clanohover">
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>Kata Sandi Baru:&nbsp;</td>
		<td><input type="password" style="width:200px;" maxlength="32" name="namtextubahpenggunasandibaru" id="namtextubahpenggunasandibaru" value="">&nbsp;<span style="color:#cc0000;">*</span></td>
		<td><?php funhelptip(2); ?></td>
    </tr>
	<tr>
		<td>Kata Sandi Baru (Ulangi):&nbsp;</td>
		<td><input type="password" style="width:200px;" maxlength="32" name="namtextubahpenggunasandibaruulangi" id="namtextubahpenggunasandibaruulangi" value="">&nbsp;<span style="color:#cc0000;">*</span></td>
		<td><?php funhelptip(3); ?></td>
    </tr>
<?php } ?>
</table></td>


</tr>
</table></td></tr>
<!-- EOF: ROW 1: DATA -->


</table></td>
<!-- EOF: ISI (BUFFER TENGAH) -->



<td></td><!-- BUFFER KANAN -->
</tr>

<?php funrow(40); ?>

<!-- BOF: PANEL SUBMIT -->
<tr><td colspan="3"><div id="namdivpanelsubmit"><table cellpadding="0" cellspacing="0" border="0" class="clasoftback">
<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>
<tr><td height="7"></td></tr>

<tr><td><table cellpadding="0" cellspacing="0" border="0"><tr>
<td width="100" align="center">
</td>
<td width="538" align="center" class="clabuttbig">
<button type="submit" name="namsubmitubahdatapengguna" value="ok"><strong>Ubah</strong></button>
</td>
<td width="100" align="center">
</td>
</tr></table></td></tr>

<tr><td height="7"></td></tr>
<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>
</table></div></td></tr>
<!-- EOF: PANEL SUBMIT -->

<?php funbox750midclose(); ?>
<?php funbox750bot($deflink); ?>




</table></td>




</tr>


</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

</form>
<!-- END OF: DIVMAINSUB -->
