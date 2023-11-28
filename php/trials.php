<?php


include("connect.php");//contains all passwords.

$conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

$now = new DateTime("now");
$tomo = new DateTime("2020-12-6");
$interval = $now -> diff($tomo);
echo  $interval -> y ;

echo "<br><br>";

$sql = "SELECT nom, cognom, dni FROM clientes";
$result = $conn->query($sql);

$array =  $result -> fetch_all(MYSQLI_ASSOC);

$result->free();	

	$noms = array_column($array, 'nom');
	$dnis = array_column($array, 'dni');
	$cogns = array_column($array, 'cognom');

echo sizeof($noms);

echo  "<br>" . $noms[0] . "<br>";

if(in_array( $dnis[0], $dnis)) echo "concideix";
else echo "no";

//if ($result->num_rows > 0) {
//  // output data of each row
//  while($row = $result->fetch_assoc()) {
//    echo "nom: " . $row["nom"]. " - Cognom: " . $row["cognom"]. " " . $row["dni"]. "<br>";
//  }
//} else {
//  echo "0 resultats";
//}

//$string = 'my domain name is website3.com';
//foreach ($owned_urls as $url) {
//    //if (strstr($string, $url)) { // mine version
//    if (strpos($string, $url) !== FALSE) { // Yoshi version
//        echo "Match found"; 
//        return true;
//    }
//}
//echo "Not found!";
//return false;

$dni = "48097133q";
$fecha_cita = "2021-12-29";
$hora_cita = "19:30";
$sql = "SELECT id FROM reservas WHERE dni='". $dni. "' AND fecha_cita='" . $fecha_cita . 
            "' AND hora_cita='" . $hora_cita . "'";

//           echo "comando: " . $sql;

             $result = $conn->query($sql);

                $array =  $result -> fetch_all(MYSQLI_ASSOC);
                $result->free();	
                $id = array_column($array, 'id');
                
                if(count($id)>1) {
                                exit("Error. Has reservat més d'una cita a la mateixa hora.");
                            } elseif(count($id)<1) {
                                exit("Error. Cita no trobada.");
                            }
                $id = $id[0];
                echo "<br> id cita: " . $id;

                echo strtolower("4792Qo");
                
    //this selects all future dates            
    $sql = "SELECT fecha_cita, hora_cita FROM reservas WHERE fecha_cita > curdate()";
    $result = $conn->query($sql);
    
    $array =  $result -> fetch_all(MYSQLI_ASSOC);
    $result->free();	
            $data = array_column($array, 'fecha_cita');
            $hora = array_column($array, 'hora_cita');
//            echo "num de files agafades: " . count($dnib) . "<br>";
            if(count($dnib)>1) {
                
                exit("Error. més d'una reserva amb ell mateix id.");
            } elseif(count($dnib)<1) {
                exit("Error. Cap reserva amb el mateix id.");
            }
    $dnib = $dnib[0];
    $data = $data[0];
    $hora = $hora[0];
?>