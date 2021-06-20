<?php
require_once "system/db.php";
require_once "system/application_user.php";
require_once "system/music.php";

class Practice
{
  private $user_id;
  private $music_id;
  public $difficulty;
  public $state;
  public $start_date;
  public $end_date;

  function __construct($user_id, $music_id, $difficulty, $state, $start_date, $end_date)
  {
    $this->user_id = $user_id;
    $this->music_id = $music_id;
    $this->difficulty = $difficulty;
    $this->state = $state;
    $this->start_date = $start_date;
    $this->end_date = $end_date;
  }

  public function user()
  {
    return get_user_by_id($this->user_id);
  }

  public function music()
  {
    return get_music_by_id($this->music_id);
  }
}

/**
 * @param int $user_id
 * @return array
 */
function get_practices_by_user_id(int $user_id): array
{
  $mysqli = db_setup();
  $stmt = $mysqli->prepare(
    "select * from practice where practice.user_id=?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();

  $rows = $stmt->get_result()->fetch_all();
  $practices = [];

  foreach ($rows as $row) {
    array_push($practices, new Practice(...$row));
  }

  return $practices;
}