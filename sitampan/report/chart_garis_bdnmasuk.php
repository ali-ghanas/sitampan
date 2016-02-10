<?php 
include "../lib/koneksibdn.php";


//BDN ALL
$bdnall=array();
$sqlbdnall = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn  ";
$qrybdnall = mysql_query($sqlbdnall);
while($rowbdnall=mysql_fetch_assoc($qrybdnall)){
$bdnall[] = $rowbdnall['jumbdn'];
}
$araybdnall=join(" ,",$bdnall);


//BDN MASUK (TPP)
$bdnbuka=array();
$sqlbdnbuka = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn where masuk='1' ";
$qrybdnbuka = mysql_query($sqlbdnbuka);
while($rowbdnbuka=mysql_fetch_assoc($qrybdnbuka)){
$bdnbuka[] = $rowbdnbuka['jumbdn'];
}
$araybdnbuka=join(" ,",$bdnbuka);

//BDN TIDAK MASUK (TPS)
$bdntutup=array();
$sqlbdntutup = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn where masuk='0'";
$qrybdntutup = mysql_query($sqlbdntutup);
while($rowbdntutup=mysql_fetch_assoc($qrybdntutup)){
$bdntutup[] = $rowbdntutup['jumbdn'];
}
$araybdntutup=join(" ,",$bdntutup);


?>	

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafik BCF 1.5 </title>
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<script type="text/javascript" src="js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'containermasuk'
                            },
                            title: {
                                text: 'Grafik Penarikan  BDN'
                            },
                            xAxis: {
                                categories: ['ALL', 'MASUK','TIDAK MASUK'
							]
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
                                    html: 'Penyelesaian BDN',
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
                                data: [<?php echo $araybdnall;?>],
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
                                name: 'MASUK',
                                data: [<?php echo $araybdnbuka;?>],
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
                                name: 'TIDAK MASUK',
                                data: [<?php echo $araybdntutup;?>],
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
                                name: 'Dokumen Asal',
                                data: [
                                   
                                    {
                                    name: 'Masuk TPP',
                                    y: <?php echo $araybdnbuka;?>,
                                    sliced: false,
                                    
                                    color: '#e63e28'
                                },
                                   {
                                    name: 'Tidak Masuk TPP',
                                    y: <?php echo $araybdntutup;?>,
                                    sliced: false,
                                    selected: true,
                                    color: '#dfbcb9'
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
                <div id="containermasuk" style="width: 500px; height: 500px; margin: 2 auto"></div>
                     
                    
	</body>
</html>
