<?php
//php2 enviar correo2 prueba 1 editable
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/PHPMailer.php";
require "PHPMailer/Exception.php";
require "PHPMailer/SMTP.php";
//Load Composer's autoloader
//require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    if(isset($_POST['enviar'])){

        $name=$_POST['nombre'];
         $apellido=$_POST['apellido'];
        $involucrado1=$_POST['involucrado1'];
        $involucrado2=$_POST['involucrado2'];
        $involucrado3=$_POST['involucrado3'];
        $puesto1=$_POST['puesto1'];
       $puesto2=$_POST['puesto2'];
       $puesto3=$_POST['puesto3'];
       $contacto=$_POST['contacto'];
     
      $path = 'subir/' . $_FILES["filetoshiko"]["name"];
	move_uploaded_file($_FILES["filetoshiko"]["tmp_name"], $path);
        
        
       $detallehecho=$_POST['detallehecho'];
  
     $datospersonales="Nombre ".$name." ".$apellido;
       $involucrados="Involucrados  "."<br>". "Involucrado 1 ".$involucrado1." puesto"." ".$puesto1."/  Involucrado 2 ".$involucrado2." puesto ".$puesto2 ."/ Involucrado 3  ".$involucrado3." puesto ".$puesto3;
        $asunto=$detallehecho." ".$contacto;
    
        //server 

         //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'toshikodenuncias@gmail.com';                    //SMTP username
    $mail->Password   = 'ttfjvsokrxuhsrix';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`  ENCRYPTION_SMTPS

    //Recipients
    $mail->setFrom('denuncias.grupotoshiko@gmail.com', 'FORMULARIOS SUGERENCIAS O DENUNCIAS');
    //$mail->addAddress('jeusebio@toshiko.com.pe', 'Eduardo User');      //Add a recipient 
    //$mail->addAddress('denuncias.grupotoshiko@gmail.com');      //Name is optional
    //$mail->addAddress('cbaldeon@toshiko.com.pe');
    $mail->addAddress('oluna@toshiko.com.pe');    
    $mail->addAddress('jeusebio@toshiko.com.pe');    
    $mail->AddAttachment($path);
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject ='LIBRO QUEJAS Y SUGERENCIAS';
    $mail->Body    = "<!DOCTYPE html><html lang='es'><body>    
    <header>
      <h1>Formulario Denuncia Sugerencia</h1>      
    </header>    
     <section>      
      <article>
        <h2>CONTENIDO PRINCIPAL</h2>
        <p>Formulario  Denuncia o sugerencias .</p>
        <p>Datos Personales</p>".$datospersonales."<p>Involucrados</p>".$involucrados."<p>Asunto</p>".$asunto."
        <div>
          
                  
        </div>
      </article>      
    </section>
     <footer> 
    </footer>
  </body>  
</html>";
    $mail->AltBody = 'TEXTO non-HTML mail clients';

    $mail->send();
    
     echo "<script>location.href='http://www.toshiko.com.pe/index.html';</script>";
die();
    }

    
     else{
         echo "<script>location.href='http://www.toshiko.com.pe/index.html';</script>";
die();
     }
     
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
