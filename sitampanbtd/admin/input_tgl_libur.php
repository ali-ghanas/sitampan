<?php
include "lib/koneksi.php";
include "lib/function.php";
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
  
     
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
       
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tgl_blokir").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#inputgllibur").submit(function() {
                 if ($.trim($("#tgl_blokir").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tanggal Tidak boleh kosong");
                    $("#tgl_blokir").focus();
                    return false;  
                 }
                  if ($.trim($("#ketlibur").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan libur hari besar apa?");
                    $("#ketlibur").focus();
                    return false;  
                 }
                if ($.trim($("#lamanya").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Berapa lama liburnya?");
                    $("#lamanya").focus();
                    return false;  
                 }
              });      
           });
        </script> 

</head>

<body>


	
        <form method="post" id="inputgllibur" name="inputgllibur" action="?hal=inputtgllibur">
        
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">TAMBAHKAN TANGGAL LIBUR NASIONAL</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8" width="50%">
                            
                            <tr>
                                <td  class="isitabelnew">Tanggal  </td><td width="3">:</td>
                                <td >
                                     <input class="required" id="tgl_blokir" name="tgl_libur" type="text"  value="<?php echo $_POST['tgl_libur']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  class="isitabelnew">Keterangan Libur  </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="ketlibur" name="ketlibur" type="text"   ><?php echo $_POST['ketlibur']; ?></textarea> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  class="isitabelnew">Lamanya Waktu libur(Hari) * </td><td width="3">:</td>
                                <td >
                                     <input class="required" id="lamanya" name="lamanya" type="text"  value="<?php echo $_POST['lamanya']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="3"><span>* ) diisikan dengan jumlah hari libur nasional, misalkan : libur nasional hari buruh nasional jatuh pada hari jumat maka cukup diisikan angka 1, jika libur puasa 3 hari maka diisikan 3 hari. Libur mencakup libur cuti bersama dan libur nasional, sabtu dan minggu tidak perlu dimasukkan.</span></td>
                            </tr>
                            
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
    
   
    
    <?php 


                $tgl_libur= $_POST['tgl_libur']; 
		$keterangan_libur = $_POST['ketlibur']; 
                $lamanya = $_POST['lamanya'];
                
                $nip_user=$_SESSION['nip_baru'];
                $user_input=$_SESSION['nm_lengkap'];
                $tglinput = date("Y-m-d H:i:s");
                


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM konfirmasi_p2_tgllibur where tgl_libur='$tgl_libur' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Tanggal ini sudah ada di data base, Periksa kembali.");</script>';
                    
                }
                
                                
                else
                {
		
		$input=mysql_query("INSERT INTO konfirmasi_p2_tgllibur(tgl_libur, keterangan_libur, lamanya,nip_user,user_input,tglinput)
		VALUES('$tgl_libur', '$keterangan_libur', '$lamanya','$nip_user','$user_input','$tglinput')");
                        
                }
                        
               
             if($input)   {
               echo '<script type="text/javascript">window.location="index.php?hal=inputtgllibur"</script>';
             }
             else {
                 echo "tidak dapat menyimpan";
             }
                
	}; // if(kondisi) {hasil};
         
?>
    <?php
                $sql = "SELECT * FROM konfirmasi_p2_tgllibur ";
                $query = mysql_query($sql);
                
    ?>
      <table class="data">
          <tr>
              <th class="isitabel">No</th>
              <th class="isitabel">Tanggal</th>
              <th class="isitabel">Keterangan</th>
              <th class="isitabel">Hapus</th>
              
          </tr>
          <?php
          $awal='1';
            while($data = mysql_fetch_array($query)){
               
                
            if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                    echo "<tr class=highlight1>";
                                    $j++;
                                    }
                    else
                                    {
                                    echo "<tr class=highlight2>";
                                    $j--;
                                    }

            ?>
            <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
            <td class="isitabel"><?php echo  $data['tgl_libur']; ?></td>
            <td class="isitabel"><?php echo  $data['keterangan_libur']; ?></td>
            <td align="center" class="isitabel"><a href="?hal=deltgllibur&id=<?php echo $data[idkonfirmasi_p2_tgllibur] ?>"><img src="images/new/delete.png" onclick="javascript:return confirm('Anda Yakin Hapus Data Penting ini? ?')"/></a></td>
            <tr/>
            <?php }; ?>
      </table>
</body>
</html>
<?php

};
?>
        
	