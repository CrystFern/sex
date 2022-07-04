<?php
 include('sambungan.php');
 include("uruseia_menu.php");

 if (isset($_POST["submit"])){
    $namajadual = $_POST['namatable'];
    $namafail = $_FILES['namafail']['name'];

    $sementara = $_FILES['namafail']['tmp_name'];
    move_uploaded_file(sementara, $namafail);

    $fail = fopen($namafail, "r");
    while (!feof($fail)){

           $medan = explode(",', fgets($fail));
           
           $berjaya = false;

           if (strolower($namajadual) === "peserta"){
               $nokp = $medan[0];
               $password = $medan[1];
               $namapeserta = $medan[2];
               $telefon = $medan[4];
               $idhakim = $medan[4];
               $idurusetia = trim($medan[5]);
  
               $sql = "insert into peserta values('$nokp', '$password', '$namapeserta'
                      '$telefon', '$idhakim', '$idurusetia')";
               if (mysqli_query($sambungan, $sql))
                    $berjaya = true;
               else 
                  echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
           }//tamat if

           if (strolower($namajadual) === "hakim') {

                $idhakim = $medan[0];
                $namahakim = $medan[1];
                $password = trim($medan[2]);
                $sql = "insert into soalan values('$idhakim', $namahakim', '$password')";

                if (mysqli_query($sambungan, $sql))
                     $berjaya = true
                else
                   echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
           }//tamat if
      }//tamat while
      
      if($berjaya == true)
         echo "<script>alert('Rekod berjaya di import');</script>";
      else
         echo "<script>alert('Rekod tidak berjaya di import');</script>";
      mysqli_close($sambungan);
   }
?>