<?php
    session_start();
    include('sambungan.php');
    include("hakim_menu.php");
?>

<html>
<link rel="stylesheet" href="senarai.css">
<link rel="stylesheet" href="button.css">

<body>
<table>
<caption>SENARAI PESERTA MENGIKUT HAKIM</caption>
    
<?php
    $nama = $_SESSION["nama"];
    $idhakim = $_SESSION['idpengguna'];
    
    $kepala = " <tr> <th>Bil</th>
                    <th>Nama</th>";
    
    $sql = "select * from penilaian order by idpenilaian asc";
    
    $data = mysqli_query($sambungan, $sql);
    while ($penilaian = mysqli_fetch_array($data)) {
        $kepala = $kepala."<th>".$penilaian['aspek']."</th>";
    }
    $kepala = $kepala."<th>Jumlah</th></tr>";
    
    echo $kepala;
    $bil = 1;
    $sql = "select * from keputusan
    join peserta on keputusan.nokp = peserta.nokp
    join penilaian on keputusan.idpenilaian = penilaian.idpenilaian
    join hakim on peserta.idhakim = hakim.idhakim where hakim.idhakim = '$idhakim'
    order by keputusan.jumlah desc, penilaian.idpenilaian asc   ";
    
    $data = mysqli_query($sambungan, $sql);
    $a = 1;
    $bil = 1;
    while ($keputusan = mysqli_fetch_array($data))
         { if ($a == 1)
            echo "<tr>
            <td>".$bil."</td>
            <td>".$keputusan['namapeserta']."</td>";
        
        if ($a < 6)
            echo "<td>".$keputusan['markah']."</td>";
        
        $a = $a + 1;
                if ($a == 6) {
            echo "<td>".$keputusan['jumlah']."</td>
                    </tr>";
            $a = 1;
            $bil = $bil + 1;
                } 
} // tamat while
?>
</table>
</body>
</html>