<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form  method="post" action="index.php">
        <div class = "container row">
    <div class = "col-md-3"></div>
        <div class="form-group mt-4 col-md-6">
        <label for="">Email</label>
        <input type="email" name="email" id="" class = "form-control" placeholder = "email" required><br><br>
        <label for="">Password</label>
        <input type="password" name="password" id="" class = "form-control" placeholder = "password" required><br><br>
        <button type="submit" class = "form-control bg-success">Submit</button>
        </div>
        <div class = "col-md-3"></div>
        </div>
        
    </form>
</body>
</html>
<?php
$host = "localhost";
$db = "bootstrap";
$username = "masad";
$password = "pass";

$themail = $_POST['email'];
$thepassword = $_POST['password'];

try{
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $resut = $conn->prepare("SELECT *FROM users WHERE email = ? AND password = ?");
    $resut->execute(array($themail, $thepassword));
    $keep = $resut->fetchAll(PDO::FETCH_ASSOC);

    if ($keep != NULL) {
            
            header("Location: index.php");
    } 
    }
 catch(Exception $e) {
file_put_contents("../ex_01/errors.log", $e->getMessage(). " stored in ". $e->getfile()."\n", FILE_APPEND); 
}
?>