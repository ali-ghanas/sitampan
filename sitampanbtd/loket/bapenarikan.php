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
              $("#bapenarikan").submit(function() {
                 if ($.trim($("#txtba").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> no BA tdk boleh kosong");
                    $("#txtba").focus();
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
		$txtba = $_POST['txtba']; 
                $txttglba = $_POST['txttglba'];
                $txtbcf15no = $_POST['txtbcf15no'];
                $txttahun = $_POST['txttahun'];
                $txtsglfisik = $_POST['txtsglfisik'];
                $txtidcont=$_POST['txtidcont'];
                
                $id = $_POST['id'];
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
							bamasukno='$txtba',
							bamasukdate='$txttglba',										
                                                        
                                                        masuk='1'
                                                        	WHERE idbcf15='$id'");
                
                $n = $_POST['n'];
                for ($i=0; $i<=$n-1; $i++)
               {
                 if (isset($_POST['idcont'.$i]))
                 {
                   $txtsglfisik = $_POST['txtsglfisik'.$i]; 
                   $idcont=$_POST['idcont'.$i];
                   $editcont = mysql_query("UPDATE bcfcontainer SET
							segelpelayaran_fisik='$txtsglfisik'
																
                                                      
                                                        	WHERE idcontainer='$idcont'");
                   
                  
                 }
               }
                
                
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Masuk TPP','$txttglba','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtba','$txttglba')");
                
                    echo '<script type="text/javascript">window.location="index.php?hal=loketbatarik&act=1"</script>';
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM bcf15view WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <div id="kotakinput">
        <form method="post" id="bapenarikan" name="bapenarikan" action="?hal=loketin_batarik">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
               
                <tr>
                    <td    >No Berita Acara Penarikan </td> <td>:</td>
                    <td width="20"><input name="txtba" id="txtba" class="required" type="text" value="<?php echo $bcf15['bamasukno']; ?>" size="20" ></input></td>
                     
               
             
                    <td    >Tanggal Masuk</td><td>:</td>
                    <td><input class="required" id="tanggal" type="text" name="txttglba" value="<?php echo $bcf15['bamasukdate']; ?>" ></input></td>
                </tr>
                
                
                    
            <tr>
            
                <td >TPP Tujuan </td><td>:</td>
                <td><select disabled  id="cmbtpp" name="cmbtpp" class="required">
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
                <td >Eks TPS</td><td>:</td>
                <td ><?php echo $bcf15['idtps']; ?>
                </td>
            </tr>
            <tr>
                 <td  >Consigne</td><td>:</td>
                <td colspan="3"><?php echo $bcf15['consignee']; ?></td>
                
            </tr>
            <tr>
                <td>Notify </td><td>:</td>
                <td colspan="3"><?php echo $bcf15['notify']; ?></td>
                
            </tr>
            <tr>
                <td >Type Container </td><td>:</td>
                <td colspan="3"><select disabled class="required" id="cmbfcl" name="cmbfcl">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM typecode ORDER BY idtypecode";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idtypecode]==$bcf15[idtypecode]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idtypecode]' $cek>$data[nm_type]</option>";
                                }
                                ?>
                    </select>
                </td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="7" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Kontainer </b></td>
            </tr>
            <tr>
                <td colspan="7" valign="center" >
                    
                        
                                <?php
                                $query = "select * from bcfcontainer where idbcf15=$id";
                                 $hasil = mysql_query($query);
                                    echo "<table id=tablemodul border='1'>";
                                    echo "<tr><th class='judultabel'>No Container</th>
                                              <th class='judultabel'>Size</th>
                                              <th class='judultabel'>Segel Pelayaran *)</th>
                                              <th class='judultabel'>Segel Fisik **)</th>
                                          </tr>";  
                                     
                                  $i = 0;
                                    while($data = mysql_fetch_array($hasil)){
                                     echo "<tr>
                                             <td class='isitabel'>$data[nocontainer]</td><input type='hidden' id='idcont' name='idcont$i' value='$data[idcontainer]' />
                                            <td class='isitabel'>$data[idsize]</td>
                                            <td class='isitabel'>$data[segelpelayaran_man]</td>
                                            <td class='isitabel'><input name='txtsglfisik$i' class='required' id='txtsglfisik' value='$data[segelpelayaran_fisik]' /></td>
                                        </tr>";
                                      $i++;
                                }
                                echo "</table>";
                                echo "<input type='hidden' name='n' value='$i' /><br/>";
                                
                                ?>
                          
                        <p>Catatan : </p><p>*) Segel berdasarkan data Manifest </p><p>**) Segel Berdasarkan data Fisik dilapangan </p>
                </td>
            </tr> 
            
            
               
            
            <tr><td><input title="Simpan BA Penarikan BCF 15" class="button putih bigrounded " type="submit" name="editsubmit4" value="Simpan" /></td></tr>
            
            </table>
        </form>

        </div>
        
        
	<?php
            

                    }; // penutup else
            ?>
      
                <?php
                $id = $_GET['id']; // menangkap id
                $sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $bcf15 = mysql_fetch_array($query);

                ?>
        <div id="kotakdetail">
	
        <form method="post" id="bcfedit" name="bcfedit" action="?hal=bcfedit">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Detail BCF 15</b> </td></tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>BCF 1.5</b></td></tr>
            <tr>
                <td  width="20%" >No BCF 15   </td> <td>:</td>
                <td  colspan="3"><?php echo $bcf15['bcf15no']; ?> / <?php echo $bcf15['tahun']; ?></td>
                 
            </tr>
            <tr>
                <td   >Tgl BCF 15  </td><td>:</td>
                <td colspan="3"><?php echo tglindo($bcf15['bcf15tgl']); ?></td>
            </tr>
            <tr>
                <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
                <td  >No / Tgl BC 11  </td><td>:</td>
                <td colspan="3"><?php echo $bcf15['bc11no']; ?> / <?php echo tglindo($bcf15['bc11tgl']); ?> / <?php echo $bcf15['bc11pos']; ?> / <?php echo $bcf15['bc11subpos']; ?></td>
                
                <td></td>
            </tr>
           
            <tr>
                <td  >No / Tgl BL  </td><td>:</td>
                <td colspan="3"><?php echo $bcf15['blno']; ?> / <?php echo tglindo($bcf15['bltgl']); ?></td>
                
            </tr>
            <tr>
                <td  >Sar. angkut / Voy  </td><td>:</td>
                <td colspan="3"><?php echo $bcf15['saranapengangkut']; ?> / <?php echo $bcf15['voy']; ?></td>

            </tr>
            <tr>
                <td  >Jumlah dan satuan </td><td>:</td>
                <td colspan="3"><?php echo $bcf15['amountbrg']; ?>   <?php echo $bcf15['satuanbrg']; ?></td>
                
            </tr>
            <tr>
                <td    >Uraian  </td><td>:</td>
                <td  colspan="3" ><?php echo $bcf15['diskripsibrg']; ?></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Consignee / Notify </b></td>
            </tr>
             <tr>
                 <td  >Consigne</td><td>:</td>
                <td colspan="3"><?php echo $bcf15['consignee']; ?></td>
                
            </tr>
            <tr>
                <td>Notify </td><td>:</td>
                <td colspan="3"><?php echo $bcf15['notify']; ?></td>
                
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data TPS /TPP </b></td>
            </tr>
            <tr>
                <td >Eks TPS</td><td>:</td>
                <td ><?php echo $bcf15['idtps']; ?>
                </td>
            </tr>
            <tr>
                <td >TPP Tujuan </td><td>:</td>
                <td colspan="3"> <select  disabled class="required" id="cmbtpp" name="cmbtpp">
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
                <td >FCL / LCL </td><td>:</td>
                <td colspan="3"><select disabled class="required" id="cmbfcl" name="cmbfcl">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM typecode ORDER BY idtypecode";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idtypecode]==$bcf15[idtypecode]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idtypecode]' $cek>$data[nm_type]</option>";
                                }
                                ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td >Keterangan </td><td>:</td>
                <td colspan="3"><?php echo $bcf15['keterangan']; ?></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Kontainer </b></td>
            </tr>
            <tr>
                <td colspan="5" >
                    
                        <table cellspacing="2" cellpadding="2" width="50%">
                            <tr>
                                
                                <td class="judultabel" >No Container</td>
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
                                
                                <td class="isitabel" align="center"><?php echo $bcfcont['nocontainer'];?></td>
                                <td class="isitabel" align="center"><?php echo $bcfcont['idsize'];?></td>
                                

                            </tr>
                            <?php };?>
                        </table>
                </td>
            </tr> 
            

           
            </table>
        </form>
        
            </div>


</body>
</html>
<?php
};
?>