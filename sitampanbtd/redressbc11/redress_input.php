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
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script> 
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
                 if ($.trim($("#nosuratredress").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No SUrat Redress wajib diisi, tdk boleh kosong");
                    $("#nosuratredress").focus();
                    return false;  
                 }
                  
                 
                 
              });      
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#tglsuratredress').mask('99/99/9999');
               $('#bc11tgl').mask('99/99/9999');
               $('#tanggal2').mask('99/99/9999');
           });
         </script>
    
    </head>
    <body>
       
        
	     <?php // aksi untuk edit
session_start();


if(isset($_POST['addsubmit'])) // jika tombol editsubmit ditekan
	{               
		$nosuratredress = $_POST['nosuratredress']; 
                $tglsuratredress = sql($_POST['tglsuratredress']);
                
                $uraianredress_addslashes = addslashes($_POST['uraianredress']);
                $uraianredress = $uraianredress_addslashes;
                
                $consignee_addslashes = addslashes($_POST['consignee']);
                $consignee = $consignee_addslashes;
                
                $consigneeadrressaddslashes = addslashes($_POST['consigneeadrress']);
                $consigneeadrress = $consigneeadrressaddslashes;
                
                $consigneekota=$_POST['consigneekota'];
                
                $notifyaddslashes=addslashes($_POST['notify']);
                $notify=$notifyaddslashes;
                
                $notifyadrressaddslashes=addslashes($_POST['notifyadrress']);
                $notifyadrress=$notifyadrressaddslashes;
                
                $notifykota=$_POST['notifykota'];
                $bc11no=$_POST['bc11no'];
                $bc11tgl=sql($_POST['bc11tgl']);
                $bc11pos=$_POST['bc11pos'];
                $bc11subpos=$_POST['bc11subpos'];
                
                $bcf15no=$_POST['bcf15no'];
                $bcf15tgl=$_POST['bcf15tgl'];
                $tahun=$_POST['tahun'];
                
                
                
                $amountbrg=$_POST['amountbrg'];
                $satuanbrg=$_POST['satuanbrg'];
                $diskripsibrgaddslashes=addslashes($_POST['diskripsibrg']);
                $diskripsibrg=$diskripsibrgaddslashes;
                
                $id = $_POST['id'];
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
                        nosuratredress='$nosuratredress',
			tglsuratredress='$tglsuratredress',
                        uraianredress='$uraianredress',
                        consignee='$consignee',
                        consigneeadrress='$consigneeadrress',
                        consigneekota='$consigneekota',
                        notify='$notify',
                        notifyadrress='$notifyadrress',
                        notifykota='$notifykota',
                        bc11no='$bc11no',
                        bc11tgl='$bc11tgl',
                        bc11pos='$bc11pos',
                        bc11subpos='$bc11subpos',
                        amountbrg='$amountbrg',
                        satuanbrg='$satuanbrg',
                        diskripsibrg='$diskripsibrg',
                       
                        
                                                        
                                                        redress='1'
                                                        	WHERE idbcf15='$id'");
                
                 $sql = "SELECT idbcf15,bcf15no,tahun FROM bcf15redress where idbcf15='$id'";
                 $query = mysql_query($sql);
                 $cek=mysql_numrows($query);
                 if ($cek>0){
                     $edit = mysql_query("UPDATE bcf15redress SET
							
                        
                        bcf15no='$bcf15no',
                        bcf15tgl='$bcf15tgl',
                        tahun='$tahun',
                        uraian_redress='$uraianredress'
                             
                        WHERE idbcf15='$id'");
                    }
                    else {
                        
                        $input_redress=mysql_query("INSERT INTO bcf15redress
                          (
                                
                          idbcf15,
                          bcf15no,
                          bcf15tgl,
                          tahun,
                          uraian_redress
                             
                          )
                          VALUES(
                          '$id',
                          '$bcf15no',
                          '$bcf15tgl',
                          '$tahun',
                          '$uraianredress'
                          )");
                     
                    }
                
                
                
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Masuk TPP','$txttglba','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtba','$txttglba')");
                
                    echo "<script type='text/javascript'>window.location='index.php?hal=redressinput&id=$id'</script>";
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <div id="kotakinput">
        <form method="post" id="bapenarikan" name="bapenarikan" action="?hal=redressinput">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="bcf15tgl" value="<?php echo  $bcf15['bcf15tgl']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo  $bcf15['tahun']; ?>" />
        
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Redress Pos: Edit Data BCF 1.5 kemudian Upload PDF Surat redress nya </td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#1f4c7a">
                            <tr>
                                <td  ><font color="#fff" >No Surat Redress </font></td><td width="3">:</td>
                                <td colspan="4">
                                    <input class="required" id="nosuratredress" name="nosuratredress" type="text"  value="<?php echo $bcf15['nosuratredress'] ?>" /> / <input class="required" id="tglsuratredress" name="tglsuratredress" type="text"  value="<?php echo view($bcf15['tglsuratredress']) ?>" /><font size="3" color="#fff"><b>(dd/mm/yyyy)</b></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#fff" >Uraian Redress </font></td><td width="3">:</td>
                                <td colspan="4">
                                    <textarea class="required" cols="50" rows="2" id="uraianredress" name="uraianredress" type="text"><?php echo $bcf15['uraianredress']; ?></textarea> 
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  ><font color="#fff" >Consignee</font> </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="consignee" name="consignee" type="text"  value="<?php echo $bcf15['consignee'] ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ></td><td width="3">:</td>
                                <td >
                                    <textarea class="required" cols="50" rows="2" id="consigneeadrress" name="consigneeadrress" type="text"><?php echo $bcf15['consigneeadrress']; ?></textarea> 
                                </td>
                            </tr>
                            <tr>
                            
                                <td  ></td><td width="3">:</td>
                                <td >
                                    <input class="required" id="consigneekota" name="consigneekota" type="text" value="<?php echo $bcf15['consigneekota']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#fff" >Notify </font></td><td width="3">:</td>
                                <td >
                                    <input class="required" id="notify" name="notify" type="text"  value="<?php echo $bcf15['notify'] ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ></td><td width="3">:</td>
                                <td >
                                    <textarea  cols="50" rows="2" class="required"  id="notifykota" name="notifykota" type="text"><?php echo $bcf15['notifykota']; ?></textarea> 
                                </td>
                            </tr>
                            <tr>
                           
                                <td  ></td><td width="3">:</td>
                                <td >
                                    <input class="required" id="consigneekota" name="consigneekota" value="<?php echo $bcf15['consigneekota']; ?>" type="text" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#fff" >BC 1.1 / Tgl</font> </td><td width="3">:</td>
                                <td colspan="4">
                                    <input id="bc11no" class="required"  name="bc11no" type="text"  value="<?php echo $bcf15['bc11no'] ?>" /> / <input class="required"  id="bc11tgl" name="bc11tgl" type="text"  value="<?php echo view($bcf15['bc11tgl']) ?>" /><font size="3" color="#fff"><b>(dd/mm/yyyy)</b></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#fff" >Pos / Sub Pos</font> </td><td width="3">:</td>
                                <td colspan="4">
                                    <input size="10" class="required"  id="bc11pos" name="bc11pos" type="text"  value="<?php echo $bcf15['bc11pos'] ?>" /> / <input size="10" class="required"  id="bc11subpos" name="bc11subpos" type="text"  value="<?php echo $bcf15['bc11subpos'] ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#fff" >Jumlah/Satuan</font></td><td width="3">:</td>
                                <td colspan="4">
                                    <input size="5" class="required"   id="amountbrg" name="amountbrg" type="text"  value="<?php echo $bcf15['amountbrg'] ?>" /> 
                                
                                    <input class="required"   size="5" id="satuanbrg" name="satuanbrg" type="text"  value="<?php echo $bcf15['satuanbrg'] ?>" /> 
                                
                                  
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#fff" >Uraian Barang</font> </td><td width="3">:</td>
                                <td colspan="4">
                                    <textarea cols="50" rows="2" class="required" id="diskripsibrg" name="diskripsibrg" type="text"><?php echo $bcf15['diskripsibrg']; ?></textarea> 
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
            
            <form enctype="multipart/form-data" action="redressbc11/uploadscan.php" method="POST">
                <input type="hidden" name="bcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
                <input type="hidden" name="bcf15tgl" value="<?php echo  $bcf15['bcf15tgl']; ?>" />
                <input type="hidden" name="tahun" value="<?php echo  $bcf15['tahun']; ?>" />
                <input type="hidden" name="uraianredress" value="<?php echo  $bcf15['uraianredress']; ?>" />
                <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                Pilih File PDF: <input name="userfile" type="file" />
                <input type="submit" value="Upload PDF" />
                <table>
                    <tr>
                        <td>Hasil Upload PDF</td>
                        <td>
                            <?php
                            $query  = "SELECT * FROM bcf15redress where idbcf15='$id'";
                            $hasil  = mysql_query($query);

                            while($data = mysql_fetch_array($hasil))
                            {
                               echo "<p><a href='redressbc11/download.php?id=".$data['idbcf15']."'>".$data['name']."</a> (".$data['size']." bytes) [ <a href='redressbc11/delete.php?id=".$data['idbcf15']."'>Delete</a> ]</p>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </form>


        </div>
        
        
	<?php
            

                    }; // penutup else
            ?>
      
                

</body>
</html>
<?php
};
?>