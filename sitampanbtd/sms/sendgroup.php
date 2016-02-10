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

<form name="form1" method="post" action="target_pesan_group.php">
<h3> Kirim Pesan Group </h3>
<table>
<tr>
	<td width="100"> <font face=tahoma size=2>Group </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><select name=group>
	<?php
	include "koneksi/koneksi.php";
	$sql = mysql_query("SELECT * FROM pbk_groups ORDER BY Name ASC");
	while ($data = mysql_fetch_array($sql)){
		echo "<option value=$data[ID]>$data[Name]</option>";
	}
	?>
	</select>
	</td>
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