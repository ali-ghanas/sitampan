<form method="post" id="addbcf15" name="addbcf15" action="?hal=rekap_capaian_kinerja&pilih=pembatalan">
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

//permohonan pembatalan yang diterima
$menu5=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_suratmohonbatal FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu5[] = $row['lap_suratmohonbatal'];
}

$aray5=join(" ,",$menu5);

//setuju batal
$menu6=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_setujubatalbcf15 FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu6[] = $row['lap_setujubatalbcf15'];
}

$aray6=join(" ,",$menu6);

//konfirmasi
$menu7=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_ndkondirmasip2 FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu7[] = $row['lap_ndkondirmasip2'];
}

$aray7=join(" ,",$menu7);

//cacah
$menu8=array();
$sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_cacah_batal FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu8[] = $row['lap_cacah_batal'];
}

$aray8=join(" ,",$menu8);


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
						text: 'Grafik Proses Pembatalan BCF 1.5 <?php echo $tahun ?>'
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
						color: 'red',
						type: 'spline',
						data: [<?php echo $aray2;?>]
					},
                                        {
						name: 'BCF Permohonan Batal',
						color: 'green',
						type: 'spline',
						data: [<?php echo $aray5;?>]
					},
                                        {
						name: 'BCF 1.5 yang Konfirmasi',
						color: 'blue',
						type: 'spline',
						data: [<?php echo $aray7;?>]
					},
                                        {
						name: 'Setuju Pembatalan BCF 1.5',
						color: 'pink',
						type: 'spline',
						data: [<?php echo $aray6;?>]
					},
                                        {
						name: 'Pencacahan',
						color: 'purple',
						type: 'spline',
						data: [<?php echo $aray8;?>]
					}
                                        
                                       ]
				});
				
				
			});
				
		</script>
                
                
	</head>
	<body>
	
		<!-- 3. Add the container -->
                
		<div id="container2" style="width: 400px; height: 200px; margin: 0 auto"></div><br>
               
                <a>Rekap Capaian Kinerja Pembatalan BCF 1.5</a>
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
                            Surat Permohonan
                        </th>
                        <th width="10">
                            Cacah
                        </th>
                        <th width="10">
                            Konfirmasi P2
                        </th>
                        <th width="10">
                           Setuju Batal
                        </th>
                    </tr>
                    
                                                <?php
                $no=1;
               
                $sql = "SELECT idlap_kinerja_bulan,nm_bulan,bulan,Tahun,lap_tap_bcf15,lap_suratmohonbatal,lap_cacah_batal,lap_ndkondirmasip2,lap_setujubatalbcf15 FROM lap_kinerja,lap_kinerja_bulan where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan  and ".$bagianWhere."  ";
                $qry = mysql_query($sql);
                $total = 0;$totalpermohonan = 0;$totalcacah = 0;$totalkonfirmasi = 0;$totalsetujubatal = 0;
                 while($data = mysql_fetch_array($qry)){
                     $total = $total + $data['lap_tap_bcf15'];
                     $totalpermohonan=$totalpermohonan+$data['lap_suratmohonbatal'];
                     $totalcacah=$totalcacah+$data['lap_cacah_batal'];
                     $totalkonfirmasi=$totalkonfirmasi+$data['lap_ndkondirmasip2'];
                     $totalsetujubatal=$totalsetujubatal+$data['lap_setujubatalbcf15'];
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
                        <td align="center"><?php echo $data['lap_suratmohonbatal'] ?></td>
                        <td align="center"><?php echo $data['lap_cacah_batal'] ?></td>
                        <td align="center"><?php echo $data['lap_ndkondirmasip2'] ?></td>
                        <td align="center"><?php echo $data['lap_setujubatalbcf15'] ?></td>
                        
                    </tr>
                    
                
                 
                    <?php 
                    }?>
                  <tr>
                    <td  align="center" colspan="3"><b>Total Dokumen : </b></td>
                    
                    <td align="center" ><b><?php echo $total; ?></b></td>
                    <td align="center" ><b><?php echo $totalpermohonan; ?></b></td>
                    <td align="center" ><b><?php echo $totalcacah; ?></b></td>
                    <td align="center" ><b><?php echo $totalkonfirmasi; ?></b></td>
                    <td align="center" ><b><?php echo $totalsetujubatal; ?></b></td>
                    
                  </tr>
                    </table>
               
               
	</body>
</html>
