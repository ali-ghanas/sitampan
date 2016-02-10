<?php 
include 'lib/koneksi.php';
$no=0;
//bcf15 terbit
$menu2=array();
$sql = "SELECT idtpp,nm_tpp FROM tpp ";
$query = mysql_query( $sql )  or die(mysql_error());

while( $data = mysql_fetch_array( $query ) ){
        $tpp=$data['idtpp'];
        $sql_jumlah   = "SELECT count(bcf15no) as bcf15, idtpp FROM bcf15 WHERE idtpp='$tpp'";
        $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
        while( $data = mysql_fetch_array( $query_jumlah ) ){
            $jumlah = $data['bcf15']; 

}




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
                    
		$(function () {

                                var chart;



                                $(document).ready(function () {



                                    // Build the chart

                                    chart = new Highcharts.Chart({

                                        chart: {

                                            renderTo: 'container',

                                            plotBackgroundColor: null,

                                           plotBorderWidth: null,

                                            plotShadow: false

                                       },

                                        title: {

                                            text: 'Penjualan smartphone bulan september 2012'

                                        },

                                        tooltip: {

                                            pointFormat: '{series.name}: <b>{point.percentage}%</b>',

                                            percentageDecimals: 1

                                        },

                                        plotOptions: {

                                            pie: {

                                                allowPointSelect: true,

                                                cursor: 'pointer',

                                                dataLabels: {

                                                    enabled: false

                                                },

                                                showInLegend: true
                                            }

                                        },

                            //data prosentasi penjualan di letakan disini!

                                        series: [{

                                            type: 'pie',

                                            name: 'Presentase penjualan',

                                            data: [ <?php echo $jumlah;?>  ]

                                        }]

                                    });

                                });



                            });

			
		</script>
                
               
	</head>
	<body>
	
		<!-- 3. Add the container -->
		<div id="container" style="width: 300px; height: 300px; margin: 0 auto"></div><br>
		
	</body>
</html>
<?php }; ?>