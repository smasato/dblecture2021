<?php
function db_setup()
{
  $mysqli = new mysqli("localhost", "s1711452", "hogehoge", "s1711452");
  $mysqli->set_charset("utf8");

  return $mysqli;
}