<?php 
include "../lib/koneksibdn.php";
include "../lib/function.php";


//total bdn tahun 2004
$menu2004tot=array();
$sql2004tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2004'";
$qry2004tot = mysql_query($sql2004tot);
while($row2004tot=mysql_fetch_assoc($qry2004tot)){
$menu2004tot[] = $row2004tot['jumbdn'];
}
$aray2004tot=join(" ,",$menu2004tot);

//total bdn tahun 2005
$menu2005tot=array();
$sql2005tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2005'";
$qry2005tot = mysql_query($sql2005tot);
while($row2005tot=mysql_fetch_assoc($qry2005tot)){
$menu2005tot[] = $row2005tot['jumbdn'];
}
$aray2005tot=join(" ,",$menu2005tot);

//total bdn tahun 2006
$menu2006tot=array();
$sql2006tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2006'";
$qry2006tot = mysql_query($sql2006tot);
while($row2006tot=mysql_fetch_assoc($qry2006tot)){
$menu2006tot[] = $row2006tot['jumbdn'];
}
$aray2006tot=join(" ,",$menu2006tot);

//total bdn tahun 2007
$menu2007tot=array();
$sql2007tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2007'";
$qry2007tot = mysql_query($sql2007tot);
while($row2007tot=mysql_fetch_assoc($qry2007tot)){
$menu2007tot[] = $row2007tot['jumbdn'];
}
$aray2007tot=join(" ,",$menu2007tot);

//total bdn tahun 2008
$menu2008tot=array();
$sql2008tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2008'";
$qry2008tot = mysql_query($sql2008tot);
while($row2008tot=mysql_fetch_assoc($qry2008tot)){
$menu2008tot[] = $row2008tot['jumbdn'];
}
$aray2008tot=join(" ,",$menu2008tot);

//total bdn tahun 2009
$menu2009tot=array();
$sql2009tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2009'";
$qry2009tot = mysql_query($sql2009tot);
while($row2009tot=mysql_fetch_assoc($qry2009tot)){
$menu2009tot[] = $row2009tot['jumbdn'];
}
$aray2009tot=join(" ,",$menu2009tot);

//total bdn tahun 2010
$menu2010tot=array();
$sql2010tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2010'";
$qry2010tot = mysql_query($sql2010tot);
while($row2010tot=mysql_fetch_assoc($qry2010tot)){
$menu2010tot[] = $row2010tot['jumbdn'];
}
$aray2010tot=join(" ,",$menu2010tot);

//total bdn tahun 2011
$menu2011tot=array();
$sql2011tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2011'";
$qry2011tot = mysql_query($sql2011tot);
while($row2011tot=mysql_fetch_assoc($qry2011tot)){
$menu2011tot[] = $row2011tot['jumbdn'];
}
$aray2011tot=join(" ,",$menu2011tot);

//total bdn tahun 2012
$menu2012tot=array();
$sql2012tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2012'";
$qry2012tot = mysql_query($sql2012tot);
while($row2012tot=mysql_fetch_assoc($qry2012tot)){
$menu2012tot[] = $row2012tot['jumbdn'];
}
$aray2012tot=join(" ,",$menu2012tot);

//total bdn tahun 2013
$menu2013tot=array();
$sql2013tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2013'";
$qry2013tot = mysql_query($sql2013tot);
while($row2013tot=mysql_fetch_assoc($qry2013tot)){
$menu2013tot[] = $row2013tot['jumbdn'];
}
$aray2013tot=join(" ,",$menu2013tot);

//total bdn tahun 2014
$menu2014tot=array();
$sql2014tot = "SELECT count(idtbl_bdn) as jumbdn FROM tbl_bdn where tahun_bdn='2014'";
$qry2014tot = mysql_query($sql2014tot);
while($row2014tot=mysql_fetch_assoc($qry2014tot)){
$menu2014tot[] = $row2014tot['jumbdn'];
}
$aray2014tot=join(" ,",$menu2014tot);

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
                                renderTo: 'container1'
                            },
                            title: {
                                text: 'Grafik penetapan BDN '
                            },
                            xAxis: {
                                categories: ['TPP', 'TCI', 'MSA', 'L4'
							]
                            },
                            yAxis: {
                                title: {
                                    text: 'Total BDN'
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
                                    html: '',
                                    style: {
                                        left: '40px',
                                        top: '8px',
                                        color: 'black'
                                    }
                                }]
                            },
                            series: [
                            {
                                type: 'pie',
                                name: 'TOTAL BDN',
                                data: [
                                   
                                    {
                                    name: '2004',
                                    y: <?php echo $aray2004tot;?>,
                                    sliced: true,
                                    
                                    color: '#e63e28'
                                },
                                   {
                                    name: '2005',
                                    y: <?php echo $aray2005tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#dfbcb9'
                                },
                                {
                                    name: '2006',
                                    y: <?php echo $aray2006tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#12146D'
                                },{
                                    name: '2007',
                                    y: <?php echo $aray2007tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#00FF40'
                                    
                                },{
                                    name: '2008',
                                    y: <?php echo $aray2008tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#FF8000'
                                    
                                },{
                                    name: '2009',
                                    y: <?php echo $aray2009tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#800040'
                                    
                                },{
                                    name: '2010',
                                    y: <?php echo $aray2010tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#8080C0'
                                    
                                },{
                                    name: '2011',
                                    y: <?php echo $aray2011tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#000'
                                    
                                },{
                                    name: '2012',
                                    y: <?php echo $aray2012tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#804040'
                                    
                                },{
                                    name: '2013',
                                    y: <?php echo $aray2013tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#BDBCC5'
                                    
                                },{
                                    name: '2014',
                                    y: <?php echo $aray2014tot;?>,
                                    sliced: true,
                                    selected: true,
                                    color: '#FF0080'
                                    
                                }
                                                 ],
                                center: [200,200],
                                size: 250,
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
                <div id="container1" style="width: 500px; height: 500px; margin: 2 auto"></div>
                     
                    
	</body>
</html>
