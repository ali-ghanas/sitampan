                <form method="post" id="addbcf15" name="addbcf15" action="?hal=grafik_kinerja_penarikan">
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


//bcf15 terbit
$menu2=array();
$sql = "SELECT count(bcf15no) as jumbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan FROM bcf15 where tahun='$tahun' and pecahpos='2' and longstay_tps='0' and recordstatus='2' group by bulan  ";
$qry = mysql_query($sql);
while($row=mysql_fetch_assoc($qry)){

$menu2[] = $row['jumbcf'];
}

$aray2=join(" ,",$menu2);

//bcf masuk
$menu3=array();
$menu3tot=array();
$sql3 = "SELECT count(bcf15no) as jumbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan FROM bcf15 where tahun='$tahun' and  masuk='1' and pecahpos='2' and longstay_tps='0' and recordstatus='2' group by bulan  ";
$sql3tot = "SELECT count(bcf15no) as jumbcf FROM bcf15 where tahun='$tahun' and pecahpos='2' and  masuk='1' and longstay_tps='0' and recordstatus='2' ";
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

$arraypersen=$aray3/$aray2;




//bcf tidak masuk
$menu4=array();
$menu4tot=array();
$menubataditps=array();
$sql4 = "SELECT count(bcf15no) as jumbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan FROM bcf15 where tahun='$tahun' and  masuk='2' and pecahpos='2' and longstay_tps='0' and setujubatal='2' and recordstatus='2' group by bulan  ";
$sql4tot = "SELECT count(bcf15no) as jumbcf FROM bcf15 where tahun='$tahun' and pecahpos='2' and  masuk='2' and longstay_tps='0' and setujubatal='2'  and recordstatus='2' ";
$sql4batalditps = "SELECT count(bcf15no) as jumbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan FROM bcf15 where tahun='$tahun' and pecahpos='2' and  masuk='2' and longstay_tps='0' and setujubatal='1' and recordstatus='2' group by bulan  ";
$qry4 = mysql_query($sql4);
$qry4tot = mysql_query($sql4tot);
$qrybatalditps = mysql_query($sql4batalditps);
while($row4=mysql_fetch_assoc($qry4)){

$menu4[] = $row4['jumbcf'];
}
$aray4=join(" ,",$menu4);
while($row4tot=mysql_fetch_assoc($qry4tot)){

$menu4tot[] = $row4tot['jumbcf'];
}

$aray4tot=join(" ,",$menu4tot);
while($rowbatalditps=mysql_fetch_assoc($qrybatalditps)){

$menubataditps[] = $rowbatalditps['jumbcf'];
}

$araybatalditps=join(" ,",$menubataditps);


//all BCF 1.5 termasuk long stay
$menuall=array();//bcf15 terbit
$sqlall = "SELECT count(bcf15no) as jumbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan FROM bcf15 where tahun='$tahun' and pecahpos='2' and recordstatus='2' group by bulan  ";
$qryall = mysql_query($sqlall);
while($rowall=mysql_fetch_assoc($qryall)){

$menuall[] = $rowall['jumbcf'];
}

$arayall=join(" ,",$menuall);

//bcf masuk
$menu3all=array();
$menu3totall=array();
$sql3all = "SELECT count(bcf15no) as jumbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan FROM bcf15 where tahun='$tahun' and  masuk='1' and pecahpos='2' and recordstatus='2' group by bulan  ";
$sql3totall = "SELECT count(bcf15no) as jumbcf FROM bcf15 where tahun='$tahun' and pecahpos='2' and  masuk='1' and recordstatus='2' ";
$qry3all = mysql_query($sql3all);
$qry3totall = mysql_query($sql3totall);
while($row3all=mysql_fetch_assoc($qry3all)){

$menu3all[] = $row3all['jumbcf'];
}
$aray3all=join(" ,",$menu3all);
while($row3totall=mysql_fetch_assoc($qry3totall)){

$menu3totall[] = $row3totall['jumbcf'];
}
$aray3totall=join(" ,",$menu3totall);

//bcf tidak masuk
$menu4all=array();
$menu4totall=array();
$sql4all = "SELECT count(bcf15no) as jumbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan FROM bcf15 where tahun='$tahun' and  masuk='2' and pecahpos='2' and recordstatus='2' group by bulan  ";
$sql4totall = "SELECT count(bcf15no) as jumbcf FROM bcf15 where tahun='$tahun' and pecahpos='2' and  masuk='2' and recordstatus='2'  ";
$qry4all = mysql_query($sql4all);
$qry4totall = mysql_query($sql4totall);
while($row4all=mysql_fetch_assoc($qry4all)){

$menu4all[] = $row4all['jumbcf'];
}
$aray4all=join(" ,",$menu4all);
while($row4totall=mysql_fetch_assoc($qry4totall)){

$menu4totall[] = $row4totall['jumbcf'];
}

$aray4totall=join(" ,",$menu4totall);


//pertpp yang tidak masuk
//bcf tidak masuk
$menu4tpp=array();
$menu4tottpp=array();
$menubataditpstpp=array();
$sql4tpp = "SELECT count(bcf15no) as jumbcf,idtpp FROM bcf15 where tahun='$tahun' and  masuk='2' and pecahpos='2' and longstay_tps='0' and setujubatal='2' and recordstatus='2' group by idtpp  ";
$sql4tottpp = "SELECT count(bcf15no) as jumbcf FROM bcf15 where tahun='$tahun' and pecahpos='2' and  masuk='2' and longstay_tps='0' and setujubatal='2' and recordstatus='2' ";
$sql4batalditpstpp = "SELECT count(bcf15no) as jumbcf,idtpp FROM bcf15 where tahun='$tahun' and pecahpos='2' and  masuk='2' and longstay_tps='0' and setujubatal='1' and recordstatus='2' group by idtpp  ";
$qry4tpp = mysql_query($sql4tpp);
$qry4tottpp = mysql_query($sql4tottpp);
$qrybatalditpstpp = mysql_query($sql4batalditpstpp);
while($row4tpp=mysql_fetch_assoc($qry4tpp)){

$menu4tpp[] = $row4tpp['jumbcf'];
}
$aray4tpp=join(" ,",$menu4tpp);
while($row4tottpp=mysql_fetch_assoc($qry4tottpp)){

$menu4tottpp[] = $row4tottpp['jumbcf'];
}

$aray4tottpp=join(" ,",$menu4tottpp);
while($rowbatalditpstpp=mysql_fetch_assoc($qrybatalditpstpp)){

$menubataditpstpp[] = $rowbatalditpstpp['jumbcf'];
}

$araybatalditpstpp=join(" ,",$menubataditpstpp);

//tpp rinci
//bcf tidak masuk tripandu
$menu4tri=array();
$sql4tri = "SELECT count(bcf15no) as jumbcf,idtpp FROM bcf15 where tahun='$tahun' and  masuk='2' and pecahpos='2' and longstay_tps='0' and setujubatal='2' and recordstatus='2' and idtpp='1'  ";

$qry4tri = mysql_query($sql4tri);

while($row4tri=mysql_fetch_assoc($qry4tri)){

$menu4tri[] = $row4tri['jumbcf'];
}
$aray4tri=join(" ,",$menu4tri);

//bcf tidak masuk transcon
$menu4tci=array();
$sql4tci = "SELECT count(bcf15no) as jumbcf,idtpp FROM bcf15 where tahun='$tahun' and  masuk='2' and pecahpos='2' and longstay_tps='0' and setujubatal='2' and recordstatus='2' and idtpp='2'  ";

$qry4tci = mysql_query($sql4tci);

while($row4tci=mysql_fetch_assoc($qry4tci)){

$menu4tci[] = $row4tci['jumbcf'];
}
$aray4tci=join(" ,",$menu4tci);

//bcf tidak masuk MSA
$menu4msa=array();
$sql4msa = "SELECT count(bcf15no) as jumbcf,idtpp FROM bcf15 where tahun='$tahun' and  masuk='2' and pecahpos='2' and longstay_tps='0' and setujubatal='2' and recordstatus='2' and idtpp='3'  ";

$qry4msa = mysql_query($sql4msa);

while($row4msa=mysql_fetch_assoc($qry4msa)){

$menu4msa[] = $row4msa['jumbcf'];
}
$aray4msa=join(" ,",$menu4msa);

//bcf tidak masuk L4
$menu4l4=array();
$sql4l4 = "SELECT count(bcf15no) as jumbcf,idtpp FROM bcf15 where tahun='$tahun' and  masuk='2' and pecahpos='2' and longstay_tps='0' and setujubatal='2' and recordstatus='2' and idtpp='4'  ";

$qry4l4 = mysql_query($sql4l4);

while($row4l4=mysql_fetch_assoc($qry4l4)){

$menu4l4[] = $row4l4['jumbcf'];
}
$aray4l4=join(" ,",$menu4l4);

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
                                text: 'Monitoring Penarikan <?php echo "$tahun" ?>(tidak Termasuk Longstay)'
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun','Jul','Agt','Sept','Okt','Nop','Des'
							],
                                tickmarkPlacement: 'on',
                                title: {
                                    enabled: false
                                }       
                            },
                            yAxis: {
                                min:0,
                                title: {
                                    text: 'Total BCF 1.5'
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
                             tooltip: {
                                
                                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{this.percentage:.1f}%</b> ({this.y:,.0f} millions)<br/>',
                shared: true
                            },
//                            plotOptions: {
//                                area: {
//                                    stacking: 'percent',
//                                    lineColor: '#ffffff',
//                                    lineWidth: 1,
//                                    marker: {
//                                        lineWidth: 1,
//                                        lineColor: '#ffffff'
//                                    }
//                                }
//                            },  
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
                                name: 'Terbit',
                                data: [<?php echo $aray2; ?>],
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
                                name: 'Masuk',
                                data: [<?php echo $aray3; ?>],
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
                                name: 'Tidak Masuk',
                                data: [<?php echo $aray4;?>],
                                color: '#e63e28',
                                dataLabels: {
                                    enabled: true,
                                    
                                   
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },{
                           
                                type: 'column',
                                name: 'Batal di TPS',
                                data: [<?php echo $araybatalditps;?>],
                                color: '#dfbcb9',
                                dataLabels: {
                                    enabled: true,
                                    
                                   
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

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
                                text: 'Yang Tidak ditarik Per TPP <?php echo "$tahun" ?>(tidak Termasuk Longstay)'
                            },
                            xAxis: {
                                categories: ['TPP', 'TCI', 'MSA', 'L4'
							]
                            },
                            yAxis: {
                                title: {
                                    text: 'Total BCF 1.5'
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
                                name: 'All Tidak ditarik',
                                data: [<?php echo $aray4tot;?>],
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
                                name: 'Tidak ditarik',
                                data: [<?php echo $aray4tpp;?>],
                                color: '#e63e28',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },{
                           
                                type: 'column',
                                name: 'Batal di TPS',
                                data: [<?php echo $araybatalditpstpp;?>],
                                color: '#dfbcb9',
                                dataLabels: {
                                    enabled: true,
                                    
                                 
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },{
                                type: 'pie',
                                name: 'Total Yang Belum Di Tarik BCF 1.5',
                                data: [
                                   
                                    {
                                    name: 'Tripandu',
                                    y: <?php echo $aray4tri;?>,
                                    sliced: true,
                                    
                                    color: '#44dd36'
                                },
                                   {
                                    name: 'TCI',
                                    y: <?php echo $aray4tci;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#d548d4'
                                },
                                {
                                    name: 'MSA',
                                    y: <?php echo $aray4msa;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#e5e77e'
                                },{
                                    name: 'L4',
                                    y: <?php echo $aray4l4;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#222216'
                                    
                                }
                                                 ],
                                center: [300, 100],
                                size: 100,
                                showInLegend: false,
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                                
                                
                            }]
                        });
                    });

				
		</script>
                
<!--                all-->
<script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container1'
                            },
                            title: {
                                text: 'Monitoring Penarikan <?php echo $tahun ?>(Termasuk Longstay)'
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun','Jul','Agt','Sept','Okt','Nop','Des'
							]
                            },
                            yAxis: {
                                title: {
                                    text: 'Total BCF 1.5'
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
                                name: 'Terbit',
                                data: [<?php echo $arayall;?>],
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
                                name: 'Masuk',
                                data: [<?php echo $aray3all;?>],
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
                                name: 'Tidak Masuk',
                                data: [<?php echo $aray4all;?>],
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
                                    name: 'Masuk',
                                    y: <?php echo $aray3totall;?>,
                                    sliced: false,
                                    
                                    color: '#44dd36'
                                },
                                   {
                                    name: 'Tidak Masuk',
                                    y: <?php echo $aray4totall;?>,
                                    sliced: false,
                                    selected: true,
                                    color: '#e63e28'
                                }
                                                 ],
                                center: [350, 100],
                                size: 100,
                                showInLegend: false,
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            }]
                        });
                    });

				
		</script>
                
	</head>
	<body>
            <table>
                <tr>
                    <td>Target Yang Tidak di Selesaikan Penarikan sesuai iku adalah :dibawah 10%</td>
                </tr>
                <tr>
                    <td>
                        Jangan lupa untuk menginput BA Penarikan. 
                    </td>
                </tr>
                
            </table>
            
                    <table>
                        <tr>
                            <td>
                                <div id="container1" style="width: 900px; height: 500px; margin: 10 auto"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div id="container" style="width: 900px; height: 500px; margin: 10 auto"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="container2" style="width: 800px; height: 500px; margin: 10 auto"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <ul>
                                    <li><a href="?hal=lap_bcfterbit">Laporan Detail</a></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
		
		<br>
                
               
	</body>
</html>
