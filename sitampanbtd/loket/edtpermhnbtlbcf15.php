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
    <title>Edit Pembatalan Status BCF 1.5</title>
    <!--       jquery anytimes -->
        <script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function() {
              $("#suratbataltpp").tabs({event:"mouseover"}).find(".ui-tabs-nav").sortable();
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
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal3").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal4").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>

    
    </head>
    <body>
        <div id="suratbataltpp">
      <ul>
  	  <li><a href="#tabs-2">Nota Dinas Buka Pos BC 1.1</a></li>   
          <li><a href="#tabs-1">Surat Pembatalan BCF 1.5</a></li>
             
	     <li><a href="#tabs-3">Detail BCF 15</a></li>
             
	     
      </ul>
      <div id="tabs-1">
	     <?php // aksi untuk edit
session_start();
require_once 'lib/function.php'; 

if(isset($_POST['editsubmit4'])) // jika tombol editsubmit ditekan
	{ 
                
            
		$txtsurat = $_POST['txtsurat']; 
                $txttglsurat = $_POST['txttglsurat'];
                $txtagendafro = $_POST['txtagendafro'];
                $txttglagendafro = $_POST['txttglagendafro'];
                $txtagenda_fr = $_POST['txtagenda_fr'];
                $txttglagenda_fr = $_POST['txttglagenda_fr'];
               
                $txthal = $_POST['txthal'];
                $txtpemohon = $_POST['txtpemohon'];
                $txtalamat = $_POST['txtalamat'];
                
                $tahun=date('Y');
                $txtbcf15no = $_POST['txtbcf15no'];
               
                $txtbatal='batalbcf15';
               
                $id = $_POST['id'];
                $now=date('Y-m-d');
               
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
							SuratBatalNo='$txtsurat',
							SuratBatalDate='$txttglsurat',										
                                                        Pemohon='$txtpemohon',
                                                        AlamatPemohon='$txtalamat',
                                                        
                                                        Batal='1'
                        
                                                        	WHERE idbcf15='$id'");
                
                $sql = "select * FROM bukaposbc11 WHERE idbcf15=$id";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
               
                    $editbukapos = mysql_query("UPDATE bukaposbc11 SET
							nosuratpermohonanbatalbcf15='$txtsurat',
							tglsuratpermohonanbatalbcf15='$txttglsurat',										
                                                        nm_pemohon_batal='$txtpemohon',
                                                        tgl_input_permohonan='$nowpos',
                                                        
                                                        
                                                        status='selesai'
                        
                                                        	WHERE idbcf15='$id'");
                }
                else {
                    
                }
                $sqlbtl = "select * FROM suratmasukpembatalanbcf15 WHERE noidbcf15=$id";
                $querybtl = mysql_query($sqlbtl);
                $cekbtl=mysql_numrows($querybtl);
                 if($cekbtl>0){
                $edit1 = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
                        
							noagenda='$txtagendafro',
							tglagenda='$txttglagendafro',										
                                                        nosurat='$txtsurat',
                                                        tanggalsurat='$txttglsurat',
                                                        perihal='$txthal',
                                                        asalsurat='$txtpemohon',
                                                        no_agd_fr='$txtagenda_fr',
                                                        tgl_agd_fr='$txttglagenda_fr'
                        
                                                        	WHERE noidbcf15='$id'");
                 }
                 else {
                     mysql_query("INSERT INTO suratmasukpembatalanbcf15(noagenda,tglagenda,nosurat,tanggalsurat,perihal,asalsurat,noidbcf15,jenissurat,tahun,no_agd_fr,tgl_agd_fr)VALUES('$txtagendafro','$txttglagendafro','$txtsurat','$txttglsurat','$txthal','$txtpemohon','$id','$txtbatal','$tahun','$txtagenda_fr','$txttglagenda_fr')");
                 }
                $_SESSION['logged']=time();
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Edit Permohonan Batal BCF 1.5','$now','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsurat','$txttglsurat')");
                    echo "<script type='text/javascript'>window.location='index.php?hal=editmohonbatal&id=$id'</script>";
                        
        }
        else 
	{ 
        $id = $_GET['id']; // menangkap id
        
	$sql = "select *, idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, bc11no, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl, bc11pos, bc11pos, blno, DATE_FORMAT(bltgl,'%d %M %Y') as bltgl, idtpp,idmanifest, Perintah, suratperintahno, idtp2, suratperintahdate, tahun,ndsegelno,ndsegeldate,idp2,ndkonfirmasino,ndkonfirmasidate,idp2  FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        $sqlsurat = "select * FROM suratmasukpembatalanbcf15 WHERE noidbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$querybcfsurat = mysql_query($sqlsurat);
	$bcfsurat = mysql_fetch_array($querybcfsurat);
        
        ?>
        <form method="post" id="editmohonbatal" name="editmohonbatal" action="?hal=editmohonbatal">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Input Surat Masuk Pembatalan BCF 1.5</b> </td></tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Masukkan Data Agenda Surat Masuk</b></td></tr>
                <tr>
                    <td  align="left" class="judulform" >NP /tanggal</td><td class="judulform">:</td>
                    <td><input class="required" type="text" id="txtagendafro" name="txtagendafro" value="<?php echo $bcfsurat['noagenda']; ?>"/> <input class="required" id="tanggal1" type="text" name="txttglagendafro" value="<?php echo $bcfsurat['tglagenda']; ?>" /> </td>
                </tr>
                
                <tr>
                    <td  align="left" class="judulform" >No Agenda Frontdesk  </td><td class="judulform">:</td>
                    <td><input class="required" type="text" id="txtagenda_fr" name="txtagenda_fr" value="<?php echo $bcfsurat['no_agd_fr']; ?>" /> <input class="required" id="tanggal2" type="text" name="txttglagenda_fr" value="<?php echo $bcfsurat['tgl_agd_fr']; ?>" ></td>
                </tr>
                               
                <tr>
                    <td  width="20%" align="left" class="judulform">No Surat  </td> <td class="judulform">:</td>
                    <td ><input name="txtsurat" id="txtsurat" class="required" type="text" value="<?php echo $bcf15['SuratBatalNo']; ?>" size="40"></input></td>
                    
                </tr>
                <tr>
                    <td  align="left" class="judulform" >Tgl Surat  </td> <td class="judulform">:</td>
                    <td><input class="required" id="tanggal" type="text" name="txttglsurat" value="<?php echo $bcf15['SuratBatalDate']; ?>" ></input></td>
                </tr>
                
                
                
                <tr>
                    <td  align="left" class="judulform" >Hal  </td><td class="judulform">:</td>
                    <td><input class="required" disabled type="text" name="txthal" value="<?php echo $bcfsurat['perihal']; ?>" size="50" ></input></td>
                </tr>
                <tr>
                    <td  align="left" class="judulform" >Pemohon </td><td class="judulform">:</td>
                    <td><input size="40"  class="required" type="text" id="txtpemohon" name="txtpemohon" value="<?php echo $bcf15['Pemohon']; ?>"></input></td>
                </tr>
                <tr>
                    <td  align="left" class="judulform" >Alamat </td><td class="judulform">:</td>
                    <td><input  class="required" type="text" name="txtalamat" value="<?php echo $bcf15['AlamatPemohon']; ?>" size="50"></input></td>
                </tr>
                  
            <tr>
                <td  align="left" >No BCF 15   </td> <td>:</td>
                <td ><input name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?> " disabled />
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
                    </select><input  value="<?php echo $bcf15['tahun']; ?> " disabled />
                </td> 
            </tr>
            <tr>
                <td  align="left"   >Tgl BCF 15  </td><td>:</td>
                <td><input name="txtbcf15tgl" value="<?php echo $bcf15['bcf15tgl']; ?>" disabled  /></td>
            </tr>
            <tr>
                <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
            
            <td align="left">TPP Tujuan </td><td>:</td>
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
                <td colspan="5">
                    
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
            <tr>
                <td colspan="4" align="center"><font  size ="6" color="red"><?php echo $bcf15['idstatusakhir']; ?></font></td>
            </tr>
            <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td><input type="submit" class="button putih bigrounded " name="editsubmit4" value="Simpan"  /></td>
                <td colspan="3"><script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print() {
                    window.open('report/cetaknp_pre.php?id=<?php echo  $bcf15['idbcf15']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=900,height=1300,left=50,top=50,titlebar=yes')
                    }
                    </script>
                    <input type="button" class="button putih bigrounded " value="Print dan Preview" onClick="popup_print()"/> 	</td></tr>
            
            </table>
        </form>

	
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>
      </div>
            <div id="tabs-2">
	     <?php // aksi untuk edit
session_start();
require_once 'lib/function.php'; 
//
//if(isset($_POST['editsubmit5'])) // jika tombol editsubmit ditekan
//	{ 
//                
//            
//		$nobukaposbc11ceisa = $_POST['nobukaposbc11ceisa']; 
//                $tglbukaposbc11ceisa = $_POST['tglbukaposbc11ceisa'];
//                $idseksibukaposbc11ceisa = $_POST['idseksibukaposbc11ceisa'];
//                if($nobukaposbc11ceisa==''){$bukaposbc11ceisa='';} else {$bukaposbc11ceisa='1';}
//                $jawaban_bukaposbc11no = $_POST['jawaban_bukaposbc11no']; 
//                $jawaban_bukaposbc11tgl = $_POST['jawaban_bukaposbc11tgl'];
//                $jawaban_bukaposbc11seksi = $_POST['jawaban_bukaposbc11seksi'];
//                $jawaban_bukaposbc11ket = $_POST['jawaban_bukaposbc11ket'];
//                if($jawaban_bukaposbc11no==''){$jawaban_bukaposbc11='';} else {$jawaban_bukaposbc11='1';}
//                
//                $tahun=date('Y');
//                $txtbcf15no = $_POST['txtbcf15no'];
//               
//                $txtbatal='batalbcf15';
//               
//                $id = $_POST['id'];
//                $now=date('Y-m-d');
//               
////                echo $cmbkodemanifest;
////                echo  $txttglbcf15;
////                echo  $txtbc11no;
////                echo  $txtbc11tgl;
//
//		$edit = mysql_query("UPDATE bcf15 SET
//							bukaposbc11ceisa='$bukaposbc11ceisa',
//							nobukaposbc11ceisa='$nobukaposbc11ceisa',										
//                                                        tglbukaposbc11ceisa='$tglbukaposbc11ceisa',
//                                                        idseksibukaposbc11ceisa='$idseksibukaposbc11ceisa',
//                                                        jawaban_bukaposbc11='$jawaban_bukaposbc11',
//							jawaban_bukaposbc11no='$jawaban_bukaposbc11no',										
//                                                        jawaban_bukaposbc11tgl='$jawaban_bukaposbc11tgl',
//                                                        jawaban_bukaposbc11seksi='$jawaban_bukaposbc11seksi',
//                                                        jawaban_bukaposbc11ket='$jawaban_bukaposbc11ket'
//                                                        
//                                                        
//                                                        	WHERE idbcf15='$id'");
//               
//                
//                $_SESSION['logged']=time();
//               
//                    echo "<script type='text/javascript'>window.location='index.php?hal=editmohonbatal&id=$id'</script>";
//                        
//        }
//        else 
//	{ 
        $id = $_GET['id']; // menangkap id
        
	$sql = "select *, idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, bc11no, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl, bc11pos, bc11pos, blno, DATE_FORMAT(bltgl,'%d %M %Y') as bltgl, idtpp,idmanifest, Perintah, suratperintahno, idtp2, suratperintahdate, tahun,ndsegelno,ndsegeldate,idp2,ndkonfirmasino,ndkonfirmasidate,idp2  FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
                $sql = "select * FROM bukaposbc11 WHERE idbcf15=$bcf15[idbcf15]";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
        
        ?>
                    
                <table>
                    <tr>
                    <?php 
                    $sql = "select * FROM bukaposbc11 WHERE idbcf15=$bcf15[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $datapos = mysql_fetch_array($query);
                    ?>
                    <td colspan="3" bgcolor="#f5b1ad">
                        <font><p>Per Tanggal 18 Maret 2013 Nota Dinas Pembukaan Pos tidak lagi dikirim ke Seksi Administrasi Manifest. Surat Permohonan Pembukaan Pos BC 1.1 pada CEISA di terima langsung oleh Seksi Administrasi Manifest dan dibukukan pada SITAMPAN 2. DIbawah ini merupakan Status Pembukaan Pos BC 1.1 Pada CEISA </p></font>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b> Permohonan Pembukaan Pos BC 1.1</b></td></tr>
                            <tr class="isitabel">
                                <td  align="left"  >Nomor / Tanggal</td><td >:</td>
                                <td><input disabled type="text" id="no_surat_bukapos" name="no_surat_bukapos" value="<?php echo $datapos['no_surat_bukapos']; ?>"/> <input disabled id="tanggal3" type="text" name="tgl_surat_bukapos" value="<?php echo $datapos['tgl_surat_bukapos']; ?>" /> </td>
                            </tr>
                            <tr class="isitabel">
                                <td  align="left"  >Pemohon</td><td >:</td>
                                <td><input disabled type="text" id="nm_pemohon" name="nm_pemohon" value="<?php echo $datapos['nm_pemohon']; ?>"/>  </td>
                            </tr>
                            <tr class="isitabel">
                                <td  align="left"  >Petugas Buka Pos</td><td >:</td>
                                <td><input disabled type="text" id="nm_petugas_rekam" name="nm_petugas_rekam" value="<?php echo $datapos['nm_petugas_rekam']; ?>"/> / <input disabled type="text" id="nip_petugas_rekam" name="nip_petugas_rekam" value="<?php echo $datapos['nip_petugas_rekam']; ?>"/>  </td>
                            </tr>
                            <tr class="isitabel">
                                <td  align="left"  >IP</td><td >:</td>
                                <td><input disabled type="text" id="ip_petugas_rekam" name="ip_petugas_rekam" value="<?php echo $datapos['ip_petugas_rekam']; ?>"/>  </td>
                            </tr>                          
                            <tr class="isitabel">
                                <td  align="left"  >Tgl Input</td><td >:</td>
                                <td><input disabled type="text" id="tgl_input" name="tgl_input" value="<?php echo $datapos['tgl_input']; ?>"/>  </td>
                            </tr>

                            
                            </table>
                        </td>
                    </tr>
                
                </table>

              <?php
                
                }
                else {
                    
                
                
                
                ?>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                    <td colspan="3" bgcolor="#f5b1ad">
                        <font><p>Per Tanggal 18 Maret 2013 Nota Dinas Pembukaan Pos tidak lagi dikirim ke Seksi Administrasi Manifest. Surat Permohonan Pembukaan Pos BC 1.1 pada CEISA di terima langsung oleh Seksi Administrasi Manifest dan dibukukan pada SITAMPAN 2. DIbawah ini merupakan Status Pembukaan Pos BC 1.1 Pada CEISA sebelum tanggal 18 Maret 2013</p></font>
                    </td>
                            <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Rekam Nota Dinas Buka Pos BC 1.1(Ceisa)</b></td></tr>
                            <tr class="isitabel">
                                <td  align="left"  >Nomor / Tanggal</td><td >:</td>
                                <td><input disabled type="text" id="nobukaposbc11ceisa" name="nobukaposbc11ceisa" value="<?php echo $bcf15['nobukaposbc11ceisa']; ?>"/> <input disabled id="tanggal3" type="text" name="tglbukaposbc11ceisa" value="<?php echo $bcf15['tglbukaposbc11ceisa']; ?>" /> </td>
                            </tr>

                            <tr class="isitabel">
                                <td  align="left"  >Seksi  </td><td >:</td>
                                <td><select disabled id="idseksibukaposbc11ceisa" name="idseksibukaposbc11ceisa">
                              <option value="" selected></option>
                                        <?php
                                            $sql = "SELECT * FROM seksi where status_seksi='aktif' and (kdseksi='tpp2' or kdseksi='tpp3') ORDER BY idseksi";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idseksi]==$bcf15[idseksibukaposbc11ceisa]) {
                                                            $cek="selected";
                                                    }
                                                    else {
                                                            $cek="";
                                                    }
                                                    echo "<option value='$data[idseksi]' $cek>$data[nm_seksi].$data[bidang].$data[plh]</option>";
                                            }
                                            ?>
                                </select> </td>
                             </tr>
                             <tr ><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Rekam Jawaban Buka Pos</b></td></tr>
                             <tr class="isitabel">
                                <td  align="left"  >Nomor / Tanggal</td><td >:</td>
                                <td><input disabled type="text" id="jawaban_bukaposbc11no" name="jawaban_bukaposbc11no" value="<?php echo $bcf15['jawaban_bukaposbc11no']; ?>"/> <input disabled id="tanggal4" type="text" name="jawaban_bukaposbc11tgl" value="<?php echo $bcf15['jawaban_bukaposbc11tgl']; ?>" /> </td>
                            </tr>

                            <tr class="isitabel">
                                <td  align="left" >Seksi  </td><td>:</td>
                                <td><select disabled id="jawaban_bukaposbc11seksi" name="jawaban_bukaposbc11seksi">
                              <option value="" selected></option>
                                        <?php
                                            $sql = "SELECT * FROM seksi where status_seksi='aktif' and kdseksi='manifest' ORDER BY idseksi";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idseksi]==$bcf15[jawaban_bukaposbc11seksi]) {
                                                            $cek="selected";
                                                    }
                                                    else {
                                                            $cek="";
                                                    }
                                                    echo "<option value='$data[idseksi]' $cek>$data[nm_seksi].$data[bidang].$data[plh]</option>";
                                            }
                                            ?>
                                </select> </td>
                             </tr>
                             <tr class="isitabel">
                                <td   >Keterangan</td><td >:</td>
                                <td><textarea disabled type="text" id="jawaban_bukaposbc11ket" name="jawaban_bukaposbc11ket" value="" ><?php echo $bcf15['jawaban_bukaposbc11ket']; ?></textarea>  </td>
                            </tr>


            <!--                <tr>
                                <td><input type="submit" class="button putih bigrounded " name="editsubmit5" value="Simpan"  /> </td><td colspan="2"><a href="report/doc/bukaposbc11.php?id=<?php echo $bcf15['idbcf15']; ?>"><input  class="button putih bigrounded "  value="Cetak" /> </a></td>
                            </tr>           -->


                        </table>
                
                
        
        
	<?php
                };
                
                                    }; // penutup else
            ?>
      </div>
            <div id="tabs-3">
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
                <td align="" >No BCF 15  </td> 
                <td width=""><?php echo $bcf15['bcf15no']; ?>
                <select id="cmbmanifest" name="cmbmanifest" disabled>
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
                <td  align="" >Tgl BCF 15  </td>
                <td><?php echo $bcf15['bcf15tgl']; ?></td>
            </tr>
            <tr>
                <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
                <td  align="">No BC 11  </td>
                <td ><?php echo $bcf15['bc11no']; ?></td>
                <td align="">Tanggal BC </td>
                <td><?php echo $bcf15['bc11tgl']; ?></td>
            </tr>
            <tr>
                <td align="">Pos BC 11  </td>
                <td ><?php echo $bcf15['bc11pos']; ?></td>
                <td align="">Sub Pos  </td>
                <td><?php echo $bcf15['bc11subpos']; ?></td>
            </tr>
            <tr>
                <td  align="">No BL  </td>
                <td ><?php echo $bcf15['blno']; ?></td>
                <td align="">Tanggal BL   </td>
                <td><?php echo $bcf15['bltgl']; ?></td>
            </tr>
            <tr>
                <td  align="">Sar. angkut </td>
                <td ><?php echo $bcf15['saranapengangkut']; ?></td>

                <td align="" >Voy   </td>
                <td><?php echo $bcf15['voy']; ?></td>

            </tr>
            <tr>
                <td  align="">Jumlah/satuan  </td>
                <td ><?php echo $bcf15['amountbrg']; ?>
                <?php echo $bcf15['satuanbrg']; ?></td>
            </tr>
            <tr>
                <td  align=""  >Uraian  </td>
                <td   ><?php echo $bcf15['diskripsibrg']; ?></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Consignee / Notify </b></td>
            </tr>
             <tr>
                <td  align="">Consign</td>
                <td><?php echo $bcf15['consignee']; ?></td>
                
            </tr>
            <tr>
                <td align="">Notify </td>
                <td><?php echo $bcf15['notify']; ?></td>
                
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data TPS /TPP </b></td>
            </tr>
            <tr>
                <td align="">Eks TPS</td>
                <td><?php echo $bcf15['idtps']; ?>
                </td>
                <td align="">TPP Tujuan </td>
                <td><select class="required" id="cmbtpp" name="cmbtpp" disabled>
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
                <td align="">FCL / LCL </td>
                <td><select class="required" id="cmbfcl" name="cmbfcl" disabled>
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
                <td align="">Keterangan </td>
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
<?php
//};
//?>