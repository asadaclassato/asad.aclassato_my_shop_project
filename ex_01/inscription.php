<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class = "container row">
    <div class = "col-md-3"></div>
        <div class="form-group mt-4 col-md-6">
         <label for="">Nom</label>
        <input type="text" name="name" class = "form-control" placeholder = "name" required><br><br>
        <label for="">Email</label>
        <input type="email" name="email" id="" class = "form-control" placeholder = "email" required><br><br>
        <label for="">Password</label>
        <input type="password" name="password" id="" class = "form-control" placeholder = "password" required><br><br>
        <label for="">Password confirmation</label>
        <input type="password" name="password_verification" id="" class = "form-control" placeholder = "password_verification" required><br>
        <button type="submit" class = "form-control bg-success">Submit</button>
        </div>
        <div class = "col-md-3"></div>
        </div>
        
    </form>

<?php
$host = "localhost";
$db = "bootstrap";
$username = "masad";
$password = "pass";
$thename = $_POST['name'];

$themail = $_POST['email'];



try{
if($_POST['password'] !== $_POST['password_verification']){
    throw new Exception ("Erreur de correspondance");
}
else {
    $salt = uniqid();
    $thepassword = $_POST['password'];
}
/*test*/
if($thename==NULL||$themail==NULL||$thepassword==NULL || trim($thename)==NULL || trim($thepassword) == NULL){
    
        throw new Exception ("Erreur de paramètres");
        
}else{
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$result = $conn->prepare("INSERT INTO users (nom,email,password,created_at) values (?,?,?,?)");
$test = $result -> execute(array($thename,$themail,$thepassword,date('y.m.d')));
            echo '<div class="alert alert-success" role="alert">User created !</div>';
}
} catch(Exception $e){
    file_put_contents("errors.log", $e->getMessage(). " stored in ". $e->getfile()."\n", FILE_APPEND); 
     echo '<div class="alert alert-danger" role="alert">Error in creation!</div>';       
}

?>

</body>

</html>