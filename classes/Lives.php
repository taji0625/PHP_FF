<?php

class Lives
{
  private $name;
  private $hitPoint;
  private $attackPoint;
  private $intelligence; 

  public function __construct($name, $hitPoint = 50, $attackPoint = 10, $intelligence = 0)
  {
    $this->name = $name;
    $this->hitPoint = $hitPoint;
    $this->attackPoint = $attackPoint;
    $this->intelligence = $intelligence;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getHitPoint()
  {
    $result = $this->hitPoint;
    if ($result < 0) {
      $result = 0;
    }
    return $result;
  }

  // 現在HPを設定するメソッド（セッター）
  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    if ($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }

  public function recoveryDamage($heal, $target)
  {
    $this->hitPoint += $heal;
    if ($this->hitPoint > $target::MAX_HITPOINT) {
      $this->hitPoint = $target::MAX_HITPOINT;
    }
  }

  //  攻撃するメソッド
  public function doAttack($targets)
  {
    if (!$this->isEnableAttack($targets)) {
      return false;
    }
    // ターゲットの決定
    $target = $this->selectTarget($targets);

    echo "『" .$this->name . "』の攻撃！\n";
    echo "【" . $target->getName() . "】に " . $this->attackPoint . " のダメージ！ \n";
    $target->tookDamage($this->attackPoint);
    if (get_class($target) != "Enemy") {
      if ($target->getHitPoint() <=0) {
        echo $target->getName() . "は死んだ。\n";
      }
    } else {
      if ($target->getHitPoint() <=0) {
        echo $target->getName() . "を倒した！\n";
      }
    }
    return true;
  }

  //  攻撃ができるかどうかチェック
  public function isEnableAttack($targets)
  {
    // チェック１：自信のHPが0以上かどうか
    if ($this->hitPoint <= 0) {
      return false;
    }
    // チェック２：敵が全員HP0以下かどうか
    $isAllDie = true;
    foreach ($targets as $target) {
      if ($target->getHitPoint() > 0) {
        $isAllDie = false;
      }
    }
    if ($isAllDie) {
      return false;
    }

    // チェックを抜けた場合、攻撃可能
    return true;
  }

  // ターゲットを決めるメソッド
  public function selectTarget($targets)
  {
    $target = $targets[rand(0, count($targets) -1)];
    // 敵のHPが0以下の場合再度ターゲットを決める
    while ($target->getHitPoint() <= 0) {
      $target = $targets[rand(0, count($targets) -1)];
    }
    return $target;
  }
}