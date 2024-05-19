<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;


$host = '127.0.0.1';
$port = 9999;

// Create a new socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// Bind the socket to an address and port
socket_bind($socket, $host, $port);
echo "Server started on $host:$port\n";
// Listen for incoming connections
socket_listen($socket);

do {
    $client = socket_accept($socket);
    $data = socket_read($client, 1024);


    $data = trim($data);
    echo "Client says: $data\n";
    // if the client sends 'changeCode', generate a new qr code
    if ($data == 'changeCode') {
        // refresh page qr
        event('changeCode');
    }
} while (true);
//socket_close($client, $socket);
