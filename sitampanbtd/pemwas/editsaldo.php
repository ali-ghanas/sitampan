<html>
    <head>
    <title>Ubah BCF 15</title>
    <!--       jquery anytimes -->
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#editsaldobcf15").submit(function() {
                 if ($.trim($("#txtnhp").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?>  No NHP tdk Boleh Kosong");
                    $("#txtnhp").focus();
                    return false;  
                 }
                 
                 
                 
                 
                 
              });      
           });
        </script> 
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#editsaldobcf15kep").submit(function() {
                
                 if ($.trim($("#cmbstatus").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?>  Pilih dulu Status Akhir");
                    $("#cmbstatus").focus();
                    return false;  
                 }
                 if ($.trim($("#txtnokep").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?>  Masukan No Kepnya");
                    $("#txtnokep").focus();
                    return false;  
                 }
                 
                 
                 
                 
              });      
           });
        </script> 
    
    </head>
    <body>
       

<?php // aksi untuk edit
session_start();

	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="bcfedit" name="bcfedit" action="?hal=bcfedit">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Update Saldo</b> </td></tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>BCF 1.5</b></td></tr>
            <tr>
                <td  align="right" >No BCF 15  : </td> 
                <td><input disabled name="txtbcf15no" id="nobcf" class="required" type="text" value="<?php echo $bcf15['bcf15no']; ?>" size="8" maxlength="6"></input>
                <select disabled id="cmbmanifest" name="cmbmanifest">
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
                    </select><?php echo $bcf15['tahun']; ?>
                </td> 
            </tr>
            <tr>
                <td  align="right"  >Tgl BCF 15 : </td>
                <td><input  disabled class="required" id="tanggal" type="text" name="txttglbcf15" value="<?php echo $bcf15['bcf15tgl']; ?>" ></input></td>
            </tr>
            <tr>
                <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
                <td  align="right">No BC 11 : </td>
                <td ><input disabled id="nobc11" class="required" name="txtbc11no" type="text" value="<?php echo $bcf15['bc11no']; ?>"></input></td>
                <td align="right">Tanggal BC : </td>
                <td><input disabled id="tanggal1" type="text" name="txttglbc11" value="<?php echo $bcf15['bc11tgl']; ?>"  ></input></td>
            </tr>
            <tr>
                <td  align="right">Pos BC 11 : </td>
                <td ><input disabled id="posbc11" class="required" name="txtbc11pos" type="text" value="<?php echo $bcf15['bc11pos']; ?>" ></input></td>
                <td align="right">Sub Pos : </td>
                <td><input disabled name="txtbc11subpos" type="text" value="<?php echo $bcf15['bc11subpos']; ?>"></input></td>
            </tr>
            <tr>
                <td  align="right">No BL : </td>
                <td ><input disabled id="bl" class="required" name="txtbl" type="text" value="<?php echo $bcf15['blno']; ?>" size="20"></input></td>
                <td align="right">Tanggal BL  : </td>
                <td><input disabled id="tanggal2" type="text" name="txttglbl" value="<?php echo $bcf15['bltgl']; ?>" ></input></td>
            </tr>
            <tr>
                <td align="right">Jumlah/satuan : </td>
                <td ><input  disabled id="jmlbrg" class="required" name="txtamountbrg" size="20" type="text" value="<?php echo $bcf15['amountbrg']; ?>" ></input>
                <input  disabled id="satuanbrg" class="required" name="txtsatuanbrg" type="text" value="<?php echo $bcf15['satuanbrg']; ?>" size="8" maxlength="10"></input></td>
            </tr>
            <tr>
                <td align="right"  >Uraian : </td>
                <td colspan="4"  ><textarea disabled cols="40" class="required" id="uraianbrg" name="txturaian" ><?php echo isset($bcf15['diskripsibrg']) ? $bcf15['diskripsibrg'] : '';?></textarea></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Consignee / Notify </b></td>
            </tr>
             <tr>
                <td  align="right">Consign:</td>
                <td><input disabled class="required" id="consignee" name="txtconsignee" type="text" value="<?php echo $bcf15['consignee']; ?>" size="30" ></input></td>
                
            </tr>
            <tr>
                <td align="right">Notify :</td>
                <td><input disabled class="required" id="notify" name="txtnotify" type="text" value="<?php echo $bcf15['notify']; ?>" size="30" ></input></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data TPS /TPP </b></td>
            </tr>
            <tr>
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
                <td colspan="5"><input name="txtketerangan" type="text" value="<?php echo $bcf15['keterangan']; ?>" size="30" ></input></td>
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
        </form>
        
	
      </div>
      <div id="tabs-2">
                <?php // aksi untuk edit
                session_start();


                if(isset($_POST['editsubmitnhp'])) // jika tombol editsubmit ditekan
                        {               
                                $txtnhp = $_POST['txtnhp']; 
                                $txttglnhp = $_POST['txttglnhp'];
                                $txtbcf15no = $_POST['txtbcf15no'];
                                $txttahun = $_POST['txttahun'];
                                $now=date('Y-m-d');
                                $id = $_POST['id'];

                //                echo $txtnobcf15; 
                //                echo $cmbkodemanifest;
                //                echo  $txttglbcf15;
                //                echo  $txtbc11no;
                //                echo  $txtbc11tgl;

                                $edit = mysql_query("UPDATE bcf15 SET
                                                                        NHPLelangNo='$txtnhp',
                                                                        NHPLelangDate='$txttglnhp'
                                                                        
                                                                                WHERE idbcf15='$id'");

                                 mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('updatecacahlelang','$now','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtnhp','$txttglnhp')");  
                                 echo '<script type="text/javascript">window.location="index.php?hal=saldobcf15&act=1"</script>';
                        }
                        else 
                        { 
                        $id = $_GET['id']; // menangkap id
                        $sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                        $query = mysql_query($sql);
                        $bcf15 = mysql_fetch_array($query);

                        ?>


                        <form method="post" id="editsaldobcf15" name="editsaldobcf15" action="?hal=editsaldobcf15">
                        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
                        <input type="hidden" name="txtbcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
                        <input type="hidden" name="txttahun" value="<?php echo  $bcf15['tahun']; ?>" />
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Update Saldo</b> </td></tr>
                                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>NHP</b></td></tr>
                            <tr>
                                <td  align="right" >No NHP Lelang : </td> 
                                <td><input  name="txtnhp" id="txtnhp" class="required" type="text" value="<?php echo $bcf15['NHPLelangNo']; ?>" size="40" ></input>
                                
                                </td> 
                            </tr>
                            <tr>
                                <td  align="right"  >Tgl NHP Lelang : </td>
                                <td><input   class="required" id="tanggalnhp" type="text" name="txttglnhp" value="<?php echo $bcf15['NHPLelangDate']; ?>" ></input></td>
                            </tr>
                            
                            
                            <tr><td></td><td></td><td><input type="submit" name="editsubmitnhp" value="Update" /></td></tr>


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
            <div id="tabs-3">
                <?php // aksi untuk edit
                session_start();


                if(isset($_POST['editsubmitkep'])) // jika tombol editsubmit ditekan
                        {               
                                $cmbstatus = $_POST['cmbstatus']; 
                                $txtnokep = $_POST['txtnokep'];
                                $txtbcf15no = $_POST['txtbcf15no'];
                                $txttahun = $_POST['txttahun'];
                                $now=date('Y-m-d');
                                $id = $_POST['id'];

                //                echo $txtnobcf15; 
                //                echo $cmbkodemanifest;
                //                echo  $txttglbcf15;
                //                echo  $txtbc11no;
                //                echo  $txtbc11tgl;

                                $edit = mysql_query("UPDATE bcf15 SET
                                                                        idstatusakhir='$cmbstatus',
                                                                        NoKepStatus_Akhr='$txtnokep'
                                                                        
                                                                                WHERE idbcf15='$id'");

                                 mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('updatestatusakhirbtd','$now','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtnokep','')");  
                                 echo '<script type="text/javascript">window.location="index.php?hal=saldobcf15"</script>';
                        }
                        else 
                        { 
                        $id = $_GET['id']; // menangkap id
                        $sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                        $query = mysql_query($sql);
                        $bcf15 = mysql_fetch_array($query);

                        ?>


                        <form method="post" id="editsaldobcf15kep" name="editsaldobcf15kep" action="?hal=editsaldobcf15">
                        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
                        <input type="hidden" name="txtbcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
                        <input type="hidden" name="txttahun" value="<?php echo  $bcf15['tahun']; ?>" />
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Update Saldo</b> </td></tr>
                                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>SKEP</b></td></tr>
                            <tr>
                                <td  align="right" >Status Akhir : </td> 
                                <td> <select id="cmbstatus" name="cmbstatus">
                                    <option value="" selected>--Pilih Status AKhir--</option>
                                            <?php
                                                $sql = "SELECT * FROM statusakhir ORDER BY idstatusakhir";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idstatusakhir]==$bcf15[idstatusakhir]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idstatusakhir]' $cek>$data[statusakhirname]</option>";
                                                }
                                                ?>
                                    </select>
                                
                                </td> 
                            </tr>
                            <tr>
                                <td  align="right"  >NO Kep : </td>
                                <td><input   class="required" id="txtnokep" type="text" name="txtnokep" size="40" value="<?php echo $bcf15['NoKepStatus_Akhr']; ?>" ></input></td>
                            </tr>
                            
                            
                            <tr><td></td><td></td><td><input type="submit" name="editsubmitkep" value="Update" /></td></tr>


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
            <div id="tabs-4">
                <img src="images/kerja.jpg"></img>
                <h2>Sarannya om..</h2>
            </div>
</body>
</html>