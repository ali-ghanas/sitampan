<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="../lib/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="../lib/js/jquery.maskedinput-1.3.min.js"></script>
        <script type="text/javascript">$(document).ready(function() {
            $("#formulir").submit(function () {
                var ekspresiRegular = new RegExp (
            /^\d{1,2}\/d{1,2}\/\d{4}$/);
            var tanggal =$.trim($("#tanggal").val());
            
            if (tanggal == "" || !ekspresiRegular.test (tanggal)) {
                alert("Masukan Tgl-Bulan-Tahun");
                $("#tanggal").focus ();
                return false;
            }
            });
        });
        </script>
        
        <script type="text/javascript">$(document).ready(function() {
                $.mask.definitions['~']='[+-]';
                $('#tanggal').mask('99/99/9999')
        });
        </script>  
        <style type="text/css">
        label {
            float:left;
            width: 250px;
        }
        p{clear:both;}
        </style>
            
    </head>
    <body>
        <form id="formulir" action="" method="post">
            <p>
                <label>Tanggal Lahir (99/99/9999) :</label>
                <input type="text" id="tanggal" name="tanggal" value=""/>
            </p>
            <p>
                <input type="submit" id="kirim" value="Kirim"
            </p>
        </form>
    </body>
</html>
