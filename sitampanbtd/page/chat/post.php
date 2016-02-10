<?
session_start();
if(isset($_SESSION['nm_lengkap'])){
	$text = $_POST['text'];
	
	$fp = fopen("log.html", 'a');
	fwrite($fp, "<div class='msgln'>
                       <font style='color:#fff'>(".date("d M y H:i").")</font> <font color=#A7CBE3 size=2> <b>".$_SESSION['nm_lengkap']."</b>: </font><font color=#EFD5D5 size=2> ".stripslashes(htmlspecialchars($text))."<br></font>
                     </div>
                     ");
	fclose($fp);
        
}
?>