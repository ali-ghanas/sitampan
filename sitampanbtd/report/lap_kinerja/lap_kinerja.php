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
    <title>Laporan Kinerja</title>
   
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
                    <table width="100%"><tr><td class="judultabel1">Laporan Kinerja Tempat Penimbunan</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=lap_kinerja"; ?> >
                    
                         <table border="0">
                        <tr>
                            <td colspan="4">
                                Laporan Kinerja adalah laporan hasil capaian kinerja dari Seksi Tempat Penimbunan.
                                Silahkan input Capaian Kinerja dengan memasukkan bulan dan tahun laporan.
                            </td>
                        </tr>
                         <tr >
                            <td >
                                <table BORDER="0" width="100%">
                                    <tr>
                                     <td width="250"><input type="checkbox" name="Bulan" value="1"  <?php  if($_POST['Bulan'] == 1){echo 'checked="checked"';}?>>Bulan</td>
                                     <td>
                                         <select class="required" id="bulan" name="bulan" >
                                            <option value = "" >--Bulan Rekam--</option>
                                            <?php
                                                $sql = "SELECT * FROM lap_kinerja_bulan ORDER BY idlap_kinerja_bulan";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                    while ($data1 =mysql_fetch_array($qry)) {
                                                        if ($data1[idlap_kinerja_bulan]==$_POST['bulan']) {
                                                            $cek="selected";
                                                            }
                                                       else {
                                                            $cek="";
                                                            }
                                                            echo "<option value='$data1[idlap_kinerja_bulan]' $cek>$data1[nm_bulan_lengkap]</option>";
                                                        }
                                            ?>
                                        </select>
                                         
                                     </td>
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Tahun BCF 1.5 (2013 dst)</td>
                                     <td><input size="10" type="text" class="required" name="tahun" value="<?php echo $_POST['tahun']?>"></td>
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
                        
                                    if (isset($_POST['Bulan']))
                                        {
                                           $bulan = $_POST['bulan'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bulan LIKE '%$bulan%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bulan LIKE '%$bulan%'";
                                           }
                                        }
                                        if (isset($_POST['Tahun']))
                                        {
                                           $tahun = $_POST['tahun'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "Tahun='$tahun'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND Tahun='$tahun'";
                                           }
                                        }
                                        
                                        
                                        

                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=lap_kinerja";

                    // data mentah 
                    $sql = "SELECT idlap_kinerja,tgl_input,bulan,Tahun,idlap_kinerja_bulan,nm_bulan_lengkap
                        FROM lap_kinerja,lap_kinerja_bulan  where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."    ";
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
                                echo "<strong><font color=blue size=3>Data tidak ditemukan";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT idlap_kinerja,tgl_input,bulan,Tahun,idlap_kinerja_bulan,nm_bulan_lengkap
                        FROM lap_kinerja,lap_kinerja_bulan  where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan and ".$bagianWhere."   LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=lap_kinerja";

                    // data mentah 
                    $sql = "SELECT idlap_kinerja,tgl_input,bulan,Tahun,idlap_kinerja_bulan,nm_bulan_lengkap
                        FROM lap_kinerja,lap_kinerja_bulan  where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan ";
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
                    $sqltampil = "SELECT idlap_kinerja,tgl_input,bulan,Tahun,idlap_kinerja_bulan,nm_bulan_lengkap
                        FROM lap_kinerja,lap_kinerja_bulan  where lap_kinerja.bulan=lap_kinerja_bulan.idlap_kinerja_bulan  LIMIT $limit,$rpp" ;

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
        
                    <a href="?hal=in_lap_kinerja"><img src="images/new/add.png"/> << Klik untuk tambah Bulan Laporan</a>
                    <table class="data" width="20%">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">Bulan</th>
                            <th class="judultabel">Tahun</th>
                            <th class="judultabel" >Edit</th> 
                            <th class="judultabel" >Delete</th>
                           
                           
                            
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
                   <td align="center" class="isitabel"> <?php echo $data['nm_bulan_lengkap']; ?> </td>
                    <td align="center" class="isitabel"> <?php echo $data['Tahun'];  ?> </td>                    
                    <td align="center" class="isitabel"><a href='?hal=edit_lap_kinerja_bcf15&id=<?php echo $data['idlap_kinerja']?>' target="_self"><img src="images/new/update.png" ></img></a> </td>
                    <td align="center" class="isitabel"><a href='?hal=del_lap_kinerja&id=<?php echo $data['idlap_kinerja']?>' onclick="javascript:return confirm('Anda yakin untuk hapus data penting ini?')" target="_self"><img src="images/new/delete.png" ></img></a> </td>
                    
                   
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