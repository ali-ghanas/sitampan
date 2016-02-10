<?php
session_start();
 $jam=date(" H:i:s A");
echo "<table border=\"0\" style=\"border-collapse:collapse\" width=\"100%\" cellpadding=\"0\" id=\"table6\">
        <form method=\"POST\" enctype=\"multipart/form-data\" action=\"berita/proses_kirim_artikel.php\" target=\"_self\">
        <tr>
            <td width=\"1%\">&nbsp;</td>
            <td colspan=\"2\">
                <p style=\"margin-top:8px;margin-bottom:10px\" align=\"center\">
                <b>Kirim Artikel</b></p>
            </td>
            <td width=\"1%\">&nbsp;</td>
        </tr>
        <tr>
            <td width=\"1%\" heigth=\"142\" >&nbsp;</td>
            <td width=\"47%\" heigth=\"142\" >
            <p style=\"margin-left:20px;margin-top:3px;margin-bottom:3px\">
            <input type=\"checkbox\" name=\"k1\" value=\"aplikasi\"><font size=\"2\">Aplikasi</font>
            </input></p>
            <p style=\"margin-left:20px;margin-top:3px;margin-bottom:3px\">
            <input type=\"checkbox\" name=\"k2\" value=\"lelang\"><font size=\"2\">Lelang</font>
            </input></p>
            <p style=\"margin-left:20px;margin-top:3px;margin-bottom:3px\">
            <input type=\"checkbox\" name=\"k3\" value=\"musnah\"><font size=\"2\">Musnah</font>
            </input></p></td>
        </tr>
        <tr><td width=\"1%\">&nbsp;</td>
            <td sidth=\"98%\" colspan=\"2\">
                <table border=\"0\" style=\"border-collapse:collapse\" width=\"100%\" cellpadding=\"0\" id=\"table22\">
                    <tr>
                        <td width=\"28%\">&nbsp;<p><font size=\"2\">Tanggal Berita</font></p></td>
                        <td valign=\"top\" colspan=\"4\">&nbsp;<p><font size=\"2\" color=\"#800000\">$hari&nbsp;$jam</font></p></td>
                    </tr>
                    <tr>
                        <td width=\"28%\"><p style=\"margin-top:2px; margin-bottom:2px\"><font size=\"2\">Gambar</font></p></td>
                        <td valign=\"top\" colspan=\"4\">
                            <p style=\"margin-top:2px; margin-bottom:2px\"><input type=\"radio\" value=\"tidak\" name=\"gbr\" checked><font size=\"2\"/>Tidak Ada</font>
                            <p style=\"margin-top:2px; margin-bottom:2px\"><input type=\"radio\" value=\"ada\" name=\"gbr\"><font size=\"2\"/>Ada</font>
                            <input type=\"file\" name=\"file\" size=\"34\" style=\"color:#000080;font-family:arial;background-image:url('../images/bg_form.gif')\"></input><br>
                                <font color=\"#ff0000\" size=\"2\">Format Gambar Harus .jpg atau .gif</font></td>
                    </tr>
                    <tr>
                        <td width=\"28%\">
                            <font size=\"2\">Bentuk Gambar</font>
                        </td>
                        <td valign=\"top\" width=\"17%\" align=\"center\">
                            <p style=\"margin-top:0; margin-bottom:0\">
                            <img border=\"0\" src=\"images/beacukai.png\" width=\"50\" height=\"50\" /></p>
                                <p style=\"margin-top:0; margin-bottom:0\"><input type=\"radio\" name=\"ukuran\" value=\"270\" checked></input>
                        </td>
                        <td valign=\"top\" width=\"13%\" align=\"center\">
                            <p style=\"margin-top:0; margin-bottom:0\">
                            <img border=\"0\" src=\"images/beacukai.png\" width=\"32\" height=\"50\" /></p>
                            <p style=\"margin-top:0; margin-bottom:0\"><input type=\"radio\" name=\"ukuran\" value=\"200\" ></input>
                        </td>
                        <td valign=\"top\" width=\"20%\" align=\"center\">
                            <p style=\"margin-top:0; margin-bottom:0\">
                            <img border=\"0\" src=\"images/beacukai.png\" width=\"75\" height=\"50\" /></p>
                            <p style=\"margin-top:0; margin-bottom:0\"><input type=\"radio\" name=\"ukuran\" value=\"350\" ></input>
                        </td>
                        <td valign=\"top\" width=\"23%\" align=\"center\">&nbsp;</td>
 
                    </tr>
                    <tr>
                        <td width=\"28%\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <font size=\"2\">Judul Berita</font>
                        </td>
                        <td valign=\"top\" colspan=\"4\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <input type=\"text\" value=\"BELUM SELESAI DIBUAT\" name=\"judul\" size=\"62\" style=\"font-family:arial;color:#000080; font-size:10pt;background-image:url('images/bg_form.gif')\" maxlength=\"200\"></input>
                        </td>
                    </tr>
                    <tr>
                        <td width=\"28%\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <font size=\"2\">Isi Berita</font>
                        </td>
                        <td valign=\"top\" colspan=\"4\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <textarea  rows=\"18\" name=\"isi\" cols=\"65\" style=\"font-family:arial;color:#000080; font-size:10pt\"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width=\"28%\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <font size=\"2\">Pengirim</font>
                        </td>
                        <td valign=\"top\" colspan=\"4\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <font size=\"2\" color=\"#800000\">$_SESSION[nm_lengkap]</font>
                        </td>
                    </tr>
                    <tr>
                        <td width=\"28%\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <font size=\"2\">NIP</font>
                        </td>
                        <td valign=\"top\" colspan=\"4\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <font size=\"2\" color=\"#800000\">$_SESSION[nip_baru]</font>
                        </td>
                    </tr>
                    <tr>
                        <td width=\"28%\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            
                        </td>
                        <td valign=\"top\" colspan=\"4\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <font size=\"2\" color=\"#800000\">&nbsp;</font>
                        </td>
                    </tr>
                    <tr>
                        <td width=\"28%\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            
                        &nbsp;</td>
                        <td  colspan=\"4\">
                            <p style=\"margin-top:2px;margin-bottom:2px\"></p>
                            <input type=\"submit\" value=\"KIRIM\" name=\"submit\" style=\"font-family:arial;color:#000080;font-size:10pt;font-weight:bold;border:2px solid #A096C5;padding-left:4px;padding-right:4px;padding-top:1px;padding-bottom:1px;background-color:#E5E9F7\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type=\"reset\" value=\"B A T A L\" name=\"reset\" style=\"font-family:arial;color:#000080;font-size:10pt;font-weight:bold;border:2px solid #B3ABD1;padding-left:4px;padding-right:4px;padding-top:1px;padding-bottom:1px;background-color:#E5E9F7\"/>
                        </td>
                    </tr>
                    <tr>
                        <td width=\"28%\">
                            <p style=\"margin-top:2px;margin-bottom:2px\">&nbsp;</p>
                        </td>
                    </tr>    
 
                </table>
            </td>
            <td width=\"1%\">&nbsp;</td>
        </tr>
        <input type=\"hidden\" name=\"user\" value=\"$_SESSION[nm_lengkap]\"/>
        <input type=\"hidden\" name=\"jam\" value=\"$jam\"/>
        <input type=\"hidden\" name=\"tanggal\" value=\"$hari\"/>
        <input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
        
        </form>
        
      </table>"
?>
