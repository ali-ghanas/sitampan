<?php
mysql_connect("localhost","sitampan","sitampan");
mysql_select_db("sitampan");
 
$term = $_GET['term'];
 
$query = mysql_query("select * from tps where nm_tps like '%$term%' group by nm_tps");
$json = array();
while($produk = mysql_fetch_array($query)){
	$json[] = array(
		'label' => $produk['idtps'].' - '.$produk['nm_tps'], // text sugesti saat user mengetik di input box
		'value' => $produk['nm_tps'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
		'nama' => $produk['nm_tps']
	);
}
header("Content-Type: text/json");
echo json_encode($json);