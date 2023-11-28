<?php
   //  using the browser url:  
   //  http://localhost/PHPexec.php?f=C:\Roma\Nebeans_repsol\Helico\public_html\php\sendscore.php


function match_cols_to_vals_sql( $wherec="",$wherev="") { //two arrays one of cols ano
    //ther of values, all columns must match the values
    $n = count($wherec);
    if($n != count($wherev) or $n <1) {
        exit("error, el número de columns en el WHERE i de valors no coincideixen");
    }
    $col = $wherec[0];
    $val = $wherev[0];
    $condition = $col . "='" . $val . "'";
    for($i = 1; $i < $n ; $i++){
        $col = $wherec[$i];
        $val = $wherev[$i];
        $condition = $condition . " AND " . $col . "='" . $val ."'";
    }
    return $condition;
}
 
function sel_query($array, $table, $wherec="",$wherev="") {
    $camps = implode(", ", $array);
     
    $sql = "SELECT " . $camps ." FROM " . $table;
    if($wherec != "") {        
       $condition = match_cols_to_vals_sql( $wherec,$wherev);
       $sql = $sql . " WHERE " . $condition;
    }
    return $sql;
}

function get_elements($array, $table, $condition = "") {   
    //wherec stands for where columns, and wherev stands for where values.

    $camps = implode(", ", $array);
     
    $sql = "SELECT " . $camps ." FROM " . $table . " " . $condition; // get sql query
    
   
    global $conn;
    $result=mysqli_query($conn,$sql );
    $json = array();
    while($row = mysqli_fetch_assoc($result))     
     {
        $json[]= $row;
    }

    $jsonstring = json_encode($json);
    return $jsonstring;
}

function get_clases_4person($cols,$acronim) {
     $condition = "WHERE nom_alumne = '".$acronim . "' OR nom_profe= '" . $acronim . "'";
     $clases =  get_elements($cols, "registre_clases", $condition);
     return $clases;
}

function acronim($acro) {
    global $acros;
    $res = in_array($acro, $acros);
       
    return $res;
}

$arr = array("data_inici", "data_caducitat",
     "acronim", "horari");
$horaris =  get_elements($arr, "disponibilitat");
$arr = array("nom", "acronim");
$alumnes =  get_elements($arr, "alumnes");
$arr = array("materia", "descripció");
$materies =  get_elements($arr, "materies");
$arr = array("nom", "acronim");
$profes =  get_elements($arr, "profes");
$arr = array("nom", "acronim");
$pagadors =  get_elements($arr, "pagadors");
$arr = array("id_clase","dia", "temps", "desplaçament", "cafe", "nom_profe", "nom_alumne", 
    "comentari", "pagada_by_client", "pagada_to_profe");
$clases =  get_elements($arr, "registre_clases");
//$arr = array("diners", "hores","nom_pagador","nom_profe","nom_alumne");
//$pagadors =  get_elements($arr, "pagadors");
$persones = array_merge(json_decode($profes),json_decode($alumnes));
$persones = json_encode($persones);

$acroprof = array_column(json_decode($profes), 'acronim');
$acroal = array_column(json_decode($alumnes), 'acronim');
$acros = array_merge($acroprof, $acroal);
?>
