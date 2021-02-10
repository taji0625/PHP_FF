<?php

class Enemy
{
  const MAX_HITPOINT = 50;
  public $name = 'モンスター';
  public $hitPoint = 50;
  public $attackPoint = 10; 

  public function doAttack($human)
  {
    echo "「" . $this->name . "」の攻撃!\n";
    echo "【" . $human->name . "】に" . $this->attackPoint . "のダメージ!\n";
    $human->tookDamage($this->attackPoint);
  }
}