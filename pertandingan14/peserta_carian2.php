<?php
   include('sambungan.php');
   include("urusetia_menu.php");

   $nokp = $_POST['nokp'];

   $sql = "select * from peserta where nokp = '$nokp' ";
   $result = mysqli_query($sambungan, $sql);
   $peserta = mysqli_fetch_array($result);
 
   $namapeserta = $peserta['namapeserta'];
   $telefon = $peserta['telefon'];
   $password = $peserta['password'];
   $idhakim = $peserta['idhakim'];
?>

<link rel="stylesheet" href="senarai.css">
<table>
   <caption >MAKLUMAT PESERTA</caption>
   <tr>
       <th>Perkara</th>
       <th>Maklumat</th>
    </tr>
    <tr>
       <td class="keputusan">No KP</td>>
       <td class="keputusan"><?php echo $nokp; ?></td>
    </tr>
    <tr>
       <td class="keputusan">Nama Peserta</td>
       <td class='keputusan"><?php echo $namapeserta; ?></td>
    </tr>
    <tr>
        <td class="keputusan">No Telefon</td>
        <td class="keputusan"><?php echo $telefon; ?></td>
    </tr>
    <tr>
        <td class="keputusan">Password</td>
        <td class="keputusan"><?php echo$password; ?></td>
    </tr>
    <tr>
        <td class="keputusan">ID Hakim</td
        <td class="keputusan"><?php echo $idhakim; ?></td>
    </tr>
</table>
                  