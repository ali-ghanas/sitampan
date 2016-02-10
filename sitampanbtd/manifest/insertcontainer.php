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
                 if ($.trim($("#txtbcfcontno").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Kontainer Wajib di isi, Jika LCL isikan dengan LCL (ukuran dikosongkan)");
                    $("#txtbcfcontno").focus();
                    return false;  
                 }
                 if ($.trim($("#txtbcfcontsegel").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Segel COntainer wajib di isi (setidaknya memuat keterangan segel ex : segel rusak, segel tdk ada)");
                    $("#txtbcfcontsegel").focus();
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
	$sql = "SELECT idbcf15,tahun,bcf15no,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,
        blno, bltgl, saranapengangkut, bcf15.idmanifest,manifest.idmanifest,idtps,idtpp,consignee,notify,kd_manifest FROM bcf15,manifest WHERE bcf15.idmanifest=manifest.idmanifest and idbcf15=$id "; // memanggil data dengan id yang ditangkap tadi
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
        <td  class="isitabel" >BC 11</td><td class="isitabel">:</td>
        <td class="isitabel"><? echo $bcf15['bc11no']; ?></td>
 </tr>
 <tr>
        <td class="isitabel" >BL</td><td class="isitabel">:</td>
        <td class="isitabel"><? echo $bcf15['blno']; ?></td>        
 </tr>
 <tr>
        <td class="isitabel" >TPS</td><td class="isitabel">:</td>
        <td class="isitabel" ><? echo $bcf15['idtps']; ?></td>        
 </tr>
  <tr>
        <td class="isitabel" >Consignee</td><td class="isitabel" width="5">:</td>
        <td class="isitabel"><?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];};?></td>
  </tr>
  
    
</table><br></br>
    </div>
<!--    untuk bikin inputan kontainer-->
<div id="kotakdetail">
       <form id="cont" name="cont" action="" method="post">
        <input type="hidden" name="idbcf15" value="<? echo $bcf15['idbcf15']; ?>"/> 
        <table  cellspacing="1" border="0" cellpadding="3">
        <tr>

        <td>No Container</td>
        <td>Ukuran</td>
        <td>Segel Pelayaran</td>
        
        <td>Delete</td>
        </tr>
        <tr align="center">
        <input type="hidden" name="txtidbcf15[]" value="<? echo $bcf15['idbcf15']; ?>"/> 
        <input type="hidden" name="txtbcf15no[]" value="<? echo $bcf15['bcf15no']; ?>"/>
        <input type="hidden" name="txttahun[]" value="<? echo $bcf15['tahun']; ?>"/>
        <input type="hidden" name="txtp2[]" value="<? echo $bcf15['p2-pengawas']; ?>"/>
                    
        <td align="center"><input align="center" class="required" id="txtbcfcontno" type="text" name="txtbcfcontno[0]"/>*)</td>
        <td align="center"><input align="center" size="3" class="required" type="text" name="txtbcfcontsize[0]"/></td>
        <td align="center"><input class="required" type="text" id="txtbcfcontsegel" name="txtbcfcontsegel[0]"/>*)</td>
        
        <td><button type="button" class="button putih bigrounded " >Del</button></td>
        </tr>
        <tr id="last">
        <td colspan="4" align="right"><button class="button putih bigrounded " type="button" id="addRow">Add</button></td>
        </tr>
        </table>

      <input type="submit" class="button putih bigrounded " value="Simpan" name="addcont" />
   
</form>

    <script type="text/javascript">
    var i = 1;
    $(function(){
    $("#addRow").click(function(){
    row = '<tr>'+
    '<input type="hidden" name="txtidbcf15['+i+']" value="<? echo $bcf15['idbcf15']; ?>"/>'+
    '<input type="hidden" name="txtbcf15no['+i+']" value="<? echo $bcf15['bcf15no']; ?>"/>'+
    '<input type="hidden"  name="txttahun['+i+']" value="<? echo $bcf15['tahun']; ?>"/>'+
    '<td align="center"><input class="required" type="text" id="txtbcfcontno1" name="txtbcfcontno['+i+']"/>*)</td>'+
    '<td align="center"><input size="3" class="required" type="text" name="txtbcfcontsize['+i+']"/></td>'+
    '<td align="center"><input class="required" type="text" id="txtbcfcontsegel1" name="txtbcfcontsegel['+i+']"/>*)</td>'+
    
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
    <span>*) Catatan : Untuk LCL --> Isi Kolom Container dengan LCL </span><br />
    <span>*) Wajib di isi </span>
</div> 
  <?php
    session_start();
    $txtnobcf15 = $_POST['txtbcf15no']; 
    $tahun = $_POST['txttahun'];
    $id = $_POST['idbcf15'];
    $now=date('Y-m-d');
                
  
  
    
    if(isset($_POST['addcont'])) // jika tombol addsubmit ditekan
	{
                
                foreach($_POST['txtbcfcontno'] as $key => $txtbcfcontno){
                                        
                    $query = "insert into bcfcontainer (nocontainer,idsize,bcf15no,tahun,idbcf15,segelpelayaran_man) values ('{$_POST['txtbcfcontno'][$key]}','{$_POST['txtbcfcontsize'][$key]}','{$_POST['txtbcf15no'][$key]}','{$_POST['txttahun'][$key]}','{$_POST['txtidbcf15'][$key]}','{$_POST['txtbcfcontsegel'][$key]}')";
                    mysql_query($query) or die("Gagal Menyimpan Data".mysql_error());
                }
               if ($query) {
                    print("No Cont - Size<br />");
                    $jumlah = count($_POST["txtbcfcontno"]);
                    for ($i = 0; $i < $jumlah; $i++)
                    print($i + 1 . ". " .$_POST["txtbcfcontno"][$i] . " - " .
                    $_POST["txtbcfcontsize"][$i] ."<br />");
                    
                   
                    echo "<script type='text/javascript'>window.location='index.php?hal=bcfedit&id=$id'</script>";
                }
                
               
        }
  ?>
 
</body>

</html>
<?php
};
?>


  
  

      
  

