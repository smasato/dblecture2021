<?php
require "system/db.php";

function user_exits_by_name($user_name = "")
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

function user_register($user_name)
{
  if (user_exits_by_name($user_name)) {
    return false;
  } else {
    if ($user_name == "") {
      return false;
    } else {
      $mysqli = db_setup();

      $stmt = $mysqli->prepare("INSERT INTO application_user(name) VALUES(?)");
      $stmt->bind_param("s", $user_name);
      $stmt->execute();

      return get_user_by_username($user_name);
    }
  }
}

function get_user_by_username($user_name)
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("SELECT * FROM application_user WHERE application_user.name=?");
  $stmt->bind_param("s", $user_name);
  $stmt->execute();

  return $stmt->get_result()->fetch_all();
}

function get_user_by_id($user_id)
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("SELECT * FROM application_user WHERE application_user.id=?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();

  return $stmt->get_result()->fetch_all()[0];
}


function get_users()
{
  $mysqli = db_setup();

  $res = $mysqli->query("SELECT * FROM application_user");

  return $res->fetch_all();
}

function user_login($user_id)
{
  $user = get_user_by_id($user_id); #　TODO: ユーザーの存在チェック
  setcookie("user_id", (string)$user[0]);

  return $user;
}

function user_logout()
{
  setcookie("user_id", NULL);
}

function current_user()
{
  $user = NULL;

  if (isset($_COOKIE["user_id"])) {
    $user_id = (int)$_COOKIE["user_id"];
    $user = get_user_by_id($user_id);

  }
  return $user;
}