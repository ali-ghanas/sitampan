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
    
       
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script> 
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#editnhp").submit(function() {
                 if ($.trim($("#nhp").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Nomor NHP tidak boleh kosong");
                    $("#nhp").focus();
                    return false;  
                 }
                 
                 
              });      
           });
        </script> 
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
       
    </head>
    <body>
        
          

<?php // aksi untuk edit
session_start();


if(isset($_POST['editsubmit3'])) // jika tombol editsubmit ditekan
	{
                $tahun= $_POST['tahun']; 
		$txtnobcf15 = $_POST['txtbcf15no']; 
                $nhp=$_POST['nhp'];
                $tglnhp=$_POST['tglnhp'];
                $cmbpetugas=$_POST['cmbpetugas'];
                $check_btd=$_POST['check_btd'];
                $id = $_POST['id'];
                $tglkini=date('Y-m-d');
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
							NHPLelangNo='$nhp',
							NHPLelangDate='$tglnhp',
                                                        konsep_skepbtd='$check_btd',
							idpemeriksa_tpp='$cmbpetugas'
							
                                                        	WHERE idbcf15='$id'");
                mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('Edit NHP no $nhp','$tglkini','$txtnobcf15','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
                
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=editnhp_brg&id=$id'</script>";
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        ?>

	
        <form method="post" id="editnhp" name="editnhp" action="?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=editnhp_brg">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo  $bcf15['tahun']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="3">
                
               
                <tr>
                    <td width="150" class="judulform">BCF 1.5</td><td width="5">:</td><td><?php echo $bcf15['bcf15no']; ?> Tanggal <?php echo tglindo($bcf15['bcf15tgl']); ?></td>
                        
                </tr>
                <tr>
                    <td width="150" class="judulform">BC 1.1</td><td width="5">:</td><td><?php echo $bcf15['bc11no']; ?> Tanggal <?php echo tglindo($bcf15['bc11tgl']); ?> Pos :<?php echo tglindo($bcf15['bc11pos']); ?> Sub Pos : <?php echo tglindo($bcf15['bc11subpos']); ?></td>
                        
                </tr>
                <tr>
                    <td width="150" class="judulform">TPP</td><td width="5">:</td><td><?php echo $bcf15['nm_tpp']; ?></td>
                        
                </tr>
                <tr>
                    <td width="150" class="judulform">Consignee</td><td width="5">:</td><td><?php if($bcf15['consignee']=='To Order') { echo $bcf15['notify']; } elseif($bcf15['consignee']=='ToOrder') { echo $bcf15['notify']; } elseif($bcf15['consignee']=='toorder') { echo $bcf15['notify']; } elseif($bcf15['consignee']=='to order') { echo $bcf15['notify']; } elseif($bcf15['consignee']=='to the order') { echo $bcf15['notify']; } elseif($bcf15['consignee']=='To The Order') { echo $bcf15['notify']; } else {echo $bcf15['consignee'];}  ?></td>
                        
                </tr>
                <tr>
                    <td width="150" class="judulform">No NHP</td><td width="5">:</td><td><input type="text" name="nhp" class="required" id="nhp" value="<?php  echo $bcf15['NHPLelangNo'] ?>" /> / <input type="text" name="tglnhp"  class="required" id="tglnhp" value="<?php  echo $bcf15['NHPLelangDate'] ?>" /></td>
                        
                </tr>
                <tr>
                    <td width="150" class="judulform">Petugas Pencacahan</td><td width="5">:</td>
                    <td>
                        <select class="required" id="cmbpetugas" name="cmbpetugas">
                                    <option value="" selected>--Pilih Pemeriksa TPP--</option>
                                            <?php
                                                $sql = "SELECT * FROM pemeriksa_tpp ORDER BY idpemeriksa_tpp";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idpemeriksa_tpp]==$bcf15[idpemeriksa_tpp]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idpemeriksa_tpp]' $cek>$data[nm_pemeriksa]</option>";
                                                }
                                                ?>
                                    </select>
                    </td>
                        
                </tr>
                <tr>
                        <td class="isitabel" >Konsep Kep BTD</td><td class="isitabel" width="5">:</td>
                        <td class="isitabel"><input type="checkbox" name="check_btd" id="check_btd" class="required" value="1" <?php  if($bcf15['konsep_skepbtd'] == 1){echo 'checked="checked"';}?> /> Ya  </td>
                </tr>
                <tr>
                    <td colspan="4"><a href="?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=nhp_brg_edit&id=<?php echo $bcf15['idbcf15']; ?>">Tambah Uraian Barang</a></td>
                </tr>
            <tr>
                <td colspan="4">
                    
                        <table cellspacing="2" cellpadding="3" width="100%">
                            <tr>
                                
                                <td class="judultabel" width="20%">Jumlah</td>
                                <td class="judultabel" width="50%">Uraian Barang</td>
                                <td class="judultabel" width="20">Kondisi</td>
                                <td class="judultabel" width="20">Negara</td>
                                <td class="judultabel" width="20">Edit</td>
                                <td class="judultabel" width="20">Delete</td>

                            </tr>
                                <?php
                                    $rowset = mysql_query("select * from nhp where idbcf15=$id");
                                     while($bcfcont = mysql_fetch_array($rowset)){

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
                            <tr>
                                
                                <td class="isitabel"><?php echo $bcfcont['jumlah'];?></td>
                                <td class="isitabel" width="25%"><?php echo $bcfcont['jenisbrg'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['kondisi'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['negaraasal'];?></td>
                                <td class="isitabel" align="center"><?php echo "<a href='?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=editbrg&id=$bcfcont[idnhp]'  title='Edit Barang'><img src=images/new/update.png /></a> ";  ?> </td>
                                <td class="isitabel" align="center"><?php echo "<a href='?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=delbrg&id=$bcfcont[idnhp]' onclick=\"javascript:return confirm('Anda Yakin Untuk Menghapus $bcfcont[jumlah] $bcfcont[jenisbrg] ?')\" title='Hapus Uraian Barang' ><img src=images/new/delete.png  /></a> ";  ?> </td>
                                
                            </tr>
                            <?php };?>
                        </table>
                </td>
            </tr> 
            <tr><td colspan="3"><input type="submit" name="editsubmit3" value="Simpan" class="button putih bigrounded " /></td></tr>

           
            </table>
        </form>
        
	<?php
//        if
//                    (strlen(bcf15no)<6){
//                    echo '<script type="text/javascript">
//                    alert("NIP harus diisi 6 digit");</script>';
//                }
        
        }; // penutup else
?>
      </div>
        </div>
</body>
</html>
<?php
};
?>