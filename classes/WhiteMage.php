<?php

class WhiteMage extends Human
{
  const MAX_HITPOINT = 250;
  private $hitPoint = 250;
  private $attackPoint = 10;
  private $intelligence = 30;

  public function __construct($name)
  {
    parent::__construct($name, $this->hitPoint, $this->attackPoint, $this->intelligence);
  }
  
  public function doAttackWhiteMage($enemies, $members)
  {
    if (!$this->isEnableAttack($enemies)) {
      return false;
    }

    $memberIndex = rand(0, count($members) - 1);
    $member = $members[$memberIndex];

    if(rand(1,3) === 1) {
      echo $this->getName() . "はスキルを発動した！\n";
      $member = $this->selectTarget($members);
      echo "『ケアル』！！\n";
      echo $member->getName() . " のHPを " . $this->intelligence * 1.5 . " 回復！\n";
      $member->recoveryDamage($this->intelligence * 1.5, $member);
    } else {
      $enemy = $this->selectTarget($enemies);
      parent::doAttack($enemies);
    }
    return true;
  }
}