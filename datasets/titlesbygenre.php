<?php
    require_once('../db.php');

    // hae genre muuttujaan
    $genre = $_GET['genre'];
    // muodosta tietokantayhteys 
    $dbcon = createDbConnection();
    // muodosta sql-lause
    $sql = "SELECT `primary_title`
    FROM `titles` INNER JOIN title_genres
    ON titles.title_id = title_genres.title_id
    WHERE genre LIKE '%" . $genre . "%'
    LIMIT 10;";

    // valmistellaan sql-lause
    $prepare = $dbcon->prepare($sql); 

    // ajetaan kysely tietokantaan
    $prepare->execute();  

    //haetaan tulokset (voitaisiin hakea myös eka rivi fetch ja tarkistus)
    $rows = $prepare->fetchAll(); 
    $html = '<h1>' . $genre . '</h1>';
    $html .= '<ul>';

    //Käydään rivit läpi (max yksi rivi tässä tapauksessa) 
    foreach($rows as $row){
        $html .= '<li>' . $row["primary_title"] . '</li>';  
    }
    $html .= '</ul>';

    // näytetään sivulla
    echo $html;