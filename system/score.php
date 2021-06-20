<?php
require_once dirname(__FILE__) . "/db.php";
require_once dirname(__FILE__) . "/music.php";

class Score
{
  public $isbn;
  public $name;

  function __construct($isbn, $name)
  {
    $this->isbn = $isbn;
    $this->name = $name;
  }

  public function musics(): array
  {
    return get_musics_by_score_isbn($this->isbn);
  }
}

/**
 * 楽譜を取得する
 * @return array
 */
function get_scores(): array
{
  $mysqli = db_setup();

  $res = $mysqli->query("select * from score");
  $rows = $res->fetch_all();

  $scores = [];
  foreach ($rows as $row) {
    array_push($scores, new Score($row[0], $row[1]));
  }

  return $scores;
}

function get_score_by_isbn($isbn)
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("select * from score where score.isbn=?");
  $stmt->bind_param("s", $isbn);
  $stmt->execute();

  $score_row = $stmt->get_result()->fetch_all()[0];
  if (is_null($score_row)) {
    return null;
  }

  return new Score($score_row[0], $score_row[1]);
}
