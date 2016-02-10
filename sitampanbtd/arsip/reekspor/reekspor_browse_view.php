<?php
include "lib/koneksi.php";
session_start();
ob_start();
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
    <title>Upload Scan Reekspor</title>
    <!--       jquery anytimes -->
        
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
       
       
    </head>
    <body>
       
       
                <?php // yang belum koneksi database diabaikan aja dulu file ini
                     session_start();
                     ob_start();

                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                   
                    ?>
                <form method="post" action=<?php echo "index.php?hal=daftarreekspor"; ?> >
                <table> 
                          <tr><td>Masukkan Kata Kunci</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /></td><td>(BCF15,BL,Consignee,Notify)</td></tr>
                          <tr><td>Tahun BCF 1.5</td><td><input class="required" name="txttahun" type="text" value="<?php echo "$tahun"; ?>" class="inputsearch" /></td><td>(Examp : 2012 or 2013)</td></tr>
                    <tr><td><input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /></td></tr>
                    <tr><td><input  name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                </form>
            

                <?php
                if($act=="1"){echo "Input Redress Berhasil";};
                if($act=="2"){echo "Delete Berhasil";};
                if($act=="3"){echo "Penambahan Berhasil";};
                if (($mode=='cari')) {
                    $rpp = 20; // Jumlah data per halaman 

                $page = intval($_GET["page"]);
                if(!$page) $page = 1;

                $reload = "index.php?hal=daftarreekspor";

                // data mentah 
                $sql = "SELECT bcf15.idbcf15,bcf15no,tahun,bcf15tgl,jenis_dok,no_dok,tgl_dok,name,type,size,tgl_upload,consignee,notify
                FROM bcf15,arsip_loket_pembatalan where arsip_loket_pembatalan.idbcf15=bcf15.idbcf15 and ((bcf15no LIKE '%$katakunci%') 
                OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' and recordstatus='2' order by bcf15no,bcf15tgl desc";
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
                $sqltampil = "SELECT bcf15.idbcf15,bcf15no,tahun,bcf15tgl,jenis_dok,no_dok,tgl_dok,name,type,size,tgl_upload,consignee,notify
                FROM bcf15,arsip_loket_pembatalan where arsip_loket_pembatalan.idbcf15=bcf15.idbcf15 and ((bcf15no LIKE '%$katakunci%') 
                OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' and recordstatus='2' order by bcf15no,bcf15tgl desc LIMIT $limit,$rpp";

                if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                $tampil= mysql_query($sqltampil);
                $count	=mysql_num_rows($result);
                }
                else {
                /* ======================================================== pagination mulai ===================================================== */
                $rpp = 20; // Jumlah data per halaman 

                $page = intval($_GET["page"]);
                if(!$page) $page = 1;

                $reload = "index.php?hal=daftarreekspor";
                $tgl_now=date('Y-m-d');
                $tahun_now=substr($tgl_now,0,4);
                // data mentah 
                $sql = "SELECT bcf15.idbcf15,bcf15no,tahun,bcf15tgl,jenis_dok,no_dok,tgl_dok,name,type,size,tgl_upload,consignee,notify
                FROM bcf15,arsip_loket_pembatalan where arsip_loket_pembatalan.idbcf15=bcf15.idbcf15  order by bcf15no,bcf15tgl desc";
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
                $sqltampil = "SELECT bcf15.idbcf15,bcf15no,tahun,bcf15tgl,jenis_dok,no_dok,tgl_dok,name,type,size,tgl_upload,consignee,notify
                FROM bcf15,arsip_loket_pembatalan where arsip_loket_pembatalan.idbcf15=bcf15.idbcf15  order by bcf15no,bcf15tgl desc LIMIT $limit,$rpp" ;

                if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                $tampil= mysql_query($sqltampil);
                $count	=mysql_num_rows($result);
                }
                /* ======================================================== pagination selesai ===================================================== */
                ?>
                <?php 
                //untuk menampilkan paginasi
                echo paginate($reload, $page, $tpages);
                ?><br/>

                  <table class="data">
                        <tr><th class="judultabel">No</th>
                            <th class="judultabel">No Persetujuan Reekspor</th>
                            <th class="judultabel">No BCF 15</th>
                            <th class="judultabel">Tangal</th>
                            <th class="judultabel">Consignee</th>
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
                <td class="isitabel"><?php echo  $data['no_dok']; ?></td>
                <td class="isitabel"><?php echo  ucwords($data['bcf15no']); ?></td>
                <td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
                <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } elseif ($data['consignee']=="ToTheOrder") {echo $data['notify']; } elseif ($data['consignee']=="totheorder") {echo $data['notify']; }  else  {echo $data['consignee'];};?></td>
                
                
                <td align="center" class="isitabel"><a href="arsip/reekspor/download.php?id=<?php echo  $data['idbcf15']; ?> ">Download</a> </td>
                </tr>
                <?php
                };
                ?>
                </table><br/>
                
               
               
                
            
        </body>
        </html>
        <?php
};
ob_end_flush();
?>