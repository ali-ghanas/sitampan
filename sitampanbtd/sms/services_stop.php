

<h2>Menghentikan Service GAMMU</h2>

<p>Klik tombol di bawah ini untuk menghentikan GAMMU Service!</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<input type="submit" name="submit" value="HENTIKAN SERVICE GAMMU"></td></tr>
</form>

<?php
  if ($_POST['submit']) 
  {
   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -k");
   echo "</pre>";
  }
?> 
