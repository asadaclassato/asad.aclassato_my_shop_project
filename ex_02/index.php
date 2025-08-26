<?php
$host = "localhost";
$db = "bootstrap";
$username = "masad";
$password = "pass";

$conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);

echo $_POST['email'];

$resut = $conn->prepare("SELECT nom FROM users WHERE email = ?");
    $resut->execute(array($_POST['email']));
    $keep = $resut->fetchAll(PDO::FETCH_ASSOC);
    var_dump($keep);
 echo "Hello";
?>