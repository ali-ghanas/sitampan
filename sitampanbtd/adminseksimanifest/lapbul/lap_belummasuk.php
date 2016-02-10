<p>Laporan BCF 1.5 yang tidak masuk ke TPP</p>
<script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tglawal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tglakhir").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
<?php // yang belum koneksi database diabaikan aja dulu file ini
                                     session_start();
                                     include "lib/function.php";

                                    $act = $_GET['act'];
                                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                                    $tot_rec=htmlentities(trim(mysql_real_escape_string($_REQUEST['tot_rec'])));
                                    $tpp=htmlentities(trim(mysql_real_escape_string($_REQUEST['tpp'])));
                                    $tglawal=htmlentities(trim(mysql_real_escape_string($_REQUEST['tglawal'])));
                                    $tglakhir=htmlentities(trim(mysql_real_escape_string($_REQUEST['tglakhir'])));
                                    

                                    ?>
                                    <form method="post" action=<?php echo "index.php?hal=pagebcf15&pilih=lapbul&sub=laptdkmsk"; ?> >
                                    <table> 
                                          <tr><td>Masukkan Kata Kunci</td><td><input class="required" name="katakunci" type="text" value="<?php echo $_POST['katakunci']; ?>" class="inputsearch" /></td><td>(BCF15,BL,Consignee,Notify)</td></tr>
                                          <tr><td >Tgl BCF 1.5</td><td colspan="2"><input class="required" name="tglawal" id="tglawal" type="text" value="<?php echo $_POST['tglawal']; ?>" class="inputsearch" /> sd <input class="required" name="tglakhir" id="tglakhir" type="text" value="<?php echo $_POST['tglakhir']; ?>" class="inputsearch" /></td></tr>
                                          

                                          <tr><td>TPP</td>
                                              <td>
                                                <select class="required" id="tpp" name="tpp">
                                                    <option value = "" >--All TPP--</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idtpp]==$_POST['idtpp']) {
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
                                              <td></td></tr>
                                          <tr><td >Total Record Yang Mau Ditampilkan</td><td colspan="2"><input class="required" name="tot_rec" type="text" value="<?php echo $_POST['tot_rec']; ?>" size="5" /> / Halaman</td></tr>
                                    <tr><td><input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /></td> </tr>
                                    <tr><td><input  name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                                      </table>
                                    </form>


                                    <?php
                                    if($act=="1"){echo "Update Berhasil";};
                                    if($act=="2"){echo "Delete Berhasil";};
                                    if($act=="3"){echo "Penambahan User Berhasil";};
                                    
                                    if (($mode=='cari')) {
                                        $rpp =$tot_rec; // Jumlah data per halaman 

                                    $page = intval($_GET["page"]);
                                    if(!$page) $page = 1;

                                    $reload = "index.php?hal=pagebcf15&pilih=lapbul&sub=laptdkmsk";

                                    // data mentah 
                                    $sql = "SELECT * FROM bcf15,tpp,seksi where ((bcf15no LIKE '%$katakunci%') 
                                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and (bcf15tgl between '$tglawal' and '$tglakhir') and bcf15.idtpp LIKE '%$tpp%' and recordstatus='2' and bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and masuk='2' and batal='2'  order by bcf15no,nm_tpp desc ";
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
                                    $sqltampil = "SELECT * FROM bcf15,tpp,seksi where ((bcf15no LIKE '%$katakunci%') 
                                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and (bcf15tgl between '$tglawal' and '$tglakhir') and bcf15.idtpp LIKE '%$tpp%' and recordstatus='2' and bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and masuk='2' and batal='2' order by bcf15no,nm_tpp desc LIMIT $limit,$rpp";

                                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                                    $tampil= mysql_query($sqltampil);
                                    $count	=mysql_num_rows($result);
                                    }
                                    else {
                                    /* ======================================================== pagination mulai ===================================================== */
                                    $rpp = $tot_rec; // Jumlah data per halaman 

                                    $page = intval($_GET["page"]);
                                    if(!$page) $page = 1;

                                    $reload = "index.php?hal=pagebcf15&pilih=lapbul&sub=laptdkmsk";

                                    // data mentah 
                                    $sql = "SELECT * FROM bcf15,tpp,seksi where bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and recordstatus='2' and (bcf15tgl between '$tglawal' and '$tglakhir') and masuk='2' and batal='2'   order by bcf15no,nm_tpp desc ";
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
                                    $sqltampil = "SELECT * FROM bcf15,tpp,seksi where bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and recordstatus='2' and (bcf15tgl between '$tglawal' and '$tglakhir') and masuk='2' and batal='2'   order by bcf15no,nm_tpp desc LIMIT $limit,$rpp" ;

                                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                                    $tampil= mysql_query($sqltampil);
                                    $count	=mysql_num_rows($result);
                                    }
                                    /* ======================================================== pagination selesai ===================================================== */
                                    ?><br />

                                    <form name="form1" method="get" action="report/export/lap_excel_admin_manifest_tdkmasuk.php">
                                        <input  name="in_katakunci" id="in_katakunci" class="required" type="hidden" value="<?php echo $katakunci; ?>" />
                                        <input  name="in_tglawal" id="in_tglawal" class="required" type="hidden" value="<?php echo $tglawal; ?>" />
                                        <input  name="in_tglakhir" id="in_tglakhir" class="required" type="hidden" value="<?php echo $tglakhir; ?>" />
                                        <input  name="in_tpp" id="in_tpp" class="required" type="hidden" value="<?php echo $tpp; ?>" />
                                        <input type="submit" value="Download To Excel" name="search"/>
                                    </form>
                                        
                                    <table class="data" >
                                            <tr><th class="judultabel">No</th>

                                            <th class="judultabel">No BCF 15</th>
                                            <th class="judultabel">Tangal BCF</th>
                                            <th class="judultabel">No BC 11</th>
                                            <th class="judultabel">Consignee</th>
                                            <th class="judultabel">Penandatangan</th>
                                            <th class="judultabel" colspan="2">No Surat Pengantar</th>
                                            <th class="judultabel">Lokasi Timbun</th>
                                            <th class="judultabel">Masuk *)</th>
                                            <th class="judultabel">Batal BCF 1.5 **)</th>
                                            <th class="judultabel">Batal Tarik ***)</th>
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
                                    <td class="isitabel"><font color="green"><b><?php echo  $data['bcf15no']; ?></b></font></td>
                                    <td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
                                    <td class="isitabel"><?php echo  $data['bc11no']; ?></td>
                                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                                    <td class="isitabel"><?php echo  $data['plh']; ?><?php echo  $data['nm_seksi']; ?></td>
                                    <td class="isitabel" ><font color="green"><?php echo  $data['suratpengantarno']; ?></font></td>
                                    <td class="isitabel"><?php echo  tglindo($data['suratpengantartgl']); ?></td>
                                    <td class="isitabel"><?php if($data['masuk']=='1') {echo "<font color=blue>$data[nm_tpp]</font>";} else {echo "<font color=red>$data[idtps]</font>";} ?></td>
                                    <td class="isitabel" ><?php if($data['masuk']=='1') {echo "<img src='images/new/ok.png' />";} elseif($data['masuk']=='2') {echo "";} ?></td>
                                    <td class="isitabel" ><?php if($data['SetujuBatalNo']=='') {echo "";} else {echo "<img src='images/new/ok.png' />";} ?></td>
                                    <td class="isitabel" ><?php if($data['BatalTarikNo']=='') {echo "";} else{echo "<img src='images/new/ok.png' />";} ?></td>
                                    </tr>
                                    <?php
                                    };
                                    ?>
                                    </table><br/><br />
                                    <?php 
                                    //untuk menampilkan paginasi
                                    echo paginate($reload, $page, $tpages);
                                    ?>