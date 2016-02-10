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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title></title>
<!--        <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />-->
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <link type="text/css" rel="stylesheet" href="themes/main.css" />
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
</head>

<body>
    
   
          
<?php

	$id = $_GET['id']; 
        
        //// menangkap id
	$sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $now=date('Y-m-d');
        $idbcf15=$bcf15['idbcf15'];

?>
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr align="center"> 
        <td height="22" colspan="2" bgcolor="#84B9D5" class="HEAD"><b>Formulir Pecah Pos BC 1.1</b></td>
  </tr>
  <tr align="center"> 
        <td height="22" colspan="2" bgcolor="#84B9D5" class="HEAD"><b>BCF 1.5</b></td>
  </tr>
  <tr> 
        <td class="" width="10%">&nbsp;&nbsp;Nomor </td>
        <td class="" width="90%">: <? echo $bcf15['bcf15no']; ?></td>
        
        
  </tr>
  <tr>
        <td class="">&nbsp;&nbsp;Tanggal</td>
        <td class="">: <? echo $bcf15['bcf15tgl']; ?></td>
  </tr>
  <tr>
        <td class="">&nbsp;&nbsp;BC 11</td>
        <td class="">: <? echo $bcf15['bc11no']; ?></td>
 </tr>
 <tr>
        <td class="">&nbsp;&nbsp;BL</td>
        <td class="">: <? echo $bcf15['blno']; ?></td>        
 </tr>
  <tr>
        <td class="">&nbsp;&nbsp;Consignee</td>
        <td class="">: <? echo $bcf15['consignee']; ?></td>
  </tr>
  <tr>
        <td class="">&nbsp;&nbsp;Notify</td>
        <td class="">: <? echo $bcf15['notify']; ?></td>
  </tr>
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
</table><br></br>

<!--    untuk bikin inputan kontainer-->
<h1>Modul Pecah Pos</h1>
<p>Catatan : Klik tombol Add Untuk menambah data</p>
       <form id="cont" name="cont" action="" method="post">
        
        <table id="groupmodul1" cellspacing="2" border="0" cellpadding="3">
        <tr>
        <td class="judultabel">NoBCF15</td>
        <td class="judultabel">No BC 11</td>
        <td class="judultabel">Pos</td>
        <td class="judultabel">SubPos</td>
        <td class="judultabel">No BL</td>
        <td class="judultabel">Consignee</td>
        <td class="judultabel">Notify</td>
        <td class="judultabel">Jumlah</td>
        <td class="judultabel">Satuan</td>
        <td class="judultabel">Uraian Brg</td>
<!--        <td class="judultabel">No Surat Pecah Pos</td>
        <td class="judultabel">Tanggal</td>-->
        
        <td class="judultabel">Delete</td>
        </tr>
        <tr>
            <input type="hidden" name="txtidbcf15[]" value="<? echo $bcf15['idbcf15']; ?>"/>
            <input type="hidden" name="txttahun[]" value="<? echo $bcf15['tahun']; ?>"/>
            <input type="hidden" name="txtbcf15tgl[]" value="<? echo $bcf15['bcf15tgl']; ?>"/>
            <input type="hidden" name="txtbc11tgl[]" value="<? echo $bcf15['bc11tgl']; ?>"/>
            <input type="hidden" name="txtbltgl[]" value="<? echo $bcf15['bltgl']; ?>"/>
            <input type="hidden" name="txtidtps[]" value="<? echo $bcf15['idtps']; ?>"/>
            <input type="hidden" name="txtidtpp[]" value="<? echo $bcf15['idtpp']; ?>"/>
            <input type="hidden" name="txtidtypecode[]" value="<? echo $bcf15['idtypecode']; ?>"/>
            <input type="hidden" name="txtsuratpengantarno[]" value="<? echo $bcf15['suratpengantarno']; ?>"/>
            <input type="hidden" name="txtsuratpengantartgl[]" value="<? echo $bcf15['suratpengantartgl']; ?>"/>
            <input type="hidden" name="txtketerangan[]" value="<? echo $bcf15['keterangan']; ?>"/>
            <input type="hidden" name="txtBatalTarik[]" value="<? echo $bcf15['BatalTarik']; ?>"/>
            <input type="hidden" name="txtBatalTarikNo[]" value="<? echo $bcf15['BatalTarikNo']; ?>"/>
            <input type="hidden" name="txtBatalTarikNo2[]" value="<? echo $bcf15['BatalTarikNo2']; ?>"/>
            <input type="hidden" name="txtBatalTarikDate[]" value="<? echo $bcf15['BatalTarikDate']; ?>"/>
            <input type="hidden" name="txtBatalTarikKet[]" value="<? echo $bcf15['BatalTarikKet']; ?>"/>
            <input type="hidden" name="txtmasuk[]" value="<? echo $bcf15['masuk']; ?>"/>
            <input type="hidden" name="txtbamasukno[]" value="<? echo $bcf15['bamasukno']; ?>"/>
            <input type="hidden" name="txtbamasukdate[]" value="<? echo $bcf15['bamasukdate']; ?>"/>
            <input type="hidden" name="txtbamasukdatetrx[]" value="<? echo $bcf15['bamasukdatetrx']; ?>"/>
            <input type="hidden" name="txtpemberitahuan[]" value="<? echo $bcf15['pemberitahuan']; ?>"/>
            <input type="hidden" name="txtsuratno[]" value="<? echo $bcf15['suratno']; ?>"/>
            <input type="hidden" name="txtidtp3[]" value="<? echo $bcf15['idtp3']; ?>"/>
            <input type="hidden" name="txtsuratdate[]" value="<? echo $bcf15['suratdate']; ?>"/>
            <input type="hidden" name="txtidseksitp3[]" value="<? echo $bcf15['idseksitp3']; ?>"/>
            <input type="hidden" name="txtperintah[]" value="<? echo $bcf15['perintah']; ?>"/>
            <input type="hidden" name="txtsuratperintahno[]" value="<? echo $bcf15['suratperintahno']; ?>"/>
            <input type="hidden" name="txtidtp2[]" value="<? echo $bcf15['idtp2']; ?>"/>
            <input type="hidden" name="txtsuratperintahdate[]" value="<? echo $bcf15['suratperintahdate']; ?>"/>
            <input type="hidden" name="txtidseksitp2[]" value="<? echo $bcf15['idseksitp2']; ?>"/>
            <input type="hidden" name="txtBatal[]" value="<? echo $bcf15['Batal']; ?>"/>
            <input type="hidden" name="txtSuratBatalNo[]" value="<? echo $bcf15['SuratBatalNo']; ?>"/>
            <input type="hidden" name="txtSuratBatalDate[]" value="<? echo $bcf15['SuratBatalDate']; ?>"/>
            <input type="hidden" name="txtPemohon[]" value="<? echo $bcf15['Pemohon']; ?>"/>
            <input type="hidden" name="txtAlamatPemohon[]" value="<? echo $bcf15['AlamatPemohon']; ?>"/>
            <input type="hidden" name="txtsegel[]" value="<? echo $bcf15['segel']; ?>"/>
            <input type="hidden" name="txtndsegelno[]" value="<? echo $bcf15['ndsegelno']; ?>"/>
            <input type="hidden" name="txtndsegeldate[]" value="<? echo $bcf15['ndsegeldate']; ?>"/>
            <input type="hidden" name="txtidseksitp2bukgel[]" value="<? echo $bcf15['idseksitp2bukgel']; ?>"/>
            <input type="hidden" name="txtshipper[]" value="<? echo $bcf15['shipper']; ?>"/>
            <input type="hidden" name="txtnegaraasal[]" value="<? echo $bcf15['negaraasal']; ?>"/>
            <input type="hidden" name="txttonage_groos[]" value="<? echo $bcf15['tonage_groos']; ?>"/>
            <input type="hidden" name="txttonage_netto[]" value="<? echo $bcf15['tonage_netto']; ?>"/>
            <input type="hidden" name="txtrecordstatus[]" value="<? echo $bcf15['recordstatus']; ?>"/>
            <input type="hidden" name="txtidmanifest[]" value="<? echo $bcf15['idmanifest']; ?>"/>
            <input type="hidden" name="txtidseksi[]" value="<? echo $bcf15['idseksi']; ?>"/>
            <input type="hidden" name="txtvalidasibcf15baru[]" value="<? echo $bcf15['validasibcf15baru']; ?>"/>
            <input type="hidden" name="txttglvalidasibcf15[]" value="<? echo $bcf15['tglvalidasibcf15']; ?>"/>
            
        <td><input class="isitabel" size="8" type="text" name="txtbcf15no[]" value="<? echo $bcf15['bcf15no']; ?>"/> </td>
        <td><input class="isitabel" size="5" type="text" name="txtbc11no[]" value="<? echo $bcf15['bc11no']; ?>"/></td>
        <td><input class="isitabel" size="5" type="text" name="txtbc11pos[]" value="<? echo $bcf15['bc11pos']; ?>"/></td>
        <td><input class="isitabel" size="5" type="text" name="txtbc11subpos[]" value="<? echo $bcf15['bc11subpos']; ?>"/></td>
        <td><input class="isitabel" size="10" type="text" name="txtbl[]" value="<? echo $bcf15['blno']; ?>"/></td>
        <td><input class="isitabel" type="text" name="txtconsignee[]" value="<? echo $bcf15['consignee']; ?>"/></td>
        <td><input class="isitabel" type="text" name="txtnotify[]" value="<? echo $bcf15['notify']; ?>"/></td>
        <td><input class="isitabel" size="5" type="text" name="txtamount[]" value="<? echo $bcf15['amountbrg']; ?>"/></td>
        <td><input class="isitabel" size="5" type="text" name="txtsatuan[]" value="<? echo $bcf15['satuanbrg']; ?>"/></td>
        <td><input class="isitabel" type="text" name="txtdesc[]" value="<? echo $bcf15['diskripsibrg']; ?>"/></td>
<!--        <td><input class="requiered" id="txtnoredres" type="text" name="txtnoredres[0]"/></td>
        <td><input class="requiered" id="tanggal" type="text" name="txttglredres[0]"/></td>-->
         <td><button type="button" class="button putih bigrounded ">Del</button></td>
        </tr>
        <tr id="last">
        <td  align="right"><button  type="button" id="addRow">Add</button></td>
        </tr>
        </table><br/>

      <input class="button putih bigrounded " type="submit" value="Kirim" name="addcont" />
   
</form>
<p>Catatan : Ubah sesuai dengan data redress dari Manifest. setelah diubah klik Tombol "Kirim"</p>

    <script type="text/javascript">
    var i = 1;
    $(function(){
    $("#addRow").click(function(){
    row = '<tr>'+
    '<input type="hidden" name="txtidbcf15['+i+']" value="<? echo $bcf15['idbcf15']; ?>"/>'+
    '<input type="hidden" name="txttahun['+i+']" value="<? echo $bcf15['tahun']; ?>"/>'+
    '<input type="hidden" name="txtbcf15tgl['+i+']" value="<? echo $bcf15['bcf15tgl']; ?>"/>'+
    '<input type="hidden" name="txtbc11tgl['+i+']" value="<? echo $bcf15['bc11tgl']; ?>"/>'+
    '<input type="hidden" name="txtbltgl['+i+']" value="<? echo $bcf15['bltgl']; ?>"/>'+
    '<input type="hidden" name="txtidtps['+i+']" value="<? echo $bcf15['idtps']; ?>"/>'+
    '<input type="hidden" name="txtidtpp['+i+']" value="<? echo $bcf15['idtpp']; ?>"/>'+
    '<input type="hidden" name="txtidtypecode['+i+']" value="<? echo $bcf15['idtypecode']; ?>"/>'+
    '<input type="hidden" name="txtsuratpengantarno['+i+']" value="<? echo $bcf15['suratpengantarno']; ?>"/>'+
    '<input type="hidden" name="txtsuratpengantartgl['+i+']" value="<? echo $bcf15['suratpengantartgl']; ?>"/>'+
    '<input type="hidden" name="txtketerangan['+i+']" value="<? echo $bcf15['keterangan']; ?>"/>'+
    '<input type="hidden" name="txtBatalTarik['+i+']" value="<? echo $bcf15['BatalTarik']; ?>"/>'+
    '<input type="hidden" name="txtBatalTarikNo['+i+']" value="<? echo $bcf15['BatalTarikNo']; ?>"/>'+
    '<input type="hidden" name="txtBatalTarikNo2['+i+']" value="<? echo $bcf15['BatalTarikNo2']; ?>"/>'+
    '<input type="hidden" name="txtBatalTarikDate['+i+']" value="<? echo $bcf15['BatalTarikDate']; ?>"/>'+
    '<input type="hidden" name="txtBatalTarikKet['+i+']" value="<? echo $bcf15['BatalTarikKet']; ?>"/>'+
    '<input type="hidden" name="txtmasuk['+i+']" value="<? echo $bcf15['masuk']; ?>"/>'+
    '<input type="hidden" name="txtbamasukno['+i+']" value="<? echo $bcf15['bamasukno']; ?>"/>'+
    '<input type="hidden" name="txtbamasukdate['+i+']" value="<? echo $bcf15['bamasukdate']; ?>"/>'+
    '<input type="hidden" name="txtbamasukdatetrx['+i+']" value="<? echo $bcf15['bamasukdatetrx']; ?>"/>'+
    '<input type="hidden" name="txtpemberitahuan['+i+']" value="<? echo $bcf15['pemberitahuan']; ?>"/>'+
    '<input type="hidden" name="txtsuratno['+i+']" value="<? echo $bcf15['suratno']; ?>"/>'+
    '<input type="hidden" name="txtidtp3['+i+']" value="<? echo $bcf15['idtp3']; ?>"/>'+
    '<input type="hidden" name="txtsuratdate['+i+']" value="<? echo $bcf15['suratdate']; ?>"/>'+
    '<input type="hidden" name="txtidseksitp3['+i+']" value="<? echo $bcf15['idseksitp3']; ?>"/>'+
    '<input type="hidden" name="txtperintah['+i+']" value="<? echo $bcf15['perintah']; ?>"/>'+
    '<input type="hidden" name="txtsuratperintahno['+i+']" value="<? echo $bcf15['suratperintahno']; ?>"/>'+
    '<input type="hidden" name="txtidtp2['+i+']" value="<? echo $bcf15['idtp2']; ?>"/>'+
    '<input type="hidden" name="txtsuratperintahdate['+i+']" value="<? echo $bcf15['suratperintahdate']; ?>"/>'+
    '<input type="hidden" name="txtidseksitp2['+i+']" value="<? echo $bcf15['idseksitp2']; ?>"/>'+
    '<input type="hidden" name="txtBatal['+i+']" value="<? echo $bcf15['Batal']; ?>"/>'+
    '<input type="hidden" name="txtSuratBatalNo['+i+']" value="<? echo $bcf15['SuratBatalNo']; ?>"/>'+
    '<input type="hidden" name="txtSuratBatalDate['+i+']" value="<? echo $bcf15['SuratBatalDate']; ?>"/>'+
    '<input type="hidden" name="txtPemohon['+i+']" value="<? echo $bcf15['Pemohon']; ?>"/>'+
    '<input type="hidden" name="txtAlamatPemohon['+i+']" value="<? echo $bcf15['AlamatPemohon']; ?>"/>'+
    '<input type="hidden" name="txtsegel['+i+']" value="<? echo $bcf15['segel']; ?>"/>'+
    '<input type="hidden" name="txtndsegelno['+i+']" value="<? echo $bcf15['ndsegelno']; ?>"/>'+
    '<input type="hidden" name="txtndsegeldate['+i+']" value="<? echo $bcf15['ndsegeldate']; ?>"/>'+
    '<input type="hidden" name="txtidseksitp2bukgel['+i+']" value="<? echo $bcf15['idseksitp2bukgel']; ?>"/>'+
    '<input type="hidden" name="txtshipper['+i+']" value="<? echo $bcf15['shipper']; ?>"/>'+
    '<input type="hidden" name="txtnegaraasal['+i+']" value="<? echo $bcf15['negaraasal']; ?>"/>'+
    '<input type="hidden" name="txttonage_groos['+i+']" value="<? echo $bcf15['tonage_groos']; ?>"/>'+
    '<input type="hidden" name="txttonage_netto['+i+']" value="<? echo $bcf15['tonage_netto']; ?>"/>'+
    '<input type="hidden" name="txtrecordstatus['+i+']" value="<? echo $bcf15['recordstatus']; ?>"/>'+
    '<input type="hidden" name="txtidmanifest['+i+']" value="<? echo $bcf15['idmanifest']; ?>"/>'+
    '<input type="hidden" name="txtidseksi['+i+']" value="<? echo $bcf15['idseksi']; ?>"/>'+
    '<input type="hidden" name="txtvalidasibcf15baru['+i+']" value="<? echo $bcf15['validasibcf15baru']; ?>"/>'+
    '<input type="hidden" name="txttglvalidasibcf15['+i+']" value="<? echo $bcf15['tglvalidasibcf15']; ?>"/>'+
    
    
    
    
    
    '<td><input class="isitabel" size="8" type="text" name="txtbcf15no['+i+']" value="<? echo $bcf15['bcf15no']; ?>"/></td>'+
    '<td><input class="isitabel" size="5" type="text" name="txtbc11no['+i+']" value="<? echo $bcf15['bc11no']; ?>"/></td>'+
    '<td><input class="isitabel" size="5" type="text" name="txtbc11pos['+i+']" value="<? echo $bcf15['bc11pos']; ?>"/></td>'+
    '<td><input class="isitabel" size="5" type="text" name="txtbc11subpos['+i+']" value="<? echo $bcf15['bc11subpos']; ?>"/></td>'+
    '<td><input class="isitabel" size="10" type="text" name="txtbl['+i+']" value="<? echo addslashes($bcf15['blno']); ?>"/></td>'+
    '<td><input class="isitabel" type="text" name="txtconsignee['+i+']" value="<? echo addslashes($bcf15['consignee']); ?>"/></td>'+
    '<td><input class="isitabel" type="text" name="txtnotify['+i+']" value="<? echo addslashes($bcf15['notify']); ?>"/></td>'+
    '<td><input class="isitabel" size="5" type="text" name="txtamount['+i+']" value="<? echo addslashes($bcf15['amountbrg']); ?>"/></td>'+
    '<td><input class="isitabel" size="5" type="text" name="txtsatuan['+i+']" value="<? echo addslashes($bcf15['satuanbrg']); ?>"/></td>'+
    '<td><input class="isitabel" type="text" name="txtdesc['+i+']" value="<? echo addslashes($bcf15['diskripsibrg']); ?>"/></td>'+
    /*'<td><input class="requiered" type="text" name="txtnoredres['+i+']"/></td>'+
    '<td><input class="requiered" type="text" name="txttglredres['+i+']"/></td>'+*/
    
    
    '<td><button type="button" class="del">Del</button></td>'+
    '</tr>';
    $(row).insertBefore("#last");
    i++;
    });
    });
    $(".del").live('click', function(){
    $(this).parent().parent().remove();
    });
    </script>
  
  
  <?php
    session_start();
    $txtidbcf15 = $_POST['txtidbcf15'];
    $txttahun = $_POST['txttahun'];
    $txtbcf15tgl = $_POST['txtbcf15tgl'];
    $txtbc11tgl = $_POST['txtbc11tgl'];
    $txtbc11subpos = $_POST['txtbc11subpos'];
    $txtbltgl = $_POST['txtbltgl'];
    $txtidtps = $_POST['txtidtps'];
    $txtidtpp = $_POST['txtidtpp'];
    $txtidtypecode = $_POST['txtidtypecode'];
    $txtbc11subpos = $_POST['txtbc11subpos'];
    $txtsuratpengantarno=$_POST['txtsuratpengantarno'];
    $txtsuratpengantartgl=$_POST['txtsuratpengantartgl'];
    $txtketerangan=$_POST['txtketerangan'];
    $txtBatalTarik=$_POST['txtBatalTarik'];
    $txtBatalTarikNo=$_POST['txtBatalTarikNo'];
    $txtBatalTarikNo2=$_POST['txtBatalTarikNo2'];
    $txtBatalTarikDate=$_POST['txtBatalTarikDate'];
    $txtBatalTarikKet=$_POST['txtBatalTarikKet'];
    $txtmasuk=$_POST['txtmasuk'];
    $txtbamasukno=$_POST['txtbamasukno'];
    $txtbamasukdate=$_POST['txtbamasukdate'];
    $txtbamasukdatetrx=$_POST['txtbamasukdatetrx'];
    $txtpemberitahuan=$_POST['txtpemberitahuan'];
    $txtsuratno=$_POST['txtsuratno'];
    $txtidtp3=$_POST['txtidtp3'];
    $txtsuratdate=$_POST['txtsuratdate'];
    $txtidseksitp3=$_POST['txtidseksitp3'];
    $txtperintah=$_POST['txtperintah'];
    $txtsuratperintahno=$_POST['txtsuratperintahno'];
    $txtidtp2=$_POST['txtidtp2'];
    $txtsuratperintahdate=$_POST['txtsuratperintahdate'];
    $txtidseksitp2=$_POST['txtidseksitp2'];
    $txtBatal=$_POST['txtBatal'];
    $txtSuratBatalNo=$_POST['txtSuratBatalNo'];
    $txtSuratBatalDate=$_POST['txtSuratBatalDate'];
    $txtPemohon=$_POST['txtPemohon'];
    $txtAlamatPemohon=$_POST['txtAlamatPemohon'];
    $txtsegel=$_POST['txtsegel'];
    $txtndsegelno=$_POST['txtndsegelno'];
    $txtndsegeldate=$_POST['txtndsegeldate'];
    $txtidseksitp2bukgel=$_POST['txtidseksitp2bukgel'];
    $txtshipper=$_POST['txtshipper'];
    $txtnegaraasal=$_POST['txtnegaraasal'];
    $txttonage_groos=$_POST['txttonage_groos'];
    $txttonage_netto=$_POST['txttonage_netto'];
    $txtrecordstatus=$_POST['txtrecordstatus'];
    $txtidmanifest=$_POST['txtidmanifest'];
    $txtidseksi=$_POST['txtidseksi'];
    $txtvalidasibcf15baru=$_POST['txtvalidasibcf15baru'];
    
    $txtbcf15no = $_POST['txtbcf15no'];
    $txtbc11no = $_POST['txtbc11no'];
    $txtbc11pos = $_POST['txtbc11pos'];
    $txtbl = $_POST['txtbl'];
    $txtconsignee = $_POST['txtconsignee'];
    $txtnotify = $_POST['txtnotify'];
    $txtamount = $_POST['txtamount'];
    $txtsatuan = $_POST['txtsatuan'];
    $txturaian_addslashes= $_POST['txtdesc'];;
    $txtdesc = addslashes($txturaian_addslashes);
    $tahun = $_POST['txttahun'];
    $id1 = $_POST['txtidbcf15'];
    $now=date('Y-m-d');
                
    /*$txtnoredres = $_POST['txtnoredres'];
    $txttglredres = $_POST['txttglredres'];*/
  
    
    if(isset($_POST['addcont'])) // jika tombol addsubmit ditekan
	{
                
                foreach($_POST['txtbcf15no'] as $key => $txtbcf15no){
                                        
                    $query = "insert into bcf15 (
                    bcf15no,
                    bcf15tgl,
                    bc11no,
                    bc11tgl,
                    bc11pos,
                    bc11subpos,
                    blno,
                    bltgl,
                    amountbrg,
                    satuanbrg,
                    diskripsibrg,
                    consignee,
                    notify,
                    idtps,
                    idtpp,
                    idtypecode,
                    suratpengantarno,
                    suratpengantartgl,
                    keterangan,
                    BatalTarik,
                    BatalTarikNo,
                    BatalTarikNo2,
                    BatalTarikDate,
                    BatalTarikKet,
                    masuk,
                    bamasukno,
                    bamasukdate,
                    bamasukdatetrx,
                    pemberitahuan,
                    suratno,
                    idtp3,
                    suratdate,
                    idseksitp3,
                    perintah,
                    suratperintahno,
                    idtp2,
                    suratperintahdate,
                    idseksitp2,
                    CacahNo,
                    CacahDate,
                    Batal,
                    SuratBatalNo,
                    SuratBatalDate,
                    Pemohon,
                    AlamatPemohon,
                    segel,
                    ndsegelno,
                    ndsegeldate,
                    idseksitp2bukgel,
                    shipper,
                    negaraasal,
                    tonage_groos,
                    tonage_netto,
                    Pecahpos,
                    PecahPosdate,
                    recordstatus,
                    idmanifest,
                    idseksi,
                    jalur,
                    validasibcf15baru,
                    tglvalidasibcf15,
                    perlukonf,
                    tahun
                    
                    ) 
                    values (
                    '{$_POST['txtbcf15no'][$key]}',
                    '{$_POST['txtbcf15tgl'][$key]}',
                    '{$_POST['txtbc11no'][$key]}',
                    '{$_POST['txtbc11tgl'][$key]}',
                    '{$_POST['txtbc11pos'][$key]}',
                    '{$_POST['txtbc11subpos'][$key]}',
                    '{$_POST['txtbl'][$key]}',
                    '{$_POST['txtbltgl'][$key]}',
                    '{$_POST['txtamount'][$key]}',
                    '{$_POST['txtsatuan'][$key]}',
                    '{$_POST['txtdesc'][$key]}',
                    '{$_POST['txtconsignee'][$key]}',
                    '{$_POST['txtnotify'][$key]}',
                    '{$_POST['txtidtps'][$key]}', 
                    '{$_POST['txtidtpp'][$key]}',
                    '{$_POST['txtidtypecode'][$key]}',
                    '{$_POST['txtsuratpengantarno'][$key]}',
                    '{$_POST['txtsuratpengantartgl'][$key]}',
                    '{$_POST['txtketerangan'][$key]}',
                    '{$_POST['txtBatalTarik'][$key]}',
                    '{$_POST['txtBatalTarikNo'][$key]}',
                    '{$_POST['txtBatalTarikNo2'][$key]}',
                    '{$_POST['txtBatalTarikDate'][$key]}',
                    '{$_POST['txtBatalTarikKet'][$key]}',
                    '{$_POST['txtmasuk'][$key]}',
                    '{$_POST['txtbamasukno'][$key]}',
                    '{$_POST['txtbamasukdate'][$key]}',
                    '{$_POST['txtbamasukdatetrx'][$key]}',
                    '{$_POST['txtpemberitahuan'][$key]}',
                    '{$_POST['txtsuratno'][$key]}',
                    '{$_POST['txtidtp3'][$key]}',
                    '{$_POST['txtsuratdate'][$key]}',
                    '{$_POST['txtidseksitp3'][$key]}',
                    '{$_POST['txtperintah'][$key]}',
                    '{$_POST['txtsuratperintahno'][$key]}',
                    '{$_POST['txtidtp2'][$key]}',
                    '{$_POST['txtsuratperintahdate'][$key]}',
                    '{$_POST['txtidseksitp2'][$key]}',
                    '{$_POST['txtCacahNo'][$key]}',
                    '{$_POST['txtCacahDate'][$key]}',
                    '{$_POST['txtBatal'][$key]}',
                    '{$_POST['txtSuratBatalNo'][$key]}',
                    '{$_POST['txtSuratBatalDate'][$key]}',
                    '{$_POST['txtPemohon'][$key]}',
                    '{$_POST['txtAlamatPemohon'][$key]}',
                    '{$_POST['txtsegel'][$key]}',
                    '{$_POST['txtndsegelno'][$key]}',
                    '{$_POST['txtndsegeldate'][$key]}',
                    '{$_POST['txtidseksitp2bukgel'][$key]}',
                    '{$_POST['txtshipper'][$key]}',
                    '{$_POST['txtnegaraasal'][$key]}',
                    '{$_POST['txttonage_groos'][$key]}',
                    '{$_POST['txttonage_netto'][$key]}',
                    '1',
                    '$now',
                    '{$_POST['txtrecordstatus'][$key]}',
                    '{$_POST['txtidmanifest'][$key]}',
                    '{$_POST['txtidseksi'][$key]}',
                    '{$_POST['txtjalur'][$key]}',
                    '{$_POST['txtvalidasibcf15baru'][$key]}',
                    '{$_POST['txttglvalidasibcf15'][$key]}',
                    '{$_POST['txtperlukonf'][$key]}',
                    '{$_POST['txttahun'][$key]}'
                    
                    )";
                    mysql_query($query) or die("Gagal Menyimpan Data".mysql_error());
                }
               
                   $update = mysql_query("UPDATE bcf15 SET
							Batal='1',
                                                        setujubatal='1',
							SetujuBatalNo='System',
                                                        SetujuBatalNo2='pembatalan secara sistem',
                                                        SetujuBatalDate='$now',
                                                        PecahPosdate='$now'
                                                        	WHERE idbcf15='$idbcf15'");
                  
//                   echo "";
//                    print("Id BCF - No BCF<br />");
//                    $jumlah = count($_POST["txtbcf15no"]);
//                    for ($i = 0; $i < $jumlah; $i++)
//                    print($i + 1 . ". " .$_POST["txtidbcf15"][$i] . " - " .
//                    $_POST["txtbcf15no"][$i] ."<br />");
//                    
                   
                    echo '<script type="text/javascript">window.location="index.php?hal=loketpecahpos"</script>';
              
               
        }
  ?>
 
</body>

</html>
<?php
};
?>


  
  

      
  

