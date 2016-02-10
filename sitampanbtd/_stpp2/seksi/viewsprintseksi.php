<html>
    <head>
    <title>VIEW Sprint BCF 15</title>
    <!--       jquery anytimes -->
        <script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="lib/js/anytimes/anytime.js">
        </script><link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function() {
              $("#sprint").tabs({event:"mouseover"}).find(".ui-tabs-nav").sortable();
           });
        </script>
        <style type="text/css">
            .ui-tabs-panel {
                height: 500px;
                overflow: auto;
            }
           .ui-widget { 
              font-family: Arial,Verdana,sans-serif; 
              font-size: 1.0em;
           }  
           .ui-widget-header { 
              border: 1px solid #e78f08; 
              background: #84B9D5;
              font-weight: bold; }
           .ui-widget-content { 
              border: 1px solid #996600; 
              background: #ffffff;
              color: #003366; 
           }
        </style>
        <script type="text/javascript">
           $(document).ready(function() {
              AnyTime.picker( "tanggal", { 
                 format: "%Y-%m-%d", 
                 firstDOW: 1,
                 labelYear: "Tahun",
                 labelMonth: "Bulan",
                 labelDayOfMonth: "Hari",
                 labelTitle: "Pilih Sebuah Tanggal",
                 dayAbbreviations: [ "Mg", "Sn", "Sl", "Rb", 
                                "Km", "Jm", "Sb"],
                 dayNames: ["Minggu", "Senin", "Selasa", "Rabu", 
                            "Kamis", "Jumat", "Sabtu"],
                 monthAbbreviations: ["Jan","Feb","Mar","Apr","Mei",
                                  "Jun","Jul", "Agu","Sep","Okt",
                                  "Nov","Des"], 
                 monthNames: ["Januari","Februari","Maret","April","Mei",
                                  "Juni","Juli", "Agustus","September",
                                  "Oktober","November","Desember"]                  
              });

              $("#waktu").AnyTime_picker({ 
                 format: "%k:%i:%s", 
                 labelTitle: "Waktu",
                 labelHour: "Jam", 
                 labelMinute: "Menit",
                 labelSecond: "Detik"
               });

           });
        </script> 
       
        <style type="text/css">
           label {
              float: left;
              width: 70px;
              color: blue;
           }

           #waktu { 
              background-image: url("images/clock.png");
              background-position:right center; 
              background-repeat:no-repeat;
              border:1px solid #FFC030;
              color:#3090C0;
              font-weight:bold
           }

           #tanggal { 
              background-image: url("images/calendar.png");
              background-position:right center; 
              background-repeat:no-repeat;
              border:1px solid #FFC030;
              color:#3090C0;
              font-weight:bold
           }
           #tanggal1 { 
              background-image: url("images/calendar.png");
              background-position:right center; 
              background-repeat:no-repeat;
              border:1px solid #FFC030;
              color:#3090C0;
              font-weight:bold
           }
           #tanggal2 { 
              background-image: url("images/calendar.png");
              background-position:right center; 
              background-repeat:no-repeat;
              border:1px solid #FFC030;
              color:#3090C0;
              font-weight:bold
           }

           #AnyTime--field2 {
              background-color: #EFEFEF;
              border:1px solid #CCC
           }
           #AnyTime--field2 * {font-weight:bold}
           #AnyTime--field2 .AnyTime-btn {
              background-color:#F9F9FC;
              border:1px solid #CCC;
              color:#3090C0
           }
           #AnyTime--field2 .AnyTime-cur-btn {
              background-color:#FCF9F6;
              border:1px solid #FFC030;
              color:#FFC030
           }
           #AnyTime--field2 .AnyTime-focus-btn {border-style:dotted}
           #AnyTime--field2 .AnyTime-lbl {color:black}
           #AnyTime--field2 .AnyTime-hdr {
              background-color:#FFC030;
              color:white
           }
        </style>
        <!--       jquery anytimes -->
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#sprint").submit(function() {
                 if ($.trim($("#txtsprint").val()) == "") {
                    alert("Sprint tidak boleh kosong");
                    $("#txtsprint").focus();
                    return false;  
                 }
                  if ($.trim($("#cmbtp2").val()) == "") {
                    alert("Pilih kode surat Penimbunan 2");
                    $("#cmbtp2").focus();
                    return false;  
                 }
                 
                 
              });      
           });
        </script> 
    
    </head>
    <body>
        <div id="sprint">
      <ul>
  	     <li><a href="#tabs-1">Input Sprint</a></li>
	     <li><a href="#tabs-2">Detail BCF 15</a></li>
             
	     
      </ul>
      <div id="tabs-1">
	     <?php // aksi untuk edit
session_start();


if(isset($_POST['editsubmit4'])) // jika tombol editsubmit ditekan
	{ 
                $sql = "SELECT * FROM bcf15 where suratperintahno='txtsprint' and suratperintahdate='txttglsprint' ";
                     $query = mysql_query($sql);
                     $cek=mysql_numrows($query);
                    if($cek>0){
                    echo '<script type="text/javascript">
                    alert("No Surat Pernah di input");</script>';
                    
                }
                else {
            
		$txtsprint = $_POST['txtsprint']; 
                $cmbtp2 = $_POST['cmbtp2'];
                $txttglsprint = $_POST['txttglsprint'];
                $txtbcf15no = $_POST['txtbcf15no'];
                $txttahun = $_POST['txttahun'];
                
                
                $id = $_POST['id'];
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
							suratperintahno='$txtsprint',
							idtp2='$cmbtp2',										
                                                        suratperintahdate='$txttglsprint',
                                                        Perintah='1',
                        
                                                        	WHERE idbcf15='$id'");
                
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('sprintpenarikan','$txttglsprint','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsprint','$txttglsprint')");
                    echo '<script type="text/javascript">window.location="index.php?hal=suratperintah&act=1"</script>';
                }         
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, bc11no, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl, bc11pos, bc11pos, blno, DATE_FORMAT(bltgl,'%d %M %Y') as bltgl, idtpp,idmanifest, Perintah, suratperintahno, idtp2, suratperintahdate, tahun  FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <form method="post" id="sprint" name="sprint" action="?hal=sprint">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Surat Perintah Penarikan</b> </td></tr>
                <tr>
                    <td  colspan="2" align="right" >No Sprint : </td> 
                    <td width="20"><input name="txtsprint" id="txtsprint" type="text" value="<?php echo $bcf15['suratperintahno']; ?>" size="8" maxlength="6" disabled></input></td>
                    <td  width="20%"><select id="cmbtp2" name="cmbtp2" disabled>
                        <option value="" selected>--kd surat tp2--</option>
                                <?php
                                    $sql = "SELECT * FROM tp2 ORDER BY idtp2";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idtp2]==$bcf15[idtp2]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[idtp2]' $cek>$data[kd_tp2]</option>";
                                    }
                                    ?>
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td  align="right" colspan="2" >Tgl Sprint : </td>
                    <td><input disabled  id="tanggal" type="text" name="txttglsprint" value="<?php echo $bcf15['suratperintahdate']; ?>" ></input></td>
                </tr>
                
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Detail BCF 1.5</b></td></tr>
                <tr>
                    
                </tr>    
            <tr>
                <td width="80%"  align="right" >No BCF 15  : </td> 
                <td width="20"><input name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?> " disabled /></td>
                <td  width="20%"><select disabled id="cmbmanifest" name="cmbmanifest">
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
                    </select>
                </td> 
            </tr>
            <tr>
                <td  align="right"   >Tgl BCF 15 : </td>
                <td><input name="txtbcf15tgl" value="<?php echo $bcf15['bcf15tgl']; ?>" disabled  /></td>
            </tr>
            <tr>
                <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
            
            <td align="right">TPP Tujuan :</td>
                <td><select  disabled  id="cmbtpp" name="cmbtpp">
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
            <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td><input type="button" value="Back" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>

	
        
        <script type="text/javascript">new Validation('bcfedit',{useTitles : true},{stopOnFirst:true}, {immediate : true});</script>
	<?php
                     $sql = "SELECT * FROM bcf15 where suratperintahno='$txtsprint' and suratperintahdate='$txttglsprint' ";
                     $query = mysql_query($sql);
                     $cek=mysql_numrows($query);
                    if($cek>0){
                    echo '<script type="text/javascript">
                    alert("No Surat Pernah di input");</script>';
                    
                }
                
               

                    }; // penutup else
            ?>
      </div>
            <div id="tabs-2">
                <?php
                $id = $_GET['id']; // menangkap id
                $sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $bcf15 = mysql_fetch_array($query);

                ?>

	
        <form method="post" id="bcfedit" name="bcfedit" action="?hal=bcfedit">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Detail BCF 15</b> </td></tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>BCF 1.5</b></td></tr>
            <tr>
                <td width="30%" colspan="2" align="right" >No BCF 15  : </td> 
                <td width=""><?php echo $bcf15['bcf15no']; ?></td>
                <td  width="20%"><select id="cmbmanifest" name="cmbmanifest">
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
                    </select>
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
                <td ><?php echo $bcf15['amountbrg']; ?></td>
                <td><?php echo $bcf15['satuanbrg']; ?></td>
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
                <td><select class="required" id="cmbtpp" name="cmbtpp">
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
                <td><select class="required" id="cmbfcl" name="cmbfcl">
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
        </form>
        
       </div>
            

</body>
</html>