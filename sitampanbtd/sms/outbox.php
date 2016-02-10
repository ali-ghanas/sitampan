<?php
include "koneksi/koneksi.php";

$offset = $_GET['offset'];
$totalquery = mysql_query("select * from outbox");
$numrows = mysql_num_rows($totalquery);

//jumlah data yang ditampilkan perpage
$limit = 50;
if (empty ($offset)) {
	$offset = 0;
}
?>
<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
	<tr> 
    	<td height="30""> 
      		<div align="left"><font size="2" face="tahoma">Outbox<br> Jumlah Pesan : <?php echo "$numrows" ;?> </font></div>
      	</td>
    </tr>
</table>
<?php
// panggil semua data dari tabel siswa diurutkan berdasarkan id siswa, dibatasi dengan limit = 15
$hasil = mysql_query("select * from outbox order by ID DESC limit $offset,$limit");
$k = 1;
$k = 1 + $offset;

echo"
	<div align=left>
		<table border=0 width=100% class='data' >
			<tr>
				<th class='judultabel'> <font face=tahoma size=2 >No. </font></th>
				<th class='judultabel'> <font face=tahoma size=2 >Tanggal </font></th>
				<th class='judultabel'> <font face=tahoma size=2>No Tujuan </font></th>
				<th class='judultabel'> <font face=tahoma size=2 >Pesan </font></th>
				<th width=70 class='judultabel'><font face=tahoma size=2 > Aksi </font></th>
			</tr>
";

while ($data = mysql_fetch_array($hasil)) {
	$pesan = substr($data[TextDecoded],0,30);

echo"
		<tr>
			<td width=10 align=center class=isitabel> <font face=tahoma size=2>$k </font></td>
			<td width=130 class=isitabel><font face=tahoma size=2> $data[SendingDateTime] </font></td>
			<td width=100 class=isitabel><font face=tahoma size=2> $data[DestinationNumber] </font></td>
			<td class=isitabel> <font face=tahoma size=2>$pesan ..</font> </td>
			<td class=isitabel><font face=tahoma size=2> <a href=hapus_outbox.php?ID=$data[ID] title='Hapus outbox'> Hapus </a> </font></td>
		</tr> 
";
$k++;
}
//untuk tutup tabel
echo "</table>";
echo "<div class=paging>";

if ($offset!=0) {
	$prevoffset = $offset-50;
	echo "<span class=prevnext> <a href=$PHP_SELF?module=outbox&offset=$prevoffset>Back</a></span>";
}
else {
	echo "<span class=disabled>Back</span>";//cetak halaman tanpa link
}
//hitung jumlah halaman
$halaman = intval($numrows/$limit);//Pembulatan

if ($numrows%$limit){
	$halaman++;
}
for($i=1;$i<=$halaman;$i++){
	$newoffset = $limit * ($i-1);
	if($offset!=$newoffset){
		echo "<a href=$PHP_SELF?module=outbox&offset=$newoffset>$i</a>";
		//cetak halaman
	}
	else {
		echo "<span class=current>".$i."</span>";//cetak halaman tanpa link
	}
}

//cek halaman akhir
if(!(($offset/$limit)+1==$halaman) && $halaman !=1){

	//jika bukan halaman terakhir maka berikan next
	$newoffset = $offset + $limit;
	echo "<span class=prevnext><a href=$PHP_SELF?module=outbox&offset=$newoffset>Next</a>";
}
else {
	echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
}
echo "</div";
echo "</font>";
?>