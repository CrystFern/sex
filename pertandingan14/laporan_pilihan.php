<?php  
    include("urusetia_menu.php") ;  
?> 
 
<html> 
       <link rel="stylesheet" href="borang.css"> 
       <link rel="stylesheet" href="button.css"> 
       <body> 
          <h3 class = "pendek">PILIHAN JENIS LAPORAN</h3> 
          <form class = "pendek" action="laporan_cetak.php" method="post">  
             <select id='pilihan' name='pilihan' onchange='papar_pilihan()'>  
             <option value=1>Senarai Keseluruhan</option> 
             <option value=2>Senarai Mengikut Hakim</option> 
               </select> <br> 
               <div id="hakim" style="display:none">      
               <select name="idhakim"> 
               <?php  
                 include('sambungan.php');  
                 $sql = "select*from hakim ";  
                 $data = mysqli_query($sambungan, $sql);  
                 while ($hakim = mysqli_fetch_array($data)) { 
                        echo"<option value='$hakim[idhakim]'>$hakim[namahakim]</option>"; 
                 } 
            ?>  
            </select> 
            </div> 
        <button class="papar"type="submit">Papar</button> 
    </form>  
<script> 
   function papar_pilihan(){ 
       var pilih = document.getElementById("pilihan").value;  
       if (pilih == 1) { 
         document.getElementById('hakim').style.display = 'none';  
       } 
       else if (pilih == 2) {  
          document.getElementById('hakim').style.display ='block'; 
       } 
    } 
</script> 
</body> 
</html>