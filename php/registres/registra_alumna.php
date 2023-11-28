<?php
   //  using the browser url:  
   //  http://localhost/PHPexec.php?f=C:\Roma\Nebeans_repsol\Helico\public_html\php\sendscore.php

    
    include("../connect.php");//contains all passwords.
       

    //  vars per una nova clase
        $data_inici = $_POST['data_inici'];
        $nom = $_POST['nom'];
        $acronim = $_POST['acronim'] . rand(0,100);;
        $email = $_POST['email'];
        $telefon = $_POST['telefon'];
        $adreça = $_POST['adreça'];
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
 
 $sql = "INSERT INTO alumnes (data_inici, nom, 
     acronim, email, telefon, adreça)
VALUES ('" . $data_inici . "', '" . $nom .
         "', '" . $acronim . "', '" . $email . "', '" . $telefon . 
         "', '" . $adreça . "')";
 
 
    if ($conn->query($sql) === TRUE) {
        
        echo "<br>Linia afegida a alumnes correctament";
      } else {
          $error = "error";
       exit("<br>Error afegint linia a alumnes: " . $conn->error);
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
    <title>Alumna registrada</title>
   <link rel="stylesheet" href="/css/slideformw3.css">
    <!--<link rel="stylesheet" href="css/calform.css">-->
    <style>
        body {font-family: Pier}
    </style>
   
    <script src="/js/print_form.js"></script>

<!--     for JQuery date picker 
    <script src="../js/JQuery/jquery-3.6.0.min.js"></script>
    <script src="../js/JQuery/jquery-ui-1.13.0.custom/jquery-ui.js"></script>
    <link rel="stylesheet" href="/js/JQuery/jquery-ui-1.13.0.custom/jquery-ui.css">
    <link rel="stylesheet" href="../js/JQuery/jquery-ui-1.13.0.custom/jquery-ui.theme.css">
    
    <script src="../js/demanar_cita.js"></script>
    <script src="/js/print_form.js"></script>
     <script type="text/javascript" src="js/profes.json"></script>
    -->
   
    

    
     

    </head>
    <body onload="">
        
        <div class="w3-bar w3-teal w3-top">
            <a href="/registrar/registra_alumne.html" class="w3-bar-item w3-button">Regsitra una alumna</a>
        </div>
        <br>
        <br>
       <h3 class="w3-center w3-text-black">
                  <i class="fa fa-home w3-margin-right" ></i>
                  Alumna registrada <b>NEM</b></h3>

        


<form id="regForm" action="" method="post" >
   <h1>Detalls de l'alumne:</h1>
  <!-- One "tab" for each step in the form: -->

  
  
       <div id="wrapper">
    <p> <label for="cars">Data inici alumna</label> 
        <input  id="data_inici" placeholder="data inici..."  oninput="this.className = ''" name="data_inici" 
               type="date" readonly value="<?php echo $data_inici ?>"></p>
        </div>
       
       <p>  <label for="cars">Nom i cognoms:</label> 
           <input name="nom" id="nom" placeholder="Maria Maldalev" type="text" 
                  value="<?php echo $nom ?>" readonly>
       
       <p>  <label for="cars">Acrònim:</label> 
           <input name="acronim" id="acronim" placeholder="mariamaldalev..." 
                  type="text"  readonly value="<?php echo $acronim ?>">
               

  </p>

  

  <p>   
  <label for="cars">Email:</label> 
           <input name="email" id="email" type="email" 
                  value="<?php echo $email ?>" multiple readonly>
  </p>
  
  <p>  <label for="cars">Telèfon:</label> 
    <input name="telefon" id="telefon" type="number" 
           value="<?php echo $telefon ?>" readonly>
</p>

<p>  <label for="cars">Adreça:</label> 
    <input name="adreça" id="adreça" type="text" 
           value="<?php echo $adreça ?>" readonly>
</p>


  
     

  
     <button onclick="printPage()"><i class="fa fa-print-o"></i> Imprimir</button>


  
  

</form>

 
      
      
    
    </body>
    
    <script src="/js/slidformw3.js"></script>
    <script>
       
    </script>



<!--    <script src="../js/demanar_cita.js"></script>-->

    <script>
       document.getElementById("regForm").reset(); 
    </script>
<!--         <script type="text/javascript" src="../js/profes.js"></script>-->

    
</html>
