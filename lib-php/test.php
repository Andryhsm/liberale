<?php
    
    session_start();
    
    require __DIR__ . '/../vendor/autoload.php';
    use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version1X;

    $email = $_SESSION["email"];
    
    echo $email;

    $client = new Client(new Version1X('http://localhost:3000'));
    $client ->initialize();
    $client ->emit('deconnexion', ['email' => $email]);
    $client ->close();
 //   echo "Voici la page de test";
    
    
?>