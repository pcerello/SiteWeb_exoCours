<a href="index.php">Accueil</a>

<?php
/*echo "<br>";
echo "<h1>Calculatrice</h1>";

if (isset($_GET['n1']) && isset($_GET['n2'])){
    echo "<br>";
    echo "<form method=\"get\">";
    echo "<input type=\"text\" name=\"n1\" />";
    echo "+";
    echo "<input type=\"text\" name=\"n2\" />";
    echo "=";
    echo "<input type=\"submit\" value=\"Calculer\" /><br />";
    echo "</form>";
    echo ($_GET['n1']+ $_GET['n2']);
}
else{
    echo "<br>";
    echo "<form method=\"get\">";
    echo "<input type=\"text\" name=\"n1\" />";
    echo "+";
    echo "<input type=\"text\" name=\"n2\" />";
    echo "=";
    echo "<input type=\"submit\" value=\"Calculer\" /><br />";
    echo "</form>";
}*/

echo "<br>";
echo "<h1>Calculatrice</h1>";

if (isset($_POST['n1']) && isset($_POST['n2'])){
    echo "<br>";
    echo "<form method=\"post\">";
    echo "<input type=\"text\" name=\"n1\" />";
    echo "+";
    echo "<input type=\"text\" name=\"n2\" />";
    echo "=";
    echo "<input type=\"submit\" value=\"Calculer\" /><br />";
    echo "</form>";
    echo ($_POST['n1']+ $_POST['n2']);
}
else{
    echo "<br>";
    echo "<form method=\"post\">";
    echo "<input type=\"text\" name=\"n1\" />";
    echo "+";
    echo "<input type=\"text\" name=\"n2\" />";
    echo "=";
    echo "<input type=\"submit\" value=\"Calculer\" /><br />";
    echo "</form>";
}
