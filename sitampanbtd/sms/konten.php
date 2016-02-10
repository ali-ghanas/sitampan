<?php
include "koneksi/koneksi.php";
include "fungsi/library.php";
include "fungsi/fungsi_indotgl.php";
include "fungsi/fungsi_combobox.php";
include "fungsi/class_paging.php";

// Bagian Home
if ($_GET[module]=='home'){
  echo "<h1>Selamat Datang</h1>
    <table>
        <tr>
                <td  class=judulbreadcrumb><p>Hai <b>$_SESSION[nm_lengkap]</b>, Selamat datang di halaman SMS Application.<br> Silahkan klik menu pilihan yang berada 
                di sebelah kiri untuk mengirim dan melihat pesan.<br/><font color=#3e3e3e>aplikasi ini sedang dalam tahap uji coba.</font></p>
                </td>
        </tr>
    </table>
          
          
          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</font></p>";
}

// Bagian Inbox
elseif ($_GET[module]=='inbox'){
	include "inbox.php";
}

// bagian outbox
elseif ($_GET[module]=='outbox'){
	include "outbox.php";
}

// bagian sentitems
elseif ($_GET[module]=='sentitems'){
	include "sentitems.php";
}

// bagian phonebook
elseif ($_GET[module] == 'phonebook'){
	include "phonebook.php";
}

// Bagian Lihat detail
elseif ($_GET[module]=='lihatdetail'){
	include "lihatdetail.php";
}

// bagian phonebook
elseif ($_GET[module]=='phonebook'){
	include "phonebook.php";
}

// bagian tambah group
elseif ($_GET[module]=='tambahpbkgroup'){
	include "tambah_group.php";
}

// bagian lihat detail group
elseif ($_GET[module]=='lihatdetailgroup'){
	include "lihatdetailgroup.php";
}

// bagian tambah pbk
elseif ($_GET[module]=='tambahpbk'){
	include "tambahpbk.php";
}

// bagian send sms
elseif ($_GET[module]=='sendsms'){
	include "sendsms.php";
}

// bagian compose
elseif ($_GET[module]=='compose'){
	include "compose.php";
}

// bagian edit pbk
elseif ($_GET[module]=='editpbk'){
	include "edit_pbk.php";
}

// bagian edit group
elseif ($_GET[module]=='editgroup'){
	include "edit_group.php";
}

// bagian send group
elseif ($_GET[module]=='sendgroup'){
	include "sendgroup.php";
}

// bagian laporan
elseif ($_GET[module]=='laporan'){
	include "laporan.php";
}

// bagian lap inbox
elseif ($_GET[module]=='lap_inbox'){
	include "lap_inbox.php";
}

// bagian lap outbox
elseif ($_GET[module]=='lap_outbox'){
	include "lap_outbox.php";
}

// bagian lap sentitems
elseif ($_GET[module]=='lap_sentitems'){
	include "lap_sentitems.php";
}
elseif ($_GET[module]=='services'){
	include "services.php";
}
elseif ($_GET[module]=='servicesrun'){
	include "services_jalankan.php";
}
elseif ($_GET[module]=='servicesstop'){
	include "services_stop.php";
}
elseif ($_GET[module]=='cekpulsa'){
	include "services_cekpulsa.php";
}
// Apabila modul tidak ditemukan
else{
	echo "<p><b>Modul Tidak Ditemukan</b></p>";
        
}
?>