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
    <title>SITAMPAN-Nota Dinas Konfirmasi BCF 1.5</title>
   
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
                    <table width="100%"><tr><td class="judultabel1">Penegasan Penarikan Kembali atas BCF 1.5 yang Masih di TPS</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=pagetpp2&pilih=tegassprint"; ?> >
                    
                        <table border="0" >
                        
                        
                             
                        <tr>
                            <td><b>
                                <table class="data isitabel" bgcolor="#fafbea">
                                    <tr><td colspan="2"><b>Pilih Kriteria Pencarian BCF 1.5</b></td></tr>
                          
                                     <tr>
                                     <td><input type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?>>No BCF 1.5</td>
                                     <td><input type="text" size="10" class="required" name="bcf15no" value="<?php echo $_POST['bcf15no']?>"></td>
                                    
                                     <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Tahun BCF 1.5 (2013 dst)</td>
                                     <td><input type="text" size="10" class="required" name="tahun" value="<?php echo $_POST['tahun']?>"></td>
                                     </tr>

                                     <tr>
                                     <td><input type="checkbox" name="Bc11no" value="1"  <?php  if($_POST['Bc11no'] == 1){echo 'checked="checked"';}?>>No BC 1.1 </td>
                                     <td><input type="text" size="10" class="required" name="bc11no" value="<?php echo $_POST['bc11no']?>"> </td>
                                     
                                     <td><input type="checkbox" name="Bc11pos" value="1"  <?php  if($_POST['Bc11pos'] == 1){echo 'checked="checked"';}?>>No Pos BC 1.1  </td>
                                     <td><input type="text" size="10" class="required" name="bc11pos" value="<?php echo $_POST['bc11pos']?>"></td>
                                     </tr>
                                     <tr>
                                     <td><input type="checkbox" name="Blno" value="1"  <?php  if($_POST['Blno'] == 1){echo 'checked="checked"';}?>>No BL </td>
                                     <td><input type="text"  class="required" name="blno" value="<?php echo $_POST['blno']?>">  </td>
                                     </tr>
                                </table>
                                </b></td>
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
                                        

                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagetpp2&pilih=tegassprint";

                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,Pemohon,NoKepStatus_Akhr,suratperintahno,suratperintahdate,BatalTarikDate,BatalTarikKet
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and setujubatal='2' and masuk='2' and ".$bagianWhere."   order by bcf15.idbcf15 desc ";
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
                                echo "<strong><font color=blue size=3>Tidak ada data yang dicari";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,Pemohon,NoKepStatus_Akhr,suratperintahno,suratperintahdate,BatalTarikDate,BatalTarikKet
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and setujubatal='2' and masuk='2'  and ".$bagianWhere."  order by bcf15.idbcf15 desc  LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagetpp2&pilih=tegassprint";

                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,Pemohon,NoKepStatus_Akhr,suratperintahno,suratperintahdate,BatalTarikDate,BatalTarikKet
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and setujubatal='2' and masuk='2' order by idbcf15 desc ";
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
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,typecode.idtypecode,nm_type,Pemohon,NoKepStatus_Akhr,suratperintahno,suratperintahdate,BatalTarikDate,BatalTarikKet
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and setujubatal='2' and masuk='2'  order by idbcf15 desc  LIMIT $limit,$rpp" ;

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
        
                
                    <table class="data" width="100%">
                            <tr ><th class="judultabel" rowspan="2">No</th>
                            <th class="judultabel" colspan="2">BCF 1.5</th>
                            <th class="judultabel"  colspan="3">BC 1.1</th>
                            <th class="judultabel"  colspan="2">Sprint</th>
                            <th class="judultabel"  colspan="3">Batal Tarik</th>
                            
                            <th class="judultabel" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="judultabel">Nomor</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Nomor</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Pos /sub</th>
                                <th class="judultabel">Nomor</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Nomor</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Alasan</th>
                                
                               
                            </tr>
                    <?php
                    while($data = mysql_fetch_array($tampil)){
                        
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
                    <td class="isitabel"><?php echo  $data['bc11no']; ?></td>
                    <td class="isitabel"><?php echo  tglindo($data['bc11tgl']); ?></td>
                    <td class="isitabel"><?php echo  $data['bc11pos']; ?></td>
                    <td class="isitabel"><?php echo  $data['suratperintahno']; ?></td>
                    <td class="isitabel"><?php echo  $data['suratperintahdate']; ?></td>
                    <td class="isitabel"><?php echo  $data['BatalTarikNo']; ?></td>
                    <td class="isitabel"><?php echo  $data['BatalTarikDate']; ?></td>
                    <td class="isitabel"><?php echo  $data['BatalTarikKet']; ?></td>
                    <td class="isitabel"><a href="?hal=pagetpp2&pilih=tegassprintproses&id=<?php echo $data['idbcf15']?>">Input</a></td>
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