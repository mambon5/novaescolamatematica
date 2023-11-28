<?php
   //  using the browser url:  
   //  http://localhost/PHPexec.php?f=C:\Roma\Nebeans_repsol\Helico\public_html\php\sendscore.php

    
  
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


function getrows($table, $columns) {
    $text = $columns[0];
    
    for ($i = 1; $i < count($columns); $i++) {
       $text = $text . ", " . $columns[$i];
    }
    
    $sql = "SELECT " . $text . " FROM " . $table;
    global $conn;
   $result=mysqli_query($conn,$sql );
   $json = array();
   $j = 0;
   while($row = mysqli_fetch_assoc($result))     
    {       
        for ($i = 0; $i < count($columns); $i++) {
            $index = $columns[$i];
            $json[$j][$index] = $row[$index];
        }
    ++$j;
//       $json[]= array(
//          'nom' => $row['nom'],
//       
//       );
   }

   $jsonstring = json_encode($json);
   return $jsonstring;
}
$columns = array("clau", "nom", "data_caducitat");
$claus = getrows("claus", $columns);
$valclaus = get_valid_claus();
$columns = array("dia", "temps", "desplaçament", "cafe", "nom_profe",
    "nom_alumne", "comentari", "pagada_by_client", "pagada_to_profe");
$clases = getrows("registre_clases", $columns);
$columns = array("id_pago", "diners", "hores", "nom_pagador", "nom_profe",
    "nom_alumne", "comentari", "codi", "viatges", "pag_rebut");
$pagos = getrows("pagaments_clases", $columns);






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
