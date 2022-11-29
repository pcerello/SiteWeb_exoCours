<a href="index.php">Accueil</a>

<table>

<?php
if (isset($_GET['n']) && isset($_GET['m'])){
    for ($i = 1 ; $i < 10 ; $i++) {
        if ($i == $_GET['m']){
            echo "<tr>";
            echo "<th><mark>".$i."</mark></th>";
        }
        else{
            echo "<tr>";
            echo "<th>".$i."</th>";
        }
        
        for ($j = 2 ; $j < 10 ; $j++){

            if ($j == $_GET['n'] || $i == $_GET['m']){
                if ($i == 1){
                    echo "<th><mark>".$j."</mark></th>";
                }
                else{
                    echo "<td><mark><a href=\"multiplications.php?n=$j&m=$i\">".$j*$i."</a></mark></td>";
                    
                }
            }
            else{
                if ($i == 1){
                    echo "<th>".$j."</th>";
                }
                else{
                    echo "<td><a href=\"multiplications.php?n=$j&m=$i\">".$j*$i."</a></td>";
                    
                }
            }
        }
        echo "</tr>";
    }
}
else{
    for ($i = 1 ; $i < 10 ; $i++) {
        echo "<tr>";
        echo "<th>".$i."</th>";
        for ($j = 2 ; $j < 10 ; $j++){
            if ($i == 1){
                echo "<th>".$j."</th>";
            }
            else{
                echo "<td><a href=\"multiplications.php?n=$j&m=$i\">".$j*$i."</a></td>";
                
            }
        }
        echo "</tr>";
    }
}
?>