<?php 
include 'lib/koneksi.php';
$no=0;
//bcf15 terbit
$menu2=array();
$sql = "SELECT * FROM grafiktotalbcf ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2[] = $row['jumbcf'];
}

$aray2=join(" ,",$menu2);


?>	

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafik BCF 1.5 </title>
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
<!--		<script type="text/javascript" src="lib/js/jquery.min.js"></script>-->
		<script type="text/javascript" src="report/grafik/js/highcharts.js"></script>
		
		<!-- 1a) Optional: add a theme file -->
		
			<script type="text/javascript" src="report/grafik/js/themes/gray.js"></script>
		
		
		<!-- 1b) Optional: the exporting module -->
		<script type="text/javascript" src="report/grafik/js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						zoomType: 'xy'
					},
					title: {
						text: 'Grafik Penerbitan BCF 1.5'
					},
					subtitle: {
						text: 'Seksi Tempat Penimbunan'
					},
					xAxis: [{
						categories: ['07', '08', '09', '10', '11', '12','13','14'
							]
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
						align: 'left',
						x: 100,
						verticalAlign: 'top',
						y: 50,
						floating: true,
						backgroundColor: '#FFFFFF'
					},
					series: [{
						name: 'BCF 1.5',
						color: '#4572A7',
						type: 'spline',
						data: [<?php echo $aray2;?>]
					}]
				});
				
				
			});
				
		</script>
                
               
	</head>
	<body>
	
		<!-- 3. Add the container -->
		<div id="container" style="width: 300px; height: 300px; margin: 0 auto"></div><br>
		
	</body>
</html>
