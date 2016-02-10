<?php
mysql_connect("localhost","sitampan","sitampan");
mysql_select_db("sitampan");
 
$term = $_GET['term'];
 
$query = mysql_query("select * from pib_importir where nm_importir like '%$term%' group by nm_importir");
$json = array();
while($produk = mysql_fetch_array($query)){
	$json[] = array(
		'label' => $produk['idpib_importir'].' - '.$produk['nm_importir'], // text sugesti saat user mengetik di input box
		'value' => $produk['nm_importir'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
		'nama' => $produk['nm_importir']
	);
}
header("Content-Type: text/json");
echo json_encode($json);