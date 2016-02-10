<?php
include "koneksi/koneksi.php";

$offset = $_GET['offset'];
$totalquery = mysql_query("select * from pbk_groups");
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
      		<div align="left"><font size="2" face="tahoma">Pbk Group<br> Jumlah Group : <?php echo "$numrows" ;?> </font></div>
      	</td>
    </tr>
</table>
<?php
// panggil semua data dari tabel siswa diurutkan berdasarkan id siswa, dibatasi dengan limit = 15
$hasil = mysql_query("select * from pbk_groups order by ID ASC limit $offset,$limit");
$k = 1;
$k = 1 + $offset;

echo"
	<div align=left>
		<input type=button value='Tambah Group' onclick=\"window.location.href='?module=tambahpbkgroup';\"> <input type=button value='Tambah Phonebook' onclick=\"window.location.href='?module=tambahpbk';\"> <input type=button value='Send Group' onclick=\"window.location.href='?module=sendgroup';\">
		<table border=0 class=data>
			<tr>
				<th class=judultabel><font size='2' face='tahoma'> No. </font></th>
				<th class=judultabel><font size='2' face='tahoma'> ID </font></th>
				<th class=judultabel><font size='2' face='tahoma'> Name </font></th>
				<th class=judultabel><font size='2' face='tahoma'> Aksi </font></th>
			</tr>
";

while ($data = mysql_fetch_array($hasil)) {
	echo "<tr>
			<td class=isitabel width=10 align=center><font size='2' face='tahoma'>$k</font> </td>
			<td class=isitabel><font size='2' face='tahoma'> $data[ID] </font></td>
			<td class=isitabel> <font size='2' face='tahoma'>$data[Name] </font></td>
			<td class=isitabel><font size='2' face='tahoma'> <a href=?module=lihatdetailgroup&ID=$data[ID] title='Lihat Pbk'>Lihat</a> | <a href=?module=editgroup&ID=$data[ID] title='Edit group'> Edit </a></font></td>
		</tr> ";
$k++;
}
//untuk tutup tabel
echo "</table>";
echo "<div class=paging>";

if ($offset!=0) {
	$prevoffset = $offset-50;
	echo "<span class=prevnext> <a href=$PHP_SELF?module=inbox&offset=$prevoffset>Back</a></span>";
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
		echo "<a href=$PHP_SELF?module=inbox&offset=$newoffset>$i</a>";
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
	echo "<span class=prevnext><a href=$PHP_SELF?module=inbox&offset=$newoffset>Next</a>";
}
else {
	echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
}
echo "</div";
echo "</font>";
?>