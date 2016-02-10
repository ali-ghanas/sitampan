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
               $("#tmt_roling").datepicker({
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
                 if ($.trim($("#tmt_roling").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> TMT Roling Tak Boleh kosong");
                    $("#tmt_roling").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 

</head>

<body>


	
        <form method="post" id="editcuti" name="editcuti" action="?hal=in_roling">
        <input type="hidden" name="id" value="<?php echo  $data['idcuti']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Input ND Roling</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            <tr>
                                <td  >Kepada </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="kepada" name="kepada" type="text" rows="3" cols="60" size="50"  >Para Pegawai sebagaimana tersebut <br/> pada Lampiran Nota Dinas ini.</textarea> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Dari </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="darind" name="darind" type="text"  value="Kepala Seksi Penimbunan" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Hal </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="hal_roling" name="hal_roling" type="text"  value="Penempatan Tugas" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >TMT </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="tmt_roling" name="tmt_roling" type="text"  value="<?php echo $_POST['tmt_roling']; ?>"  size="10"/><img src="images/calendar.png" /> (<font color="red">yyyy-mm-dd</font>)
                                </td>
                            </tr>
                            <tr>
                                <td  >Penanda Tangan ND</td><td width="3">:</td>
                                <td >
                                    <select class="required" id="idseksi" name="idseksi" >
                                        <option value = "" >--Seksi--</option>
                                        <?php
                                            $sql = "SELECT * FROM seksi where status_seksi='aktif' and kdseksi='tpp3' ORDER BY idseksi";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idseksi]==$Datamanifest) {
                                                        $cek="selected";
                                                        }
                                                   else {
                                                        $cek="";
                                                        }
                                                        echo "<option value='$data[idseksi]' $cek>$data[nm_seksi]</option>";
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
            <th class="judultabel">Kepada</th>
            <th class="judultabel">Dari</th>
            <th class="judultabel">Hal</th>
            <th class="judultabel">Edit</th>
            <th class="judultabel">Cetak</th>
            <th class="judultabel">Del</th>
        </tr>
        <?php
        $sql = "SELECT * FROM ndroling  "; // memanggil data dengan id yang ditangkap tadi
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
                    <td align="center" class="isitabel"><a href="?hal=in_roling_det&id=<?php echo $data['idndroling'] ?>"><?php echo  $data['kepada']; ?></a></td>
                    <td align="center" class="isitabel"><?php echo  $data['darind']; ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['hal_roling']; ?> </td>
                    <td align="center" class="isitabel"><a href="?hal=edit_roling&id=<?php echo $data[idndroling] ?>"><img src="images/new/update.png"/></a></td>
                    <td align="center" class="isitabel"><a href="app_pegawai/roling/cetak_rtf_ndroling.php?id=<?php echo $data[idndroling] ?>" target="_blank"><img src="images/new/view.png"/></a></td>
                    <td align="center" class="isitabel"><a href="?hal=delcuti&id=<?php echo $data[idcuti] ?>" ><img src="images/new/delete.png" onclick="javascript:return confirm('Anda Yakin Hapus Data Penting ini? ?')"/></a></td>
                    </tr>
                    
                    <?php
                    
                  ;
                    };
                    ?>
       
    </table>
    
    <?php 


                $nond = $_POST['nond']; // variable nama = apa yang diinput pada name "nama" 
		$tglnd = $_POST['tglnd'];
		$hal_roling = $_POST['hal_roling'];
		$kepada = $_POST['kepada'];
                $darind = $_POST['darind'];
                $idseksi = $_POST['idseksi'];
                $tmt_roling = $_POST['tmt_roling'];
                $tglinput_roling = date('Y-m-d');
                


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM ndroling where tglinput_roling='$tglinput_roling' and tmt_roling='$tmt_roling'";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("ND Roling ini Pernah di input Silahkan cari ke menu edit");</script>';
                    
                }
                
                                
                else
                {
		
		$input=mysql_query("INSERT INTO ndroling(
                                                        nond,
							tglnd,
							hal_roling,
							kepada,
                                                        darind,
                                                        idseksi,
                                                        tmt_roling,
                                                        tglinput_roling
                                                        
                        ) value (
                                                        '$nond',
							'$tglnd',
							'$hal_roling',
							'$kepada',
                                                        '$darind',
                                                        '$idseksi',
                                                        '$tmt_roling',
                                                        '$tglinput_roling'
                        )");}
                        
            
                        
               
             if($input)   {
               echo '<script type="text/javascript">window.location="index.php?hal=in_roling"</script>';
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
        
	