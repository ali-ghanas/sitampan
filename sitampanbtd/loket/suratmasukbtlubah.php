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
<?php // aksi untuk edit
 require_once 'lib/function.php'; 


if(isset($_POST['addsubmit'])) // jika tombol editsubmit ditekan
	{               
		$noagenda = $_POST['noagenda']; // variable nama = apa yang diinput pada name "nama" 
		$tglagenda = $_POST['tglagenda'];
                $no_agd_fr = $_POST['no_agd_fr']; // variable nama = apa yang diinput pada name "nama" 
		$tgl_agd_fr = $_POST['tgl_agd_fr'];
		$nosurat = $_POST['nosurat'];
		$tanggalsurat = $_POST['tanggalsurat'];
                $perihal = $_POST['perihal'];
                $asalsurat = $_POST['asalsurat'];
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
							noagenda='$noagenda',
							tglagenda='$tglagenda',
							nosurat='$nosurat',
							tanggalsurat='$tanggalsurat',
                                                        perihal='$perihal',
                                                        asalsurat='$asalsurat'
					WHERE idsuratmasuk='$id'");
                
                $_SESSION['logged']=time();
		echo '<script type="text/javascript">window.location="index.php?hal=suratmasukokbtlbcf&act=1"</script>';
        }
        else 
	{
           
            
	$id1 = $_GET['id']; // menangkap id
        $id=balik_teks($id1);
        
        
	$sql = "SELECT * FROM suratmasukpembatalanbcf15 WHERE idsuratmasuk=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="suratmasukedit" name="suratmasukedit" action="?hal=suratmasukbtledit">
        <input type="hidden" name="id" value="<?php echo  $data['idsuratmasuk']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Edit Permohonan Pembatalan BCF 1.5</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            <tr>
                                <td  >Nomor / Tgl Agenda NP </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="noagenda" name="noagenda" type="text" size="10" value="<?php echo $data['noagenda']; ?>" /> / <input class="required" id="tglagenda" name="tglagenda" type="text" size="15" value="<?php echo $data['tglagenda']; ?>" />  
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Nomor / Tgl Agenda Frondesk </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="no_agd_fr" name="no_agd_fr" type="text" size="10" value="<?php echo $data['no_agd_fr']; ?>" /> / <input class="required" id="tgl_agd_fr" name="tgl_agd_fr" type="text" size="15" value="<?php echo $data['tgl_agd_fr']; ?>" />  
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Nomor / Tgl Surat Permohonan </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nosurat" name="nosurat" type="text" size="28" value="<?php echo $data['nosurat']; ?>" /> / <input class="required" id="tanggalsurat" name="tanggalsurat" type="text" size="15" value="<?php echo $data['tanggalsurat']; ?>" />  
                                </td>
                                
                            </tr>
                            
                            
                            <tr>
                                <td  >Nama Pemohon </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="asalsurat" name="asalsurat" type="text" size="30" value="<?php echo $data['asalsurat']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Perihal </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="perihal" name="perihal" type="text" size="30" value="<?php echo $data['perihal']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <table border="0" width="100%" class="groupmodul1" >
                                        <tr>
                                            <td colspan="6">Uraian BCF 1.5</td>
                                        </tr>
                                        <tr >
                                            <td class="judultabel">No BCF 1.5</td>
                                            <td class="judultabel">Tanggal</td>
                                            <td class="judultabel">Consignee</td>
                                            <td class="judultabel">Uraian Brg</td>
                                            <td class="judultabel">TPS</td>
                                            <td class="judultabel">TPP</td>
                                        </tr>
                                        <?php 
                                        $sql = "SELECT * FROM bcf15view,tpp,typecode  where bcf15view.idtypecode=typecode.idtypecode and  bcf15view.idtpp=tpp.idtpp and recordstatus='2' and idbcf15='$data[noidbcf15]'  order by bcf15view.idbcf15 desc ";
                                        $result = mysql_query($sql);
                                        $bcf15=  mysql_fetch_array($result)
                                        ?>
                                        <tr >
                                            <td class="isitabel"><?php echo $bcf15['bcf15no']?></td>
                                            <td class="isitabel"><?php echo $bcf15['bcf15tgl']?></td>
                                            <td class="isitabel"><?php echo $bcf15['consignee']?></td>
                                            <td class="isitabel"><?php echo $bcf15['amountbrg']?> <?php echo $bcf15['satuanbrg']?> <?php echo $bcf15['diskripsibrg']?> </td>
                                            <td class="isitabel"><?php echo $bcf15['idtps']?></td>
                                            <td class="isitabel"><?php echo $bcf15['nm_tpp']?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Ubah"   /></td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>
<?php
};
?>

