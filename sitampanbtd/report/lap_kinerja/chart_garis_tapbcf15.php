<?php 
include "../../lib/koneksi.php";
$no=0;
//bulan
$menu1=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan FROM lap_kinerja_bulan ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu1[] = $row['nm_bulan'];
}

$aray1=join(" ,",$menu1);

//bcf15 terbit tahun 2011
$menu2011=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_tap_bcf15 FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and tahun='2011'";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2011[] = $row['lap_tap_bcf15'];
}

$aray2011=join(" ,",$menu2011);

//bcf15 terbit tahun 2012
$menu2012=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_tap_bcf15 FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and tahun='2012'";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2012[] = $row['lap_tap_bcf15'];
}

$aray2012=join(" ,",$menu2012);

//bcf15 terbit tahun 2013
$menu2013=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_tap_bcf15 FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and tahun='2013'";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2013[] = $row['lap_tap_bcf15'];
}

$aray2013=join(" ,",$menu2013);



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
						renderTo: 'container2',
						zoomType: 'xy'
					},
					title: {
						text: 'Grafik Penerbitan BCF 1.5'
					},
					subtitle: {
						text: 'Source: Seksi Tempat Penimbunan PPC III KPU Bea dan Cukai Tg. Priok'
					},
					xAxis: [{
						categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun','Jul','Agt','Sept','Okt','Nop','Des'
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
						name: '2011',
						color: 'red',
						type: 'spline',
						data: [<?php echo $aray2011;?>]
                                                },
                                                {
						name: '2012',
						color: 'green',
						type: 'spline',
						data: [<?php echo $aray2012;?>]
                                                },
                                                {
						name: '2013',
						color: 'blue',
						type: 'spline',
						data: [<?php echo $aray2013;?>]
                                                }
                                                
                                        ]
				});
				
				
			});
				
		</script>
                
	</head>
	<body>
	
		<!-- 3. Add the container -->
		<div id="container2" style="width: 500px; height: 300px; margin: 20 auto"></div><br>
                <table class="judultabel" border="0" width="50%" align="center">
                    <tr >
                        <th width="10">
                            No
                        </th>
                        <th width="10">
                            Bulan
                        </th>
                        <th width="10">
                            Tahun
                        </th>
                        <th width="10">
                            Penetapan BCF 1.5
                        </th>
                    </tr>
                    
                                                <?php
                $no=1;
               
                $sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_tap_bcf15 FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan ";
                $qry = mysql_query($sql);
                $total = 0;
                 while($data = mysql_fetch_array($qry)){
                     $total = $total + $data['lap_tap_bcf15'];
                     if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                            echo "<tr class=tabs1>";
                                            $j++;
                                            }
                            else
                                            {
                                            echo "<tr class=highlight1>";
                                            $j--;
                                            }

                ?>
                
                   
                        <td align="center"><?php echo $no++; ?></td>
                        <td align="center"><?php echo $data['nm_bulan'] ?></td>
                        <td align="center"><?php echo $data['Tahun'] ?></td>
                        <td align="center"><?php echo $data['lap_tap_bcf15'] ?></td>
                    </tr>
                    
                
                 
                    <?php 
                    }?>
                  <tr>
                    <td  align="right" colspan="3"><b>Grand Total : </b></td>
                    
                    <td align="center" ><b><?php echo $total; ?></b></td>
                    
                  </tr>
                    </table>
               
               
	</body>
</html>
