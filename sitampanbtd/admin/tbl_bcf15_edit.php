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
  #suratbataltpp ul li a  {
       background: #d6dceb;
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
                        $bc11no=$_POST['bc11no'];
                        $bc11tgl=$_POST['bc11tgl'];
                        $bc11pos=$_POST['bc11pos'];
                        $bc11subpos=$_POST['bc11subpos'];
                        
                        $idtypecode=$_POST['idtypecode'];
                        $BatalTarik=$_POST['BatalTarik'];
                        $BatalTarikNo=$_POST['BatalTarikNo'];
                        $BatalTarikDate=$_POST['BatalTarikDate'];
                        $masuk=$_POST['masuk'];
                        $bamasukno=$_POST['bamasukno'];
                        $bamasukdate=$_POST['bamasukdate'];
                        
                        $setujubatal=$_POST['setujubatal'];
                        $SetujuBatalNo=$_POST['SetujuBatalNo'];
                        $SetujuBatalDate=$_POST['SetujuBatalDate'];
                        
                        $ndkonfirmasi=$_POST['ndkonfirmasi'];
                        $ndkonfirmasino=$_POST['ndkonfirmasino'];
                        $ndkonfirmasidate=$_POST['ndkonfirmasidate'];
                        $recordstatus=$_POST['recordstatus'];
                        $id = $_POST['id'];
                        


                                    $edit = mysql_query("UPDATE bcf15 SET

                                            bc11no='$bc11no',
                                            bc11tgl='$bc11tgl',
                                            bc11pos='$bc11pos',
                                            bc11subpos='$bc11subpos',
                                            bc11subpos='$bc11subpos',
                                            idtypecode='$idtypecode',
                                            BatalTarik='$BatalTarik',
                                            BatalTarikNo='$BatalTarikNo',
                                            BatalTarikDate='$BatalTarikDate',
                                            masuk='$masuk',
                                            bamasukno='$bamasukno',
                                            bamasukdate='$bamasukdate',
                                            setujubatal='$setujubatal',
                                            SetujuBatalNo='$SetujuBatalNo',
                                            SetujuBatalDate='$SetujuBatalDate',
                                            ndkonfirmasi='$ndkonfirmasi',
                                            ndkonfirmasino='$ndkonfirmasino',
                                            ndkonfirmasidate='$ndkonfirmasidate',
                                            recordstatus='$recordstatus'

                                                                            WHERE idbcf15='$id'");
                              echo "<script type='text/javascript'>window.location='index.php?hal=tbl_bcf15_update&id=$id'</script>";


                    }
                    else 
                    { 

                    $id = $_GET['id']; // menangkap id
                    $sql = "SELECT * FROM bcf15,tpp,typecode WHERE  bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $data = mysql_fetch_array($query);
                    $now=date('Y-m-d');

        ?>
        <form method="post" id="inputmohonbatal" name="inputmohonbatal" action="?hal=tbl_bcf15_update">
        <input type="hidden" name="id" value="<?php echo  $data['idbcf15']; ?>" />
        
            <table width="100%" border="0" align="center" cellpadding="0" >
                <tr>
                    <td class="isitabelnew">
                        Dibawah ini merupakan isi dari "Tabel BCF 1.5 dalam data base SITAMPAN". Anda dapat mengupdate isi dari data tabel ini dengan tujuan :
                        <ul></ul>
                            <li>Memunculkan data saldo pada Hak Akses Pemeriksa Pengawas karena isian pada field "setujubatal" = NULL atau 0.</li>
                           
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            
                            <tr >
                                <td class="isitabelnew">
                                    Nomor BCF 1.5
                                </td>
                                <td class="isitabelnew">:</td>
                                <td >
                                    <?php echo $data['bcf15no']; ?>  
                                </td>
                                <td >
                                    <?php echo $data['bcf15tgl']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="isitabelnew">
                                    Nomor BC 1.1
                                </td>
                                <td class="isitabelnew">:</td>
                                <td >
                                    <?php echo $data['bc11no']; ?> 
                                </td>
                                <td >
                                    <?php echo $data['bc11tgl']; ?>
                                </td>
                                <td >
                                    Pos <?php echo $data['bc11pos']; ?> Subpos <?php echo $data['bc11subpos']; ?>
                                </td>
                            </tr>
                            <?php 
                            $sql = "SELECT * FROM statusakhir WHERE  idstatusakhir=$data[idstatusakhir]"; // memanggil data dengan id yang ditangkap tadi
                            $query = mysql_query($sql);
                            $datastatus = mysql_fetch_array($query);
                            
                            ?>
                            <tr >
                                <td class="isitabelnew">
                                    Status Akhir
                                </td>
                                <td class="isitabelnew">:</td>
                                <td  colspan="3">
                                    <?php if($data[idstatusakhir]=='') {echo "BCF 1.5";}else{ echo $datastatus['statusakhirname'];} ?>  
                                </td>
                                
                            </tr>
                        </table>
                    </td>
                </tr>          
                <tr>
                    <td>
                        <div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Manifest</a></li>   
                                  <li><a href="#tabs-2">Penarikan</a></li>
                                  <li><a href="#tabs-4">Batal BCF 1.5</a></li>
                                  

                              </ul>
                        
                                <div id="tabs-1" >
                                    <table >
                                        <tr valign="top" class="isiform">
                                            <td width="50%" >
                                                <table class="isitabel" >
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            BCF 1.5
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <input type="text" name="bcf15no" id="bcf15no" value="<?php echo $data['bcf15no']; ?>"/> 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="bcf15tgl" id="bcf15tgl" value="<?php echo $data['bcf15tgl']; ?>"/> 
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            BC 1.1
                                                        </td>
                                                       <td class="isitabelnew">:</td>
                                                        <td >
                                                           <input type="text" name="bc11no" id="bc11no" value="<?php echo $data['bc11no']; ?>"/> 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="bc11tgl" id="bc11tgl" value="<?php echo $data['bc11tgl']; ?>"/> 
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            
                                                        </td>
                                                        <td>
                                                            Pos <input type="text" name="bc11pos" id="bc11pos" value="<?php echo $data['bc11pos']; ?>"/>  
                                                        </td>
                                                        <td>Subpos <input type="text" name="bc11subpos" id="bc11subpos" value="<?php echo $data['bc11subpos']; ?>"/></td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                           Type container
                                                        </td>
                                                       <td class="isitabelnew">:</td>
                                                        <td >
                                                           <select  class="required" id="idtypecode" name="idtypecode">
                                                            <option value = "" >--Type Container--</option>
                                                            <?php
                                                                $sql = "SELECT * FROM typecode ORDER BY idtypecode";
                                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                                    while ($datatype =mysql_fetch_array($qry)) {
                                                                        if ($datatype[idtypecode]==$data[idtypecode]) {
                                                                            $cek="selected";
                                                                            }
                                                                       else {
                                                                            $cek="";
                                                                            }
                                                                            echo "<option value='$datatype[idtypecode]' $cek>$datatype[nm_type]</option>";
                                                                        }
                                                            ?>
                                                        </select>
                                                        </td>
                                                        
                                                    </tr>
                                                    

                                                </table>
                                            </td>
                                            
                                        </tr>
                                    </table>
                                    
                                </div>
                                <div id="tabs-2">
                                    <table valign="top">
                                        <tr valign="top" >
                                                <td width="50%" class="isitabel" >
                                                    <table  >

                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                                Batal Tarik
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <input type="text" name="BatalTarik" size="5" id="BatalTarik" value="<?php echo $data['BatalTarik']; ?>"/> 1= Ya, 2=Tidak 
                                                            </td>
                                                           
                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                                Batal Tarik No
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            
                                                            <td colspan="2">
                                                                <input type="text" size="5" name="BatalTarikNo" id="BatalTarikNo" value="<?php echo $data['BatalTarikNo']; ?>"/>  / <input type="text"  name="BatalTarikDate" id="BatalTarikDate" value="<?php echo $data['BatalTarikDate']; ?>"/>   (YYYY-MM-DD)
                                                            </td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                                BA Penarikan
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <input type="text" name="masuk" size="5" id="masuk" value="<?php echo $data['masuk']; ?>"/> 1= Ya, 2=Tidak 
                                                            </td>
                                                           
                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                                No BA Penarikan
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            
                                                            <td colspan="2">
                                                                <input type="text" size="5" name="bamasukno" id="bamasukno" value="<?php echo $data['bamasukno']; ?>"/>  / <input type="text"  name="bamasukdate" id="bamasukdate" value="<?php echo $data['bamasukdate']; ?>"/>  (YYYY-MM-DD)
                                                            </td>
                                                        </tr>
                                                        
                                                        
                                                        


                                                    </table>
                                                </td>
                                                
                                            </tr>
                                    </table>
                                </div>
                                
                                <div id="tabs-4">
                                    <table>
                                        <tr valign="top" class="isiform">
                                                <td width="50%" class="isitabel">
                                                    <table  >
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                                Pembatalan BCF 1.5
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <input type="text" name="setujubatal" size="5" id="setujubatal" value="<?php echo $data['setujubatal']; ?>"/> 1= Ya, 2=Tidak 
                                                            </td>
                                                           
                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                               No Agenda Pembatalan BCF 1.5
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            
                                                            <td colspan="2">
                                                                <input type="text" size="5" name="SetujuBatalNo" id="SetujuBatalNo" value="<?php echo $data['SetujuBatalNo']; ?>"/>  / <input type="text"  name="SetujuBatalDate" id="SetujuBatalDate" value="<?php echo $data['SetujuBatalDate']; ?>"/>  (YYYY-MM-DD)
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                                Konfirmasi Hardcopy
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <input type="text" name="ndkonfirmasi" size="5" id="ndkonfirmasi" value="<?php echo $data['ndkonfirmasi']; ?>"/> 1= Ya, 2=Tidak 
                                                            </td>
                                                           
                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                               No ND Konfirmasi
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            
                                                            <td colspan="2">
                                                                <input type="text" size="5" name="ndkonfirmasino" id="ndkonfirmasino" value="<?php echo $data['ndkonfirmasino']; ?>"/>  / <input type="text"  name="ndkonfirmasidate" id="ndkonfirmasidate" value="<?php echo $data['ndkonfirmasidate']; ?>"/>  (YYYY-MM-DD)
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Dokumen Pemberitahuan
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php if($data['DokumenCode']=='1') echo "SPPB"; elseif($data['DokumenCode']=='2') echo "BC1.2";elseif($data['DokumenCode']=='3') echo "BC23"; elseif($data['DokumenCode']=='5') echo "BC20";elseif($data['DokumenCode']=='11') echo "ND Kasi Manifest";elseif($data['DokumenCode']=='12') echo "PIB";elseif($data['DokumenCode']=='13') echo "PIBK";elseif($data['DokumenCode']=='27') echo "Persetujuan Reekspor";elseif($data['DokumenCode']=='28') echo "Returnable Package";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Nomor
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php echo $data['DokumenNo']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                             Tanggal
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php echo $data['DokumenDate']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Dokumen Pengeluaran
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php if($data['Dokumen2Code']=='1') echo "SPPB"; elseif($data['Dokumen2Code']=='2') echo "BC1.2";elseif($data['Dokumen2Code']=='3') echo "BC23"; elseif($data['Dokumen2Code']=='5') echo "BC20";elseif($data['Dokumen2Code']=='11') echo "ND Kasi Manifest";elseif($data['Dokumen2Code']=='12') echo "PIB";elseif($data['Dokumen2Code']=='13') echo "PIBK";elseif($data['Dokumen2Code']=='27') echo "Persetujuan Reekspor";elseif($data['Dokumen2Code']=='28') echo "Returnable Package";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Nomor
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php echo $data['Dokumen2No']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                             Tanggal
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php echo $data['Dokumen2Date']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                               Recordstatus
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            
                                                            <td colspan="2">
                                                                <input type="text" size="5" name="recordstatus" id="recordstatus" value="<?php echo $data['recordstatus']; ?>"/> 1=Masih dimanifest, 2=Seksi Tempat Penimbunan
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td colspan="3">
                                                                <input class="button putih bigrounded " type="submit" name="editsubmit4" value="Simpan" onclick="javascript:return confirm('Anda Yakin Untuk Menyimpan ?')"   /> 
                                                            </td>
                                                        </tr>




                                                    </table>
                                                </td>
                                                
                                            </tr>
                                    </table>

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
                    
                
               

                    }; // penutup else
           
            ?>