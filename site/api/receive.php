<?php
$validKey = "replace-with-your-key";

$key = $_GET["key"];
$pending = $_GET["pending"];
$available = $_GET["available"];

if ($key === $validKey) {
    $messages = json_decode(file_get_contents("stock.json"), true);
    $messages = array(array($pending, $available));
    file_put_contents("stock.json", json_encode($messages));
} else {
    http_response_code(403);
}
?>