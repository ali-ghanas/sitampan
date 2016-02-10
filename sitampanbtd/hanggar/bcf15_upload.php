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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
       
<script type="text/javascript">
           $(document).ready(function() {    
              $("#upload").submit(function() {
                 if ($.trim($("#userfile").val()) == "") {
                    alert("File Belum anda pilih..");
                    $("#userfile").focus();
                    return false;  
                 }
                 
                 
                 
                 });      
           });
        </script>
        
        
</head>

<body>
    <div class="span12" >
        <h3>STEP 1: Upload BCF 1.5 Yang Masuk TPP</h3>  
        <div style="background-color: #75C9EA;color:#fff;border:1px">
                 <div style="background-color: #75C9EA;color:#fff;border:1px"><h3>Silahkan upload penarikan BCF 1.5</h3></div>
       </div>      

    <div>
        
    <span style="color:#AA9999;">Upload BCF yang Masuk TPP adalah modul upload dan Update atas BCF 1.5 yang Masuk TPP pada hanggar TPP
    <br/> Sebelum melakukan upload ada beberapa hal yang perlu diperhatikan dan cara mengupload file:
    <ol>
        <li>Upload hanya menggunakan excell 2003 ke bawah</li>
        <li>Dowload data excellnya dari APlikasi Penghubung di www.tpppriok.net</li>
        <li>Pastikan hasil download memiliki settingan excell seperti ini <a href="report/export/excell_contohpecahpos.xls">Klik Ini</a></li>
        <li>Administrasikan File Excell ke Folder ....</li>
        <li>Pilih File Excell kemudian di Upload</li>
        <li>Jika Mengalami kendala hubungi admin</li>
    </ol>
    </span>
    
    
     
        <form method="post" enctype="multipart/form-data" name="upload" id="upload" action="?hal=upload_hgr_proses">
            <table border="0" width="80%">
                <tr>
                    <td class="judultabel">Silakan Pilih File Excel</td><td class="judultabel">:</td><td class="isitabel"><input id="userfile" class="required" name="userfile" type="file"  size="40"/>    <input class="button putih bigrounded " name="upload" type="submit" value="Import" /></td>
                </tr>
                <tr>
                    <td colspan="3" class="isitabel" style="color: #AA9999;">Pastikan anda mengupload ke database adalah file excel 2003 kebawah. untuk tahun 2007 keatas tidak akan terbaca oleh aplikasi sebagai hasil inputan.</td>
                </tr>
            </table>
        
        
        </form>
        <img src="images/icon/png-1677.png"  width="50"/><a href="?hal=upload_cont">Upload Container Masuk</a>
    </div>
    </div>
</body>
</html>

<?php
};
?>