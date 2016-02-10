<?php 
include "../../lib/koneksi.php";
include "../../lib/function.php";
$no=0;

$bulanget=$_GET['bulan'];
$tahunget=$_GET['tahun'];

//total penerbitan BCF perbulan

$menu4tot=array();
$sql4tot = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2'  ";
$qry4tot = mysql_query($sql4tot);
while($row4tot=mysql_fetch_assoc($qry4tot)){
$menu4tot[] = $row4tot['jumbcf'];
}
$aray4tot=join(" ,",$menu4tot);

//fcl
$menu4fcl=array();
$sql4fcl = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='1'  ";
$qry4fcl = mysql_query($sql4fcl);
while($row4fcl=mysql_fetch_assoc($qry4fcl)){
$menu4fcl[] = $row4fcl['jumbcf'];
}
$aray4fcl=join(" ,",$menu4fcl);

//lcl
$menu4lcl=array();
$sql4lcl = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='2'  ";
$qry4lcl = mysql_query($sql4lcl);
while($row4lcl=mysql_fetch_assoc($qry4lcl)){
$menu4lcl[] = $row4lcl['jumbcf'];
}
$arraylcl=join(" ,",$menu4lcl);

//partoff
$menupo=array();
$sqlpo = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='3'  ";
$qrypo = mysql_query($sqlpo);
while($rowpo=mysql_fetch_assoc($qrypo)){
$menupo[] = $rowpo['jumbcf'];
}
$arraypo=join(" ,",$menupo);



//short ship
$menuss=array();
$sqlss = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='4'  ";
$qryss = mysql_query($sqlss);
while($rowss=mysql_fetch_assoc($qryss)){
$menuss[] = $rowss['jumbcf'];
}
$arrayss=join(" ,",$menuss);

//empty cont
$menuec=array();
$sqlec = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='5'  ";
$qryec = mysql_query($sqlec);
while($rowec=mysql_fetch_assoc($qryec)){
$menuec[] = $rowec['jumbcf'];
}
$arrayec=join(" ,",$menuec);

//iso tank
$menuit=array();
$sqlit = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='6'  ";
$qryit = mysql_query($sqlit);
while($rowit=mysql_fetch_assoc($qryit)){
$menuit[] = $rowit['jumbcf'];
}
$arrayit=join(" ,",$menuit);

//reffer
$menurf=array();
$sqlrf = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='7'  ";
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


//masuk tpp
$menumasuk=array();
$sqlmasuk = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and masuk='1'  ";
$qrymasuk = mysql_query($sqlmasuk);
while($rowmasuk=mysql_fetch_assoc($qrymasuk)){
$menumasuk[] = $rowmasuk['jumbcf'];
}
$arraymasuk=join(" ,",$menumasuk);

//long stay 
$menuls=array();
$sqlls = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and longstay_tps='1'  ";
$qryls = mysql_query($sqlls);
while($rowls=mysql_fetch_assoc($qryls)){
$menuls[] = $rowls['jumbcf'];
}
$arrayls=join(" ,",$menuls);

//tdk long stay 
$menulsno=array();
$sqllsno = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and longstay_tps='0'  ";
$qrylsno = mysql_query($sqllsno);
while($rowlsno=mysql_fetch_assoc($qrylsno)){
$menulsno[] = $rowlsno['jumbcf'];
}
$arraylsno=join(" ,",$menulsno);

//longstayfcl
$menu4fclls=array();
$sql4fclls = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='1'  and longstay_tps='1' ";
$qry4fclls = mysql_query($sql4fclls);
while($row4fclls=mysql_fetch_assoc($qry4fclls)){
$menu4fclls[] = $row4fclls['jumbcf'];
}
$aray4fclls=join(" ,",$menu4fclls);

//lcl
$menu4lclls=array();
$sql4lclls = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='2' and longstay_tps='1' ";
$qry4lclls = mysql_query($sql4lclls);
while($row4lclls=mysql_fetch_assoc($qry4lclls)){
$menu4lclls[] = $row4lclls['jumbcf'];
}
$arraylclls=join(" ,",$menu4lclls);

//partoff
$menupols=array();
$sqlpols = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='3' and longstay_tps='1' ";
$qrypols = mysql_query($sqlpols);
while($rowpols=mysql_fetch_assoc($qrypols)){
$menupols[] = $rowpols['jumbcf'];
}
$arraypols=join(" ,",$menupols);



//short ship
$menussls=array();
$sqlssls = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='4' and longstay_tps='1' ";
$qryssls = mysql_query($sqlssls);
while($rowssls=mysql_fetch_assoc($qryssls)){
$menussls[] = $rowssls['jumbcf'];
}
$arrayssls=join(" ,",$menussls);

//empty cont
$menuecls=array();
$sqlecls = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='5'  and longstay_tps='1'";
$qryecls = mysql_query($sqlecls);
while($rowecls=mysql_fetch_assoc($qryecls)){
$menuecls[] = $rowecls['jumbcf'];
}
$arrayecls=join(" ,",$menuecls);

//iso tank
$menuitls=array();
$sqlitls = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='6' and longstay_tps='1' ";
$qryitls = mysql_query($sqlitls);
while($rowitls=mysql_fetch_assoc($qryitls)){
$menuitls[] = $rowitls['jumbcf'];
}
$arrayitls=join(" ,",$menuitls);

//reffer
$menurfls=array();
$sqlrfls = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and bcf15.idtypecode='7' and longstay_tps='1' ";
$qryrfls = mysql_query($sqlrfls);
while($rowrfls=mysql_fetch_assoc($qryrfls)){
$menurfls[] = $rowrfls['jumbcf'];
}
$arrayrfls=join(" ,",$menurfls);

$menu4totls=array();
$sql4totls = "SELECT count(bcf15no) as jumbcf FROM bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and tahun='$tahunget' and MONTH(bcf15tgl)='$bulanget' and pecahpos='2' and recordstatus='2' and longstay_tps='1' ";
$qry4totls = mysql_query($sql4totls);
while($row4totls=mysql_fetch_assoc($qry4totls)){
$menu4totls[] = $row4totls['jumbcf'];
}
$aray4totls=join(" ,",$menu4totls);
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
                                renderTo: 'container1'
                            },
                            title: {
                                text: 'Grafik Penetapan BCF 1.5 Bulan <?php echo $bulanget ?> Tahun  <?php echo "$tahunget" ?>'
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
                                renderTo: 'container2'
                            },
                            title: {
                                text: 'Grafik Penarikan BCF 1.5 Bulan <?php echo $bulanget ?> Tahun  <?php echo "$tahunget" ?>'
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
                                text: 'Grafik BCF 1.5 Kategori Long Stay (LCL) di TPS Bulan <?php echo $bulanget ?> Tahun  <?php echo "$tahunget" ?>'
                            },
                            xAxis: {
                                categories: ['BCF 1.5'
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
                                name: 'Longstay',
                                data: [<?php echo $arrayls;?>],
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
                                name: 'Normal',
                                data: [<?php echo $arraylsno;?>],
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
                                    name: 'Longstay',
                                    y: <?php echo $arrayls;?>,
                                    sliced: true,
                                    
                                    color: '#e63e28'
                                },
                                   {
                                    name: 'Normal',
                                    y: <?php echo $arraylsno;?>,
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
                <script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container4'
                            },
                            title: {
                                text: 'Grafik BCF 1.5 Kategori Long Stay Bulan <?php echo $bulanget ?> Tahun  <?php echo "$tahunget" ?>'
                            },
                            xAxis: {
                                categories: ['BCF 1.5'
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
                                name: 'All BCF Longstay',
                                data: [<?php echo $aray4totls;?>],
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
                                data: [<?php echo $aray4fclls;?>],
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
                                data: [<?php echo $arraylclls;?>],
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
                                data: [<?php echo $arraypols;?>],
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
                                data: [<?php echo $arrayssls;?>],
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
                                data: [<?php echo $arrayecls;?>],
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
                                data: [<?php echo $arrayitls;?>],
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
                                data: [<?php echo $arrayrfls;?>],
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
                                    y: <?php echo $aray4fclls;?>,
                                    sliced: true,
                                    
                                    color: '#e63e28'
                                },
                                   {
                                    name: 'LCL',
                                    y: <?php echo $arraylclls;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#dfbcb9'
                                },
                                {
                                    name: 'Part Off',
                                    y: <?php echo $arraypols;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#12146D'
                                },{
                                    name: 'Short Ship',
                                    y: <?php echo $arrayssls;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#00FF40'
                                    
                                },{
                                    name: 'Empty Cont',
                                    y: <?php echo $arrayecls;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#FF8000'
                                    
                                },{
                                    name: 'Iso Tank',
                                    y: <?php echo $arrayitls;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#800040'
                                    
                                },{
                                    name: 'Reffer',
                                    y: <?php echo $arrayrfls;?>,
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
                
	</head>
	<body>
                     <div id="container1" style="width: 1000px; height: 700px; margin: 4 auto"></div>
                     <div id="container2" style="width: 1000px; height: 700px; margin: 4 auto"></div>
                     <div id="container3" style="width: 1000px; height: 700px; margin: 4 auto"></div>
                     <div id="container4" style="width: 1000px; height: 700px; margin: 4 auto"></div>
                     <table width="100%" class="data">
                            
                            <tr>
                                <td class="judultabel" width="5%" rowspan="2">Nourt</td>
                                <td class="judultabel" width='20%' rowspan="2">TGL Penerbitan BCF 1.5</td>
                                <td class="judultabel" width='20%' colspan="5">Total BCF yang diterbitkan Sprint</td>
                                <td class="judultabel" width='20%' rowspan="2">Total Masuk TPP</td>
                                <td class="judultabel" width='20%' colspan="5">Total Belum Masuk TPP</td>
                                <td class="judultabel" rowspan="2">Jumlah</td>
                            </tr>
                            <tr>
                                <td class="judultabel">Tripandu</td>
                                <td class="judultabel">Transcon</td>
                                <td class="judultabel">MSA</td>
                                <td class="judultabel">LLLL</td>
                                <td class="judultabel">Total</td>
                                <td class="judultabel">Tripandu</td>
                                <td class="judultabel">Transcon</td>
                                <td class="judultabel">MSA</td>
                                <td class="judultabel">LLLL</td>
                                <td class="judultabel">Total</td>
                            </tr>
                                <?php
                                
                                $sql = "SELECT bcf15tgl FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and pecahpos='2' and recordstatus='2' group by bcf15tgl ";
                                $query = mysql_query($sql);
                                $datacek = mysql_num_rows($query);
                                $awal=1;
                                
                                $sqltotsprinttot = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and pecahpos='2' and recordstatus='2' and perintah='1'";
                                $querytotsprinttot = mysql_query($sqltotsprinttot);
                                $datatotsprinttot=mysql_num_rows($querytotsprinttot);
                                
                                //total sprint TPP Tripandu
                                $sqltotsprinttottpp = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and pecahpos='2' and recordstatus='2' and perintah='1' and idtpp='1'";
                                $querytotsprinttottpp = mysql_query($sqltotsprinttottpp);
                                $datatotsprinttottpp=mysql_num_rows($querytotsprinttottpp);
                                
                                //total sprint TPP TCI
                                $sqltotsprinttottci = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and pecahpos='2' and recordstatus='2' and perintah='1' and idtpp='2'";
                                $querytotsprinttottci = mysql_query($sqltotsprinttottci);
                                $datatotsprinttottci=mysql_num_rows($querytotsprinttottci);
                                
                                //total sprint TPP MSA
                                $sqltotsprinttotmsa = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and pecahpos='2' and recordstatus='2' and perintah='1' and idtpp='3'";
                                $querytotsprinttotmsa= mysql_query($sqltotsprinttotmsa);
                                $datatotsprinttotmsa=mysql_num_rows($querytotsprinttotmsa);
                                
                                //total sprint TPP L4
                                $sqltotsprinttotl4 = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and pecahpos='2' and recordstatus='2' and perintah='1' and idtpp='4'";
                                $querytotsprinttotl4= mysql_query($sqltotsprinttotl4);
                                $datatotsprinttotl4=mysql_num_rows($querytotsprinttotl4);
                                
                                
                                $sqltotmasuktpptot = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget'  and perintah='1' and masuk='1' and pecahpos='2' and recordstatus='2'";
                                $querytotmasuktpptot = mysql_query($sqltotmasuktpptot);
                                $datatotmasuktpptot=mysql_num_rows($querytotmasuktpptot);
                                
                                $sqltottdkmasuktpptritot = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget'  and perintah='1' and masuk='2' and idtpp='1' and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktpptritot = mysql_query($sqltottdkmasuktpptritot);
                                $datatottdkmasuktpptritot=mysql_num_rows($querytottdkmasuktpptritot);
                                
                                $sqltottdkmasuktpptcitot = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and   perintah='1' and masuk='2' and idtpp='2' and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktpptcitot = mysql_query($sqltottdkmasuktpptcitot);
                                $datatottdkmasuktpptcitot=mysql_num_rows($querytottdkmasuktpptcitot);
                                
                                $sqltottdkmasuktppmsatot = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and   perintah='1' and masuk='2' and idtpp='3' and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktppmsatot = mysql_query($sqltottdkmasuktppmsatot);
                                $datatottdkmasuktppmsatot=mysql_num_rows($querytottdkmasuktppmsatot);
                                
                                $sqltottdkmasuktppl4tot = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget'  and perintah='1' and masuk='2' and idtpp='4' and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktppl4tot = mysql_query($sqltottdkmasuktppl4tot);
                                $datatottdkmasuktppl4tot=mysql_num_rows($querytottdkmasuktppl4tot);
                                
                                $sqltottdkmasuktpptot = "SELECT bcf15no FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and perintah='1' and masuk='2'  and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktpptot = mysql_query($sqltottdkmasuktpptot);
                                $datatottdkmasuktpptot=mysql_num_rows($querytottdkmasuktpptot);
                                
                                while($data = mysql_fetch_array($query)){
                                $tglpilih=$data['bcf15tgl'];
                                
                                
                                $sqltgl = "SELECT bcf15no,bcf15tgl,perintah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and bcf15tgl='$tglpilih' and pecahpos='2' and recordstatus='2' group by bcf15tgl";
                                $querytgl = mysql_query($sqltgl);
                                
                                $sqltottgl = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and pecahpos='2' and recordstatus='2'";
                                $querytottgl = mysql_query($sqltottgl);
                                $datatottgl=mysql_fetch_array($querytottgl);
                                
                                $sqltotsprint = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and pecahpos='2' and recordstatus='2'";
                                $querytotsprint = mysql_query($sqltotsprint);
                                $datatotsprint=mysql_fetch_array($querytotsprint);
                                
                                //sprint tpp tripandu
                                $sqltotsprinttpp = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and pecahpos='2' and recordstatus='2' and idtpp='1'";
                                $querytotsprinttpp = mysql_query($sqltotsprinttpp);
                                $datatotsprinttpp=mysql_fetch_array($querytotsprinttpp);
                                
                                //sprint tpp TCI
                                $sqltotsprinttci = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and pecahpos='2' and recordstatus='2' and idtpp='2'";
                                $querytotsprinttci = mysql_query($sqltotsprinttci);
                                $datatotsprinttci=mysql_fetch_array($querytotsprinttci);
                                
                                //sprint tpp msa
                                $sqltotsprintmsa = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and pecahpos='2' and recordstatus='2' and idtpp='3'";
                                $querytotsprintmsa = mysql_query($sqltotsprintmsa);
                                $datatotsprintmsa=mysql_fetch_array($querytotsprintmsa);
                                
                                //sprint tpp l4
                                $sqltotsprintl4 = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and pecahpos='2' and recordstatus='2' and idtpp='4'";
                                $querytotsprintl4 = mysql_query($sqltotsprintl4);
                                $datatotsprintl4=mysql_fetch_array($querytotsprintl4);
                                
                                $sqltotmasuktpp = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and masuk='1' and pecahpos='2' and recordstatus='2'";
                                $querytotmasuktpp = mysql_query($sqltotmasuktpp);
                                $datatotmasuktpp=mysql_fetch_array($querytotmasuktpp);
                                
                                $sqltottdkmasuktpp = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and masuk='2' and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktpp = mysql_query($sqltottdkmasuktpp);
                                $datatottdkmasuktpp=mysql_fetch_array($querytottdkmasuktpp);
                                
                                $sqltottdkmasuktpptri = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and masuk='2' and idtpp='1' and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktpptri = mysql_query($sqltottdkmasuktpptri);
                                $datatottdkmasuktpptri=mysql_fetch_array($querytottdkmasuktpptri);
                                
                                $sqltottdkmasuktpptci = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and masuk='2' and idtpp='2' and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktpptci = mysql_query($sqltottdkmasuktpptci);
                                $datatottdkmasuktpptci=mysql_fetch_array($querytottdkmasuktpptci);
                                
                                $sqltottdkmasuktppmsa = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and masuk='2' and idtpp='3' and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktppmsa = mysql_query($sqltottdkmasuktppmsa);
                                $datatottdkmasuktppmsa=mysql_fetch_array($querytottdkmasuktppmsa);
                                
                                $sqltottdkmasuktppl4 = "SELECT count(bcf15no) as jumlah FROM bcf15 where MONTH(bcf15tgl)= '$bulanget' and tahun='$tahunget' and  bcf15tgl='$tglpilih' and perintah='1' and masuk='2' and idtpp='4' and pecahpos='2' and recordstatus='2'";
                                $querytottdkmasuktppl4 = mysql_query($sqltottdkmasuktppl4);
                                $datatottdkmasuktppl4=mysql_fetch_array($querytottdkmasuktppl4);
                                
                                if($datacek>0){
                                
                                while ($datatgl = mysql_fetch_array($querytgl)){ 
                                      if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                            echo "<tr class=highlight1 align=center>";
                                            $j++;
                                            }
                            else
                                            {
                                            echo "<tr class=highlight2 align=center>";
                                            $j--;
                                            }

                            
                            ?>
                          
                                <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
                                <td class="isitabel"><?php echo  $datatgl['bcf15tgl']; ?></td>
                                <td class="isitabel"><?php echo  $datatotsprinttpp['jumlah']; ?></td>
                                <td class="isitabel"><?php echo  $datatotsprinttci['jumlah']; ?></td>
                                <td class="isitabel"><?php echo  $datatotsprintmsa['jumlah']; ?></td>
                                <td class="isitabel"><?php echo  $datatotsprintl4['jumlah']; ?></td>
                                <td class="isitabel"><?php echo  $datatotsprint['jumlah']; ?></td>
                                <td class="isitabel" style="background-color: #F3F3F3;"><?php echo  $datatotmasuktpp['jumlah']; ?></td>
                                <td class="isitabel"><?php echo  $datatottdkmasuktpptri['jumlah']; ?></td>   
                                <td class="isitabel"><?php echo  $datatottdkmasuktpptci['jumlah']; ?></td>   
                                <td class="isitabel"><?php echo  $datatottdkmasuktppmsa['jumlah']; ?></td>   
                                <td class="isitabel"><?php echo  $datatottdkmasuktppl4['jumlah']; ?></td>  
                                <td class="isitabel" style="background-color: #F3F3F3;"><?php echo  $datatottdkmasuktpp['jumlah']; ?></td>   
                                <td class="isitabel" style="background-color: #75C9EA;"><?php echo  $datatottgl['jumlah']; ?></td>
                                
                            </tr>
                            
                            <?php 
                            };
                            }
                            else{
                                echo "<tr align=center><td class=isitabel colspan=4>Data Tidak Ada</td></tr>";
                            }
                                }
                            ?>
                                
                            <tfoot align="center">
                                <td colspan="2" class="isitabel"><strong><h4>Jumlah</h4></strong></td>
                                <td class="isitabel"><strong><h4><?php echo  $datatotsprinttottpp ?></h4></strong></td>
                                <td class="isitabel"><strong><h4><?php echo  $datatotsprinttottci ?></h4></strong></td>
                                <td class="isitabel"><strong><h4><?php echo  $datatotsprinttotmsa ?></h4></strong></td>
                                <td class="isitabel"><strong><h4><?php echo  $datatotsprinttotl4 ?></h4></strong></td>
                                <td class="isitabel"><strong><h4><?php echo  $datatotsprinttot ?></h4></strong></td>
                                <td class="isitabel"><strong><h4><?php echo  $datatotmasuktpptot ?></h4></strong></td>
                                <td class="isitabel" ><strong><h4><?php echo  $datatottdkmasuktpptritot ?></h4></strong></td>
                                <td class="isitabel" ><strong><h4><?php echo  $datatottdkmasuktpptcitot ?></h4></strong></td>
                                <td class="isitabel" ><strong><h4><?php echo  $datatottdkmasuktppmsatot ?></h4></strong></td>
                                <td class="isitabel" ><strong><h4><?php echo  $datatottdkmasuktppl4tot ?></h4></strong></td>
                                <td class="isitabel" ><strong><h4><?php echo  $datatottdkmasuktpptot ?></h4></strong></td>
                                
                                <td class="isitabel"><strong><h4><?php echo  $datatotsprinttot ?></h4></strong></td>
                            </tfoot>
                        </table>
                     <a href="?hal=lap_bcfterbit">Kembali</a> 
                    
	</body>
</html>
