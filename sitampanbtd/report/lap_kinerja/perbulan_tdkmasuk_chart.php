<?php 
include "../../lib/koneksi.php";
include "../../lib/function.php";
$no=0;

$bulanget=$_GET['bulan'];
$tahunget=$_GET['tahun'];

//total penerbitan BCF perbulan

$menu4tot=array();
$sql4tot = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2'   ";
$qry4tot = mysql_query($sql4tot);
while($row4tot=mysql_fetch_assoc($qry4tot)){
$menu4tot[] = $row4tot['jumbcf'];
}
$aray4tot=join(" ,",$menu4tot);

$menu4masuktot=array();
$sqlmasuktot = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and masuk='2'  ";
$qry4masuktot = mysql_query($sqlmasuktot);
while($row4masuktot=mysql_fetch_assoc($qry4masuktot)){
$menu4masuktot[] = $row4masuktot['jumbcf'];
}
$aray4masuktot=join(" ,",$menu4masuktot);

//fcl
$menu4fcl=array();
$sql4fcl = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='1' and masuk='2'  ";
$qry4fcl = mysql_query($sql4fcl);
while($row4fcl=mysql_fetch_assoc($qry4fcl)){
$menu4fcl[] = $row4fcl['jumbcf'];
}
$aray4fcl=join(" ,",$menu4fcl);

//lcl
$menu4lcl=array();
$sql4lcl = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='2' and masuk='2' ";
$qry4lcl = mysql_query($sql4lcl);
while($row4lcl=mysql_fetch_assoc($qry4lcl)){
$menu4lcl[] = $row4lcl['jumbcf'];
}
$arraylcl=join(" ,",$menu4lcl);

//partoff
$menupo=array();
$sqlpo = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='3' and masuk='2'  ";
$qrypo = mysql_query($sqlpo);
while($rowpo=mysql_fetch_assoc($qrypo)){
$menupo[] = $rowpo['jumbcf'];
}
$arraypo=join(" ,",$menupo);



//short ship
$menuss=array();
$sqlss = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='4' and masuk='2' ";
$qryss = mysql_query($sqlss);
while($rowss=mysql_fetch_assoc($qryss)){
$menuss[] = $rowss['jumbcf'];
}
$arrayss=join(" ,",$menuss);

//empty cont
$menuec=array();
$sqlec = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='5' and masuk='2' ";
$qryec = mysql_query($sqlec);
while($rowss=mysql_fetch_assoc($qryec)){
$menuec[] = $rowss['jumbcf'];
}
$arrayec=join(" ,",$menuec);

//iso tank
$menuit=array();
$sqlit = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='6' and masuk='2' ";
$qryit = mysql_query($sqlec);
while($rowit=mysql_fetch_assoc($qryit)){
$menuit[] = $rowit['jumbcf'];
}
$arrayit=join(" ,",$menuit);

//reffer
$menurf=array();
$sqlrf = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='7' and masuk='2'  ";
$qryrf = mysql_query($sqlrf);
while($rowrf=mysql_fetch_assoc($qryrf)){
$menurf[] = $rowrf['jumbcf'];
}
$arrayrf=join(" ,",$menurf);

//tdk masuk tpp
$menutdk=array();
$sqltdk = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and masuk='2'  ";
$qrytdk = mysql_query($sqltdk);
while($rowtdk=mysql_fetch_assoc($qrytdk)){
$menutdk[] = $rowtdk['jumbcf'];
}
$arraytdk=join(" ,",$menutdk);

        //tdk masuk tpp tapi telah setuju batal
            $menubtps=array();
            $sqlbtps = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and masuk='2' and setujubatal='1'  ";
            $qrybtps = mysql_query($sqlbtps);
            while($rowbtps=mysql_fetch_assoc($qrybtps)){
            $menubtps[] = $rowbtps['jumbcf'];
            }
            $arraybtps=join(" ,",$menubtps);
            
            //tdk masuk tpp tapi belum setuju batal
            $menubtpsno=array();
            $sqlbtpsno = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and masuk='2' and setujubatal='2'  ";
            $qrybtpsno = mysql_query($sqlbtpsno);
            while($rowbtpsno=mysql_fetch_assoc($qrybtpsno)){
            $menubtpsno[] = $rowbtpsno['jumbcf'];
            }
            $arraybtpsno=join(" ,",$menubtpsno);


//masuk tpp
$menumasuk=array();
$sqlmasuk = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and masuk='1'  ";
$qrymasuk = mysql_query($sqlmasuk);
while($rowmasuk=mysql_fetch_assoc($qrymasuk)){
$menumasuk[] = $rowmasuk['jumbcf'];
}
$arraymasuk=join(" ,",$menumasuk);
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
                                renderTo: 'container2'
                            },
                            title: {
                                text: 'Grafik Penarikan BCF 1.5 Bulan <?php echo $bulanget ?> Tahun  <?php echo "$tahunget" ?>'
                            },
                            xAxis: {
                                categories: ['BCF']
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
                                name: 'All BCF',
                                data: [<?php echo $aray4tot;?>],
                                color: '#000000',
                                dataLabels: {
                                    enabled: true,
                                    
                                   
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },  {
                                type: 'column',
                                name: 'Masuk TPP',
                                data: [<?php echo $arraymasuk;?>],
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
                                name: 'Tidak Masuk',
                                data: [<?php echo $arraytdk;?>],
                                color: '#dfbcb9',
                                dataLabels: {
                                    enabled: true,
                                    
                                 
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },
                            {
                                type: 'pie',
                                name: 'Total Yang Belum Di Tarik BCF 1.5',
                                data: [
                                   
                                    {
                                    name: 'Masuk TPP',
                                    y: <?php echo $arraymasuk;?>,
                                    sliced: true,
                                    
                                    color: '#e63e28'
                                },
                                   {
                                    name: 'Tidak Masuk',
                                    y: <?php echo $arraytdk;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#dfbcb9'
                                }
                                                 ],
                                center: [800,100],
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
                <script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container1'
                            },
                            title: {
                                text: 'Grafik BCF 1.5 YANG TIDAK MASUK TPP  Bulan <?php echo $bulanget ?> Tahun  <?php echo "$tahunget" ?>'
                            },
                            xAxis: {
                                categories: ['BCF'
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
                                name: 'BCF Masuk TPP',
                                data: [<?php echo $aray4masuktot;?>],
                                color: '#000000',
                                dataLabels: {
                                    enabled: true,
                                    
                                   
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },  {
                                type: 'column',
                                name: 'FCL',
                                data: [<?php echo $aray4fcl;?>],
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
                                name: 'LCL',
                                data: [<?php echo $arraylcl;?>],
                                color: '#dfbcb9',
                                dataLabels: {
                                    enabled: true,
                                    
                                 
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },{
                           
                                type: 'column',
                                name: 'PART OFF',
                                data: [<?php echo $arraypo;?>],
                                color: '#12146D',
                                dataLabels: {
                                    enabled: true,
                                    
                                 
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },{
                           
                                type: 'column',
                                name: 'Short Ship',
                                data: [<?php echo $arrayss;?>],
                                color: '#00FF40',
                                dataLabels: {
                                    enabled: true,
                                    
                                 
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },{
                           
                                type: 'column',
                                name: 'Empty Container',
                                data: [<?php echo $arrayec;?>],
                                color: '#FF8000',
                                dataLabels: {
                                    enabled: true,
                                    
                                 
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },{
                           
                                type: 'column',
                                name: 'Iso Tank',
                                data: [<?php echo $arrayit;?>],
                                color: '#800040',
                                dataLabels: {
                                    enabled: true,
                                    
                                 
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },
                            {
                           
                                type: 'column',
                                name: 'Reffer',
                                data: [<?php echo $arrayrf;?>],
                                color: '#8080C0',
                                dataLabels: {
                                    enabled: true,
                                    
                                 
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },
                            {
                                type: 'pie',
                                name: 'Total Yang Belum Di Tarik BCF 1.5',
                                data: [
                                   
                                    {
                                    name: 'FCL',
                                    y: <?php echo $aray4fcl;?>,
                                    sliced: true,
                                    
                                    color: '#e63e28'
                                },
                                   {
                                    name: 'LCL',
                                    y: <?php echo $arraylcl;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#dfbcb9'
                                },
                                {
                                    name: 'Part Off',
                                    y: <?php echo $arraypo;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#12146D'
                                },{
                                    name: 'Short Ship',
                                    y: <?php echo $arrayss;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#00FF40'
                                    
                                },{
                                    name: 'Empty Cont',
                                    y: <?php echo $arrayec;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#FF8000'
                                    
                                },{
                                    name: 'Iso Tank',
                                    y: <?php echo $arrayit;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#800040'
                                    
                                },{
                                    name: 'Reffer',
                                    y: <?php echo $arrayrf;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#8080C0'
                                    
                                }
                                                 ],
                                center: [700,300],
                                size: 200,
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
                <script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container3'
                            },
                            title: {
                                text: 'Grafik BCF 1.5 YANG TIDAK MASUK TPP  Bulan <?php echo $bulanget ?> Tahun  <?php echo "$tahunget" ?>'
                            },
                            xAxis: {
                                categories: ['BCF'
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
                                name: 'BCF Tidak Masuk TPP',
                                data: [<?php echo $arraytdk;?>],
                                color: '#000000',
                                dataLabels: {
                                    enabled: true,
                                    
                                   
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },  {
                                type: 'column',
                                name: 'Batal di TPS',
                                data: [<?php echo $arraybtps;?>],
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
                                name: 'Belum Batal',
                                data: [<?php echo $arraybtpsno;?>],
                                color: '#dfbcb9',
                                dataLabels: {
                                    enabled: true,
                                    
                                 
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },
                            {
                                type: 'pie',
                                name: 'Total Yang Belum Di Tarik BCF 1.5',
                                data: [
                                   
                                    {
                                    name: 'Batal Di TPS',
                                    y: <?php echo $arraybtps;?>,
                                    sliced: true,
                                    
                                    color: '#e63e28'
                                },
                                   {
                                    name: 'Belum Batal',
                                    y: <?php echo $arraybtpsno;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#dfbcb9'
                                }
                                                 ],
                                center: [700,300],
                                size: 200,
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
                     <div id="container2" style="width: 1000px; height: 700px; margin: 4 auto"></div>
                     <div id="container1" style="width: 1000px; height: 700px; margin: 4 auto"></div>
                     <div id="container3" style="width: 1000px; height: 700px; margin: 4 auto"></div>
                     <div>
                         <table>
                             <tr>
                                 <td> <a href="?hal=lap_bcfterbit">Kembali</a></td>
                                 <td>|</td>
                                 <td>
                                     <form name="form1" method="get" action="report/export/lap_chart_belummasuk.php">
                                        
                                        <input  name="bulan" id="bulan" class="required" type="hidden" value="<?php echo $bulanget; ?>" />
                                        <input  name="tahun" id="tahun" class="required" type="hidden" value="<?php echo $tahunget; ?>" />
                                        
                                        
                                        
                                        <input type="submit" value="Download To Excel" name="search"/>
                                    </form>
                                 </td>
                             </tr>
                         </table>
                        
                         
                        
                     </div>
                      
                                    
                    
	</body>
</html>
