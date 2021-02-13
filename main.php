<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

$members = [];
$members[] = new Brave('オベリスクの巨神兵');
$members[] = new WhiteMage('ブラックマジシャンガール');
$members[] = new BlackMage('ブラックマジシャン');

$enemies = [];
$enemies[] = new Enemy('デーモンの召喚', 25);
$enemies[] = new Enemy('ブルーアイズのホワイトドラゴン', 30);
$enemies[] = new Enemy('人造人間サイコショッカー', 24);

$turn = 1; 

$isFinishFlg = false;

while (!$isFinishFlg) {
  echo "*** $turn ターン目 ***\n\n"; 
  foreach ($members as $member) {
    echo $member->getName() . " : " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
  }
  echo "\n";
  foreach ($enemies as $enemy) {
    echo $enemy->getName() . " : " . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
  }
  echo "\n";

  foreach ($members as $member) {
    if (get_class($member) == "WhiteMage") {
      $attackResult = $member->doAttackWhiteMage($enemies, $members);
    } else {
      $attackResult = $member->doAttack($enemies);
    }
    echo "\n";
  }  

  foreach ($enemies as $enemy) {
    $enemy->doAttack($members);
    echo "\n";
  }
  echo "\n";

  $deathCnt = 0;
  foreach ($members as $member) {
    if ($member->getHitPoint() > 0) {
      $isFinishFlg = false;
      break;
    }
    $deathCnt++;
  }
  if ($deathCnt === count($members)) {
    $isFinishFlg = true;
    echo "GAME OVER ....\n\n";
    break;
  }

  $deathCnt = 0;
  foreach ($enemies as $enemy) {
    if ($enemy->getHitPoint() > 0) {
      $isFinishFlg = false;
      break;
    }
    $deathCnt++;
  }
  if ($deathCnt === count($enemies)) {
    $isFinishFlg = true;
    echo "♪♪♪ファンファーレ♪♪♪\n\n";
    break;
  }

  $turn++;
};


echo "★★★ 戦闘終了 ★★★\n\n";
foreach ($members as $member) {
  echo $member->getName() . " ： " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
}
echo "\n";
foreach ($enemies as $enemy) {
  echo $enemy->getName() . " ： " . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
}