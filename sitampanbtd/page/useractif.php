<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
}
else
{
  
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
<!--	<script src="lib/js/jquery-1.5.1.js"></script>-->
	<script src="lib/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="lib/js/ui/jquery.ui.widget.js"></script>
	<script src="lib/js/ui/jquery.ui.accordion.js"></script>
	<link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/demos/demos.css">
	<script>
	$(function() {
		$( "#accordionuseractif" ).accordion({
//			event: "mouseover"
		});
	});
	</script>
<head>
<title>User's</title>

</head>
<body>   
    <div class="demo">
     
     <div id="accordionuseractif">
           
           <h3><a >User Online</a></h3>
                                <div> 
                                     
                                    <h2 style="height :20px; font-weight: bold; color: #0d2959">User Online Saat Ini</h2>
                                   <?php // yang belum koneksi database diabaikan aja dulu file ini
                                     session_start();


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
                                    

                                    <?php

                                    if (($mode=='cari')) {
                                        $rpp = 10; // Jumlah data per halaman 

                                    $page = intval($_GET["page"]);
                                    if(!$page) $page = 1;

                                    $reload = "index.php?hal=home";

                                    // data mentah 
                                    $sql = "SELECT * FROM user,log  where user.username=log.username and 
                                    OR (nm_lengkap LIKE '%$katakunci%') OR (nip_baru LIKE '%$katakunci%') order by tanggal desc ";
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
                                    $sqltampil = "SELECT * FROM user,log  where user.username=log.username and 
                                    OR (nm_lengkap LIKE '%$katakunci%') OR (nip_baru LIKE '%$katakunci%') order by tanggal desc  LIMIT $limit,$rpp";

                                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                                    $tampil= mysql_query($sqltampil);
                                    $count	=mysql_num_rows($result);
                                    }
                                    else {
                                    /* ======================================================== pagination mulai ===================================================== */
                                    $rpp = 10; // Jumlah data per halaman 

                                    $page = intval($_GET["page"]);
                                    if(!$page) $page = 1;

                                    $reload = "index.php?hal=home";

                                    // data mentah 
                                    $sql = "select * from log,user where user.username=log.username order by tanggal desc  ";
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
                                    $sqltampil = "select * from log,user where user.username=log.username order by tanggal desc  LIMIT $limit,$rpp" ;

                                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                                    $tampil= mysql_query($sqltampil);
                                    $count	=mysql_num_rows($result);
                                    }
                                    /* ======================================================== pagination selesai ===================================================== */
                                    ?>
                                    <br>
                                    <table class="data" width="100%">
                                            <tr><th class="judultabel">No</th>
                                            <th class="judultabel">Nama</th>
                                            <th class="judultabel">NIP</th>
                                            <th class="judultabel">Tanggal Login</th>
                                            <th class="judultabel">Jam Login</th>
                                            <th class="judultabel">Jam Logout</th>
                                            <th class="judultabel">Status</th>

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
                                    <td class="isitabel"><?php echo  ucwords($data['nm_lengkap']); ?></td>
                                    <td class="isitabel"><?php echo  $data['nip_baru']; ?></td>
                                    <td class="isitabel"><?php echo  $data['tanggal']; ?></td>
                                    <td class="isitabel"><?php echo  $data['jamin']; ?></td>
                                    <td class="isitabel"><?php echo  $data['jamout']; ?></td>
                                    <td align=center class="isitabel"><?php if($data['status']=='offline'){echo"<a style='background-color:red' align=center>OFFLINE</a>";} else {echo"<a style='background-color:00ff00' align=center>ONLINE</a>";} ;?></td>
                                    </tr>

                                    <?php
                                    };
                                    ?>
                                    </table><br/><br />
                                    <font color="red">* Status User </font><br></br>

                                    <?php 
                                    //untuk menampilkan paginasi
                                    echo paginate($reload, $page, $tpages);
                                    ?> 
                                </div>
           
           
           
     </div>

</div>
    
    
          
                   
</body>
</html>
<?php
}
?>