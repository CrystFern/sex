<?php
   include("sambungan.php");
   include("urusetia_menu.php");

   if (isset($_POST["submit"])) {
         $idurusetia = $_POST["idurusetia"];
         $namaurusetia = $_POST["namaurusetia"];
         $password = $_POST["password"];
       
         $sql = "update urusetia set namaurusetia = '$namaurusetia', password='$password' where idurusetia = '$ idurusetia'
";
       
        $result = mysqli_query($sambungan, $sql);
         if ($result == true)
              echo "<br><center>Berjaya kemaskini</center>";
         else
              echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
   }
   
   if (isset($_GET['idurusetia']))
         $idurusetia = $_GET['idurusetia'];

         $sql = "select * from urusetia where idurusetia = '$ idurusetia'
";
        $result = mysqli_query($sambungan, $sql);
         while($urusetia = mysqli_fetch_array($result))
{
            $password = $urusetia['password'];
             $namaurusetia = $urusetia['namaurusetia'];
          
   }
?>

 <link rel="stylesheet" href="borang.css">
 <link rel="stylesheet" href="button.css">

 <h3 class="panjang">KEMASKINI URUSETIA</h3>

 <form class="panjang" action="urusetia_update.php" method="post">
 <table>
    <tr>
        <td>ID urusetia</td>
        <td><input type="text" name="idurusetia" value= "<?php echo $idurusetia; ?>" ></td>
    </tr>
    <tr>
        <td>Nama urusetia</td>
        <td><input type="text" name="namaurusetia" value= "<?php echo $namaurusetia; ?>" ></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="text" name="password" value= "<?php echo $password; ?>" ></td>
    </tr>
 </table>
 <button class="update" type="submit" name="submit">Update</button>
 </form>