<a href="index.php">Accueil</a>

<br>
<?php
/*
// Configuration du fuseau horaire.
date_default_timezone_set('UTC');

// Affiche : July 1, 2000 est un Saturday
echo "July 1, 2000 est un " . date("l", mktime(0, 0, 0, 7, 1, 2000));

// Affiche quelque chose comme : 2006-04-05T01:02:03+00:00
echo date('c', mktime(1, 2, 3, 4, 5, 2006));
?>

<br>
<?php
// prints something like: Wednesday the 15th
echo date('l \t\h\e jS');*/


/***************************************
 *
 * Affiche un calendrier mensuel
 * sous forme d'un tableau
 *
 * $m = mois
 * $y = année
 *
 ****************************************/
function calendar($m, $y)
{
    $sem = array(6, 0, 1, 2, 3, 4, 5); // Correspondance des jours de la semaine : lundi = 0, dimanche = 6
    $mois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    $week = array('lu', 'ma', 'me', 'je', 've', 'sa', 'di');

    $t = mktime(12, 0, 0, $m, 1, $y); // Timestamp du premier jour du mois

    echo '<table><tbody>';

    // Le mois
    //--------
    echo '<tr><td colspan="7">' . $mois[$m] . '</td></tr>';

    // Les jours de la semaine
    //------------------------
    echo '<tr>';
    for ($i = 0; $i < 7; $i++) {
        echo '<td>' . $week[$i] . '</td>';
    }
    echo '</tr>';

    // Le calendrier
    //--------------
    for ($l = 0; $l < 6; $l++) // calendrier sur 6 lignes
    {
        echo '<tr>';
        for ($i = 0; $i < 7; $i++) // 7 jours de la semaine
        {
            $w = $sem[(int)date('w', $t)]; // Jour de la semaine à traiter
            $m2 = (int)date('n', $t); // Tant que le mois reste celui du départ
            if (($w == $i) && ($m2 == $m)) // Si le jours de semaine et le mois correspondent
            {
                echo '<td>' . date('j', $t) . '</td>'; // Affiche le jour du mois
                $t += 86400; // Passe au jour suivant
            } else {
                echo '<td>&nbsp;</td>'; // Case vide
            }
        }
        echo '</tr>';
    }
    echo '</tbody></table>';
}
?>