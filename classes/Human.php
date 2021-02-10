<?php

class Human
{
  const MAX_HITPOINT = 300;
  public $name;
  public $hitPoint = 300;
  public $attackPoint = 20;
  

  public function doAttack($enemy)
  {
    echo "「" . $this->name . "」の攻撃！\n";
    echo "【" . $enemy->name . "】に" . $this->attackPoint . "のダメージ!\n";
    $enemy->tookDamage($this->attackPoint);
  }

  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    if($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }
}