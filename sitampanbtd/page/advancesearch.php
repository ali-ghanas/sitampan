<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>    
<!-- form advanced search -->
    <form name="form1" method="get" action="?hal=search">
    bcf15no : <input type="text" name="bcf15no" id="bcf15no"/> <br/>
    bcf15tgl : <input type="text" name="bcf15tgl" id="bcf15tgl"/> <br/>
    bc11no : <input type="text" name="bc11no" id="bc11no"/> <br/>
    bc11tgl : <input type="text" name="bc11tgl" id="bc11tgl"/>
    <br/><input type="submit" value="Search" name="search"/>
    </form>
    <!-- menampilkan hasil pencarian -->
    <?php
    if(isset($_GET['search'])){
   
    mysql_select_db("sitampan");
    $bcf15no = $_GET['bcf15no'];
    $bcf15tgl = $_GET['bcf15tgl'];
    $bc11no = $_GET['bc11no'];
    $bc11tgl = $_GET['bc11tgl'];
    $sql = "select * from bcf15 where bcf15no like '%$bcf15no%' and
    bcf15tgl like '%$bcf15tgl%' and bc11no like '%$bc11no%' and bc11tgl like '%$bc11tgl%'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result) > 0){
    ?>
    
    <table>
    <tr>
    <td>bcf15no</td>
    <td>bcf15tgl</td>
    <td>bc11no</td>
    <td>bc11tgl</td>
    </tr>
    <?php
    while($data = mysql_fetch_array($result)){?>
    <tr>
    <td><?php echo $data['bcf15no'];?></td>
    <td><?php echo $data['bcf15tgl'];?></td>
    <td><?php echo $data['bc11no'];?></td>
    <td><?php echo $data['bc11tgl'];?></td>
    </tr>
    <?php }?>
    </table>
    <?php
    }else{
    echo 'Data not found!';
    }
    }
    ?>
<?php
};
?>