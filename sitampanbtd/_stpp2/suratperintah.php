<?php
include "lib/koneksi.php";
session_start();
ob_start();
set_time_limit(60);
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
    <script src="lib/js/jquery-ui-1.9.1/js/jquery-1.8.2.js"></script>
    <script src="lib/js/jquery-ui-1.9.1/js/jquery-ui-1.9.1.custom.js"></script>
    <script>
	$(function() {
		$( document ).tooltip({
			position: {
				my: "center bottom-20",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
						.addClass( "arrow" )
						.addClass( feedback.vertical )
						.addClass( feedback.horizontal )
						.appendTo( this );
				}
			}
		});
	});
	</script>
	<style>
            label {
		display: inline-block; width: 5em;
	}
	
	
	.ui-tooltip, .arrow:after {
		background: #124578;
		border: 2px solid white;
               
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
                width: 200px;
		border-radius: 10px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
                
	}
	.arrow {
		width: 50px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 20px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 2px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
	</style>
    <!--       jquery anytimes -->
        
<!--        <link rel="stylesheet" type="text/css" href="themes/main.css" />-->
        

               
    </head>
    <body>
        
                   <?php // yang belum koneksi database diabaikan aja dulu file ini
                     session_start();


                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                   
                    ?>
                    <form method="post" action=<?php echo "index.php?hal=pagetpp2&pilih=daf_sprint"; ?> >
                    <table> 
                          <tr><td>Masukkan No Sprint</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /></td><td></td></tr>
                          <tr><td>Tahun BCF 1.5</td><td><input class="required" name="txttahun" type="text" value="<?php echo "$tahun"; ?>" class="inputsearch" /></td><td>(Examp : 2012 or 2013)</td></tr>
                    <tr><td><input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /></td></tr>
                    <tr><td><input  name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
                    <br />

                    <?php
                    if($act=="1"){echo "Update Berhasil";};
                    if($act=="2"){echo "Delete Berhasil";};
                    if($act=="3"){echo "Penambahan User Berhasil";};
                    if (($mode=='cari')) {
                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagetpp2&pilih=daf_sprint";

                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,suratperintahno,suratperintahdate
                    FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and ((suratperintahno LIKE '$katakunci') or (bcf15no LIKE '$katakunci')) and tahun LIKE '%$tahun%' order by tahun,bcf15no desc ";
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
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,suratperintahno,suratperintahdate
                    FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and ((suratperintahno LIKE '$katakunci') or (bcf15no LIKE '$katakunci')) and tahun LIKE '%$tahun%' order by tahun,bcf15no desc LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagetpp2&pilih=daf_sprint";
                    $tgl_now=date('Y-m-d');
                    $tahun_now=substr($tgl_now,0,4);
                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,suratperintahno,suratperintahdate
                        FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and (tahun=$tahun_now or tahun=".($tahun_now-1).") order by tahun,bcf15no  desc ";
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
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,suratperintahno,suratperintahdate
                    FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and (tahun=$tahun_now or tahun=".($tahun_now-1).") order by tahun,bcf15no desc LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?><br />


                    <table class="data" >
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">No Sprint</th>
                            <th class="judultabel">Tgl Sprint</th>
                            <th class="judultabel">No BCF 15</th>
                            <th class="judultabel">Tangal BCF</th>
                            <th class="judultabel">Consignee</th>
                            <th class="judultabel">TPP</th>
                            <th class="judultabel">Asal TPS</th>
                            <th class="judultabel">Edit BCF 1.5</th>
                           
                            <th class="judultabel">Sprint</th>
                            <th class="judultabel">Cetak</th>
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
                    <td class="isitabel"><?php echo  "<a href=?hal=sprintok&id=$data[idbcf15] target=_new>$data[suratperintahno]</a>" ?></td>
                    <td class="isitabel"><?php echo  $data['suratperintahdate']; ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15no']; ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } elseif ($data['consignee']=="ToTheOrder") {echo $data['notify']; } elseif ($data['consignee']=="totheorder") {echo $data['notify']; }  else  {echo $data['consignee'];};?></td>
                    <td class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
                    <td class="isitabel"><?php echo  $data['idtps']; ?></td>
                    <td align="center" class="isitabel"><?php echo "<a href='?hal=bcf15edittpp2&id=$data[idbcf15]' target='_new'><img src='images/new/update.png'  title='Edit BCF 1.5'/></a> ";   ?> </td>
                    <td align="center" class="isitabel"><?php if ($data['suratperintahno']=='') {echo ''; } else {echo "<a href='?hal=sprint&id=$data[idbcf15]' target='_new'><img src='images/new/update.png' title='Edit Surat Perintah' /></a> ";} ?> </td>
                    <td align="center" class="isitabel"><?php if ($data['suratperintahno']=='') {echo ''; }  else {echo "<a href='?hal=sprintok&id=$data[idbcf15]' target='_new'><img src='images/new/printer.gif' title='Print Surat Perintah' /></a> ";} ?> </td>
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
ob_end_flush();
?>