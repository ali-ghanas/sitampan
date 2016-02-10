<?php
mysql_connect("localhost","sitampan","sitampan");
mysql_select_db("sitampan");
 
$term = $_GET['term'];
 
$query = mysql_query("select * from kapalvoy_autocomp where voy like '%$term%' group by voy");
$json = array();
while($produk = mysql_fetch_array($query)){
	$json[] = array(
		'label' => $produk['idkapalvoy_autocomp'].' - '.$produk['voy'], // text sugesti saat user mengetik di input box
		'value' => $produk['voy'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
		'nama' => $produk['voy']
	);
}
header("Content-Type: text/json");
echo json_encode($json);