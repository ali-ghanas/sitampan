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
<html>
    <head>
    <title>Konfirmasi Status BCF 1.5</title>
    <!--       jquery anytimes -->
        
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal2").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal3").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#ndkonfirmasi").submit(function() {
                  
                 if ($.trim($("#txtnd").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?>Nomor ND tidak boleh kosong");
                    $("#txtnd").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbp2").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Seksi Penindakan Tujuan Nota Dinas Belum ditentukan");
                    $("#cmbp2").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbseksind").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Penandatangan Nota Dinas Belum ditentukan");
                    $("#cmbseksind").focus();
                    return false;  
                 }
                 if ($.trim($("#txtnosurat").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?>No Surat Permohonan dari Importir Kosong Harap Diisi dulu dibagian administrasi Surat Masuk");
                    $("#txtnosurat").focus();
                    return false;  
                 }
//                 
                 
                 if ($.trim($("#txtpemohon").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?>Nama Pemohon Kosong Harap Diisi dulu dibagian administrasi Surat Masuk");
                    $("#txtpemohon").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "9") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah BMN");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "5") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG Batalkan dulu Skep Lelangnya Kemudian Batal BCF 1.5");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "6") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 1");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "7") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 2");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "8") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah Musnah");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 
                 
                 
              });      
           });
        </script> 
    
    </head>
    <body>
        
	     <?php // aksi untuk edit
            session_start();
                $txtnd = $_POST['txtnd']; 
                
                $txttglnd = $_POST['txttglnd'];
                $txtbcf15no = $_POST['txtbcf15no'];
                $txttahun = $_POST['txttahun'];
                $cmbp2 = $_POST['cmbp2'];
                $cmbseksind = $_POST['cmbseksind'];
               
                $jalur = $_POST['cmbjalur'];
                
                $nhp = $_POST['nhp'];
                $tanggal3=$_POST['tanggal3'];
                $id = $_POST['id'];
                $now=date('Y-m-d H:i:s');
                $nowtime=date('H:i:s');
                

        if(isset($_POST['editsubmit4'])) // jika tombol editsubmit ditekan
	{ 
                
                
            
		
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
                                                        ndkonfirmasi='1',
							ndkonfirmasino='$txtnd',
							ndkonfirmasidate='$txttglnd',
                                                        ndkonfirmasito='$cmbp2',
                                                        idp2='$cmbp2',
                                                        idseksindkonfirmasi='$cmbseksind',
                                                        
                                                        jalur='$jalur',
                                                       
                                                        CacahNo='$nhp',
                                                        CacahDate='$tanggal3',
                                                        recordstatuskonf='2'
                                                        
                                                        	WHERE idbcf15='$id'");
                $editsurat = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
                                                        
                                                        status='nd konfirmasi'
                                                        	WHERE noidbcf15='$id'");
                
                mysql_query("INSERT INTO historykonfirmasi(idbcf15,nondkonfirmasi,tglndkonfirmasi,namauserinputnd,nipuserinputnd,tanggalinput)VALUES('$id','$txtnd','$txttglnd','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$now')");
                $_SESSION['logged']=time();
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('ND Konfirmasi','$now','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtnd','$txttglnd')");
                    echo "<meta http-equiv='refresh' content='0; url=?hal=ndkonfirmasip2tppok&id=$id&nond=$txtnd&tahun=$txttahun>";
                }
        
        
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select *  FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <form method="post" id="ndkonfirmasi" name="ndkonfirmasi" action="?hal=ndkonfirmasip2tpp">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
        <input type="hidden" name="txtjalur" value="<?php echo $bcf15['jalur']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Nota Dinas Konfirmasi Pembatalan Ke P2</b> </td></tr>
                <tr>
                    <td width="10"  align="left" >No Nota Dinas  </td> <td>:</td>
                    <td  colspan="2"><input name="txtnd" id="txtnd" class="required" type="text" value="<?php echo $bcf15['ndkonfirmasino']; ?>" size="8" maxlength="6"></input></td>
                    
                </tr>
                <tr>
                    <td  align="left"  >Tgl Nota Dinas  </td><td>:</td>
                    <td colspan="2"><input class="required" id="tanggal" type="text" name="txttglnd" value="<?php echo $bcf15['ndkonfirmasidate']; ?>" ></input></td>
                </tr>
                <tr>
                    <td  align="left"  >Tujuan ND Ke  </td><td>:</td>
                    <td  colspan="2"><select class="required" id="cmbp2" name="cmbp2" >
                        <option value="" selected>--Pilih Penindakan--</option>
                                <?php
                                    $sql = "SELECT * FROM p2 ORDER BY idp2";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idp2]==$bcf15[idp2]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[idp2]' $cek>$data[nm_p2]</option>";
                                    }
                                    ?>
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td  align="left"  >Penandatangan ND Konfirmasi </td><td>:</td>
                    <td colspan="2"><select class="required" id="cmbseksind" name="cmbseksind" >
                        <option value="" selected>--Pilih Penandatangan--</option>
                                <?php
                                    $sql = "SELECT * FROM seksi where (kdseksi='tpp2' or kdseksi='tpp3') and status_seksi='aktif' ORDER BY idseksi";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idseksi]==$bcf15[idseksindkonfirmasi]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[idseksi]' $cek>$data[plh] $data[nm_seksi] $data[bidang]</option>";
                                    }
                                    ?>
                        </select> Posisi Barang <?php if($bcf15['masuk']=='1') {echo "<a>$bcf15[nm_tpp]</a>";}  else {echo "<a>$bcf15[idtps]</a>";}  ?>
                    </td> 
                </tr>
                
                
                <tr>
                    <td  align="left"  >Jalur</td><td>:</td>
                    <td colspan="2">
                        <select class="required" id="cmbjalur" name="cmbjalur" >
                        <option value="" selected>--Jalur--</option>
                               <?php
                                $sql = "SELECT * FROM jalur ORDER BY idjalur";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idjalur]==$bcf15[jalur]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[idjalur]' $cek>$data[jalur]</option>";
                                    }
                                    ?>
                        </select></td>
                        
                   
                </tr>
                <tr>
                    <td  align="left"  >No NHP</td><td>:</td>
                    <td ><input name="nhp" id="nhp" class="required" type="text" value="<?php echo $bcf15['CacahNo']; ?>" ></input></td> <td><input name="tanggal3" id="tanggal3" class="required" type="text" value="<?php echo $bcf15['CacahDate']; ?>" ></input></td>
                </tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Permohonan Pembatalan BCF 1.5</b></td></tr>
                <tr>
                    <td  align="left"  >No Surat Permohonan </td><td>:</td>
                    <td colspan="2"><input class="required" disabled  type="text" id="txtnosurat" name="txtnosurat" value="<?php echo $bcf15['SuratBatalNo']; ?>" ></input> <font color="red">* wajib telah diinput</font></td>
                </tr>
                <tr>
                    <td  align="left"  >Tgl Surat Permohonan </td><td>:</td>
                    <td colspan="2"><input class="required" disabled id="tanggal" type="text" name="txttglsurat" value="<?php echo $bcf15['SuratBatalDate']; ?>" ></input> </td>
                </tr>
                <tr>
                    <td  align="left"  >Pemohon </td><td>:</td>
                    <td colspan="2"><input class="required" size="50" disabled type="text" id="txtpemohon" name="txtpemohon" value="<?php echo $bcf15['Pemohon']; ?>" ></input> <font color="red">* wajib telah diinput</font></td>
                </tr>
                
                
            <tr>
                <td colspan="4"><input type="hidden" id="txtstatusakhir" name="txtstatusakhir" value="<?php echo $bcf15['idstatusakhir']; ?>" disabled  /></td>
            </tr>
            <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td colspan="2"><input type="submit" name="editsubmit4" value="Simpan" class="button putih bigrounded " /></td><td colspan="2"><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>

	
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>
      
                <?php
                $id = $_GET['id']; // menangkap id
                $sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $bcf15 = mysql_fetch_array($query);

                ?>

	
        
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Detail BCF 15</b> </td></tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>BCF 1.5</b></td></tr>
            <tr>
                <td align="right" >No BCF 15  : </td> 
                <td width=""><?php echo $bcf15['bcf15no']; ?>
                <select class="required" id="cmbmanifest" name="cmbmanifest" disabled>
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
                    </select> <?php echo $bcf15['tahun']; ?>
                </td> 
            </tr>
            <tr>
                <td  align="right" >Tgl BCF 15 : </td>
                <td><?php echo $bcf15['bcf15tgl']; ?></td>
            </tr>
            <tr>
                <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
                <td  align="right">No BC 11 : </td>
                <td ><?php echo $bcf15['bc11no']; ?></td>
                <td align="right">Tanggal BC : </td>
                <td><?php echo $bcf15['bc11tgl']; ?></td>
            </tr>
            <tr>
                <td align="right">Pos BC 11 : </td>
                <td ><?php echo $bcf15['bc11pos']; ?></td>
                <td align="right">Sub Pos : </td>
                <td><?php echo $bcf15['bc11subpos']; ?></td>
            </tr>
            <tr>
                <td  align="right">No BL : </td>
                <td ><?php echo $bcf15['blno']; ?></td>
                <td align="right">Tanggal BL  : </td>
                <td><?php echo $bcf15['bltgl']; ?></td>
            </tr>
            <tr>
                <td  align="right">Sar. angkut: </td>
                <td ><?php echo $bcf15['saranapengangkut']; ?></td>

                <td align="right" >Voy  : </td>
                <td><?php echo $bcf15['voy']; ?></td>

            </tr>
            <tr>
                <td  align="right">Jumlah/satuan : </td>
                <td ><?php echo $bcf15['amountbrg']; ?>
                <?php echo $bcf15['satuanbrg']; ?></td>
            </tr>
            <tr>
                <td  align="right"  >Uraian : </td>
                <td   ><?php echo $bcf15['diskripsibrg']; ?></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Consignee / Notify </b></td>
            </tr>
             <tr>
                <td  align="right">Consign:</td>
                <td><?php echo $bcf15['consignee']; ?></td>
                
            </tr>
            <tr>
                <td align="right">Notify :</td>
                <td><?php echo $bcf15['notify']; ?></td>
                
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data TPS /TPP </b></td>
            </tr>
            <tr>
                <td align="right">Eks TPS</td>
                <td><?php echo $bcf15['idtps']; ?>
                </td>
                <td align="right">TPP Tujuan :</td>
                <td><select disabled class="required" id="cmbtpp" name="cmbtpp">
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
                <td align="right">FCL / LCL :</td>
                <td><select disabled class="required" id="cmbfcl" name="cmbfcl">
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
                <td align="right">Keterangan :</td>
                <td ><?php echo $bcf15['keterangan']; ?></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Kontainer </b></td>
            </tr>
            <tr>
                <td colspan="2">
                    
                        <table cellspacing="0" cellpadding="3">
                            <tr>
                                <td class="judultabel">Id BCF 15</td>
                                <td class="judultabel">No Container</td>
                                <td class="judultabel">Size</td>

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
                                <td class="isitabel"><?php echo $bcfcont['idbcf15'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['idsize'];?></td>

                            </tr>
                            <?php };?>
                        </table>
                </td>
            </tr> 
            

           
            </table>
     
        
     

</body>
</html>
<?php
};
?>