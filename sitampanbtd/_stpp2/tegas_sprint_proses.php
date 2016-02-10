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
    <title>Ubah BCF 15</title>
    <!--       jquery anytimes -->
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
         
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#bapenarikan").submit(function() {
                 if ($.trim($("#txtba").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> no BA tdk boleh kosong");
                    $("#txtba").focus();
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
		
                $sprint_bcf15no = $_POST['bcf15no'];
                $sprint_bcf15tgl = $_POST['bcf15tgl'];
                $sprint_tahun = $_POST['tahun'];
                $sprint_idtpp = $_POST['idtpp'];
                $sprint_idtps=$_POST['idtps'];
                $tgl_rekam=date('Y-m-d H:i:s');
                $user_nip=$_SESSION['nip_baru'];
                $user_nama=$_SESSION['nm_lengkap'];
                $user_ip=$_SERVER['REMOTE_ADDR'];
                $idseksitpp2=$_POST['idseksitpp2'];
                $alasan_dipaksakantarik=$_POST['alasan_dipaksakantarik'];
                $no_surat=$_POST['no_surat'];
                $tgl_surat=$_POST['tgl_surat'];                
                $id = $_POST['id'];
                 
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		mysql_query("INSERT INTO bcf15_suratperintah_tegas(
                        idbcf15,
                        sprint_bcf15no, 
                        sprint_bcf15tgl, 
                        sprint_tahun, 
                        sprint_idtpp, 
                        sprint_idtps,
                        tgl_rekam,
                        user_nip,
                        user_nama,
                        user_ip,
                        idseksitpp2,
                        alasan_dipaksakantarik,
                        no_surat,
                        tgl_surat
                        )
                        
		VALUES(
                        '$id',
                        '$sprint_bcf15no', 
                        '$sprint_bcf15tgl', 
                        '$sprint_tahun', 
                        '$sprint_idtpp', 
                        '$sprint_idtps',
                        '$tgl_rekam',
                        '$user_nip',
                        '$user_nama',
                        '$user_ip',
                        '$idseksitpp2',
                        '$alasan_dipaksakantarik',
                        '$no_surat',
                        '$tgl_surat'
                        
                        )");
                        
               
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagetpp2&pilih=tegassprintproses&id=$id'</script>";
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>
        
        <form method="post" id="sprint" name="sprint" action="?hal=pagetpp2&pilih=tegassprintproses">
        <input type="hidden" name="id" value="<?php echo  $data['idbcf15']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo $data['bcf15no']; ?>" />
        <input type="hidden" name="bcf15tgl" value="<?php echo $data['bcf15tgl']; ?>" />
        <input type="hidden" name="bc11no" value="<?php echo $data['bc11no']; ?>" />
        <input type="hidden" name="bc11tgl" value="<?php echo $data['bc11tgl']; ?>" />
        <input type="hidden" name="bc11pos" value="<?php echo $data['bc11pos']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo $data['tahun']; ?>" />
        <input type="hidden" name="idtps" value="<?php echo $data['idtps']; ?>" />
        <input type="hidden" name="idtpp" value="<?php echo $data['idtpp']; ?>" />
            <table width="100%" border="0" >
                <tr valign="top">
                    <td bgcolor="#a1c4e8" width="50%" class="isitabel">
                        <table  class="isitabel" width="100%">
                            <tr >
                                <td colspan="3" bgcolor="#15191e" >
                                <font color="#FFF">Input Surat Penegasan Penarikan BCF 1.5</fonT>
                                </td>
                            </tr>
                            <tr class="judulform">
                                <td>No Surat</td><td>:</td><td><input type="text" name="no_surat" value="<?php echo $data[''] ?>"/></td>
                            </tr>
                            <tr class="judulform">
                                <td>Tanggal</td><td>:</td><td><input type="text" id="tanggal" name="tgl_surat" value="<?php echo $data[''] ?>"/></td>
                            </tr>
                            <tr class="judulform">
                                <td>Seksi Penanda Tangan</td><td>:</td><td>
                                    <select  id="idseksitpp2" name="idseksitpp2" >
                                    <option value="" selected>--Pilih Penandatangan--</option>
                                            <?php
                                                $sql = "SELECT * FROM seksi where (kdseksi='tpp3' or kdseksi='tpp2') and status_seksi='aktif' ORDER BY idseksi";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data1 =mysql_fetch_array($qry)) {
                                                        if ($data1[idseksi]==$data[idseksitpp2]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data1[idseksi]' $cek>$data1[plh] $data1[nm_seksi] $data1[bidang]</option>";
                                                }
                                                ?>
                                    </select> 
                                </td>
                            </tr>
                            <tr class="judulform">
                                <td>Keterangan </td><td>:</td><td>
                                    <textarea cols="30" rows="3" name="alasan_dipaksakantarik"><?php echo $data[''] ?></textarea>
                                </td>
                            </tr>
                            <tr class="judulform">
                                <td colspan="4"><font color="red" size="3"><b><?php echo $data['nm_tpp']; ?></b></font></td>
                            </tr>
                            <?php 
                             // menangkap id
                            $sql = "select * FROM bcf15_suratperintah_tegas WHERE  idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                            $query = mysql_query($sql);
                            $datasprint = mysql_fetch_array($query);
                            $cek=mysql_numrows($query);
                            if($cek>0){
                            
                            echo "<tr class=judulform >";
                            echo "<td colspan=3 bgcolor='#15191e' ><font color=#fff>BCF 1.5 ini telah diperintahkan untuk ditarik sesuai dengan Sprint terdahulu.</font></td>";
                            echo "</tr>";
                            echo "<tr class=judulform>";
                            echo "<td>No Surat</td><td>:</td><td>$datasprint[no_surat]</td>";
                            echo "</tr>";
                            echo "<tr class=judulform>";
                            echo "<td>Tanggal</td><td>:</td><td>$datasprint[tgl_surat]</td>";
                            echo "</tr>";
                            echo "<tr class=judulform>";
                            echo "<td>Ket</td><td>:</td><td>$datasprint[alasan_dipaksakantarik]</td>";
                            echo "</tr>";
                            echo "<tr class=judulform >";
                            echo "<td colspan=3 bgcolor='#15191e' ><img src=images/new/printer.png /><a href=report/doc/suratpenegasansprint.php?id=$data[idbcf15]>Cetak</a></td>";
                            echo "</tr>";
                            }
                            else {
                                echo "<tr><td><input title='Simpan BA Penarikan BCF 15' class='button putih bigrounded' type='submit' name='editsubmit4' value='Simpan' /></td></tr>";
                            }
                             ?>
                            
                        </table>
                    </td>
                    <td bgcolor="#a1c4e8" width="50%" class="isitabel">
                        <table class="isitabel" width="100%">
                            <tr >
                                <td colspan="3" bgcolor="#15191e" >
                                <font color="#FFF">Query BCF 1.5</fonT>
                                </td>
                            </tr>
                            <tr class="judulform">
                                <td>BCF 1.5</td><td>:</td><td><input disabled type="text" name="bcf15no" value="<?php echo $data['bcf15no'] ?>"/> / <input disabled type="text" name="bcf15tgl" value="<?php echo $data['bcf15tgl'] ?>"/></td>
                            </tr>
                            <tr class="judulform">
                                <td>BC 1.1</td><td>:</td><td><input disabled type="text" name="bc11no" value="<?php echo $data['bc11no'] ?>"/> / <input disabled type="text" name="bc11tgl" value="<?php echo $data['bc11tgl'] ?>"/></td>
                            </tr>
                            <tr class="judulform">
                                <td>TPS</td><td>:</td><td><input disabled type="text" name="" value="<?php echo $data['idtps'] ?>"/> </td>
                            </tr>
                            <tr class="judulform">
                                <td>No Surat Perintah</td><td>:</td><td><input disabled type="text" name="" value="<?php echo $data['suratperintahno'] ?>"/> / <input disabled type="text" name="" value="<?php echo $data['suratperintahdate'] ?>"/></td>
                            </tr>
                            <tr class="judulform">
                                <td>No Ba Penarikan</td><td>:</td><td><input disabled type="text" name="bamasukno" value="<?php echo $data['bamasukno'] ?>"/> / <input disabled type="text" name="bamasukdate" value="<?php echo $data['bamasukdate'] ?>"/> </td>
                            </tr>
                            <tr class="judulform">
                                <td>Batal Tarik</td><td>:</td><td><input disabled type="text" name="BatalTarikNo" value="<?php echo $data['BatalTarikNo'] ?>"/> / <input disabled type="text" name="BatalTarikDate" value="<?php echo $data['BatalTarikDate'] ?>"/> </td>
                            </tr>
                            <tr class="judulform">
                                <td>Ket Tidak ditarik</td><td>:</td><td><textarea cols="40" rows="3" disabled type="text" name="BatalTarikKet" ><?php echo $data['BatalTarikKet'] ?></textarea> </td>
                            </tr>
                            
                        </table>
                    </td>
                    
                    
                </tr>
                
                
              
               
            
            <tr><td colspan="2"></td></tr>
            
            </table>
        </form>

        
        
        
	<?php
            

                    }; // penutup else
            ?>
      
             


</body>
</html>
<?php
};
?>