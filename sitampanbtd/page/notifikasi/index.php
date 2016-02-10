<?php
session_start();
//misal anda login sebagai user dengan id=budi
$_SESSION['username'] = "budi";
?>
<html>
<head>
<title>Notifikasi</title>
<link rel="stylesheet" href="gaya.css" type="text/css">
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript" >
var x = 1;

function cek(){
    $.ajax({
        url: "cekpesan.php",
        cache: false,
        success: function(msg){
            $("#notifikasi").html(msg);
        }
    });
    var waktu = setTimeout("cek()",3000);
}

$(document).ready(function(){
    cek();
    $("#pesan").click(function(){
        $("#loading").show();
        if(x==1){
            $("#pesan").css("background-color","#efefef");
            x = 0;
        }else{
            $("#pesan").css("background-color","#4B59a9");
            x = 1;
        }
        $("#info").toggle();
        //ajax untuk menampilkan pesan yang belum terbaca
        $.ajax({
            url: "lihatpesan.php",
            cache: false,
            success: function(msg){
                $("#loading").hide();
                $("#konten-info").html(msg);
            }
        });

    });
    $("#content").click(function(){
        $("#info").hide();
        $("#pesan").css("background-color","#4B59a9");
        x = 1;
    });
});

</script>
</head>

<body topmargin="0" leftmargin="0">
    
    
<div id="kepala">
<span id="pesan">
Pesan
<span id="notifikasi">
    
</span>
</span>
<span id="home"><a href="index.php" class="home">Home</a></span>
</div>
<div id="info">
    <div id="loading"><br>Loading...<img src="loading.gif"></div>
    <div id="konten-info">
    </div>
</div>

<div id="content">
<h1>Selamat Datang</h1>
<h2><?php echo $_SESSION['username'];?></h2>
PHP adalah bahasa scripting server-side, artinya di jalankan di server,
kemudian outputnya dikirim ke client (browser)
PHP digunakan untuk membuat aplikasi web
PHP mendukung banyak database (MySQL, Informix, Oracle, Sybase, Solid,
PostgreSQL, Generic ODBC, dll.)
<p>
<script>
function buka(){
open('formpesan.html','form','menubar=no,width=300,height=300');
}
</script>
[ <a href="#" onclick="buka()">Tes kirim pesan ke budi</a> ]
</div>
    <?php require 'cekpesan.php';  ?>
</body>

</html></style>
