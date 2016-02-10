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
    ?><br></br>
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
        
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
           $(document).ready(function(){
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal2").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#spbcf15").submit(function() {
                 if ($.trim($("#cmbtpp").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Pilih dulu nama TPP");
                    $("#cmbtpp").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 

</head>

<body>

<form id="kotakform" method="post" action="?hal=spbcf15" name="spbcf15" id="spbcf15">
    <h1>
        Modul Pembuatan Surat Pengantar BCF 1.5
    </h1>
     <fieldset id="kotakformdalam">
    <table >
        <tr>
            <td>Pilih TPP</td><td>:</td>
                    <td width="20" coslpan="3">
                        <select class="required" id="cmbtpp" name="cmbtpp">
                        <option value = "" >::::...:::Pilih TPP:::...::::</option>
                        <?php
                            $sql = "SELECT * FROM tpp ORDER BY idtpp";
                            $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                    if ($data[idtpp]==$Datatpp) {
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
            <td>
                Masukkan Tanggal (awal) BCF 1.5 
            </td>
            <td>:</td>
            <td><input type="text" class="required" name="txttglawal" id="tanggal"></input></td>
        </tr>
        <tr>
            <td>
                Masukkan Tanggal (Akhir) BCF 1.5 
            </td>
            <td>:</td>
            <td><input type="text" class="required" name="txttglakhir" id="tanggal1"></input></td>
        </tr>
        <tr><td><input class="button putih bigrounded " type="submit" name="submit" value="Cari"></input></td></tr>
    </table>
     </fieldset>
    
    
</form >
<form  method="post" action="?hal=spbcf15" name="spbcf15table" id="spbcf15table">

    <table >
        <tr>
            <td class="judultabel">No</td><td class="judultabel">TPP</td><td class="judultabel">No BCF 1.5</td><td class="judultabel">Tanggal</td><td class="judultabel">No BC 11</td><td class="judultabel">No B/L</td><td class="judultabel">No SP</td><td class="judultabel">Tanggal SP</td>
        </tr>
        <?php 
        $tpp=$_POST['cmbtpp'];
        $tglawal=$_POST['txttglawal'];
        $tglakhir=$_POST['txttglakhir'];
        
        $query="select * from bcf15 where idtpp=$tpp and bcf15tgl between '$tglawal' and '$tglakhir'";
        $hasil=  mysql_query($query);
        
        $i=1;
        while ($data=  mysql_fetch_array($hasil)) {
            echo "<tr align='center'>
            <td class='isitabel'>$i</td>
            <td class='isitabel'>$data[idtpp]</td>
            <td class='isitabel'>$data[bcf15no]</td>
            <td class='isitabel'>$data[bcf15tgl]</td>
            <td class='isitabel'>$data[bc11no]</td>
            <td class='isitabel'>$data[blno]</td>
          
            <td class='isitabel'><input align='center' class='required' type='hidden' name='id$i' value='$data[idbcf15]' /><input align='center' class='required' type='text' name='sp$i' value='$data[suratpengantarno]' /></td>
            <td class='isitabel'><input align='center' class='required' type='text' id='tanggal2' name='sptgl$i' value='$data[suratpengantartgl]' /></td>
            </tr>";
            $i++;
        }
        $jumbcf=$i-1;
        ?>
        
    </table><br/>
    <input type="hidden" name="n" value="<?php echo $jumbcf ?>" />
    <input type="submit" name="submit2" value="Update" class="button putih bigrounded " />
    
</form>
    
   <?php
 include 'lib/koneksi.php';
 
  $jumbcf=$_POST['n'];
    
    
    for ($i=1; $i<=$n; $i++)
    {
        $id=$_POST['id'.$i];
        $sp=$_POST['sp'.$i];
        $sptgl=$_POST['sptgl'.$i];
        
        $update = mysql_query("UPDATE bcf15 SET
							suratpengantarno='$sp',
							suratpengantartgl='$sptgl'										
                                                        
                                                       
                        
                                                        	WHERE idbcf15='$id'");
    }
    echo "Update sukses ";
     echo $sp; echo $sptgl;

    ?>
  
</body>
</html>
    <?php
};
?>