<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Animasi di Bukit</title>
<script type="text/javascript" 
        src="../lib/js/jquery-1.5.1.min.js"></script>      
<script type="text/javascript" 
        src="../lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>      
<script type="text/javascript" src="../lib/js/spritelymenu/jquery.spritely-0.4.js"></script> 
<script type="text/javascript">
   $(document).ready(function() {
      $("#awan").pan({fps: 30, speed: 0.7, dir: "left"});
      $("#bukit1").pan({fps: 30, speed: 5, dir: "left"});
      $("#bukit2").pan({fps: 30, speed: 2, dir: "left"});
      $("#kereta").pan({fps: 30, speed: 3, dir: "right"});
      $("#mobil").pan({fps: 30, speed: 2, dir: "right"});
            
      $("#heli")
		 .sprite({fps: 9, no_of_frames: 3})
		 .spRandom({top: 50, bottom: 200, left: 300, right: 320})
		 .isDraggable()
		 
      $("#heli") 
		 .activeOnClick()
         .active();
  
      $("body").flyToTap();
      
     
      
     
   });   
</script>   
<style type="text/css">
   #panggung {
     top: 0px;
 	 left: 0px;
   }
   
   .panggung {
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 100%;
	 min-width: 900px;
	 height: 359px;
	 overflow: hidden;
   }
   
   #langit {
     background: url(../images/langit.png) 0 0 repeat-x;
   }
   
   #awan {
	  background: transparent url(../images/awan.png) 
                  305px 20px repeat-x;
   }

   #bukit1 {
      background: transparent url(../images/bukit.png) 0 30px repeat-x;
   }

   #bukit2 {
      background: transparent url(../images/bukit2.png) 0 120px repeat-x;
   }

   #kereta {
      background: transparent url(../images/kereta.png) 0 220px repeat-x;
   }

   #mobil {
      background: transparent url(../images/mobil.png) 0 250px repeat-x;
   }
  
   #heli {
	  background: transparent url(../images/heli.png) 0 0 no-repeat;
	  position: absolute;
	  top: 100px;
	  left: 65px;
	  width: 120px;
	  height: 100px;
	  z-index: 2000;
	  cursor: pointer;
   }
   
   
</style>     
</head>
<body>
   <div id="panggung" class="panggung">
      <div id="langit" class="panggung"></div>
      <div id="awan" class="panggung"></div>
      <div id="bukit1" class="panggung"></div>
      <div id="kereta" class="panggung"></div>
      <div id="bukit2" class="panggung"></div>
      <div id="mobil" class="panggung"></div>
   </div>
   <div id="heli"></div>
   <div id="teks">dd</div>
   
  
</body>
</html>
