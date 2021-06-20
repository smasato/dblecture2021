<?php
require dirname(__FILE__) . "/../system/music.php";

$isbn = (string)$_GET["isbn"];
$musics = get_musics_by_score_isbn($isbn);

echo json_encode($musics);
