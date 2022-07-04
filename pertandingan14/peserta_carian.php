<?php
 include("urusetia_menu.php");
 include('sambungan.php');
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">CARIAN</h3>
<form class="panjang" action="peserta_carian2.php" method="post">
<table>
    <tr>
       <td>Nama Pelajar</td>
       <td>
        <select name="nokp">
           <?php
            $sql = "select * from peserta";
            $data = mysqli_query($sambungan, $sql);
            while ($peserta = mysqli_fetch_array($data)){
                echo "<option value='$peserta[nokp]'>$peserta[nokp] : 
                       $peserta[namapeserta]</option>";
            } //tamat while
        ?>
    </select>
 </td>
 </tr>
</table>
<button class="cari" type="submit">Search</button>
</form>