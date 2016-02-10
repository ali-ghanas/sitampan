<?php
        $bcf15no = $_GET['nobcf15'];
        $tahun=$_GET['tahun'];
	$sql = "SELECT * from historybcf15 where bcf15no=$bcf15no and tahun='$tahun' "; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	
        
        
?>
<form method="POST">
        <table border="1" width="40%" class="data">
                        
                           <tr><th  align="center">No</th>
                            <th align="center">BCf 15</th>
                            <th align="center">Tahun</th>
                            <th align="center">Nama user</th>
                            <th align="center">NIP</th>
                            <th align="center">Keterangan</th>
                            
                            </tr>

                    <?php
                    $awal='0';
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
                    <td align="center"  valign="top"><?php echo  $awal++; ?></td>
                    <td valign="top" width="100" align="center"><?php echo  $data['bcf15no']; ?></td>
                    <td valign="top" width="100" align="center"><?php echo  $data['tahun']; ?> </td>
                    <td  valign="top" align="center" width="100"><?php echo  $data['nama_user']; ?> </td>
                    <td  valign="top" align="center" width="100"><?php echo  $data['nip_user']; ?> </td>
                    <td  valign="top" align="center" width="100"><?php echo  $data['namaaksi']; ?> Tanggal : <?php echo  $data['tanggalaksi']; ?>  </td>
                    
                    
                    <?php
                    };
                    ?>
                    </table>
</form>