<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Google Maps</title>
<script type="text/javascript" src="lib/js/maps.js" ></script>
<!--<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>-->
<!--<script src="lib/jquery.js"></script>-->
<script type="text/javascript" src="lib/js/jQuery.bMap.1.2.3.js"></script>
    <?php 
        $id = $_GET['id']; // menangkap id
        $sql = "select * FROM tpp WHERE idtpp='$id'"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        if($data[idtpp]=='1'){$lat='-6.108696'; $long='106.920385';}  elseif($data[idtpp]=='2') {$lat='-6.103357'; $long='106.947472';}   
       elseif($data[idtpp]=='4') {$lat='-6.102247'; $long='106.95098';} elseif($data[idtpp]=='3') {$lat='-6.148331'; $long='106.929447';}
        ?>
<script type="text/javascript">
   $(document).ready(function() {    
      $("#map").bMap({
	     mapZoom: 15,
		 mapCenter:[<?php echo $lat ?>, <?php echo $long ?>],
		 markers:{"data":[ {
				"lat": <?php echo $lat ?>,
				"lng": <?php echo $long ?>, 
				"title": "<?php echo $data[nm_tpp] ?>", 
				"body": "<?php echo $data[alamat_tpp] ?>"
			},{
				"lat":-7.788000,
				"lng":110.373900, 
				"title": "Stadion Kridosono", 
				"body": "Lapangan sepakbola"
			}	// Penambahan marker bisa dilakukan di sini
		 ]}
  	   });
   });
</script>  
</head>
<body>
<div style="width:80%;height:400px;margin:0 auto" id="map"></div>
</body>
</html>
