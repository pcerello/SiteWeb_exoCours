<a href="index.php">Accueil</a>
<?php

$dsn = "mysql:dbname=etu_pcerello;host=info-titania";
$user = 'pcerello';
$password = 'c2QL5AU3';
$pdo = new PDO($dsn, $user, $password);
$pdo->query('SET CHARSET UTF8');



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['country'])){
        $sqlPays = "SELECT id FROM country where name like :country";
        $sql = "INSERT INTO user (name, email, password, country_id, admin) values (:name, :email, :password, :country, :admin)";
        $queryPays = $pdo->prepare($sqlPays);

        if ($_POST['admin'] == "on"){
            $_POST['admin'] = 1;
        }else{
            $_POST['admin'] = 0;
        }
        if ($queryPays->execute(['country' => $_POST['country']])){
            $id = $queryPays->fetch()[0];
            $query = $pdo->prepare($sql);
            if ($query->execute(['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password'], 'country' => $id, 'admin' => $_POST['admin']])){
                echo "Vous êtes bien inscrit !";
            }else{
                echo "Erreur d'inscription";
            }
        }else{
            echo "Erreur d'inscription";
        }
       
        
    }
}else{
    echo "<br>";
    echo "<h1>User registration :</h1>";
    echo "<br>";
    echo "<form method=\"post\">";
    echo "Name : ";
    echo "<input type=\"text\" name=\"name\" />";
    echo "<br>";
    echo "Email : ";
    echo "<input type=\"text\" name=\"email\" />";
    echo "<br>";
    echo "Password : ";
    echo "<input type=\"password\" name=\"password\" />";
    echo "<br>";
    echo "Country : ";
    echo "<input type=\"text\" name=\"country\" />";
    echo "<br>";
    echo "Admin : ";
    echo "<input type=\"checkbox\" name=\"admin\" /> ?";
    echo "<br>";
    echo "<input type=\"submit\" value=\"Register\" /><br />";
    echo "</form>";
}
