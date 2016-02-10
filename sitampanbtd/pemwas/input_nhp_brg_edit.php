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
</head>
    <script type="text/javascript">
           $(document).ready(function() {    
              $("#cont").submit(function() {
                 if ($.trim($("#jumlah").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Jumlah barang tiak boleh kosong");
                    $("#jumlah").focus();
                    return false;  
                 }
                
                 
                 });      
           });
        </script>
<body>
    
   
          
<?php
include 'lib/function.php';
	$id = $_GET['id']; 
        
        //// menangkap id
	$sql = "SELECT * FROM bcf15,manifest WHERE bcf15.idmanifest=manifest.idmanifest and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        

?>
    <div id="kotakinput">
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="2">
  
  <tr align="center"> 
        <td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>BCF 1.5</b></td>
  </tr>
  <tr> 
      <td class="isitabel" width="50">Nomor </td><td class="isitabel">:</td>
        <td  class="isitabel"><? echo $bcf15['bcf15no']; ?><? echo $bcf15['kd_manifest']; ?><? echo $bcf15['tahun']; ?></td>
        
        
  </tr>
  <tr>
      <td class="isitabel" >Tanggal</td><td class="isitabel">:</td>
        <td class="isitabel" ><? echo tglindo($bcf15['bcf15tgl']); ?></td>
  </tr>
  
  <tr>
        <td class="isitabel" >Consignee</td><td class="isitabel" width="5">:</td>
        <td class="isitabel"><?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];};?></td>
  </tr>
  <tr>
        <td class="isitabel" >NHP</td><td class="isitabel" width="5">:</td>
        <td class="isitabel"><?php echo $bcf15['NHPLelangNo'] ;?> / <?php echo tglindo($bcf15['NHPLelangDate']) ;?></td>
  </tr>
  <tr>
        <td class="isitabel" >Konsep Kep BTD</td><td class="isitabel" width="5">:</td>
        <td class="isitabel"><input type="checkbox" name="check_btd" id="check_btd" class="required" value="1" <?php  if($bcf15['konsep_skepbtd'] == 1){echo 'checked="checked"';}?> /> Ya  </td>
  </tr>
    <tr>
        <td class="isitabel" >Petugas Pencacahan</td><td class="isitabel" width="5">:</td>
        <td class="isitabel">
                                            <?php
                                                $sql = "SELECT * FROM pemeriksa_tpp where idpemeriksa_tpp=$bcf15[idpemeriksa_tpp] ORDER BY idpemeriksa_tpp";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                $data =mysql_fetch_array($qry);
                                                echo "$data[nm_pemeriksa]";
                                                       
                                                
                                                ?></td>
  </tr> 
  
    
</table><br></br>
    </div>
<!--    untuk bikin inputan kontainer-->
<div id="kotakdetail">
       <form id="cont" name="cont" action="" method="post">
        
        <table  cellspacing="1" border="0" cellpadding="3" id="groupmodul1">
        <tr>

        <td class="judulform">Jumlah</td>
        <td class="judulform">Jenis Uraian Brg</td>
        <td class="judulform">Kondisi</td>
        <td class="judulform">Negara Asal</td>
        
        <td class="judulform">Delete</td>
        </tr>
        <tr align="center">
        <input type="hidden" name="idbcf15[]" value="<? echo $bcf15['idbcf15']; ?>"/> 
        <input type="hidden" name="bcf15no[]" value="<? echo $bcf15['bcf15no']; ?>"/>
        <input type="hidden" name="tahun[]" value="<? echo $bcf15['tahun']; ?>"/>
        <input type="hidden" name="bcf15tgl[]" value="<? echo $bcf15['bcf15tgl']; ?>"/>
        <input type="hidden" name="NHPLelangNo[]" value="<? echo $bcf15['NHPLelangNo']; ?>"/>
       <input type="hidden" name="NHPLelangDate[]" value="<? echo $bcf15['NHPLelangDate']; ?>"/>
                    
        <td align="center" class="isitabel"><input align="center" class="required" id="jumlah" type="text" name="jumlah[0]"/></td>
        <td align="center" class="isitabel"><input align="center"  class="required" type="text" name="jenis[0]"/></td>
        <td align="center" class="isitabel"><input class="required" type="text" id="kondisi" name="kondisi[0]"/></td>
        <td align="center" class="isitabel"><input class="required" type="text" id="negaraasal" name="negaraasal[0]"/></td>
        
        <td><button type="button" class="button putih bigrounded " >Del</button></td>
        </tr>
        <tr id="last">
        <td colspan="4" align="right"><button class="button putih bigrounded " type="button" id="addRow">Add</button></td>
        </tr>
        </table>

      <input type="submit" class="button putih bigrounded " value="Simpan" name="addcont" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"/>
   
</form>

    <script type="text/javascript">
    var i = 1;
    $(function(){
    $("#addRow").click(function(){
    row = '<tr>'+
    '<input type="hidden" name="idbcf15['+i+']" value="<? echo $bcf15['idbcf15']; ?>"/>'+
    '<input type="hidden" name="bcf15no['+i+']" value="<? echo $bcf15['bcf15no']; ?>"/>'+
    '<input type="hidden"  name="tahun['+i+']" value="<? echo $bcf15['tahun']; ?>"/>'+
    '<input type="hidden"  name="bcf15tgl['+i+']" value="<? echo $bcf15['bcf15tgl']; ?>"/>'+
    '<input type="hidden"  name="NHPLelangNo['+i+']" value="<? echo $bcf15['NHPLelangNo']; ?>"/>'+
    '<input type="hidden"  name="NHPLelangDate['+i+']" value="<? echo $bcf15['NHPLelangDate']; ?>"/>'+
    '<td align="center" class="isitabel"><input class="required" type="text" id="jumlah" name="jumlah['+i+']"/></td>'+
    '<td align="center" class="isitabel"><input  class="required" type="text" name="jenis['+i+']"/></td>'+
    '<td align="center" class="isitabel"><input class="required" type="text" id="kondisi" name="kondisi['+i+']"/></td>'+
    '<td align="center" class="isitabel"><input class="required" type="text" id="negaraasal" name="negaraasal['+i+']"/></td>'+
    
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
    
</div> 
  <?php
    session_start();
    
  
  
    
    if(isset($_POST['addcont'])) // jika tombol addsubmit ditekan
	{
                
                foreach($_POST['jumlah'] as $key => $jumlah){
                                        
                    $query = "insert into nhp (jumlah,jenisbrg,kondisi,negaraasal,idbcf15,bcf15no,tahun,bcf15tgl,nonhp,tanggal) values ('{$_POST['jumlah'][$key]}','{$_POST['jenis'][$key]}','{$_POST['kondisi'][$key]}','{$_POST['negaraasal'][$key]}','{$_POST['idbcf15'][$key]}','{$_POST['bcf15no'][$key]}','{$_POST['tahun'][$key]}','{$_POST['bcf15tgl'][$key]}','{$_POST['NHPLelangNo'][$key]}','{$_POST['NHPLelangDate'][$key]}')";
                    mysql_query($query) or die("Gagal Menyimpan Data".mysql_error());
                }
               if ($query) {
                    print("No Cont - Size<br />");
                    $jumlah = count($_POST["jumlah"]);
                    for ($i = 0; $i < $jumlah; $i++)
                    print($i + 1 . ". " .$_POST["jumlah"][$i] . " - " .
                    $_POST["txtbcfcontsize"][$i] ."<br />");
                    
                   
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=editnhp_brg&id=$bcf15[idbcf15]'</script>";
                }
                
               
        }
  ?>
 
</body>

</html>
<?php
};
?>


  
  

      
  

