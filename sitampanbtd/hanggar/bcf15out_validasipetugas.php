
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
<title>Untitled Document</title>
       

        
</head>

<body>
        <?php 
        
if($_POST['bcf']) // jika tombol editsubmit ditekan
	{               
		$tgl_upload=date('Y-m-d');
                $tgl_upload_now=date('Y-m-d H:i:s');
                $user=$_SESSION['nm_lengkap'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$updatebcf15  = ("UPDATE bcf15_batalbcf SET 

                    
                    update_sitampan='selesai',
                    tgl_update='$tgl_upload_now',
                    nm_update='$user'
                    
                             
                    WHERE update_sitampan='ya' ");
                    
                     $hasil = mysql_query($updatebcf15)
                         or die(mysql_error());


		echo '<script type="text/javascript">window.location="index.php?hal=upload_out_valid"</script>';
        }
        elseif($_POST['cont']) // jika tombol editsubmit ditekan
	{               
		$tgl_upload=date('Y-m-d');
                $tgl_upload_now=date('Y-m-d H:i:s');
                $user=$_SESSION['nm_lengkap'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$updatecont  = ("UPDATE bcfcontainer SET 

                    
                    statuspintu='selesai',
                    tgl_upload='$tgl_upload_now',
                    nm_upload='$user'
                    
                             
                    WHERE statuspintu='OUT' ");
                    
                     $hasil = mysql_query($updatecont)
                         or die(mysql_error());


		echo '<script type="text/javascript">window.location="index.php?hal=upload_out_valid"</script>';
        }
        else 
	{ 
        ?>
<div  >
        <div style="background-color: #75C9EA;color:#fff;border:1px">
                 <h3>PASTIKAN DATA YANG ADA UPLOAD SESUAI DENGAN DATA EXCELL</h3>
                 <h4>klik tombol SEMUA VALID jika Anda yakin data telah sesuai atau klik proses satu persatu</h4>
       </div> 
    <div>
        
    <form name="form1" method="post" action="?hal=upload_out_valid">
        
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
                <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>BCF 1.5 YANG TELAH SELESAI KELUAR TPP</b> </td></tr>
                <tr>
                    <td colspan="3">
                        <table width="100%" class="data">
                            <tr>
                                <th class="judultabel" rowspan="2">No</th>
                                <th class="judultabel" colspan="2">BCF 1.5</th>
                                
                                <th class="judultabel" colspan="3">Status Hanggar</th>
                                <th class="judultabel" colspan="3">Status Gate</th>
                                <th class="judultabel" rowspan="2">Validasi Data</th>
                                
                            </tr>
                            <tr>
                                <th class="judultabel" >Nomor</th>
                                <th class="judultabel" >Tanggal</th>
                                
                                <th class="judultabel">Valid</th>
                                <th class="judultabel">Hanggar</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Valid</th>
                                <th class="judultabel">Hanggar</th>
                                <th class="judultabel">Tanggal</th>
                                
                                
                            </tr>
                       <?php  
                    
                            $sqldata = "SELECT * FROM bcf15_batalbcf where update_sitampan='ya' order by bcf15no,bcf15tgl asc ";
                            $query   = mysql_query( $sqldata );
                            $cekdata=mysql_num_rows($query);
                            if($cekdata>0){
                            
                      $awal='1';
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
                            <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
                            <td class="isitabel"><?php echo  $data['bcf15no']; ?></td>
                            <td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
                            <td class="isitabel"><?php echo  $data['validasihanggar']; ?></td>
                            <td class="isitabel"><?php echo  $data['nm_hanggar']; ?></td>
                            <td class="isitabel"><?php echo  $data['validasihanggardate']; ?></td>
                            <td class="isitabel"><?php echo  $data['validasigate']; ?></td>
                            <td class="isitabel"><?php echo  $data['nm_gate']; ?></td>
                            <td class="isitabel"><?php echo  $data['validasigatedate']; ?></td>
                            <td class="isitabel"><a href="?hal=validbcf15out&id=<?php  echo $data['idbcf15_batalbcf']; ?>">PROSES</a></td>
                            
                            </tr>
                             <?php
                            };
                            }
                            else{
                                echo "<tr align=center><td style=background-color:#FFCF87; colspan=10 class=isitabel>Data Tidak Ada</td></tr>";
                            }
                            ?>
                        </table>
                    </td>
                </tr>
             
            <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td><input class="button putih bigrounded" type="submit" value="SEMUA VALID" name="bcf"/></td></tr>
            
            </table>
        
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
                <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>CONTAINER YANG TELAH SELESAI KELUAR</b> </td></tr>
                <tr>
                    <td colspan="3">
                        <table width="100%" class="data">
                            <tr>
                                <th class="judultabel" rowspan="2">No</th>
                                <th class="judultabel" colspan="2">BCF 1.5</th>
                                <th class="judultabel" colspan="2">CONTAINER</th>
                                
                                <th class="judultabel" colspan="3">Status Gate</th>
                                
                                <th class="judultabel" rowspan="2">Validasi Data</th>
                                
                            </tr>
                            <tr>
                                <th class="judultabel" >Nomor</th>
                                <th class="judultabel" >Tahun</th>
                                <th class="judultabel" >Nomor</th>
                                <th class="judultabel" >UK</th>
                                <th class="judultabel" >Tgl Keluar</th>
                                <th class="judultabel" >Tgl Input</th>
                                <th class="judultabel" >Nama</th>
                                
                                
                                
                                
                                
                            </tr>
                       <?php  
                            $sqldata = "SELECT * FROM bcfcontainer where statuspintu='OUT' ";
                            $query   = mysql_query( $sqldata );
                            $cekdata=mysql_num_rows($query);
                            if($cekdata>0){
                            
                      $awal='1';
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
                            <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
                            <td class="isitabel"><?php echo  $data['bcf15no']; ?></td>
                            <td class="isitabel"><?php echo  $data['tahun']; ?></td>
                            <td class="isitabel"><?php echo  $data['nocontainer']; ?></td>
                            <td class="isitabel"><?php echo  $data['idsize']; ?></td>
                            <td class="isitabel"><?php echo  $data['tgl_keluar']; ?></td>
                            <td class="isitabel"><?php echo  $data['tglinput_keluar']; ?></td>
                            <td class="isitabel"><?php echo  $data['nm_petugas_keluar']; ?></td>
                            
                            <td class="isitabel"><a href="?hal=validcontout&id=<?php echo  $data['idcontainer'];  ?>">PROSES</a></td>
                            
                            </tr>
                             <?php
                            };
                            }
                            else{
                                echo "<tr align=center><td style=background-color:#FFCF87; colspan=9 class=isitabel>Data Tidak Ada</td></tr>";
                            }
                            ?>
                        </table>
                    </td>
                </tr>
             
            <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td><input class="button putih bigrounded" type="submit" value="SEMUA VALID" name="cont"/></td></tr>
            
            </table>
        </form>
    </div>
</div>
   <?php
        
        
        }; // penutup else
?>

</body>
</html>

<?php
};
?>

