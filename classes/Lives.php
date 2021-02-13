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

  // 現在HPを設定するメソッド（セッター）
  public function recoveryDamage($heal, $target)
  {
    $this->hitPoint += $heal;
    if ($this->hitPoint > $target::MAX_HITPOINT) {
      $this->hitPoint = $target::MAX_HITPOINT;
    }
  }
}