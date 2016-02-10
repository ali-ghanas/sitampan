<?
session_start();
 
if(isset($_GET['logout'])){	
   
       
	//Simple exit message
    
    
	$fp = fopen("log.html", 'a');
	fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['nm_lengkap'] ." mau kerja lagi kayaknya.</i><br></div>");
	fclose($fp);
	
//	session_destroy();
	header("Location: /../sitampan/index.php"); //Redirect the user
}

function loginForm(){
	echo'
	<div id="loginform">
	<form action="index.php" method="post">
		<p>Anda telah keluar dari SITAMPAN silahkan <a href=/../sitampan/index.php>Login</a> kembali </p>
		
	</form>
	</div>
	';
}
//
//if(isset($_POST['enter'])){
//	if($_POST['name'] != ""){
//		$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
//	}
//	else{
//		echo '<span class="error">Please type in a name</span>';
//	}
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="page/chat/style.css" />
</head>
<body>

<?php
if(!isset($_SESSION['nm_lengkap'])){
	loginForm();
}
else{
?>
    
    <table  id="wrapper">
        <tr>
            <td>
        <marquee style="color:#A7CBE3;font-size: 20;"><b>Aplikasi Chatting ini berfungsi untuk saling berkomunikasi antar user. </b></marquee>
            </td>
        </tr>
        <tr>
            <td>
                
		<p class="welcome" style="color:#A7CBE3;"> <b>Hi, <?php echo $_SESSION['nm_lengkap']; ?></b></p>
<!--		<p class="logout"><a id="exit" href="#">Exit Chat</a></p>-->
		<div style="clear:both"></div>
               
            </td>
        </tr>
        <tr>
            <td>
                <div id="chatbox"><?php
                if(file_exists("page/chat/log.html") && filesize("page/chat/log.html") > 0){
                        $handle = fopen("page/chat/log.html", "r");
                        $contents = fread($handle, filesize("page/chat/log.html"));
                        fclose($handle);

                        echo "<font size=1>$contents</font>";
                }
                ?></div>
            </td>
        </tr>
        <tr>
            <td>
            <form name="message" action="">
		<input name="usermsg" type="text"  placeholder="input your text here" class="required" id="usermsg" size="63" />
		<input name="submitmsg" type="submit" style="background-color: #A7CBE3;color:#fff;font-weight: bold;" class="button"  id="submitmsg" value="Send" />
            </form>
            </td>
        </tr>
    </table>

<script type="text/javascript" src="page/chat/jquery-min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	//If user submits the form
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		$.post("page/chat/post.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});
	
	//Load the file containing the chat log
	function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 40;
		$.ajax({
			url: "page/chat/log.html",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div				
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 40;
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
	setInterval (loadLog, 2500);	//Reload file every 2.5 seconds
	
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Apakah Anda ingin keluar dari Chat?");
		if(exit==true){window.location = 'index.php?logout=true';}		
	});
});
</script>
<?php
}
?>
</body>
</html>