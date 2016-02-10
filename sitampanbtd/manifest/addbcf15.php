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
 elseif($_SESSION['level']=="loket") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
else
{
  
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
        <script type="text/javascript" src="lib/js/ui/jquery-ui.js"></script>
        
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
        <script type="text/javascript">
			$(document).ready(function(){
				$("#sarkut").autocomplete({
					minLength:2,
					source:'manifest/addbcf15_kapal_sourceautocomp.php',
					select:function(event, ui){
						$('#nm_kapal').html(ui.item.nama);
					}
				});
			});
		</script>
                <script type="text/javascript">
			$(document).ready(function(){
				$("#voy").autocomplete({
					minLength:2,
					source:'manifest/addbcf15_kapalvoy_sourceautocomp.php',
					select:function(event, ui){
						$('#voy').html(ui.item.nama);
					}
				});
			});
		</script>
                 <script type="text/javascript">
			$(document).ready(function(){
				$("#satuanbrg").autocomplete({
					minLength:2,
					source:'manifest/addbcf15_kemasan_sourceautocomp.php',
					select:function(event, ui){
						$('#satuanbrg').html(ui.item.nama);
					}
				});
			});
		</script>
                <script type="text/javascript">
			$(document).ready(function(){
				$("#cmbtps").autocomplete({
					minLength:2,
					source:'manifest/addbcf15_tps_sourceautocomp.php',
					select:function(event, ui){
						$('#cmbtps').html(ui.item.nama);
					}
				});
			});
		</script>
                <script type="text/javascript">
			$(document).ready(function(){
				$("#consignee").autocomplete({
					minLength:2,
					source:'manifest/addbcf15_con_noty_sourceautocomp.php',
					select:function(event, ui){
						$('#consignee').html(ui.item.nama);
					}
				});
			});
		</script>
                <script type="text/javascript">
			$(document).ready(function(){
				$("#notify").autocomplete({
					minLength:2,
					source:'manifest/addbcf15_con_noty_sourceautocomp.php',
					select:function(event, ui){
						$('#notify').html(ui.item.nama);
					}
				});
			});
		</script>
        <script>
 
        /*autocomplete muncul setelah user mengetikan minimal2 karakter */
            $(function() {  
                $( "#sarkut" ).autocomplete({
                 source: "manifest/addbcf15_kapal_sourceautocomp.php",  
                   minLength:2
                });
            });
    </script>
    <script>
 
        /*autocomplete muncul setelah user mengetikan minimal2 karakter */
            $(function() {  
                $( "#voy" ).autocomplete({
                 source: "manifest/addbcf15_kapalvoy_sourceautocomp.php",  
                   minLength:2
                });
            });
    </script>
    <script>
 
        /*autocomplete muncul setelah user mengetikan minimal2 karakter */
            $(function() {  
                $( "#satuanbrg" ).autocomplete({
                 source: "manifest/addbcf15_kemasan_sourceautocomp.php",  
                   minLength:2
                });
            });
    </script>
    <script>
 
        /*autocomplete muncul setelah user mengetikan minimal2 karakter */
            $(function() {  
                $( "#cmbtps" ).autocomplete({
                 source: "manifest/addbcf15_tps_sourceautocomp.php",  
                   minLength:2
                });
            });
    </script>
     <script>
 
        /*autocomplete muncul setelah user mengetikan minimal2 karakter */
            $(function() {  
                $( "#consignee" ).autocomplete({
                 source: "manifest/addbcf15_con_noty_sourceautocomp.php",  
                   minLength:2
                });
            });
    </script>
    <script>
 
        /*autocomplete muncul setelah user mengetikan minimal2 karakter */
            $(function() {  
                $( "#notify" ).autocomplete({
                 source: "manifest/addbcf15_con_noty_sourceautocomp.php",  
                   minLength:2
                });
            });
    </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#addbcf15").submit(function() {
                 var ekspresiRegular = new RegExp(/^[a-zA-Z\ \']+$/);
                 var str = $.trim($("#satuanbrg").val());
                 if (str == "" || !ekspresiRegular.test(str)) {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Satuan Barang diisi huruf dan spasi saja");
                    $("#satuanbrg").focus();
                    return false;  
                 }
              });      
           });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               $('#nobcf').mask('999999');
               $('#nobc11').mask('999999');
               $('#posbc11').mask('9999');
               $('#tanggal4').mask('99/99/9999');
               $('#tanggal2').mask('99/99/9999');
               $('#tanggal3').mask('99/99/9999');
           });
         </script>
       
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#addbcf15").submit(function() {
                 if ($.trim($("#nobcf").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No BCF 1.5 tidak boleh kosong");
                    $("#nobcf").focus();
                    return false;  
                 }
                 if ($("#cmbmanifest").val() == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Kode Manifest");
                    $("#cmbmanifest").focus();
                    return false;  
                 }  
                 if ($.trim($("#nobc11").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No BC 1.1 tidak boleh kosong");
                    $("#nobc11").focus();
                    return false;  
                 }
                 if ($.trim($("#posbc11").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Pos BC 1.1 tidak boleh kosong");
                    $("#posbc11").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbpelayaran").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Input nama pelayaran tidak boleh kosong");
                    $("#cmbpelayaran").focus();
                    return false;  
                 }
                 if ($.trim($("#bl").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Bill Of Loading tidak boleh kosong");
                    $("#bl").focus();
                    return false;  
                 }
                 
                 if ($.trim($("#sarkut").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Kapal tidak boleh kosong");
                    $("#sarkut").focus();
                    return false;  
                 }
                 if ($.trim($("#voy").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Voy Kapal tidak boleh kosong");
                    $("#voy").focus();
                    return false;  
                 }
                 if ($.trim($("#jmlbrg").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Jumlah Barang tidak boleh kosong");
                    $("#jmlbrg").focus();
                    return false;  
                 }
                 var ekspresiRegular = new RegExp(/^\d+$/);
                 var nilai = $.trim($("#jmlbrg").val());
                 if (nilai == "" || !ekspresiRegular.test(nilai)) {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Jumlah Barang : Masukkan Hanya Angka saja");
                    $("#jmlbrg").focus();
                    return false;  
                 }
                 if ($.trim($("#satuanbrg").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Satuan Barang tidak boleh kosong");
                    $("#satuanbrg").focus();
                    return false;  
                 }
                 if ($.trim($("#uraianbrg").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Uraian Barang tidak boleh kosong");
                    $("#uraianbrg").focus();
                    return false;  
                 }

                 if ($.trim($("#consignee").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Consignee perlu diisi");
                    $("#consignee").focus();
                    return false;  
                 }  
                 if ($.trim($("#alamatconsignee").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Alamat Consignee perlu diisi");
                    $("#alamatconsignee").focus();
                    return false;  
                 }   
                 if ($.trim($("#kotaconsignee").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Alamat Kota Consignee perlu diisi");
                    $("#kotaconsignee").focus();
                    return false;  
                 }  
                 if ($.trim($("#notify").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Notify perlu diisi");
                    $("#notify").focus();
                    return false;  
                 }  
                 if ($.trim($("#alamatnotify").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Alamat Notify perlu diisi");
                    $("#alamatnotify").focus();
                    return false;  
                 }   
                 if ($.trim($("#kotanotify").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Alamat Kota Notify perlu diisi");
                    $("#kotanotify").focus();
                    return false;  
                 }
                 if ($("#cmbtps").val() == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Input TPSnya tuh");
                    $("#cmbtps").focus();
                    return false;  
                 }  
                 
                 if ($("#cmbfcl").val() == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Type kontainer tuh");
                    $("#cmbfcl").focus();
                    return false;  
                 }
                 if ($("#cmbseksi").val() == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Penanda Tangan BCF 1.5 nya");
                    $("#cmbseksi").focus();
                    return false;  
                 }
                 if ($("#txtshipper").val() == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Shipper Tidak Boleh Kosong");
                    $("#txtshipper").focus();
                    return false;  
                 }
                 if ($("#txtna").val() == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Negara Asal Tidak Boleh Kosong");
                    $("#txtna").focus();
                    return false;  
                 }
                 if ($("#txtgw").val() == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Berat Bruto Tidak Boleh Kosong");
                    $("#txtgw").focus();
                    return false;  
                 }
                 if ($("#txtnw").val() == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Volume Tidak Boleh Kosong");
                    $("#txtnw").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 
        
           

</head>

<body>
    
    <legend>Step 1 : Rekam BCF 1.5 Baru</legend><hr></hr>

    <?php 
    session_start();
    ob_start();
    
    include "lib/function.php";
    
    $now=date('Y-m-d');
     
    ?>

<form method="post" id="addbcf15" name="addbcf15" action="?hal=pagemanifest&pilih=addbcf15">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
        
        <td colspan="5" align="left"><?php $sql = "select idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%Y') as bcf15tgl from bcf15 order by idbcf15 desc limit 0,1" ; $qry = @mysql_query($sql) or die ("Gagal query"); $data =mysql_fetch_array($qry); echo  " No BCF 1.5 terakhir di Input tahun <strong>$data[bcf15tgl]</strong> &nbsp; :<strong>$data[bcf15no]</strong>";
            ?>
        </td>
    </tr>

<!--    <tr>
        
        <td colspan="5" align="left">
            
    <?php 
    function newID()
        {
              $now=date('Y');
              $query = "SELECT max(idbcf15) as maxID FROM bcf15 where tahun='$now'";
              $hasil = mysql_query($query);
              $data  = mysql_fetch_array($hasil);
              $idMax = $data['maxID'];
             
              $querybcfbaru = "SELECT * FROM bcf15 where idbcf15='$idMax' ";
              $hasilbcfbaru = mysql_query($querybcfbaru);
              $databcfbaru  = mysql_fetch_array($hasilbcfbaru);
              $bcfbaru = $databcfbaru['bcf15no'];
              
              $noUrut = (int) substr($bcfbaru, 0, 6);
              $noUrut++;
              $id = sprintf("%06s", $noUrut);
              return $id;
         }
         $bcf15nobaru = newID();
         
   
            ?>
        </td>
    </tr>-->
    <tr align="center"> 
            <td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>Input BCF 15</b> </td>
    </tr>
    <tr>
            <td height="20" align="center" colspan="4" bgcolor="#dfe9ff"><b>BCF 1.5</b></td>
    </tr>
    <tr><td colspan="4">
         
         <?php $sql = "select idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%Y') as bcf15tgl,Pecahpos,tahun from bcf15 where Pecahpos='2' order by idbcf15 desc limit 0,1" ; $qry = @mysql_query($sql) or die ("Gagal query"); $data =mysql_fetch_array($qry); $bcfnosekarang=$data[bcf15no]+1; echo  " No saat ini :<blink><strong><font color=red>$bcfnosekarang</font></strong></blink>";if($data['tahun']=='2013') {echo "";} else {echo "<b>(<<--Abaikan no disamping ini ,untuk tahun 2013 set No BCF 1.5 saat ini menjadi 000001 dst)</b>";}?> </td></tr>
       
    <tr> 
            <td  align="right">Nomor :</td>
            <td colspan="3"><input class="required"  id="nobcf" name="txtbcf15no" type="text" size="10" maxlength="6" value="<?php echo $_POST['txtbcf15no']; ?>" />
            
            <select class="required" id="cmbmanifest" name="cmbmanifest" >
                <option value = "" >--kode manifest--</option>
                <?php
                    $sql = "SELECT * FROM manifest ORDER BY idmanifest";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data =mysql_fetch_array($qry)) {
                            if ($data[idmanifest]==$Datamanifest) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data[idmanifest]' $cek>$data[kd_manifest]</option>";
                            }
		?>
            </select>
            </td>
            
    </tr>
    <tr>
            <td align="right" >Tanggal :</td>
            <td><?php echo tglindo($now) ?></td>
    </tr>
    <tr>
            <td height="20" align="center" colspan="5" bgcolor="#dfe9ff"><b>Data Manifest</b></td>
    </tr>
    <tr>
            <td align="right">Nomor BC 11 :</td>
            <td><input id="nobc11" class="required" name="txtbc11no" type="text" value= "<?php echo $_POST['txtbc11no']; ?>" /></td>
            <td align="right">Tanggal :</td>
            <td><input class="required" id="tanggal4" type="text"  name="txtbc11tgl" value="<?php echo $_POST['txtbc11tgl']; ?>"  /></td>
    </tr>
    
    <tr>
            <td align="right">Pos : </td>
            <td ><input id="posbc11" class="required" name="txtbc11pos" type="text" value="<?php echo $_POST['txtbc11pos']; ?>" ></input></td>
            <td align="right">Sub Pos : </td>
            <td><input class="required" name="txtbc11subpos" type="text" value="<?php echo $_POST['txtbc11subpos']; ?>"></input></td>
    </tr>
    <tr valign="top">
                                 <td  align="right"  >Agen Pengangkut :</td>
                                <td colspan="4" valign="top">
                                <select class="required" id="cmbpelayaran" name="cmbpelayaran" >
                                    <option value = "" >--agen pengangkut--</option>
                                    <?php
                                        $sql = "SELECT * FROM pelayaran ORDER BY idpelayaran";
                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                if ($data[idpelayaran]==$bcf15[idpelayaran]) {
                                                    $cek="selected";
                                                    }
                                               else {
                                                    $cek="";
                                                    }
                                                    echo "<option value='$data[idpelayaran]' $cek>$data[nm_pelayaran]</option>";
                                                }
                                    ?>
                                </select><img src="images/new/tambah.png" /> <font size="4" color="#880000"><a href="?hal=inputpel" target="new">Klik Sini<img src="images/new/tambahmtk.png" width="20" /></a></font>
                                </td>
   </tr>
   <tr>
       <td align="right">Shipper : </td>
       <td colspan="4"><input id="txtshipper" class="required" name="txtshipper" type="text" value="<?php echo $_POST['txtshipper']; ?>" size="50" ></input></td>
                                
   </tr>
    <tr>
       <td align="right">Pelabuhan Asal : </td>
       <td colspan="4"><input id="txtna" class="required" name="txtna" type="text" value="<?php echo $_POST['txtna']; ?>" size="30" ></input></td>
                                
   </tr>
    
    <tr>
            <td align="right">No BL : </td>
            <td ><input id="bl" class="required" name="txtbl" type="text" value="<?php echo $_POST['txtbl']; ?>" size="20"></input></td>
            <td align="right" >Tanggal BL : </td>
            <td ><input class="required" id="tanggal2" type="text"  name="txttglbl" value="<?php echo $_POST['txttglbl']; ?>" ></input></td>
    </tr>
    <tr>
            <td align="right">Sar. angkut: </td>
            <td ><input id="sarkut" class="required" name="txtsaranapengangkut" size="20" type="text" value="<?php echo $_POST['txtsaranapengangkut']; ?>" /> </td>
            <td align="right" >Voy  : </td>
            <td><input id="voy" class="required" name="txtvoy" type="text" value="" size="8" maxlength="10"></input></td>
        
    </tr>
    <tr>
            <td align="right">Jumlah/satuan : </td>
            <td colspan="3"><input id="jmlbrg" class="required" name="txtamountbrg" size="20" type="text" value="<?php echo $_POST['txtamountbrg']; ?>" ></input>
            <input id="satuanbrg" class="required" name="txtsatuanbrg" type="text" value="<?php echo $_POST['txtsatuanbrg']; ?>" size="8" maxlength="10"></input></td>
    </tr>
    <tr>
            <td valign="top" align="right"  >Uraian Barang: </td>
            <td colspan="3"  ><textarea rows="3" cols="70" id="uraianbrg" class="required"  name="txturaian" type="text"  ><?php echo isset($_POST['txturaian']) ? $_POST['txturaian'] : '';?></textarea></td>
    </tr>
    <tr>
       <td align="right">Bruto : </td>
       <td colspan="4"><input id="txtgw" class="required" name="txtgw" type="text" value="<?php echo $_POST['txtgw']; ?>" size="20" ></input> Kg</td>
                                
   </tr>
   <tr>
       <td align="right">Volume : </td>
       <td colspan="4"><input id="txtnw" class="required" name="txtnw" type="text" value="<?php echo $_POST['txtnw']; ?>" size="20" ></input> m3 </td>
                                
   </tr>
    <tr>
            <td height="20" align="center" colspan="5" bgcolor="#dfe9ff"><b>Data Consignee / Notify </b></td>
    </tr>
    
    <tr>
            <td  align="right">Nama Cons :</td>
            <td colspan="3"><input  class="required" id="consignee" name="txtconsignee"  type="text" value="<?php echo $_POST['txtconsignee']; ?>" size="60" ></input></td>
    </tr>
    <tr>
            <td align="right" vlign="top">Alamat :</td>
            <td colspan="3"><textarea cols="70" class="required" id="alamatconsignee" name="txtalamatconsignee" ><?php echo isset($_POST['txtalamatconsignee']) ? $_POST['txtalamatconsignee'] : '';?></textarea>
            </td>
    </tr>
    <tr>
        <td align="right" >Kota :</td><td colspan="3">   <input class="required" id="kotaconsignee" name="txtkotaconsignee" type="text" value="<?php echo $_POST['txtkotaconsignee']; ?>" size="22" ></input></td>
    </tr>
    <tr>
            <td align="right">Nama Notify :</td>
            <td colspan="3"><input class="required" id="notify" name="txtnotify" type="text" value="<?php echo $_POST['txtnotify']; ?>" size="60" ></input></td>
    </tr>
    <tr>
            <td valign="top" align="right">Alamat :</td>
            <td colspan="3"><textarea cols="70" class="required" id="alamatnotify" name="txtalamatnotify" type="text"   ><?php echo isset($_POST['txtalamatnotify']) ? $_POST['txtalamatnotify'] : '';?></textarea></td>
    </tr>
    <tr>
        <td valign="top" align="right">Kota :</td>
        <td colspan="3"><input class="required" id="kotanotify" name="txtkotanotify" type="text" value="<?php echo $_POST['txtkotanotify']; ?>" size="22" ></input></td>
    </tr>
    <tr>
             <td height="20" align="center" colspan="5" bgcolor="#dfe9ff"><b>Data Lainnya </b></td>
    </tr>
    <tr>
            <td align="right">Eks TPS :</td>
            <td>
            <input class="required" id="cmbtps" name="cmbtps" type="text" value="<?php echo $_POST['cmbtps']; ?>" /> 
            </td>
            
            
    </tr>
    <tr>
            <td align="right">Type Cont :</td>
            <td>
            <select  class="required" id="cmbfcl" name="cmbfcl">
                <option value = "" >--Type Container--</option>
                <?php
                    $sql = "SELECT * FROM typecode ORDER BY idtypecode";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data =mysql_fetch_array($qry)) {
                            if ($data[idtypecode]==$Datatypecode) {
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
            <td align="right">Keterangan :</td>
            <td colspan="5"><textarea class="required" cols="70" name="txtketerangan" type="text" size="30" ><?php echo isset($_POST['txtketerangan']) ? $_POST['txtketerangan'] : '';?></textarea></td>
    </tr>
    
     <tr>
            <td height="20" align="center" colspan="5" bgcolor="#dfe9ff"><b>Penandatangan BCF 1.5</b></td>
    </tr>
    <tr>
            <td align="right">Kepala Seksi Manifest :</td>
            <td colspan="2">
            <select  class="required" id="cmbseksi" name="cmbseksi">
                <option value = "" >--Pejabat Penanda Tangan BCF 1.5--</option>
                <?php
                    $sql = "SELECT * FROM seksi where jabatan='Kepala Seksi Adm. Manifest' and status_seksi='aktif' and kdseksi='manifest' ORDER BY idseksi";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data =mysql_fetch_array($qry)) {
                            if ($data[idseksi]==$Dataseksi) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data[idseksi]' $cek>$data[nm_seksi] $data[plh]</option>";
                            }
		?>
            </select>
            </td>
    </tr>
        
    
    <tr>
            <td></td>
            <td></td>
            <td><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"  onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"  /></td>
    </tr>

  </table>
</form>



<?php 


$tahun = date('Y');
$txtnobcf15 = $_POST['txtbcf15no']; 
$cmbkodemanifest = $_POST['cmbmanifest'];

$txtbc11no = $_POST['txtbc11no'];
$txtbc11tgl = sql($_POST['txtbc11tgl']);


$txtbc11pos = $_POST['txtbc11pos'];
$txtbc11subpos = $_POST['txtbc11subpos'];
$txtbl = $_POST['txtbl'];
$txttglbl = sql($_POST['txttglbl']);


$txtsaranapengangkutkecil = strtolower($_POST['txtsaranapengangkut']);
$txtsaranapengangkut_addslashes= addslashes($txtsaranapengangkutkecil);
$txtsaranapengangkut= ucwords($txtsaranapengangkut_addslashes);

$txtvoy = $_POST['txtvoy'];
$txtamountbrg = $_POST['txtamountbrg'];
$txtsatuanbrg = $_POST['txtsatuanbrg'];

$txturaianKECIL= strtolower($_POST['txturaian']);
$txturaian_addslashes= addslashes($txturaianKECIL);
$txturaian= ucwords($txturaian_addslashes);

$txtconsigneekecil = strtolower($_POST['txtconsignee']);
$txtconsigneekecil_addslashes  = addslashes($txtconsigneekecil);
$txtconsignee = ucwords($txtconsigneekecil_addslashes);

$txtalamatconsigneekecil = strtolower($_POST['txtalamatconsignee']);
$txtalamatconsigneekecil_addslashes  = addslashes($txtalamatconsigneekecil);
$txtalamatconsignee = ucwords($txtalamatconsigneekecil_addslashes);

$txtkotaconsigneekecil = strtolower($_POST['txtkotaconsignee']);
$txtkotaconsignee_addslashes = addslashes($txtkotaconsigneekecil);
$txtkotaconsignee = ucwords($txtkotaconsignee_addslashes);

$txtnotifykecil = strtolower($_POST['txtnotify']);
$txtnotify_addslashes = addslashes($txtnotifykecil);
$txtnotify = ucwords($txtnotify_addslashes);

$txtalamatnotifykecil = strtolower($_POST['txtalamatnotify']);
$txtalamatnotify_addslashes = addslashes($txtalamatnotifykecil);
$txtalamatnotify = ucwords($txtalamatnotify_addslashes);

$txtkotanotifykecil = strtolower($_POST['txtkotanotify']);
$txtkotanotify = ucwords($txtkotanotifykecil);

$cmbtpskecil = strtolower($_POST['cmbtps']);
$cmbtps = ucwords($cmbtpskecil);

$cmbfcl = $_POST['cmbfcl'];
$txtketerangan = $_POST['txtketerangan'];
$cmbseksi = $_POST['cmbseksi'];
$recordstatus = '1';
$cmbpelayaran=$_POST['cmbpelayaran'];

$txtshipperkecil=strtolower($_POST['txtshipper']);
$txtshipper_addslashes = addslashes($txtshipperkecil);
$txtshipper=ucwords($txtshipper_addslashes);

$txtnakecil=strtolower($_POST['txtna']);
$txtna=ucwords($txtnakecil);

$txtgw=$_POST['txtgw'];
$txtnw=$_POST['txtnw'];
$now=date('Y-m-d');


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT bcf15no,bcf15tgl,idbcf15 FROM bcf15 where (bcf15no='$txtnobcf15' and bcf15tgl='$now') or (bc11no='$txtbc11no' and bc11tgl='$txtbc11tgl' and bc11pos='$txtbc11pos' and bc11subpos='$txtbc11subpos')";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("BCF ini Pernah di input Silahkan cari ke menu edit");</script>';
                   
                }
                 else
                {
		
		mysql_query("INSERT INTO bcf15(
                        tahun,
                        bcf15no, 
                        idmanifest, 
                        bcf15tgl, 
                        bc11no, 
                        bc11tgl,
                        bc11pos,
                        bc11subpos,
                        blno,
                        bltgl,
                        saranapengangkut,
                        voy,
                        amountbrg,
                        satuanbrg,
                        diskripsibrg,
                        consignee,
                        consigneeadrress,
                        consigneekota,
                        notify,
                        notifyadrress,
                        notifykota,
                        idtps,
                        idtypecode,
                        keterangan,
                        idseksi,
                        recordstatus,
                        idpelayaran,
                        shipper,
                        negaraasal,
                        tonage_groos,
                        tonage_netto
                        )
                        
		VALUES(
                        '$tahun',
                        '$txtnobcf15', 
                        '$cmbkodemanifest', 
                        '$now', 
                        '$txtbc11no', 
                        '$txtbc11tgl',
                        '$txtbc11pos',
                        '$txtbc11subpos',
                        '$txtbl',
                        '$txttglbl',
                        '$txtsaranapengangkut',
                        '$txtvoy',
                        '$txtamountbrg',
                        '$txtsatuanbrg',
                        '$txturaian',
                        '$txtconsignee',
                        '$txtalamatconsignee',
                        '$txtkotaconsignee',
                        '$txtnotify',
                        '$txtalamatnotify',
                        '$txtkotanotify',
                        '$cmbtps',
                        '$cmbfcl',
                        '$txtketerangan',
                        '$cmbseksi',
                        '$recordstatus',
                        '$cmbpelayaran',
                        '$txtshipper',
                        '$txtna',
                        '$txtgw',
                        '$txtnw'
                        )");
                        
                //autocomplete nama kapal
                        $sqlnmkpl = "SELECT * from kapal_autocomp where nm_kapal='$txtsaranapengangkut'";
                        $querynmkpl = mysql_query($sqlnmkpl);
                        $ceknmkpl=mysql_numrows($querynmkpl);
                        $datanmkpl=mysql_fetch_array($querynmkpl);
                        $dataidnmkpl=$datanmkpl['idkapal_autocomp'];
                        if($ceknmkpl>0){
                            $editnmkpl = mysql_query("UPDATE kapal_autocomp SET
							nm_kapal='$txtsaranapengangkut'
                                    WHERE idkapal_autocomp='$dataidnmkpl'");
                        }
                        else{
                            $insertnmkpl=mysql_query("INSERT INTO kapal_autocomp(nm_kapal )
                        
                                VALUES('$txtsaranapengangkut')");
                        
                        }
                        
                //autocomplete voy kapal
                        $sqlvoykpl = "SELECT * from kapalvoy_autocomp where voy='$txtvoy'";
                        $queryvoykpl = mysql_query($sqlvoykpl);
                        $cekvoykpl=mysql_numrows($queryvoykpl);
                        $datavoykpl=mysql_fetch_array($queryvoykpl);
                        $dataidvoykpl=$datavoykpl['idkapalvoy_autocomp'];
                        if($cekvoykpl>0){
                            $editvoykpl = mysql_query("UPDATE kapalvoy_autocomp SET
							voy='$txtvoy'
                                    WHERE idkapalvoy_autocomp='$dataidvoykpl'");
                        }
                        else{
                            $insertvoykpl=mysql_query("INSERT INTO kapalvoy_autocomp(voy )
                        
                                VALUES('$txtvoy')");
                        
                        }
                        
                //autocomplete satuan barang
                        $sqlkms = "SELECT * from kemasan_autocomp where nm_kemasan='$txtsatuanbrg'";
                        $querykms = mysql_query($sqlkms);
                        $cekkms=mysql_numrows($querykms);
                        $datakms=mysql_fetch_array($querykms);
                        $dataidkms=$datakms['idkemasan_autocomp'];
                        if($cekkms>0){
                            $editkms = mysql_query("UPDATE kemasan_autocomp SET
							nm_kemasan='$txtsatuanbrg'
                                    WHERE idkemasan_autocomp='$dataidkms'");
                        }
                        else{
                            $insertkms=mysql_query("INSERT INTO kemasan_autocomp(nm_kemasan )
                        
                                VALUES('$txtsatuanbrg')");
                        
                        }
                        
                //autocomplete tps
                        $sqltps = "SELECT * from tps where nm_tps='$cmbtps'";
                        $querytps = mysql_query($sqltps);
                        $cektps=mysql_numrows($querytps);
                        $datatps=mysql_fetch_array($querytps);
                        $dataidtps=$datatps['idtps'];
                        if($cektps>0){
                            $edittps = mysql_query("UPDATE tps SET
							nm_tps='$cmbtps'
                                    WHERE idtps='$dataidtps'");
                        }
                        else{
                            $inserttps=mysql_query("INSERT INTO tps(nm_tps )
                        
                                VALUES('$cmbtps')");
                        
                        }
                        
               $_SESSION['logged']=time();
                mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('Terbitkan BCF1.5','$now','$txtnobcf15','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");

		echo "Input berhasil";
                
                echo "<script type='text/javascript'>window.location='index.php?hal=pagemanifest&pilih=bcf15cont&id=$txtnobcf15 &tahun=$tahun'</script>";
                
//                echo "<meta http-equiv='refresh' content='0; url=?hal=pagemanifest&pilih=bcf15cont&id=$txtnobcf15 &tahun=$tahun'>";
                }
	}; // if(kondisi) {hasil};
         
?>
      
</body>
</html>
<?php
ob_end_flush();
};
?>