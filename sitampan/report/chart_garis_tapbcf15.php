<?php 
include "../lib/koneksi.php";
$tahun=date('Y');

//BCF15 BULAN
$bcf15all=array();
$sqlbcf15all = "SELECT DATE_FORMAT(bcf15tgl,'%Y') as tahunbcf FROM bcf15 group by tahunbcf  ";
$qrybcf15all = mysql_query($sqlbcf15all);
while($rowbcf15all=mysql_fetch_assoc($qrybcf15all)){
$bcf15all[] = $rowbcf15all['tahunbcf'];
}
$araybcf15all=join(" ,",$bcf15all);


//bcf15 terbit
$bcf15tot2=array();
$sql = "SELECT * FROM grafiktotalbcf ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$bcf15tot2[] = $row['jumbcf'];
}
$aray2=join(" ,",$bcf15tot2);

//bcf15 masuk
$bcf15totmasuk2=array();
$sqlmasuk = "SELECT * FROM grafiktotalbcfmasuk ";
$qrymasuk = mysql_query($sqlmasuk);
while($rowmasuk=mysql_fetch_assoc($qrymasuk)){

$bcf15totmasuk2[] = $rowmasuk['masuktpp'];
}
$araymasuk=join(" ,",$bcf15totmasuk2);

//bcf15 masuk
$bcf15tottdkmasuk2=array();
$sqltdkmasuk = "SELECT * FROM grafiktotaltidakmasuktpp ";
$qrytdkmasuk = mysql_query($sqltdkmasuk);
while($rowtdkmasuk=mysql_fetch_assoc($qrytdkmasuk)){

$bcf15tottdkmasuk2[] = $rowtdkmasuk['masuktpp'];
}
$araytdkmasuk=join(" ,",$bcf15tottdkmasuk2);


?>	

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafik BCF 1.5 </title>
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<script type="text/javascript" src="js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'containerbcf', //letakan grafik di div id container
        //Type grafik, anda bisa ganti menjadi area,bar,column dan bar
                type: 'line', 
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Penetapan BTD/BCF 1.5 Tahun ',
                x: -20 //center
            },
            subtitle: {
                text: 'candra.web.id',
                x: -20
            },
            xAxis: { //X axis menampilkan data bulan
                categories: [<?php echo $araybcf15all;?>]
            },
            yAxis: {
                title: {  //label yAxis
                    text: 'Total BCF 1.5'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080' //warna dari grafik line
                }]
            },
            tooltip: {
      //fungsi tooltip, ini opsional, kegunaan dari fungsi ini
      //akan menampikan data di titik tertentu di grafik saat mouseover
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
  //series adalah data yang akan dibuatkan grafiknya,
     
            series: [{ 
                name: 'Penetapan BCF 1.5', 
         
                data: [<?php echo $aray2;?>]
            },
            { 
                name: 'Masuk TPP', 
         
                data: [<?php echo $araymasuk;?>]
            },
            { 
                name: 'Tidak Masuk TPP', 
         
                data: [<?php echo $araytdkmasuk;?>]
            }
             
            ]
        });
    });
     
});
				
		</script>
                <div id="containerbcf" style="width: 500px; height: 500px; margin: 2 auto"></div>
                     
                    
	</body>
</html>
