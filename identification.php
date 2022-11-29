<?php

$dsn = "mysql:dbname=etu_pcerello;host=info-titania";
$user = 'pcerello';
$password = 'c2QL5AU3';
$pdo = new PDO($dsn, $user, $password);
$pdo->query('SET CHARSET UTF8');



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['email'])  && isset($_POST['password'])){
        $sql = "SELECT email, password FROM user where email LIKE :email AND password LIKE  :password";
        $query = $pdo->prepare($sql);
        
        $query->execute(['email' => $_POST['email'],  'password' => $_POST['password']]);
            if ($query -> fetch()){
                session_start();
                if (isset($_SESSION['user'])) {
                    echo "Bienvenue ".$_SESSION['user']."!";
                } else {
                    header('location: login.php');
                }
            }else{
                echo "Erreur de connexion";
            } 
    }
}else{
    echo "<br>";
    echo "<h1>Connexion :</h1>";
    echo "<br>";
    echo "<form method=\"post\">";
    echo "Email : ";
    echo "<input type=\"text\" name=\"email\" />";
    echo "<br>";
    echo "Password : ";
    echo "<input type=\"password\" name=\"password\" />";
    echo "<br>";
    echo "<input type=\"submit\" value=\"Connexion\" /><br />";
    echo "</form>";
}
