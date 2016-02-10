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
<html>
    <head>
    <title>Input Surat Pemberitahuan Balik Pos</title>
        
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#sptahu").submit(function() {
                 if ($.trim($("#kembali_pilihan").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Pilih Salah Satu Pilihan Kembali");
                    $("#kembali_pilihan").focus();
                    return false;  
                 }
                  if ($.trim($("#alasan_kembali").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Masukan uraian kembali dari POS ");
                    $("#alasan_kembali").focus();
                    return false;  
                 }
                 if ($.trim($("#tanggal1").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Masukan Tgl Kembali Ke Penimbunan ");
                    $("#tanggal1").focus();
                    return false;  
                 }
                
                 
              });      
           });
        </script> 
    
    </head>
    <body>
       
	     <?php // aksi untuk edit
            session_start();


            if(isset($_POST['editsubmit4'])) // jika tombol editsubmit ditekan
                    { 
                            

                            
                            
                            $bcf15no = $_POST['bcf15no'];
                            $bcf15tgl = $_POST['bcf15tgl'];
                            $nosuratpemberitahuan = $_POST['nosuratpemberitahuan'];
                            $tglsuratpemberitahuan = $_POST['tglsuratpemberitahuan'];
                            $kembali_pilihan = $_POST['kembali_pilihan'];
                            $tgl_kembali = $_POST['tgl_kembali'];
                            $alasan_kembali = $_POST['alasan_kembali'];
                            $nm_user=$_SESSION['nm_lengkap'];
                            $nip_user=$_SESSION['nip_baru'];
                            $tgl_rekam_kembali=date('Y-m-d H:i:s');
                            $idbcf15 = $_POST['idbcf15'];

                            $sql = "SELECT * FROM bcf15_sp_balikpos where idbcf15='$idbcf15'";
                                 $query = mysql_query($sql);
                                 $cek=mysql_numrows($query);
                                if($cek>0){
                                                $edit = mysql_query("UPDATE bcf15_sp_balikpos SET
                                                                    idbcf15='$idbcf15',
                                                                    bcf15no='$bcf15no',										
                                                                    bcf15tgl='$bcf15tgl',
                                                                    nosuratpemberitahuan='$nosuratpemberitahuan',
                                                                    tglsuratpemberitahuan='$tglsuratpemberitahuan',
                                                                    kembali_pilihan='$kembali_pilihan',
                                                                    tgl_kembali='$tgl_kembali',
                                                                    alasan_kembali='$alasan_kembali',
                                                                    tgl_rekam_kembali='$tgl_rekam_kembali',
                                                                    nm_user='$nm_user',
                                                                    nip_user='$nip_user'
                                                        
                                                                            WHERE idbcf15='$idbcf15'");
                            }
                            else{
                                
                            }

                            mysql_query("INSERT INTO bcf15_sp_balikpos(
                                    idbcf15,
                                    bcf15no,
                                    bcf15tgl,
                                    nosuratpemberitahuan,
                                    tglsuratpemberitahuan,
                                    kembali_pilihan,
                                    tgl_kembali,
                                    alasan_kembali,
                                    tgl_rekam_kembali,
                                    nm_user,
                                    nip_user
                                    
                                    )VALUES(
                                    '$idbcf15',
                                    '$bcf15no',
                                    '$bcf15tgl',
                                    '$nosuratpemberitahuan',
                                    '$tglsuratpemberitahuan',
                                    '$kembali_pilihan',
                                    '$tgl_kembali',
                                    '$alasan_kembali',
                                    '$tgl_rekam_kembali',
                                    '$nm_user',
                                    '$nip_user'
                                    
                                  
                                    )");
                                echo '<script type="text/javascript">window.location="index.php?hal=suratpemberitahuan"</script>';
                                    
                    }
                    else 
                    { 
                    $id = $_GET['id']; // menangkap id
                    $sql = "select * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $tahunkini=date('Y');

                    ?>
        <div class="span12" >
        <div style="background-color: #75C9EA;color:#fff;border:1px">
                 <h1>Rekam Surat Pemberitahuan Yang Balik Dari Pos</h1>
       </div> 
        <div>
                    <form method="post" id="sptahu" name="sptahu" action="?hal=sptahu_balik_rek">
                    <input type="hidden" name="idbcf15" value="<?php echo  $bcf15['idbcf15']; ?>" />
                    <input type="hidden" name="bcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
                    <input type="hidden" name="bcf15tgl" value="<?php echo $bcf15['bcf15tgl']; ?>" />
                    <input type="hidden" name="nosuratpemberitahuan" value="<?php echo $bcf15['suratno']; ?>" />
                    <input type="hidden" name="tglsuratpemberitahuan" value="<?php echo $bcf15['suratdate']; ?>" />
                        <table width="100%" border="0" align="left" cellpadding="3" cellspacing="6">
                            <tr align="center"><td height="22" colspan="3" bgcolor="#84B9D5" class="HEAD"><b>Surat Pemberitahuan BCF 1.5</b> </td></tr>
                            <tr>
                                <td>BCF 1.5</td><td>:</td>
                                <td><?php echo $bcf15['bcf15no'] ?> /  <?php echo tglindo($bcf15['bcf15tgl']) ?></td>
                            </tr>
                            <tr>
                                <td>BC  1.1</td><td>:</td>
                                <td><?php echo $bcf15['bc11no'] ?> /  <?php echo tglindo($bcf15['bc11tgl']) ?></td>
                            </tr>
                            <tr>
                                <td>Pos / Sub</td><td>:</td>
                                <td><?php echo $bcf15['bc11pos'] ?> /  <?php echo $bcf15['bc11subpos'] ?></td>
                            </tr>
                            <tr>
                                <td>Surat Pemberitahuan</td><td>:</td>
                                <td><b><?php echo $bcf15['suratno'] ?> /  <?php echo tglindo($bcf15['suratdate']) ?></b></td>
                            </tr>
                            <tr>
                               <td>Alasan Kembali</td><td>:</td>
                               <td>
                                   <select name="kembali_pilihan" type="text" id="kembali_pilihan" value="" >
                                       <option value="">::Pilih::</option>
                                       <option value="Alamat Tidak Ditemukan">Alamat Tidak Dikenal</option>
                                       <option value="Pindah Lokasi">Pindah Lokasi</option>
                                       <option value="Ditolak">Pemilik Rumah Tidak Menerima</option>
                                       <option value="ALamat Tidak Lengkap">Alamat Tidak Lengkap</option>
                                       <option value="Tidak Diambil">Tidak Diambil</option>
                                   </select>
                               
                               </td>
                            </tr>
                            <tr>
                                <td>Uraian Kembali</td><td>:</td>
                                <td><textarea cols="30" rows="5" name="alasan_kembali" type="text" id="alasan_kembali" value="" ></textarea></td>
                            </tr>
                            <tr>
                                <td>Tanggal Balik Ke Penimbunan</td><td>:</td>
                                <td><input name="tgl_kembali" type="text" id="tanggal1" value="" />(YYYY-MM-DD)</td>
                            </tr>
                            
                            
                            
                        <tr align="center"><td height="22" colspan="3" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
                        <tr><td><input class="button putih bigrounded " type="submit" name="editsubmit4" value="Rekam" /></td></tr>

                        </table>
                    </form>



                    <script type="text/javascript">new Validation('bcfedit',{useTitles : true},{stopOnFirst:true}, {immediate : true});</script>
                    <?php
                         

                                }; // penutup else
                        ?>
      
            
        </div>
        </div>
</body>
</html>
<?php
};
?>