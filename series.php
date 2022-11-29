<a href="index.php">Accueil</a>
<?php
class Series{
    public $title;
    public $poster;
    public $id;
    public function _get($name){
        return $this->{$name};
    }
}
$dsn = "mysql:dbname=etu_pcerello;host=info-titania";
$user = 'pcerello';
$password = 'c2QL5AU3';
$pdo = new PDO($dsn, $user, $password);
$pdo->query('SET CHARSET UTF8');


/*$sql = "SELECT title FROM series WHERE title LIKE 'L%'";
$query = $pdo->query($sql);
foreach ($query as $row) {
    echo 'Nom : ' . $row['title']. "<br>";
}*/



if (isset($_POST['title'])){
    echo "<br>";
    echo "<h1>Recherche de séries par initiale :</h1>";
    echo "<br>";
    echo "<form method=\"post\">";
    echo "<input type=\"text\" name=\"title\" />";

    echo "<input type=\"submit\" value=\"Rechercher\" /><br />";
    echo "</form>";

    $sql = "SELECT title, id, poster FROM `series` WHERE series.title like :title";
    $query = $pdo->prepare($sql);
    $query->setFetchMode(PDO::FETCH_CLASS, "Series");
    if ($query->execute(['title' => $_POST['title']. "%"])){
        foreach ($query as $row) {
            echo 'Nom : <a href="number.php?serie=' . $row->id . '">' . $row->title. "</a><br>";
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row->poster).'"/><br>';
            
        }
    }
}
else{
    echo "<br>";
    echo "<h1>Recherche de séries par initiale :</h1>";
    echo "<br>";
    echo "<form method=\"post\">";
    echo "<input type=\"text\" name=\"title\" />";

    echo "<input type=\"submit\" value=\"Rechercher\" /><br />";
    echo "</form>";
}
