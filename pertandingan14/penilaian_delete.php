<?php
   include("sambungan.php");
   include("penilaian_delete.php");

   if (isset($_POST["submit"])){
         $idpenilaian = $_POST["idpenilaian"];
         $aspek = $_POST["aspek"];
         $markahpenuh = $_POST["markahpenuh"];
       
         $sql = "update penilaian set aspek = '$aspek', markahpenuh = '$markahpenuh'
                 where idpenilaian = '$idpenilaian'";
       
         $result = mysqli_query($sambungan, $sql);
         if ($result == true)
              echo "<br><cente>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
         else
             echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
   }

   
   if (isset($_GET['idpenilaian']))
         $idpenilaian = $_GET['idpenilaian'];
  
   $sql = "select *from penilaian where idpenilaian = '$idpenilaian'";
   $result = mysqli_query($sambungan, $sql);
   while($nilai = mysqli_fetch_array($result)){
       $aspek = $nilai['aspek'];
       $markahpenuh = $nilai['markahpenuh'];
   }// tamat while
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">KEMASKINI PENILAIAN</h3>
<form class="panjang" action="penilaian_update.php" method="post">
   <table>
   <tr>
      <td>ID Penilaian</td>
      <td><input type="text" name="idpenilaian" value= "<?php echo $idpenilaian; ?>"></td>
   </tr>
   </table>
   <button class="padam" type="submit" name="submit">Padam</button>
</form>