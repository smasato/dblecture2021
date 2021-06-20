<?php
require_once "system/db.php";

/**
 * 楽譜を取得する
 * @return array
 */
function get_scores(): array
{
  $mysqli = db_setup();

  $res = $mysqli->query("SELECT * FROM score");
  return $res->fetch_all();
}
