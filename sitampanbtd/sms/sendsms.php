<script>
	function Count(){
		var karakter,maksimum;  
		maksimum = 160
		karakter = maksimum-(document.form1.isi_pesan.value.length);  
		if (karakter < 0) {
			alert("Jumlah Maksimum Karakter:  " + maksimum + "");  
			document.form1.isi_pesan.value = document.form1.isi_pesan.value.substring(0,maksimum);  
			karakter = maksimum-(document.form1.isi_pesan.value.length);  
			document.form1.counter.value = karakter;  
		} 
		else {
			document.form1.counter.value =  maksimum-(document.form1.isi_pesan.value.length);
		}
	}
</script> 

<form name="form1" method="post" action="target_pesan_single_pbk.php">
<h3> Kirim Pesan Single </h3>
<?php
include "koneksi/koneksi.php";
$data = mysql_fetch_array(mysql_query("SELECT * FROM pbk WHERE ID = '$_GET[ID]'"));
?>
<table>
<tr>
	<td width="100"> <font face=tahoma size=2>Nama Tujuan </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><input name="nama" type="text" size="20" value='<?php echo $data[Name];?>' disabled> <input name="nama" type="hidden" size="20" value='<?php echo $data[Name];?>'></td>
</tr>
<tr>
	<td width="100"> <font face=tahoma size=2>Nomor Tujuan </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><input name="hp" type="text" size="20" value=<?php echo $data[Number];?> disabled> <input name="hp" type="hidden" size="20" value=<?php echo $data[Number];?>></td>
</tr>
<tr valign="top">
	<td><font face=tahoma size=2> Isi Pesan </font></td>
	<td><font face=tahoma size=2> : </font></td>
	<td>
		<textarea name="isi_pesan" cols="40" rows="7" OnFocus="Count();" 
		OnClick="Count();" onKeydown="Count();" OnChange="Count();" 
		onKeyup="Count();"></textarea> 
	</td>
</tr>
<tr>
	<td colspan="2"></td>
	<td><input name="counter" type="text" size="5" maxlength="5" value="160" /></td>
</tr>
<tr>
	<td><input type="submit" value="Kirim Pesan" /></td>
</tr>
</table>
</form>
</body>
</html>