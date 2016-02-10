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
 <?php // yang belum koneksi database diabaikan aja dulu file ini
 

 
                $act = $_GET['act'];
                if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
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
                <form method="post" action=<?php echo "index.php?hal=browsecetaksprint"; ?> >
                <input name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" />
                <input type="submit" name="Submit2" value="Cari" class="submitsearch" />  
                <input name="mode" type="hidden" id="mode" value="cari" /><strong bgcolor="ddffff"> Cari Berdasarkan No BCF 15, BL, Nm Consignee, Notify</strong>
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

                $reload = "index.php?hal=browsecetaksprint";

                // data mentah 
                $sql = "SELECT * FROM bcf15 where ((bcf15no LIKE '%$katakunci%') 
                OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) where perintah='1'";
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
                $sqltampil = "SELECT * FROM bcf15 where ((bcf15no LIKE '%$katakunci%') 
                OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) where  perintah='1' LIMIT $limit,$rpp";

                if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                $tampil= mysql_query($sqltampil);
                $count	=mysql_num_rows($result);
                }
                else {
                /* ======================================================== pagination mulai ===================================================== */
                $rpp = 10; // Jumlah data per halaman 

                $page = intval($_GET["page"]);
                if(!$page) $page = 1;

                $reload = "index.php?hal=browsecetaksprint";

                // data mentah 
                $sql = "SELECT * FROM bcf15";
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
                $sqltampil = "SELECT * FROM bcf15 where perintah='1' LIMIT $limit,$rpp" ;

                if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                $tampil= mysql_query($sqltampil);
                $count	=mysql_num_rows($result);
                }
                /* ======================================================== pagination selesai ===================================================== */
                ?><br />

                <?php 
                //untuk menampilkan paginasi
                echo paginate($reload, $page, $tpages);
                ?> <br/>
                <table class="data">
                        <tr><th class="judultabel">No</th>
                        <th class="judultabel">No BCf 15</th>
                        <th class="judultabel">Tangal BCF</th>
                        <th class="judultabel">No BC 11</th>
                        <th class="judultabel">Tanggal BC 11</th>
                        <th class="judultabel">No Sprint</th>
                        <th class="judultabel">Tanggal Sprint</th>
                        <th class="judultabel">Action</th>
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
                <td class="isitabel"><?php echo  $data['bc11no']; ?></td>
                <td class="isitabel"><?php echo  $data['bc11tgl']; ?></td>
                <td class="isitabel"><?php echo  $data['suratperintahno']; ?></td>
                <td class="isitabel"><?php echo  $data['suratperintahdate']; ?></td>
                <td align="center" class="isitabel"><a href="?hal=sprintok&sprint=<?php echo  $data['suratperintahno']; ?>&tahun=<?php echo  $data['tahun']; ?>">Sprint</a> 
                        
                </td>
                </tr>
                <?php
                };
                ?>
                </table><br/><br />
                <?php 
                //untuk menampilkan paginasi
                echo paginate($reload, $page, $tpages);
 ?>
<?php
};
?>