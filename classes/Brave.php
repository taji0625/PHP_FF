<?php

class Brave extends Human
{
  const MAX_HITPOINT = 300;
  private $hitPoint = self::MAX_HITPOINT;
  private $attackPoint = 30;

  public function __construct($name)
  {
    parent::__construct($name, $this->hitPoint, $this->attackPoint);
  }

  public function doAttack($enemies)
  {
    if (!$this->isEnableAttack($enemies)) {
      return false;
    }
    $enemy = $this->selectTarget($enemies);

    if(rand(1,3) === 1) {
      echo "『" .$this->getName() . "』のスキルが発動した！\n";
      echo "『ぜんりょくパンチ』！！\n";
      echo "【" . $enemy->getName() . "】" . " に " . $this->attackPoint * 1.5 . " のダメージ！\n";
      $enemy->tookDamage($this->attackPoint * 1.5);
      if ($enemy->getHitPoint() <=0) {
        echo $enemy->getName() . "を倒した！\n";
      }
    } else {
      parent::doAttack($enemies);
    }
    return true;
  }    
}
