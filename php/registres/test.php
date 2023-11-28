<?php
   //  using the browser url:  
   //  http://localhost/PHPexec.php?f=C:\Roma\Nebeans_repsol\Helico\public_html\php\sendscore.php

    
    include("../connect.php");//contains all passwords.
       

    //  vars per una nova clase
        $data_inici = "0000-00-00";
        $nom = "test";
        $clau = "test";
        $data_caducitat = "0000-00-00";
        
//        $fecha_cita = str_replace("/","-",$fecha_cita);
//        $arr = explode("/", $dia_clase);
//        $dia_clase = $arr[2] . "-" . $arr[1] . "-" . $arr[0];

        
        
echo "<br>";
   
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
     $error="";
    //new cita into reservas
 
 $sql = "INSERT INTO claus (data_inici, nom, 
     clau, data_caducitat)
VALUES ('" . $data_inici . "', '" . $nom .
         "', '" . $clau . "', '" . $data_caducitat . "')";
 
 
    if ($conn->query($sql) === TRUE) {
        
        echo "<br>Linia afegida a claus correctament";
      } else {
          $error = "error";
       exit("<br>Error afegint linia a claus: " . $conn->error);
      }

      
      
      

    $conn->close();
//}
 ?>

<html>
    <head>
       <link rel="icon" type="image/x-icon" href="/w3images/favicon.png">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/w3css/4/w3.css">
        <link rel="stylesheet" href="/lib/w3-theme-black.css">

        <link rel="stylesheet" href="/w3css/font-awesome.min.css">
        <link rel="stylesheet" href="/w3css/4/fonts.css">
        <head>
    <title>Clau registrada</title>
   <link rel="stylesheet" href="/css/slideformw3.css">
    <!--<link rel="stylesheet" href="css/calform.css">-->
    <style>
        body {font-family: Pier}
    </style>
           <script src="/js/print_form.js"></script>

            <script  href="/js/print_form.js"</script>

    

    
     

    </head>
    <body onload="">
        
        <div class="w3-bar w3-teal w3-top">
            <a href="/registrar/registra_clau.html" class="w3-bar-item w3-button">Regsitra una clau</a>
        </div>
        <br>
        <br>
       <h3 class="w3-center w3-text-black">
                  <i class="fa fa-home w3-margin-right" ></i>
                  Clau registrada <b>NEM</b></h3>

        


<form id="regForm" action="" method="post" >
   <h1>Detalls de la clau:</h1>
  <!-- One "tab" for each step in the form: -->

  
  
       <div id="wrapper">
    <p> <label for="cars">Data inici</label> 
        <input  id="data_inici" placeholder="data inici..."  oninput="this.className = ''" name="data_inici" 
               type="date" readonly value="<?php echo $data_inici ?>"></p>
        </div>
       
       <p>  <label for="cars">Nom:</label> 
           <input name="nom" id="nom" placeholder="Maria Maldalev" type="text" 
                  value="<?php echo $nom ?>" readonly>
       
       <p>  <label for="cars">Clau:</label> 
           <input name="clau" id="clau" placeholder="mariamaldalev..." 
                  type="text"  readonly value="<?php echo $clau ?>">
               

  </p>

  

  <p> <label for="cars">Data caducitat</label> 
        <input  id="data_caducitat" placeholder="data inici..."  
                name="data_caducitat" 
               type="date" readonly value="<?php echo $data_caducitat ?>"></p>
  




  
     

  
     <button onclick="printPage()"><i class="fa fa-print-o"></i> Imprimir</button>


  
  

</form>

 
      
      
    
    </body>
    
    <script>
       
    </script>




    <script>
       document.getElementById("regForm").reset(); 
    </script>

    
</html>