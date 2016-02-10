
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title></title>
        
</head>
<body>

<?php 

        if($_REQUEST['hal']=='user'){$active1='active';}else{$active1='';}
        if($_REQUEST['hal']=='settapp'){$active2='active';}else{$active2='';}
        if($_REQUEST['hal']=='seksi'){$active3='active';}else{$active3='';}

if($_SESSION['level']=="admin") {
    echo "    <div class='navbar'>
                <div class='navbar-inner'>
                <a class='brand' href='#'>SITAMPAN ADMIN</a>
                <ul class='nav'>
                    <li class='$active1'>
                        <a href='?hal=user'>Manajemen User</a>
                           
                    </li>
                    <li class='$active3'>
                        <a href='?hal=seksi'>Manajemen Seksi</a>
                           
                    </li>
                <li class='$active2'><a href='?hal=settapp'>Setting Aplikasi</a></li>
                <li><a href='../logout.php'>Logout</a></li>
                </ul>
                </div>
             </div>";
    
        
}

elseif($_SESSION['level']=="hanggar") {
    
}


?>




</body>

</html>


