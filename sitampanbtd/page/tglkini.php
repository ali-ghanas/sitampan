
        
 <html>
<head>
  <title>Digital Clock</title>

<!--  <style>
      .jqclock { float:left; text-align:center; border: 1px Black solid; background: LightYellow; padding: 10px; margin:20px; }
  .clockdate { color: DarkRed; margin-bottom: 10px; font-size: 18px; display: block;}
  .clocktime { border: 2px inset White; background: Black; padding: 5px; font-size: 14px; font-family: "Courier"; color: LightGreen; margin: 2px; display: block; }

  </style>-->
  
  
</head>

<body>
    <?php
        
        
        $engDate=date("l F d, Y H:i:s A");
         $thn=date('Y');
        switch (date("w")) {
         case "0" : $hari="Minggu";break;
          case "1" : $hari="Senin";break;
          case "2" : $hari="Selasa"; break; 
          case "3" : $hari="Rabu";break;
          case "4" : $hari="Kamis";break;
          case "5" : $hari="Jumat";break;
          case "6" : $hari="Sabtu";break;
        }
        switch (date("m")) {
          case "1" : $bulan="Januari";break;
          case "2" : $bulan="Februari";break;
          case "3" : $bulan="Maret";break;
          case "4" : $bulan="April";break;
          case "5" : $bulan="Mei";break;
          case "6" : $bulan="Juni";break;
          case "7" : $bulan="Juli";break;
          case "8" : $bulan="Agustus";break;
          case "9" : $bulan="September"; break  ;
          case "10" : $bulan="Oktober";break;
          case "11" : $bulan="November";break;
          case "12" : $bulan="Desember";break;
        }
       
        $indDate="$hari, ". date("d") ." $bulan $thn ";
        echo "". $indDate ."";
       
?> 
    
</body>
</html>  