<style type="text/css">
    .breadcrum {font-family:Arial; font-size:10px; margin:0px; }
    
</style>
<?php
session_start();
if($_GET['hal']=='home'){
echo "Home »";
    include 'logincek.php';

}
elseif($_GET['hal']==''){
echo "Home »";
    include 'logincek.php';

}
//umum
elseif($_GET['hal']=='login'){
echo "Home »";
    include 'logincek.php' ;
echo "» Login Yak..";
}
elseif($_GET['hal']=='user_info'){
echo "<a href=\"?hal=home\">Home</a> » Info User";
}

elseif($_GET['hal']=='berita'){
echo "<a href=\"?hal=home\">Home</a> » Info Dari Admin";
}
elseif($_GET['hal']=='artikel'){
echo "<a href=\"?hal=home\">Home</a> » Artikel Berita";
}
elseif($_GET['hal']=='inputberita'){
echo "<a href=\"?hal=home\">Home</a> » Input Berita";
}
elseif($_GET['hal']=='gantipass'){
echo "<a href=\"?hal=home\">Home</a> » Ganti Password";
}
elseif($_GET['hal']=='grafikall'){
echo "<a href=\"?hal=home\">Home</a> » Grafik ALL";
}



//pencarian BCF 1.5
elseif($_GET['hal']=='bcf15cari'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=caribcf15\">Pencarian</a> » Berdasarkan BL/BC11/BCF15/COnsignee/Notify ";
}
elseif($_GET['hal']=='caribcf15'){
echo "<a href=\"?hal=home\">Home</a> » Pencarian ";
}
elseif($_GET['hal']=='caribcf_cont'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=caribcf15\">Pencarian</a> » Berdasarkan No Container ";
}
elseif($_GET['hal']=='caribcf_brg'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=caribcf15\">Pencarian</a> » Berdasarkan Nama Barang ";
}
elseif($_GET['hal']=='caribcf_sppb'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=caribcf15\">Pencarian</a> » Berdasarkan Nomor Dokumen Pengeluaran ";
}
elseif($_GET['hal']=='detailstatusakhirman'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=caribcf15\">Pencarian</a> » History Status ";
}
elseif($_GET['hal']=='iku'){
echo "<a href=\"?hal=home\">Home</a> » Management IKU";
}

elseif($_GET['hal']=='detailiku'){
echo "<a href=\"?hal=home\">Home</a> » Management IKU";
}

elseif($_GET['hal']=='formdatalap_bcfterbit'){
echo "<a href=\"?hal=datalap_bcfterbit\">Home</a> » Report";
}

elseif($_GET['hal']=='datalap_bcfterbit'){
echo "<a href=\"?hal=datalap_bcfterbit\">Home</a> » Report";
}

elseif($_GET['hal']=='lap_bcfterbit'){
echo "<a href=\"?hal=datalap_bcfterbit\">Home</a> » Report";
}







//staf manifest
elseif($_GET['hal']=='pagemanifest'){
echo "<a href=\"?hal=home\">Home</a> » Menu Utama Staf Manifest";
}
elseif($_GET['hal']=='bcf15edit'){
echo "<a href=\"?hal=home\">Home</a>  » Form Edit BCF 15";
}
elseif($_GET['hal']=='bcf15report'){
echo "<a href=\"?hal=home\">Home</a>  » Print Preview";
}

elseif($_GET['hal']=='bcfedit'){
echo "<a href=\"?hal=home\">Home</a> » Edit BCF 1.5";
}


//seksimanifest
elseif($_GET['hal']=='browsevalidbcf15'){
echo "<a href=\"?hal=home\">Home</a> » Browse Validasi BCF 1.5";
}
elseif($_GET['hal']=='validasi'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=browsevalidbcf15\">Browse Validasi BCF 1.5</a> » Form Validasi BCF 1.5";
}


//adminmanifest
elseif($_GET['hal']=='seksiadd'){
echo "<a href=\"?hal=home\">Home</a> » Input Seksi Penandatangan BCF 1.5 dan surat lainnya";
}
elseif($_GET['hal']=='usermanadd'){
echo "<a href=\"?hal=home\">Home</a> » Input User Aplikasi SITAMPAN (khusus Seksi Manifest) ";
}
elseif($_GET['hal']=='tppadd'){
echo "<a href=\"?hal=home\">Home</a> » Input Tempat Penimbunan Pabean (TPP) Baru ";
}
elseif($_GET['hal']=='browseseksi'){
echo "<a href=\"?hal=home\">Home</a> » Browse Daftar Seksi Manifest Penandatangan BCF 1.5 dan surat lainnya";
}
elseif($_GET['hal']=='browseuser'){
echo "<a href=\"?hal=home\">Home</a> » Browse Daftar User Aplikasi SITAMPAN Seksi Manifest";
}
elseif($_GET['hal']=='userdel'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=browseuser\">Browse Daftar User Aplikasi SITAMPAN Seksi Manifest</a> » Non Aktikan User (Kill User)";
}
elseif($_GET['hal']=='useredit'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=browseuser\">Browse Daftar User Aplikasi SITAMPAN Seksi Manifest</a> » Ubah Data User";
}
elseif($_GET['hal']=='seksiedit'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=browseseksi\">Browse Daftar Seksi Manifest Penandatangan BCF 1.5 dan surat lainnya</a> » Ubah Data Seksi";
}


//tpp2
elseif($_GET['hal']=='bcf15edittpp2'){
echo "<a href=\"?hal=home\">Home</a> » Edit BCF 1.5";
}
elseif($_GET['hal']=='pecahpos'){
echo "<a href=\"?hal=home\">Home</a> » Pecah POS";
}
elseif($_GET['hal']=='pecahposdetil'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=pecahpos\"> Pecah Pos</a> » Formulir Pecah Pos";
}

elseif($_GET['hal']=='browsebukasegel'){
echo "<a href=\"?hal=home\">Home</a> » Input Bukasegel";
}
elseif($_GET['hal']=='bukasegel'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=browsebukasegel\">Input Bukasegel</a> » Form Buka Segel";
}
elseif($_GET['hal']=='browsebukasegelview'){
echo "<a href=\"?hal=home\">Home</a> » Edit BukaSegel";
}
elseif($_GET['hal']=='cetakbukasegelok'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=browsebukasegelview\">Edit BukaSegel </a> » Cetak (Preview)";
}
elseif($_GET['hal']=='suratperintah'){
echo "<a href=\"?hal=home\">Home</a> » Daftar BCF 1.5 yang belum dibuatkan Surat Perintah Penarikan";
}

elseif($_GET['hal']=='suratperintahview'){
echo "<a href=\"?hal=home\">Home</a> » Edit Surat Perintah";
}
elseif($_GET['hal']=='browsebatarik'){
echo "<a href=\"?hal=home\">Home</a> » Input BA Penarikan";
}

elseif($_GET['hal']=='browsebatarikview'){
echo "<a href=\"?hal=home\">Home</a> » Edit BA Penarikan";
}
elseif($_GET['hal']=='bapenarikan'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=browsebatarikview\">Edit BA Penarikan</a> » Form Edit BA Penarikan";
}
elseif($_GET['hal']=='sprint'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=suratperintahview\">Edit Surat Perintah</a> » Form Edit Surat Perintah";
}
elseif($_GET['hal']=='sprintok'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=suratperintahview\">Edit Surat Perintah</a> » <a href=\"?hal=sprint\">Form Edit Surat Perintah</a> » Print Preview Surat Perintah";
}
elseif($_GET['hal']=='bataltarik'){
echo "<a href=\"?hal=home\">Home</a> » Browse Permohonan Batal Tarik BCF 1.5";
}
elseif($_GET['hal']=='bataltarikedit'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=bataltarik\">Browse Permohonan Batal Tarik BCF 1.5 </a> » Form Input Permohonan Batal Tarik oleh TPP";
}
elseif($_GET['hal']=='lap_progres_penarikan'){
echo "<a href=\"?hal=home\">Home</a> » Monitoring Penarikan BCF 1.5 ";
}
elseif($_GET['hal']=='pagetpp2'){
echo "<a href=\"?hal=home\">Home</a> » Proses Segera ";
}


//tpp3
elseif($_GET['hal']=='suratpemberitahuan'){
echo "<a href=\"?hal=home\">Home</a> » Surat Pemberitahuan";
}
elseif($_GET['hal']=='suratpemberitahuanview'){
echo "<a href=\"?hal=home\">Home</a> » Daftar Surat Pemberitahuan";
}
elseif($_GET['hal']=='inputpel'){
echo "<a href=\"?hal=home\">Home</a> » Form Input Pelayaran Baru";
}
elseif($_GET['hal']=='sptahu'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=suratpemberitahuan\">Daftar Surat Pemberitahuan</a> » Form Input Surat Pemberitahuan" ;
}
elseif($_GET['hal']=='sptahuview'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=suratpemberitahuan\">Daftar Surat Pemberitahuan</a> » Form Edit Surat Pemberitahuan" ;
}
elseif($_GET['hal']=='sptahucetak'){
echo "<a href=\"?hal=home\">Home</a> » <a href=\"?hal=suratpemberitahuan\">Daftar Surat Pemberitahuan</a> » Print Preview SUrat Pemberitahuan" ;
}
elseif($_GET['hal']=='suratpemberitahuanall'){
echo "<a href=\"?hal=home\">Home</a> » Form Cetak Surat Pemberitahuan All ";
}
elseif($_GET['hal']=='ekspedisi'){
echo "<a href=\"?hal=home\">Home</a> » Form Cetak Ekspedisi ";
}
elseif($_GET['hal']=='pagetpp3'){
echo "<a href=\"?hal=home\">Home</a> » Proses Segera ";
}
elseif($_GET['hal']=='spcetak'){
echo "<a href=\"?hal=home\">Home</a> » Surat Pengantar ";
}

elseif($_GET['hal']=='addsuratmasuk'){
echo "<a href=\"?hal=home\">Home</a> » Input Surat Masuk » Surat Masuk umum ";
}
elseif($_GET['hal']=='suratmasukok'){
echo "<a href=\"?hal=home\">Home</a> » Input Surat Masuk » Cari Surat Masuk ";
}
elseif($_GET['hal']=='detailsuratmasuk'){
echo "<a href=\"?hal=home\">Home</a> » Daftar Surat Masuk(Umum) Seksi Penimbunan » Detail Surat ";
}
elseif($_GET['hal']=='browsesuratmasuktpp2'){
echo "<a href=\"?hal=home\">Home</a> » Daftar Surat Masuk(Umum) Seksi Penimbunan II » Form Disposisi Surat ";
}

elseif($_GET['hal']=='browsesuratmasuktpp3'){
echo "<a href=\"?hal=home\">Home</a> » Daftar Surat Masuk(Umum) Seksi Penimbunan III » Form Disposisi Surat ";
}

elseif($_GET['hal']=='disposisisurattpp3'){
echo "<a href=\"?hal=home\">Home</a>  » Form Disposisi Surat ";
}

elseif($_GET['hal']=='suratmasukumum'){
echo "<a href=\"?hal=home\">Home</a>  » Surat Masuk (Kerjaan Terbuka)" ;
}
elseif($_GET['hal']=='suratmasukdetail'){
echo "<a href=\"?hal=home\">Home</a>  » Surat Masuk (Kerjaan Terbuka) » Form Proses Surat Masuk" ;
}


//loket

elseif($_GET['hal']=='pagekonfirmasi'){
echo "<a href=\"?hal=home\">Home</a>  » Nota Dinas Konfirmasi)" ;
}
elseif($_GET['hal']=='konfirmasip2tpp'){
echo "<a href=\"?hal=home\">Home</a>  » Daftar BCF 1.5 (Konfirmasi Ke P2)" ;
}
elseif($_GET['hal']=='ndkonfirmasip2tpp'){
echo "<a href=\"?hal=home\">Home</a>  » Daftar BCF 1.5 (Konfirmasi Ke P2) » Form Konfirmasi " ;
}
elseif($_GET['hal']=='suratbataltpp'){
echo "<a href=\"?hal=home\">Home</a>  » Form Input Pembatalan BCF 1.5 " ;
}
elseif($_GET['hal']=='suratbataltppok'){
echo "<a href=\"?hal=home\">Home</a>  » <a href=\"?hal=suratbataltpp\">Form Input Pembatalan BCF 1.5</a>  » Cetak Surat Persetujuan Pembatalan BCF 1.5" ;
}
elseif($_GET['hal']=='mohonbatal'){
echo "<a href=\"?hal=home\">Home</a>  » Input Surat Masuk » Surat Masuk Pembatalan BCF 1.5" ;
}
elseif($_GET['hal']=='inputmohonbatal'){
echo "<a href=\"?hal=home\">Home</a>  » Daftar BCF 1.5 (Permohonan Pembatalan BCF 1.5) » Input Permohonan" ;
}
elseif($_GET['hal']=='ndkonfirmasip2tppok'){
echo "<a href=\"?hal=home\">Home</a>  » Daftar BCF 1.5 (Konfirmasi Ke P2) » FOrm Input Nota Dinas Konfirmasi  » Print Preview Nota Dinas Konfirmasi " ;
}

//pemwastpp
elseif($_GET['hal']=='saldobcf15'){
echo "<a href=\"?hal=home\">Home</a>  » Saldo BCF 1.5 " ;
}

elseif($_GET['hal']=='laporan'){
echo "<a href=\"?hal=home\">Home</a>  » Laporan Monitoring BCF 1.5 " ;
}


//admin p2
elseif($_GET['hal']=='addseksip2'){
echo "<a href=\"?hal=home\">Home</a>  » Input Seksi Penandatangan Dokumen " ;
}
elseif($_GET['hal']=='browseseksip2'){
echo "<a href=\"?hal=home\">Home</a>  » Browse Seksi Penandatangan Dokumen " ;
}
elseif($_GET['hal']=='browseuserp2'){
echo "<a href=\"?hal=home\">Home</a>  » Browse User P2 " ;
}

//staf p2
elseif($_GET['hal']=='daftarconf'){
echo "<a href=\"?hal=home\">Home</a>  » Daftar Konfirmasi BCF 1.5  " ;
}
elseif($_GET['hal']=='konfirmasiproses'){
echo "<a href=\"?hal=home\">Home</a>  » Modul Jawaban Konfirmasi BCF 1.5  " ;
}


//seksi tpp3

elseif($_GET['hal']=='validasitpp3'){
echo "<a href=\"?hal=home\">Home</a>  » Validasi » Nota Dinas Konfirmasi" ;
}

elseif($_GET['hal']=='validasitpp3edit'){
echo "<a href=\"?hal=home\">Home</a>  » Validasi » Nota Dinas Konfirmasi » View" ;
}

//front desk Penimbunan
elseif($_GET['hal']=='pagefront'){
echo "<a href=\"?hal=home\">Home</a>  » Menu Utama Front Desk" ;
}
//front desk Penimbunan
elseif($_GET['hal']=='saldobtdkabid'){
echo "<a href=\"?hal=home\">Home</a>  » Daftar Saldo BTD" ;
}

?>