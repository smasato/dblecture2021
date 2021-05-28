<?php
require_once( "kaimono2_class.php" );
define( KODUKAI, 800 );
define( NINJIN, 200 );
define( MOYASHI, 60 );
define( JAGAIMO, 120 );
define( HOURENSOU, 180 );
define( KABOCHA, 320 );
define( TAMANEGI, 220 );
print( "【母豚からのお小遣い】<br />" );
print( KODUKAI."円<br />" );
print("【三匹の子豚のお使い〜3等分して手分けしてお買い物〜】<br />");

$pigA = new kaimono2_class(KODUKAI/3, "子豚A");
$pigB = new kaimono2_class(KODUKAI/3, "子豚B");
$zankin = KODUKAI - $pigA->get_saifu() - $pigB->get_saifu();
$pigC = new kaimono2_class($zankin, "子豚C");

if($pigA->buy2( NINJIN )){
    $pigA->message_money("にんじん");
}else{
    $pigA->message_card( "にんじん" );
}
if($pigA->buy2( MOYASHI )){
    $pigA->message_money("もやし");
}else{
    $pigA->message_card( "もやし" );
}
if($pigB->buy2( JAGAIMO )){
    $pigB->message_money("ジャガイモ");
}else{
    $pigB->message_card( "ジャガイモ" );
}
if($pigB->buy2( HOURENSOU )){
    $pigB->message_money("ホウレン草");
}else{
    $pigB->message_card( "ホウレン草" );
}
if($pigC->buy2( KABOCHA )){
    $pigC->message_money("かぼちゃ");
}else{
    $pigC->message_card( "かぼちゃ" );
}
if($pigC->buy2( TAMANEGI )){
    $pigC->message("たまねぎ");
}else{
    $pigC->message_card( "たまねぎ" );
}

print("<br />【おつり合計】<br />");
$otsuri = $pigA->get_saifu() + $pigB->get_saifu() + $pigC->get_saifu();
print( $otsuri."円");
print("<br />【カード合計】<br />");
$card = $pigA->get_card() + $pigB->get_card() + $pigC->get_card();
print( $card."円");
?>