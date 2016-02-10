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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
      
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tglnd").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#editcuti").submit(function() {
                 if ($.trim($("#nond").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Nota Dinas Roling  Tak Boleh kosong");
                    $("#nond").focus();
                    return false;  
                 }
                  if ($.trim($("#tglnd").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tanggal Nota Dinas  Tak Boleh kosong");
                    $("#tglnd").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit'])) // jika tombol editsubmit ditekan
	{               
		 $nm_pegawai = $_POST['nm_pegawai']; // variable nama = apa yang diinput pada name "nama" 
		$nip_baru = $_POST['nip_baru'];
		$nip_lama = $_POST['nip_lama'];
		$Pangkat = $_POST['Pangkat'];
                $golongan = $_POST['golongan'];
                $jabatan = $_POST['jabatan'];
                $tempat_tugas = $_POST['tempat_tugas'];
                
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE pegawai SET
							nm_pegawai='$nm_pegawai',
							nip_baru='$nip_baru',
							
                                                        nip_lama='$nip_lama',
                                                        Pangkat='$Pangkat',
                                                        golongan='$golongan',
                                                        jabatan='$jabatan',
                                                        tempat_tugas='$tempat_tugas'
                                                        
                        
					WHERE idpegawai='$id'");
                if($edit){
		echo '<script type="text/javascript">window.location="index.php?hal=in_pegawaitpp"</script>';
                }
                else {
                    echo "tidak berhasil di edit";
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM pegawai WHERE idpegawai=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="edit_roling" name="edit_roling" action="?hal=edit_pegawaitpp">
        <input type="hidden" name="id" value="<?php echo  $data['idpegawai']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Edit Pegawai TPP</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            <tr>
                                <td  >Nama Pegawai</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nm_pegawai" name="nm_pegawai" type="text"  value="<?php echo $data['nm_pegawai']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >NIP Baru</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nip_baru" name="nip_baru" type="text"  value="<?php echo $data['nip_baru']; ?>"  /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >NIP Lama</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nip_lama" name="nip_lama" type="text"  value="<?php echo $data['nip_lama']; ?>" size="10" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Pangkat / Gol.</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="Pangkat" name="Pangkat" type="text"  value="<?php echo $data['Pangkat']; ?>" /> / <input class="required" id="golongan" name="golongan" type="text"  value="<?php echo $data['golongan']; ?>" size="10" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Jabatan </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="jabatan" name="jabatan" type="text"  value="<?php echo $data['jabatan']; ?>"  />
                                </td>
                            </tr>
                            <tr>
                                <td  >Jabatan </td><td width="3">:</td>
                                <td >
                                    <textarea disabled class="required" id="" name="tempat_tugas1" type="text" ><?php echo $data['tempat_tugas']; ?></textarea> 
                                </td>
                            </tr>
                            <tr>
                               <td  >Ubah Jabatan </td><td width="3">:</td>
                               <td >
                                <select class="required" name="tempat_tugas" id="tempat_tugas">
                                        <option value="">::Pilih Tempat Tugas::</option>
                                        
                                        <option value="Koordinator Pelaksana Pemeriksa TPP PT. Multi Sejahtera Abadi dan Cikarang">Korlak MSA</option>
                                        <option value="Koordinator Pelaksana Pemeriksa TPP PT. Tripandu Pelita dan Jakarta Distribution Center (JDC)">Korlak TPP</option>
                                        <option value="Koordinator Pelaksana Pemeriksa TPP PT. Transcon Indonesia">Korlak TCI</option>
                                        <option value="Koordinator Pelaksana Pemeriksa TPP PT. Layanan Lancar Lintas Logistindo">Korlak L4</option>
                                        
                                        <option value="Pelaksana Pemeriksa TPP PT. Multi Sejahtera Abadi dan Cikarang">Pemeriksa MSA</option>
                                        <option value="Pelaksana Pemeriksa TPP PT. Tripandu Pelita dan Jakarta Distribution Center (JDC)">Pemeriksa TPP</option>
                                        <option value="Pelaksana Pemeriksa TPP PT. Transcon Indonesia">Pemeriksa TCI</option>
                                        <option value="Pelaksana Pemeriksa TPP PT. Layanan Lancar Lintas Logistindo">Pemeriksa L4</option>
                                        
                                        <option value="Pelaksana Administrasi TPP PT. Multi Sejahtera Abadi dan Cikarang">Administrasi MSA</option>
                                        <option value="Pelaksana Administrasi TPP PT. Tripandu Pelita dan Jakarta Distribution Center (JDC)">Administrasi TPP</option>
                                        <option value="Pelaksana Administrasi TPP PT. Transcon Indonesia">Administrasi TCI</option>
                                        <option value="Pelaksana Administrasi TPP PT. Layanan Lancar Lintas Logistindo">Administrasi L4</option>
                                        
                                        <option value="Pelaksana Pemeriksa Tempat Penimbunan Pabean">Pemeriksa Induk</option>
                                        <option value="Pelaksana Administrasi Tempat Penimbunan Pabean">Administrasi Induk</option>
                                        
                                    </select>
                               </td>
                            </tr>
                            
                            
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="editsubmit" value="Edit"   /></td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>

</body>
</html>
<?php
};
?>