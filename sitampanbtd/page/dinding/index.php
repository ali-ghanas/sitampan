<html>
<head>
<title>Berita Dinding</title>
<style>
body{background-color:#93C9FF;font-family:arial;font-size:12pt}

#papan{width:600;height:500;border:#efefef 1px solid;
background-color:white;overflow:hidden}
.p{background-color:white;height:70;text-align:left;
border-bottom:#cdcdcd 1px solid;padding:5}
.x{background-color:white;height:70;text-align:left;
border-bottom:#cdcdcd 1px solid;display:none;padding:5}
a{color:#306DA3;text-decoration:none}
</style>

<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script>
var i = 5;
var jumlah;
var brt = new Array();
var rotasi = 5;
var nomorakhir;
var posisiar;
$(document).ready(function(){
    jumlah = $("#jumlahberita").html();
    jumlah = parseInt(jumlah);
    nomorakhir = $("#nomorakhir").html();
    for(x=1;x<=jumlah;x++){
        brt[x] = $("#drz"+x).html(); //mengambil berita ,menjadi array brt[]
    }
    cek();
    putar();
});
function cek(){
    $.ajax({
        url: "cekdata.php",
        data: "akhir="+nomorakhir,
        cache: false,
        success: function(msg){
            if(msg!=""){
                data = msg.split("||");
                nomorakhir = data[0];
                brt.push(data[1]); //tambahkan berita baru ke array brt[] di posisi akhir
                jumlah++;
                rotasi = jumlah;
            }
        }
    });
    var waktucek = setTimeout("cek()",10000);
}

function putar(){
    if(jumlah>4){                   //kita putar atau scroll jika jumlah berita lebih dari 4
        $("#papan").prepend("<div id=drz"+i+" class=x><span id=s"+i+">"+brt[rotasi]+"<br></span></div>");
        $("#s"+i).hide();
        $("#drz"+i).slideDown(400); //fungsi untuk melakuan scrolldown
        $("#s"+i).fadeIn(3000);     //fungdi untuk menampilkan berita secara fade in
        rotasi--;
        i++;
        if(rotasi<=(jumlah - 5)){
            rotasi = jumlah;
        }
    }
    var waktuputar = setTimeout("putar()",4000);
}
</script>

</head>
<body>

<br>
<a>Input Info Buat Para User APlikasi SITAMPAN</a>
<div id=papan>
<?php
include "koneksi.php";
$i = 1;

//mengambil 5 berita terbaru dari database

$berita = mysql_query("SELECT * FROM berita,user
WHERE user.iduser=berita.iduser
ORDER by berita.idberita DESC LIMIT 5");
while($b = mysql_fetch_array($berita)){
    echo "<div class=p id=drz$i>";
    echo "<b><a href=#>".$b['nm_lengkap']."</a></b> ";
    echo "<font size=1>".$b['waktu']."</font><br>".$b['berita']."<br>";
    echo "</div>\n";
    $i++;
}

//mengambil nomor terakhir, yang nanti berguna untuk pengecekan

$akhir = mysql_query("SELECT idberita FROM berita ORDER BY idberita DESC LIMIT 1");
$a = mysql_fetch_array($akhir);
$akhirnya = $a['idberita'];
?>
</div>
<?php
$j = $i - 1;
echo "<span id=jumlahberita style='display:none'>$j</span>";
echo "<span id=nomorakhir style='display:none'>$akhirnya</span>";
?>
<p>
<script>
function buka(id,no){
    window.open("formberita.php?iduser="+id+"&no="+no,"","width=500,height=400,toolbar=0");
}
</script>

<table>
    <tr>
        <td><a href="javascript:buka('superadmin',16)">Kirim Berita</a></td>
    </tr>
    <tr>
        <td><a href="/../sitampan/index.php?hal=home">Homes</a></td>
    </tr>
</table>
</body>
</html>
