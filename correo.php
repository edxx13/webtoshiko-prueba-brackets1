<?php
if(isset($_POST['enviar'])){

    $destino="j.balcazar.f@gmail.com";

    $name=$_POST['nombre'];

    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];

$asunto=$name." ".$apellido;

$header="From: noreply@example.com"."\r\n";
$header.="Reply-To: noreply@example.com"."\r\n";
$header.="X-Mailer: PHP/".phpversion();
     mail($destino,$asunto,$header);
    header("location:index.html");


}

?>