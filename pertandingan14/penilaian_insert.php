<?php
include("sambungan.php");
include("urusetia_menu.php");
if (isset($_POST["submit"])) {
    $idpenilaian = $_POST["idpenilaian"];
    $aspek = $_POST["aspek"];
    $markahpenuh = $_POST["markahpenuh"];
    $sql = "insert into penilaian values('$idpenilaian', '$aspek', '$markahpenuh')";
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "<br><center>Berjaya tambah</center>";
    else
        echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
    }
?>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3 class="panjang">TAMBAH PENILAIAN</h3>
<form class="panjang" action="penilaian_insert.php" method="post">
<table>
   <tr>
       <td>ID Penilaian</td>
       <td><input type="text" name="idpenilaian"></td>
    </tr>
    <tr>
        <td>Aspek Penilaian</td>
        <td><input type="text" name="aspek"></td>
    </tr>
    <tr>
       <td>Markah Penuh</td>
       <td><input type="text" name="markahpenuh"></td>
    </tr>
</table>
<button class="tambah" type="submit" name="submit">Tambah</button>
</form>