<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

$members = [];
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ホワイトマジシャン');
$members[] = new BlackMage('ブラックマジシャン');

$enemies = [];
$enemies[] = new Enemy('デーモンの召喚', 25);
$enemies[] = new Enemy('ブルーアイズのホワイトドラゴン', 30);
$enemies[] = new Enemy('人造人間サイコショッカー', 24);

$turn = 1; 

while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
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
    $enemyIndex = rand(0, count($enemies) - 1);
    $enemy = $enemies[$enemyIndex];
    if (get_class($member) == "WhiteMage") {
      $member->doAttackWhiteMage($enemy, $member);
    } else {
      $member->doAttack($enemy);
    }
    echo "\n";
  }  

  foreach ($enemies as $enemy) {
    $memberIndex = rand(0, count($members) - 1);
    $member = $members[$memberIndex];
    $enemy->doAttack($member);
    echo "\n";
  }
  echo "\n";

  $turn++;
};


echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->getName() . " ： " . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->getName() . " ： " . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n\n";