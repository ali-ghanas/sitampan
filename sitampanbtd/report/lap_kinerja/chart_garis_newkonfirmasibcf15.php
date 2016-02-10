                <form method="post" id="addbcf15" name="addbcf15" action="?hal=newkonfirmasi">
                    <table >

                        <tr>
                          <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>></td>
                          <td><input type="text"  class="required" placeholder="input tahun disini" name="tahun" value="<?php echo $_POST['tahun']?>"> </td>


                            <td><input class="button putih bigrounded " type="submit" name="addsubmit" value="Ok"    /></td>
                            
                        </tr>

                    </table>
                        <span>Centang dan Masukkan Parameter Tahun</span>
                    </form>
<?php 
include "../../lib/koneksi.php";
                                if (isset($_POST['Tahun']))
                                        {
                                           $tahun = $_POST['tahun'];
                                          
                                        }
                                 else {
                                     $tahun = date('Y');
                                     
                                 }
                                       
$no=0;

//total konfirmasi yang dikirim via softcopy
$menu2=array();
$sql = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun'  group by bulan  ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2[] = $row['jumbcf'];
}

$aray2=join(" ,",$menu2);

//total yang masih diproses
$menu3=array();
$menu3tot=array();
$sql3 = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_system' or konf_statusakhir='konsep' or konf_statusakhir='konf_hardcopy' or konf_statusakhir='konf_jawabok')  group by bulan  ";
$sql3tot = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_system' or konf_statusakhir='konsep' or konf_statusakhir='konf_hardcopy' or konf_statusakhir='jawab_ok') ";
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




// total yang telah selesai
$menu4=array();
$menu4tot=array();
$sql4 = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and konf_statusakhir='konf_selesai' group by bulan ";
$sql4tot = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and konf_statusakhir='konf_selesai' ";
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



//total konf by sistem
$menu3sys=array();
$menu3totsys=array();
$sql3sys = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_system' )  group by bulan  ";
$sql3totsys = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_system' )   ";
$qry3sys = mysql_query($sql3sys);
$qry3totsys = mysql_query($sql3totsys);
while($row3sys=mysql_fetch_assoc($qry3sys)){

$menu3sys[] = $row3sys['jumbcf'];
}
$aray3sys=join(" ,",$menu3sys);
while($row3totsys=mysql_fetch_assoc($qry3totsys)){

$menu3totsys[] = $row3totsys['jumbcf'];
}
$aray3totsys=join(" ,",$menu3totsys);

//total hardcopy
$menu3hd=array();
$menu3tothd=array();
$sql3hd = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_hardcopy' )  group by bulan  ";
$sql3tothd = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_hardcopy' )  ";
$qry3hd = mysql_query($sql3hd);
$qry3tothd = mysql_query($sql3tothd);
while($row3hd=mysql_fetch_assoc($qry3hd)){

$menu3hd[] = $row3hd['jumbcf'];
}
$aray3hd=join(" ,",$menu3hd);
while($row3tothd=mysql_fetch_assoc($qry3tothd)){

$menu3tothd[] = $row3tothd['jumbcf'];
}
$aray3tothd=join(" ,",$menu3tothd);

//total yang dijwab
$menu3ok=array();
$menu3totok=array();
$sql3ok = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_jawabok' )  group by bulan  ";
$sql3totok = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_jawabok' )  ";
$qry3ok = mysql_query($sql3ok);
$qry3totok = mysql_query($sql3totok);
while($row3ok=mysql_fetch_assoc($qry3ok)){

$menu3ok[] = $row3ok['jumbcf'];
}
$aray3ok=join(" ,",$menu3ok);
while($row3totok=mysql_fetch_assoc($qry3totok)){

$menu3totok[] = $row3totok['jumbcf'];
}
$aray3totok=join(" ,",$menu3totok);

//total Konfirmasi yang telah setuju batal
$menu3sls=array();
$menu3totsls=array();
$sql3sls = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_selesai' )  group by bulan  ";
$sql3totsls = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_statusakhir='konf_selesai' )  ";
$qry3sls = mysql_query($sql3sls);
$qry3totsls = mysql_query($sql3totsls);
while($row3sls=mysql_fetch_assoc($qry3sls)){

$menu3sls[] = $row3sls['jumbcf'];
}
$aray3sls=join(" ,",$menu3sls);
while($row3totsls=mysql_fetch_assoc($qry3totsls)){

$menu3totsls[] = $row3totsls['jumbcf'];
}
$aray3totsls=join(" ,",$menu3totsls);


//total Konfirmasi Soft Copy
$menu3soft=array();
$menu3totsoft=array();
$sql3soft = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_manualhc='0' )  group by bulan  ";
$sql3totsoft = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_manualhc='0' )  ";
$qry3soft = mysql_query($sql3soft);
$qry3totsoft = mysql_query($sql3totsoft);
while($row3soft=mysql_fetch_assoc($qry3soft)){

$menu3soft[] = $row3soft['jumbcf'];
}
$aray3soft=join(" ,",$menu3soft);
while($row3totsoft=mysql_fetch_assoc($qry3totsoft)){

$menu3totsoft[] = $row3totsoft['jumbcf'];
}
$aray3totsoft=join(" ,",$menu3totsoft);


//total Konfirmasi hard Copy
$menu3hard=array();
$menu3tothard=array();
$sql3hard = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_manualhc='1' )  group by bulan  ";
$sql3tothard = "SELECT count(idkofirmasi_p2) as jumbcf,DATE_FORMAT(konf_tglkonftpp,'%m') as bulan FROM kofirmasi_p2 where DATE_FORMAT(konf_tglkonftpp,'%Y')='$tahun' and  (konf_manualhc='1' )  ";
$qry3hard = mysql_query($sql3hard);
$qry3tothard = mysql_query($sql3tothard);
while($row3hard=mysql_fetch_assoc($qry3hard)){

$menu3hard[] = $row3hard['jumbcf'];
}
$aray3hard=join(" ,",$menu3hard);
while($row3tothard=mysql_fetch_assoc($qry3tothard)){

$menu3tothard[] = $row3tothard['jumbcf'];
}
$aray3tothard=join(" ,",$menu3tothard);



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
                                text: 'Grafik Konfirmasi Pembatalan BCF 1.5 <?php echo $tahun ?>'
                            },
                            xAxis: {
                                categories: ['Mar', 'Apr', 'Mei', 'Jun','Jul','Agt','Sept','Okt','Nop','Des'
							]
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Konfirmasi'
                                }
                            },
                            tooltip: {
                                formatter: function() {
                                    var s;
                                    if (this.point.name) { // the pie chart
                                        s = ''+
                                            this.point.name +': '+ this.y +' BCF 1.5';
                                    } else {
                                        s = ''+
                                            this.x  +': '+ this.y;
                                    }
                                    return s;
                                }
                            },
                            labels: {
                                items: [{
                                    html: 'Total BCF 1.5',
                                    style: {
                                        left: '40px',
                                        top: '8px',
                                        color: 'black'
                                    }
                                }]
                            },
                            series: [{
                                type: 'column',
                                name: 'Total Konfirmasi',
                                data: [<?php echo $aray2;?>],
                                color: '#225e9b',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },  {
                                type: 'column',
                                name: 'Telah Selesai',
                                data: [<?php echo $aray4;?>],
                                color: '#e63e28',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            }, {
                                type: 'pie',
                                name: 'Total BCF 1.5',
                                data: [
                                   
                                    {
                                    name: 'Masih Proses',
                                    y: <?php echo $aray3tot;?>,
                                    sliced: true,
                                    
                                    color: '#44dd36'
                                },
                                   {
                                    name: 'Telah Selesai',
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
                <script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container1'
                            },
                            title: {
                                text: 'Proses Konfirmasi <?php echo $tahun ?>'
                            },
                            xAxis: {
                                categories: ['Mar', 'Apr', 'Mei', 'Jun','Jul','Agt','Sept','Okt','Nop','Des'
							]
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Konfirmasi'
                                }
                            },
                            tooltip: {
                                formatter: function() {
                                    var s;
                                    if (this.point.name) { // the pie chart
                                        s = ''+
                                            this.point.name +': '+ this.y +' BCF 1.5';
                                    } else {
                                        s = ''+
                                            this.x  +': '+ this.y;
                                    }
                                    return s;
                                }
                            },
                            labels: {
                                items: [{
                                    html: 'Total BCF 1.5',
                                    style: {
                                        left: '40px',
                                        top: '8px',
                                        color: 'black'
                                    }
                                }]
                            },
                            series: [{
                                type: 'column',
                                name: 'Total Konfirmasi',
                                data: [<?php echo $aray2;?>],
                                color: '#225e9b',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },  {
                                type: 'column',
                                name: 'Konf Selesai',
                                data: [<?php echo $aray3sls;?>],
                                color: '#b9182c',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },{
                                type: 'pie',
                                name: 'Total BCF 1.5',
                                data: [
                                   
                                    {
                                    name: 'SoftCopy',
                                    y: <?php echo $aray3totsys;?>,
                                    sliced: true,
                                    
                                    color: '#44dd36'
                                },
                                   {
                                    name: 'HDCopy',
                                    y: <?php echo $aray3tothd;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#cece46'
                                },
                                {
                                    name: 'Jawab',
                                    y: <?php echo $aray3totok;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#13292a'
                                },
                                {
                                    name: 'Selesai',
                                    y: <?php echo $aray3totsls;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#b9182c'
                                }
                                                 ],
                                center: [100, 50],
                                size: 100,
                                showInLegend: true,
                                dataLabels: {
                                    enabled: false
                                }
                            }]
                        });
                    });

				
		</script>
                <script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container2'
                            },
                            title: {
                                text: 'Perbandingan Konfirmasi Soft Copy dan Hard Copy <?php echo $tahun ?>'
                            },
                            xAxis: {
                                categories: ['Mar', 'Apr', 'Mei', 'Jun','Jul','Agt','Sept','Okt','Nop','Des'
							]
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Konfirmasi'
                                }
                            },
                            tooltip: {
                                formatter: function() {
                                    var s;
                                    if (this.point.name) { // the pie chart
                                        s = ''+
                                            this.point.name +': '+ this.y +' BCF 1.5';
                                    } else {
                                        s = ''+
                                            this.x  +': '+ this.y;
                                    }
                                    return s;
                                }
                            },
                            labels: {
                                items: [{
                                    html: 'Total BCF 1.5',
                                    style: {
                                        left: '40px',
                                        top: '8px',
                                        color: 'black'
                                    }
                                }]
                            },
                            series: [{
                                type: 'column',
                                name: 'Total Konfirmasi',
                                data: [<?php echo $aray2;?>],
                                color: '#225e9b',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            }, {
                                type: 'column',
                                name: 'Soft Copy',
                                data: [<?php echo $aray3soft;?>],
                                color: '#44dd36',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            }, {
                                type: 'column',
                                name: 'Hardcopy',
                                data: [<?php echo $aray3hard;?>],
                                color: '#e63e28',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            }, {
                                type: 'pie',
                                name: 'Total BCF 1.5',
                                data: [
                                   
                                    {
                                    name: 'Soft',
                                    y: <?php echo $aray3totsoft;?>,
                                    sliced: true,
                                    
                                    color: '#44dd36'
                                },
                                   {
                                    name: 'Hard',
                                    y: <?php echo $aray3tothard;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#e63e28'
                                }
                                                 ],
                                center: [350, 100],
                                size: 100,
                                showInLegend: true,
                                dataLabels: {
                                    enabled: false
                                }
                            }]
                        });
                    });

				
		</script>
                
	</head>
	<body>
            
            <table>
                
                <tr>
                    <td>
                        <div id="container" style="width: 600px; height: 500px; margin: 20 auto"></div><br>
                    </td>
                    <td>
                       <div id="container2" style="width: 600px; height: 500px; margin: 20 auto"></div><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="container1" style="width: 1000px; height: 500px; margin: 20 auto"></div><br>
                    </td>
                    
                </tr>
            </table>
		
                
               
	</body>
</html>
