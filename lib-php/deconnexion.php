<?php
    session_start();
    
    require __DIR__ . '/../vendor/autoload.php';
    use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version1X;
    $type = $_SESSION["type"];
    $email = $_SESSION["email"];
  
    $client = new Client(new Version1X('http://localhost:3000'));
    $client ->initialize();
    $client ->emit('deconnexion', ['email' => $email]);
    $client ->close();
    session_destroy();
    
    header('location: ../login.html');
     
    exit;
    
?>