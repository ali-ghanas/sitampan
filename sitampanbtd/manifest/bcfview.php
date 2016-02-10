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
        <title>View BCF 15</title> 
    </head>
    <body>
        
<?php
session_start();
 $id = $_GET['id'];
 $query = "select idbcf15,bcf15no,DATE_FORMAT(bcf15tgl,'%d-%M-%Y') as bcf15tgl, bc11no, DATE_FORMAT(bc11tgl,'%d-%M-%Y')as bc11tgl, bc11pos, bc11subpos, blno,DATE_FORMAT(bltgl,'%d-%M-%Y')as bltgl,saranapengangkut,voy,amountbrg,satuanbrg,diskripsibrg, consignee, consigneeadrress,consigneekota,notify,notifyadrress,notifykota,idtpp,idtypecode,idmanifest from bcf15 where idbcf15=$id";
 $result = mysql_query($query);
 $bcf15 = mysql_fetch_array($result);
 
 
 ?>
 <form name="formSiswa" id="formSiswa" method="post" action="">
   
       <table width="90%" border="0" align="center" cellpadding="0" cellspacing="3">
            <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>VIEW BCF 15</b> </td></tr>
            <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>BCF 1.5</b></td></tr>
            <tr>
                <td align="right" colspan="2">No BCF 15 : </td>
                <td width="26"><input name="txtbcf15no" id="txtbcf15no" type="text" value="<?=$bcf15['bcf15no' ];?>" readonly="readonly"/></td>
                <td><select name="cmbmanifest">
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
                                        echo "<option value='$data[idmanifest]' $cek>$data[kd_manifest]</option>";
                                }
                                ?>
                    </select>
                </td>
            </tr>
       <tr>
        <td align="right" colspan="2">Tgl BCF 15 : </td>
        <td><input class="required" id="tanggalbcf15" type="text" name="txttglbcf15" value="<?=$bcf15['bcf15tgl' ];?>" ></input></td>
      </tr>
      <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>BC 1.1</b></td></tr>
      <tr>
            <td align="right">No BC 11 : </td>
            <td ><input class="required" name="txtbc11no" type="text" value="<?=$bcf15['bc11no' ];?>"></input></td>
            <td align="right">Tanggal BC 11 : </td>
            <td><input id="tanggalbc11" type="text" name="txttglbc11" value="<?=$bcf15['bc11tgl' ];?>"  ></input></td>
      </tr>
    <tr>
        <td align="right">Pos BC 11 : </td>
        <td ><input class="required" name="txtbc11pos" type="text" value="<?=$bcf15['bc11pos' ];?>" ></input></td>
        <td align="right">Sub Pos : </td>
        <td><input name="txtbc11subpos" type="text" value="<?=$bcf15['bc11subpos' ];?>"></input></td>
    </tr>
    <tr>
     	<td align="right">No BL : </td>
      	<td ><input class="required" name="txtbl" type="text" value="<?=$bcf15['blno' ];?>" size="20"></input></td>
     	<td align="right">Tanggal BL : </td>
      	<td><input id="tanggalbl" type="text" name="txttglbl" value="<?=$bcf15['bltgl' ];?>" ></input></td>
    </tr>
    <tr>
        <td align="right">Sar. angkut: </td>
        <td ><input class="required" name="txtsaranapengangkut" size="20" type="text" value="<?=$bcf15['saranapengangkut' ];?>"></input></td>
        
        <td align="right" >Voy  : </td>
        <td><input class="required" name="txtvoy" type="text" value="<?=$bcf15['voy' ];?>" size="8" maxlength="10"></input></td>
        
    </tr>
    <tr>
        <td align="right">Jumlah: </td>
        <td ><input class="required" name="txtamountbrg" size="20" type="text" value="<?=$bcf15['amountbrg' ];?>" ></input></td>
        <td align="right">Satuan  : </td>
        <td><input class="required" name="txtsatuanbrg" type="text" value="<?=$bcf15['satuanbrg' ];?>" size="8" maxlength="10"></input></td>
    </tr>
    <tr>
        <td align="right"  >Uraian : </td>
        <td colspan="5"  ><input class="required"  name="txturaian" type="text" value="<?=$bcf15['diskripsibrg' ];?>" ></input></td>
    </tr>
    <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Consignee / notify</b></td></tr>
     <tr>
        <td  align="right">Consignee :</td>
        <td><input name="txtconsignee" type="text" value="<?=$bcf15['consignee' ];?>" size="20" ></input></td>
        <td align="right">Alamat :</td>
        <td><textarea cols="20" rows="3" name="txtalamatconsignee" ><?php echo $bcf15[consigneeadrress]  ?></textarea></td>
        <td><input name="txtkotaconsignee" type="text" value="<?=$bcf15['consigneekota']; ?>" size="10" ></input></td>
    </tr>
    <tr>
        <td align="right">Notify :</td>
        <td><input name="txtnotify" type="text" value="<?=$bcf15['notify']; ?>" size="10" ></input></td>
        <td align="right">Alamat :</td>
        <td><textarea cols="20" rows="3" name="txtalamatnotify" ><?php echo $bcf15[notifyadrress]  ?></textarea></td>
        <td><input name="txtkotanotify" type="text" value="<?=$bcf15['notifykota']; ?>" size="10" ></input></td>
    </tr>
    <tr>
        <td align="right">Eks TPS :</td>
        <td><input name="cmbtps" type="text" value="<?=$bcf15['idtps']; ?>" size="10" />
        </td>
        <td align="right">TPP Tujuan :</td>
        <td><select name="cmbtpp">
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
        <td align="right">Tipe Cont :</td>
        <td><select name="cmbfcl">
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
        <td align="right">Keterangan :</td>
        <td colspan="5"><input name="txtketerangan" type="text" value="<?=$bcf15['keterangan']; ?>" size="30" ></input></td>
    </tr>
    <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Container</b></td></tr>
    <tr>
        <td colspan="2">
            <strong>Data Container : </strong>
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
    <tr></tr>
    <tr></tr>
    
    <tr><td><input type="submit" name="backsubmit" value="Balik" /></td></tr>
   </table>
  </form>
    <?php
    if(isset($_POST['backsubmit'])) // jika tombol addsubmit ditekan
	{
        echo '<script type="text/javascript">window.location="index.php?hal=bcf15cari"</script>';
    }
    ?>
        </body>
    
    </html>
    <?php
};
?>
