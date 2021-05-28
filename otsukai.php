<?php
require_once( "kaimono_class.php" );
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

$pigA = new kaimono_class(KODUKAI/3, "子豚A");
$pigB = new kaimono_class(KODUKAI/3, "子豚B");
$zankin = KODUKAI - $pigA->get_saifu() - $pigB->get_saifu();
$pigC = new kaimono_class($zankin, "子豚C");

if($pigA->buy( NINJIN )){
    $pigA->message("にんじん");
    $kago[] = "にんじん";
}
if($pigA->buy( MOYASHI )){
    $pigA->message("もやし");
    $kago[] = "もやし";
}
if($pigB->buy( JAGAIMO )){
    $pigB->message("ジャガイモ");
    $kago[] = "ジャガイモ";
}
if($pigB->buy( HOURENSOU )){
    $pigB->message("ホウレン草");
    $kago[] = "ホウレン草";
}
if($pigC->buy( KABOCHA )){
    $pigC->message("かぼちゃ");
    $kago[] = "かぼちゃ";
}
if($pigC->buy( TAMANEGI )){
    $pigC->message("たまねぎ");
    $kago[] = "たまねぎ";
}
print("【買ったものリスト】<br />");
foreach( $kago as $value ){
    print("$value ");
}
print("<br />【おつり合計】<br />");
$otsuri = $pigA->get_saifu() + $pigB->get_saifu() + $pigC->get_saifu();
print( $otsuri."円");
?>