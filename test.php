<?php

	require __DIR__ . '/../vendor/autoload.php';
	use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version1X;



    $client = new Client(new Version1X('http://localhost:3000'));
    $client ->initialize();
    $client ->emit('test', ['message' => 'Message émis depuis PHP !']);
    $client ->close();
    echo "Voici la page de test";
?>