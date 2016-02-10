<?php 
include "../../lib/koneksi.php";
$no=0;
$tahun=date('Y');
//pembukaan pos bc11 yang diajukan
$menu2=array();
$sql = "SELECT count(idbukaposbc11) as jumbcf,DATE_FORMAT(tgl_input,'%m') as bulan FROM bukaposbc11 where DATE_FORMAT(tgl_input,'%Y')='$tahun'  group by bulan  ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2[] = $row['jumbcf'];
}

$aray2=join(" ,",$menu2);

//buka pos bc 1.1 
$menu3=array();
$menu3tot=array();
$sql3 = "SELECT count(idbukaposbc11) as jumbcf,DATE_FORMAT(tgl_input,'%m') as bulan FROM bukaposbc11 where DATE_FORMAT(tgl_input,'%Y')='$tahun' and  status='terbuka' group by bulan  ";
$sql3tot = "SELECT count(idbukaposbc11) as jumbcf,DATE_FORMAT(tgl_input,'%m') as bulan FROM bukaposbc11 where DATE_FORMAT(tgl_input,'%Y')='$tahun' and  status='terbuka' ";
$qry3 = mysql_query($sql3);
$qry3tot = mysql_query($sql3tot);
while($row3=mysql_fetch_assoc($qry3)){

$menu3[] = $row3['jumbcf'];
}
$aray3=join(" ,",$menu3);
while($row3tot=mysql_fetch_assoc($qry3tot)){

$menu3tot[] = $row3tot['jumbcf'];
}
$aray3tot=join(" ,",$menu3tot);




//bcf tidak masuk
$menu4=array();
$menu4tot=array();
$sql4 = "SELECT count(idbukaposbc11) as jumbcf,DATE_FORMAT(tgl_input,'%m') as bulan FROM bukaposbc11 where DATE_FORMAT(tgl_input,'%Y')='$tahun' and  status='selesai' group by bulan ";
$sql4tot = "SELECT count(idbukaposbc11) as jumbcf,DATE_FORMAT(tgl_input,'%m') as bulan FROM bukaposbc11 where DATE_FORMAT(tgl_input,'%Y')='$tahun' and  status='selesai' ";
$qry4 = mysql_query($sql4);
$qry4tot = mysql_query($sql4tot);
while($row4=mysql_fetch_assoc($qry4)){

$menu4[] = $row4['jumbcf'];
}
$aray4=join(" ,",$menu4);
while($row4tot=mysql_fetch_assoc($qry4tot)){

$menu4tot[] = $row4tot['jumbcf'];
}

$aray4tot=join(" ,",$menu4tot);


?>	

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafik BCF 1.5 </title>
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="report/lap_kinerja/js/jquery.min.js"></script>
		<script type="text/javascript" src="report/lap_kinerja/js/highcharts.js"></script>
		
		
		<script type="text/javascript" src="report/lap_kinerja/js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container'
                            },
                            title: {
                                text: 'Grafik Pengajuan Buka Pos BC 1.1 <?php echo $tahun ?>'
                            },
                            xAxis: {
                                categories: ['Jan','Peb','Mar', 'Apr', 'Mei', 'Jun','Jul','Agt','Sept','Okt','Nop','Des'
							]
                            },
                            yAxis: {
                                title: {
                                    text: 'Total BC 1.1'
                                }
                            },
                            tooltip: {
                                formatter: function() {
                                    var s;
                                    if (this.point.name) { // the pie chart
                                        s = ''+
                                            this.point.name +': '+ this.y +' BC 1.1';
                                    } else {
                                        s = ''+
                                            this.x  +': '+ this.y;
                                    }
                                    return s;
                                }
                            },
                            labels: {
                                items: [{
                                    html: 'Total BC 1.1',
                                    style: {
                                        left: '40px',
                                        top: '8px',
                                        color: 'black'
                                    }
                                }]
                            },
                            series: [{
                                type: 'column',
                                name: 'Total Pengajuan Surat',
                                data: [<?php echo $aray2;?>],
                                color: '#225e9b'
                            }, {
                                type: 'column',
                                name: 'Pos BC 1.1 Terbuka',
                                data: [<?php echo $aray3;?>],
                                color: '#44dd36'
                            }, {
                                type: 'column',
                                name: 'Telah diajukan Pembatalan',
                                data: [<?php echo $aray4;?>],
                                color: '#e63e28'
                            }, {
                                type: 'pie',
                                name: 'Total BC 1.1',
                                data: [
                                   
                                    {
                                    name: 'Pos BC 1.1 Terbuka',
                                    y: <?php echo $aray3tot;?>,
                                    sliced: true,
                                    
                                    color: '#44dd36'
                                },
                                   {
                                    name: 'Telah diajukan Pembatalan',
                                    y: <?php echo $aray4tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#e63e28'
                                }
                                                 ],
                                center: [350, 100],
                                size: 100,
                                showInLegend: false,
                                dataLabels: {
                                    enabled: false
                                }
                            }]
                        });
                    });

				
		</script>
                
	</head>
	<body>
	
		<!-- 3. Add the container -->
		<div id="container" style="width: 600px; height: 500px; margin: 20 auto"></div><br>
                
               
	</body>
</html>
