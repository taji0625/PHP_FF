<?php

class Enemy
{
  const MAX_HITPOINT = 2000;
  public $name;
  public $hitPoint = 2000;
  public $attackPoint = 20; 

  public function doAttack($human)
  {
    echo "「" . $this->name . "」の攻撃!\n";
    echo "【" . $human->name . "】に" . $this->attackPoint * rand(1, 10) . "のダメージ!\n";
    $human->tookDamage($this->attackPoint);
  }

  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    if($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }
}