<html>
<head>
<title>Berita Dinding</title>
<link rel="stylesheet" type="text/css" href="themes/main.css" />
<style>
/*body{background-color:#FFFFFF;font-family:verdana;font-size:10pt}*/

#papan1{width:250;height:480;border:transparent 1px solid;
        
background-color:transparent;overflow:hidden}
.p1{background-color:transparent;height:150;text-align:left;font-size: 12px
border-bottom:#000 1px solid;padding:5}
.x1{background-color:transparent;height:150;text-align:left;
border-bottom:transparent 1px solid;display:none;padding:5}
#papan1 a{color:#000;text-decoration:none;font-size: 13px}
</style>


<script>
var i1 = 5;
var jumlah1;
var brt1 = new Array();
var rotasi1 = 5;
var nomorakhir1;
var posisiar1;
$(document).ready(function(){
    jumlah1 = $("#jumlahberita1").html();
    jumlah1 = parseInt(jumlah1);
    nomorakhir1 = $("#nomorakhir1").html();
    for(x1=1;x1<=jumlah1;x1++){
        brt1[x1] = $("#drz1"+x1).html(); //mengambil berita ,menjadi array brt[]
    }
    cek1();
    putar1();
});
function cek1(){
    $.ajax({
        url: "history/dinding/cekdata.php",
        data: "akhir="+nomorakhir1,
        cache: false,
        success: function(msg){
            if(msg!=""){
                data1 = msg.split("||");
                nomorakhir1 = data1[0];
                brt1.push(data1[1]); //tambahkan berita baru ke array brt[] di posisi akhir
                jumlah1++;
                rotasi1 = jumlah1;
            }
        }
    });
    var waktucek = setTimeout("cek1()",9000);
}

function putar1(){
    if(jumlah1>4){                   //kita putar atau scroll jika jumlah berita lebih dari 4
        $("#papan1").prepend("<div id=drz1"+i1+" class=x1><span id=s1"+i1+">"+brt1[rotasi1]+"<br></span></div>");
        $("#s1"+i1).hide();
        $("#drz1"+i1).slideDown(400); //fungsi untuk melakuan scrolldown
        $("#s1"+i1).fadeIn(3000);     //fungdi untuk menampilkan berita secara fade in
        rotasi1--;
        i1++;
        if(rotasi1<=(jumlah1 - 5)){
            rotasi1 = jumlah1;
        }
    }
    var waktuputar = setTimeout("putar1()",6000);
}
</script>

</head>
<body>

<br>
<div id=papan1>
<?php
include "../../lib/koneksi.php";
$i1 = 1;

//mengambil 5 berita terbaru dari database

$berita1 = mysql_query("SELECT *,DATE_FORMAT(tanggalagenda,'%d %M %Y') as tanggalagenda,DATE_FORMAT(tgldokupdate,'%d %M %Y') as tgldokupdate FROM historybcf15
ORDER by idhistorybcf15 DESC LIMIT 5");
while($b = mysql_fetch_array($berita1)){
    echo "<div class=p1 id=drz1$i1>";
    echo "<b><a href=#>".$b['nama_user']."</a><a></b> :<font size='2'>".$b['namaaksi']."</font>/<font size='2'>".$b['tanggalaksi']."</font><br></a> ";
    echo "<a>No BCF 1.5 :".$b['bcf15no']."/".$b['tahun']."</font><br>No Surat :".$b['dokupdate']."<br>Tgl Surat :".$b['tgldokupdate']."<br>No Agenda :".$b['noagenda']."<br>Tgl Agenda :".$b['tanggalagenda']."<br></a>";
    echo "</div>\n";
    $i1++;
}

//mengambil nomor terakhir, yang nanti berguna untuk pengecekan

$akhir1 = mysql_query("SELECT idhistorybcf15 FROM historybcf15 ORDER BY idhistorybcf15 DESC LIMIT 1");
$a1 = mysql_fetch_array($akhir1);
$akhirnya1 = $a1['idhistorybcf15'];
?>
</div>
<?php
$j1 = $i1 - 1;
echo "<span id=jumlahberita1 style='display:none'>$j1</span>";
echo "<span id=nomorakhir1 style='display:none'>$akhirnya1</span>";
?>
<p>

</body>
</html>
