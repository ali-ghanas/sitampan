<?php
if($_REQUEST['hal']=='user'){
        echo "<ul class='nav nav-list'>
            <li class='nav-header'>Manajemen User</li>
                    <li >Merupakan menu khusus SUPER ADMIN untuk memanage user pengguna aplikasi SITAMPAN:
                        <ul>
                            <li>
                                Tambah User
                            </li>
                            <li>
                                Hapus User
                            </li>
                            <li>
                                Edit User
                            </li>
                            <li>
                                Tambah Hak Akses User
                            </li>
                        </ul>
                    </li>
                    
          </ul>";
    }
 elseif($_REQUEST['hal']=='settapp'){
        echo "<ul class='nav nav-list'>
            <li class='nav-header'>Setting Aplikasi</li>
                    <li >Merupakan menu khusus SUPER ADMIN untuk setting terhadap aplikasi SITAMPAN, berupa
                        <ul>
                            <li>
                               Manajemen TPP
                               <p>
                                    Menu ini untuk menginput TPP baru, atau mengedit alamat TPP, dll
                                </p>
                            </li>
                            <li>
                                Input Tanggal Libur Nasional
                                <p>Menu ini untuk menginput tanggal libur pada aplikasi, dimana tanggal libur ini akan digunakan dalam konfirmasi
                                    BCF 1.5 ke P2
                                </p>
                            </li>
                            
                            <li>
                                Event Kegiatan
                                <p>Menu ini untuk menambahkan informasi mengenai jadwal kegiatan lelang, musnah, hibah pada Seksi Tempat Penimbunan Pabean.
                                </p>
                            </li>
                            <li>
                                Update Tabel BCF 1.5
                                <p>Menu ini untuk edit tabel bcf dimana tabel tersebut terdapat kekeliruan isi datanya.
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class='nav-header'>Daftar Aplikasi</li>
                    <li >Merupakan menu aplikasi pada SITAMPAN, berupa
                        <ul>
                            <li >
                               <b>Office Otomation</b>
                               <p>
                                    Merupakan aplikasi Surat Masuk dan keluar Seksi Tempat Penimbunan, berupa :
                                    <li class='nav-header'>Surat Masuk</li>
                                        <ul>
                                            <li>Permohonan Pemusnahan BTD, BDN</li>
                                            <li>Permohonan Pembatalan BDN</li>
                                            <li>Permohonan Stripping/ stuffing container di TPP</li>
                                            <li>Permohonan pengeluaran empty container di TPP</li>
                                            <li>surat masuk lainnya, selain PEMBATALAN BCF 1.5</li>
                                        </ul>
                                    <li class='nav-header'>Surat Keluar</li>
                                        <ul>
                                            <li>Surat Keluar Ke Eksternal</li>
                                            <li>SIPB Lelang dan BDN</li>
                                            
                                        </ul>
                                </p>
                            </li>
                            <li>
                                <b>SITAMPAN BTD</b>
                                <p>Aplikasi yang menangani penetapan, konfirmasi dan pembatalan BCF 1.5 (BTD), hingga penetapan status Ke BMN, Hibah, Lelang dan Musnah
                                </p>
                            </li>
                            
                            <li>
                                <b>SITAMPAN BDN</b>
                                <p>Aplikasi yang menangani penetapan BDN, konfirmasi dan pembatalan BDN hingga penetapan status menjadi BMN, Hibah, lelang, dan musnah.
                                </p>
                            </li>
                            <li>
                                <b>SITAMPAN BMN</b>
                                <p>Aplikasi yang menangani penetapan BMN hingga proses peruntukan BMN untuk dilelang, musnahkan, hibah hingga penutupan pos BMN nya.
                                </p>
                            </li>
                        </ul>
                    </li>


          </ul>";
    }
    elseif($_REQUEST['hal']=='seksi'){
        echo "<ul class='nav nav-list'>
            
                    <li class='nav-header'>Manajemen Seksi</li>
                    <li >Merupakan menu khusus SUPER ADMIN untuk menambahkan, edit dan hapus Seksi Penandatangan dokumen.
                        
                    </li>
          </ul>";
    }
?>
