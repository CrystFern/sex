<?php
   include("sambungan.php");
    include("urusetia_menu.php");
   
   if (isset($_POST["submit"])) {
       $nokp = $_POST["nokp"];
       $password = $_POST["password"];
       $namapeserta = $_POST["namapeserta"];
       $telefon = $_POST["telefon"];
       $idhakim = $_POST["idhakim"];
       $idurusetia = $_POST["idurusetia"];
       
       $sql = "update peserta set password = '$password', namapeserta = '$namapeserta', telefon = '$telefon', idhakim = '$idhakim', idurusetia = '$idurusetia' where nokp = '$nokp'";
       
       $result = mysqli_query($sambungan,$sql);
       if ($result == true)
           echo "<br><center>Berjaya Kemaskini</center>";
       else
           echo "<br><center>RALAT : $sql<br>".mysqli_error($sambungan)."</center>";
   } // tamat if

   if (isset($_GET['nokp']))
       $nokp = $_GET['nokp'];
       
   $sql = "select * from peserta where nokp = '$nokp'";
   $result = mysqli_query($sambungan, $sql);
   while($peserta = mysqli_fetch_array($result)) {
       $namapeserta = $peserta['namapeserta'];
       $telefon = $peserta['telefon'];
       $password = $peserta['password'];
       $idhakim = $peserta['idhakim'];
       $idurusetia = $peserta['idurusetia'];
       
   }
?>

 <link rel="stylesheet" href="borang.css">
 <link rel="stylesheet" href="button.css">
 
 <h3 class="panjang">KEMASKINI PESERTA</h3>
 <form class="panjang" action="peserta_update.php" method="post">
     <table>
        <tr>
            <td>No KP</td>
            <td><input type="text" name="nokp" value= "<?php echo $nokp; ?>"></td>
        </tr>
        <tr>
             <td>Nama Peserta</td>
             <td><input type="text" name="namapeserta"
                  value = "<?echo $namapeserta; ?>" >
             </td>
        </tr>
        <tr>
            <td>No Telefon</td>
            <td><input type="text" name="telefon" value= "<?php echo $telefon; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value= "<?php echo $password; ?>" ></td>
         </tr>
         <tr>
             <td>IDHakim</td>
             <td><input type="text" name="idhakim" value= "<?php echo $idhakim; ?>"></td>
         </tr>
         <tr>
             <td>IDUrusetia</td>
             <td>input type="text" name="idurusetia" value= "<?php echo $idurusetia; ?>"></td>
         </tr>            
 </table>
 <button class="update" type="submit" name="submit">Update</button>
 </from>                          