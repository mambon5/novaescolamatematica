<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getmateries($table) {     
    $sql = "SELECT materia, descripció FROM $table";
    global $conn;
   $result=mysqli_query($conn,$sql );
   $json = array();
   while($row = mysqli_fetch_assoc($result))     
    {
       $json[]= array(
          'materia' => $row['materia'],
          'descripcio' => $row['descripció']
       );
   }

   $jsonstring = json_encode($json);
   return $jsonstring;
}

function getnivells($table) {     
    $sql = "SELECT nivell, descripció FROM $table";
    global $conn;
   $result=mysqli_query($conn,$sql );
   $json = array();
   while($row = mysqli_fetch_assoc($result))     
    {
       $json[]= array(
          'nivell' => $row['nivell'],
           'descripcio' => $row['descripció']
       );
   }

   $jsonstring = json_encode($json);
   return $jsonstring;
}

$materies =  getmateries("materies");
$nivells =  getnivells("nivells");


?>