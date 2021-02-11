<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

$tiida = new Human();
$tiida = new Brave();
$goblin = new Enemy();

$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

$turn = 1; 

while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
  echo "*** $turn ターン目 ***\n\n"; 
  echo $tiida->name . " ： " . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
  echo $goblin->name . " ： " . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";
  echo "\n";

  // 攻撃
  $tiida->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($tiida);
  echo "\n";

  $turn++;
};


echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->name . " ： " . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->name . " ： " . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n\n";