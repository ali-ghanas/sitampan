<?php
include "lib/koneksi.php";
 include "lib/function.php";   
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
    <title>Ubah BCF 15</title>
    <!--       jquery anytimes -->
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
       
    </head>
    <body>
       <?php 
         session_start();
        if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
        $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
        $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));

        ?> 
<form method="post" action=<?php echo "index.php?hal=sptahu_balik_bro"; ?> >
    <table border="0">
        <tr>
            <td class="isitabel">
                <h2>Surat Pemberitahuan BCF 1.5 Yang Balik Dari PT. POS</h2><hr/>
                <span>Silahkan centang kriteria pencarian BCF 1.5 dibawah ini dan masukan <b>KATA KUNCI</b> yang Anda tahu dan klik tombol Cari</span><br/>
                
            </td>
        </tr>
         <tr >
                            <td >
    
                                <table BORDER="0" bgcolor="#f2f5ad"  class="isitabel">
                                    <tr>
                                     <td><input type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?>>No BCF 1.5</td>
                                     <td><input size="10" type="text"  class="required" name="bcf15no" value="<?php echo $_POST['bcf15no']?>"></td>
                                     
                                     
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Suratno" value="1"  <?php  if($_POST['Suratno'] == 1){echo 'checked="checked"';}?>>No SUrat Pemberitahuan</td>
                                     <td><input size="10" type="text"  class="required" name="bcf15no" value="<?php echo $_POST['bcf15no']?>"></td>
                                     
                                     
                                    </tr>
                                    
                                    
                                     
                                    </tr>
                                </table>
    
                            </td>
                            
                        </tr>
                        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
                        
                        
        
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
                                        if (isset($_POST['Suratno']))
                                        {
                                           $suratno = $_POST['suratno'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "suratno='$suratno'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND suratno='$suratno'";
                                           }
                                        }
                                        
       
                            $rpp = 20; // Jumlah data per halaman 
      
   

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=sptahu_balik_bro";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15_sp_balikpos where ".$bagianWhere."  order by bcf15tgl desc ";
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
                    $sqltampil = "SELECT * FROM bcf15_sp_balikpos where ".$bagianWhere."  order by bcf15tgl desc LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=sptahu_balik_bro";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15_sp_balikpos order by bcf15tgl desc";
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
                    $sqltampil = "SELECT * FROM bcf15_sp_balikpos order by bcf15tgl desc  LIMIT $limit,$rpp" ;

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
                            <tr>
                                <th class="judultabel" rowspan="2">No</th>
                                <th class="judultabel" colspan="2">Surat Pemberitahuan</th>
                                <th class="judultabel" colspan="2">BCF 15</th>
                                <th class="judultabel" rowspan="2">Alasan Balik</th>
                                <th class="judultabel" colspan="3">Action</th>
                            </tr>
                            <tr>
                                <th class="judultabel" >Nomor</th>
                                <th class="judultabel" >Tanggal</th>
                                <th class="judultabel" >Nomor</th>
                                <th class="judultabel" >Tanggal</th>
                                <th class="judultabel" >Edit</th>
                                <th class="judultabel" >Balik Pos</th>
                                <th class="judultabel" >Cetak</th>
                                
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
                    <td class="isitabel"><?php echo  $data['nosuratpemberitahuan']; ?></td>
                    <td class="isitabel"><?php echo tglindo($data['tglsuratpemberitahuan']); ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15no']; ?></td>
                    <td class="isitabel"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    
                    <td class="isitabel"><?php echo  $data['kembali_pilihan']; ?> :<?php echo  $data['alasan_kembali']; ?></td>
                    
                    <td align="center" class="isitabel"><a href="#"><a href=?hal=sptahuview&id=<?php echo $data[idbcf15]?>>Edit</a> </td>
                    <td align="center" class="isitabel"><a href="#"><?php if ($data['SetujuBatalNo']=='') {echo '';} else {echo "<a href='?hal=sptahu_balik_rek&id=$data[idbcf15]' target='_new'>Rekam</a> ";} ?></a> </td>
                    <td align="center" class="isitabel"><?php if ($data['suratno']=='') {echo ''; }  else {echo "<a href='?hal=sptahucetak&id=$data[idbcf15]' target='_new'><img src='images/new/printer.gif' /></a> ";} ?> </td>
                    
                    </tr>
                    <?php
                    };
                    ?>
                    </table><br/><br />
                   
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
        
            
        </body>
        </html>
        <?php
};
?>