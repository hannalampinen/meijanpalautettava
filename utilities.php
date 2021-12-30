<?php

function createRegionDropDown() {
    require_once('db.php'); 
    //Luodaan tietokantayhteys
    $conn = createDbConnection(); 
    //Sql-lauseen muodostus
    $sql = "SELECT DISTINCT region FROM aliases;";
    //Ajetaan kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    //Vastaus html-muuttujaan
    $rows = $prepare->fetchAll();
    $html = '<select name="region">';
    //Looppaa tietokannasta saadut rivit läpi
    foreach ($rows as $row) {
        //Tulosta jokaiselle riville li-elementti
        $html .= '<option>' . $row['region'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}

function createGenreDropDown() {
    require_once('db.php'); 
    //Luodaan tietokantayhteys
    $conn = createDbConnection(); 
    //Sql-lauseen muodostus
    $sql = "SELECT DISTINCT genre FROM title_genres;";
    //Ajetaan kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    //Vastaus html-muuttujaan
    $rows = $prepare->fetchAll();
    $html = '<select name="genre">';
    //Looppaa tietokannasta saadut rivit läpi
    foreach ($rows as $row) {
        //Tulosta jokaiselle riville li-elementti
        $html .= '<option>' . $row['genre'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}