<?php
include '../lib/koneksi.php';
include '../lib/function.php';

?>
<html>
<head>
<title>Print Preview </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<script type="text/javascript">
function cetak()
{
window.print();
window.close();
}
</script>

</head>

<body onLoad="window.print()">

<?php
                   
                   
                    $no_skep = $_GET['no_skep']; // menangkap id
                    $tgl = $_GET['tgl']; 
                    $sql = "SELECT * FROM bcf15,tpp,kepala_kantor WHERE bcf15.idkepala_kantor_skep_btd=kepala_kantor.idkepala_kantor and bcf15.idtpp=tpp.idtpp and KepLelang1No='$no_skep' and KepLelang1Date='$tgl'  "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $bulankini=date('M');
                    
                    //untuk tanggal bahasa indonesia
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

                        $indDate="$bulan $thn";
                     


                    ?>
                    
                                
                      
                        <form method="POST">
                            <table width="100%" border="0">
                                <tr >
                                    <td colspan="2">
                                        <table width="100%" border="0" >
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</b></font></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="3"><b>DIREKTORAT JENDERAL BEA DAN CUKAI</b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>KEPUTUSAN KEPALA KANTOR PELAYANAN UTAMA BEA DAN CUKAI</b></font></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>TIPE B BATAM</b></font></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>NOMOR : KEP-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/KPU.01/<?php echo $thn;?></b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>TENTANG</b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>PENETAPAN BARANG YANG DINYATAKAN TIDAK DIKUASAI</b></font></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>UNTUK SEGERA DILAKSANAKAN PELELANGANNYA</b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>KEPALA KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE B BATAM</b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr >
                                   <td colspan="2" >
                                        <table width="100%" border="0" >
                                            <tr valign="top">
                                                <td>Menimbang</td><td>:</td><td>a.</td><td><p style="text-align: justify">bahwa terdapat barang-barang di Tempat Penimbunan Pabean <?php echo "$bcf15[nm_tpp]"; ?> yang telah ditetapkan menjadi Barang Yang Dinyatakan Tidak Dikuasai dan memenuhi syarat untuk dilelang;</p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td>b.</td><td><p style="text-align: justify">bahwa barang tidak dikuasai tersebut huruf a pengurusannya memerlukan biaya tinggi sehingga harus segera dilakukan pelelangan dengan memberitahukan secara tertulis kepada pemiliknya;</p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td>c.</td><td ><p style="text-align: justify">bahwa berdasarkan pertimbangan sebagaimana dimaksud dalam huruf a dan b menetapkan Keputusan Kepala Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam tentang Penetapan Barang-barang Yang Dinyatakan Tidak Dikuasai Yang Sudah Memenuhi Syarat Untuk Segera Dilaksanakan Pelelangannya.</p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>Mengingat</td><td>:</td><td>1.</td><td><p style="text-align: justify">Undang-Undang Nomor 10 Tahun 1995 tentang Kepabeanan (Lembaran Negara Republik Indonesia Tahun 1995 Nomor 75, Tambahan Lembaran Negara Republik Indonesia Nomor 3612) sebagaimana diubah dengan Undang-Undang Nomor 17 Tahun 2006 (Lembaran Negara Republik Indonesia Tahun 2006 Nomor 93, Tambahan Lembaran Negara Republik Indonesia Nomor 4661); </p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td>2.</td><td><p style="text-align: justify">Peraturan Menteri Keuangan Republik Indonesia Nomor 62/PMK.04/2011 tentang Penyelesaian Terhadap Barang Yang Dinyatakan Tidak Dikuasai, Barang Yang Dikuasai Negara, dan Barang Yang Menjadi Milik Negara.</p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td colspan="5"><font face="arial" size="4"><b>M E M U T U S K A N</b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>Menetapkan </td><td>:</td><td></td><td><p style="text-align: justify">KEPUTUSAN KEPALA KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE A TAJUNG PRIOK TENTANG PENETAPAN BARANG YANG DINYATAKAN TIDAK DIKUASAI UNTUK SEGERA DILAKSANAKAN PELELANGANNYA. </p></td>
                                            </tr>
                                             <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>PERTAMA </td><td>:</td><td></td><td><p style="text-align: justify">Barang-barang impor yang telah melampaui jangka waktu penimbunannya dan tidak diselesaikan kewajiban kepabeanannya oleh pemilik barang atau kuasanya sebagaimana tercantum dalam lampiran surat keputusan ini ditetapkan sebagai barang - barang yang dinyatakan tidak dikuasai untuk segera dilaksanakan pelelangannya. </p></td>
                                            </tr>
                                            <tr>
                                                <td height="10"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" align="right">KEDUA...</td>
                                            </tr>
                                             <tr>
                                                <td height="90"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>KEDUA </td><td>:</td><td></td><td><p style="text-align: justify">Pelaksanaan lelang terhadap Barang Yang Dinyatakan Tidak Dikuasai tersebut diktum PERTAMA dilaksanakan oleh Panitia Lelang Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam, dengan perantara Kantor Pelayanan Kekayaan Negara dan Lelang Jakarta II. </p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>KETIGA </td><td>:</td><td></td><td><p style="text-align: justify">Surat Keputusan ini disampaikan kepada Kepala Bidang Pelayanan Pabean dan Cukai untuk dapat dipergunakan sebagaimana mestinya sesuai ketentuan yang berlaku. </p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>KEEMPAT </td><td>:</td><td></td><td><p style="text-align: justify">Keputusan ini mulai berlaku sejak tanggal ditetapkan dan apabila di kemudian hari terdapat kekeliruan akan diadakan perbaikan seperlunya. </p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">Salinan keputusan ini disampaikan kepada Yth:</p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">1. Direktur Jenderal Bea dan Cukai; </p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">2. Panitia Lelang KPU Bea dan Cukai Tipe B Batam; </p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">3. Pimpinan <?php echo $bcf15['nm_tpp'] ?>; </p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">4. Kasi Administrasi Manifest Bidang PPC III. </p></td>
                                            </tr>
                                            
                                        </table>
                                    </td> 
                                </tr>
                                
                                
                                
                               
                               
                            </table>
                            <table width="100%" border="0" >
                                
                                <tr>
                                    <td width="50%">
                                        
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                
                                                     <td>Ditetapkan di </td>
                                                      <td>:</td><td>Jakarta</td>
                                            </tr>
                                            <tr>
                                                
                                                     <td>Pada tanggal </td>
                                                      <td>:</td> <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $indDate ?> </td>
                                            </tr>
                                            <tr>
                                                
                                                     <td COLSPAN="3"><font ><b>KEPALA KANTOR,</b></font></td>
                                                      
                                            </tr>
                                             <tr>
                                                <td height="90"></td>
                                            </tr>
                                            <tr>
                                                
                                                     <td COLSPAN="3"><b><?php echo "$bcf15[nm_kepala_kantor]"; ?></b></td>
                                                     
                                            </tr>
                                            <tr>
                                                
                                                     <td COLSPAN="3"><b><?php echo "NIP $bcf15[nip_kepala_kantor]"; ?></b></td>
                                                     
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </form>
    
    </body>
</html>