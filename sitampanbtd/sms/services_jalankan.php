

<h2> Menjalankan Service GAMMU</h2>

<p>Klik tombol di bawah ini untuk menjalankan GAMMU Service!</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<input type="submit" name="submit" value="JALANKAN SERVICE GAMMU"></td></tr>
</form>

<?php
  if ($_POST['submit']) 
  {
   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -c smsdrc -s");
   echo "</pre>";
  }
?> 
