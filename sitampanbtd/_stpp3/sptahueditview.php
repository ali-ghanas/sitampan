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
    <title>Input Surat Pemberitahuan</title>
        
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#sptahuview").submit(function() {
                 if ($.trim($("#txtsptahu").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No Surat tidak boleh kosong");
                    $("#txtsptahu").focus();
                    return false;  
                 }
                  if ($.trim($("#cmbtp3").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Pilih kode surat Penimbunan 3 ");
                    $("#cmbtp3").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbtpp3").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Pilih dulu Penandatangan Surat Pemberitahuan ");
                    $("#cmbtpp3").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbpelayaran").val()) == "") {
                     alert("<?php session_start(); echo "Maaf  $_SESSION[nm_lengkap]..." ?> Pilih dulu pelayarannya " );
                    $("#cmbpelayaran").focus();
                    return false;  
                 }
                 
                 
              });      
           });
        </script> 
    
    </head>
    <body>
       
	     <?php // aksi untuk edit
            session_start();


            if(isset($_POST['editsubmit4'])) // jika tombol editsubmit ditekan
                    { 
                            $sql = "SELECT * FROM bcf15 where suratno='txtsptahu' and suratdate='txttglsurat' ";
                                 $query = mysql_query($sql);
                                 $cek=mysql_numrows($query);
                                if($cek>0){
                                echo '<script type="text/javascript">
                                alert("No Surat Pernah di input");</script>';

                            }
                            else {

                            $txtsptahu = $_POST['txtsptahu']; 
                            $cmbtp3 = $_POST['cmbtp3'];
                            $txttglsurat = $_POST['txttglsurat'];
                            $txtbcf15no = $_POST['txtbcf15no'];
                            $txttahun = $_POST['txttahun'];
                            $cmbtpp3 = $_POST['cmbtpp3'];
                            $cmbpelayaran = $_POST['cmbpelayaran'];
                            $tglkini=date('Y-m-d');

                            $id = $_POST['id'];

            //                echo $txtnobcf15; 
            //                echo $cmbkodemanifest;
            //                echo  $txttglbcf15;
            //                echo  $txtbc11no;
            //                echo  $txtbc11tgl;

                            $edit = mysql_query("UPDATE bcf15 SET
                                                                    suratno='$txtsptahu',
                                                                    idtp3='$cmbtp3',										
                                                                    suratdate='$txttglsurat',
                                                                    pemberitahuan='1',
                                                                    idseksitp3='$cmbtpp3',
                                                                    idpelayaran='$cmbpelayaran'
                                                                            WHERE idbcf15='$id'");

                            mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Input Surat Pemberitahuan','$tglkini','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsptahu','$txttglsurat')");
                                echo '<script type="text/javascript">window.location="index.php?hal=suratpemberitahuan"</script>';
                            }         
                    }
                    else 
                    { 
                    $id = $_GET['id']; // menangkap id
                    $sql = "select *,idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, bc11no, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl, bc11pos, bc11pos, blno, DATE_FORMAT(bltgl,'%d %M %Y') as bltgl, idtpp,idmanifest, Perintah, suratperintahno, idtp2, suratperintahdate, tahun  FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $tahunkini=date('Y');

                    ?>
                    <form method="post" id="sptahuview" name="sptahuview" action="?hal=sptahuview">
                    <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
                    <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
                    <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
                        <table width="100%" border="0" align="left" cellpadding="3" cellspacing="6">
                            <tr align="center"><td height="22" colspan="3" bgcolor="#84B9D5" class="HEAD"><b>Surat Pemberitahuan BCF 1.5</b> </td></tr>
                            <tr>
                                <td  align="left" width="20%">No Surat  </td> 
                                <td width="20" coslpan="3"><input name="txtsptahu" id="txtsptahu" class="required" type="text" value="<?php echo $bcf15['suratno']; ?>" size="8" maxlength="6"></input>
                                <select class="required" id="cmbtp3" name="cmbtp3">
                                    <option value="" selected>--kd surat tp3--</option>
                                            <?php
                                                $sql = "SELECT * FROM tp3 ORDER BY idtp3";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idtp3]==$bcf15[idtp3]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idtp3]' $cek>$data[kd_tp3]</option>";
                                                }
                                                ?>
                                    </select>
                                    <input class="required" name="txttahun" id="txttahun"  type="text" value="<?php echo $tahunkini; ?>" disabled></input>
                                </td> 
                            </tr>
                            <tr>
                                <td  align="left"  >Tgl Surat  </td>
                                <td><input class="required" id="tanggal" type="text" name="txttglsurat" value="<?php echo $bcf15['suratdate']; ?>" ></input></td>
                            </tr>
                            <tr>
                                 <td  align="left"  >Seksi  </td>
                                <td >
                                <select class="required" id="cmbtpp3" name="cmbtpp3" >
                                    <option value = "" >--Pilih Seksi--</option>
                                    <?php
                                        $sql = "SELECT * FROM seksi where kdseksi='tpp3' ORDER BY idseksi";
                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                if ($data[idseksi]==$bcf15[idseksitp3]) {
                                                    $cek="selected";
                                                    }
                                               else {
                                                    $cek="";
                                                    }
                                                    echo "<option value='$data[idseksi]' $cek>$data[nm_seksi] <p><font size=\"2\" color=\"#FFF000\">$data[plh]</font></p></option>";
                                                }
                                    ?>
                                </select>(penandatangan Surat Pemberitahuan)
                                </td>
                            </tr>
                            <tr>
                                 <td  align="left"  >Perusahan Pelayaran  </td>
                                <td >
                                <select class="required" id="cmbpelayaran" name="cmbpelayaran" >
                                    <option value = "" >--Pilih Pelayaran--</option>
                                    <?php
                                        $sql = "SELECT * FROM pelayaran ORDER BY idpelayaran";
                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                if ($data[idpelayaran]==$bcf15[idpelayaran]) {
                                                    $cek="selected";
                                                    }
                                               else {
                                                    $cek="";
                                                    }
                                                    echo "<option value='$data[idpelayaran]' $cek>$data[nm_pelayaran]</option>";
                                                }
                                    ?>
                                </select>(Silahkan Pilih Pelayaran) Jika baru <font size="4" color="#880000"><a href="?hal=inputpel" target="new">Klik Sini</a></font>
                                </td>
                            </tr>
                            <tr align="center"><td height="22" colspan="3" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
                        <tr><td><input class="button putih bigrounded " type="submit" name="editsubmit4" value="Update"  /></td><td><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>

                            <tr><td height="20" align="center" colspan="3" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Detail BCF 1.5</b></td></tr>
                            <tr>

                            </tr>    
                        <tr>
                            <td  align="left" >No BCF 15   </td> 
                            <td width="20"><input class="required" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?> " disabled />
                            <select class="required" disabled id="cmbmanifest" name="cmbmanifest">
                              <option value="" selected></option>
                                        <?php
                                            $sql = "SELECT * FROM manifest ORDER BY idmanifest";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idmanifest]==$bcf15[idmanifest]) {
                                                            $cek="selected";
                                                    }
                                                    else {
                                                            $cek="";
                                                    }
                                                    echo "<option value='$data[idmanifest]' $cek>$data[kd_manifest] </option>";
                                            }
                                            ?>
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <td  align="left"   >Tgl BCF 15  </td>
                            <td><input class="required" name="txtbcf15tgl" value="<?php echo $bcf15['bcf15tgl']; ?>" disabled  /></td>
                        </tr>
                        <tr>
                            <td  align="left"   >Consignee/Notify  </td>
                            <td colspan="2"><input size="40" class="required" name="txtcons" value="<?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="To The Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToTheOrder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="totheorder") {echo $bcf15['notify']; }  else  {echo $bcf15['consignee'];};?>" disabled  /></td>
                        </tr>
                        <tr>
                            <td height="20" align="center" colspan="3" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
                        </tr>
                        <tr>

                        <td >TPP Tujuan </td>
                            <td><select class="required" disabled  id="cmbtpp" name="cmbtpp">
                              <option value="" selected></option>
                                        <?php
                                            $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idtpp]==$bcf15[idtpp]) {
                                                            $cek="selected";
                                                    }
                                                    else {
                                                            $cek="";
                                                    }
                                                    echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                            }
                                            ?>
                                </select>
                            </td>

                        </tr>
                        <tr>

                        <td >Ex TPS </td>
                            <td><input class="required" name="cmbtps" value="<?php echo $bcf15['idtps']; ?>" disabled  />
                            </td>

                        </tr>

                            <tr>
                             <td height="20" align="center" colspan="3" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Kontainer </b></td>
                        </tr>
                        <tr>
                            <td colspan="5">

                                    <table cellspacing="0" cellpadding="3">
                                        <tr>
                                            <td class="judultabel">Id BCF 15</td>
                                            <td class="judultabel">No Container</td>
                                            <td class="judultabel">Size</td>

                                        </tr>
                                            <?php
                                                $rowset = mysql_query("select * from bcfcontainer where idbcf15=$id");
                                                 while($bcfcont = mysql_fetch_array($rowset)){

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
                                        <tr>
                                            <td class="isitabel"><?php echo $bcfcont['idbcf15'];?></td>
                                            <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
                                            <td class="isitabel"><?php echo $bcfcont['idsize'];?></td>

                                        </tr>
                                        <?php };?>
                                    </table>
                            </td>
                        </tr>
                        <tr align="center"><td height="22" colspan="3" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
                        <tr><td><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>

                        </table>
                    </form>



                    <script type="text/javascript">new Validation('bcfedit',{useTitles : true},{stopOnFirst:true}, {immediate : true});</script>
                    <?php
                                 $sql = "SELECT * FROM bcf15 where suratperintahno='$txtsprint' and suratperintahdate='$txttglsprint' ";
                                 $query = mysql_query($sql);
                                 $cek=mysql_numrows($query);
                                if($cek>0){
                                echo '<script type="text/javascript">
                                alert("No Surat Pernah di input");</script>';

                            }



                                }; // penutup else
                        ?>
      
            

</body>
</html>
<?php
};
?>