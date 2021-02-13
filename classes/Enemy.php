<?php

class Enemy extends Lives
{
  const MAX_HITPOINT = 300;

  public function __construct($name, $attackPoint)
  {
    $hitPoint = 300;
    $intelligence = 0;
    parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
  }

}