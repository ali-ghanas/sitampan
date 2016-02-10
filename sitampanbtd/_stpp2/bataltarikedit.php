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
    <title>Permohonan Batal Tarik</title>
    
       
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script> 
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#bataltarikedit").submit(function() {
                 if ($.trim($("#txtnosurat").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Nosurat Permohonan Kosong, Wajib diisi untuk melanjutkannya");
                    $("#txtnosurat").focus();
                    return false;  
                 }
                 if ($.trim($("#txtno2surat").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?>  Kode Surat Permohonan dari TPP kosong, Wajib diisi untuk melanjutkannya");
                    $("#txtno2surat").focus();
                    return false;  
                 }
                 if ($.trim($("#ket").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?>  Alasan Batal Tarik nya kosong, Wajib diisi untuk melanjutkannya");
                    $("#ket").focus();
                    return false;  
                 }
                 
                 
              });      
           });
        </script>
       
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal2").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
    
    </head>
    <body>
        
          

<?php // aksi untuk edit
session_start();


if(isset($_POST['editsubmit3'])) // jika tombol editsubmit ditekan
	{
    
                $tahun= $_POST['tahun']; 
		$txtnobcf15 = $_POST['txtbcf15no']; 
                $txtnosurat=$_POST['txtnosurat'];
                $txtno2surat=$_POST['txtno2surat'];
                $tanggal=$_POST['tanggal'];
                $cmbdok1=$_POST['cmbdok1'];
                $cmbdok2=$_POST['cmbdok2'];
                $txtnodok1=$_POST['txtnodok1'];
                $txtnodok2=$_POST['txtnodok2'];
                $txttanggaldok2=$_POST['txttanggaldok2'];
                $txttanggaldok1=$_POST['txttanggaldok1'];
                $ket=$_POST['ket'];
                $id = $_POST['id'];
                $tglkini=date('Y-m-d');
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;
                $sql1 = "SELECT * FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query1 = mysql_query($sql1);
                $bcf151 = mysql_fetch_array($query);
                if($bcf151['bamasukno']==!''){
                    echo '<script type="text/javascript">
                    alert("Tidak Dapat di proses karena sudah masuk TPP");</script>';
                    
                }
                else{

		$edit = mysql_query("UPDATE bcf15 SET
							
                                                        BatalTarikNo='$txtnosurat',
                                                        BatalTarikNo2='$txtno2surat',
                                                        BatalTarikDate='$tanggal',
                                                        BatalTarikKet='$ket',
                                                        DokumenCode='$cmbdok1',
                                                        DokumenNo='$txtnodok1',
                                                        DokumenDate='$txttanggaldok1',
                                                        Dokumen2Code='$cmbdok2',
                                                        Dokumen2No='$txtnodok2',
                                                        Dokumen2Date='$txttanggaldok2',
                                                        BatalTarik='1'
							
                                                        	WHERE idbcf15='$id'");
                mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('Permohonan BATAL Tarik','$tglkini','$txtnobcf15','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
                
                    echo '<script type="text/javascript">window.location="index.php?hal=pagemonitoring&pilih=bataltarik&act=1"</script>';
                }          
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        ?>
       
                    <table width="100%" border="0" bgcolor="#cbd9e7">
                        <tr bgcolor="#cbd9e7">
                            <td align="left" width="20%" >No BCF 15   </td> <td width="1%">:</td><td><?php echo  $bcf15['bcf15no']; ?></td>
                            <td align="left" width="20%" >Tanggal   </td> <td width="1%">:</td><td><?php echo tglindo($bcf15['bcf15tgl']); ?></td>
                        </tr>
                        <tr >
                            <td align="left" width="20%" >No BC 1.1   </td> <td width="1%">:</td><td><?php echo  $bcf15['bc11no']; ?></td>
                            <td align="left" width="20%" >Tanggal   </td> <td width="1%">:</td><td><?php echo  tglindo($bcf15['bc11tgl']); ?></td>
                            <td align="left" width="10%" >Pos   </td> <td width="1%">:</td><td><?php echo  $bcf15['bc11pos']; ?></td>
                            
                        </tr>
                        <tr >
                            <td align="left" width="20%" >No B / L   </td> <td width="1%">:</td><td><?php echo  $bcf15['blno']; ?></td>
                            <td align="left" width="20%" >Tanggal   </td> <td width="1%">:</td><td><?php echo  tglindo($bcf15['bltgl']); ?></td>
                        </tr>
                        <tr >
                            <td align="left" width="20%" >Pemilik Barang  </td> <td width="1%">:</td><td colspan="3"><font color="red"><?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="To The Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToTheOrder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="totheorder") {echo $bcf15['notify']; }  else  {echo $bcf15['consignee'];};?></font></td>
                            
                        </tr>
                        <tr >
                            <td align="left" width="20%" >Lokasi Barang </td> <td width="1%">:</td><td colspan="3"><font ><?php if ($bcf15['bamasukno']=='') {echo "<font color=blue>TPS $bcf15[idtps]</font>"; }  else {echo "<font color=red>TPP $bcf15[nm_tpp]</font>";} ?></font></td>
                            
                        </tr>
                        <tr>
                            <td align="left" width="20%" >Uraian Peti Kemas </td> <td width="1%">:</td>
                            <td colspan="3">
                                <table cellspacing="0" cellpadding="0">
                    
                                        <?php
                                            include '../lib/koneksi.php';
                                           
                                            $rowset = mysql_query("select * from bcfcontainer where idbcf15=$bcf15[idbcf15]");
                                             while($bcfcont = mysql_fetch_array($rowset)){


                                      ?>
                                    <tr>
                                        <td ><?php echo $bcfcont['nocontainer'];?></td>
                                        <td>&nbsp;/&nbsp;</td>
                                        <td ><?php echo $bcfcont['idsize'];?></td>

                                    </tr>
                                    <?php };?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                           <td align="left" width="20%" >Jenis Peti Kemas </td> <td width="1%">:</td>
                            <td colspan="3"><?php $rowset = mysql_query("select * from bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and idbcf15=$bcf15[idbcf15]"); while($typecode = mysql_fetch_array($rowset)){ if ($typecode['idtypecode']==$bcf15['idtypecode']) {echo $typecode['nm_type'];} };?></td>
                        </tr>
                       
                    </table>
             

	
        <form method="post" id="bataltarikedit" name="bataltarikedit" action="?hal=bataltarikedit">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo  $bcf15['tahun']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" >
                
                <tr><td height="40px" align="center" colspan="4" bgcolor="#124578"><font color="#fff" size="5"><b>Permohonan Batal Tarik</b></font></td></tr>
                <tr>
                    <td width="20%">Nomor</td><td width="1%">:</td><td colspan="2"><input size="10" class="required" type="text" name="txtnosurat" id="txtnosurat" value="<?php echo $bcf15['BatalTarikNo']; ?>" /> / <input size="30" class="required" type="text" name="txtno2surat" id="txtno2surat" value="<?php echo $bcf15['BatalTarikNo2']; ?>" /></td>
                </tr>
                <tr>
                    <td width="20%">Tanggal</td><td width="1%">:</td><td colspan="2"><input class="required" type="text" name="tanggal" id="tanggal" value="<?php echo $bcf15['BatalTarikDate']; ?>" /></td>
                </tr>
                <tr>
                    <td width="20%">Keterangan Batal Tarik</td><td width="1%">:</td><td colspan="2"><input size="60" class="required" type="text" name="ket" id="ket" value="<?php echo $bcf15['BatalTarikKet']; ?>" /></td>
                </tr>
                    
            
            <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Dokumen Pengeluaran</b></td></tr>
                <tr>
                    <td width="20%">Dokumen Pemberitahuan(PIB ,etc)</td><td width="1%">:</td>
                    <td><select class="required" id="cmbdok1" name="cmbdok1" >
                        <option value="" selected>--Dokumen Pengeluaran--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen where jenis='keluar' ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$bcf15[DokumenCode]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[iddokumen]' $cek>$data[dokumenname]</option>";
                                    }
                                    ?>
                        </select></td>
                    
                </tr>
                <tr>
                    <td width="20%">Nomor</td><td width="1%">:</td>
                    <td width="20"><input name="txtnodok1" id="txtnodok1" class="required" type="text" value="<?php echo $bcf15['DokumenNo']; ?>" ></input></td>
                </tr>
                <tr>
                    <td width="20%">Tanggal</td><td width="1%">:</td>
                    <td width="20"><input name="txttanggaldok1" id="tanggal1" class="required" type="text" value="<?php echo $bcf15['DokumenDate']; ?>" ></input></td>
                </tr>
                <tr>
                    <td width="20%">Dokumen Pengeluaran</td><td width="1%">:</td>
                    <td><select class="required" id="cmbdok2" name="cmbdok2" >
                        <option value="" selected>--Dokumen Pengeluaran--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen where jenis='pemberitahuan' ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$bcf15[Dokumen2Code]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[iddokumen]' $cek>$data[dokumenname]</option>";
                                    }
                                    ?>
                        </select></td>
                    
                </tr>
                <tr>
                    <td width="20%">Nomor</td><td width="1%">:</td>
                    <td width="20"><input name="txtnodok2" id="txtnodok2" class="required" type="text" value="<?php echo $bcf15['Dokumen2No']; ?>" ></input></td>
                </tr>
                <tr>
                    <td width="20%">Tanggal</td><td width="1%">:</td>
                    <td width="20"><input name="txttanggaldok2" id="tanggal2" class="required" type="text" value="<?php echo $bcf15['Dokumen2Date']; ?>" ></input></td>
                    
                </tr>
                <tr><td colspan="4"><input type="submit" name="editsubmit3" value="Save" class="button putih bigrounded " /></td></tr>
           
            </table>
        </form>
        
	<?php
//        if
//                    (strlen(bcf15no)<6){
//                    echo '<script type="text/javascript">
//                    alert("NIP harus diisi 6 digit");</script>';
//                }
        
        }; // penutup else
?>
      </div>
        </div>
</body>
</html>
<?php
};
?>