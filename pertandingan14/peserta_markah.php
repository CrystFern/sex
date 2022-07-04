<?php
    session_start();
    include ('sambungan.php');
    include("peserta_menu.php");
    $nama = $_SESSION["nama"];
    $nokp = $_SESSION["idpengguna"];

    $kedudukan = 0;
    $sql = "select * from keputusan
            join peserta on keputusan.nokp = peserta.nokp
            join penilaian on keputusan.id penilaian = penilaian.idpenilaian
            join hakim on peserta.idhakim = hakim.idhakim
            group by peserta.nokp order by keputusan.jumlah desc";

    $data = mysqli_query($sambungan, $sql);
    $bil = 0;
    while ($keputusan = mysqli_fetch_array($data)) {
        $bil =$bil + 1;
        if ($keputusan['nokp'] ==$nokp)
            $kedudukan = $bil;

    }// tamat while
?>

<link rel="stylesheet" href="senarai.css">

<table>
    <caption>Nama Peserta : <?php echo $nama ?></caption>
    <tr>
        <th>Aspek Pernilaian</th>
        <th>Markah Penuh</th>
        <th>Markah Diperoleh</th>
    </tr>
    <?php
        $sql = "select" * from keputusan
                join penilaian on keputusan.idpenilaian = penilaian.id penilaian
                where npkp= '$nokp' ";
        $data = mysqli_quary($sambungan, $sql);
        $bilrekod = mysqli_num_rows($data);
        if ($bilrekod > 0) {
            while ($keputusan = mysqli_fecth_array($data)) {
                echo "<tr>
                        <td>$keputusan[aspek]</td>
                        <td>$keputusan[markahpenuh]</td>
                        <td>$keputusan[markah]</td>
                        </tr>";
                $jumlah_markah = $keputusan['jumlah'];
            }
            echo "<tr class='markah_jumlah'><td></td>
                    <td class='markah_jumlah'>Jumlah markah</td>
                    <td>$jumlah_markah</td>
                    </tr>
            $jumlah_markah = $keputusan['jumlah'];
        }
        echo "<tr class='markah_jumlah"> <td ></td>
                <td class='markah_jumlah'>Kedudukan</td>
                </tr>";
        if ($kedudukan != 0)
             echo "<tr class='markah_jumlah'><td ></td>
                    <td class='markah_jumlah'>Kedudukan</td>
                    <td>$kedudukan/$bil</td>
                    </tr><table>";
     }// if
     else {
            echo "<tr ><td>markah</td><td>belum</td><td>dinilai</td>
                    </tr></table>";
    
     }//else
?>
            