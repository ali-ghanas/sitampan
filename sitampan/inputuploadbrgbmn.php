<?php
include "../lib/koneksi.php";
include "../lib/function.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
elseif($_SESSION['level']=="tpp2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="tpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="seksitpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="p2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
else
{
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
       

        
        
</head>

<body>
    <h1>Upload Uraian Barang BMN dengan Excell</h1>
    
    <span>Upload BMN adalah modul upload BMN dari excell ke data base. Sebelum diupload harus di setting tabel excell nya terlebih dahulu.</span>
    <span>Adapun format tabel yang akan perlu disesuaikan adalah sebagai berikut :</span>
    <div class="bingkaicontoh"><table >
        <tr class="data">
            
            <td class="judultabel">Input</td>
            <td class="judultabel">Nomor</td>
            <td class="judultabel">Tanggal(YYYY-MM-DD)</td>
            <td class="judultabel">Jumlah</td>
            <td class="judultabel">Jenis</td>
            <td class="judultabel">Kondisi</td>
            <td class="judultabel">Kontainer</td>
            <td class="judultabel">Consignee</td>
            <td class="judultabel">TPP</td>
        </tr>
        <tr>
            
            <td class="isitabel">BCF</td>
            <td class="isitabel">001</td>
            <td class="isitabel">2012-01-03</td>
            <td class="isitabel">354 unit</td>
            <td class="isitabel">Kulkas Merek : Mistubishi dll</td>
            <td class="isitabel">Baik/Baru</td>
            <td class="isitabel">TGHU0929</td>
            <td class="isitabel">PT. KramaYudah</td>
            <td class="isitabel">Tripandu Pelita</td>
        </tr>
         <tr>
            
            <td class="isitabel">BCF</td>
            <td class="isitabel">001</td>
            <td class="isitabel">2012-01-03</td>
            <td class="isitabel">393 unit</td>
            <td class="isitabel">Personal effect</td>
            <td class="isitabel">Baik/Baru</td>
            <td class="isitabel">TGHU06879</td>
            <td class="isitabel">PT. KramaYudah</td>
            <td class="isitabel">Tripandu Pelita</td>
        </tr>
    </table></div>
    <p bgcolor="#333"><span >SETTING TABEL YANG AKAN DIUPLOAD SESUAI DENGAN TABEL DIATAS. KEMUDIAN KLIK BROWSE DAN PILIH FILE EXCELL YANG AKAN DIUPLOAD DAN KLIK TOMBOL IMPORT</span></p>
<form method="post" enctype="multipart/form-data" action="?hal=inputupload_brgbmn_proses">
<table border="0" width="80%">
    <?php
                $idbmn=$_GET['id'];
                
                $sqlbmn = "SELECT * FROM bmn where idbmn=$idbmn ";
                $querybmn = mysql_query($sqlbmn);
                $databmn=mysql_fetch_array($querybmn);
                
    ?>
    <input type="hidden" name="idbmn"  value="<?php echo $databmn['idbmn'] ?>"/>
    <tr class="isitabel">
        <td ><font size="5">No Kep BMN</font></td><td>:</td><td><font color="#333" size="5"><?php echo $databmn['nokepbm'];echo $databmn['kopbmn'] ?></font></td>
    </tr>
    <tr class="isitabel">
        <td ><font size="5">Tanggal</font></td><td>:</td><td><font color="#333" size="5"><?php echo tglindo($databmn[tglkepbmn]); ?></font></td>
    </tr>
                <tr>
                    <td class="judultabel">Silakan Pilih File Excel</td><td class="judultabel">:</td><td class="isitabel"><input id="userfile" class="required" name="userfile" type="file"  size="40"/>    <input class="button putih bigrounded " name="upload" type="submit" value="Import" /></td>
                </tr>
                <tr>
                    <td colspan="3" class="isitabel">Pastikan anda mengupload ke database adalah file excel 2003 kebawah. untuk tahun 2007 keatas tidak akan terbaca oleh aplikasi sebagai hasil inputan.</td>
                </tr>
</table>

</form>



</body>
</html>
<?php
};
?>