<?php
mysql_connect("localhost","sitampan","sitampan");
mysql_select_db("sitampan");
 
$term = $_GET['term'];
 
$query = mysql_query("select * from kemasan_autocomp where nm_kemasan like '%$term%' group by nm_kemasan");
$json = array();
while($produk = mysql_fetch_array($query)){
	$json[] = array(
		'label' => $produk['idkemasan_autocomp'].' - '.$produk['nm_kemasan'], // text sugesti saat user mengetik di input box
		'value' => $produk['nm_kemasan'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
		'nama' => $produk['nm_kemasan']
	);
}
header("Content-Type: text/json");
echo json_encode($json);