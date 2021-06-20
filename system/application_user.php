<?php
require_once dirname(__FILE__) . "/db.php";

class User
{
  public $id;
  public $name;

  function __construct($id, $name)
  {
    $this->id = $id;
    $this->name = $name;
  }
}

/**
 * ユーザーが存在するか
 * @param string $user_name
 * @return bool
 */
function user_exits_by_name(string $user_name = ""): bool
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("select * from application_user where application_user.name=?");
  $stmt->bind_param("s", $user_name);
  $stmt->execute();

  if ($stmt->get_result()->num_rows == 0) {
    return false;
  } else {
    return true;
  }
}

/**
 * @param string $user_name
 * @return User|null
 */
function user_register(string $user_name)
{
  if (user_exits_by_name($user_name)) {
    return null;
  } else {
    if ($user_name == "") {
      return null;
    } else {
      $mysqli = db_setup();

      $stmt = $mysqli->prepare("insert into application_user(name) values(?)");
      $stmt->bind_param("s", $user_name);
      $stmt->execute();

      return get_user_by_name($user_name);
    }
  }
}

/**
 * @param string $user_name
 * @return User|null
 */
function get_user_by_name(string $user_name)
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("select * from application_user where application_user.name=?");
  $stmt->bind_param("s", $user_name);
  $stmt->execute();

  $user_row = $stmt->get_result()->fetch_all()[0];
  if (is_null($user_row)) {
    return null;
  }

  return new User($user_row[0], $user_row[1]);
}

/**
 * user_idからuserを取得する
 * @param $user_id int
 * @return User | null ユーザーが存在する場合は User を返し、存在しない場合は null を返す。
 */
function get_user_by_id(int $user_id)
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("select * from application_user where application_user.id=?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();

  $user_row = $stmt->get_result()->fetch_all()[0];

  if (is_null($user_row)) {
    return null;
  }

  return new User($user_row[0], $user_row[1]);
}


/**
 * @return array[]
 */
function get_users(): array
{
  $mysqli = db_setup();

  $res = $mysqli->query("select * from application_user");

  $users = [];
  foreach ($res->fetch_all() as $row) {
    array_push($users, new User($row[0], $row[1]));
  }

  return $users;
}

/**
 * @param int $user_id
 * @return User|null
 */
function user_login(int $user_id)
{
  $user = get_user_by_id($user_id);
  if (!is_null($user)) {
    setcookie("user_id", (string)$user[0]);
  }
  return $user;
}

/**
 * ユーザーをログアウトする
 */
function user_logout()
{
  setcookie("user_id", null);
}

/**
 * @return User|null
 */
function current_user()
{
  $user = null;

  if (isset($_COOKIE["user_id"])) {
    $user_id = (int)$_COOKIE["user_id"];
    $user = get_user_by_id($user_id);

  }
  return $user;
}