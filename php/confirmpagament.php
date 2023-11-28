<?php
   //  using the browser url:  
   //  http://localhost/PHPexec.php?f=C:\Roma\Nebeans_repsol\Helico\public_html\php\sendscore.php
   
   

//if(isset($_POST['submit'])){

//if(1==1) {
//    echo "submit request sent to server";
    
    include("connect.php");//contains all passwords.
       
        
//        $fecha_reserva = $_POST['fecha_reserva']; // this is the sender's Email address

    //  vars for new cita
//        $fecha_cita = $_POST['fecha_cita'];
////        $fecha_cita = str_replace("/","-",$fecha_cita);
//        $arr = explode("/", $fecha_cita);
//        $fecha_cita = $arr[2] . "-" . $arr[1] . "-" . $arr[0];
        $horapag = $_POST["payment_date"];
        $email = $_POST['payer_email'];
        $dni = $_POST['receiver_id'];
        $name = $_POST['first_name'] . " " . $_POST['last_name'];        

        
        //vars for new client
//        dni,nom, cognom, email, tel, edat,	depen, 	tutor
       
    // Create connection
  
     $missatge="email : " . $email . ", nom: " . $name;
     echo $missatge;
    //new cita into reservas
     
 
// Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
     $error="";
    //new cita into reservas
 
 $sql = "INSERT INTO pagaments (LastName, 
     FirstName, email)
VALUES ('" . $name .
         "', '" . $dni . "', '" . $email . "')";
 

    if ($conn->query($sql) === TRUE) {
        
        echo "<br>Linia afegida a reserves correctament";
      } else {
          $error = "error";
       exit("<br>Error afegint linia a reserves: " . $conn->error);
      }

 

//}
 ?>


