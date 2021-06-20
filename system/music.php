<?php
require_once "system/db.php";
require_once "system/score.php";

class Music
{
  public $id;
  public $isbn;
  public $name;

  function __construct($id, $isbn, $name)
  {
    $this->id = $id;
    $this->isbn = $isbn;
    $this->name = $name;
  }

  public function score()
  {
    return get_score_by_isbn($this->isbn);
  }
}

/**
 * 楽譜ISBNから曲を取得する
 * @param string $score_isbn 楽譜ISBN
 * @return array
 */
function get_musics_by_score_isbn(string $score_isbn): array
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("select music.id, music.isbn, music.name from score, music where music.isbn=? and score.isbn=?");
  $stmt->bind_param("ss", $score_isbn, $score_isbn);
  $stmt->execute();

  $rows = $stmt->get_result()->fetch_all();
  $musics = [];
  foreach ($rows as $row) {
    array_push($musics, new Music($row[0], $row[1], $row[2]));
  }

  return $musics;
}