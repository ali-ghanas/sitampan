<?php
mysql_connect("localhost","sitampan","sitampan");
mysql_select_db("sitampan");
 
$term = $_GET['term'];
 
$query = mysql_query("select * from kapal_autocomp where nm_kapal like '%$term%' group by nm_kapal");
$json = array();
while($produk = mysql_fetch_array($query)){
	$json[] = array(
		'label' => $produk['idkapal_autocomp'].' - '.$produk['nm_kapal'], // text sugesti saat user mengetik di input box
		'value' => $produk['nm_kapal'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
		'nama' => $produk['nm_kapal']
	);
}
header("Content-Type: text/json");
echo json_encode($json);