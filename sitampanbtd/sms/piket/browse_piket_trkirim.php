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
   <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
         <style type="text/css"> 
              div.pesan {
                height:250px;
                display:none;
                float: none;
              }
              div.pesan, p.flip {
                margin: 0px;
                padding: 5px;
                text-align: center;
                background: #fff;
                border: 1px solid black;
                cursor: pointer;

              }

              .ui-widget { 
              font-family: Arial,Verdana,sans-serif; 
              font-size: 1.0em;
           }  
           .ui-widget-header { 
              border: 1px solid #2b3846; 
              background: #2b3846;
              font-weight: bold; }
           .ui-widget-content { 
              border: 1px solid #2b3846; 
              background: #fcfcfd;
              color: #182e43; 

           }
           .tabs-bottom .ui-tabs-panel { 
              height: 450px; 
              overflow: auto; 
           } 
           .tabs-bottom .ui-tabs-nav { 
              position: absolute; 
              left: 0; 
              bottom: 0; 
              right:0; 
              padding: 0 0.2em 0.2em 0; 
           }  
           .tabs-bottom .ui-tabs-nav li { 
              margin-top: -2px; 
              margin-bottom: 1px; 
              border-bottom-width: 1px; 
              border-top: none;
              background: #fff;
           }
          #batarik ul li a  {
               background: #d6dceb;
           }
           .tabs-bottom .ui-tabs-nav li.ui-tabs-selected { 
              margin-top: -10px; 
              background: #eee;
           }   


            </style>
            <script type="text/javascript">
               $(document).ready(function() {
                  $("#batarik").tabs({collapsible:"true"}).find(".ui-tabs-nav").sortable();
                  $("#batarik").tabs({
                      fx:{
                          opacity :"toggle",
                          duration: "slow"
                      }
                  })
               });
            </script>
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
                    <table width="100%"><tr><td class="judultabel1">Browse PIKET</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=sms_piketbrowsetrkrm"; ?> >
                     <a href="?hal=sms_piket" title="Browse Piket" ><img src="images/new/add.png" title="Edit Surat Perintah"/>Input Lagi</a><br/>
                        <table border="0" >
                        
                        
                             
                        <tr>
                            <td><b>
                                <table class="data isitabel" bgcolor="#fafbea">
                                    <tr><td colspan="2"><b>Pilih Kriteria Pencarian Status Pemberitahuan Piket</b></td></tr>
                          
                                     <tr>
                                     <td><input type="checkbox" name="Nm_pegawai" value="1"  <?php  if($_POST['Nm_pegawai'] == 1){echo 'checked="checked"';}?>>Nama Pegawai</td>
                                     <td><input type="text" class="required" name="nm_pegawai" value="<?php echo $_POST['nm_pegawai']?>"></td>
                                    
                                    
                                     </tr>

                                     
                                </table>
                                </b></td>
                        </tr>  
                        
                             
                             
                             
                    <tr><td><input class="button putih bigrounded " type="submit" name="Submit2" value="Cari" class="submitsearch" /></td></tr>
                    <tr><td><input name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
               
                    <?php
                    
                    if (($mode=='cari')) {
                        
                        if (isset($_POST['Nm_pegawai']))
                                        {
                                           $nm_pegawai = $_POST['nm_pegawai'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "nm_pegawai LIKE '%$nm_pegawai%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND nm_pegawai LIKE '%$nm_pegawai%'";
                                           }
                                        }
                                        
                                        

                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=sms_piketbrowsetrkrm";

                    // data mentah 
                    $sql = "SELECT *  FROM  sms_kegiatan_tpp where status_sms='terkirim' and  ".$bagianWhere." order by tglsms desc ";
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
                                echo "<strong>Tidak ada data yang dicari</strong>";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT *  FROM  sms_kegiatan_tpp where  status_sms='terkirim' and ".$bagianWhere." order by tglsms desc    LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=sms_piketbrowsetrkrm";

                    // data mentah 
                    
                    $sql = "SELECT *  FROM  sms_kegiatan_tpp where status_sms='terkirim' order by tglsms desc";
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
                    $sqltampil = "SELECT *  FROM  sms_kegiatan_tpp where status_sms='terkirim' order by tglsms desc   LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?>
         
        <br/>
                <strong><a href="?hal=sms_piketbrowse">SMS Belum Terkirim</a> | <a href="?hal=sms_piketbrowsetrkrm">SMS TERKIRIM</a></strong>
                <div id="batarik">
                             <ul>
                                  <li><a href="#tabs-2">SMS Terkirim</a></li>
                                  
                                  
                                  
                             </ul>
                        
           
                     <div id="tabs-2" >
                         <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?><br/>
                    <table class="data" width="100%">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">Nama Pegawai</th>
                            <th class="judultabel">No HP</th>
                            <th class="judultabel">Kegiatan</th>
                            <th class="judultabel">Tgl</th>
                            <th class="judultabel">Status SMS</th>
                           
                            
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
                    <td class="isitabel"><?php echo  $data['nm_pegawai']; ?></td>
                    <td class="isitabel"><?php echo  $data['noHp_pegawai']; ?></td>
                    <td class="isitabel"><?php echo  $data['Jen_kegiatan']; ?></td>
                    <td class="isitabel"><?php echo  tglindo($data['tgl_kegiatan']); ?></td>
                   <td class="isitabel"><?php echo  $data['status_sms']; ?></td>
                    
                    
                   
                    </tr>
                    

                    <?php
                    };
                    ?>
                    </table>
                     
                </div>
                </div>
                    
                   
          
        </body>
        </html>
        <?php
};
?>