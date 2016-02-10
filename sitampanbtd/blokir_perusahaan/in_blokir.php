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
               $("#tgl_blokir").datepicker({
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
                 if ($.trim($("#nm_perusahaan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Perusahaan Tidak Boleh Kosong");
                    $("#nm_perusahaan").focus();
                    return false;  
                 }
                  if ($.trim($("#sebab_blokir").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan sebab diblokir");
                    $("#sebab_blokir").focus();
                    return false;  
                 }
                
              });      
           });
        </script> 

</head>

<body>


	
        <form method="post" id="editcuti" name="editcuti" action="?hal=input_blokir">
        <input type="hidden" name="id" value="<?php echo  $data['idcuti']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Blokir Perusahaan</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            
                            <tr>
                                <td  >No / Tgl Surat P2  </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="surat_blokir" name="surat_blokir" type="text"  value="<?php echo $bcf15['surat_blokir']; ?>" /> / <input class="required" id="tgl_blokir" name="tgl_blokir" type="text"  value="<?php echo $bcf15['tgl_blokir']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Nama Perusahaan  </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nm_perusahaan" name="nm_perusahaan" type="text"  value="<?php echo $bcf15['nm_perusahaan']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >NPWP  </td><td width="3">:</td>
                                <td >
                                     <input class="required" id="npwp_perusahaan" name="npwp_perusahaan" type="text"  value="<?php echo $bcf15['npwp_perusahaan']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Alamat </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="alamat_perusahaan" name="alamat_perusahaan" type="text"   ><?php echo $bcf15['alamat_perusahaan']; ?></textarea> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Sebab Blokir </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="sebab_blokir" name="sebab_blokir" type="text"   ><?php echo $bcf15['sebab_blokir']; ?></textarea> 
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
    
   
    
    <?php 


                $nm_perusahaan= $_POST['nm_perusahaan']; 
		$npwp_perusahaan = $_POST['npwp_perusahaan']; 
                $alamat_perusahaan = $_POST['alamat_perusahaan'];
                $sebab_blokir = $_POST['sebab_blokir'];
                $surat_blokir = $_POST['surat_blokir'];
                $tgl_blokir = $_POST['tgl_blokir'];
                $tgl_input = $_POST['tgl_input'];
                $nip_petugasrekam=$_SESSION['nip_baru'];
                $nama_petugasrekam=$_SESSION['nm_lengkap'];
                $tgl_input = date("Y-m-d H:i:s");
                


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM blokir_perusahaan where surat_blokir='$surat_blokir' and tgl_blokir='$tgl_blokir' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Surat Ini Pernah di Input");</script>';
                    
                }
                
                                
                else
                {
		
		$input=mysql_query("INSERT INTO blokir_perusahaan(
                                                        nm_perusahaan,
							npwp_perusahaan,
							alamat_perusahaan,
							sebab_blokir,
                                                        surat_blokir,
                                                        tgl_blokir,
                                                        tgl_input,
                                                        nip_petugasrekam,
                                                        nama_petugasrekam,
                                                        status_blokir
                                                       
                        ) value (
                                                        '$nm_perusahaan',
							'$npwp_perusahaan',
							'$alamat_perusahaan',
							'$sebab_blokir',
                                                        '$surat_blokir',
                                                        '$tgl_blokir',
                                                        '$tgl_input',
                                                        '$nip_petugasrekam',
                                                        '$nama_petugasrekam',
                                                        'blokir'
                                                        
                                                        
                        )");}
                        
            
                        
               
             if($input)   {
               echo '<script type="text/javascript">window.location="index.php?hal=blokir"</script>';
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
        
	