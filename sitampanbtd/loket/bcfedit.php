<?php
include "lib/koneksi.php";
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
    
       
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script> 
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
                 if ($.trim($("#nobc11").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No BC 1.1 tidak boleh kosong");
                    $("#nobc11").focus();
                    return false;  
                 }
                 if ($.trim($("#posbc11").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No Pos BC 1.1 tidak boleh kosong");
                    $("#posbc11").focus();
                    return false;  
                 }
                 if ($.trim($("#bl").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No Bill Of Loading tidak boleh kosong");
                    $("#bl").focus();
                    return false;  
                 }
                 if ($.trim($("#sarkut").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Nama Kapal tidak boleh kosong");
                    $("#sarkut").focus();
                    return false;  
                 }
                 if ($.trim($("#voy").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No Voy Kapal tidak boleh kosong");
                    $("#voy").focus();
                    return false;  
                 }
                 if ($.trim($("#jmlbrg").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Jumlah Barang tidak boleh kosong");
                    $("#jmlbrg").focus();
                    return false;  
                 }
                 var ekspresiRegular = new RegExp(/^\d+$/);
                 var nilai = $.trim($("#jmlbrg").val());
                 if (nilai == "" || !ekspresiRegular.test(nilai)) {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Jumlah Barang : Masukkan Hanya Angka saja");
                    $("#jmlbrg").focus();
                    return false;  
                 }
                 if ($.trim($("#satuanbrg").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Satuan Barang tidak boleh kosong");
                    $("#satuanbrg").focus();
                    return false;  
                 }
                 if ($.trim($("#uraianbrg").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Uraian Barang tidak boleh kosong");
                    $("#uraianbrg").focus();
                    return false;  
                 }

                 if ($.trim($("#consignee").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Nama Consignee perlu diisi");
                    $("#consignee").focus();
                    return false;  
                 }  
                 if ($.trim($("#alamatconsignee").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Alamat Consignee perlu diisi");
                    $("#alamatconsignee").focus();
                    return false;  
                 }   
                 if ($.trim($("#kotaconsignee").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?>Alamat Kota Consignee perlu diisi");
                    $("#kotaconsignee").focus();
                    return false;  
                 }  
                 if ($.trim($("#notify").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Nama Notify perlu diisi");
                    $("#notify").focus();
                    return false;  
                 }  
                 if ($.trim($("#alamatnotify").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Alamat Notify perlu diisi");
                    $("#alamatnotify").focus();
                    return false;  
                 }   
                 if ($.trim($("#kotanotify").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Alamat Kota Notify perlu diisi");
                    $("#kotanotify").focus();
                    return false;  
                 }
                 if ($("#cmbtps").val() == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Input TPS tuh");
                    $("#cmbtps").focus();
                    return false;  
                 }  
                 if ($("#cmbtpp").val() == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Pilih TPP tuh");
                    $("#cmbtpp").focus();
                    return false;  
                 }
                 if ($("#cmbfcl").val() == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Pilih Type kontainer tuh");
                    $("#cmbfcl").focus();
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
           $(document).ready(function(){
               $("#tanggal2").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
    
    </head>
    <body>
        
          
<legend><a >&#187; BCF 1.5 Edit</a></legend>

<?php // aksi untuk edit
session_start();


if(isset($_POST['editsubmit3'])) // jika tombol editsubmit ditekan
	{
                $tahun= $_POST['tahun']; 
		$txtnobcf15 = $_POST['txtbcf15no']; 
                $cmbkodemanifest = $_POST['cmbmanifest'];
                $txttglbcf15 = $_POST['txttglbcf15'];
                $txtbc11no = $_POST['txtbc11no'];
                $txtbc11tgl = $_POST['txttglbc11'];
                $txtbc11pos = $_POST['txtbc11pos'];
                $txtbc11subpos = $_POST['txtbc11subpos'];
                $txtbl = $_POST['txtbl'];
                $txttglbl = $_POST['txttglbl'];
                $txtsaranapengangkut = $_POST['txtsaranapengangkut'];
                $txtvoy = $_POST['txtvoy'];
                $txtamountbrg = $_POST['txtamountbrg'];
                $txtsatuanbrg = $_POST['txtsatuanbrg'];
                
                $txturaian_addslashes=addslashes($_POST['txturaian']);//menghilangkan tanda string
                $txturaian = $txturaian_addslashes;
                
                $txtconsignee_addslashes = addslashes($_POST['txtconsignee']);
                $txtconsignee = $txtconsignee_addslashes;
                
                $txtalamatconsignee_addslashes = addslashes($_POST['txtalamatconsignee']);
                $txtalamatconsignee = $txtalamatconsignee_addslashes;
                
                $txtkotaconsignee = $_POST['txtkotaconsignee'];
                
                $txtnotify_addslashes = addslashes($_POST['txtnotify']);
                $txtnotify = $txtnotify_addslashes;
                
                $txtalamatnotify_addslashes = addslashes($_POST['txtalamatnotify']);
                $txtalamatnotify = $txtalamatnotify_addslashes;
                
                $txtkotanotify = $_POST['txtkotanotify'];
                $cmbtps = $_POST['cmbtps'];
                $cmbtpp = $_POST['cmbtpp'];
                $cmbfcl = $_POST['cmbfcl'];
                $txtketerangan = $_POST['txtketerangan'];
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
                
                    echo '<script type="text/javascript">window.location="index.php?hal=loketpecahpos&act=1"</script>';
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        ?>

	
        <form method="post" id="bcf15edittpp2" name="bcf15edittpp2" action="?hal=loketeditbcf15">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo  $bcf15['tahun']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="3">
                
                <tr><td height="20" align="center" colspan="4" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>BCF 1.5</b></td></tr>
            <tr>
                <td  >No BCF 15  </td><td>:</td> 
                <td><input name="txtbcf15no" id="nobcf" class="required" type="text" value="<?php echo $bcf15['bcf15no']; ?>" size="8" maxlength="6"></input>
                <select class="required" id="cmbmanifest" name="cmbmanifest">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM manifest ORDER BY idmanifest";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idmanifest]==$bcf15[idmanifest]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idmanifest]' $cek>$data[kd_manifest]</option>";
                                }
                                ?>
                    </select> <?php echo $tahunkini; ?>
                </td>
                
            </tr>
            <tr>
                <td   >Tgl BCF 15 </td><td>:</td>
                <td><input class="required" id="tanggal" type="text" name="txttglbcf15" value="<?php echo $bcf15['bcf15tgl']; ?>" ></input></td>
            </tr>
            <tr>
                <td height="20" align="center" colspan="4" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
                <td >No BC 11  </td><td>:</td>
                <td ><input id="nobc11" class="required" name="txtbc11no" type="text" value="<?php echo $bcf15['bc11no']; ?>"></input></td>
            </tr>
            <tr>
                <td >Tanggal BC  </td><td>:</td>
                <td><input class="required" id="tanggal1" type="text" name="txttglbc11" value="<?php echo $bcf15['bc11tgl']; ?>"  ></input></td>
            </tr>
            
            <tr>
                <td  >Pos BC 11 </td><td>:</td>
                <td ><input id="posbc11" class="required" name="txtbc11pos" type="text" value="<?php echo $bcf15['bc11pos']; ?>" ></input></td></tr>
            <tr>
                <td >Sub Pos </td><td>:</td>
                <td><input class="required" name="txtbc11subpos" type="text" value="<?php echo $bcf15['bc11subpos']; ?>"></input></td></tr>
            </tr>
            <tr>
                <td >No BL </td><td>:</td>
                <td ><input id="bl" class="required" name="txtbl" type="text" value="<?php echo $bcf15['blno']; ?>" size="20"></input></td></tr>
            <tr>
                <td >Tanggal BL   </td><td>:</td>
                <td><input class="required" id="tanggal2" type="text" name="txttglbl" value="<?php echo $bcf15['bltgl']; ?>" ></input></td>
            </tr>
            <tr>
                <td  >Sarana Pengangkut </td><td>:</td>
                <td ><input id="sarkut" class="required" name="txtsaranapengangkut" size="20" type="text" value="<?php echo $bcf15['saranapengangkut']; ?>"></input>

              Voy  : <input id="voy" class="required" name="txtvoy" type="text" value="<?php echo $bcf15['voy']; ?>" size="8" maxlength="10"></input></td>

            </tr>
            <tr>
                <td  >Jumlah/satuan  </td><td>:</td>
                <td  colspan="2"><input id="jmlbrg" class="required" name="txtamountbrg" size="20" type="text" value="<?php echo $bcf15['amountbrg']; ?>" ></input>
                <input id="satuanbrg" class="required" name="txtsatuanbrg" type="text" value="<?php echo $bcf15['satuanbrg']; ?>" size="8" maxlength="10"></input></td>
            </tr>
            <tr>
                <td   >Uraian </td><td>:</td>
                <td   ><textarea cols="40" class="required" id="uraianbrg" name="txturaian" ><?php echo isset($bcf15['diskripsibrg']) ? $bcf15['diskripsibrg'] : '';?></textarea></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="4" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Consignee / Notify </b></td>
            </tr>
            <tr><td  align="right"  >Consignee</td><td>:</td><td  valign="top" colspan="2"><input  class="required" id="consignee" name="txtconsignee" size="50" type="text" value="<?php echo $bcf15['consignee']; ?>" ></input></td></tr>
             <tr><td></td><td>:</td><td colspan="4"><textarea cols="40" class="required" id="alamatconsignee" name="txtalamatconsignee" ><?php echo isset($bcf15['consigneeadrress']) ? $bcf15['consigneeadrress'] : '';?></textarea></td></tr>
             <tr><td></td><td>:</td><td colspan="4"><input class="required" id="kotaconsignee" name="txtkotaconsignee" type="text" value="<?php echo $bcf15['consigneekota']; ?>" size="10" ></input></td> </tr>
            <tr><td align="right">Notify </td><td>:</td><td colspan="3"><input class="required" id="notify" name="txtnotify" type="text" value="<?php echo $bcf15['notify']; ?>" size="30" ></input></td></tr>
            <tr><td></td><td>:</td><td colspan="4"><textarea cols="40" class="required" id="alamatnotify" name="txtalamatnotify" ><?php echo isset($bcf15['notifyadrress']) ? $bcf15['notifyadrress'] : '';?></textarea></td></tr>
            <tr><td></td><td>:</td><td colspan="4"><input class="required" id="kotanotify" name="txtkotanotify" type="text" value="<?php echo $bcf15['notifykota']; ?>" size="10" ></input></td> </tr>
            <tr>
                 <td height="20" align="center" colspan="4" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data TPS /TPP </b></td>
            </tr>
            <tr>
                <td >Eks TPS</td><td>:</td>
                <td colspan="4"><input class="required" id="cmbtps" name="cmbtps" type="text" value="<?php echo $bcf15['idtps']; ?>" />
                
                </td>
            </tr>
            <tr>
                <td >TPP</td><td>:</td>
                <td colspan="4"><select class="required" id="cmbtpp" name="cmbtpp">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idtpp]==$bcf15[idtpp]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                }
                                ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td >FCL / LCL </td><td>:</td>
                <td colspan="4"><select class="required" id="cmbfcl" name="cmbfcl">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM typecode ORDER BY idtypecode";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idtypecode]==$bcf15[idtypecode]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idtypecode]' $cek>$data[nm_type]</option>";
                                }
                                ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td >Keterangan </td><td>:</td>
                <td colspan="5"><input class="required" name="txtketerangan" type="text" value="<?php echo $bcf15['keterangan']; ?>" size="30" ></input></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="4" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Kontainer </b></td>
            </tr>
            <tr>
                <td colspan="4">
                    
                        <table cellspacing="2" cellpadding="3" width="50%">
                            <tr>
                                <td colspan="4">
                                    <a href="?hal=loketin_cont&id=<?php echo $bcf15['idbcf15']?>">Insert Container Baru</a>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="judultabel">No Container</td>
                                <td class="judultabel">Size</td>
                                <td class="judultabel">Edit</td>
                                <td class="judultabel">Delete</td>

                            </tr>
                                <?php
                                    $rowset = mysql_query("select * from bcfcontainer where idbcf15=$id");
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
                                
                                <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['idsize'];?></td>
                                <td class="isitabel" align="center"><?php echo "<a href='?hal=loketedit_cont&id=$bcfcont[idcontainer]' target='_new'>Edit</a> ";  ?> </td>
                                <td class="isitabel" align="center"><a href="?hal=loketdel_cont&id=<?php echo $bcfcont['idcontainer']?>" target="_self" onclick="javascript:return confirm('Anda Yakin Hapus COntainer <?php echo $bcfcont['nocontainer']?> ?')">Delete</a></td>
                                
                                
                            </tr>
                            <?php };?>
                        </table>
                </td>
            </tr> 
            <tr><td colspan="3"><input type="submit" name="editsubmit3" value="Save" class="button putih bigrounded " /></td></tr>

           
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