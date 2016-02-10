<!----------- MISC. ------------->

<?php function jar() { ?>
<td width="8"></td>
<?php } ?>

<?php function funrow($besar) { ?>
<tr><td height="<?php echo($besar); ?>"></td></tr>
<?php } ?>

<?php function funcol($besar) { ?>
<td width="<?php echo($besar); ?>"></td>
<?php } ?>



<!-- BODY OPEN -->
<?php function funbodyopen() { ?>
<table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" class="clabgc">
<tr><td><table width="1000" align="center" border="0" cellpadding="0" cellspacing="0">
<?php } ?>

<!-- BODY CLOSE -->
<?php function funbodyclose() { ?>
</table></td></tr> 
<tr><td height="30"></td></tr>
</table>
<?php } ?>


<style rel="stylesheet" type="text/css">
.claboxtop, .claboxlbl { border-radius: 10px 10px 0px 0px; -moz-border-radius: 10px 10px 0px 0px; -khtml-border-radius: 10px 10px 0px 0px; -webkit-border-radius: 10px 10px 0px 0px; }
.claboxbot { border-radius: 0px 0px 10px 10px; -moz-border-radius: 0px 0px 10px 10px; -khtml-border-radius: 0px 0px 10px 10px; -webkit-border-radius: 0px 0px 10px 10px; }
</style>

<!-- BOX 250 TOP |-| -->
<?php function funbox250top($deflink) { ?>
<tr><td width="250" height="14" class="claboxtop" background="<?php echo($deflink); ?>slices/box250top.jpg"></td></tr>
<?php } ?>
<!-- BOX 250 BOTTOM |_| -->
<?php function funbox250bot($deflink) { ?>
<tr><td width="250" height="14" class="claboxbot" background="<?php echo($deflink); ?>slices/box250bot.jpg"></td></tr>
<?php } ?>
<!-- BOX 250 MIDDLE | | -->
<?php function funbox250midopen($deflink) { ?>
<tr><td width="250" background="<?php echo($deflink); ?>slices/box250mid.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td><table border="0" cellpadding="0" cellspacing="0">
<?php } ?>
<?php function funbox250midclose() { ?>
</table></td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>
<!-- BOX 250 LABEL === -->
<?php function funbox250lblopen($deflink) { ?>
<tr><td width="250" height="35" class="claboxlbl" background="<?php echo($deflink); ?>slices/box250lbl.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td class="clalabeller">
<?php } ?>
<?php function funbox250lblclose() { ?>
</td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>



<!-- BOX 500 TOP |--| -->
<?php function funbox500top($deflink) { ?>
<tr><td width="500" height="14" class="claboxtop" background="<?php echo($deflink); ?>slices/box500top.jpg"></td></tr>
<?php } ?>
<!-- BOX 500 BOTTOM |__| -->
<?php function funbox500bot($deflink) { ?>
<tr><td width="500" height="14" class="claboxbot" background="<?php echo($deflink); ?>slices/box500bot.jpg"></td></tr>
<?php } ?>
<!-- BOX 500 MIDDLE |  | -->
<?php function funbox500midopen($deflink) { ?>
<tr><td width="500" background="<?php echo($deflink); ?>slices/box500mid.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td><table border="0" cellpadding="0" cellspacing="0">
<?php } ?>
<?php function funbox500midclose() { ?>
</table></td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>
<!-- BOX 500 LABEL ==== -->
<?php function funbox500lblopen($deflink) { ?>
<tr><td width="500" height="35" class="claboxlbl" background="<?php echo($deflink); ?>slices/box500lbl.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td class="clalabeller">
<?php } ?>
<?php function funbox500lblclose() { ?>
</td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>



<!-- BOX 750 TOP |---| -->
<?php function funbox750top($deflink) { ?>
<tr><td width="750" height="14" class="claboxtop" background="<?php echo($deflink); ?>slices/box750top.jpg"></td></tr>
<?php } ?>
<!-- BOX 750 BOTTOM |___| -->
<?php function funbox750bot($deflink) { ?>
<tr><td width="750" height="14" class="claboxbot" background="<?php echo($deflink); ?>slices/box750bot.jpg"></td></tr>
<?php } ?>
<!-- BOX 750 MIDDLE |   | -->
<?php function funbox750midopen($deflink) { ?>
<tr><td width="750" background="<?php echo($deflink); ?>slices/box750mid.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td><table border="0" cellpadding="0" cellspacing="0">
<?php } ?>
<?php function funbox750midclose() { ?>
</table></td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>
<!-- BOX 750 LABEL ===== -->
<?php function funbox750lblopen($deflink) { ?>
<tr><td width="750" height="35" class="claboxlbl" background="<?php echo($deflink); ?>slices/box750lbl.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td class="clalabeller">
<?php } ?>
<?php function funbox750lblclose() { ?>
</td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>



<!-- BOX 900 TOP |----| -->
<?php function funbox900top($deflink) { ?>
<tr><td width="900" height="14" class="claboxtop" background="<?php echo($deflink); ?>slices/box900top.jpg"></td></tr>
<?php } ?>
<!-- BOX 900 BOTTOM |____| -->
<?php function funbox900bot($deflink) { ?>
<tr><td width="900" height="14" class="claboxbot" background="<?php echo($deflink); ?>slices/box900bot.jpg"></td></tr>
<?php } ?>
<!-- BOX 900 MIDDLE |    | -->
<?php function funbox900midopen($deflink) { ?>
<tr><td width="900" background="<?php echo($deflink); ?>slices/box900mid.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td><table border="0" cellpadding="0" cellspacing="0">
<?php } ?>
<?php function funbox900midclose() { ?>
</table></td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>
<!-- BOX 900 LABEL ====== -->
<?php function funbox900lblopen($deflink) { ?>
<tr><td width="900" height="35" class="claboxlbl" background="<?php echo($deflink); ?>slices/box900lbl.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td class="clalabeller">
<?php } ?>
<?php function funbox900lblclose() { ?>
</td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>



<!-- BOX 1000 TOP |----| -->
<?php function funbox1000top($deflink) { ?>
<tr><td width="1000" height="14" class="claboxtop" background="<?php echo($deflink); ?>slices/box1000top.jpg"></td></tr>
<?php } ?>
<!-- BOX 1000 BOTTOM |____| -->
<?php function funbox1000bot($deflink) { ?>
<tr><td width="1000" height="14" class="claboxbot" background="<?php echo($deflink); ?>slices/box1000bot.jpg"></td></tr>
<?php } ?>
<!-- BOX 1000 MIDDLE |    | -->
<?php function funbox1000midopen($deflink) { ?>
<tr><td width="1000" background="<?php echo($deflink); ?>slices/box1000mid.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td><table border="0" cellpadding="0" cellspacing="0">
<?php } ?>
<?php function funbox1000midclose() { ?>
</table></td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>
<!-- BOX 1000 LABEL ====== -->
<?php function funbox1000lblopen($deflink) { ?>
<tr><td width="1000" height="35" class="claboxlbl" background="<?php echo($deflink); ?>slices/box1000lbl.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="14"></td><td class="clalabeller">
<?php } ?>
<?php function funbox1000lblclose() { ?>
</td><td width="14"></td></tr>
</table></td></tr>
<?php } ?>







