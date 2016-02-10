<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Menambahkan/Menghapus Elemen Secara Dinamis</title>
<script type="text/javascript" 
        src="../lib/js/jquery-1.5.1.min.js"></script>
       <script type="text/javascript">
   $(document).ready(function() {
      // Sembunyikan tombol hapus
      $(".tombol-hapus").hide();
      
      // Pasang kejadian click
      $(".tombol-hapus").click(function(e){
         var ortu = $(e.target).parent();
         
         ortu.remove(); 
         return false;
      });      
         
      var indeks = 2;
      
      $("#tombol-tambah").click(function(){        
         var komponen = $("<p id='data-" + indeks + 
             
                          "'><label>idbcf: </label>" +
                          "<input name='txtidbcf15' type='text' />" +
                          "<label>No COnt: </label>" +
                          "<input name='txtbcfcontno' type='text' />" +
                          "<label> Size : </label>" +                  
                          "<input name='txtbcfcontsize' type='text' />" +
                          " </p>");
                          
         komponen.insertBefore("#tombol-tambah");     
         $(".tombol-hapus:first")
            .clone(true)
            .appendTo("#data-" + indeks)
            .show();
            
         indeks = indeks + 1; // Naikkan pencacah data
         return false;        // Menghindari submit
      });
   });
</script> 
</head>
<body>
<?php

	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        

?>
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="2">
  <tr align="center"> 
        <td height="22" colspan="3" bgcolor="#84B9D5" class="HEAD"><b>INPUT SUKSES</b></td>
  </tr>
  <tr align="center"> 
        <td height="22" colspan="3" bgcolor="#84B9D5" class="HEAD"><b>BCF 1.5</b></td>
  </tr>
  <tr> 
        <td width="23%">&nbsp;&nbsp;Nomor </td>
        <td width="8%">: <? echo $bcf15['bcf15no']; ?></td>
        <td width="30%"> <? echo $bcf15['kodemanifest']; ?></td>
        
  </tr>
  <tr>
        <td>&nbsp;&nbsp;Tanggal</td>
        <td>: <? echo $bcf15['bcf15tgl']; ?></td>
  </tr>
  <tr>
        <td>&nbsp;&nbsp;BC 11</td>
        <td>: <? echo $bcf15['bc11no']; ?></td>
 </tr>
 <tr>
        <td>&nbsp;&nbsp;BL</td>
        <td>: <? echo $bcf15['blno']; ?></td>        
 </tr>
  <tr>
        <td>&nbsp;&nbsp;Consignee</td>
        <td>: <? echo $bcf15['consignee']; ?></td>
  </tr>
  <tr>
        <td>&nbsp;&nbsp;Notify</td>
        <td>: <? echo $bcf15['notify']; ?></td>
  </tr>
  
<form action="" method="post">
    
    <label><input name="txtidbcf15" type="text" size="10" maxlength="6" value="<? echo $bcf15['idbcf15']; ?>"></input></label>
      <p id="data-1">
         <label>id bcf :</label> 
         <input name="txtidbcf15" type="text" />
         <label>No COnt:</label> 
         <input name="txtbcfcontno" type="text" />
         <label>Size :</label> 
         <input name="txtbcfcontsize" type="text" />
         <button class='tombol-hapus'>Hapus</button>
      </p>       
      <button id="tombol-tambah">Tambah</button>
      <input type="submit" value="Kirim" name="addcont" />
</form>
  
  
  <?php
 
  
    $txtidbcf15 = $_POST['txtidbcf15']; 
    $txtbcfcontno = $_POST['txtbcfcontno']; 
    $txtbcfcontsize = $_POST['txtbcfcontsize'];
    
    if(isset($_POST['addcont'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM bcfcontainer ";
                $query = mysql_query($sql);
                
                mysql_query("INSERT INTO bcfcontainer(idbcf15, nocontainer, idsize)
		VALUES('$txtidbcf15', '$txtbcfcontno', '$txtbcfcontsize')");
        }
  ?>
  
  
<table class="data">
	
	<tr>
	<th class="judultabel">No Cont</th>
	<th class="judultabel">Size</th>
	
	<th class="judultabel">Action</th>
	</tr>

<?php
$sql = "SELECT * FROM bcfcontainer where idbcf15=$txtidbcf15 ";
$query = mysql_query($sql);
while($data = mysql_fetch_array($query)){

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


<td class="isitabel"><?php echo  $data['nocontainer']; ?></td>
<td class="isitabel"><?php echo  $data['idsize']; ?></td>




<?php
};
?>
</table>
</body>
</html>


  
  

      
  

