<?php
include "../lib/koneksi.php";
include "../lib/function.php";
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
    <title>Update Status BCF 1.5</title>
    <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>

   <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
              
               
               $('#tanggal1').mask('99/99/9999');
               $('#tanggal2').mask('99/99/9999');
           });
         </script>
         <script type="text/javascript">
      $(document).ready(function() {
	    $(':input:not([type="submit"])').each(function() {
	        $(this).focus(function() {
	            $(this).parent().addClass('hilite');
	        }).blur(function() {
	            $(this).parent().removeClass('hilite');});
	    });
      });  
    </script>
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
       
    
    </head>
    <body>
        
       
                    <?php // yang belum koneksi database diabaikan aja dulu file ini
                    ob_start();
                     session_start();
                     include 'lib/function.php';


                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                    /*
                    cara baca halaman ini :
                    pilih sembarang dari table user
                    buatkan header table (dengan perintah <th>)
                    hingga (while) data habis, buatkan baris baru dengan isi data sesuai yang di echo
                    tutup table
                    */
                    //$sql = "SELECT * FROM user";
                    //$query = mysql_query($sql);
                    //$nourut=1;
                    ?>
                    <table width="100%"><tr><td class="judultabel1">Saldo BTD</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=saldobtdkabid"; ?> >
                    
                        <table border="0" bgcolor="#eeefff" class="isitabel">
                        
                        <tr bgcolor="#eee">
                            <td class="isitabel" colspan="2"><b>Dibawah ini merupakan BCF 1.5 yang telah masuk ke TPP dan belum dibatalkan (saldo di TPP)</b></td>
                        </tr>
                        <tr valign="top">
                            <td>
                                <table class="isitabel" bgcolor="#eee" border="0">
                                    <tr><td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;"><b>Pilih Kriteria Pencarian BCF 1.5</b></td></tr>
                          
                             <tr>
                             <td ><input  type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?>>No BCF 1.5</td>
                             <td><input size="10" type="text"  class="required" name="bcf15no" value="<?php echo $_POST['bcf15no']?>"></td>
                             
                             <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Tahun BCF 1.5 (2013 dst)</td>
                             <td><input type="text" size="10" class="required" name="tahun" value="<?php echo $_POST['tahun']?>"></td>
                             </tr>
                             
                             <tr>
                             <td><input type="checkbox" name="Bc11no" value="1"  <?php  if($_POST['Bc11no'] == 1){echo 'checked="checked"';}?>>No BC 1.1 </td>
                             <td><input size="10" type="text"  class="required" name="bc11no" value="<?php echo $_POST['bc11no']?>"> </td>
                             
                             <td><input type="checkbox" name="Bc11pos" value="1"  <?php  if($_POST['Bc11pos'] == 1){echo 'checked="checked"';}?>>No Pos BC 1.1  </td>
                             <td><input type="text" size="10" class="required" name="bc11pos" value="<?php echo $_POST['bc11pos']?>"></td>
                             </tr>
                             <tr>
                             <td><input type="checkbox" name="Blno" value="1"  <?php  if($_POST['Blno'] == 1){echo 'checked="checked"';}?>>No BL </td>
                             <td><input size="10" type="text"  class="required" name="blno" value="<?php echo $_POST['blno']?>">  </td>
                             </tr>
                             <tr>
                             <td><input type="checkbox" name="nHPLelangNo" value="1"  <?php  if($_POST['nHPLelangNo'] == 1){echo 'checked="checked"';}?>>No NHP </td>
                             <td><input size="10" type="text" class="required"  name="NHPLelangNo" value="<?php echo $_POST['NHPLelangNo']?>">  </td>
                             </tr>
                             <tr>
                                 <td colspan="4">
                                     <table border="0" class="isitabelnew" width="100%">
                                         <tr>
                                             <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Filter Data Proses</td>
                                         </tr>
                                         <tr>
                                         <td colspan="4" ><input type="checkbox" name="Lebih60hari" value="1"  <?php  if($_POST['Lebih60hari'] == 1){echo 'checked="checked"';}?>>Lebih 60 Hari ditimbun di TPP</td>
                                         
                                         </tr>
                                         <tr>
                                         <td ><input type="checkbox" name="Bmn" value="1"  <?php  if($_POST['Bmn'] == 1){echo 'checked="checked"';}?>>BMN</td>
                                         <td ><input type="checkbox" name="Lelang" value="1"  <?php  if($_POST['Lelang'] == 1){echo 'checked="checked"';}?>>BTD Lelang</td>
                                         <td ><input type="checkbox" name="Musnah" value="1"  <?php  if($_POST['Musnah'] == 1){echo 'checked="checked"';}?>>BTD Musnah</td>
                                         </tr>
                                     </table>
                                 </td>
                             </tr>
                             
                             
                             
                                </table>
                            </td>
                            <td>
                                <table class="isitabel" bgcolor="#eee" border="0">
                                    <tr><td colspan="2" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;"><b>Filter Download</b></td></tr>
                          
                                     <tr>
                                     <td width="200"><input type="checkbox" name="Idtpp" value="1"  <?php  if($_POST['Idtpp'] == 1){echo 'checked="checked"';}?>>TPP</td>
                                     <td>
                                         <select class="isitabel" id="idtpp" name="idtpp">
                                          <option value="" selected></option>
                                                    <?php
                                                        $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idtpp]==$_POST[idtpp]) {
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
                             <td><input type="checkbox" name="nHPLelangDate" value="1"  <?php  if($_POST['nHPLelangDate'] == 1){echo 'checked="checked"';}?>>Tgl NHP </td>
                             <td><input type="text" size="10"  id="tanggal1" name="NHPLelangDate1" value="<?php echo $_POST['NHPLelangDate1']?>"> sd <input type="text" size="10" id="tanggal2" name="NHPLelangDate2" value="<?php echo $_POST['NHPLelangDate2']?>"> </td>
                             </tr>
                             
                                </table>
                            </td>
                        </tr>
                              
                    <tr><td><input class="button putih bigrounded " type="submit" name="Submit2" value="Cari" class="submitsearch" /></td></tr>
                    <tr><td><input name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
               
                    <?php
                    
                    if (($mode=='cari')) {
                        
                        if (isset($_POST['Bcf15no']))
                                        {
                                           $bcf15no = $_POST['bcf15no'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bcf15.bcf15no LIKE '%$bcf15no%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15.bcf15no LIKE '%$bcf15no%'";
                                           }
                                        }
                                        if (isset($_POST['Tahun']))
                                        {
                                           $tahun = $_POST['tahun'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bcf15.tahun='$tahun'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15.tahun='$tahun'";
                                           }
                                        }
                                        if (isset($_POST['Bc11no']))
                                        {
                                           $bc11no = $_POST['bc11no'];
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bc11no LIKE '%$bc11no%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bc11no LIKE '%$bc11no%'";
                                           }
                                        }
                                        if (isset($_POST['Bc11pos']))
                                        {
                                           
                                           $bc11pos = $_POST['bc11pos'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bc11pos like '%$bc11pos%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bc11pos like '%$bc11pos%'";
                                           }
                                        }
                                        if (isset($_POST['Blno']))
                                        {
                                           $blno = $_POST['blno'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "blno LIKE '%$blno%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND blno LIKE '%$blno%'";
                                           }
                                        }
                                        if (isset($_POST['nHPLelangNo']))
                                        {
                                           $NHPLelangNo = $_POST['NHPLelangNo'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "NHPLelangNo LIKE '%$NHPLelangNo%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND NHPLelangNo LIKE '%$NHPLelangNo%'";
                                           }
                                        }
                                        if (isset($_POST['Idtpp']))
                                        {
                                           $idtpp = $_POST['idtpp'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bcf15.idtpp= '$idtpp'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15.idtpp= '$idtpp'";
                                           }
                                        }
                                        if (isset($_POST['nHPLelangDate']))
                                        {
                                           $NHPLelangDate1 = sql($_POST['NHPLelangDate1']);
                                           $NHPLelangDate2 = sql($_POST['NHPLelangDate2']);
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "NHPLelangDate between '$NHPLelangDate1' and '$NHPLelangDate2'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND (NHPLelangDate between '$NHPLelangDate1' and '$NHPLelangDate2')";
                                           }
                                        }
                                        if (isset($_POST['Lebih60hari']))
                                        {
                                           $mundurkewaktu='60';//mundur ke 60 hari yang lalu
                                           $x  = mktime(0, 0, 0, date("m"), date("d")-$mundurkewaktu, date("Y"));
                                           $tgl60hari= date("d-m-Y", $x); 
                                           $tgl60hariindonesia=sql($tgl60hari);
                                           $idtpp = $_POST['idtpp'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bamasukdate  between '2001-01-01' and  '$tgl60hariindonesia'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bamasukdate between '2001-01-01' and  '$tgl60hariindonesia'";
                                           }
                                        }
                                        if (isset($_POST['Bmn']))
                                        {
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "idstatusakhir= '9'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND idstatusakhir= '9'";
                                           }
                                        }
                                        if (isset($_POST['Lelang']))
                                        {
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "idstatusakhir= '5' or idstatusakhir='6' or idstatusakhir='7'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND idstatusakhir= '5' or idstatusakhir='6' or idstatusakhir='7'";
                                           }
                                        }
                                        if (isset($_POST['Musnah']))
                                        {
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "idstatusakhir= '8'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND idstatusakhir= '8'";
                                           }
                                        }
                                        
                                        
                   if($_POST['Lebih60hari']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['Musnah']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['Lelang']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['Bmn']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['Bcf15no']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['Tahun']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['Bc11no']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['Blno']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['nHPLelangNo']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['Idtpp']=='1'){
                      $datapp=100000; 
                   }
                   elseif($_POST['nHPLelangDate']=='1'){
                      $datapp=100000; 
                   }
                   
                   else{
                       $datapp = 20; // Jumlah data per halaman 
                   }

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $dataeload = "index.php?hal=saldobtdkabid";

                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,tundalelang,tglsuratpermohonan,idstatusakhir,nosuratpermohonan,Pemohon,masuk,NHPLelangNo,NHPLelangDate,idpemeriksa_tpp,idstatusakhir,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate,NoKepStatus_Akhr
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1' and setujubatal='2' and ".$bagianWhere."   order by bcf15.idbcf15 desc ";
                    $dataesult = mysql_query($sql);

                    $tcount = mysql_num_rows($dataesult);

                    $tpages = ($tcount) ? ceil($tcount/$datapp) : 1; // total pages, last page number

                    $count = 0;
                    $i = ($page-1)*$datapp;
                    while(($count<$datapp) && ($i<$tcount)) 
                            {
                        mysql_data_seek($dataesult,$i);
                        $query = mysql_fetch_array($dataesult);

                        // output each row:

                        $i++;
                        $count++;
                            }

                    // by default we show first page
                    $nohal = 1;
                     
                        //jika data tidak ditemukan
                        if($count==0){
                                echo "<strong><font color=blue size=3>Tidak ada data yang dicari!";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $datapp;
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,tundalelang,tglsuratpermohonan,idstatusakhir,nosuratpermohonan,Pemohon,masuk,NHPLelangNo,NHPLelangDate,idpemeriksa_tpp,idstatusakhir,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate,NoKepStatus_Akhr
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and  recordstatus='2' and masuk='1'  and setujubatal='2' and ".$bagianWhere."  order by bcf15.idbcf15 desc  LIMIT $limit,$datapp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($dataesult);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $datapp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $dataeload = "index.php?hal=saldobtdkabid";

                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,tundalelang,tglsuratpermohonan,idstatusakhir,nosuratpermohonan,Pemohon,masuk,NHPLelangNo,NHPLelangDate,idpemeriksa_tpp,idstatusakhir,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate,NoKepStatus_Akhr
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode  and bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1'  and setujubatal='2'  order by idbcf15 desc ";
                    $dataesult = mysql_query($sql);

                    $tcount = mysql_num_rows($dataesult);

                    $tpages = ($tcount) ? ceil($tcount/$datapp) : 1; // total pages, last page number

                    $count = 0;
                    $i = ($page-1)*$datapp;
                    while(($count<$datapp) && ($i<$tcount)) 
                            {
                        mysql_data_seek($dataesult,$i);
                        $query = mysql_fetch_array($dataesult);

                        // output each row:

                        $i++;
                        $count++;
                            }

                    // by default we show first page
                    $nohal = 1;

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $datapp;
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,tundalelang,tglsuratpermohonan,idstatusakhir,nosuratpermohonan,Pemohon,masuk,NHPLelangNo,NHPLelangDate,idpemeriksa_tpp,idstatusakhir,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate,NoKepStatus_Akhr
                    FROM bcf15,tpp,typecode where bcf15.idtypecode=typecode.idtypecode  and bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1' and setujubatal='2' order by idbcf15 desc  LIMIT $limit,$datapp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($dataesult);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?>
         <?php 
                    //untuk menampilkan paginasi
                    echo paginate($dataeload, $page, $tpages);
                   
                    ?>
        <br/>
                                    <form name="form1" method="get" action="report/export/pemwas_exportnhp.php">
                                        <input  name="bagianWhere" id="bagianWhere" class="required" type="hidden" value="<?php echo $bagianWhere ?>" />
                                        
                                        <input type="submit" value="Download To Excel" name="search"/>
                                    </form>
                
                    <table border='1' class="data isitabel">
                        <tr >
                        <th rowspan='2' class="judultabel">No</th>
                        <th colspan='2' class="judultabel">BCF 1.5</th>
                         <th rowspan='2' class="judultabel">Type Cont</th>
                        <th rowspan='2' class="judultabel">Consignee</th>
                         <th rowspan='2' class="judultabel">TPP</th>
                        <th rowspan='2' class="judultabel">Waktu Timbun</th>
                        <th colspan='7' class="judultabel">Status Akhir</th>
                        <th rowspan='2' class="judultabel">View</th>
                        
                        </tr>
                        <tr><th class="judultabel">Nomor</th>
                        <th class="judultabel">Tanggal</th>
                        
                        
                       
                        
                        
                        <th class="judultabel">Status</th>
                        <th class="judultabel">No Kep</th>
                        <th class="judultabel">Kep BMN</th>
                        <th class="judultabel">Kep BTD Lelang</th>
                        <th class="judultabel">Kep BTD Musnah</th>
                        <th class="judultabel">No NHP</th>
                        <th class="judultabel">Tgl NHP</th>
                    
                    <?php
                    while($data = mysql_fetch_array($tampil)){
                        $now=date('Y-m-d');
                        $tglbcf=$data['bcf15tgl'];
                        $tglbamasuk=$data['bamasukdate'];
                        
                        $querytempo ="select datediff('$now','$tglbcf') as selisih,datediff('$now','$tglbamasuk') as selisihtpp ";
                        $hasiltempo=mysql_query($querytempo);
                        $datatempo=mysql_fetch_array($hasiltempo);
                        //waktu setelah penarikan
                        
                        
                        $selisihtpp=$datatempo['selisihtpp'];
                        $selisih=$datatempo['selisih'];
                        
                        if ($data['consignee']=="To Order") { $consignee=$data['notify']; } elseif ($data['consignee']=="to order") { $consignee=$data['notify']; } elseif ($data['consignee']=="To The Order") { $consignee=$data['notify']; } elseif ($data['consignee']=="toorder") { $consignee=$data['notify']; } elseif ($data['consignee']=="ToOrder") {$consignee=$data['notify']; } else  { $consignee=$data['consignee'];}   
                         if ($data['Dokumen2Code']=="1") { $dokumen="SPPB"; } elseif ($data['Dokumen2Code']=="0") { $dokumen=""; } elseif ($data['Dokumen2Code']=="") { $dokumen=""; } elseif ($data['Dokumen2Code']=="2") { $dokumen="BC 1.2"; } elseif ($data['Dokumen2Code']=="4") { $dokumen="BC 2.3"; } elseif ($data['Dokumen2Code']=="5") { $dokumen="BC 3.0"; } elseif ($data['Dokumen2Code']=="11") { $dokumen="ND Kasi Manifest"; } elseif ($data['Dokumen2Code']=="12") { $dokumen="PIB"; } elseif ($data['Dokumen2Code']=="13") { $dokumen="PIBK"; } elseif ($data['Dokumen2Code']=="27") { $dokumen="Surat Persetujuan Reekspor"; } elseif ($data['Dokumen2Code']=="28") { $dokumen="Returnable Package"; }   
                        if ($data['idstatusakhir']=="5") { $status="BTD Siap Lelang"; }elseif ($data['idstatusakhir']=="4") { $status="BTD Cacah Lelang"; } elseif ($data['idstatusakhir']=="2") { $status="BTD"; } elseif ($data['idstatusakhir']=="6") { $status="BTD Lelang 1"; } elseif ($data['idstatusakhir']=="7") { $status="BTD Lelang 2"; } elseif ($data['idstatusakhir']=="8") { $status="BTD Musnah"; } elseif ($data['idstatusakhir']=="9") { $status="BMN"; } elseif ($data['idstatusakhir']=="11") { $status="Tunda Lelang"; } elseif ($data['idstatusakhir']=="13") { $status="laku lelang"; } elseif ($data['idstatusakhir']=="14") { $status="Tutup Pos BCF 15 By Sistem"; }      elseif ($data['idstatusakhir']=="0") { $status=""; } elseif ($data['idstatusakhir']=="") { $status=""; }     
                         $dataowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$data[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($dataowset);  
                         $dataowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$data[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($dataowset1);                 
                         $dataowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$data[idbcf15] and idsize='45'") ; $data4 = mysql_fetch_array($dataowset2); 
                         $jumlah2 = $data2['nocontainer'];
                         $jumlah4 = $data3['nocontainer'];
                         $jumlah45 = $data4['nocontainer'];
                         if($jumlah2>0) { $jum_20="$jumlah2";} else {$jum_20= '';}
                         if($jumlah4>0) {$jum_40= "$jumlah4";} else  {$jum_40= '';} 
                         if($jumlah45>0) {$jum_45= "$jumlah45";} else  {$jum_45= '';} 
                         if($data['idtypecode']=='1'){$typecode= "FCL";}
                        elseif($data['idtypecode']=='2'){
                            $typecode= "LCL";
                        }
                        elseif($data['idtypecode']=='3'){
                            $typecode ="Part Off";
                        }
                        elseif($data['idtypecode']=='4'){
                            $typecode= "Short Ship";
                        }
                        elseif($data['idtypecode']=='5'){
                            $typecode= "Empty Cont";
                        }
                        elseif($data['idtypecode']=='6'){
                            $typecode= "Iso Tank";
                        }

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
                    <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15no'] ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15tgl'] ?></td>
                    
                    <td class="isitabel"><?php echo  $typecode ?></td>
                    <td class="isitabel"><?php echo  $consignee ?></td>
                    <td class="isitabel"><?php echo   $data['nm_tpp'] ?></td>
                    <td class="isitabel"><?php echo   $selisihtpp  ?> hari</td>
                    <td class="isitabel"><?php echo  $status ?></td>
                    <td class="isitabel"><?php echo  $data['NoKepStatus_Akhr'] ?></td>
                    <td class="isitabel"><?php echo  $data['KepBMNNo'] ?></td>
                    <td class="isitabel"><?php echo  $data['KepLelang1No'] ?></td>
                    <td class="isitabel"><?php echo  $data['KepMusnahNo'] ?></td>
                    <td class="isitabel"><?php echo  $data['NHPLelangNo'] ?></td>
                    <td class="isitabel"><?php echo  $data['NHPLelangDate'] ?></td>
                    <td class="isitabel"><a href="?hal=detailstatusakhirman&id=<?php echo  $data['idbcf15']; ?> " target="_new"><img src="images/new/view.png" /></a></td>
                    
                    </td>
                    
                    
                   
                    </tr>
                    

                    <?php
                    };
                    ?>
                    </table><br/><br />
                    
                    
                   
          
        </body>
        </html>
        <?php
};
?>