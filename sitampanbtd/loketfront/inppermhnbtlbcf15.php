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
                 
                
                 
                 if ($.trim($("#txtsurat").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No SUrat Kosong Harap diisi");
                    $("#txtsurat").focus();
                    return false;  
                 }
                 if ($.trim($("#txtagendafro").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No SUrat Kosong Harap diisiNo Agenda Frontdesk Kosong");
                    $("#txtagendafro").focus();
                    return false;  
                 }
                 if ($.trim($("#txtpemohon").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No SUrat Kosong Harap diisiNo Agenda Frontdesk Kosong");
                    $("#txtpemohon").focus();
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
      background: #f1f2f9;
   }
  #suratbataltpp ul li a  {
       background: #f1f2f9;
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
                
            
		$txtsurat = $_POST['txtsurat']; 
                $txttglsurat = sql($_POST['txttglsurat']);
                $txtagendafro = $_POST['txtagendafro'];
                $txttglagendafro = sql($_POST['txttglagendafro']);
                $txtagenda_fr = $_POST['txtagenda_fr'];
                $txttglagenda_fr = sql($_POST['txttglagenda_fr']);
               
                $txthal = $_POST['txthal'];
                $txtpemohon = $_POST['txtpemohon'];
                $txtalamat = $_POST['txtalamat'];
                
                $tahun=date('Y');
                $txtbcf15no = $_POST['txtbcf15no'];
                
                $cek_suratpermohonan=$_POST['cek1'];
                $cek_sppb=$_POST['cek2'];
                $cek_nhp=$_POST['cek3'];
                $cek_st=$_POST['cek4'];
                $cek_sk=$_POST['cek5'];
                $cek_doklkp=$_POST['cek6'];
                $cek_idcard=$_POST['cek7'];
                $cek_pib=$_POST['cek8'];
                $cek_bc12=$_POST['cek9'];
                $cek_bc30=$_POST['cek10'];
                $lengkap=$_POST['cek11'];
                $cek_tutuppu=$_POST['cek13'];
                $cek_lainnya=$_POST['cek12'];
                $cek_lainnya_char=$_POST['cek12_lain'];
                $nm_st=$_POST['txtnm_st'];
                $nm_ambil=$_POST['txtnm_ambil'];
                $nohp_ambil=$_POST['txtnohp_ambil'];
                
                 //dokumen pemberitahuan dan dokeumen pembatalan
            $DokumenCode=$_POST['DokumenCode'];
            $DokumenNo=$_POST['DokumenNo'];
            $DokumenDate=sql($_POST['DokumenDate']);
            $Dokumen2Code=$_POST['Dokumen2Code'];
            $Dokumen2No=$_POST['Dokumen2No'];
            $Dokumen2Date=sql($_POST['Dokumen2Date']);
            
            $idjalur=$_POST['idjalur'];
            $CacahNo=$_POST['CacahNo'];
            $CacahDate=sql($_POST['CacahDate']);
            
            $nm_petugas_cek=$_SESSION['nm_lengkap'];
            $nip_petugas_cek=$_SESSION['nip_baru'];
            $tgllengkap=date('Y-m-d H:i:s');
            $tglajudok=date('Y-m-d H:i:s');
               
                $txtbatal='batalbcf15';
               
                $id = $_POST['id'];
                $now=date('Y-m-d');
                $nowpos=date('Y-m-d H:i:s');
                
                
             
                //mengecek apakah data sudah pernah diinput atau belum
                //jika sudah di update, jika belum 
                $sql = "select * FROM suratmasukpembatalanbcf15 WHERE noidbcf15=$id";
                $querysbtl = mysql_query($sql);
                $ceksbtl=mysql_numrows($querysbtl);
                if($ceksbtl>0) {
                    //jika ada datanya update bcf15, update suratpembatalan,update bukapos bc 1.1
                    $edit = mysql_query("UPDATE bcf15 SET
							SuratBatalNo='$txtsurat',
							SuratBatalDate='$txttglsurat',										
                                                        Pemohon='$txtpemohon',
                                                        AlamatPemohon='$txtalamat',
                                                        DokumenCode='$DokumenCode',
                                                        DokumenNo='$DokumenNo',
                                                        DokumenDate='$DokumenDate',
                                                        Dokumen2Code='$Dokumen2Code',
                                                        Dokumen2No='$Dokumen2No',
                                                        Dokumen2Date='$Dokumen2Date',
                                                        jalur='$idjalur',
                                                        CacahNo='$CacahNo',
                                                        CacahDate='$CacahDate',
                                                        
                                                        Batal='1'
                        
                                                        	WHERE idbcf15='$id'");
                    
                   $edit = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
							
                        noagenda='$txtagendafro',
                        tglagenda='$txttglagendafro',
                        nosurat='$txtsurat',
                        tanggalsurat='$txttglsurat',
                        perihal='$txthal',
                        asalsurat='$txtpemohon',
                        agendakabid='$txtagendakbd',
                        tglagendakabid='$txttglagendakbd',
                        jenissurat='$txtbatal',
                        tahun='$tahun',
                        no_agd_fr='$txtagenda_fr',
                        tgl_agd_fr='$txttglagenda_fr',
                        cek_nhp='$cek_nhp',
                        cek_sppb='$cek_sppb',
                        cek_st='$cek_st',
                        cek_sk='$cek_sk',
                        cek_doklkp='$cek_doklkp',
                        cek_idcard='$cek_idcard',
                        cek_suratpermohonan='$cek_suratpermohonan',
                        cek_pib='$cek_pib',
                        cek_bc12='$cek_bc12',
                        cek_bc30='$cek_bc30',
                        cek_tutuppu='$cek_tutuppu',
                        cek_lainnya='$cek_lainnya',
                        cek_lainnya_char='$cek_lainnya_char',
                        lengkap='$lengkap',
                        tgllengkap='$tgllengkap',
                        nm_petugas_cek='$nm_petugas_cek',
                        nip_petugas_cek='$nip_petugas_cek',
                        nm_st='$nm_st',
                        nm_ambil='$nm_ambil',
                        nohp_ambil='$nohp_ambil'
                        
                                                        	WHERE noidbcf15='$id'");
                   
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
                             $_SESSION['logged']=time();

                            
                            echo "<script type='text/javascript'>window.location='index.php?hal=pagefront&pilih=inputpermohonan&id=$id'</script>";
                    
                }
                //jika tidak ada maka update bcf15,update buka pos bc 1.1, input surat pembatalan,
                else{
                $edit = mysql_query("UPDATE bcf15 SET
							SuratBatalNo='$txtsurat',
							SuratBatalDate='$txttglsurat',										
                                                        Pemohon='$txtpemohon',
                                                        AlamatPemohon='$txtalamat',
                                                        DokumenCode='$DokumenCode',
                                                        DokumenNo='$DokumenNo',
                                                        DokumenDate='$DokumenDate',
                                                        Dokumen2Code='$Dokumen2Code',
                                                        Dokumen2No='$Dokumen2No',
                                                        Dokumen2Date='$Dokumen2Date',
                                                        jalur='$idjalur',
                                                        CacahNo='$CacahNo',
                                                        CacahDate='$CacahDate',
                                                        
                                                        Batal='1'
                        
                                                        	WHERE idbcf15='$id'");
		
                if($edit){
                    
                    echo "edit berhasil";
                    
                    if($lengkap=='1'){
                        //jika lengkap input tanggal lengkap
                        mysql_query("INSERT INTO suratmasukpembatalanbcf15
                        (
                        noagenda,
                        tglagenda,
                        nosurat,
                        tanggalsurat,
                        perihal,
                        asalsurat,
                        noidbcf15,
                        agendakabid,
                        tglagendakabid,
                        jenissurat,
                        tahun,
                        no_agd_fr,
                        tgl_agd_fr,
                        cek_nhp,
                        cek_sppb,
                        cek_st,
                        cek_sk,
                        cek_doklkp,
                        cek_idcard,
                        cek_suratpermohonan,
                        cek_pib,
                        cek_bc12,
                        cek_bc30,
                        cek_tutuppu,
                        cek_lainnya,
                        cek_lainnya_char,
                        lengkap,
                        tglajudok,
                        tgllengkap,
                        nm_petugas_cek,
                        nip_petugas_cek,
                        nm_st,
                        nm_ambil,
                        nohp_ambil
                        )
                        VALUES
                        (
                        '$txtagendafro',
                        '$txttglagendafro',
                        '$txtsurat',
                        '$txttglsurat',
                        '$txthal',
                        '$txtpemohon',
                        '$id',
                        '$txtagendakbd',
                        '$txttglagendakbd',
                        '$txtbatal',
                        '$tahun',
                        '$txtagenda_fr',
                        '$txttglagenda_fr',
                        '$cek_nhp',
                        '$cek_sppb',
                        '$cek_st',
                        '$cek_sk',
                        '$cek_doklkp',
                        '$cek_idcard',
                        '$cek_suratpermohonan',
                        '$cek_pib',
                        '$cek_bc12',
                        '$cek_bc30',
                        '$cek_tutuppu',
                        '$cek_lainnya',
                        '$cek_lainnya_char',
                        '$lengkap',
                        '$tglajudok',
                        '$tgllengkap',
                        '$nm_petugas_cek',
                        '$nip_petugas_cek',
                        '$nm_st',
                        '$nm_ambil',
                        '$nohp_ambil'
                        
                        )");
                
                
                    }
                    else {
                        //jika tidak lengkap jangan input tgl lengkapnya
                         mysql_query("INSERT INTO suratmasukpembatalanbcf15
                        (
                        noagenda,
                        tglagenda,
                        nosurat,
                        tanggalsurat,
                        perihal,
                        asalsurat,
                        noidbcf15,
                        agendakabid,
                        tglagendakabid,
                        jenissurat,
                        tahun,
                        no_agd_fr,
                        tgl_agd_fr,
                        cek_nhp,
                        cek_sppb,
                        cek_st,
                        cek_sk,
                        cek_doklkp,
                        cek_idcard,
                        cek_suratpermohonan,
                        cek_pib,
                        cek_bc12,
                        cek_bc30,
                        cek_tutuppu,
                        cek_lainnya,
                        cek_lainnya_char,
                        lengkap,
                        tglajudok,
                        nm_petugas_cek,
                        nip_petugas_cek,
                        nm_st,
                        nm_ambil,
                        nohp_ambil
                        )
                        VALUES
                        (
                        '$txtagendafro',
                        '$txttglagendafro',
                        '$txtsurat',
                        '$txttglsurat',
                        '$txthal',
                        '$txtpemohon',
                        '$id',
                        '$txtagendakbd',
                        '$txttglagendakbd',
                        '$txtbatal',
                        '$tahun',
                        '$txtagenda_fr',
                        '$txttglagenda_fr',
                        '$cek_nhp',
                        '$cek_sppb',
                        '$cek_st',
                        '$cek_sk',
                        '$cek_doklkp',
                        '$cek_idcard',
                        '$cek_suratpermohonan',
                        '$cek_pib',
                        '$cek_bc12',
                        '$cek_bc30',
                        '$cek_tutuppu',
                        '$cek_lainnya',
                        '$cek_lainnya_char',
                        '$lengkap',
                        '$tglajudok',
                        '$nm_petugas_cek',
                        '$nip_petugas_cek',
                        '$nm_st',
                        '$nm_ambil',
                        '$nohp_ambil'       
                        
                        )");
                    }
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
                     $_SESSION['logged']=time();
                    
                     mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Permohonan Batal BCF1.5','$now','$txtbcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsurat','$txttglsurat')");
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagefront&pilih=inputpermohonan&id=$id'</script>";
                }
                else {
                    echo "tidak berhasil";
                }
                
                
                    
                   
                  
        
        }
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
        <form method="post" id="inputmohonbatal" name="inputmohonbatal" action="?hal=pagefront&pilih=inputpermohonan">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
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
                                  <li><a href="#tabs-1">Permohonan</a></li>   
                                  <li><a href="#tabs-2">SPPB</a></li>
                                  <li><a href="#tabs-3">NHP</a></li>
                                  <li><a href="#tabs-4">Cetak</a></li>
                                  <li><a href="#tabs-5">Buka Pos</a></li>

                              </ul>
                        
                                <div id="tabs-1" >
                                    <?php 
                                            $sql = "select * from suratmasukpembatalanbcf15 order by idsuratmasuk desc limit 0,1" ; 
                                            $qry = @mysql_query($sql) or die ("Gagal query"); 
                                            $data =mysql_fetch_array($qry); 
                                            $tglagenda=$data['tglagenda'];
                                            $tahunagenda=substr($tglagenda,0,4);
                                            $tahunnow=date('Y');
                                            $tglnow=date('d-m-Y');
                                            
                                            $sql = "select * FROM suratmasukpembatalanbcf15 WHERE noidbcf15=$id";
                                            $query = mysql_query($sql);
                                            $cek=mysql_numrows($query);
                                            $dataada =mysql_fetch_array($query); 
                                            if($cek>0){
                                                $agendasaatini=$dataada['noagenda'];
                                                echo "No NP Saat ini <strong></strong> &nbsp; :<strong>$agendasaatini </strong>";
                                            }
                                            else{
                                                if($tahunagenda==$tahunnow){
                                                $agendasaatini=$data[noagenda]+1;
                                                
                                                echo  " No NP Terakhir <strong></strong> &nbsp; :<strong>$data[noagenda] / $tahunagenda</strong><br/>";
                                                echo "No NP Saat ini <strong></strong> &nbsp; :<strong>$agendasaatini </strong>";
                                            }
                                            else {
                                                $agendasaatini=0+1;
                                                echo "No NP Saat ini <strong></strong> &nbsp; :<strong>$agendasaatini </strong><br/>";
                                                echo "Awal tahun agenda dimulai dari 001 atau 1";
                                            }
                                            }
                                            
                                            ?>
                                    <script type="text/javascript">
                                          $(document).ready(function() {
                                                $("#txtnm_st").keyup(function() {
                                                    var klonisasi = $(this).val();
                                                    $("#txtnm_ambil").val(klonisasi);
                                                });
                                          });  
                                        </script>

                                                <table>
                                                        <tr class="isitabel">

                                                            <td  align="left" class="judulform" >NP /tanggal</td><td class="judulform">:</td>
                                                            <td><input  type="text" id="txtagendafro" name="txtagendafro" value="<?php  echo $agendasaatini ?>" /> <input id="tanggal1" type="text" name="txttglagendafro" value="<?php echo $tglnow; ?>" />(dd/mm/yyyy) </td>
                                                        </tr>

                                                        <tr class="isitabel">
                                                            <td  align="left" class="judulform" >No Agenda Frontdesk  </td><td class="judulform">:</td>
                                                            <td><input type="text" id="txtagenda_fr" name="txtagenda_fr" value="<?php echo $bcfsurat['no_agd_fr']; ?>" /> <input  id="tanggal2" type="text" name="txttglagenda_fr" value="<?php echo $bcfsurat['tgl_agd_fr']; ?>" ></td>
                                                        </tr>

                                                        <tr class="isitabel">
                                                            <td  width="20%" align="left" class="judulform">No Surat  </td> <td class="judulform">:</td>
                                                            <td ><input name="txtsurat" id="txtsurat" type="text" value="<?php echo $bcf15['SuratBatalNo']; ?>" size="20"></input></td>

                                                        </tr>
                                                        <tr class="isitabel">
                                                            <td  align="left" class="judulform" >Tgl Surat  </td> <td class="judulform">:</td>
                                                            <td><input id="tanggal" type="text" name="txttglsurat" value="<?php echo $tglsurat; ?>" ></input></td>
                                                        </tr>



                                                        <tr class="isitabel">
                                                            <td  align="left" class="judulform" >Hal  </td><td class="judulform">:</td>
                                                            <td><input size="30"  type="text" id="txthal" name="txthal" value="Permohonan Pembatalan BCF 1.5"></input></td>
                                                        </tr>
                                                        <tr class="isitabel">
                                                            <td  align="left" class="judulform" >Pemohon </td><td class="judulform">:</td>
                                                            <td><input size="30"   type="text" id="txtpemohon" name="txtpemohon" value="<?php echo $bcf15['Pemohon']; ?>"></input></td>
                                                        </tr>
                                                        <tr class="isitabel">
                                                            <td  align="left" class="judulform" >Alamat </td><td class="judulform">:</td>
                                                            <td><input  type="text" name="txtalamat" value="<?php echo $bcf15['AlamatPemohon']; ?>" size="30"></input></td>
                                                        </tr>
                                                        <tr class="isitabel">
                                                            <td  align="left" class="judulform" >Nama Petugas di ST  </td><td class="judulform">:</td>
                                                            <td><input  type="text" name="txtnm_st" id="txtnm_st" value="<?php echo $bcfsurat['nm_st']; ?>" size="30"></input></td>
                                                        </tr>
                                                        <tr class="isitabel">
                                                            <td  align="left" class="judulform" >Nama Yang Akan Ambil Hasil Pembatalan</td><td class="judulform">:</td>
                                                            <td><input  type="text" name="txtnm_ambil" id="txtnm_ambil" value="<?php echo $bcfsurat['nm_ambil']; ?>" size="30"></input></td>
                                                        </tr>
                                                        <tr class="isitabel">
                                                            <td  align="left" class="judulform" >No HP(jika ada)</td><td class="judulform">:</td>
                                                            <td><input  type="text" name="txtnohp_ambil" id="txtnohp_ambil" value="<?php echo $bcfsurat['nohp_ambil']; ?>" size="30"></input></td>
                                                        </tr>
                                                        
                                                    </table>
                                    
                                    <div>
                                        
                                    </div>
                                </div>
                                <div id="tabs-2">
                                    <table class="isitabel">
                                                                    <tr>
                                                                        <td class="judulform">Jalur :</td>
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
                                                                        <td class="judulform">Dokumen Pemberitahuan</td>
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
                                                                        <td class="judulform">Nomor</td>
                                                                        <td>
                                                                            <input type="text" id="DokumenNo" name="DokumenNo" value="<?php echo $bcf15['DokumenNo']; ?>"/> 
                                                                        </td>
                                                                        
                                                                            
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="judulform">Tanggal</td>
                                                                        <td>
                                                                         <input type="text"  name="DokumenDate" id="tanggal3" value="<?php echo my_ke_tgl($bcf15['DokumenDate']) ?>"/>  
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="judulform">Dokumen Pengeluaran</td>
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
                                                                        <td class="judulform">Nomor</td>
                                                                        <td>
                                                                            <input type="text" id="Dokumen2No" name="Dokumen2No" value="<?php echo $bcf15['Dokumen2No']; ?>"/>
                                                                        </td>
                                                                        
                                                                            
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="judulform">Tanggal</td>
                                                                        <td>
                                                                         <input type="text"  name="Dokumen2Date" id="tanggal4" value="<?php echo my_ke_tgl($bcf15['Dokumen2Date']) ?>"/>
                                                                        </td>
                                                                    </tr>
                                                                      
                                                                </table>
                                </div>
                                <div id="tabs-3">
                                     <table>
                                              <tr>
                                                <td class="judulform">No NHP</td>
                                                <td><input type="text" id="CacahNo" name="CacahNo" value="<?php echo $bcf15['CacahNo'] ?>"/></td>
                                              </tr>
                                              <tr>
                                                 <td class="judulform">Tgl</td>
                                                 <td><input type="text" id="tanggal5" name="CacahDate" value="<?php echo my_ke_tgl($bcf15['CacahDate']) ?>"/></td>
                                              </tr>
                                              </tr>
                                                <?php 
                                                if($bcf15['NHPLelangNo']=='') {echo "<tr><td align='left' class='judulform'>Status NHP Lelang</td><td>Belum Cacah</td></tr>";} else {echo "<tr><td align='left' class='judulform'>NHP Lelang</td><td>Telah Cacah Lelang dengan Nomor :$bcf15[NHPLelangNo] </td></tr>";}
                                                ?>
                                              <?php 
                                            $sql = "SELECT * FROM statusakhir ORDER BY idstatusakhir";
                                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                    if ($data[idstatusakhir]==$bcf15[idstatusakhir]) {

                                                                   
                                                                    echo "<span>Status Akhir :$data[statusakhirname]</span>";
echo "<script type='text/javascript'>alert('$data[statusakhirname]');</script>";
                                                                    }

                                                            }
                                            ?>
                                              
                                     </table>
                                </div>
                            <div id="tabs-4">
                                <script type="text/javascript">
                                       $(document).ready(function() {    
                                          $(".cek12_lain").hide();

                                          

                                          $(".cek12").click(function(e) {
                                               if ($(e.target).val() == "1")
                                                  $(".cek12_lain").show();
                                               else  
                                                  $(".cek12_lain").hide();
                                          });        
                                       });   
                                    </script>        

                                            <div style="background-image: url(images/bkgd-header.jpg); color:#fff">
                                                <span >Apakah Dokumen ini telah lengkap</span>
                                                <input type="checkbox" value="1" name="cek11" id="cek11" <?php  if($bcfsurat['lengkap'] == 1){echo 'checked="checked"';}?>> Ya Lengkap 
                                                
                                            </div>
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
                                    <span>Simpan kemudian dicetak lembar kekurangan maupun kelengkapan dokumen. Lembar kelengkapan dapat menjadi tanda terima permohonan </span>
                                    <fieldset>
                                        <div bgcolor="#fff">
                                            <span bgcolor="red">
                                                  <?php 
                                                    if($bcfsurat['lengkap'] == 1){
                                                        echo "<a href='loketfront/suratpenerimaan.php?id=$id'><font color=red size=5>Cetak Tanda Terima</font></a>";
                                                    }
                                                    elseif($bcfsurat['lengkap'] == 0){
                                                        echo "<a href='loketfront/suratpenolakan.php?id=$id'><font color=red size=5>Cetak Nota Penolakan</font></a>";
                                                    }
                                                   ?>
                                                </span>
                                                <br/> 
                                                <?php
                                                if($bcfsurat['lengkap'] == 1){
                                                    echo "diterima lengkap tanggal $bcfsurat[tgllengkap]";
                                                }
                                                else{
                                                    echo "<span><font color=red>Dokumen belum lengkap</font></span>";
                                                }
                                                ?>
                                        </div>
                                    </fieldset>
                                    <div>
                                
                                        <input class="button putih bigrounded " type="submit" name="editsubmit4" value="Simpan" onclick="javascript:return confirm('Anda Yakin Untuk Menyimpan ?')"   /> <input class="button putih bigrounded " type="button" value="Back" onclick="self.history.back()" />
                                    </div>
                            </div>
                             <div id="tabs-5">
                                 <?php 
                $sql = "select * FROM bukaposbc11 WHERE idbcf15=$bcf15[idbcf15]";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
        
                ?>
                    
                                    <table bgcolor="#77a3cf">
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
                                                <tr class="isitabel">
                                                    <td  align="left"  >Status</td><td >:</td>
                                                    <td><input disabled type="text" id="status" name="status" value="<?php echo $datapos['status']; ?>"/>  </td>
                                                </tr>


                                                </table>
                                            </td>
                                        </tr>

                                    </table>

                                  <?php

                                    }
                                    ?>
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