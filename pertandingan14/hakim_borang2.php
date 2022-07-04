<?php
 include("sambungan.php");
 include("hakim_menu.php");
 $nokp = $_POST["nokp"];
 $jumlah_markah = $_POST["jumlah_markah"];

 $sql = "select * from penilaian";
 $data = mysqli_query($sambungan, $sql);

while ($penilaian = mysql_fetch_array($data)){
    $markah = $_POST["$penilaian[idpenilaian]"];
    $idpenilaian = $penilaian['idpenilaian'];
    $sql = " insert into keputusan values('$nokp', '$idpenilaian', '$markah', '$jumlah_markah')";
    $result = mysqli_query($sambungan, $sql);
    
    if($result == true)
        echo"<br><center>Berjaya tambah</center>";
    else
        echo"<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
 } // tamat while
?>
    
