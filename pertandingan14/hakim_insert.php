<?php
  include("sambungan.php");
  include("urusetia_menu.php");
  
  if (isset($_POST["submit"])) {
       $idhakim = $_POST["idhakim"];
       $password = $_POST["password"];
       $namahakim = $_POST["namahakim"];

       $sql = "insert into hakim values('$idhakim', '$password', '$namahakim')";

       $result = mysqli_query($sambungan, $sql);
       if ($result == true)
           echo "<br><center>Berjaya tambah</center>";
        else
           echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
    }
?>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3 class="panjang">TAMBAH HAKIM</h3>
<form class="panjang" action="hakim_insert.php" method="post">
   <table>
       <tr>
          <td>ID Hakim</td>
          <td><input type="text" name="idhakim"></td>
       </tr>
       <tr>
          <td>Password</td>
          <td><input type="text" name="password"></td>
       </tr>
       <tr>
          <td>Nama Hakim</td>
          <td><input type="text" name="namahakim"></td>
       </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>