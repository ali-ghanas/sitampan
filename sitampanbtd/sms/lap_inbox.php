<link rel="stylesheet" href="js/development-bundle/themes/base/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="js/development-bundle/jquery-1.6.2.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.widget.js"></script>

<script type="text/javascript"> 
	$(document).ready(function(){
		$("#tanggal1").datepicker({
			dateFormat  : "yy-mm-dd",
			changeMonth : true,
			changeYear  : true
		});
	});
	
	$(document).ready(function(){
		$("#tanggal2").datepicker({
			dateFormat  : "yy-mm-dd",
			changeMonth : true,
			changeYear  : true
		});
	});
</script>
<br>
<h4><span>Laporan Pesan Masuk (Inbox)</span></h4>
<?php
echo "<form method=POST action=aksi_lap_inbox.php>";
echo "<table>
		<tr>
			<td> <font size=2> Periode Tanggal </font></td>
			<td> : </td>
			<td><input id='tanggal1' name='tanggal1' type='text'> <img src='images/kalender.gif' id='tanggal1'> <font size=2> S.D.</font> <input id='tanggal2' name='tanggal2' type='text'> <img src='images/kalender.gif' id='tanggal1'></td>
		</tr>
		<tr>
			<td colspan=2></td>
			<td><input type=submit value='Export to Excel'></td>
		</table>
		</form>";
echo "<p>&nbsp;</p>";
?>