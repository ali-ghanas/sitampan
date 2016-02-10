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
    <title>SITAMPAN-STATUS AKHIR</title>
    <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function() {
              $("#detailstatusakhir").tabs({event:"mouseover"}).find(".ui-tabs-nav").sortable();
           });
        </script>
    
    </head>
    <body>
        <div id="detailstatusakhir">
      <ul>
  	     
	     <li><a href="#tabs-1">Detail BCF 15</a></li>
             <li><a href="#tabs-2">History BCF 15</a></li>
             
	     
      </ul>
      
            <div id="tabs-1">
                <?php
                $id = $_GET['id']; // menangkap id
                $sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $bcf15 = mysql_fetch_array($query);

                ?>

	
        <form method="post"  >
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Detail BCF 15</b> </td></tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#daac4e">&nbsp;&nbsp;<b>BCF 1.5</b></td></tr>
            <tr>
                <td  >No BCF 15</td><td>:</td> 
                <td ><?php echo $bcf15['bcf15no']; ?>
                <select id="cmbmanifest" disabled name="cmbmanifest">
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
                    </select><?php echo $bcf15['tahun']; ?>
                </td> 
            </tr>
            <tr>
                <td   >Tgl BCF 15 </td><td>:</td>
                <td><?php echo $bcf15['bcf15tgl']; ?></td>
            </tr>
            
            <tr>
                <td height="20" align="center" colspan="5" bgcolor="#daac4e">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
                <td  >No BC 11 </td><td>:</td>
                <td ><?php echo $bcf15['bc11no']; ?></td>
            </tr>
            <tr>
                <td >Tanggal BC 1.1</td><td>:</td>
                <td><?php echo $bcf15['bc11tgl']; ?></td>
            </tr>
            <tr>
                <td >Pos BC 11  </td><td>:</td>
                <td ><?php echo $bcf15['bc11pos']; ?></td>
            </tr>
            <tr>
                <td >Sub Pos </td>
                <td><?php echo $bcf15['bc11subpos']; ?></td>
            </tr>
            <tr>
                <td >No BL  </td><td>:</td>
                <td ><?php echo $bcf15['blno']; ?></td>
            </tr>
            <tr>
                <td >Tanggal BL  : </td><td>:</td>
                <td><?php echo $bcf15['bltgl']; ?></td>
            </tr>
            <tr>
                <td  >Sar. angkut: </td><td>:</td>
                <td ><?php echo $bcf15['saranapengangkut']; ?></td>
            </tr>
            <tr>

                <td  >Voy   </td><td>:</td>
                <td><?php echo $bcf15['voy']; ?></td>

            </tr>
            <tr>
                <td  >Jumlah/satuan : </td><td>:</td>
                <td ><?php echo $bcf15['amountbrg']; ?> <?php echo $bcf15['satuanbrg']; ?></td>
            </tr>
            <tr>
                <td    >Uraian  </td><td>:</td>
                <td   ><?php echo $bcf15['diskripsibrg']; ?></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#daac4e">&nbsp;&nbsp;<b>Data Consignee / Notify </b></td>
            </tr>
             <tr>
                 <td >Consign:</td><td>:</td>
                <td><?php echo $bcf15['consignee']; ?></td>
                
            </tr>
            <tr>
                <td >Notify :</td><td>:</td>
                <td><?php echo $bcf15['notify']; ?></td>
                
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#daac4e">&nbsp;&nbsp;<b>Data TPS /TPP </b></td>
            </tr>
            <tr>
                <td >Eks TPS</td><td>:</td>
                <td><?php echo $bcf15['idtps']; ?>
                </td>
            </tr>
            <tr>
                <td >TPP Tujuan :</td><td>:</td>
                <td><select disabled id="cmbtpp" name="cmbtpp">
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
                <td >FCL / LCL :</td><td>:</td>
                <td><select disabled id="cmbfcl" name="cmbfcl">
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
                <td ><?php echo $bcf15['keterangan']; ?></td>
            </tr>
            <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#daac4e">&nbsp;&nbsp;<b>Data Kontainer </b></td>
            </tr>
            <tr>
                <td colspan="6" >
                    
                        <table cellspacing="0" border="1" cellpadding="0" align="center">
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
            

           
            </table>
        </form>
        
       </div>
            
       <div id="tabs-2">
                <?php
                $id = $_GET['id']; // menangkap id
                $sql = "SELECT *,DATE_FORMAT(NHPLelangDate,'%d %M %Y') as NHPLelangDate,DATE_FORMAT(suratperintahdate,'%d %M %Y') as suratperintahdate,DATE_FORMAT(suratdate,'%d %M %Y') as suratdate, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, DATE_FORMAT(bamasukdate,'%d %M %Y') as bamasukdate FROM bcf15,tpp,statusakhir WHERE bcf15.idstatusakhir=statusakhir.idstatusakhir and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $bcf15 = mysql_fetch_array($query);

                ?>

	
        <form method="post"  >
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Histori</b> </td></tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#daac4e">&nbsp;&nbsp;<b>BA Penarikan</b></td></tr>
            <tr>
                <td  >Eks TPS</td><td>:</td> 
                <td ><?php echo $bcf15['idtps']; ?></td>
            </tr>
            <tr>
                <td  >TPP</td><td>:</td> 
                <td ><?php echo $bcf15['nm_tpp']; ?></td>
            </tr>
            <tr>
                <td  >Surat Perintah Penarikan</td><td>:</td> 
                <td ><?php echo $bcf15['suratperintahno']; ?></td>
            </tr>
            <tr>
                <td  >Tanggal Surat</td><td>:</td> 
                <td ><?php echo $bcf15['suratperintahdate']; ?></td>
            </tr>
            <tr>
                <td  >BA Penarikan Ke TPP</td><td>:</td> 
                <td ><?php echo $bcf15['bamasukno']; ?></td>
            </tr>
            <tr>
                <td  >Tanggal Masuk Ke TPP</td><td>:</td> 
                <td ><?php echo $bcf15['bamasukdate']; ?></td>
            </tr>
            <tr><td height="20" align="center" colspan="5" bgcolor="#daac4e"><b>Surat Pemberitahuan Ke Importir</b></td></tr>
           <tr>
                <td  >No Surat Pemberitahuan BCF 1.5</td><td>:</td> 
                <td ><?php echo $bcf15['suratno']; ?></td>
            </tr>
            <tr>
                <td  >Tanggal Surat</td><td>:</td> 
                <td ><?php echo $bcf15['suratdate']; ?></td>
            </tr>
            <tr><td height="20" align="center" colspan="5" bgcolor="#daac4e"><b>Pencacahan</b></td></tr>
            <tr>
                <td  >No NHP</td><td>:</td> 
                <td ><?php echo $bcf15['NHPLelangNo']; ?></td>
            </tr>
            <tr>
                <td  >Tanggal NHP</td><td>:</td> 
                <td ><?php echo $bcf15['NHPLelangDate']; ?></td>
            </tr>
            <tr><td height="20" align="center" colspan="5" bgcolor="#daac4e"><b>Status Akhir</b></td></tr>
            <tr>
                <td  >Status Akhir</td><td>:</td> 
                <td bgcolor="#e03e51"><?php echo $bcf15['statusakhirname']; ?></td>
            </tr>
            <tr>
                <td  >Nomor Kep</td><td>:</td> 
                <td bgcolor="#e03e51"><?php echo $bcf15['NoKepStatus_Akhr']; ?></td>
            </tr>
            <tr>
                <td  >Tanggal Kep</td><td>:</td> 
                <td >
            </tr>
            </table>
        </form>
        
       </div>
            

</body>
</html>
<?php
};
?>