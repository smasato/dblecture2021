<?php
require_once dirname(__FILE__) . "/db.php";
require_once dirname(__FILE__) . "/application_user.php";
require_once dirname(__FILE__) . "/music.php";

$difficulty_choices = [
  '0' => '未入力',
  '1' => '簡単',
  '2' => '普通',
  '3' => '難しい',
];

$state_choices = [
  '0' => '未入力',
  '1' => '練習中',
  '2' => '弾ける',
];

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

  public function difficulty_value()
  {
    $difficulty_choices = [
      '0' => '未入力',
      '1' => '簡単',
      '2' => '普通',
      '3' => '難しい',
    ];

    return $difficulty_choices[$this->difficulty];
  }

  public function state_value()
  {
    $state_choices = [
      '0' => '未入力',
      '1' => '練習中',
      '2' => '弾ける',
    ];

    return $state_choices[$this->state];
  }
}

/**
 * @param User $user
 * @return array
 */
function get_practices_by_user(User $user): array
{
  $mysqli = db_setup();
  $stmt = $mysqli->prepare(
    "select * from practice where practice.user_id=?");
  $stmt->bind_param("i", $user->id);
  $stmt->execute();

  $rows = $stmt->get_result()->fetch_all();
  $practices = [];

  foreach ($rows as $row) {
    array_push($practices, new Practice(...$row));
  }

  return $practices;
}

/**
 * @param User $user
 * @param int $music_id
 * @return Practice|null
 */
function get_practice(User $user, int $music_id)
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("select * from practice 
                        where practice.user_id=? and practice.music_id=?");
  $stmt->bind_param("ii", $user->id, $music_id);
  $stmt->execute();

  $row = $stmt->get_result()->fetch_all()[0];

  if (is_null($row)) {
    return null;
  }

  return new Practice(...$row);
}

/**
 * 練習を更新する
 * @param User $current_user
 * @param Practice $practice
 * @return bool
 */
function update_practice(User $current_user, Practice $practice): bool
{
  if ($practice->user()->id != $current_user->id) {
    return false;
  }

  $mysqli = db_setup();
  $stmt = $mysqli->prepare("update practice set difficulty=?, state=?,
                    start_date=?, end_date=?
                    where user_id=? and music_id=?");
  $stmt->bind_param("ssssii", $practice->difficulty, $practice->state,
    $practice->start_date, $practice->end_date, $practice->user()->id, $practice->music()->id
  );
  $stmt->execute();

  if ($mysqli->error != '') {
    return false;
  }

  return true;
}

/**
 * 練習を作成する
 * @param User $current_user
 * @param Practice $practice
 * @return bool
 */
function create_practice(User $current_user, Practice $practice): bool
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("insert into practice values(?,?,?,?,?,?)");
  $stmt->bind_param("iissss", $practice->user()->id,
    $practice->music()->id, $practice->difficulty, $practice->state,
    $practice->start_date, $practice->end_date
  );
  $stmt->execute();

  if ($mysqli->error != '') {
    return false;
  }

  return true;
}

/**
 * 練習を削除する
 * @param User $current_user
 * @param Practice $practice
 * @return bool
 */
function delete_practice(User $current_user, Practice $practice): bool
{
  if ($practice->user()->id != $current_user->id) {
    return false;
  }

  $mysqli = db_setup();
  $stmt = $mysqli->prepare("delete from practice where user_id=? and music_id=?");
  $stmt->bind_param("ii", $practice->user()->id, $practice->music()->id);
  $stmt->execute();

  if ($mysqli->error != '') {
    return false;
  }

  return true;
}