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
    <title>Pembatalan Status BCF 1.5</title>
    <!--       jquery anytimes -->
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
<!--        <script type="text/javascript" src="lib/js/jquery.tools.min.js"></script>-->
         
        
        

       
         <script type="text/javascript">
      $(document).ready(function() {
	       $('#ceksemua').click(function () {
		        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
	       });
      });  
    </script>
    <script type="text/javascript"> 
      $(document).ready(function(){
        $(".flip").click(function(){
          $(".pesan").slideToggle("slow");
        });
      });
    </script>
    <script type="text/javascript"> 
      $(document).ready(function(){
        	$("#flowtabs").tabs("#flowpanes > div");


	    });
	</script>


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
        background: #bed4e9;
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
      background: #f1f2f9;
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
      background: #f1f2f9;
   }
  #suratbataltpp ul li a  {
       background: #f1f2f9;
   }
   .tabs-bottom .ui-tabs-nav li.ui-tabs-selected { 
      margin-top: -10px; 
      background: #eee;
   }   

     
    </style>
    <script type="text/javascript">
           $(document).ready(function() {
              $("#suratbataltpp").tabs({collapsible:"true"}).find(".ui-tabs-nav").sortable();
              $("#suratbataltpp").tabs({
                  fx:{
                      opacity :"toggle",
                      duration: "slow"
                  }
              })
           });
    </script>

    </head>
    <body>
       
	     <?php // aksi untuk edit
session_start();


if(isset($_POST['editsubmit4'])) // jika tombol editsubmit ditekan
	{ 
                $cek_suratpermohonan=$_POST['cek1'];
                $cek_sppb=$_POST['cek2'];
                $cek_nhp=$_POST['cek3'];
                $cek_st=$_POST['cek4'];
                $cek_sk=$_POST['cek5'];
                $cek_doklkp=$_POST['cek6'];
                $cek_idcard=$_POST['cek7'];
                $cek_pib=$_POST['cek8'];
                $cek_bc12=$_POST['cek9'];
                $cek_bc30=$_POST['cek10'];
                $lengkap=$_POST['cek11'];
                $cek_tutuppu=$_POST['cek13'];
                $cek_lainnya=$_POST['cek12'];
                $cek_lainnya_char=$_POST['cek12_lain'];
                $tgllengkap=date('Y-m-d H:i:s');
                $tglajudok=date('Y-m-d H:i:s');
               
                
                $id = $_POST['id'];
                
                //mengecek apakah data sudah pernah diinput atau belum
                //jika sudah di update, jika belum 
                $sql = "select * FROM suratmasukpembatalanbcf15 WHERE noidbcf15=$id";
                $querysbtl = mysql_query($sql);
                $ceksbtl=mysql_numrows($querysbtl);
                if($ceksbtl>0) {
                   
                   $edit = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
			cek_nhp='$cek_nhp',
                        cek_sppb='$cek_sppb',
                        cek_st='$cek_st',
                        cek_sk='$cek_sk',
                        cek_doklkp='$cek_doklkp',
                        cek_idcard='$cek_idcard',
                        cek_suratpermohonan='$cek_suratpermohonan',
                        cek_pib='$cek_pib',
                        cek_bc12='$cek_bc12',
                        cek_bc30='$cek_bc30',
                        cek_tutuppu='$cek_tutuppu',
                        cek_lainnya='$cek_lainnya',
                        cek_lainnya_char='$cek_lainnya_char',
                        lengkap='$lengkap',
                        tgllengkap='$tgllengkap'
                        
                        
                                                        	WHERE noidbcf15='$id'");
                    
                            echo "<script type='text/javascript'>window.location='index.php?hal=newkonfirmasi&pilihloket=new_kirimtpp&id=$id'</script>";
                    
                }
                //jika tidak ada maka update bcf15,update buka pos bc 1.1, input surat pembatalan,
                else{
                    $edit = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
			cek_nhp='$cek_nhp',
                        cek_sppb='$cek_sppb',
                        cek_st='$cek_st',
                        cek_sk='$cek_sk',
                        cek_doklkp='$cek_doklkp',
                        cek_idcard='$cek_idcard',
                        cek_suratpermohonan='$cek_suratpermohonan',
                        cek_pib='$cek_pib',
                        cek_bc12='$cek_bc12',
                        cek_bc30='$cek_bc30',
                        cek_tutuppu='$cek_tutuppu',
                        cek_lainnya='$cek_lainnya',
                        cek_lainnya_char='$cek_lainnya_char',
                        lengkap='$lengkap',
                        tgllengkap='$tgllengkap'
                        
                        
                                                        	WHERE noidbcf15='$id'");
                    
                            echo "<script type='text/javascript'>window.location='index.php?hal=newkonfirmasi&pilihloket=new_kirimtpp&id=$id'</script>";
                    
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select *  FROM bcf15,tpp,typecode WHERE bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tglsurat=view($bcf15['SuratBatalDate']);
        
        
        $sqlsurat = "select * FROM suratmasukpembatalanbcf15 WHERE noidbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$querybcfsurat = mysql_query($sqlsurat);
	$bcfsurat = mysql_fetch_array($querybcfsurat);
        
        ?>
        <form method="post" id="inputmohonbatal" name="inputmohonbatal" action="?hal=newkonfirmasi&pilihloket=new_kirimtpp_lengkap">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
       <input type="hidden" name="status" id="status" value="<?php echo $bcf15['idstatusakhir']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" >
                <tr>
                    <td colspan="5" class="judulbreadcrumb">Permohonan Pembatalan BCF 1.5 </td>
                        
                   
                </tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Detail BCF 1.5</b></td></tr>
                <tr>
                    <td>
                        <div class="pesan">
                            <table>
                                <tr>
                                        <td  align="left" class="judulform">No BCF 15   </td> <td class="judulform">:</td>
                                        <td ><?php echo $bcf15['bcf15no']; ?> 

                                                    <?php
                                                        $sql = "SELECT * FROM manifest ORDER BY idmanifest";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idmanifest]==$bcf15[idmanifest]) {

                                                                echo "$data[kd_manifest]";
                                                        }
                                                        }
                                                        ?>
                                            <?php echo $bcf15['tahun']; ?> <a href="?hal=detailstatusakhirman&id=<?php echo $bcf15[idbcf15]; ?>" target="_blank" title="Detail BCF 1.5"><img src="images/new/view.png" /></a>
                                        </td> 
                                    </tr>

                                    <tr>
                                        <td  align="left" class="judulform"  >Tgl BCF 15  </td><td class="judulform">:</td>
                                        <td><?php echo tglindo($bcf15['bcf15tgl']); ?></td>
                                    </tr>
                                    <tr>
                                            <td  align="left"  class="judulform">Consignee </td><td class="judulform">:</td>
                                            <td><?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="To The Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];};?></td>
                                   </tr>
                                    <tr>
                                            <td  align="left"  class="judulform">TPP Tujuan </td><td class="judulform">:</td>
                                            <td><?php echo "$bcf15[nm_tpp]"?></td>
                                   </tr>
                                    <tr>

                                    <td align="left" class="judulform">Lokasi Barang </td><td class="judulform">:</td>
                                        <td>
                                          <?php if ($bcf15['bamasukno']=="") {echo "<font color='red'>TPS $bcf15[idtps]</font>"; } else  {echo "<font color='green'>TPP $bcf15[nm_tpp]</font>";};?>
                                        </td>

                                    </tr>
                                    <tr>
                                    <td align="left" class="judulform">Type Cont </td><td class="judulform">:</td>
                                        <td>
                                          <?php echo $bcf15['nm_type']; ?> 
                                        </td>

                                    </tr>
                                    <?php 
                                    if($bcf15['NHPLelangNo']=='') {echo "<tr><td align='left' class='judulform'>Status NHP Lelang</td><td class='judulform'>:</td><td>Belum Cacah</td></tr>";} else {echo "<tr><td align='left' class='judulform'>NHP Lelang</td><td class='judulform'>:</td><td>Telah Cacah Lelang dengan Nomor :$bcf15[NHPLelangNo] </td></tr>";}
                                    ?>
                            </table>
                        </div>
                <blink><p class="flip"><b>Tampilkan dan Sembunyikan Detail BCF 1.5</b></p></blink>

                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <div id="suratbataltpp">
                            
                              <ul>
                                  
                                  <li><a href="#tabs-4">Kelengkapan Dokumen</a></li>
                                  

                              </ul>
                        
                                
                            <div id="tabs-4">
                                <script type="text/javascript">
                                       $(document).ready(function() {    
                                          $(".cek12_lain").hide();

                                          

                                          $(".cek12").click(function(e) {
                                               if ($(e.target).val() == "1")
                                                  $(".cek12_lain").show();
                                               else  
                                                  $(".cek12_lain").hide();
                                          });        
                                       });   
                                    </script>        

                                            <div style="background-image: url(images/bkgd-header.jpg); color:#fff">
                                                <span >Apakah Dokumen ini telah lengkap</span>
                                                <input type="checkbox" value="1" name="cek11" id="cek11" <?php  if($bcfsurat['lengkap'] == 1){echo 'checked="checked"';}?>> Ya Lengkap 
                                                
                                            </div>
                                            <div class="demo" style="width: auto;">

                                              <h4>Centang persyaratan dokumen yang telah dipenuhi : </h4>
                                              <fieldset>
                                                <input type="checkbox" name="cek1" id="cek1" class="suratpermohonan" value="1"  <?php  if($bcfsurat['cek_suratpermohonan'] == 1){echo 'checked="checked"';}?> > Permohonan<br/>
                                                <input type="checkbox" name="cek2" id="cek2" class="sppb" value="1" <?php  if($bcfsurat['cek_sppb'] == 1){echo 'checked="checked"';}?>> SPPB Asli / Persetujuan Reekspor/ ND Kasi Manifest(Ret Pack)   <br/>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="cek8" id="cek8" class="pib" value="1" <?php  if($bcfsurat['cek_pib'] == 1){echo 'checked="checked"';}?>> PIB / BC 2.3  <br/>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="cek9" id="cek9" class="bc12" value="1" <?php  if($bcfsurat['cek_bc12'] == 1){echo 'checked="checked"';}?>> BC 1.2   <br/>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="cek10" id="cek10" class="bc30" value="1" <?php  if($bcfsurat['cek_bc30'] == 1){echo 'checked="checked"';}?>> BC 3.0   <br/>
                                                <input type="checkbox" name="cek3" id="cek3" value="1" class="nhp" <?php  if($bcfsurat['cek_nhp'] == 1){echo 'checked="checked"';}?> > NHP Asli<br/>
                                                <input type="checkbox" name="cek4" value="1" id="cek4" <?php  if($bcfsurat['cek_st'] == 1){echo 'checked="checked"';}?>> Surat Tugas<br>
                                                <input type="checkbox" name="cek5" value="1" id="cek5" <?php  if($bcfsurat['cek_sk'] == 1){echo 'checked="checked"';}?>> Surat Kuasa<br>
                                                <input type="checkbox" name="cek6" value="1" id="cek6" <?php  if($bcfsurat['cek_doklkp'] == 1){echo 'checked="checked"';}?>> Inv/Pck List / BL<br>
                                                <input type="checkbox" name="cek7" value="1" id="cek7" <?php  if($bcfsurat['cek_idcard'] == 1){echo 'checked="checked"';}?>> Id Card<br>
                                                <input type="checkbox" name="cek13" value="1" id="cek13" <?php  if($bcfsurat['cek_tutuppu'] == 1){echo 'checked="checked"';}?>>Tutup PU (SPPB H/K/M/MITAP/NP)<br>
                                                <input type="checkbox" name="cek12" value="1" id="cek12" class="cek12" <?php  if($bcfsurat['cek_lainnya'] == 1){echo 'checked="checked"';}?>> Lainnya<span class="cek12_lain">. Sebutkan:</span>
                                                       <input type="text" id="cek12_lain" name="cek12_lain" 
                                                              value="<?php echo $bcfsurat['cek_lainnya_char']; ?>"  class="cek12_lain" />
                                                <br><hr>

                                                <input type="checkbox" id="ceksemua">Check All<br>

                                              </fieldset>

                                            </div>
                                    
                                    <div>
                                
                                        <input class="button putih bigrounded " type="submit" name="editsubmit4" value="Simpan" onclick="javascript:return confirm('Anda Yakin Untuk Menyimpan ?')"   /> <input class="button putih bigrounded " type="button" value="Back" onclick="self.history.back()" />
                                    </div>
                            </div>
                             
                            
                            
                            </div>
                    </td>
                </tr>
                
                <tr>
                
                </tr>
                
            
            </table>
        </form>
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>
     
            

</body>
</html>
<?php
};
?>