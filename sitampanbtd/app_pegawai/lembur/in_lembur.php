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
               $("#waktu_lembur").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
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
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Nota Dinas Tak Boleh kosong");
                    $("#nond").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 

</head>

<body>


	
        <form method="post" id="editcuti" name="editcuti" action="?hal=in_lembur">
        <input type="hidden" name="id" value="<?php echo  $data['idndlembur']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Input ND Lembur Bidang PPC II dan III</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            
                            <tr>
                                <td  >No Nota Dinas</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nond" name="nond" type="text"  value="" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Tanggal Nota Dinas</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="tglnd" name="tglnd" type="text"  value="<?php echo date('Y-m-d'); ?>" size="10" /> <img src="images/calendar.png" /> (<font color="red">yyyy-mm-dd</font>)
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Waktu Lembur </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="waktu_lembur" name="waktu_lembur" type="text"  value="<?php echo $_POST['waktu_lembur']; ?>"  size="10"/><img src="images/calendar.png" /> (<font color="red">yyyy-mm-dd</font>)
                                </td>
                            </tr>
                            <tr>
                                <td  >Penanda Tangan ND</td><td width="3">:</td>
                                <td >
                                    <select class="required" id="idseksi" name="idseksi" >
                                        <option value = "" >--Seksi--</option>
                                        <?php
                                            $sql = "SELECT * FROM seksi where status_seksi='aktif' and (kdseksi='tpp3' or kdseksi='tpp2') ORDER BY idseksi";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idseksi]==$_POST['idseksi']) {
                                                        $cek="selected";
                                                        }
                                                   else {
                                                        $cek="";
                                                        }
                                                        echo "<option value='$data[idseksi]' $cek>$data[plh] $data[jabatan] $data[nm_seksi] </option>";
                                                    }
                                        ?>
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
            
            <th class="judultabel">Nomor ND</th>
            <th class="judultabel">Tanggal</th>
            <th class="judultabel">Waktu Lembur</th>
            <th class="judultabel">Seksi Penandatangan ND</th>
            <th class="judultabel">Edit</th>
            <th class="judultabel">Input Pegawai Lembur</th>
            <th class="judultabel">Cetak</th>
            <th class="judultabel">Del</th>
        </tr>
        <?php
        $sql = "SELECT * FROM ndlembur,seksi where ndlembur.idseksi=seksi.idseksi   "; // memanggil data dengan id yang ditangkap tadi
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
                    
                    <td  class="isitabel"><?php echo  $data['nond']; ?></td>
                    <td align="center" class="isitabel"><?php echo  tglindo($data['tglnd']); ?></td>
                    <td align="center" class="isitabel"><?php echo  tglindo($data['waktu_lembur']); ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['nm_seksi']; ?> </td>
                    <td align="center" class="isitabel"><a href="?hal=edit_lembur&id=<?php echo $data[idndlembur] ?>"><img src="images/new/update.png"/></a></td>
                    <td align="center" class="isitabel"><a href="?hal=indet_lembur&id=<?php echo $data[idndlembur] ?>"><img src="images/new/bc.png" width="20"/></a></td>
                    <td align="center" class="isitabel"><a href="?hal=cet_lembur&id=<?php echo $data[idndlembur] ?>" target="_blank"><img src="images/new/view.png"/></a></td>
                    <td align="center" class="isitabel"><a href="?hal=del_lembur&id=<?php echo $data[idndlembur] ?>" ><img src="images/new/delete.png" onclick="javascript:return confirm('Anda Yakin Hapus Data Penting ini? ?')"/></a></td>
                    </tr>
                    
                    <?php
                    
                  ;
                    };
                    ?>
       
    </table>
    
    <?php 


                $nond = $_POST['nond']; // variable nama = apa yang diinput pada name "nama" 
		$tglnd = $_POST['tglnd'];
		$waktu_lembur = $_POST['waktu_lembur'];
		$idseksi = $_POST['idseksi'];
                
                


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM ndlembur where nond='$nond' and waktu_lembur='$waktu_lembur'";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("ND Lembur ini Pernah di input Silahkan cari ke menu edit");</script>';
                    
                }
                
                                
                else
                {
		
		$input=mysql_query("INSERT INTO ndlembur(
                                                        nond,
							tglnd,
							idseksi,
							waktu_lembur
                                                        
                        ) value (
                                                        '$nond',
							'$tglnd',
							'$idseksi',
							'$waktu_lembur'
                                                        
                        )");}
                        
            
                        
               
             if($input)   {
               echo '<script type="text/javascript">window.location="index.php?hal=in_lembur"</script>';
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
        
	