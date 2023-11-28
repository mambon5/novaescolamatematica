<?php
$servername = "";
$username = "";     
$password = "";            
$database = "";

$host =  gethostname();
$findme   = '000webhost';
$webhost = strpos($host, $findme);

if($webhost) { //working on 000webhost
    $servername = "localhost";
    $username = "id17956688_roma";      
    $password = "N^We_?4QtnVu+)!O";              
    $database = "id17956688_dadesnem";
}
else { // I bet working on my local computer
    $servername = "localhost";
    $username = "escolamat";      // id17956688_roma
    $password = "uasdfhLLAD=90-2";              //N^We_?4QtnVu+)!O
    $database = "nescolamatem";    // id17956688_dadesnem

} 
      