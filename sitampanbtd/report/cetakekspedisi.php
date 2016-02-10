<link type="text/css" rel="stylesheet" href="../themes/main.css" /> 
<?php // aksi untuk edit
    session_start();
    error_reporting(0);
     include '../lib/koneksi.php';     
     include '../lib/function.php';     

    if(isset($_POST['cetakekspedisi'])) // jika tombol editsubmit ditekan

            $txttgldari = $_POST['txttgldari']; 
            $txttglsampai = $_POST['txttglsampai']; 
            $check1 = $_POST['check1']; 
            $check2 = $_POST['check2'];
            //importir consignee
            $sql = "SELECT * FROM bcf15, tp3 where bcf15.idtp3=tp3.idtp3 and suratdate between '$txttgldari' and '$txttglsampai' order by suratno asc"; // memanggil data dengan id yang ditangkap tadi
            $query = mysql_query($sql);
            //pelayaran
            $sql2 = "SELECT * FROM bcf15, tp3,pelayaran where  bcf15.idtp3=tp3.idtp3 and bcf15.idpelayaran=pelayaran.idpelayaran and suratdate between '$txttgldari' and '$txttglsampai' order by nm_pelayaran,suratno asc"; // memanggil data dengan id yang ditangkap tadi
            $query2 = mysql_query($sql2);
            //tpp
            $sql3 = "SELECT * FROM bcf15, tp3,tpp where  bcf15.idtp3=tp3.idtp3 and bcf15.idtpp=tpp.idtpp and suratdate between '$txttgldari' and '$txttglsampai' order by nm_tpp,suratno asc"; // memanggil data dengan id yang ditangkap tadi
            $query3 = mysql_query($sql3);
            //surat keluar umum
            $sql4 = "SELECT * FROM ekspedisi_surat where   tanggal_kirim between '$txttgldari' and '$txttglsampai' order by tujuan asc "; // memanggil data dengan id yang ditangkap tadi
            $query4 = mysql_query($sql4);
            
            
           
?>

<table>
    <tr>
        <td rowspan="5"><img src="../images/new/depkeu.bmp" width="80"/></td>
    </tr>
    <tr>
        <td><font Size="4">Ekspedisi Surat Keluar</font></td>
    </tr>
    <tr>
        <td><font Size="4">Seksi Tempat Penimbunan Bidang PPC III</font></td>
    </tr>
    <br/>
    <tr>
        <td><font Size="4">Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam</font></td>
    </tr>
    <tr>
        <td><font Size="4">Tanggal <b><?php echo tglindo($txttgldari)  ?></b> sd <b><?php echo tglindo($txttglsampai)  ?> </b></font></td>
    </tr>
    
</table>
<br/>
<table  width="100%" id="groupmodul1" border="0" cellpadding="1">
	<th class="judultabel" width="1%">No</th>
	<th class="judultabel" width="25%">No Surat</th>
	<th class="judultabel" width="25%">Tanggal Surat</th>
	<th class="judultabel" width="35%">Tujuan Surat Ke Consignee</th>
        <?php if ($check1=='pos') {echo "<th class='judultabel' width=15%>Cek</th>";}
           else {echo "<th class='judultabel'>Tanda Tangan</th>";}
        
        ?>
	
        
	
	</tr>

<?php
$awal='1';
while($data = mysql_fetch_array($query)){
    $now=date('d M Y');


	
?>
<td class="isitabel" width="1%" align=""><?php echo $awal++; ?></td>
<td class="isitabel" align="">S-<?php echo  ($data['suratno']); ?><?php echo  ($data['kd_tp3']); ?><?php echo  ($data['tahun']); ?></td>
<td class="isitabel" align=""><?php echo  tglindo($data['suratdate']); ?></td>
<td class="isitabel" align=""><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } elseif ($data['consignee']=="ToTheOrder") {echo $data['notify']; } elseif ($data['consignee']=="to the order") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
<?php if ($check1=='pos') {echo "<td class='isitabel' align='center' width=3><input type='checkbox' size='30' align='center' /></input></td>";}
      else{echo "";}    
        
        ?>


</tr>
<?php
};
?>
</table>
<table  width="100%" id="groupmodul1">
        <th class="judultabel" width="1%">No</th>
	<th class="judultabel" width="25%">No Surat</th>
	<th class="judultabel" width="25%">Tanggal Surat</th>
	<th class="judultabel" width="35%">Tujuan Surat Ke Pelayaran</th>
        <?php if ($check1=='pos') {echo "<th class='judultabel' width=15%>Cek</th>";}
           else {echo "<th class='judultabel'>Tanda Tangan</th>";}
        
        ?>
	
        
	
	</tr>

	
<?php
$awal2='1';
while($data2 = mysql_fetch_array($query2)){
    $now=date('d M Y');


	
?>
<td class="isitabel" width="1%" align=""><?php echo $awal2++; ?></td>
<td class="isitabel" width="25%" align="">S-<?php echo  ($data2['suratno']); ?><?php echo  ($data2['kd_tp3']); ?><?php echo  ($data2['tahun']); ?></td>
<td class="isitabel" width="25%" align=""><?php echo  tglindo($data2['suratdate']); ?></td>
<td class="isitabel" width="35%" align=""><?php echo  $data2['nm_pelayaran']; ?></td>
<?php if ($check1=='pos') {echo "<td class='isitabel' align='center' width=15%><input type='checkbox'  size='30' align='center' /></input></td>";}
      else{echo "";}    
        
        ?>


</tr>
<?php
};
?>
</table>
<!--surat ke umum-->
<table  width="100%" id="groupmodul1">
        <th class="judultabel" width="1%">No</th>
	<th class="judultabel" width="50%">No Surat</th>
	
	<th class="judultabel" width="35%">Tujuan Surat </th>
        <?php if ($check1=='pos') {echo "<th class='judultabel' width=15%>Cek</th>";}
           else {echo "<th class='judultabel'>Tanda Tangan</th>";}
        
        ?>
	
        
	
	</tr>

	
<?php
$awal4='1';
while($data4 = mysql_fetch_array($query4)){
    $now=date('d M Y');
    

	
?>
<td class="isitabel" width="1%" align=""><?php echo $awal4++; ?></td>
<td class="isitabel" width="50%" align=""><?php echo  ($data4['no_surat']); ?></td>

<td class="isitabel" width="35%" align=""><?php echo  $data4['tujuan']; ?></td>
<?php if ($check1=='pos') {echo "<td class='isitabel' align='center' width=15%><input type='checkbox'  size='30' align='center' /></input></td>";}
      else{echo "";}    
        
        ?>


</tr>
<?php

};
?>
</table>

<?php  

if ($check1=='pos') {echo "";}
else {
    echo "
        <table  width='100%' id='groupmodul1'>
        <tr>
        <th class='judultabel' width='1%'>No</th>
	<th class='judultabel' width='25%'>No Surat</th>
	<th class='judultabel' width='25%'>Tanggal Surat</th>
	<th class='judultabel' width='35%'>Tujuan Surat Ke TPP</th>
        <th class='judultabel' width='15%'>Tanda Tangan</th></tr>";
    $awal3='1';
       while($data3 = mysql_fetch_array($query3)){
           
  echo "<tr>
        <td class='isitabel' width='1%' align=''>".$awal3++."</td>
        <td class='isitabel' width='25%' align=''>S-$data3[suratno]$data3[kd_tp3]$data3[tahun]</td>
        <td class='isitabel' width='25%' align=''>".tglindo($data3[suratdate])."</td>
        <td class='isitabel' width='36%' align=''>$data3[nm_tpp]</td>
      </tr>";

}
        
     
}

?>

<table border="0" id="groupmodul1" width="100%">
    <tr>
        <td width="50%">
            <table border="0" >
                <?php if ($check1=='pos') 
                                {echo "<tr>
                                            <td><font Size='2'>Dikirim Oleh </font></td>
                                    
                                       </tr>";
                                echo "<tr>
                                            <td><font Size='2'>Nama </font></td><td><font Size='2'>:$_SESSION[nm_lengkap] / $_SESSION[nip_baru] </font> </td>
                                    
                                       </tr>";
                                 echo "<tr>
                                            <td><font Size='2'>Tanggal </font></td><td><font Size='2'>:$now</font></td>
                                      </tr>";
                                 echo "<tr>
                                            <td height=50> </td>
                                      </tr>";
                                 
                                 
                                
                                       }
                      else
                                {echo "<tr>
                                            <td><font Size='2'>Dikirim Oleh </font></td>
                                    
                                       </tr>";
                                echo "<tr>
                                            <td><font Size='2'>Nama </font></td><td><font Size='2'>:$_SESSION[nm_lengkap] / $_SESSION[nip_baru] </font> </td>
                                    
                                       </tr>";
                                 echo "<tr>
                                            <td><font Size='2'>Tanggal </font></td><td><font Size='2'>:$now</font></td>
                                      </tr>";
                                 echo "<tr>
                                            <td height=50> </td>
                                      </tr>";}   

                   ?>
            </table>
            
        </td>
        <td width="50%">
            <table border="0" >
                
                   <?php if ($check1=='pos') 
                                {echo "<tr>
                                            <td><font Size='2'>Diterima Petugas POS</font> </td>
                                    
                                       </tr>";
                                echo "<tr>
                                            <td><font Size='2'>Nama </font></td><td>:</font></td>
                                    
                                       </tr>";
                                 echo "<tr>
                                            <td><font Size='2'>Tanggal </font></td><td>:</font></td>
                                      </tr>";
                                 
                                echo "<tr>
                                            <td><font Size='2'>Tanda Tangan dan Cap Perusahaan </font></td><td>:</font></td>
                                      </tr>";
                                echo "<tr>
                                            <td height=25> </td>
                                      </tr>";
                                echo "<td colspan=3 align=left ><font Size='2'>* Lembar Untuk Pos</font></td>";
                                
                                       }
                                 
                      else
                                echo "<td colspan=3 align=right ><font Size='2'>* Lembar Untuk Intern</font></td>";    

                   ?>
                
            </table>
            
        </td>
    </tr>
</table>

