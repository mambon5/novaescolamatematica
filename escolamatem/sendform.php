<?php 
$resp="no respeonse";
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 $load = "false";
if(isset($_POST['submit'])){
    echo "submit sent";
       

//     require '../../PHPMailer-master/src/Exception.php';
//     require '../../PHPMailer-master/src/PHPMailer.php';
//     require '../../PHPMailer-master/src/SMTP.php';
    
    //online hosting
            require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
            require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
            require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

        $mail = new PHPMailer;
        $mail->isSMTP(); 
        // $mail->SMTPDebug = 2
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "mail.gandi.net"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is deprecated
        $mail->SMTPAuth = true;
        $mail->Username = 'contacto@nomadaquarela.world'; // email
        $mail->Password = 'Aquarela??22'; // password
        $mail->setFrom('contacto@nomadaquarela.world', 'Nomad Aquarela'); // From email and name
        
        $to = "newmathematicalschool@gmail.com"; // this is your Email address
        $from = $_POST['email']; // this is the sender's Email address
        $first_name = $_POST['name'];
        $phone = $_POST['phone'];
//         echo("informacio del email: " . $to . " " . $from . " " . $first_name );
        $subject = "Envio de formulario desde NEM";
        $subject2 = "Copia del envio del formulario";
        $message = " <i> " . $first_name . " </i> <br> con email <br> <i>" . $from . "</i> <br> y teléfono <br> <i>" . $phone . "</i> <br> ha escrito: <br> <i>"  . 
                $_POST['message'] . " </i>";
        $message2 = "Esta es una copia de tu mensaje. <br>" . $first_name . " con teléfono " . $phone . 
                " has escrito: <br> <i> " . $_POST['message'] . "</i>";


        $mail->addAddress($to, $first_name); // to email and name
        $mail->Subject = $subject;
        $mail->msgHTML($message); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
        if(!$mail->send()){
             echo "Mailer 1 Error: " . $mail->ErrorInfo;
            $resp = "error";
        }else{
             echo "Message 1 sent!";
             $resp ="triomf";
        }
        
        $mail->ClearAllRecipients(); //clear previously recorded recipients..
        $mail->addAddress($from, "Nomad Aquarela"); // to email and name
        $mail->Subject = $subject2;
        $mail->msgHTML($message2); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
        if(!$mail->send()){
//             echo "Mailer 2 Error: " . $mail->ErrorInfo;
                
        }else{
//             echo "Message 2 sent!";
           
        }
    $load="true";
    }
    
   
?>

<!DOCTYPE html>
<html>
<title>Escola de Mates</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3css/4/w3.css">
<link rel="stylesheet" href="lib/w3-theme-black.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="w3css/font-awesome.min.css">
<!--adding MATH jax for tex writing-->
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script>
    resposta = "<?php echo $resp ?>";
    console.log(resposta);
    
    function miraresp() {
        exit = document.getElementById("exit");
        fail = document.getElementById("fail");
    
        if(resposta=="triomf") exit.style.visibility="visible";
        else fail.style.visibility="visible";
    }
</script>
<body id="myPage" onload="miraresp()">




<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.html" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>NEM</a>

  
    
  <a href="tryw3css_templates_website.htm#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="tryw3css_templates_website.htm#team" class="w3-bar-item w3-button">Team</a>
    <a href="tryw3css_templates_website.htm#work" class="w3-bar-item w3-button">Work</a>
    <a href="tryw3css_templates_website.htm#pricing" class="w3-bar-item w3-button">Price</a>
    <a href="tryw3css_templates_website.htm#contact" class="w3-bar-item w3-button">Contact</a>
    <a href="tryw3css_templates_website.htm#" class="w3-bar-item w3-button">Search</a>
  </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="../w3images/tibidabo_3.jpg" alt="tibidabo" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS">Nova Escola Matemàtica</button>
  </div>
</div>

<!-- Modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Vols aprendre matemàtiques?</h4>
      <h5>Apunta't a les nostres clases <i class="fa fa-smile-o"></i></h5>
    </header>
    <div class="w3-container">
      <p>Les matemàtiques (i altres assignatures) s'haurien d'explicar diferent..</p>
      <p>Mira la resta de la nostra pàgina web per saber-ne més!</p>
    </div>
    <footer class="w3-container w3-teal">
      <p>Guiar en comptes d'instruir</p>
    </footer>
  </div>
</div>

<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
    <div id="resposta">
      <h2 id="exit" style="visibility:hidden"> Missatge enviat! </h2>
    <h2  id="fail"  style="visibility:hidden"> Error al enviar el missatge! Prova de nou </h2>
   
    </div>


<!-- Image of location/map -->
<img src="w3images/sat_fernandpoo.png" class="w3-image w3-greyscale-min" style="width:100%;">

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Segueix-nos</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook-official"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>Creat per <a href="http://romamasana.top" target="_blank">Romà</a></p>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Vés a dalt</span>   
    <a class="w3-button w3-theme-arrow" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>

