<?php
require_once "system/db.php";

/**
 * 楽譜ISBNから曲を取得する
 * @param string $score_isbn 楽譜ISBN
 * @return array
 */
function get_musics_by_score_id(string $score_isbn): array
{
  $mysqli = db_setup();

  $stmt = $mysqli->prepare("SELECT score.name, music.id, music.name FROM score, music WHERE music.isbn=? and score.isbn=?");
  $stmt->bind_param("ss", $score_isbn, $score_isbn);
  $stmt->execute();

  return $stmt->get_result()->fetch_all();
}