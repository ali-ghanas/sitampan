<form method="post" id="addbcf15" name="addbcf15" action="?hal=rekap_capaian_kinerja&pilih=sptahu">
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

//sprint
$menu4=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_pemberitahuan FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu4[] = $row['lap_pemberitahuan'];
}

$aray4=join(" ,",$menu4);

//sptahu 2011
$menu2011=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_pemberitahuan FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and tahun='2011'  ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2011[] = $row['lap_pemberitahuan'];
}

$aray2011=join(" ,",$menu2011);

//sptahu 2012
$menu2012=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_pemberitahuan FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and tahun='2012' ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2012[] = $row['lap_pemberitahuan'];
}

$aray2012=join(" ,",$menu2012);

//sptahu 2013
$menu2013=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_pemberitahuan FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and tahun='2013' ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2013[] = $row['lap_pemberitahuan'];
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
						text: 'Grafik Perbandingan Penerbitan BCF 1.5 dan Surat Pemberitahuan'
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
							text: 'Total Dokumen',
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
						name: 'Surat Pemberitahuan',
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
						renderTo: 'container3',
						zoomType: 'xy'
					},
					title: {
						text: 'Grafik Perbandingan Penerbitan BCF 1.5 dan Surat Pemberitahuan'
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
							text: 'Total Dokumen',
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
					}]
				});
				
				
			});
				
		</script>
                
	</head>
	<body>
	
		<!-- 3. Add the container -->
                
		<div id="container2" style="width: 400px; height: 200px; margin: 0 auto"></div><br>
                <div id="container3" style="width: 400px; height: 200px; margin: 0 auto"></div><br>
                
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
                        <th width="10">
                            Sprint Penarikan
                        </th>
                    </tr>
                    
                                                <?php
                $no=1;
               
                $sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_tap_bcf15,lap_pemberitahuan FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan ";
                $qry = mysql_query($sql);
                $total = 0;$totalsprint = 0;
                 while($data = mysql_fetch_array($qry)){
                     $total = $total + $data['lap_tap_bcf15'];
                     $totalsprint=$totalsprint+$data['lap_pemberitahuan'];
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
                        <td align="center"><?php echo $data['lap_pemberitahuan'] ?></td>
                    </tr>
                    
                
                 
                    <?php 
                    }?>
                  <tr>
                    <td  align="center" colspan="3"><b>Total Dokumen : </b></td>
                    
                    <td align="center" ><b><?php echo $total; ?></b></td>
                    <td align="center" ><b><?php echo $totalsprint; ?></b></td>
                    
                  </tr>
                    </table>
               
               
	</body>
</html>
