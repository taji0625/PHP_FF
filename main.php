<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/Message.php');
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

$messageObj = new Message;

while (!$isFinishFlg) {
  echo "*** $turn ターン目 ***\n\n"; 
   // 仲間の表示
  $messageObj->displayStatusMessage($members);

   // 敵の表示
  $messageObj->displayStatusMessage($enemies);

  // 仲間の攻撃
  $messageObj->displayAttackMessage($members, $enemies);

  // 敵の攻撃
  $messageObj->displayAttackMessage($enemies, $members);

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
 // 仲間の表示
$messageObj->displayStatusMessage($members);

 // 敵の表示
$messageObj->displayStatusMessage($enemies);