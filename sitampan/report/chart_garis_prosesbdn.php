<?php 
include "../../lib/koneksi.php";
include "../../lib/function.php";


//BDN TUTUP
$bdntutup=array();
$sqlbdntutup = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn where tutupposbdn='1'";
$qrybdntutup = mysql_query($sqlbdntutup);
while($rowbdntutup=mysql_fetch_assoc($qrybdntutup)){
$bdntutup[] = $rowbdntutup['jumbdn'];
}
$araybdntutup=join(" ,",$bdntutup);

//BDN TUTUP MUSNAH
$bdntutupm=array();
$sqlbdntutupm = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn where tutupposbdn='1' AND idjenistutupbdn='4'";
$qrybdntutupm = mysql_query($sqlbdntutupm);
while($rowbdntutupm=mysql_fetch_assoc($qrybdntutupm)){
$bdntutupm[] = $rowbdntutupm['jumbdn'];
}
$araybdntutupm=join(" ,",$bdntutupm);

//BDN TUTUP BMN
$bdntutupbmn=array();
$sqlbdntutupbmn = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn where tutupposbdn='1' AND idjenistutupbdn='3'";
$qrybdntutupbmn = mysql_query($sqlbdntutupbmn);
while($rowbdntutupbmn=mysql_fetch_assoc($qrybdntutupbmn)){
$bdntutupbmn[] = $rowbdntutupbmn['jumbdn'];
}
$araybdntutupbmn=join(" ,",$bdntutupbmn);

//BDN TUTUP BATAL
$bdntutupbtl=array();
$sqlbdntutupbtl = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn where tutupposbdn='1' AND idjenistutupbdn='1'";
$qrybdntutupbtl = mysql_query($sqlbdntutupbtl);
while($rowbdntutupbtl=mysql_fetch_assoc($qrybdntutupbtl)){
$bdntutupbtl[] = $rowbdntutupbtl['jumbdn'];
}
$araybdntutupbtl=join(" ,",$bdntutupbtl);

//BDN TUTUP UBAH
$bdntutupu=array();
$sqlbdntutupu = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn where tutupposbdn='1' AND idjenistutupbdn='2'";
$qrybdntutupu = mysql_query($sqlbdntutupu);
while($rowbdntutupu=mysql_fetch_assoc($qrybdntutupu)){
$bdntutupu[] = $rowbdntutupu['jumbdn'];
}
$araybdntutupu=join(" ,",$bdntutupu);


?>	

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafik BCF 1.5 </title>
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="modul/report/js/jquery.min.js"></script>
		<script type="text/javascript" src="modul/report/js/highcharts.js"></script>
		<script type="text/javascript" src="modul/report/js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container3'
                            },
                            title: {
                                text: 'Grafik Proses Penutupan BDN'
                            },
                            xAxis: {
                                categories: ['DOKUMEN ASAL BDN']
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Dok Asal BDN'
                                }
                            },
                            tooltip: {
                                formatter: function() {
                                    var s;
                                    if (this.point.name) { // the pie chart
                                        s = ''+
                                            this.point.name +': '+ this.y +' BDN';
                                    } else {
                                        s = ''+
                                            this.x  +': '+ this.y;
                                    }
                                    return s;
                                }
                            },
                            labels: {
                                items: [{
                                    html: 'Dokumen Asal BDN',
                                    style: {
                                        left: '40px',
                                        top: '8px',
                                        color: 'black'
                                    }
                                }]
                            },
                            series: [{
                                type: 'column',
                                name: 'All',
                                data: [<?php echo $araybdntutup;?>],
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
                                name: 'BMN',
                                data: [<?php echo $araybdntutupbmn;?>],
                                color: '#e63e28',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },  {
                                type: 'column',
                                name: 'BATAL BDN',
                                data: [<?php echo $araybdntutupbtl;?>],
                                color: '#15FF15',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },  {
                                type: 'column',
                                name: 'BDN KELUAR SEBAGIAN',
                                data: [<?php echo $araybdntutupu;?>],
                                color: '#C9E7F7',
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                            },{
                           
                                type: 'column',
                                name: 'BDN MUSNAH',
                                data: [<?php echo $araybdntutupm;?>],
                                color: '#0080FF',
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
                                name: 'Dokumen Asal',
                                data: [
                                   
                                    {
                                    name: 'BMN',
                                    y: <?php echo $araybdntutupbmn;?>,
                                    sliced: false,
                                    
                                    color: '#e63e28'
                                },
                                   {
                                    name: 'KELUAR SEBAGIAN',
                                    y: <?php echo $araybdntutupu;?>,
                                    sliced: false,
                                    selected: true,
                                    color: '#C9E7F7'
                                },
                                   {
                                    name: 'BATAL BDN',
                                    y: <?php echo $araybdntutupbtl;?>,
                                    sliced: false,
                                    selected: true,
                                    color: '#15FF15'
                                },
                                   {
                                    name: 'BDN MUSNAH',
                                    y: <?php echo $araybdntutupm;?>,
                                    sliced: false,
                                    selected: true,
                                    color: '#0080FF'
                                }
                                                 ],
                                center: [50,70],
                                size: 70,
                                showInLegend: false,
                                dataLabels: {
                                    enabled: true,
                                    
                                    
                                    
                                    style: {
                                        fontSize: '10px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }

                                    }
                                
                                
                            }]
                        });
                    });

				
		</script>
                <div id="container3" style="width: 500px; height: 500px; margin: 2 auto"></div>
                     
                    
	</body>
</html>
