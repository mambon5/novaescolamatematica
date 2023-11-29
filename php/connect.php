<?php
$servername = "";
$username = "";     
$password = "";            
$database = "";

$host =  gethostname();
$findme   = 'ddns';
$webhost = strpos($host, $findme);

if($webhost) { //working on 000webhost
    $servername = "insegur.ddns.net ";
    $username = "escolamat";      
    $password = "uasdfhLLAD=90-2";              
    $database = "nescolamatem";
}
else { // I bet working on my local computer
    $servername = "localhost";
    $username = "escolamat";      // id17956688_roma
    $password = "uasdfhLLAD=90-2";              //N^We_?4QtnVu+)!O
    $database = "nescolamatem";    // id17956688_dadesnem

} 
      