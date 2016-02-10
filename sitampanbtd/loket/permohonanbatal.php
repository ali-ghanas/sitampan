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
    <title>SITAMPAN-Permohonan Batal BCF 1.5</title>
   
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
                    <table width="100%"><tr><td class="judultabel1">Permohonan Pembatalan BCF 1.5</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=mohonbatal"; ?> >
                    <table border="0">
                        <tr>
                            <td ><hr/></td>
                        </tr>
                             
                        <tr bgcolor="#e4ebf1">
                            <td colspan="3"><a href="?hal=mohonbatal">Cari BCF 1.5</a> | <a href="?hal=mohonbatalcont">Cari Container</a> | <a href="?hal=bukaposbc11">Buka Pos BC 1.1 Ceisa</a></td>
                        </tr>
                        <tr>
                            <td ><hr/></td>
                        </tr>
                             
                          
                        <tr><td colspan="2">Pilih Kriteria Pencarian BCF 1.5</td></tr>
                        <tr>
                            <td>
                                <table BORDER="0" width="100%" class="isitabel" bgcolor="#abc7e2">
                                    <tr>
                                     <td><input type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?>>No BCF 1.5</td>
                                     <td><input size="10" type="text"   name="bcf15no" value="<?php echo $_POST['bcf15no']?>"></td>
                                  
                                     <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Tahun BCF 1.5 (2013 dst)</td>
                                     <td><input size="10" type="text"  name="tahun" value="<?php echo $_POST['tahun']?>"></td>
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Bc11no" value="1"  <?php  if($_POST['Bc11no'] == 1){echo 'checked="checked"';}?>>No BC 1.1 </td>
                                     <td><input size="10" type="text"  name="bc11no" value="<?php echo $_POST['bc11no']?>"> </td>
                                   
                                     <td><input type="checkbox" name="Bc11pos" value="1"  <?php  if($_POST['Bc11pos'] == 1){echo 'checked="checked"';}?>>Pos   </td>
                                     <td><input type="text" size="10"  name="bc11pos" value="<?php echo $_POST['bc11pos']?>"></td>
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Blno" value="1"  <?php  if($_POST['Blno'] == 1){echo 'checked="checked"';}?>>No BL </td>
                                     <td><input type="text"   name="blno" value="<?php echo $_POST['blno']?>">  </td>
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Consignee" value="1"  <?php  if($_POST['Consignee'] == 1){echo 'checked="checked"';}?>>Consignee </td>
                                     <td><input type="text"   name="consignee" value="<?php echo $_POST['consignee']?>">  </td>
                                     </tr>
                                     <tr>
                                     <td><input type="checkbox" name="Notify" value="1"  <?php  if($_POST['Notify'] == 1){echo 'checked="checked"';}?>>Notify </td>
                                     <td><input type="text"   name="notify" value="<?php echo $_POST['notify']?>">  </td>
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
                                                $bagianWhere .= "bcf15no LIKE '%$bcf15no%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15no LIKE '%$bcf15no%'";
                                           }
                                        }
                                        if (isset($_POST['Tahun']))
                                        {
                                           $tahun = $_POST['tahun'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "tahun='$tahun'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND tahun='$tahun'";
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
                                        if (isset($_POST['Consignee']))
                                        {
                                           $consignee = $_POST['consignee'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "consignee LIKE '%$consignee%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND consignee LIKE '%$consignee%'";
                                           }
                                        }
                                        if (isset($_POST['Notify']))
                                        {
                                           $notify = $_POST['notify'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "notify LIKE '%$notify%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND notify LIKE '%$notify%'";
                                           }
                                        }
                                        

                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=mohonbatal";

                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,Pemohon,NoKepStatus_Akhr
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and ".$bagianWhere."   order by bcf15.idbcf15 desc ";
                    $result = mysql_query($sql);

                    $tcount = mysql_num_rows($result);

                    $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

                    $count = 0;
                    $i = ($page-1)*$rpp;
                    while(($count<$rpp) && ($i<$tcount)) 
                            {
                        mysql_data_seek($result,$i);
                        $query = mysql_fetch_array($result);

                        // output each row:

                        $i++;
                        $count++;
                            }

                    // by default we show first page
                    $nohal = 1;
                     
                        //jika data tidak ditemukan
                        if($count==0){
                                echo "<strong><font color=blue size=3>Tidak ada data yang dicari!atau sementara proses pembatalan Status BCF 1.5 nya!Gunakan Pencarian advance untuk mengetahui status akhir Klik<a href='?hal=caribcf15'> Sini</a></font></strong>";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,Pemohon,NoKepStatus_Akhr
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and ".$bagianWhere."  order by bcf15.idbcf15 desc  LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=mohonbatal";

                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,Pemohon,NoKepStatus_Akhr
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2' order by idbcf15 desc ";
                    $result = mysql_query($sql);

                    $tcount = mysql_num_rows($result);

                    $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

                    $count = 0;
                    $i = ($page-1)*$rpp;
                    while(($count<$rpp) && ($i<$tcount)) 
                            {
                        mysql_data_seek($result,$i);
                        $query = mysql_fetch_array($result);

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
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,Pemohon,NoKepStatus_Akhr
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2'  order by idbcf15 desc  LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?>
         <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
        <br/>
                                    <form name="form1" method="get" action="report/export/lap_excel_admin_manifest_batal.php">
                                        <input  name="in_katakunci" id="in_katakunci" class="required" type="hidden" value="<?php echo $katakunci; ?>" />
                                        <input  name="in_tglawal" id="in_tglawal" class="required" type="hidden" value="<?php echo $tglawal; ?>" />
                                        <input  name="in_tglakhir" id="in_tglakhir" class="required" type="hidden" value="<?php echo $tglakhir; ?>" />
                                        <input  name="in_tpp" id="in_tpp" class="required" type="hidden" value="<?php echo $tpp; ?>" />
                                        <input type="submit" value="Download To Excel" name="search"/>
                                    </form>
        
                
                    <table class="data" width="100%">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">No BCF 1.5</th>
                            <th class="judultabel">Tgl BCF1.5</th>
                            <th class="judultabel">Posisi Barang</th>
                            <th class="judultabel">Importir</th>
                            <th class="judultabel">No Surat Permohonan</th>
                            <th class="judultabel">Pemohon</th>
                            <th class="judultabel">Status Container</th>
                            <th class="judultabel">Lama Timbun di TPP</th>
                           <th class="judultabel" >Ket</th>
                           <th class="judultabel" >Action</th>
                           
                            
                            </tr>
                    
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
                    <td class="isitabel"><?php echo  ucwords($data['bcf15no']); ?></td>
                    <td class="isitabel"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel"><?php if ($data['bamasukno']=='') {echo "<font color=blue>TPS :$data[idtps]</font>"; }  else {echo "<font color=red>TPP :$data[nm_tpp]</font>";} ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    
                    <td align="center" class="isitabel"> <?php echo $data['SuratBatalNo']; ?> </td>
                    <td align="center" class="isitabel"> <?php echo $data['Pemohon'];  ?> </td>                    
                    <td class="isitabel" align="center"><?php echo $data['nm_type'] ?></td>
                    <td class="isitabel" align="center"><?php if ($data['bamasukno']=='') {echo "Tidak Masuk TPP";} else { echo  "$selisihtpp Hari" ;} ?></td>
                    <td align="center" class="isitabel"> <?php if ($data['NoKepStatus_Akhr']=='') {echo "";}   else {echo 'Cek BMN atau Belum?'; } ?>
                    </td>
                    <td align="center" class="isitabel"> <?php if ($data['SuratBatalNo']=='') {echo "<a href='?hal=inputmohonbatal&id=$data[idbcf15]' target='_self'><img src=\"images/new/update.png\" ></img></a> ";}   else {echo "<a href='?hal=editmohonbatal&id=$data[idbcf15]' target='_self'><img src=\"images/new/update.png\" ></img></a>"; } ?>
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