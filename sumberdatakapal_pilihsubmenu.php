<!-- SENGAJA TIDAK MEMBAWA CARRIERSORT -->
<select class="clabiggie" onChange="funffdivmain('<?php echo($filefetcher); ?>','ffswitch='+this.value+'&<?php echo($carrier); ?>','')">
	<option <?php if (empty($ffswitch)||$ffswitch=="ffswtabelkapal") { echo("selected"); } ?> value="ffswtabelkapal"><?php echo($nambiggie[text]." - Kapal"); ?></option>
	<option <?php if ($ffswitch=="ffswtabelpenumpang") { echo("selected"); } ?> value="ffswtabelpenumpang"><?php echo($nambiggie[text]." - Penumpang"); ?></option>
</select>