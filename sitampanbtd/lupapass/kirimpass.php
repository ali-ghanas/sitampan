<?php
mysql_connect("localhost", "sitampan", "sitampan");
mysql_select_db("sitampan");

                $id=$_GET['id'];
                $sql = "SELECT * FROM user where iduser='$id'";
                $query = mysql_query($sql);
                $data = mysql_fetch_array($query);
                $username = $data['username'];
                $nohp=$data['no_hp'];
                
                

function randomPassword()
{
// function untuk membuat password random 6 digit karakter

$digit = 6;
$karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";

srand((double)microtime()*1000000);
$i = 0;
$pass = "";
while ($i <= $digit-1)
{
$num = rand() % 32;
$tmp = substr($karakter,$num,1);
$pass = $pass.$tmp;
$i++;
}
return $pass;
}

// membuat password baru secara random -> memanggil function randomPassword
$newPassword = randomPassword();

// perlu dibuat sebarang pengacak
$pengacak  = "AJWKXLAJSCLWLW";

// mengenkripsi password dengan md5() dan pengacak
$newPasswordEnkrip = md5($pengacak . md5($newPassword) . $pengacak);
// membuat password baru secara random -> memanggil function randomPassword
           


$isi_pesan = "Username : $username, Pass :$newPassword";


$masuk = mysql_query("insert into outbox (InsertIntoDB,SendingDateTime,DestinationNumber,TextDecoded,SendingTimeOut,DeliveryReport,CreatorID)
		values (sysdate(),sysdate(),'$nohp','$isi_pesan',sysdate(),'yes','system')");
if ($masuk){
    $edituser = mysql_query("UPDATE user SET
							password='$newPasswordEnkrip'
                                                        
                                                        	WHERE iduser='$id'");
        if($edituser){
            echo "<h4> Simpan Password baru berhasil </h4>";
            
        }
        else{
            echo "<h4> Simpan Password baru gagal </h4>";
        }
	echo "<h4> Pesan Dikirim Ke No HP anda $nohp </h4><br/>";
        echo "<h5> Segera Ganti password Anda di Menu Update Password </h5>";
        
	
        
}
else {
	echo "<h4> Pesan gagal dikirim </h4>";
	echo "<meta http-equiv='refresh' content='2; url=lupapass.php'>";
}
?>