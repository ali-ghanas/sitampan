<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>

<script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal4").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
<?php // aksi untuk edit
session_start();
require_once 'lib/function.php'; 


if(isset($_POST['editsubmit5'])) // jika tombol editsubmit ditekan
	{ 
                
            
		
                $jawaban_bukaposbc11no = $_POST['jawaban_bukaposbc11no']; 
                $jawaban_bukaposbc11tgl = $_POST['jawaban_bukaposbc11tgl'];
                $jawaban_bukaposbc11seksi = $_POST['jawaban_bukaposbc11seksi'];
                $jawaban_bukaposbc11ket = $_POST['jawaban_bukaposbc11ket'];
                if($jawaban_bukaposbc11no==''){$jawaban_bukaposbc11='';} else {$jawaban_bukaposbc11='1';}
                
                $tahun=date('Y');
                $txtbcf15no = $_POST['txtbcf15no'];
               
                $txtbatal='batalbcf15';
               
                $id = $_POST['id'];
                $now=date('Y-m-d');
               
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
							
                                                        jawaban_bukaposbc11='$jawaban_bukaposbc11',
							jawaban_bukaposbc11no='$jawaban_bukaposbc11no',										
                                                        jawaban_bukaposbc11tgl='$jawaban_bukaposbc11tgl',
                                                        jawaban_bukaposbc11seksi='$jawaban_bukaposbc11seksi',
                                                        jawaban_bukaposbc11ket='$jawaban_bukaposbc11ket'
                                                        
                                                        
                                                        	WHERE idbcf15='$id'");
               
                
                $_SESSION['logged']=time();
               
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagemanifest&pilih=bukaposbc11ceisa&id=$id'</script>";
                        
        }
        else 
	{ 
        $id = $_GET['id']; // menangkap id
        
	$sql = "select *, idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, bc11no, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl, bc11pos, bc11pos, blno, DATE_FORMAT(bltgl,'%d %M %Y') as bltgl, idtpp,idmanifest, Perintah, suratperintahno, idtp2, suratperintahdate, tahun,ndsegelno,ndsegeldate,idp2,ndkonfirmasino,ndkonfirmasidate,idp2  FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
       
        
        ?>
        <form method="post" id="editmohonbatal" name="editmohonbatal" action="?hal=pagemanifest&pilih=bukaposbc11ceisa">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Nota Dinas Buka Pos BC 1.1(Ceisa) Seksi TP</b></td></tr>
                <tr>
                    <td  align="left" class="judulform" >Nomor / Tanggal</td><td class="judulform">:</td>
                    <td><input class="required" disabled type="text" id="nobukaposbc11ceisa" name="nobukaposbc11ceisa" value="<?php echo $bcf15['nobukaposbc11ceisa']; ?>"/> <input class="required" disabled id="tanggal3" type="text" name="tglbukaposbc11ceisa" value="<?php echo $bcf15['tglbukaposbc11ceisa']; ?>" /> </td>
                </tr>
                
                <tr>
                    <td  align="left" class="judulform" >Seksi  </td><td class="judulform">:</td>
                    <td><select disabled  id="idseksibukaposbc11ceisa" name="idseksibukaposbc11ceisa">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM seksi where status_seksi='aktif' and (kdseksi='tpp2' or kdseksi='tpp3') ORDER BY idseksi";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idseksi]==$bcf15[idseksibukaposbc11ceisa]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idseksi]' $cek>$data[nm_seksi].$data[bidang].$data[plh]</option>";
                                }
                                ?>
                    </select> </td>
                 </tr>
                 <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Rekam Jawaban Buka Pos</b></td></tr>
                 <tr>
                    <td  align="left" class="judulform" >Nomor / Tanggal</td><td class="judulform">:</td>
                    <td><input class="required" type="text" id="jawaban_bukaposbc11no" name="jawaban_bukaposbc11no" value="<?php echo $bcf15['jawaban_bukaposbc11no']; ?>"/> <input class="required" id="tanggal4" type="text" name="jawaban_bukaposbc11tgl" value="<?php echo $bcf15['jawaban_bukaposbc11tgl']; ?>" /> </td>
                </tr>
                
                <tr>
                    <td  align="left" class="judulform" >Seksi  </td><td class="judulform">:</td>
                    <td><select  id="jawaban_bukaposbc11seksi" name="jawaban_bukaposbc11seksi">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM seksi where status_seksi='aktif' and kdseksi='manifest' ORDER BY idseksi";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idseksi]==$bcf15[jawaban_bukaposbc11seksi]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idseksi]' $cek>$data[nm_seksi].$data[bidang].$data[plh]</option>";
                                }
                                ?>
                    </select> </td>
                 </tr>
                 <tr>
                    <td  align="left" class="judulform" >Keterangan</td><td class="judulform">:</td>
                    <td><textarea class="required" type="text" id="jawaban_bukaposbc11ket" name="jawaban_bukaposbc11ket" value="" ><?php echo $bcf15['jawaban_bukaposbc11ket']; ?></textarea>  </td>
                </tr>
                 
                <tr>
                    <td><input type="submit" class="button putih bigrounded " name="editsubmit5" value="Simpan"  /> </td><td colspan="2"><a href="report/doc/jawabanbukaposbc11.php?id=<?php echo $bcf15['idbcf15']; ?>"><input  class="button putih bigrounded "  value="Cetak" /> </a></td>
                </tr>           
                
            
            </table>
        </form>

	
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>