<?php
include "lib/koneksi.php";
$id=$_GET['id'];
$txtnosurat='';
$txtno2surat='';
$tanggal='';
$ket='Hapus Batal Tarik';

if($id) {
	if(empty($id)){
		echo "<b>Data yang dihapus tidak ada</b>";
	}
	else {
            
		$edit = mysql_query("UPDATE bcf15 SET
							
                                                        BatalTarikNo='$txtnosurat',
                                                        BatalTarikNo2='$txtno2surat',
                                                        BatalTarikDate='$tanggal',
                                                        BatalTarikKet='$ket',
                                                        BatalTarik='2'
							
                                                        	WHERE idbcf15='$id'");
		
		if($edit){
			echo "<meta http-equiv='refresh' content='0; url=?hal=pagemonitoring&pilih=bataltarik'>";
		}
	}
}
?>