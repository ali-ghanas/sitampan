<html>
    <head>
    <title>Saldo BCF 15</title>
     
    </head>
    <body>
       
                    <?php // yang belum koneksi database diabaikan aja dulu file ini
                     session_start();
                     include "lib/function.php";

                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                    
                   
                    ?>
        
                    <form method="post" action=<?php echo "index.php?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=innhp"; ?> >
                    <table> 
                          <tr><td>Masukkan Kata Kunci</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /></td><td>(BCF15,BL,Consignee,Notify)</td></tr>
                          <tr><td>Tahun BCF 1.5</td><td><input class="required" name="txttahun" type="text" value="<?php echo "$tahun"; ?>" class="inputsearch" /></td><td>(Examp : 2012 or 2013)</td></tr>
                         
                          
                    <tr><td><input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /></td></tr>
                    <tr><td><input  name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
             
                    <?php
                    if($act=="1"){echo "Update Berhasil";};
                    if($act=="2"){echo "Delete Berhasil";};
                    if($act=="3"){echo "Penambahan User Berhasil";};
                    if (($mode=='cari')) {
                        $rpp = 10; // Jumlah data per halaman 
                        

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=innhp";
                    $now=date('Y-m-d');

                    // data mentah 
                     
                     
                    $sql = "SELECT *  FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and recordstatus='2' and masuk='1' and batal='2' order by bcf15no,tahun desc";
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
                    
                    $sqltampil = "SELECT * FROM bcf15,tpp  where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and recordstatus='2' and masuk='1' and batal='2' order by bcf15no,tahun desc  LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 10; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=innhp";
                    
                     
                    // data mentah 
                    $sql = "SELECT * FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and  masuk='1' and batal='2' order by bcf15no,tahun desc ";
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
                    $sqltampil = "SELECT * FROM bcf15,tpp  where bcf15.idtpp=tpp.idtpp  and masuk='1' and batal='2' order by bcf15no,tahun desc  LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?>
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?><br>
                    
                    <table class="data" width="100%">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">NHP lelang</th>
                            <th class="judultabel" colspan="2">BCF 15</th>
                            <th class="judultabel" colspan="2">Uraian Barang</th>
                            <th class="judultabel">TPP</th>
                            <th class="judultabel">Importir</th>
                            <th class="judultabel">Status Akhir</th>
                            <th class="judultabel">Lama Waktu Timbun di TPP</th>
                            
                            <th class="judultabel" colspan="2">Action</th>
                            
                            </tr>

                    <?php
                    
                   
                    
                    while($data = mysql_fetch_array($tampil)){
                        $now=date('Y-m-d');
                        $tglbcf=$data['bamasukdate'];
                        
                        $querytempo ="select datediff('$now','$tglbcf') as selisih";
                        $hasiltempo=mysql_query($querytempo);
                        $datatempo=mysql_fetch_array($hasiltempo);
                        
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
                    <td class="isitabel" align="center"><?php echo  $data['NHPLelangNo']; ?> / <?php echo  tglindo($data['NHPLelangDate']); ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15no']; ?></td>
                    <td class="isitabel"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel" colspan="2">
                        <table cellspacing="0" cellpadding="0">
                    
                                 <?php
                                 $rowset = mysql_query("select * from nhp where idbcf15=$data[idbcf15]");
                                 while($nhp = mysql_fetch_array($rowset)){
                                 ?>
                                     <tr>
                                     <td class="isitabel"><?php echo $nhp['jumlah'];?> </td><td class="isitabel"> <?php echo $nhp['jenisbrg'];?> </td><td class="isitabel"> <?php echo $nhp['kondisi'];?> </td><td class="isitabel"><?php echo $nhp['negaraasal'];?></td>
                                      </tr>
                                      
                                                            <?php };?>
                            </table>
                    </td>
                    <td class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } elseif ($data['consignee']=="ToTheOrder") {echo $data['notify']; } else  {echo $data['consignee'];;};?></td>
                    <td class="isitabel">
                        <?php
                                                $sql = "SELECT * FROM statusakhir ORDER BY idstatusakhir";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($bcf15 =mysql_fetch_array($qry)) {
                                                        if ($bcf15[idstatusakhir]==$data[idstatusakhir]) {
                                                           
                                                        echo "$bcf15[statusakhirname]";
                                                }
                                                }
                                                ?>
                    </td>
                    <td class="isitabel" align="center"><?php echo  "$selisih Hari" ; ?></td>
                    
                    <td align="center" class="isitabel"><?php if($data['NHPLelangNo']=='') { echo "<a href=?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=nhp&id=$data[idbcf15]><img src=images/new/update.png title=Input NHP/></a>  ";} else { echo "<a href=?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=editnhp_brg&id=$data[idbcf15]><img src=images/new/doc_edit.png title=Edit NHP/></a>  ";}?>
                    </td>
                    
                    </tr>
                     
                    <?php
                    };
                    ?>
                    </table><br/><br />
                    
                   
                    
        
            
        </body>
        </html>