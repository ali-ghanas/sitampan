<?php
include "lib/koneksi.php";
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

    <script type="text/javascript" 
        src="lib/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {    
      $("#tombol").click(function() {
         $.ajax( { 
            url: "index.php?hal=pageadmin_data_perhari&pilih=importdatabcf15hariini",  
            timeout: 3000,
            beforeSend:   function() {
               $("#info").html("<img src='images/indicator.gif' />")
            },
            success:   function(data) {
               $("#info").text("Server sudah membalas");
            },
            error:   function(xhr, teksStatus, kesalahan) {
               $("#info").text("Kesalahan permintaan halaman: " + 
                               kesalahan);
            }
         });
      });
   });
</script> 
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
<!--<button id="tombol">Proses</button>-->
<div id="info">
    <form method="post" enctype="multipart/form-data" name="upload" id="upload" action="?hal=pageadmin_data_perhari&pilih=importdatabcf15hariiniproses">
            <table border="1" width="80%">
                <tr>
                    <td class="judultabel">Silakan Pilih File Excel</td><td class="judultabel">:</td><td class="isitabel"><input id="userfile" class="required" name="userfile" type="file"  size="40"/>    <input class="button putih bigrounded " name="upload" id="tombol" type="submit" value="Import" /></td>
                </tr>
                <tr>
                    <td colspan="3" class="isitabel">Pastikan anda mengupload ke database adalah file excel 2003 kebawah. untuk tahun 2007 keatas tidak akan terbaca oleh aplikasi sebagai hasil inputan.</td>
                </tr>
            </table>
        
        
        </form>
</div>
</body>
</html>


<?php
};
?>