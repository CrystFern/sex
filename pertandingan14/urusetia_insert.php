<?php
    include("sambungan.php");

    if(isset($_POST["submit"])){
       $idurusetia = $_POST["idurusetia"];
       $password = $_POST["password"];
       $namaurusetia = $_POST["namaurusetia"];
    
       $sql = "insert into urusetia values('$idurusetia','$password','$namaurusetia')";
       $result = mysqli_query($sambungan,$sql);
       if ($result == true)
           echo "berjaya tambah";
       else
           echo "Ralat ; $sql <br>".mysqli_error($sambungan);
    }
?>
        
<h3>TAMBAH URUSETIA</h3>
<form action="urusetia_insert.php" method="post">
    <table>

       <tr>
           <td>ID urusetia</td>
           <td><input type= "text" name="idurusetia"></td>
       </tr>

       <tr>
           <td>Nama Urusetia</td>
           <td><input type="text" name="namaurusetia"></td>
       </tr>

       <tr>
           <td>Password</td>
           <td><input type="password" name="password" placeholder="max: 8 char"></td>
       </tr>

    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>