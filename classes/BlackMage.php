<?php

class BlackMage extends Human
{
  const MAX_HITPOINT = 280;
  private $hitPoint = 280;
  private $attackPoint = 10;
  private $intelligence = 30;

  public function __construct($name)
  {
    parent::__construct($name, $this->hitPoint, $this->attackPoint, $this->intelligence);
  }

  public function doAttack($enemies)
  {
    if (!$this->isEnableAttack($enemies)) {
      return false;
    }
    $enemy = $this->selectTarget($enemies);

    if (rand(1,2) === 1) {
      echo "『" .$this->getName() . "』のスキルが発動した！\n";
      echo "『ファイア』！！\n";
      echo $enemy->getName() . " に " . $this->intelligence * 1.5 . " のダメージ！\n";
      $enemy->tookDamage($this->intelligence * 1.5);
      if ($enemy->getHitPoint() <=0) {
        echo $enemy->getName() . "を倒した！\n";
      }
    } else {
      parent::doAttack($enemies);
    }
    return true;
  }

}