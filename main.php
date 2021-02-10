<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

$tiida = new Human();
$goblin = new Enemy();

$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

echo $tiida->name . ":" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";

echo $goblin->name . ":" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";
echo "\n";

while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
  $tiida->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($tiida);
  echo "\n";
  echo $tiida->name . ":" . "残りHP" . $tiida->hitPoint . "\n";
  echo $goblin->name . ":" . "残りHP" . $goblin->hitPoint . "\n";
  echo "\n";
};

if ($tiida->hitPoint = 0) {
  echo  $tiida->name . "は死んだ\n";
  echo "ゲームオーバー\n";
} else {
  echo  $goblin->name . "を倒した！\n";
  echo $tiida->name . "の勝利！\n";
};