<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}

else
{
  
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
        
        
        
           

</head>

<body>
    
   

<form method="post" id="lapkin" name="lapkin" action="?hal=in_lap_kinerja">
<table width="100%" border="0" align="center" >
    
    
    <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Input Laporan Kinerja Seksi Tempat Penimbunan</b> </td>
    </tr>
    <tr>
        <td height="20"></td>
    </tr>
    <tr>
    <td >Bulan
            
            <select class="required" id="bulan" name="bulan" >
                <option value = "" >--Bulan Rekam--</option>
                <?php
                    $sql = "SELECT * FROM lap_kinerja_bulan ORDER BY idlap_kinerja_bulan";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data =mysql_fetch_array($qry)) {
                            if ($data[idlap_kinerja_bulan]==$_POST[bulan]) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data[idlap_kinerja_bulan]' $cek>$data[nm_bulan_lengkap]</option>";
                            }
		?>
            </select>
                <input class="required" id="Tahun" name="Tahun" type="text" size="10" maxlength="6" value="<?php $now=date('Y'); echo $now; ?>" />
            </td>
    </tr>
    <tr>
        <td height="20"></td>
    </tr>
    <tr valign="top">
        <td colspan="3" align="top">
            <table width="100%" border="0" align="top">
                <tr>
                    <td class="judultabel" colspan="3" >
                        BCF 1.5
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Penetapan BCF 1.5 
                    </td>
                    <td >
                        <input id="lap_tap_bcf15" class="required" name="lap_tap_bcf15" type="text" value= "<?php echo $_POST['lap_tap_bcf15']; ?>" />
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Surat Perintah 
                    </td>
                    <td >
                        <input id="lap_sprint" class="required" name="lap_sprint" type="text" value= "<?php echo $_POST['lap_sprint']; ?>" /> 
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Surat Pemberitahuan
                    </td>
                    <td >
                        <input id="lap_pemberitahuan" class="required" name="lap_pemberitahuan" type="text" value= "<?php echo $_POST['lap_pemberitahuan']; ?>" />  
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah BCF 1.5 Masuk TPP
                    </td>
                    <td >
                        <input id="lap_bcf15_masuk" class="required" name="lap_bcf15_masuk" type="text" value= "<?php echo $_POST['lap_bcf15_masuk']; ?>" />   
                    </td>
                    <td >
                        BCF 1.5
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah BCF 1.5 Tidak Masuk TPP
                    </td>
                    <td >
                        <input id="lap_bcf15_tidak_masuk" class="required" name="lap_bcf15_tidak_masuk" type="text" value= "<?php echo $_POST['lap_bcf15_tidak_masuk']; ?>" />   
                    </td>
                    <td >
                        BCF 1.5
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Pencacahan Batal BCF 1.5
                    </td>
                    <td >
                        <input id="lap_cacah_batal" class="required" name="lap_cacah_batal" type="text" value= "<?php echo $_POST['lap_cacah_batal']; ?>" />   
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Pencacahan Lelang
                    </td>
                    <td >
                       <input id="lap_cacah_lelang" class="required" name="lap_cacah_lelang" type="text" value= "<?php echo $_POST['lap_cacah_lelang']; ?>" />    
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Nota Dinas Konfirmasi
                    </td>
                    <td >
                        <input id="lap_ndkondirmasip2" class="required" name="lap_ndkondirmasip2" type="text" value= "<?php echo $_POST['lap_ndkondirmasip2']; ?>" />     
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Setuju Batal
                    </td>
                    <td >
                        <input id="lap_setujubatalbcf15" class="required" name="lap_setujubatalbcf15" type="text" value= "<?php echo $_POST['lap_setujubatalbcf15']; ?>" />      
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Permohonan Pembatalan Yang Masuk
                    </td>
                    <td >
                        <input id="lap_suratmohonbatal" class="required" name="lap_suratmohonbatal" type="text" value= "<?php echo $_POST['lap_suratmohonbatal']; ?>" />      
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                
            </table>
        </td>
        <td colspan="3" align="top">
            <table width="100%" border="0" align="top">
                <tr>
                    <td class="judultabel" colspan="23">
                        BMN
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Penetapan BMN 
                    </td>
                    <td >
                        <input id="lap_tap_kepBMN" class="required" name="lap_tap_kepBMN" type="text" value= "<?php echo $_POST['lap_tap_kepBMN']; ?>" />      
                    </td>
                    <td >
                        Kep
                    </td>
                </tr>
                <tr>
                    <td >
                        Total BCF 1.5 ke BMN
                    </td>
                    <td >
                        <input id="lap_tot_bcf_to_bmn" class="required" name="lap_tot_bcf_to_bmn" type="text" value= "<?php echo $_POST['lap_tot_bcf_to_bmn']; ?>" />       
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Total BDN ke BMN
                    </td>
                    <td >
                        <input id="lap_tot_bdn_to_bmn" class="required" name="lap_tot_bdn_to_bmn" type="text" value= "<?php echo $_POST['lap_tot_bdn_to_bmn']; ?>" />        
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Total BMN yang di batalkan
                    </td>
                    <td >
                        <input id="lap_pembatalan_bmn" class="required" name="lap_pembatalan_bmn" type="text" value= "<?php echo $_POST['lap_pembatalan_bmn']; ?>" />        
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                
                
            </table>
        </td>
    </tr>
    <tr valign="top">
        <td colspan="3" align="top">
            <table width="100%" border="0" align="top">
                <tr>
                    <td class="judultabel" colspan="3" >
                        MUSNAH
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah KEP Musnah 
                    </td>
                    <td >
                        <input id="lap_tap_kepmusnah" class="required" name="lap_tap_kepmusnah" type="text" value= "<?php echo $_POST['lap_tap_kepmusnah']; ?>" />        
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Total BCF 1.5 dijadikan Kep MUSNAH 
                    </td>
                    <td >
                        <input id="lap_tot_bcf_musnah" class="required" name="lap_tot_bcf_musnah" type="text" value= "<?php echo $_POST['lap_tot_bcf_musnah']; ?>" />        
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Total BDN dijadikan KEP musnah
                    </td>
                    <td >
                        <input id="lap_tot_bdn_musnah" class="required" name="lap_tot_bdn_musnah" type="text" value= "<?php echo $_POST['lap_tot_bdn_musnah']; ?>" />        
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Total BMN yang Setuju diMusnahkan
                    </td>
                    <td >
                        <input id="lap_tot_bmn_musnah" class="required" name="lap_tot_bmn_musnah" type="text" value= "<?php echo $_POST['lap_tot_bmn_musnah']; ?>" />        
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                <tr>
                    <td >
                        Kegiatan Pemusnahan
                    </td>
                    <td >
                        <input id="lap_kegiatan_pelaksanaanmusnah" class="required" name="lap_kegiatan_pelaksanaanmusnah" type="text" value= "<?php echo $_POST['lap_kegiatan_pelaksanaanmusnah']; ?>" />        
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                
                
            </table>
        </td>
        <td colspan="3" align="top">
            <table width="100%" border="0" align="top">
                <tr>
                    <td class="judultabel" colspan="23">
                       BTDK Lelang
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Kep BTDK Lelang 
                    </td>
                    <td >
                        <input id="lap_tap_kepbtdklelang" class="required" name="lap_tap_kepbtdklelang" type="text" value= "<?php echo $_POST['lap_tap_kepbtdklelang']; ?>" />        
                    </td>
                    <td >
                        Kep
                    </td>
                </tr>
                <tr>
                    <td >
                        Total BCF 1.5 yang ditetapkan Lelang
                    </td>
                    <td >
                        <input id="lap_tot_bcf_kepbtdklelang" class="required" name="lap_tot_bcf_kepbtdklelang" type="text" value= "<?php echo $_POST['lap_tot_bcf_kepbtdklelang']; ?>" />        
                    </td>
                    <td >
                        Dok
                    </td>
                </tr>
                
                
            </table>
        </td>
    </tr>
    <tr valign="top">
        <td colspan="3" align="top">
            <table width="100%" border="0" align="top">
                <tr>
                    <td class="judultabel" colspan="3" >
                        BDN
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah KEP BDN yang ditetapkan P2 
                    </td>
                    <td >
                        <input id="lap_tap_kepBDN" class="required" name="lap_tap_kepBDN" type="text" value= "<?php echo $_POST['lap_tap_kepBDN']; ?>" />        
                    </td>
                    <td >
                        Kep
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah KEP BDN Yang dibatalkan
                    </td>
                    <td >
                        <input id="lap_pembatalan_bdn" class="required" name="lap_pembatalan_bdn" type="text" value= "<?php echo $_POST['lap_pembatalan_bdn']; ?>" />        
                    </td>
                    <td >
                        Kep
                    </td>
                </tr>
                
                
            </table>
        </td>
        <td colspan="3" align="top">
            <table width="100%" border="0" align="top">
                <tr>
                    <td class="judultabel" colspan="23">
                       Kegiatan Lelang BTD
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Kegiatan Lelang
                    </td>
                    <td >
                       <input id="lap_kegiatan_lelang_btd" class="required" name="lap_kegiatan_lelang_btd" type="text" value= "<?php echo $_POST['lap_kegiatan_lelang_btd']; ?>" />        
                    </td>
                    <td >
                        Kegiatan
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Lot Lelang BTD
                    </td>
                    <td >
                       <input id="lap_jumlah_lotlelang_btd" class="required" name="lap_jumlah_lotlelang_btd" type="text" value= "<?php echo $_POST['lap_jumlah_lotlelang_btd']; ?>" />         
                    </td>
                    <td >
                        Lot
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Lot Lelang BTD yang Laku
                    </td>
                    <td >
                        <input id="lap_jumlah_lotlelanglaku_btd" class="required" name="lap_jumlah_lotlelanglaku_btd" type="text" value= "<?php echo $_POST['lap_jumlah_lotlelanglaku_btd']; ?>" />         
                    </td>
                    <td >
                        Lot
                    </td>
                </tr>
                <tr>
                    <td >
                        Harga Limit 
                    </td>
                    <td >
                        <input id="lap_jumlah_limit_lelang_btd" class="required" name="lap_jumlah_limit_lelang_btd" type="text" value= "<?php echo $_POST['lap_jumlah_limit_lelang_btd']; ?>" />         
                    </td>
                    <td >
                        Rp
                    </td>
                </tr>
                <tr>
                    <td >
                        Harga Lelang yang Terbentuk  
                    </td>
                    <td >
                        <input id="lap_jumlah_hrgterbentuk_lelang_btd" class="required" name="lap_jumlah_hrgterbentuk_lelang_btd" type="text" value= "<?php echo $_POST['lap_jumlah_hrgterbentuk_lelang_btd']; ?>" />          
                    </td>
                    <td >
                        Rp
                    </td>
                </tr>
                
                
            </table>
        </td>
    </tr>
    <tr valign="top">
        <td colspan="3" align="top">
            <table width="100%" border="0" align="top">
                <tr>
                    <td class="judultabel" colspan="3" >
                        Kegiatan Lelang BMN
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Kegiatan lelang BMN
                    </td>
                    <td >
                        <input id="lap_kegiatan_lelang_bmn" class="required" name="lap_kegiatan_lelang_bmn" type="text" value= "<?php echo $_POST['lap_kegiatan_lelang_bmn']; ?>" />           
                    </td>
                    <td >
                        Lot
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Lot Lelang BMN 
                    </td>
                    <td >
                        <input id="lap_jumlah_lotlelang_bmn" class="required" name="lap_jumlah_lotlelang_bmn" type="text" value= "<?php echo $_POST['lap_jumlah_lotlelang_bmn']; ?>" />           
                    </td>
                    <td >
                        Lot
                    </td>
                </tr>
                <tr>
                    <td >
                        Jumlah Lot Lelang BMN yang Laku Lelang
                    </td>
                    <td >
                        <input id="lap_jumlah_lotlelanglaku_bmn" class="required" name="lap_jumlah_lotlelanglaku_bmn" type="text" value= "<?php echo $_POST['lap_jumlah_lotlelanglaku_bmn']; ?>" />            
                    </td>
                    <td >
                        Lot
                    </td>
                </tr>
                <tr>
                    <td >
                        Harga Limit 
                    </td>
                    <td >
                        <input id="lap_jumlah_limit_lelang_bmn" class="required" name="lap_jumlah_limit_lelang_bmn" type="text" value= "<?php echo $_POST['lap_jumlah_limit_lelang_bmn']; ?>" />            
                    </td>
                    <td >
                        Rp
                    </td>
                </tr>
                <tr>
                    <td >
                        Harga Lelang yang Terbentuk  
                    </td>
                    <td >
                        <input id="lap_jumlah_hrgterbentuk_lelang_bmn" class="required" name="lap_jumlah_hrgterbentuk_lelang_bmn" type="text" value= "<?php echo $_POST['lap_jumlah_hrgterbentuk_lelang_bmn']; ?>" />            
                    </td>
                    <td >
                        Rp
                    </td>
                </tr>
                
                
            </table>
        </td>
        <td colspan="3" align="top">
            <table width="100%" border="0" align="top">
                <tr>
                    <td class="judultabel" colspan="23">
                      Peserta Lelang
                    </td>
                </tr>
                <tr>
                    <td >
                        Total Peserta Lelang BTD
                    </td>
                    <td >
                        <input id="lap_jumlah_peserta_lelang_btd" class="required" name="lap_jumlah_peserta_lelang_btd" type="text" value= "<?php echo $_POST['lap_jumlah_peserta_lelang_btd']; ?>" />            
                    </td>
                    <td >
                        Orang
                    </td>
                </tr>
                <tr>
                    <td >
                        Total Peserta Lelang BMN
                    </td>
                    <td >
                        <input id="lap_jumlah_peserta_lelang_bmn" class="required" name="lap_jumlah_peserta_lelang_bmn" type="text" value= "<?php echo $_POST['lap_jumlah_peserta_lelang_bmn']; ?>" />            
                    </td>
                    <td >
                        Orang
                    </td>
                </tr>
                
                
                
            </table>
        </td>
    </tr>
    
    
        
    
    <tr>
            
            <td colspan="4"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"  onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"  /></td>
    </tr>

  </table>
</form>



<?php 


$tgl_input = date('Y-m-d');
$bulan = $_POST['bulan']; 
$Tahun = $_POST['Tahun'];

$lap_tap_bcf15 = $_POST['lap_tap_bcf15'];
$lap_sprint = $_POST['lap_sprint'];


$lap_pemberitahuan = $_POST['lap_pemberitahuan'];
$lap_bcf15_masuk = $_POST['lap_bcf15_masuk'];
$lap_bcf15_tidak_masuk = $_POST['lap_bcf15_tidak_masuk'];
$lap_cacah_batal = $_POST['lap_cacah_batal'];


$lap_cacah_lelang = $_POST['lap_cacah_lelang'];
$lap_ndkondirmasip2 = $_POST['lap_ndkondirmasip2'];
$lap_setujubatalbcf15 = $_POST['lap_setujubatalbcf15'];
$lap_suratmohonbatal = $_POST['lap_suratmohonbatal'];

$lap_tap_kepBDN = $_POST['lap_tap_kepBDN'];
$lap_tap_kepBMN = $_POST['lap_tap_kepBMN'];
$lap_tot_bcf_to_bmn = $_POST['lap_tot_bcf_to_bmn'];
$lap_tot_bdn_to_bmn = $_POST['lap_tot_bdn_to_bmn'];
$lap_tap_kepmusnah = $_POST['lap_tap_kepmusnah'];
$lap_tot_bcf_musnah = $_POST['lap_tot_bcf_musnah'];
$lap_tot_bdn_musnah = $_POST['lap_tot_bdn_musnah'];
$lap_tot_bmn_musnah = $_POST['lap_tot_bmn_musnah'];

$lap_tap_kepbtdklelang = $_POST['lap_tap_kepbtdklelang'];
$lap_tot_bcf_kepbtdklelang = $_POST['lap_tot_bcf_kepbtdklelang'];

$lap_kegiatan_pelaksanaanmusnah = $_POST['lap_kegiatan_pelaksanaanmusnah'];
$lap_kegiatan_lelang_btd = $_POST['lap_kegiatan_lelang_btd'];
$lap_jumlah_lotlelang_btd = $_POST['lap_jumlah_lotlelang_btd'];
$lap_jumlah_lotlelanglaku_btd = $_POST['lap_jumlah_lotlelanglaku_btd'];

$lap_jumlah_limit_lelang_btd = $_POST['lap_jumlah_limit_lelang_btd'];
$lap_jumlah_hrgterbentuk_lelang_btd = $_POST['lap_jumlah_hrgterbentuk_lelang_btd'];
$lap_kegiatan_lelang_bmn = $_POST['lap_kegiatan_lelang_bmn'];
$lap_jumlah_lotlelang_bmn = $_POST['lap_jumlah_lotlelang_bmn'];
$lap_jumlah_lotlelanglaku_bmn = $_POST['lap_jumlah_lotlelanglaku_bmn'];
$lap_jumlah_limit_lelang_bmn = $_POST['lap_jumlah_limit_lelang_bmn'];
$lap_jumlah_hrgterbentuk_lelang_bmn = $_POST['lap_jumlah_hrgterbentuk_lelang_bmn'];

$lap_jumlah_peserta_lelang_btd = $_POST['lap_jumlah_peserta_lelang_btd'];
$lap_jumlah_peserta_lelang_bmn = $_POST['lap_jumlah_peserta_lelang_bmn'];

$lap_pembatalan_bdn = $_POST['lap_pembatalan_bdn'];
$lap_pembatalan_bmn = $_POST['lap_pembatalan_bmn'];

if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
    $sql = "SELECT bulan,Tahun FROM lap_kinerja where Tahun='$Tahun' and bulan='$bulan' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Laporan ini Pernah di input Silahkan cari ke menu edit");</script>';
                    
                }
                
                
                else
                {
                
		$input=mysql_query("INSERT INTO lap_kinerja(
                        tgl_input,
                        bulan, 
                        Tahun, 
                        lap_tap_bcf15, 
                        lap_sprint, 
                        lap_pemberitahuan,
                        lap_bcf15_masuk,
                        lap_bcf15_tidak_masuk,
                        lap_cacah_batal,
                        lap_cacah_lelang,
                        lap_ndkondirmasip2,
                        lap_setujubatalbcf15,
                        lap_suratmohonbatal,
                        lap_tap_kepBDN,
                        lap_tap_kepBMN,
                        lap_tot_bcf_to_bmn,
                        lap_tot_bdn_to_bmn,
                        lap_tap_kepmusnah,
                        lap_tot_bcf_musnah,
                        lap_tot_bdn_musnah,
                        lap_tot_bmn_musnah,
                        lap_tap_kepbtdklelang,
                        lap_tot_bcf_kepbtdklelang,
                        lap_kegiatan_pelaksanaanmusnah,
                        lap_kegiatan_lelang_btd,
                        lap_jumlah_lotlelang_btd,
                        lap_jumlah_lotlelanglaku_btd,
                        lap_jumlah_limit_lelang_btd,
                        lap_jumlah_hrgterbentuk_lelang_btd,
                        lap_kegiatan_lelang_bmn,
                        lap_jumlah_lotlelang_bmn,
                        lap_jumlah_lotlelanglaku_bmn,
                        lap_jumlah_limit_lelang_bmn,
                        lap_jumlah_hrgterbentuk_lelang_bmn,
                        lap_jumlah_peserta_lelang_btd,
                        lap_jumlah_peserta_lelang_bmn,
                        lap_pembatalan_bdn,
                        lap_pembatalan_bmn
                        )
                        
		VALUES(
                        '$tgl_input',
                        '$bulan', 
                        '$Tahun', 
                        '$lap_tap_bcf15', 
                        '$lap_sprint', 
                        '$lap_pemberitahuan',
                        '$lap_bcf15_masuk',
                        '$lap_bcf15_tidak_masuk',
                        '$lap_cacah_batal',
                        '$lap_cacah_lelang',
                        '$lap_ndkondirmasip2',
                        '$lap_setujubatalbcf15',
                        '$lap_suratmohonbatal',
                        '$lap_tap_kepBDN',
                        '$lap_tap_kepBMN',
                        '$lap_tot_bcf_to_bmn',
                        '$lap_tot_bdn_to_bmn',
                        '$lap_tap_kepmusnah',
                        '$lap_tot_bcf_musnah',
                        '$lap_tot_bdn_musnah',
                        '$lap_tot_bmn_musnah',
                        '$lap_tap_kepbtdklelang',
                        '$lap_tot_bcf_kepbtdklelang',
                        '$lap_kegiatan_pelaksanaanmusnah',
                        '$lap_kegiatan_lelang_btd',
                        '$lap_jumlah_lotlelang_btd',
                        '$lap_jumlah_lotlelanglaku_btd',
                        '$lap_jumlah_limit_lelang_btd',
                        '$lap_jumlah_hrgterbentuk_lelang_btd',
                        '$lap_kegiatan_lelang_bmn',
                        '$lap_jumlah_lotlelang_bmn',
                        '$lap_jumlah_lotlelanglaku_bmn',
                        '$lap_jumlah_limit_lelang_bmn',
                        '$lap_jumlah_hrgterbentuk_lelang_bmn',
                        '$lap_jumlah_peserta_lelang_btd',
                        '$lap_jumlah_peserta_lelang_bmn',
                        '$lap_pembatalan_bdn',
                        '$lap_pembatalan_bmn'
                        )");}
                        
            
                        
              if ($input){
		echo "Input berhasil";
                
                
                echo '<script type="text/javascript">window.location="index.php?hal=lap_kinerja"</script>';
                
	}
        else
        {
            echo "input gagal";
        }
        }; // if(kondisi) {hasil};
         
?>
      
</body>
</html>
<?php

};
?>