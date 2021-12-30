<?php

// muodosta tietokantayhteys
require_once('../db.php'); // ota db.php tiedosto käyttöön tässä tiedostossa
//lue region get-parametri muuttujaan
$region = $_GET['region'];
$conn = createDbConnection(); //kutsutaan db.php-tiedostossa olevaa createdbconnetion()-funktiota 
//joka avaa tietokantayhteysen
//muodosta sql lause muuttujaan. tässä vaiheessa tätä ei vielä ajeta kantaaan.
$sql = "CALL GetAliasesByRegion('" . $region . "');";
//tarkista yhteydet yms
//aja kysely kantaan
$prepare = $conn->prepare($sql);
$prepare->execute();
//tallenna vastaus muuttujaan
$rows = $prepare->fetchAll();
//tulosta
$html = "<h1>Aliases by region " . $region . "</h1>";

$html .= '<ul>';
//looppaa tietokannasta saadut rivit läpi
foreach($rows as $row) {
    $html .= '<li>' . $row['title'] . '</li>' ;
}
$html .= '</ul>';
echo $html;