<?php
class Series{
    public $serie;
    public $season;
    public $episode;
    public $idSerie;
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



if (isset($_GET['serie'])){
    echo "<br>";
    echo "<h1>Voici la liste de nombre de saison et d'épisode de la série :</h1>";
    echo "<br>";
   

    $sql = "SELECT series.id as idSerie, series.title as titleSerie, season.number as numberSeason, 
    COUNT(*) as numberEpisode FROM `series` INNER JOIN `season` on series.id = season.series_id 
    INNER JOIN `episode` on season.id = episode.season_id  WHERE series.id = :serie GROUP BY season.number";
    $query = $pdo->prepare($sql);
    $query->setFetchMode(PDO::FETCH_CLASS, "Series");
    if ($query->execute(['serie' => $_GET['serie']])){
        foreach ($query as $row) {
            echo 'Nom : ' . $row->titleSerie;
            echo ' numéro Saison : ' . $row->numberSeason;
            echo ' numéro episode : ' . $row->numberEpisode . "<br>";
        }
    }
}
else{
    echo "error";
}
