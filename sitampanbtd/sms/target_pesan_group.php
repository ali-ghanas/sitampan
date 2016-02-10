<?php
include "koneksi/koneksi.php";
$group = $_POST['group'];
echo $group;
$isi_pesan = $_POST['isi_pesan'];

$sql = mysql_query("SELECT * FROM pbk WHERE GroupID = '$group'");
while ($data = mysql_fetch_array($sql)){

	$masuk = mysql_query("insert into outbox (InsertIntoDB,SendingDateTime,DestinationNumber,TextDecoded,SendingTimeOut,DeliveryReport,CreatorID)
		values (sysdate(),sysdate(),'$data[Number]','$isi_pesan',sysdate(),'yes','system')");
	
	if ($masuk){
		echo "<h4> Pesan Dikirim </h4>";
		echo "<meta http-equiv='refresh' content='1; url=master.php?module=sendgroup'>";
	}
	else {
		echo "<h4> Pesan gagal dikirim </h4>";
		echo "<meta http-equiv='refresh' content='2; url=master.php?module=sendgroup'>";
	}

}
?>