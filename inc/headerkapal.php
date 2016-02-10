<tr><td><div id="divmainheader"><table border="0" cellpadding="0" cellspacing="0">


<?php function funmnubordertop() { echo("style='border-top:1px solid #8f6427;'"); } ?>
<?php function funmnuborderbot() { echo("style='border-bottom:2px solid #60451e;'"); } ?>
<?php function funmnubordertopbot() { echo("style='border-top:1px solid #8f6427; border-bottom:2px solid #60451e;'"); } ?>
<?php function funmnubordersep() { echo("style='border-top:1px solid #dec688;'"); } ?>
<?php function funmnuborderbotsep() { echo("style='border-top:1px solid #dec688; border-bottom:2px solid #60451e;'"); } ?>


<tr><td width="1000" height="40" background="<?php echo($deflink); ?>slices/mnu.jpg"><table border="0" cellpadding="0" cellspacing="0">
<tr><td width="15"></td><td><table border="0" cellpadding="0" cellspacing="0">

<tr>

<td width="720">
<ul id="nammenu" class="clamenu">

	<li><a href="#" class="clamenulink">Analisis</a>
		<ul>
			<li><a href="sumberdatakapal.php" <?php funmnubordertop(); ?>><img src="slices/mnusumberdatakapal.jpg"><span class="clamenutext">Sumber Data</span></a></li>
			<li><a href="analisispenumpang.php" class="clamenuarrow" <?php funmnuborderbot(); ?>><img src="slices/mnuanalisispenumpang.jpg"><span class="clamenutext">Analisis Penumpang</span></a>
				<ul>
					<li><a href="identifikasipenumpang.php" <?php funmnubordertopbot(); ?>><img src="slices/mnuidentifikasipenumpang.jpg"><span class="clamenutext">Identifikasi Penumpang</span></a></li>
				</ul>
			</li>
		</ul>
	</li>

	<li>
		<a href="#" class="clamenulink">Pengguna</a>
		<ul>
			<li><a href="ubahkatasandi.php" <?php funmnubordertop(); ?>><img src="slices/mnuubahkatasandi.jpg"><span class="clamenutext">Ubah Kata Sandi</span></a></li>
			<li><a href="datapenggunakapal.php" class="clamenuarrow"><img src="slices/mnudatapengguna.jpg"><span class="clamenutext">Data Pengguna</span></a>
				<ul>
					<li><a href="aktifitaspengguna.php" <?php funmnubordertopbot(); ?>><img src="slices/mnuaktifitaspengguna.jpg"><span class="clamenutext">Aktifitas Pengguna</span></a></li>
				</ul>
			</li>
			<li><a href="pemeliharaandata.php"><img src="slices/mnupemeliharaandata.jpg"><span class="clamenutext">Pemeliharaan Data</span></a></li>
			<li><a href="tentangsahkapal.php" <?php funmnuborderbotsep(); ?>><img src="slices/mnutentangsah.jpg"><span class="clamenutext">Tentang Aplikasi</span></a></li>
		</ul>
	</li>

	<li>
		<a href="beranda.php?logout=1" class="clamenulink">Keluar</a>
	</li>

</ul>
</td>


<td width="250" align="right">
<script type="text/javascript">
var curtime='<?php echo(date("d F Y H:i:s",time()));?>'
var montharray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember")
var serverdate=new Date(curtime)

function funnol(oioi){
var result=(oioi.toString().length==1)? "0"+oioi : oioi
return result
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=funnol(serverdate.getDate())+" "+montharray[serverdate.getMonth()]+" "+serverdate.getFullYear()
var timestring=funnol(serverdate.getHours())+":"+funnol(serverdate.getMinutes())+":"+funnol(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
setInterval("displaytime()", 1000)
}

</script>
<?php
$montharray=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
$curdate=date("d"); $curmonth=date("m"); $curyear=date("Y"); $curmonth=$montharray[intval($curmonth)-1]; $waktu=date("H:i:s");
?>
<div id="servertime" style="font-family:Tahoma; font-size:11px; font-weight:bold; color:#ffffff;"><?php echo($curdate." ".$curmonth." ".$curyear." ".$waktu);?></div>
</td>


</tr>

</table></td><td width="15"></td></tr>
</table></td></tr>


</table></div></td></tr>

<script type="text/javascript">
var menu=new menu.dd("menu");
menu.init("nammenu","clamenuhover");
</script>

