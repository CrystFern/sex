<?php
   include('sambungan.php);
   include("urusetia_menu.php");
?>

<link rel+"stylesheet" href="senarai.css">

<table>
    <caption>SENARAI PENILAIAN</caption>
    <tr>
        <th>ID Penilaian</th>
        <th>Aspek<//th>
        <th>Markah Penuh</th>
        <th colspan="2">Tindakan</th>
    </tr>
    <?php
       $sql = "select * from penilaian";
       $result = mysqli_query($sambungan, $sql);
       while($nilai = mysqli_fetch_array($result)){
           echo "<tr> <td>$nilai[idpenilaian]</td>
               <td>$nilai[aspek]</td>
               <td>$nilai[markahpenuh]</td>
               <td><a href='penilaian_update.php?idpenilaian=$nilai[idpenilaian]'>update</a></td>
               <td><a href='penilaian_delete.php?idpenilaian=$nilai[idpenilaian]'>delete</a></td>
       </tr>";
       }
    ?>
</table>