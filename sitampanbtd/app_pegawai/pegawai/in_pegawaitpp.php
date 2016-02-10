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
           $(document).ready(function() {    
              $("#editcuti").submit(function() {
                 if ($.trim($("#nm_pegawai").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Nama Pegawai Tak Boleh kosong");
                    $("#nm_pegawai").focus();
                    return false;  
                 }
                 if ($.trim($("#nip_baru").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>NIP Pegawai Tak Boleh kosong");
                    $("#nip_baru").focus();
                    return false;  
                 }
                 if ($.trim($("#golongan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Gol. Tak Boleh kosong");
                    $("#golongan").focus();
                    return false;  
                 }
                 if ($.trim($("#tempat_tugas").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Tempat Tugas Tak Boleh kosong");
                    $("#tempat_tugas").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 

</head>

<body>


	
        <form method="post" id="editcuti" name="editcuti" action="?hal=in_pegawaitpp">
        <input type="hidden" name="id" value="<?php echo  $data['idndlembur']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Input Pegawai Bidang PPC II dan III</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            
                            <tr>
                                <td  >Nama Pegawai</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nm_pegawai" name="nm_pegawai" type="text"  value="<?php echo $_POST['nm_pegawai']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >NIP Baru</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nip_baru" name="nip_baru" type="text"  value="<?php echo $_POST['nip_baru']; ?>"  /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >NIP Lama</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nip_lama" name="nip_lama" type="text"  value="<?php echo $_POST['nip_lama']; ?>" size="10" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Pangkat / Gol.</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="Pangkat" name="Pangkat" type="text"  value="<?php echo $_POST['Pangkat']; ?>" /> / <input class="required" id="golongan" name="golongan" type="text"  value="<?php echo $_POST['golongan']; ?>" size="10" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Jabatan </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="jabatan" name="jabatan" type="text"  value="<?php echo $_POST['waktu_lembur']; ?>"  />
                                </td>
                            </tr>
                            <tr>
                                <td  >Tempat Tugas </td><td width="3">:</td>
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

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
    
    <table width="80%" class="isitabel" bgcolor="#fff">
        <tr>
            
            <th class="judultabel">Nama</th>
            <th class="judultabel">NIP</th>
            <th class="judultabel">Jabatan</th>
            <th class="judultabel">Tugas</th>
            <th class="judultabel">Edit</th>
            
            <th class="judultabel">Del</th>
        </tr>
        <?php
        $sql = "SELECT * FROM pegawai   "; // memanggil data dengan id yang ditangkap tadi
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
                    
                    <td  class="isitabel"><?php echo  $data['nm_pegawai']; ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['nip_baru']; ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['jabatan']; ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['tempat_tugas']; ?> </td>
                    <td align="center" class="isitabel"><a href="?hal=edit_pegawaitpp&id=<?php echo $data[idpegawai] ?>"><img src="images/new/update.png"/></a></td>
                    
                    <td align="center" class="isitabel"><a href="?hal=del_pegawaitpp&id=<?php echo $data[idpegawai] ?>" ><img src="images/new/delete.png" onclick="javascript:return confirm('Anda Yakin Hapus Data Penting ini? ?')"/></a></td>
                    </tr>
                    
                    <?php
                    
                  ;
                    };
                    ?>
       
    </table>
    
    <?php 


                $nm_pegawai = $_POST['nm_pegawai']; // variable nama = apa yang diinput pada name "nama" 
		$nip_baru = $_POST['nip_baru'];
		$nip_lama = $_POST['nip_lama'];
		$Pangkat = $_POST['Pangkat'];
                $golongan = $_POST['golongan'];
                $jabatan = $_POST['jabatan'];
                $tempat_tugas = $_POST['tempat_tugas'];
                
                


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM pegawai where nip_baru='$nip_baru' and nm_pegawai='$nm_pegawai'";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Pegawai Tsb ini Pernah di input Silahkan cari ke menu edit");</script>';
                    
                }
                
                                
                else
                {
		
		$input=mysql_query("INSERT INTO pegawai(
                                                        nm_pegawai,
							nip_baru,
							nip_lama,
							Pangkat,
                                                        golongan,
                                                        jabatan,
                                                        tempat_tugas
                                                        
                        ) value (
                                                        '$nm_pegawai',
							'$nip_baru',
							'$nip_lama',
							'$Pangkat',
                                                        '$golongan',
                                                        '$jabatan',
                                                        '$tempat_tugas'
                                                        
                        )");}
                        
            
                        
               
             if($input)   {
               echo '<script type="text/javascript">window.location="index.php?hal=in_pegawaitpp"</script>';
             }
             else {
                 echo "tidak dapat menyimpan";
             }
                
	}; // if(kondisi) {hasil};
         
?>
      
</body>
</html>
<?php

};
?>
        
	