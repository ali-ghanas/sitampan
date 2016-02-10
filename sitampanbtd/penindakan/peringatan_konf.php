<html>
    <head>
        
        <title></title>
    </head>
    <body>
<style type="text/css">

    #topbar{
    position:absolute;
    left:9px;
    border: 2px red;
    padding: 2px;
    background-color: #fff;
    width: 350px;
    visibility: hidden;
    z-index: 100;
    }
    </style>

    <script type="text/javascript">

    var persistclose=0 //set to 0 or 1. 1 means once the bar is manually closed, it will remain closed for browser session
    var startX = 30 //set x offset of bar in pixels
    var startY = 5 //set y offset of bar in pixels
    var verticalpos="fromtop" //enter "fromtop" or "frombottom"

    function iecompattest(){
    return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
    }

    function get_cookie(Name) {
    var search = Name + "="
    var returnvalue = "";
    if (document.cookie.length > 0) {
    offset = document.cookie.indexOf(search)
    if (offset != -1) {
    offset += search.length
    end = document.cookie.indexOf(";", offset);
    if (end == -1) end = document.cookie.length;
    returnvalue=unescape(document.cookie.substring(offset, end))
    }
    }
    return returnvalue;
    }

    function closebar(){
    if (persistclose)
    document.cookie="remainclosed=1"
    document.getElementById("topbar").style.visibility="hidden"
    }

    function staticbar(){
     barheight=document.getElementById("topbar").offsetHeight
     var ns = (navigator.appName.indexOf("Netscape") != -1) || window.opera;
     var d = document;
     function ml(id){
      var el=d.getElementById(id);
      if (!persistclose || persistclose && get_cookie("remainclosed")=="")
      el.style.visibility="visible"
      if(d.layers)el.style=el;
      el.sP=function(x,y){this.style.left=x+"px";this.style.top=y+"px";};
      el.x = startX;
      if (verticalpos=="fromtop")
      el.y = startY;
      else{
      el.y = ns ? pageYOffset + innerHeight : iecompattest().scrollTop + iecompattest().clientHeight;
      el.y -= startY;
      }
      return el;
     }
     window.stayTopLeft=function(){
      if (verticalpos=="fromtop"){
      var pY = ns ? pageYOffset : iecompattest().scrollTop;
      ftlObj.y += (pY + startY - ftlObj.y)/8;
      }
      else{
      var pY = ns ? pageYOffset + innerHeight - barheight: iecompattest().scrollTop + iecompattest().clientHeight - barheight;
      ftlObj.y += (pY - startY - ftlObj.y)/8;
      }
      ftlObj.sP(ftlObj.x, ftlObj.y);
      setTimeout("stayTopLeft()", 10);
     }
     ftlObj = ml("topbar");
     stayTopLeft();
    }

    if (window.addEventListener)
    window.addEventListener("load", staticbar, false)
    else if (window.attachEvent)
    window.attachEvent("onload", staticbar)
    else if (document.getElementById)
    window.onload=staticbar
    </script>

    <div class="clear"></div>
    <div id="topbar">
    <div style="text-align:right">
    <a style="color: rgb(255, 0, 0); font-weight: bold; font-style: italic;" href="" onclick="closebar(); return false"><span><button>Tutup<img src="images/cancel.png" /></button></span></a></div><a style="font-weight: bold; color: black(51, 255, 51);">
    </a><p><a style="font-weight: bold; color: #000;" title="">Warning!!</a>

    </p>
    <left>
        <table style="width: 700px; height: 50px;" border="0">
            <tbody>
                <tr>
                    <td><a href="?hal=daftarconf">Anda Memiliki Konfirmasi BCF 1.5 Yang Belum dijawab</a></td>
                </tr>
                <tr>
                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=newkonf><img src="images/new/mtk.png" width="20"/>Inbox (Konfirmasi Masuk)</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_system'  ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /> </td>
                </tr>
                <tr>
                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=masukhardcopy><img src="images/new/mtk.png" width="20"/>Inbox (Perlu Hardcopy)</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_hardcopy' and konf_manualhc='1' and konf_jwabanmanualhc='0'  ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /> </td>
                </tr>
                <tr>
                    
                    <td> <img src="images/new/pesanmasukpolos.gif" /></td>
                </tr>
                <tr>
                   <td>Pesan ini muncul jika <br/> ada konfirmasi masuk <br/> dari Seksi Tempat Penimbunan</td>
                </tr>
<!--                <tr>
                    <td>
                        <embed src="music/Notifier_Eager.mp3" type="hidden"></embed>
                    </td>
                </tr>-->
               
            </tbody>
            
        </table></left>
    </div>
    </body>
</html>