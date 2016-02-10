<?php
$namaFile = "report_".$_POST[tanggal1]."_sd_".$_POST[tanggal2].".xls";
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment; filename=$namaFile");
header("Content-Transfer-Encoding: binary ");

include "koneksi/koneksi.php";
include "fungsi/fungsi_indotgl.php";

$periode1 = tgl_indo($_POST[tanggal1]);
$periode2 = tgl_indo($_POST[tanggal2]);
$sql = mysql_query("SELECT * FROM inbox WHERE ReceivingDateTime BETWEEN '$_POST[tanggal1]' AND '$_POST[tanggal2]'");
?>
<?php
$date = date('Y-m-d H:i:s');
echo "<table border=1 cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2>Periode : <b>$periode1 s/d $periode2</b></td>
		</tr>
		<tr>
			<td colspan=2>Dicetak : <b>$date</b></td>
		</tr>
		<tr>
			<td colspan=2 bgcolor=yellow style='border: none';>Laporan Pesan Masuk (Inbox)</td>
		</tr>
		<tr>
			<td bgcolor=#c6e1f2 align=center><b>ReceivingDateTime</b></td>
			<td bgcolor=#c6e1f2 align=center><b>SenderNumber</b></td>
			<td bgcolor=#c6e1f2 align=center><b>TextDecoded</b></td>
			<td bgcolor=#c6e1f2 align=center><b>Processed</b></td>
		</tr>";
while ($data = mysql_fetch_array($sql)){
	echo "<tr valign=top>
			<td>$data[ReceivingDateTime]</td>
			<td>$data[SenderNumber]</td>
			<td>$data[TextDecoded]</td>
			<td>$data[Processed]</td>
		  </tr>";
}

?>
