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
	
<?php
include "koneksi/koneksi.php";

mysql_query("UPDATE inbox SET Processed='true' WHERE ID = '$_GET[ID]'");
$data = mysql_fetch_array(mysql_query("select * from inbox WHERE ID = '$_GET[ID]'"));

echo "<form name='form1' method='post' action='target_pesan_single.php'>
	<table >
		<tr>
			<td> <font face=tahoma size=2>No ID </font></td>
			<td> <font face=tahoma size=2>: </font></td>
			<td><font face=tahoma size=2> $data[ID] </font></td>
		</tr>
		<tr>
			<td> <font face=tahoma size=2>Tanggal </font></td>
			<td> <font face=tahoma size=2>: </font></td>
			<td><font face=tahoma size=2>$data[ReceivingDateTime]</font></td>
		</tr>
		<tr>
			<td> <font face=tahoma size=2>Pengirim </font></td>
			<td> <font face=tahoma size=2>: </font></td>
			<td><font face=tahoma size=2>$data[SenderNumber]</font> <input type=hidden name=hp value=$data[SenderNumber]></td>
		</tr>
		<tr>
			<td> <font face=tahoma size=2>Pesan </font></td>
			<td> <font face=tahoma size=2>: </font></td>
			<td><font face=tahoma size=2>$data[TextDecoded]</font></td>
		</tr>
		<tr valign=top>
			<td> <font face=tahoma size=2>Balas Pesan </font></td>
			<td> <font face=tahoma size=2>: </font></td>
			<td><font face=tahoma size=2><textarea name='isi_pesan' cols='40' rows='7' OnFocus='Count();' 
		OnClick='Count();' onKeydown='Count();' OnChange='Count();' 
		onKeyup='Count();'></textarea> </font></td>
		</tr>
		<tr>
			<td colspan=2></td>
			<td><input name='counter' type='text' size='5' maxlength='5' value='160' /></td>
		</tr>
		<tr>
			<td colspan=2></td>
			<td><input type='submit' value='Kirim Pesan' /> | <a href='javascript:history.go(-1)'><input type=button value=Kembali></a></td>
		</tr>
	</table></form>";

?>