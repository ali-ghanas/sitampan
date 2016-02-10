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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
      
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#NHPLelangDate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepLelang1Date").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepLelang2Date").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepMusnahDate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepBMNDate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
       
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#blokir").submit(function() {
                 
                 if ($.trim($("#idstatusakhir").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Update Status BCF 1.5 ");
                    $("#idstatusakhir").focus();
                    return false;  
                 }
                 
                  
              });      
           });
        </script> 

</head>

<body>
    <?php // aksi untuk edit
session_start();


if(isset($_POST['addsubmit'])) // jika tombol editsubmit ditekan
	{
                
		$catatan_kaki = $_POST['catatan_kaki']; 
                
                $idstatusakhir = $_POST['idstatusakhir'];
                if($idstatusakhir=='2'){$nb='ATT Dicabut';}elseif($idstatusakhir=='15'){$nb='ATT!!';}
                $catatan=$nb.$catatan_kaki;
                $tgl_input=date('Y-m-d H:i:s');
                $id = $_POST['id'];
                $iduser=$_SESSION['iduser'];
              
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		 $input_konf=mysql_query("INSERT INTO catatan_kaki
                          (
                          idbcf15,
                          iduser,
                          catatan_kaki,
                          tgl_input,
                          idstatusakhir
                          
                          )
                          VALUES(
                          '$id',
                          '$iduser',
                          '$catatan',
                          '$tgl_input',
                          '$idstatusakhir')");
                 
                  $edit = mysql_query("UPDATE bcf15 SET                                                        
							idstatusakhir='$idstatusakhir'
                                                        WHERE idbcf15='$id'");
                
                
        if($input_konf) {   
            echo "berhasil";
                    echo "<script type='text/javascript'>window.location='index.php?hal=cat_petugas&id=$id'</script>";
              }
             else {
                 echo "tidak berhasil";
             }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,idtypecode,tundalelang,tglsuratpermohonan,idstatusakhir,nosuratpermohonan,Pemohon,masuk,recordstatus,NHPLelangNo,NHPLelangDate,idpemeriksa_tpp,idstatusakhir,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate
                FROM bcf15 WHERE  recordstatus='2' and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        ?>


	
        <form method="post" id="blokir" name="blokir" action="?hal=cat_petugas">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Catatan Khusus Petugas Penimbunan</td> 
                </tr>
                <tr >
                    <td>
                        <table  bgcolor="#f8f8f8">
                            
                            <tr>
                                <td  >No BCF 1.5 </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['bcf15no']; ?> /<?php echo $bcf15['bcf15tgl']; ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >No BC 1.1 </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['bc11no']; ?> / <?php echo $bcf15['bc11tgl']; ?> / Pos <?php echo $bcf15['bc11pos']; ?> / Sub Pos <?php if($bcf15['bc11subpos'=='']) {echo "-";} else{ echo $bcf15['bc11subpos'];} ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Consignee </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['consignee']; ?> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Notify </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['notify']; ?> 
                                </td>
                                
                            </tr>
                           
                            <tr>
                                <td  >Status Akhir  </td><td width="3">:</td>
                                <td >
                                    <select class="required" id="idstatusakhir" name="idstatusakhir">
                                    <option value="" selected>--Status Akhir--</option>
                                            <?php
                                                $sql = "SELECT * FROM statusakhir where idstatusakhir='15' or idstatusakhir='2' ORDER BY idstatusakhir";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idstatusakhir]==$bcf15[idstatusakhir]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idstatusakhir]' $cek>$data[statusakhirname]</option>";
                                                }
                                                ?>
                                    </select>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Catatan Petugas </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" cols="50" rows="4" id="catatan_kaki" name="catatan_kaki" type="text" ><?php echo $bcf15['catatan_kaki']; ?></textarea>
                                </td>
                                
                            </tr>
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>  
                                     
                        </table>
                    </td>
                    
                </tr>
            </table>
        </form>
    <div id="bingkai">
        <h1>Upload Surat Atensi</h1>
        <h3>Jika ada surat perihal atensi atas BCF 1.5 dimaksud, mohon discan dan diupload dibawah ini.</h3>
    <form enctype="multipart/form-data" action="catatankaki/catatankakirprosesupload.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000000000" />
                Pilih File PDF: <input name="userfile" type="file" />
                <input type="submit" value="Upload PDF" />
               <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
                <table>
                    <tr>
                        <td>Hasil Upload PDF</td>
                        <td>
                            <?php
                            $query  = "SELECT * FROM catatan_kaki where idbcf15='$id' and idstatusakhir='15'";
                            $hasil  = mysql_query($query);

                            while($data = mysql_fetch_array($hasil))
                            {
                               echo "<p><a href='catatankaki/download.php?id=".$data['idcatatan_kaki']."'>".$data['name']."</a> (".$data['size']." bytes) </p>";
                            }
                            ?>
                        </td>
                    </tr>
                   
                </table>
    </form>
    </div>
    
                        <table class="data isitabel">
                            <tr>
                                
                                <td class="judultabel">Tgl </td>
                                <td class="judultabel">Petugas </td>
                                <td class="judultabel">Catatan</td>
                                
                            </tr>
                            <?php
                            $sqlcat = "SELECT idbcf15,catatan_kaki.iduser,catatan_kaki,tgl_input,nm_lengkap
                                    FROM catatan_kaki,user WHERE catatan_kaki.iduser=user.iduser and  idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                            $querycat = mysql_query($sqlcat);
                            while($bcf15cat = mysql_fetch_array($querycat)){
                            
                            
                            ?>
                            <tr>
                                
                                <td class="isitable">
                                    <?php echo $bcf15cat['tgl_input'] ;?>
                                </td>
                                <td class="isitable">
                                    <?php echo $bcf15cat['nm_lengkap'];?>
                                </td>
                                <td class="isitable">
                                    <?php echo $bcf15cat['catatan_kaki'] ;?>
                                </td>
                                
                            </tr>
                            <?php };?>
                        </table>
                    
                   <a href="?hal=pagebcf15pemwas&pilih=update_status">Kembali</a>
                
                

    
    
   
    <?php
//       
        }; // penutup else
?>
    
</body>
</html>
<?php

};
?>
        
	