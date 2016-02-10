<?php 
include "../../lib/koneksi.php";
include "../../lib/function.php";

//BDN ALL
$bdnall=array();
$sqlbdnall = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn  ";
$qrybdnall = mysql_query($sqlbdnall);
while($rowbdnall=mysql_fetch_assoc($qrybdnall)){
$bdnall[] = $rowbdnall['jumbdn'];
}
$araybdnall=join(" ,",$bdnall);


//BDN BUKA
$bdnbuka=array();
$sqlbdnbuka = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn where tutupposbdn='0' ";
$qrybdnbuka = mysql_query($sqlbdnbuka);
while($rowbdnbuka=mysql_fetch_assoc($qrybdnbuka)){
$bdnbuka[] = $rowbdnbuka['jumbdn'];
}
$araybdnbuka=join(" ,",$bdnbuka);

//BDN TUTUP
$bdntutup=array();
$sqlbdntutup = "SELECT count(idtbl_dok_asal_bdn) as jumbdn FROM tbl_dok_asal_bdn where tutupposbdn='1'";
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
		<script type="text/javascript" src="modul/report/js/jquery.min.js"></script>
		<script type="text/javascript" src="modul/report/js/highcharts.js"></script>
		<script type="text/javascript" src="modul/report/js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container2'
                            },
                            title: {
                                text: 'Grafik Proses Penutupan BDN'
                            },
                            xAxis: {
                                categories: ['ALL', 'TERBUKA', 'TERTUTUP'
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
                                name: 'POS TERBUKA',
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
                                name: 'POS TERTUTUP',
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
                                    name: 'POS TERBUKA',
                                    y: <?php echo $araybdnbuka;?>,
                                    sliced: false,
                                    
                                    color: '#e63e28'
                                },
                                   {
                                    name: 'POS TERTUTUP',
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
                <div id="container2" style="width: 500px; height: 500px; margin: 2 auto"></div>
                     
                    
	</body>
</html>
