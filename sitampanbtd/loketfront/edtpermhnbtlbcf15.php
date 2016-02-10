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
    <title>Pembatalan Status BCF 1.5</title>
    <!--       jquery anytimes -->
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
        
<!--        <script type="text/javascript" src="lib/js/jquery.tools.min.js"></script>-->
         
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#inputmohonbatal").submit(function() {
                 
                
                 
                 if ($.trim($("#statussurat").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Tetapkan dokumen ini apakah akan dikonfirmasi atau segera dibatalkan.");
                    $("#statussurat").focus();
                    return false;  
                 }
                 
                 
                 if ($.trim($("#status").val()) == "5") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Gagal simpan..Status barang BTD SIAP LELANG. Hub Pemeriksa Penimbunan");
                    $("#status").focus();
                    return false;  
                 }
                 if ($.trim($("#status").val()) == "6") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Gagal simpan..Status barang BTD LELANG. Hub Pemeriksa Penimbunan");
                    $("#status").focus();
                    return false;  
                 }
                 if ($.trim($("#status").val()) == "7") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Gagal simpan..Status barang BTD LELANG. Hub Pemeriksa Penimbunan");
                    $("#status").focus();
                    return false;  
                 }
                 if ($.trim($("#status").val()) == "9") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Gagal simpan..Status barang BMN. Hub Pemeriksa Penimbunan");
                    $("#status").focus();
                    return false;  
                 }
                 if ($.trim($("#status").val()) == "15") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Gagal simpan.. BCF 1.5 sedang Atensi Pemeriksa, Hubungi Pemeriksa Penimbunan");
                    $("#status").focus();
                    return false;  
                 }
                 if ($.trim($("#status").val()) == "8") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Gagal simpan..Proses Pembatalan Tdk dpt dilanjutkan Status Akhir Barang ini adalah KEP Musnah");
                    $("#status").focus();
                    return false;  
                 }
              });      
           });
        </script>
        

        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#tanggal').mask('99/99/9999');
               $('#tanggal1').mask('99/99/9999');
               $('#tanggal2').mask('99/99/9999');
               $('#tanggal3').mask('99/99/9999');
               $('#tanggal4').mask('99/99/9999');
               $('#tanggal5').mask('99/99/9999');
               $('#tanggal6').mask('99/99/9999');
               $('#tanggal7').mask('99/99/9999');
           });
         </script>
         <script type="text/javascript">
      $(document).ready(function() {
	       $('#ceksemua').click(function () {
		        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
	       });
      });  
    </script>
    <script type="text/javascript"> 
      $(document).ready(function(){
        $(".flip").click(function(){
          $(".pesan").slideToggle("slow");
        });
      });
    </script>
    <script type="text/javascript"> 
      $(document).ready(function(){
        	$("#flowtabs").tabs("#flowpanes > div");


	    });
	</script>


    <style type="text/css"> 
      div.pesan {
        height:250px;
        display:none;
        float: none;
      }
      div.pesan, p.flip {
        margin: 0px;
        padding: 5px;
        text-align: center;
        background: #bed4e9;
        border: 1px solid black;
        cursor: pointer;
        
      }
      
      .ui-widget { 
      font-family: Arial,Verdana,sans-serif; 
      font-size: 1.0em;
   }  
   .ui-widget-header { 
      border: 1px solid #2b3846; 
      background: #2b3846;
      font-weight: bold; }
   .ui-widget-content { 
      border: 1px solid #2b3846; 
      background: #f1f2f9;
      color: #182e43; 
      
   }
   .tabs-bottom .ui-tabs-panel { 
      height: 450px; 
      overflow: auto; 
   } 
   .tabs-bottom .ui-tabs-nav { 
      position: absolute; 
      left: 0; 
      bottom: 0; 
      right:0; 
      padding: 0 0.2em 0.2em 0; 
   }  
   .tabs-bottom .ui-tabs-nav li { 
      margin-top: -2px; 
      margin-bottom: 1px; 
      border-bottom-width: 1px; 
      border-top: none;
      background: #d6dceb;
   }
  #suratbataltpp ul li a  {
       background: #d6dceb;
   }
   .tabs-bottom .ui-tabs-nav li.ui-tabs-selected { 
      margin-top: -10px; 
      background: #eee;
   }   

     
    </style>
    <script type="text/javascript">
           $(document).ready(function() {
              $("#suratbataltpp").tabs({collapsible:"true"}).find(".ui-tabs-nav").sortable();
              $("#suratbataltpp").tabs({
                  fx:{
                      opacity :"toggle",
                      duration: "slow"
                  }
              })
           });
    </script>

    </head>
    <body>
       
	     <?php // aksi untuk edit
session_start();


if(isset($_POST['editsubmit4'])) // jika tombol editsubmit ditekan
	{ 
                
            
		
            $nm_petugas_cek=$_SESSION['nm_lengkap'];
            $statussurat=$_POST['statussurat'];
            $keteranganstatus=$_POST['keteranganstatus'];
            $tgllengkap=date('Y-m-d H:i:s');
            $lengkap=$_POST['lengkap'];
            
            $id = $_POST['id'];
            $now=date('Y-m-d');
            
            
                        $edit = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
                        
                        statussurat='$statussurat',
                        keteranganstatus='$keteranganstatus',
                        tgltapstatus='$tgllengkap',
                        nm_petugastapstatus='$nm_petugas_cek'
                        
                                                        	WHERE noidbcf15='$id'");
                  echo "<script type='text/javascript'>window.location='index.php?hal=pagefront&pilih=daftardoklengkap'</script>";
                
                
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select *  FROM bcf15,tpp,typecode WHERE bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tglsurat=view($bcf15['SuratBatalDate']);
        
        
        $sqlsurat = "select * FROM suratmasukpembatalanbcf15 WHERE noidbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$querybcfsurat = mysql_query($sqlsurat);
	$bcfsurat = mysql_fetch_array($querybcfsurat);
        
        ?>
        <form method="post" id="inputmohonbatal" name="inputmohonbatal" action="?hal=pagefront&pilih=distribusi">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="lengkap" value="<?php echo  $bcfsurat['lengkap']; ?>" />
       <input type="hidden" name="status" id="status" value="<?php echo $bcf15['idstatusakhir']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" >
                <tr>
                    <td colspan="5" class="judulbreadcrumb">Permohonan Pembatalan BCF 1.5 </td>
                        
                   
                </tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Detail BCF 1.5</b></td></tr>
                <tr>
                    <td>
                        <div class="pesan">
                            <table>
                                <tr>
                                        <td  align="left" class="judulform">No BCF 15   </td> <td class="judulform">:</td>
                                        <td ><?php echo $bcf15['bcf15no']; ?> 

                                                    <?php
                                                        $sql = "SELECT * FROM manifest ORDER BY idmanifest";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idmanifest]==$bcf15[idmanifest]) {

                                                                echo "$data[kd_manifest]";
                                                        }
                                                        }
                                                        ?>
                                            <?php echo $bcf15['tahun']; ?> <a href="?hal=detailstatusakhirman&id=<?php echo $bcf15[idbcf15]; ?>" target="_blank" title="Detail BCF 1.5"><img src="images/new/view.png" /></a>
                                        </td> 
                                    </tr>

                                    <tr>
                                        <td  align="left" class="judulform"  >Tgl BCF 15  </td><td class="judulform">:</td>
                                        <td><?php echo tglindo($bcf15['bcf15tgl']); ?></td>
                                    </tr>
                                    <tr>
                                            <td  align="left"  class="judulform">Consignee </td><td class="judulform">:</td>
                                            <td><?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="To The Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];};?></td>
                                   </tr>
                                    <tr>
                                            <td  align="left"  class="judulform">TPP Tujuan </td><td class="judulform">:</td>
                                            <td><?php echo "$bcf15[nm_tpp]"?></td>
                                   </tr>
                                    <tr>

                                    <td align="left" class="judulform">Lokasi Barang </td><td class="judulform">:</td>
                                        <td>
                                          <?php if ($bcf15['bamasukno']=="") {echo "<font color='red'>TPS $bcf15[idtps]</font>"; } else  {echo "<font color='green'>TPP $bcf15[nm_tpp]</font>";};?>
                                        </td>

                                    </tr>
                                    <tr>
                                    <td align="left" class="judulform">Type Cont </td><td class="judulform">:</td>
                                        <td>
                                          <?php echo $bcf15['nm_type']; ?> 
                                        </td>

                                    </tr>
                                    <?php 
                                    if($bcf15['NHPLelangNo']=='') {echo "<tr><td align='left' class='judulform'>Status NHP Lelang</td><td class='judulform'>:</td><td>Belum Cacah</td></tr>";} else {echo "<tr><td align='left' class='judulform'>NHP Lelang</td><td class='judulform'>:</td><td>Telah Cacah Lelang dengan Nomor :$bcf15[NHPLelangNo] </td></tr>";}
                                    ?>
                            </table>
                        </div>
                <blink><p class="flip"><b>Tampilkan dan Sembunyikan Detail BCF 1.5</b></p></blink>

                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Cek List Dokumen</a></li>   
                                  <li><a href="#tabs-2">Tetapkan Status Konfirmasi / Pembatalan</a></li>
                                  
                                
                              </ul>
                        
                                <div id="tabs-1" >
                                   
                                                
                                           
                                            <div class="demo" style="width: auto;">

                                              <h4>Centang persyaratan dokumen yang telah dipenuhi : </h4>
                                              <fieldset>
                                                <input type="checkbox" name="cek1" id="cek1" class="suratpermohonan" value="1"  <?php  if($bcfsurat['cek_suratpermohonan'] == 1){echo 'checked="checked"';}?> > Permohonan<br/>
                                                <input type="checkbox" name="cek2" id="cek2" class="sppb" value="1" <?php  if($bcfsurat['cek_sppb'] == 1){echo 'checked="checked"';}?>> SPPB Asli / Persetujuan Reekspor/ ND Kasi Manifest(Ret Pack)   <br/>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="cek8" id="cek8" class="pib" value="1" <?php  if($bcfsurat['cek_pib'] == 1){echo 'checked="checked"';}?>> PIB / BC 2.3  <br/>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="cek9" id="cek9" class="bc12" value="1" <?php  if($bcfsurat['cek_bc12'] == 1){echo 'checked="checked"';}?>> BC 1.2   <br/>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="cek10" id="cek10" class="bc30" value="1" <?php  if($bcfsurat['cek_bc30'] == 1){echo 'checked="checked"';}?>> BC 3.0   <br/>
                                                <input type="checkbox" name="cek3" id="cek3" value="1" class="nhp" <?php  if($bcfsurat['cek_nhp'] == 1){echo 'checked="checked"';}?> > NHP Asli<br/>
                                                <input type="checkbox" name="cek4" value="1" id="cek4" <?php  if($bcfsurat['cek_st'] == 1){echo 'checked="checked"';}?>> Surat Tugas<br>
                                                <input type="checkbox" name="cek5" value="1" id="cek5" <?php  if($bcfsurat['cek_sk'] == 1){echo 'checked="checked"';}?>> Surat Kuasa<br>
                                                <input type="checkbox" name="cek6" value="1" id="cek6" <?php  if($bcfsurat['cek_doklkp'] == 1){echo 'checked="checked"';}?>> Inv/Pck List / BL<br>
                                                <input type="checkbox" name="cek7" value="1" id="cek7" <?php  if($bcfsurat['cek_idcard'] == 1){echo 'checked="checked"';}?>> Id Card<br>
                                                <input type="checkbox" name="cek13" value="1" id="cek13" <?php  if($bcfsurat['cek_tutuppu'] == 1){echo 'checked="checked"';}?>>Tutup PU (SPPB H/K/M/MITAP/NP)<br>
                                                <input type="checkbox" name="cek12" value="1" id="cek12" class="cek12" <?php  if($bcfsurat['cek_lainnya'] == 1){echo 'checked="checked"';}?>> Lainnya<span class="cek12_lain">. Sebutkan:</span>
                                                       <input type="text" id="cek12_lain" name="cek12_lain" 
                                                              value="<?php echo $bcfsurat['cek_lainnya_char']; ?>"  class="cek12_lain" />
                                                <br><hr>

                                                <input type="checkbox" id="ceksemua">Check All<br>

                                              </fieldset>

                                            </div>
                                    <table>
                                        <tr valign="top">
                                            <td width="50%" clas="isitabel">
                                                <span style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Dokumen Pengeluaran</span>
                                                        <table class="isitabel">
                                                                    <tr>
                                                                        
                                                                        <td class="isitabelnew">Jalur :</td>
                                                                        <td>
                                                                           <select id="idjalur" name="idjalur" >
                                                                            <option value="" selected>::Jalur::</option>
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
                                                                            </select> 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="isitabelnew">Dokumen Pemberitahuan</td>
                                                                        <td>
                                                                            <select  id="DokumenCode" name="DokumenCode" >
                                                                                <option value="" selected>--Dokumen Pemberitahuan--</option>
                                                                                <?php
                                                                                    $sql = "SELECT * FROM dokumen where jenis='pemberitahuan' ORDER BY iddokumen";
                                                                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                                                                    while ($data =mysql_fetch_array($qry)) {
                                                                                            if ($data[iddokumen]==$bcf15[DokumenCode]) {
                                                                                                    $cek="selected";
                                                                                            }
                                                                                            else {
                                                                                                    $cek="";
                                                                                            }
                                                                                            echo "<option value='$data[iddokumen]' $cek>$data[dokumenname]</option>";
                                                                                    }
                                                                                    ?>
                                                                        </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="isitabelnew">Nomor</td>
                                                                        <td>
                                                                            <input type="text" id="DokumenNo" name="DokumenNo" value="<?php echo $bcf15['DokumenNo']; ?>"/> 
                                                                        </td>
                                                                        
                                                                            
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="isitabelnew">Tanggal</td>
                                                                        <td>
                                                                         <input type="text"  name="DokumenDate" id="tanggal3" value="<?php echo my_ke_tgl($bcf15['DokumenDate']) ?>"/>  
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="isitabelnew">Dokumen Pengeluaran</td>
                                                                        <td>
                                                                            <select  id="Dokumen2Code" name="Dokumen2Code" >
                                                                                <option value="" selected>--Dokumen Pengeluaran--</option>
                                                                                <?php
                                                                                    $sql = "SELECT * FROM dokumen where jenis='keluar' ORDER BY iddokumen";
                                                                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                                                                    while ($data =mysql_fetch_array($qry)) {
                                                                                            if ($data[iddokumen]==$bcf15[Dokumen2Code]) {
                                                                                                    $cek="selected";
                                                                                            }
                                                                                            else {
                                                                                                    $cek="";
                                                                                            }
                                                                                            echo "<option value='$data[iddokumen]' $cek>$data[dokumenname]</option>";
                                                                                    }
                                                                                    ?>
                                                                        </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="isitabelnew">Nomor</td>
                                                                        <td>
                                                                            <input type="text" id="Dokumen2No" name="Dokumen2No" value="<?php echo $bcf15['Dokumen2No']; ?>"/>
                                                                        </td>
                                                                        
                                                                            
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="isitabelnew">Tanggal</td>
                                                                        <td>
                                                                         <input type="text"  name="Dokumen2Date" id="tanggal4" value="<?php echo my_ke_tgl($bcf15['Dokumen2Date']) ?>"/>
                                                                        </td>
                                                                    </tr>
                                                                      
                                                                </table>
                                                
                                            </td>
                                            <td width="50%" >
                                                <span style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Status Akhir</span><br/>
                                                     <?php 
                                                       $sql = "SELECT * FROM statusakhir where idstatusakhir=$bcf15[idstatusakhir]";
                                                       $qry = mysql_query($sql) ;
                                                       $datastatusakhir=mysql_fetch_array($qry);
                                                       $cek=mysql_numrows($qry);
                                                       if($cek>0){
                                                           echo "<table >
                                                                        <tr>

                                                                            <td class=isitabelnew>Status Akhir</td>
                                                                            <td>$datastatusakhir[statusakhirname]</td>

                                                                        </tr>

                                                                </table>
                                                           ";
                                                           }
                                                     else {
                                                            echo "<table  >
                                                                        <tr>

                                                                            <td class=isitabelnew>Status Akhir</td>
                                                                            <td>BCF 1.5</td>

                                                                        </tr>

                                                                </table>";
                                                        }

                                                       $sqlblokir = "SELECT * FROM blokir_perusahaan where (nm_perusahaan like %$bcf15[consignee]% or nm_perusahaan like %$bcf15[notify]%) and status_blokir='blokir' ";
                                                       $qryblokir = mysql_query($sqlblokir) ;
                                                       $datablokir=mysql_fetch_array($qryblokir);
                                                       $cek=mysql_numrows($qry);
                                                       if($cek>0){
                                                           echo "<table  >
                                                                        <tr>

                                                                            <td class=isitabelnew>Status Blokir</td>
                                                                            <td>Blokir Sesuai Surat dari P2 Nomor $datablokir[surat_blokir] tanggal $datablokir[tgl_blokir]</td>

                                                                        </tr>

                                                                </table>";
                                                       }
                                                       else {
                                                           echo "<table  >

                                                                        <tr>

                                                                            <td class=isitabelnew>Status Blokir Perusahaan</td>
                                                                            <td><u>Tidak terblokir<u></td>

                                                                        </tr>

                                                                </table>";
                                                       }

                                                                                  ?>   

                                            </td>
                                        </tr>
                                    </table>
                                            
                                                  
                                                  
                                    
                                    
                                </div>
                                <div id="tabs-2">
                                            <div style="background-image: url(images/bkgd-header.jpg); color:#fff">
                                                <span style="text-decoration: none;color: #fff; font-weight: bolder;font-family: verdana;" >Apakah Dokumen ini telah lengkap</span>
                                                <input type="checkbox" value="1" name="cek11" id="cek11" <?php  if($bcfsurat['lengkap'] == 1){echo 'checked="checked"';}?>> Ya Lengkap 
                                                
                                            </div> 
                                                <table class="isitabel">
                                                                                <tr>

                                                                                    <td class="isitabelnew">Jalur :</td>
                                                                                    <td>
                                                                                       <select id="idjalur" disabled name="idjalur" >
                                                                                        <option value="" selected>::Jalur::</option>
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
                                                                                        </select> 
                                                                                    </td>
                                                                                </tr>
                                                                                <script type="text/javascript">
                                                                                   $(document).ready(function() {    
                                                                                      $(".ketstatus").hide();



                                                                                      $(".tapstatus").click(function(e) {
                                                                                           if ($(e.target).val() == "pembatalan")
                                                                                              $(".ketstatus").show();
                                                                                           else 
                                                                                              $(".ketstatus").hide();
                                                                                      });        
                                                                                   });   
                                                                                </script> 
                                                                                <?php
                                                                                $sqljalur = "SELECT * FROM jalur where idjalur=$bcf15[jalur]";
                                                                                $qryjalur = mysql_query($sqljalur);
                                                                                $datajalur=mysql_fetch_array($qryjalur);
                                                                                if($bcf15[jalur]=='4') {
                                                                                    $jalur='karena jalur MITA Prioritas';
                                                                                }
                                                                                elseif($bcf15[jalur]=='5'){
                                                                                    $jalur='karena jalur MITA Non Prioritas';
                                                                                }
                                                                                else{
                                                                                    $jalur='';
                                                                                }
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                  $(document).ready(function() {
                                                                                        $(':input:not([type="submit"])').each(function() {
                                                                                            $(this).focus(function() {
                                                                                                $(this).addClass('hilite');
                                                                                            }).blur(function() {
                                                                                                $(this).removeClass('hilite');});
                                                                                         });
                                                                                  });  
                                                                                </script>
                                                                                

                                                                                <style>   
                                                                                  .hilite{
                                                                                           background-color: #FDECB2;
                                                                                  }
                                                                                </style>               
                                                                                <tr>
                                                                                    <td class="isitabelnew">Tetapkan Status Tindak Lanjut :</td>
                                                                                    <td>
                                                                                        <select class="tapstatus" name="statussurat" id="statussurat">
                                                                                            <option value="" >Pilih Tindak Lanjut</option>
                                                                                            <option value="konfirmasi" >Konfirmasi</option>
                                                                                            <option value="pembatalan" >Pembatalan</option>
                                                                                            
                                                                                        </select>
                                                                                        <?php
                                                                                        if($bcfsurat['statussurat']==''){
                                                                                            echo "Anda Belum Memilih";
                                                                                        }
                                                                                        else {
                                                                                            echo "$bcfsurat[statussurat]";
                                                                                        }
                                                                                        ?>
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="ketstatus isitabelnew" >Masukan Catatan Kenapa segera dibatalkan</td>
                                                                                    <td>
                                                                                        <input type="text" size="50" id="keteranganstatus" value="<?php if($bcfsurat[keteranganstatus]==''){echo $jalur;} else {echo $bcfsurat[keteranganstatus];}?>" name="keteranganstatus" class="ketstatus required" />
                                                                                    </td>
                                                                                </tr>
                                                </table>
                                                 <input class="button putih bigrounded " type="submit" name="editsubmit4" value="Simpan" onclick="javascript:return confirm('Anda Yakin Untuk Menyimpan ?')"   /> 
                                </div>
                                
                                                               
                            
                            
                            </div>
                    </td>
                </tr>
                
                <tr>
                
                </tr>
                
            
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