<?php

// membaca nilai n dari form upload
$n = $_POST['n']; 

// setting nama folder tempat upload
$uploaddir = 'foto/';

// koneksi ke mysql
mysql_connect('localhost','sitampan','sitampan');
mysql_select_db('sitampan');

// proses upload yang diletakkan dalam looping
for ($i=0; $i<=$n-1; $i++)
{
  // membaca nama file yang diupload di setiap komponen upload
  $fileName = $_FILES['userfile'.$i]['name'];    

  // membaca ukuran file yang diupload di setiap komponen upload
  $fileSize = $_FILES['userfile'.$i]['size'];

  // nama file temporary yang akan disimpan di server
  $tmpName  = $_FILES['userfile'.$i]['tmp_name']; 
  
  $fileType = $_FILES['userfile'.$i]['type'];

  // menggabungkan nama folder dan nama file yang diupload
  $uploadfile = $uploaddir . $fileName;

  // proses upload file ke folder 'data'
  if ($fileSize > 0)
  {
      if (move_uploaded_file($tmpName, $uploadfile))
      {
          $id=$_POST['id'];
          $date=date('Y-m-d H:i:s');

          
          $input=mysql_query("INSERT INTO eventfoto(
                                                        idevent,
							name,
							type,
							size,
                                                        tglupload
                                                        
                        ) value (
                                                        '$id',
							'$fileName',
							'$fileType',
							'$fileSize',
                                                        '$date'
                                                        
                        )");
          echo "File ".$fileName." telah diupload<br>";
          
      }
      else
      {
          echo "File ".$fileName." gagal diupload<br>";
      }
  }
}

?>



