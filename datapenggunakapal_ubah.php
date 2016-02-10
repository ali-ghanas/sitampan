<!-- BEGINNING OF: DIVMAINSUB -->
<?php
$selectfromtblpengguna=mysql_query("select * from tblpengguna where penggunaid='".$linubahdatapengguna."' limit 1");
$selectfromtblpenggunaarray=mysql_fetch_array($selectfromtblpengguna);
?>
<form action="javascript:funffdivmainsub('<?php echo($filefetcher); ?>','<?php echo($carrier."&".$carriersort."&linubahdatapengguna=".$linubahdatapengguna."&".$filefetchercarrierubah); ?>','namtextubahpenggunaid')" autocomplete="off">
<table border="0" cellpadding="0" cellspacing="0">
<tr>






<td width="750" valign="top"><table border="0" cellpadding="0" cellspacing="0">
<?php funbox750lblopen($deflink); ?>Data Pengguna: <?php  echo($selectfromtblpenggunaarray["penggunaid"]); ?><?php funbox750lblclose(); ?>
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
	<tr>
		<td width="120">ID Pengguna:&nbsp;</td>
		<td><input type="text" style="width:150px;" maxlength="19" name="namtextubahpenggunaid" id="namtextubahpenggunaid" value="<?php echo($selectfromtblpenggunaarray["penggunaid"]); ?>">&nbsp;<span style="color:#cc0000;">*</span></td>
	</tr>
	<tr>
		<td>Kata Sandi:&nbsp;</td>
		<td><input type="password" style="width:200px;" maxlength="32" name="namtextubahpenggunasandi" id="namtextubahpenggunasandi" value="">&nbsp;<span style="color:#cc0000;">*</span></td>
    </tr>
	<tr>
		<td>Tingkatan:&nbsp;</td>
		<td><select style="width:100px;" name="namtextubahpenggunalevel" id="namtextubahpenggunalevel">
			<option value=""></option>
			<?php for ($i=1;$i<=4;$i++) { ?>
			<option <?php if ($selectfromtblpenggunaarray["penggunalevel"]==$i) { echo("selected"); } elseif ($i==$ubahpenggunalevel) { echo("selected"); } ?> value="<?php echo($i); ?>"><?php echo($i." - ".$arrpenggunalevel[$i]); ?></option>
			<?php } ?>
		</select>&nbsp;<span style="color:#cc0000;">*</span></td>
	</tr>
	<tr>
		<td>Keterangan:&nbsp;</td>
		<td><input type="text" style="width:400px;" maxlength="64" name="namtextubahpenggunaketerangan" id="namtextubahpenggunaketerangan" value="<?php echo($selectfromtblpenggunaarray["penggunaketerangan"]); ?>"></td>
	</tr>
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
<tr><td colspan="3"><div id="namdivpanelsubmitubah"><table cellpadding="0" cellspacing="0" border="0" class="clasoftback">
<tr><td width="722" height="1" align="center" class="clagreyline"></td></tr>
<tr><td height="7"></td></tr>

<tr><td><table cellpadding="0" cellspacing="0" border="0"><tr>
<td width="100" align="center">
</td>
<td width="538" align="center" class="clabuttbig">
<button type="submit" name="namsubmitubahdatapengguna"><strong>Ubah Data</strong></button>
&nbsp;
<button type="button" onClick="funffdivmainsub('<?php echo($filefetcher); ?>','ffswubahcase=saatproses&<?php echo($carrier."&".$carriersort."&linubahdatapengguna=".$linubahdatapengguna); ?>','namtextubahpenggunaid')">Ulang</button>
</td>
<td width="100" align="center">
<div class="clatautkembali" id="divkembali" onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswtabel&<?php echo($carrier."&".$carriersort); ?>','')">Kembali&#8250;</div>
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

<tr><td><div style="cursor:pointer;" onclick="funhiddenobj('divmainheader,divmaininfo,namdivpanelsubmitubah');"><img src="<?php echo($deflink); ?>slices/fordatapengguna.jpg"></div></td></tr>
<tr><td height="25" class="clabiggie"><?php echo($nambiggie[text]); ?></td></tr>
<tr><td width="222" height="1" align="center" class="clagreyline"></td></tr>

<?php funbox250midclose(); ?>
<?php funbox250bot($deflink); ?>
</table></td>





</tr>


</table>

<!-- BEGINNING OF: INFO -->
<div id="divmaininfo"><?php echo($pesanpesan); ?></div>
<!-- END OF: INFO -->

</form>
<!-- END OF: DIVMAINSUB -->
