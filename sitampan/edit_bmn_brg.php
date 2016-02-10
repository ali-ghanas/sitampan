<?php
include "../lib/koneksi.php";
include "../lib/function.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
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
<html>
    <head>
    <title>Ubah BCF 15</title>
    
       <script src="../lib/js/jquery-1.5.1.js"></script>
       <script type="text/javascript" src="../lib/js/jquery.maskedinput-1.3.min.js"></script>
       <script type="text/javascript" src="../lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script> 
       <link rel="stylesheet" type="text/css" href="../lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />
        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
              
               $('#tglkepbmn').mask('99/99/9999');
           });
         </script>  
       
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#bcfedit").submit(function() {
                 if ($.trim($("#nobcf").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No BCF 1.5 tidak boleh kosong");
                    $("#nobcf").focus();
                    return false;  
                 }
                 if ($("#cmbmanifest").val() == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Pilih Kode Manifest");
                    $("#cmbmanifest").focus();
                    return false;  
                 }  
                 
                 
              });      
           });
        </script> 
        
    
    </head>
    <body>
        
          
<legend><a >&#187; KEP BMN Edit</a></legend>

<?php // aksi untuk edit
session_start();


if(isset($_POST['editsubmit3'])) // jika tombol editsubmit ditekan
	{
                $tahun= $_POST['tahun']; 
		$txtnobcf15 = $_POST['txtbcf15no']; 
                $cmbkodemanifest = $_POST['cmbmanifest'];
                $txttglbcf15 = $_POST['txttglbcf15'];
                $txtbc11no = $_POST['txtbc11no'];
                
                $id = $_POST['id'];
                $tglkini=date('Y-m-d');
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
							bcf15no='$txtnobcf15',
							idmanifest='$cmbkodemanifest',
							bcf15tgl='$txttglbcf15',
							bc11no='$txtbc11no',
                                                        bc11tgl='$txtbc11tgl',
                                                        bc11pos='$txtbc11pos',
                                                        bc11subpos='$txtbc11subpos', 
                                                        blno='$txtbl',
                                                        bltgl='$txttglbl',
                                                        saranapengangkut='$txtsaranapengangkut',
                                                        voy='$txtvoy',
                                                        amountbrg='$txtamountbrg',
                                                        satuanbrg='$txtsatuanbrg',
                                                        diskripsibrg='$txturaian',
                                                        consignee='$txtconsignee',
                                                        consigneeadrress='$txtalamatconsignee',
                                                        consigneekota='$txtkotaconsignee',
                                                        notify='$txtnotify',
                                                        notifyadrress='$txtalamatnotify',
                                                        notifykota='$txtkotanotify',
                                                        idtps='$cmbtps',
                                                        idtpp='$cmbtpp',
                                                        idtypecode='$cmbfcl',
                                                        keterangan='$txtketerangan'
                                                        	WHERE idbcf15='$id'");
                mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('Edit BCF 1.5','$tglkini','$txtnobcf15','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
                
                    echo '<script type="text/javascript">window.location="index.php?hal=suratperintah&act=1"</script>';
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT idbcf15,bcf15no,bcf15tgl,consignee,notify,bcf15.idtpp,tpp.idtpp,nm_tpp from bcf15,tpp where bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        $idbcf15=$bcf15['idbcf15'];
        
        ?>

<div >
        <form method="post" id="editbmn" name="editbmn" action="?hal=edit_bmn">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo  $bcf15['tahun']; ?>" />
        
            <table class="data isitabel" width="100%" border="0" align="center" >
                
                <tr><td height="20" align="center" colspan="4" bgcolor="#dfe9ff">&nbsp;&nbsp;<h3><b>Uraian Barang dalam Kep BMN</b></h3></td></tr>
            <tr>
                <td  >No BCF 1.5  </td><td>:</td> 
                <td><input name="nokepbm" id="nokepbm" class="required" type="text" value="<?php echo $bcf15['bcf15no']; ?>" /> Tgl  <input class="required" id="tglkepbmn" type="text" name="tglkepbmn" value="<?php echo view($bcf15['bcf15tgl']); ?>" /> 
                
                </td>
                
            </tr>
            <tr>
                <td   >Consignee </td><td>:</td>
                <td><input class="required" id="consignee" type="text" name="consignee" value="<?php echo $bcf15['consignee']; ?>" /></td>
            </tr>
            <tr>
                <td   >Notify </td><td>:</td>
                <td><input class="required" id="notify" type="text" name="notify" value="<?php echo $bcf15['notify']; ?>" /></td>
            </tr>
            
            <tr>
                 <td height="20" align="center" colspan="4" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Uraian Barang </b></td>
            </tr>
            <tr>
                <td colspan="4">
                    
                        <table class="data isitabel" cellspacing="2" cellpadding="3" border="0" width="80%">
                            <tr>
                                <td colspan="4">
                                    <a href="?hal=pagetpp2&pilih=insert_cont&id=<?php echo $bcf15['idbcf15']?>">Tambah BCF 1.5 Ke dalam KEP BMN</a>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="judultabel">Jumlah</td>
                                <td class="judultabel">Jenis</td>
                                <td class="judultabel">Kondisi</td>
                                <td class="judultabel">Container</td>
                                <td class="judultabel">Edit</td>
                                <td class="judultabel">Delete</td>

                            </tr>
                                <?php
                                    $rowset = mysql_query("select * from bmn_brg where  idbcf15=$idbcf15");
                                     while($bcfcont = mysql_fetch_array($rowset)){

                                         if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                echo "<tr class=tabs1>";
                                $j++;
                                }
                else
                                {
                                echo "<tr class=tabs2>";
                                $j--;
                                }


                                ?>
                            
                                
                                <td class="isitabel"><?php echo $bcfcont['jml_brg'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['jns_brg'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['kondisi_brg'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['container_lcl'];?></td>
                                <td class="isitabel" align="center"><?php echo "<a href='?hal=editcon&id=$bcfcont[idcontainer]' target='_new'>Uraian Brg</a> ";  ?> </td>
                                <td class="isitabel" align="center"><a href="?hal=delcon&id=<?php echo $bcfcont['idcontainer']?>" target=self onclick="javascript:return confirm('Anda Yakin Hapus COntainer <?php echo $bcfcont['nocontainer']?> ?')">Delete</a></td>
                                
                                
                            </tr>
                            <?php };?>
                        </table>
                </td>
            </tr> 
            <tr><td colspan="3"><input type="submit" name="editsubmit3" value="Save" class="button putih bigrounded " /></td></tr>

           
            </table>
        </form>
</div>
	<?php
//        if
//                    (strlen(bcf15no)<6){
//                    echo '<script type="text/javascript">
//                    alert("NIP harus diisi 6 digit");</script>';
//                }
        
        }; // penutup else
?>
      
</body>
</html>
<?php
};
?>