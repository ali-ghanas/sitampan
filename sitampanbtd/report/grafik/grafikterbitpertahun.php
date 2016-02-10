<?php 
include '/../../lib/koneksi.php';
$no=0;
//bcf15 2007
$menu=array();
$sql = "SELECT * FROM grafiktotalbcf ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu[] = $row['jumbcf'];
}

$aray=join(" ,",$menu);



?>	

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafik BCF 1.5 </title>
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
<!--		<script type="text/javascript" src="lib/js/jquery.min.js"></script>-->
		<script type="text/javascript" src="report/grafik/js/highcharts.js"></script>
		
		<!-- 1a) Optional: add a theme file -->
		
			<script type="text/javascript" src="report/grafik/js/themes/grid.js"></script>
		
		
		<!-- 1b) Optional: the exporting module -->
		<script type="text/javascript" src="report/grafik/js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		
                <script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container3',
						zoomType: 'xy'
					},
					title: {
						text: 'Grafik Penarikan BCF 1.5 Ke TPP'
					},
					subtitle: {
						text: 'Source: Seksi Tempat Penimbunan PPC III KPU Bea dan Cukai Tg. Priok'
					},
					xAxis: [{
						categories: ['2007', '2008', '2009', '2010', '2011', '2012'
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
						name: 'Masuk',
						color: '#4572A7',
						type: 'spline',
						data: [<?php echo $aray3;?>]
					},
                                        {
						name: 'Tidak Masuk',
						color: '#89A54E',
						type: 'spline',
						data: [<?php echo $aray4;?>]
					}]
				});
				
				
			});
				
		</script>
                           
	</head>
	<body>
	
		<!-- 3. Add the container -->
		
		<div id="container3" style="width: 800px; height: 400px; margin: 0 auto"></div>
                
	</body>
</html>
