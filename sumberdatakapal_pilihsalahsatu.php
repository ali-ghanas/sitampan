<?php $linsumberid=$linsumberid; ?>
<?php funrow(10); ?>
<tr><td class="clanotsobig">
<ul style="margin-left:-20px;">
<li><a onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswfitur01&<?php echo("linsumberid=".$linsumberid); ?>','')">Fitur Atensi 1</a><span class="clapilihsalahsatu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
<?php if ($ffswitch=="ffswfitur01") { ?><div style="font-weight:normal;">Pencarian penumpang dengan jarak kedatangan dan atau keberangkatan kurang dari
<select id="namtextvarfitur1" onChange="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswfitur01&<?php echo("linsumberid=".$linsumberid."&".$filefetchercarrierfitur1); ?>','')">
	<?php for ($d=1;$d<=70;$d++) { if ($d<10) { $d="0".$d; } ?>
	<option <?php if ($d==$namtextvarfitur1) { echo("selected"); } ?> value="<?php echo($d); ?>"><?php echo($d); ?></option>
	<?php } ?>
</select> hari. <span class="clathecolor">(Resiko tinggi)</span><br><br></div><?php } ?>
<li><a onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswfitur02&<?php echo("linsumberid=".$linsumberid); ?>','')">Fitur Atensi 2</a><span class="clapilihsalahsatu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
<?php if ($ffswitch=="ffswfitur02") { ?><div style="font-weight:normal;">Pencarian penumpang dengan No. Paspor yang invalid. <span class="clathecolor">(Resiko sedang)</span><br><br></div><?php } ?>
<li><a onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswfitur03&<?php echo("linsumberid=".$linsumberid); ?>','')">Fitur Atensi 3</a><span class="clapilihsalahsatu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
<?php if ($ffswitch=="ffswfitur03") { ?><div style="font-weight:normal;">Pencarian kesalahan pengetikan Nama dan Tgl. Lahir. <span class="clathecolor">(Resiko rendah)</span><br><br></div><?php } ?>
<li><a onClick="funffdivmain('<?php echo($filefetcher); ?>','ffswitch=ffswfitur04&<?php echo("linsumberid=".$linsumberid); ?>','')">Fitur Atensi 4</a><span class="clapilihsalahsatu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
<?php if ($ffswitch=="ffswfitur04") { ?><div style="font-weight:normal;">Membandingkan data penumpang baru dengan hasil identifikasi penumpang sebelumnya. <span class="clathecolor">(Resiko rendah)</span><br><br></div><?php } ?>
</ul>
</td></tr>
