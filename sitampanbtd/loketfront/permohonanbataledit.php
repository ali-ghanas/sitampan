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
    
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
 
       
    </head>
    <body>
        
       
                    <?php // yang belum koneksi database diabaikan aja dulu file ini
                     session_start();
                     require_once 'lib/function.php';

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
                    <form method="post" action=<?php echo "index.php?hal=mohonbataledit"; ?> >
                    <table border="0">
                        <tr><td colspan="2">Masukkan Kata Kunci : No BCF 15, No BL, Nama Consignee, Nama Notify</td></tr>
                          <tr><td>Kata Kunci</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /></td></tr>
                          <tr><td>Tahun BCF 1.5</td><td><select class="required"  name="txttahun" type="text" value="<?php echo "$tahun"; ?>" class="inputsearch">
                                      <option value="" >--all--</option>
                                      <option value="2007">2007</option>
                                      <option value="2008">2008</option>
                                      <option value="2009">2009</option>
                                      <option value="2010">2010</option>
                                      <option value="2011">2011</option>
                                      <option value="2012">2012</option>
                                      
                                      
                                  </select></td></tr>
                    <tr><td><input type="submit" name="Submit2" value="Cari" class="submitsearch" /></td></tr>
                    <tr><td><input name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
                    <br />

                    <?php
                    if($act=="1"){echo "Update Berhasil";};
                    if($act=="2"){echo "Delete Berhasil";};
                    if($act=="3"){echo "Penambahan User Berhasil";};
                    if (($mode=='cari')) {
                        $rpp = 10; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=mohonbataledit";

                    // data mentah 
                    $sql = "SELECT *, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl FROM bcf15,tpp  where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' and recordstatus='2' and masuk='1' and batal='1' order by tahun ";
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
                    $sqltampil = "SELECT *, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl FROM bcf15,tpp  where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' and recordstatus='2' and masuk='1' and batal='1' order by tahun  LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 10; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=mohonbataledit";

                    // data mentah 
                    $sql = "SELECT *, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1' and batal='1' order by tahun ";
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
                    $sqltampil = "SELECT *, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1' and batal='1' order by tahun  LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?><br />


                    <h2>Daftar BCF 1.5 Masuk Ke TPP *)</h2>
                    <table class="data" width="100%">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">No BCf 15</th>
                            <th class="judultabel">Tangal BCF</th>
                            <th class="judultabel">TPP</th>
                            <th class="judultabel">Importir</th>
                            <th class="judultabel">No Surat Permohonan</th>
                            <th class="judultabel">Pemohon</th>
                            <th class="judultabel">Input Surat</th>
                            
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
                    <td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
                    <td class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="Notify Party") {echo $data['notify']; } else  {echo $data['consignee'];;};?></td>
                    <td class="isitabel"><?php echo  $data['SuratBatalNo']; ?></td>
                    <td class="isitabel"><?php echo  $data['Pemohon']; ?></td>
                    <td align="center" class="isitabel"> <a href="?hal=editmohonbatal&id=<?php echo ubah_teks($data['idbcf15']); ?>"><img src="images/icon/pen.ico" width="30"></img></a> 
                    </td>
                   
                    </tr>
                    <?php
                    };
                    ?>
                    </table><br/><br />
                    <font color="red">* Masuk TPP, Belum dibatalkan, Belum dibuatkan ND Konf </font><br></br>
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
          
              
        </body>
        </html>
        <?php
};
?>