<?php
function title($page_name)
{
    echo "<title>$page_name | ピアノ練習記録システム</title>";
}

function user_exits($user_name = "")
{
    if ($user_name == "") {
        return FALSE;
    }

    $mysqli = new mysqli("localhost", "s1711452", "hogehoge", "s1711452");
    $mysqli->set_charset("utf8");

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
    if (user_exits($user_name)) {
        return false;
    } else {
        if ($user_name == "") {
            return false;
        } else {
            $mysqli = new mysqli("localhost", "s1711452", "hogehoge", "s1711452");
            $mysqli->set_charset("utf8");

            $stmt = $mysqli->prepare("INSERT INTO application_user(name) VALUES(?)");
            $stmt->bind_param("s", $user_name);
            $stmt->execute();

            return get_user_by_username($user_name);
        }
    }
}

function get_user_by_username($user_name)
{
    $mysqli = new mysqli("localhost", "s1711452", "hogehoge", "s1711452");
    $mysqli->set_charset("utf8");

    $stmt = $mysqli->prepare("SELECT * FROM application_user WHERE application_user.name=?");
    $stmt->bind_param("s", $user_name);
    $stmt->execute();

    return $stmt->get_result()->fetch_all(MYSQLI_NUM);
}
