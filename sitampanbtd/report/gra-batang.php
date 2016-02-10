<?php
include ("../lib/jpgraph/jpgraph.php");
include ("../lib/jpgraph/jpgraph_pie.php");

require_once ('../lib/jpgraph/jpgraph_pie3d.php');
//include ("../lib/jpgraph/jpgraph_bar.php");

 
// inisialisasi array untuk jumlah pria, wanita dan negara
$databcf15 = array();
$datamasuk = array();
$tahun = array();
 
// koneksi ke mysql 
mysql_connect("localhost","sitampan","sitampan");
mysql_select_db("sitampan");



 
// query untuk menampilkan negara dan jumlah prianya thn 1990
$query = "SELECT tahun, count(masuk) as masuktpp,masuk FROM  bcf15 where masuk='1'  GROUP BY tahun, masuk";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
    // menambahkan data hasil query ke array
    array_unshift($databcf15, $data['masuktpp']);
    array_unshift($datamasuk, $data['masuk']);
    array_unshift($tahun, $data['tahun']);
}
 
// Create the Pie Graph. 
$graph = new PieGraph(600,450);

//$theme_class= new VividTheme;
//$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Total Penarikan BCF 1.5 pertahun");


// Create
$p1 = new PiePlot3D($databcf15);
$graph->Add($p1);



$p1->ShowBorder();
$p1->SetColor('red');

$p1->ExplodeSlice(1);

$graph->Stroke();




?>


