<?php
   //  using the browser url:  
   //  http://localhost/PHPexec.php?f=C:\Roma\Nebeans_repsol\Helico\public_html\php\sendscore.php

    
    include("../connexion_base.php");//contains all passwords.
    include("../getmateries.php");//contains functions for profes and students   

    //  vars per una nova clase
        $materia = $_POST['materia'];
        $descripcio = $_POST['descripcio'];

        
//        $fecha_cita = str_replace("/","-",$fecha_cita);
//        $arr = explode("/", $dia_clase);
//        $dia_clase = $arr[2] . "-" . $arr[1] . "-" . $arr[0];
               




 $sql = "INSERT INTO materies (materia, descripció)
VALUES ('" . $materia . "', '" . $descripcio .
         "')";
 
 echo "<br>";
    if ($conn->query($sql) === TRUE) {
        
        echo "<br>Linia afegida a matèries correctament";
      } else {
          $error = "error";
       exit("<br>Error afegint linia a materies: " . $conn->error);
      }

      
      
      

    $conn->close();
//}
 ?>


<!DOCTYPE html>
<!--img data url for logo <img src="data:image/png;base64,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" alt="" />-->
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <link rel="icon" type="image/x-icon" href="/w3images/favicon.png">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/w3css/4/w3.css">
        <link rel="stylesheet" href="/lib/w3-theme-black.css">

        <link rel="stylesheet" href="/w3css/font-awesome.min.css">
        <link rel="stylesheet" href="/w3css/4/fonts.css">
        <head>
    <title>Registra clases</title>
   <link rel="stylesheet" href="/css/slideformw3.css">
    <!--<link rel="stylesheet" href="css/calform.css">-->
    <style>
        body {font-family: Pier}
    </style>
   
    
          <script src="/js/print_form.js"></script>

   
    <script>
        var materia = <?php echo $materia?>;
        var descripcio = <?php echo $descripcio?>;
        
    </script>
    
     

    </head>
    <body onload="">
        
        <div class="w3-bar w3-teal w3-top">
            <a href="/registrar/registrar_materies.php" class="w3-bar-item w3-button">
                Regsitra una altra materia</a>
        </div>
        <br>
        <br>
       <h3 class="w3-center w3-text-black">
                  <i class="fa fa-home w3-margin-right" ></i>
                  Matèria registrada <b>NEM</b></h3>

        


<form id="regForm" action="" method="post" >
  <h1>Detalls de la materia:</h1>
  <!-- One "tab" for each step in the form: -->
 
  
  <p>  <label for="cars">Materia:</label> 
           <input readonly name="materia" id="materia" onclick="deleteinvalid(this)"
                  value="<?php echo $materia ?>">

  </p>
  <p>  <label for="cars">Descripció:</label> 
           <input readonly name="descripcio" id="descripcio" onclick="deleteinvalid(this)"
          value="<?php echo $descripcio ?>">

  </p>
  
  
     <button onclick="printPage()"><i class="fa fa-print-o"></i> Imprimir</button>


  
  

</form>

 
      
      
    
    </body>
    
    <script src="/js/slidformw3.js"></script>
    <script>
       
    </script>




    <script>
       document.getElementById("regForm").reset(); 
    </script>

    
</html>
