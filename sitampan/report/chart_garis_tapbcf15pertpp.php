<?php 
include "../lib/koneksi.php";
$no=0;

//BCF15 TAHUN
$bcf15all=array();
$sqlbcf15all = "SELECT DATE_FORMAT(bcf15tgl,'%Y') as tahunbcf FROM bcf15 group by tahunbcf  ";
$qrybcf15all = mysql_query($sqlbcf15all);
while($rowbcf15all=mysql_fetch_assoc($qrybcf15all)){
$bcf15all[] = $rowbcf15all['tahunbcf'];
}
$araybcf15all=join(" ,",$bcf15all);

//bcf15 2007
$menu4=array();
$sql4 = "SELECT * FROM grafiktotalbcf ";
$qry4 = mysql_query($sql4);
while($row4=mysql_fetch_assoc($qry4)){

$menu4[] = $row4['jumbcf'];
}

$aray4=join(" ,",$menu4);

//bcf15 tripandu
$menu=array();
$sql = "SELECT * FROM bcftripandu ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu[] = $row['jumbcf'];
}

$aray=join(" ,",$menu);

//bcf15 transcon
$menu1=array();
$sql1 = "SELECT * FROM bcftranscon ";
$qry1 = mysql_query($sql1);
while($row1=mysql_fetch_assoc($qry1)){

$menu1[] = $row1['jumbcf'];
}

$aray1=join(" ,",$menu1);

//bcf15 msa
$menu2=array();
$sql2 = "SELECT * FROM bcfmsa ";
$qry2 = mysql_query($sql2);
while($row2=mysql_fetch_assoc($qry2)){

$menu2[] = $row2['jumbcf'];
}

$aray2=join(" ,",$menu2);

//bcf15 L4
$menu3=array();
$sql3 = "SELECT * FROM bcfl4 ";
$qry3 = mysql_query($sql3);
while($row3=mysql_fetch_assoc($qry3)){

$menu3[] = $row3['jumbcf'];
}

$aray3=join(" ,",$menu3);


?>	

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafik BCF 1.5 </title>
		
	
		
                <script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container5',
						zoomType: 'xy'
					},
					title: {
						text: 'Grafik BCF 1.5 Per TPP'
					},
					subtitle: {
						text: 'Source: Seksi Tempat Penimbunan PPC III KPU Bea dan Cukai Tg. Priok'
					},
					xAxis: [{
						categories: [<?php echo $araybcf15all;?>]
					}],
					yAxis: [{ // Primary yAxis
						labels: {
							formatter: function() {
								return this.value +'';
							},
							style: {
								color: '#4572A7'
							}
						},
						title: {
							text: 'Total BCF 1.5',
							style: {
								color: '#4572A7'
							}
						}
					}],

					tooltip: {
						formatter: function() {
							return ''+
								this.x +': '+ this.y +
								(this.series.name == 'Jumlah BCF 15' ? '' : '');
						}
					},
					legend: {
						layout: 'vertical',
						align: 'bottom',
						x: 50,
						verticalAlign: 'midlle',
						y: 50,
						floating: false,
						backgroundColor: '#eeeeee'
					},
					series: [{
						name: 'TPP Tripandu Pelita',
						color: '#4572A7',
						type: 'spline',
						data: [<?php echo $aray;?>]
					},
                                        {
						name: 'TPP Transcon Indonesia',
						color: '#89A54E',
						type: 'spline',
						data: [<?php echo $aray1;?>]
					},
                                        {
						name: 'TPP MSA',
						color: '#ff0000',
						type: 'spline',
						data: [<?php echo $aray2;?>]
					},
                                        {
						name: 'TPP L4',
						color: '#ffff99',
						type: 'spline',
						data: [<?php echo $aray3;?>]
					}]

                                    
				});
				
				
			});
				
		</script>
                           
	</head>
	<body>
	
		<!-- 3. Add the container -->
		<div id="container5" style="width: 500px; height: 500px; margin: 0 auto"></div><br>
		
                
	</body>
</html>
