<?php
   //  using the browser url:  
   //  http://localhost/PHPexec.php?f=C:\Roma\Nebeans_repsol\Helico\public_html\php\sendscore.php

    
  
 
function getprofes() {     
    $sql = "SELECT nom, acronim FROM profes";
    global $conn;
   $result=mysqli_query($conn,$sql );
   $json = array();
   while($row = mysqli_fetch_assoc($result))     
    {
       $json[]= array(
          'nom' => $row['nom'],
        'acronim' => $row['acronim']
       );
   }

   $jsonstring = json_encode($json);
   return $jsonstring;
}

function getalumnes() {     
    $sql = "SELECT nom, acronim FROM alumnes";
    global $conn;
   $result=mysqli_query($conn,$sql );
   $json = array();
   while($row = mysqli_fetch_assoc($result))     
    {
       $json[]= array(
          'nom' => $row['nom'],
        'acronim' => $row['acronim']
       );
   }

   $jsonstring = json_encode($json);
   return $jsonstring;
}

function getpeople($table) {     
    $sql = "SELECT nom, acronim FROM $table";
    global $conn;
   $result=mysqli_query($conn,$sql );
   $json = array();
   while($row = mysqli_fetch_assoc($result))     
    {
       $json[]= array(
          'nom' => $row['nom'],
        'acronim' => $row['acronim']
       );
   }

   $jsonstring = json_encode($json);
   return $jsonstring;
}

function get_valid_claus() {     
    $sql = "SELECT nom, clau 
FROM claus
WHERE
data_caducitat > now()";
    global $conn;
   $result=mysqli_query($conn,$sql );
   $json = array();
   while($row = mysqli_fetch_assoc($result))     
    {
       $json[]= array(
          'nom' => $row['nom'],
        'clau' => $row['clau']
       );
   }

   $jsonstring = json_encode($json);
   return $jsonstring;
}

function getname($table, $acronim) {
    $sql = "SELECT nom 
FROM $table
WHERE
acronim='" . $acronim . "'";
    global $conn;
   $result=mysqli_query($conn,$sql );
   $json = array();
   while($row = mysqli_fetch_assoc($result))     
    {
       $json[]= array(
          'nom' => $row['nom'],
       
       );
   }

   $jsonstring = json_encode($json);
   return $jsonstring;
}

$profes =  getprofes();
$alumnes =  getalumnes();
$pagadors =  getpeople("pagadors");


//use the following uncommented functions on javascript to list the profes, alumnes
//and claus:
//
/*    var profes=<?php  echo $profes ?>;
      var alumnes=<?php  echo $alumnes ?>;
      var valclaus=<?php  echo $valclaus ?>; 

        json_to_select(profes,"acronim","nom","profes");
        json_to_select(alumnes,"acronim","nom","alumnes")
        json_to_select(valclaus,"nom","clau","valclaus")
*/
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
