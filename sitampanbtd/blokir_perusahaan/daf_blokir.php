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
    <title>SITAMPAN</title>
   
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
                    <table width="100%"><tr><td class="judultabel1">Input Blokir Perusahaan</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=blokir"; ?> >
                    
                        <table border="0">
                        
                        <tr>
                            <td height="20"></td>
                        </tr>
                             
                          
                        <tr><td colspan="2"><b>Pilih Kriteria Pencarian</b></td></tr>
                          
                             <tr>
                             <td><input type="checkbox" name="Surat_blokir" value="1"  <?php  if($_POST['Surat_blokir'] == 1){echo 'checked="checked"';}?>>No Surat Blokir</td>
                             <td><input type="text"  class="required" name="surat_blokir" value="<?php echo $_POST['surat_blokir']?>"></td>
                             </tr>
                             <tr>
                             <td><input type="checkbox" name="Nm_perusahaan" value="1"  <?php  if($_POST['Nm_perusahaan'] == 1){echo 'checked="checked"';}?>>Nama Perusahaan</td>
                             <td><input type="text" size="10" class="required" name="nm_perusahaan" value="<?php echo $_POST['nm_perusahaan']?>"></td>
                             </tr>
                             <tr>
                             <td><input type="checkbox" name="Npwp_perusahaan" value="1"  <?php  if($_POST['Npwp_perusahaan'] == 1){echo 'checked="checked"';}?>>NPWP Perusahaan</td>
                             <td><input type="text" size="10" class="required" name="npwp_perusahaan" value="<?php echo $_POST['npwp_perusahaan']?>"></td>
                             </tr>
                             
                             
                             
                             
                             
                    <tr><td><input class="button putih bigrounded " type="submit" name="Submit2" value="Cari" class="submitsearch" /></td></tr>
                    <tr><td><input name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
               
                    <?php
                    
                    if (($mode=='cari')) {
                        
                        if (isset($_POST['Surat_blokir']))
                                        {
                                           $surat_blokir = $_POST['surat_blokir'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "surat_blokir LIKE '%$surat_blokir%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND surat_blokir LIKE '%$surat_blokir%'";
                                           }
                                        }
                                        if (isset($_POST['Nm_perusahaan']))
                                        {
                                           $nm_perusahaan = $_POST['nm_perusahaan'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "nm_perusahaan like '%$nm_perusahaan%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND nm_perusahaan like '%$nm_perusahaan%'";
                                           }
                                        }
                                        if (isset($_POST['Npwp_perusahaan']))
                                        {
                                           $npwp_perusahaan = $_POST['npwp_perusahaan'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "npwp_perusahaan like '%$npwp_perusahaan'%";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND npwp_perusahaan like '%$npwp_perusahaan%'";
                                           }
                                        }
                                        

                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=blokir";

                    // data mentah 
                    $sql = "SELECT idblokir_perusahaan,nm_perusahaan,npwp_perusahaan,alamat_perusahaan,sebab_blokir,surat_blokir,tgl_blokir,tgl_input,status_blokir
                        FROM blokir_perusahaan where  ".$bagianWhere."   order by idblokir_perusahaan desc ";
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
                                echo "<strong><font color=blue size=3>Data Tidak Ada!";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT idblokir_perusahaan,nm_perusahaan,npwp_perusahaan,alamat_perusahaan,sebab_blokir,surat_blokir,tgl_blokir,tgl_input,status_blokir
                        FROM blokir_perusahaan where  ".$bagianWhere."   order by idblokir_perusahaan desc  LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=blokir";
                    $tgl_now=date('Y-m-d');
                    $tahun_now=substr($tgl_now,0,4);
                    // data mentah 
                    $sql = "SELECT idblokir_perusahaan,nm_perusahaan,npwp_perusahaan,alamat_perusahaan,sebab_blokir,surat_blokir,tgl_blokir,tgl_input,status_blokir
                        FROM blokir_perusahaan   order by idblokir_perusahaan desc ";
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
                    $sqltampil = "SELECT idblokir_perusahaan,nm_perusahaan,npwp_perusahaan,alamat_perusahaan,sebab_blokir,surat_blokir,tgl_blokir,tgl_input,status_blokir
                    FROM blokir_perusahaan order by idblokir_perusahaan desc" ;

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
        
                
                    <table class="data" width="100%">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">Nama Perusahaan</th>
                            <th class="judultabel">Surat Blokir</th>
                            <th class="judultabel">Sebab Blokir</th>
                            <th class="judultabel">Tgl Blokir</th>
                            <th class="judultabel">Tgl Input</th>
                            <th class="judultabel">Status Blokir</th>
                            
                           <th class="judultabel" colspan="2">Action</th>
                           
                           
                            
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
                    <td class="isitabel"><?php echo  $data['nm_perusahaan']; ?></td>
                    <td class="isitabel"><?php echo  $data['surat_blokir']; ?></td>
                    <td class="isitabel"><?php echo  $data['sebab_blokir']; ?></td>
                    <td class="isitabel"><?php echo  $data['tgl_blokir']; ?></td>
                    <td class="isitabel"><?php echo  $data['tgl_input']; ?></td>
                    <td class="isitabel"><?php echo  $data['status_blokir']; ?></td>
                    
                    <td align="center" class="isitabel"> <a href="?hal=edit_blokir&id=<?php echo  $data['idblokir_perusahaan'] ?>">Edit</a> 
                    </td>
                    <td align="center" class="isitabel"> <a href="?hal=buka_blokir&id=<?php echo  $data['idblokir_perusahaan'] ?>">Buka Blokir</a> 
                    </td>
                    
                    
                   
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