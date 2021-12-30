<?php
require_once('utilities.php'); 

// hakukriteerit
$html = "<h2>Criteria</h2>";
$html .= '<form action="GET">';
//alue-pudotusvalikko
$html .= createRegionDropDown();
//genre-pudotusvalikko
$html .= createGenreDropDown();
// looppaa läpi tiedostot datasets-hakemistosta
$path = 'datasets';

if ($handle = opendir($path)) {

    while (false !== ($file = readdir($handle))) {

        if ('.' === $file) continue;
        if ('..' === $file) continue;

        $html .= '<div><input type="submit" value="' . 
        basename($file, ".php") . '" formaction="' . $path
         . "/" . $file . '"></div>';
    }
    closedir($handle);
}
$html .= '</form>';
//luo painike, joka lähettää lomakkeen käsiteltävänä olevalle tiedostolle.

return $html;