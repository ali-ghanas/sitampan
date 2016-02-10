<p>Pengiriman data ke TPS Online by SITAMPAN</p>
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
                                    
                                    $tot_rec=htmlentities(trim(mysql_real_escape_string($_REQUEST['tot_rec'])));
                                    $tpp=htmlentities(trim(mysql_real_escape_string($_REQUEST['tpp'])));
                                    $tglawal=htmlentities(trim(mysql_real_escape_string($_REQUEST['tglawal'])));
                                    $tglakhir=htmlentities(trim(mysql_real_escape_string($_REQUEST['tglakhir'])));
                                    

                                    ?>
                                    <form method="post" action=<?php echo "index.php?hal=pagetpp2&pilih=kon_tpsol"; ?> >
                                    <table> 
                                          
                                          <tr><td >Tgl SPP (SPRINT)</td><td colspan="2"><input class="required" name="tglawal" id="tglawal" type="text" value="<?php echo $_POST['tglawal']; ?>" class="inputsearch" /> sd <input class="required" name="tglakhir" id="tglakhir" type="text" value="<?php echo $_POST['tglakhir']; ?>" class="inputsearch" /></td></tr>
                                          

                                          <tr><td>TPP</td>
                                              <td>
                                                <select class="required" id="tpp" name="tpp">
                                                    <option value = "" >--All TPP--</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idtpp]==$_POST['tpp']) {
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

                                    $reload = "index.php?hal=pagetpp2&pilih=kon_tpsol";

                                    // data mentah 
                                    $sql = "SELECT idbcf15,bcf15.idtpp,tpp.idtpp,nm_tpp,idtps,bcf15no,bcf15tgl,bc11no,bc11tgl, bc11pos,bc11subpos,perintah,suratperintahno,suratperintahdate
                                            FROM bcf15,tpp where (bcf15tgl between '$tglawal' and '$tglakhir') and bcf15.idtpp LIKE '%$tpp%' and recordstatus='2' and bcf15.idtpp=tpp.idtpp  order by bcf15no,nm_tpp desc ";
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
                                    $sqltampil = "SELECT idbcf15,bcf15.idtpp,tpp.idtpp,nm_tpp,idtps,bcf15no,bcf15tgl,bc11no,bc11tgl, bc11pos,bc11subpos,perintah,suratperintahno,suratperintahdate
                                                FROM bcf15,tpp where  (bcf15tgl between '$tglawal' and '$tglakhir') and bcf15.idtpp LIKE '%$tpp%' and recordstatus='2' and bcf15.idtpp=tpp.idtpp  order by bcf15no,nm_tpp desc LIMIT $limit,$rpp";

                                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                                    $tampil= mysql_query($sqltampil);
                                    $count	=mysql_num_rows($result);
                                    }
                                    else {
                                    /* ======================================================== pagination mulai ===================================================== */
                                    $rpp = $tot_rec; // Jumlah data per halaman 

                                    $page = intval($_GET["page"]);
                                    if(!$page) $page = 1;

                                    $reload = "index.php?hal=pagetpp2&pilih=kon_tpsol";

                                    // data mentah 
                                    $sql = "SELECT idbcf15,bcf15.idtpp,tpp.idtpp,nm_tpp,idtps,bcf15no,bcf15tgl,bc11no,bc11tgl, bc11pos,bc11subpos,perintah,suratperintahno,suratperintahdate
                                    FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and recordstatus='2' and (bcf15tgl between '$tglawal' and '$tglakhir')   order by bcf15no,nm_tpp desc ";
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
                                    $sqltampil = "SELECT idbcf15,bcf15.idtpp,tpp.idtpp,nm_tpp,idtps,bcf15no,bcf15tgl,bc11no,bc11tgl, bc11pos,bc11subpos,perintah,suratperintahno,suratperintahdate
                                    FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and recordstatus='2' and (bcf15tgl between '$tglawal' and '$tglakhir')   order by bcf15no,nm_tpp desc LIMIT $limit,$rpp" ;

                                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                                    $tampil= mysql_query($sqltampil);
                                    $count	=mysql_num_rows($result);
                                    }
                                    /* ======================================================== pagination selesai ===================================================== */
                                    ?><br />

                                    <form name="form1" method="get" action="report/export/lap_excel_admin_manifest_masuk.php">
                                        <input  name="in_katakunci" id="in_katakunci" class="required" type="hidden" value="<?php echo $katakunci; ?>" />
                                        <input  name="in_tglawal" id="in_tglawal" class="required" type="hidden" value="<?php echo $tglawal; ?>" />
                                        <input  name="in_tglakhir" id="in_tglakhir" class="required" type="hidden" value="<?php echo $tglakhir; ?>" />
                                        <input  name="in_tpp" id="in_tpp" class="required" type="hidden" value="<?php echo $tpp; ?>" />
                                        <input type="submit" value="Download To Excel" name="search"/>
                                    </form>
                                        
                                    <table class="data" >
                                            <tr><th class="judultabel" rowspan="2">No</th>
                                            <th class="judultabel" colspan="2">No Sprint</th>
                                            <th class="judultabel" colspan="2">No BCF 15</th>
                                            
                                            <th class="judultabel" colspan="3">No BC 11</th>
                                            <th class="judultabel" rowspan="2">TPS</th>
                                            <th class="judultabel" rowspan="2">TPP</th>
                                            <th class="judultabel" rowspan="2">Status</th>
                                            <th class="judultabel" rowspan="2">Action</th>
                                            </tr>
                                            <tr>
                                            <th class="judultabel">Nomor</th>
                                            <th class="judultabel">Tanggal</th>
                                            <th class="judultabel">Nomor</th>
                                            <th class="judultabel">Tanggal</th>
                                            <th class="judultabel">Nomor</th>
                                            <th class="judultabel">Tanggal</th>
                                            <th class="judultabel">Pos</th>
                                            
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
                                    <td class="isitabel"><?php echo  $data['suratperintahno']; ?></td>
                                    <td class="isitabel"><?php echo  $data['suratperintahdate']; ?></td>
                                    <td class="isitabel"><font color="green"><b><?php echo  $data['bcf15no']; ?></b></font></td>
                                    <td class="isitabel"><font color="green"><b><?php echo  $data['bcf15tgl']; ?></b></font></td>
                                    <td class="isitabel"><?php echo  $data['bc11no']; ?></td>
                                    <td class="isitabel"><?php echo  $data['bc11tgl']; ?></td>
                                    <td class="isitabel"><?php echo  $data['bc11pos']; ?></td>
                                    <td class="isitabel"><?php echo  $data['idtps']; ?></td>
                                    <td class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
                                    <td class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
                                    <td class="isitabel" ><a href="?hal=pagetpp2&pilih=kon_tpsol_view&id=<?php echo $data['idbcf15'];?>"><img src="images/new/view.png" /></a></td>
                                    
                                    </tr>
                                    <?php
                                    };
                                    ?>
                                    </table><br/><br />
                                    <?php 
                                    //untuk menampilkan paginasi
                                    echo paginate($reload, $page, $tpages);
                                    ?>