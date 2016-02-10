<form method="post" id="addbcf15" name="addbcf15" action="?hal=rekap_capaian_kinerja&pilih=progres">
<table >
    
    <tr>
      <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Laporan Pertahun</td>
      <td><input type="text"  class="required" name="tahun" value="<?php echo $_POST['tahun']?>"></td>
                            
    
        <td><input class="button putih bigrounded " type="submit" name="addsubmit" value="Ok"    /></td>
    </tr>
    
</table>
</form>
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

//bcf15 terbit
                                    if (isset($_POST['Tahun']))
                                        {
                                           $tahun = $_POST['tahun'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "Tahun LIKE '%$tahun%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND Tahun LIKE '%$tahun%'";
                                           }
                                        }
                                 else {
                                     $tahun = date('Y');
                                     if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "Tahun LIKE '%$tahun%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND Tahun LIKE '%$tahun%'";
                                           }
 }
$menu2=array();
$Tahun=$_POST['tahun'];

$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_tap_bcf15 FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."  ";
$qry = mysql_query($sql);

while($row=mysql_fetch_assoc($qry)){

$menu2[] = $row['lap_tap_bcf15'];
}

$aray2=join(" ,",$menu2);

//masuk
$menu4=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_bcf15_masuk FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu4[] = $row['lap_bcf15_masuk'];
}

$aray4=join(" ,",$menu4);

//tidak masuk
$menu5=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_bcf15_tidak_masuk FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu5[] = $row['lap_bcf15_tidak_masuk'];
}

$aray5=join(" ,",$menu5);

//sprint
$menu6=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_sprint FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu6[] = $row['lap_sprint'];
}

$aray6=join(" ,",$menu6);

//tahunan
//progres penarikan 2011
$menu2011=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_sprint FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and tahun='2011'";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2011[] = $row['lap_sprint'];
}

$aray2011=join(" ,",$menu2011);

//progres penarikan 2012
$menu2012=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_sprint FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and tahun='2012'";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2012[] = $row['lap_sprint'];
}

$aray2012=join(" ,",$menu2012);

//progres penarikan 2012
$menu2013=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_sprint FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and tahun='2013'";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2013[] = $row['lap_sprint'];
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
						text: 'Grafik Perbandingan BCF 1.5 Yang Terbit dan BCF 1.5 Yang Masuk TPP <?php echo $tahun ?>'
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
						name: 'BCF 1.5',
						color: '#4572A7',
						type: 'spline',
						data: [<?php echo $aray2;?>]
					},
                                        {
						name: 'BCF 1.5 Masuk',
						color: '#89A54E',
						type: 'spline',
						data: [<?php echo $aray4;?>]
					},
                                       ]
				});
				
				
			});
				
		</script>
                <script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container3',
						zoomType: 'xy'
					},
					title: {
						text: 'Grafik Perbandingan BCF 1.5 yang Masuk dan Tidak Masuk <?php echo $tahun ?>'
					},
					subtitle: {
						text: 'Source: Seksi Tempat Penimbunan PPC III KPU Bea dan Cukai Tg. Priok '
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
							text: 'BCF 1.5',
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
					series: [
                                        {
						name: 'BCF 1.5 Tidak Masuk',
						color: 'red',
						type: 'spline',
						data: [<?php echo $aray5;?>]
					},
                                        {
						name: 'BCF 1.5 Masuk',
						color: '#89A54E',
						type: 'spline',
						data: [<?php echo $aray4;?>]
					}]
				});
				
				
			});
				
		</script>
                <script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container4',
						zoomType: 'xy'
					},
					title: {
						text: 'Grafik Perbandingan BCF 1.5 yang Masuk dan Tidak Masuk dengan Penetapan BCF 1.5 <?php echo $tahun ?>'
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
							text: 'BCF 1.5',
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
					series: [
                                        {
						name: 'BCF 1.5 Tidak Masuk',
						color: 'red',
						type: 'spline',
						data: [<?php echo $aray5;?>]
					},
                                        {
						name: 'BCF 1.5 Masuk',
						color: '#89A54E',
						type: 'spline',
						data: [<?php echo $aray4;?>]
					},
                                        {
						name: 'BCF 1.5',
						color: '#4572A7',
						type: 'spline',
						data: [<?php echo $aray2;?>]
					}]
				});
				
				
			});
				
		</script>
                
                <script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container5',
						zoomType: 'xy'
					},
					title: {
						text: 'Progres Penarikan Dalam 3 Tahun'
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
							text: 'BCF 1.5',
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
					series: [
                                        {
						name: 'Masuk 2011',
						color: 'red',
						type: 'spline',
						data: [<?php echo $aray2011;?>]
					},
                                        {
						name: 'Masuk 2012',
						color: '#89A54E',
						type: 'spline',
						data: [<?php echo $aray2012;?>]
					},
                                        {
						name: 'Masuk 2013',
						color: '#4572A7',
						type: 'spline',
						data: [<?php echo $aray2013;?>]
					}]
				});
				
				
			});
				
		</script>
                
	</head>
	<body>
	
		<!-- 3. Add the container -->
                
		<div id="container2" style="width: 400px; height: 200px; margin: 0 auto"></div><br>
                <div id="container3" style="width: 400px; height: 200px; margin: 0 auto"></div><br>
                <div id="container4" style="width: 400px; height: 200px; margin: 0 auto"></div><br>
                <div id="container5" style="width: 400px; height: 300px; margin: 0 auto"></div><br>
                <a>Rekap Capaian Kinerja Progres Penarikan BCF 1.5</a>
                <table class="judultabel" border="0" width="100%" align="center">
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
                        <th width="10">
                            Sprint Penarikan
                        </th>
                        <th width="10">
                            BCF 1.5 Masuk TPP
                        </th>
                        <th width="10">
                            BCF 1.5 Tidak Masuk TPP
                        </th>
                    </tr>
                    
                                                <?php
                $no=1;
               
                $sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_tap_bcf15,lap_sprint,lap_bcf15_masuk,lap_bcf15_tidak_masuk FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan  and ".$bagianWhere."  ";
                $qry = mysql_query($sql);
                $total = 0;$totalsprint = 0;$totalmasuk = 0;$totaltdkmasuk = 0;
                 while($data = mysql_fetch_array($qry)){
                     $total = $total + $data['lap_tap_bcf15'];
                     $totalsprint=$totalsprint+$data['lap_sprint'];
                     $totalmasuk=$totalmasuk+$data['lap_bcf15_masuk'];
                     $totaltdkmasuk=$totaltdkmasuk+$data['lap_bcf15_tidak_masuk'];
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
                        <td align="center"><?php echo $data['lap_sprint'] ?></td>
                        <td align="center"><?php echo $data['lap_bcf15_masuk'] ?></td>
                        <td align="center"><?php echo $data['lap_bcf15_tidak_masuk'] ?></td>
                        
                    </tr>
                    
                
                 
                    <?php 
                    }?>
                  <tr>
                    <td  align="center" colspan="3"><b>Total Dokumen : </b></td>
                    
                    <td align="center" ><b><?php echo $total; ?></b></td>
                    <td align="center" ><b><?php echo $totalsprint; ?></b></td>
                    <td align="center" ><b><?php echo $totalmasuk; ?></b></td>
                    <td align="center" ><b><?php echo $totaltdkmasuk; ?></b></td>
                    
                  </tr>
                    </table>
               
               
	</body>
</html>
