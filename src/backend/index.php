<?php

require __DIR__ . '/vendor/autoload.php';

$http = new React\Http\HttpServer(function (Psr\Http\Message\ServerRequestInterface $request) {
	$path = str_replace("/api/", "/", $request->getUri()->getPath());
	$api = __DIR__ . "/models$path.php";
    return React\Http\Message\Response::json(
        file_exists($api) ? include $api : ["error" => "Cannot GET $path"]
    );
});

$port = $argv[1];
$socket = new React\Socket\SocketServer("127.0.0.1:{$port}");
$http->listen($socket);

echo "Server running at http://127.0.0.1:{$port}" . PHP_EOL;
