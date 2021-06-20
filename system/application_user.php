<?php
require_once "system/db.php";

/**
 * ユーザーが存在するか
 * @param string $user_name
 * @return bool
 */
function user_exits_by_name(string $user_name = ""): bool
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("SELECT * FROM application_user WHERE application_user.name=?");
  $stmt->bind_param("s", $user_name);
  $stmt->execute();

  if ($stmt->get_result()->num_rows == 0) {
    return FALSE;
  } else {
    return TRUE;
  }
}

/**
 * @param string $user_name
 * @return array|null
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

      $stmt = $mysqli->prepare("INSERT INTO application_user(name) VALUES(?)");
      $stmt->bind_param("s", $user_name);
      $stmt->execute();

      return get_user_by_username($user_name);
    }
  }
}

/**
 * @param string $user_name
 * @return array
 */
function get_user_by_username(string $user_name): array
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("SELECT * FROM application_user WHERE application_user.name=?");
  $stmt->bind_param("s", $user_name);
  $stmt->execute();

  return $stmt->get_result()->fetch_all()[0];
}

/**
 * user_idからuserを取得する
 * @param $user_id int
 * @return array | null ユーザーが存在する場合は array を返し、存在しない場合は null を返す。
 */
function get_user_by_id(int $user_id)
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("SELECT * FROM application_user WHERE application_user.id=?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();

  return $stmt->get_result()->fetch_all()[0];
}


/**
 * @return array[]
 */
function get_users(): array
{
  $mysqli = db_setup();

  $res = $mysqli->query("SELECT * FROM application_user");

  return $res->fetch_all();
}

/**
 * @param int $user_id
 * @return array|null
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
  setcookie("user_id", NULL);
}

/**
 * @return array|null
 */
function current_user()
{
  $user = NULL;

  if (isset($_COOKIE["user_id"])) {
    $user_id = (int)$_COOKIE["user_id"];
    $user = get_user_by_id($user_id);

  }
  return $user;
}