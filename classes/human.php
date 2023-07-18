<?php
  class Human 
  {
    const MAX_HITPOINT = 100; // 最大HP
    private $name; // 人間の名前
    private $hitPoint = 100; // 現在のHP
    private $attackPoint = 20; // 攻撃力

    public function __construct($name, $hitPoint = 100, $attackPoint = 20)
    {
      $this->name = $name;
      $this->hitPoint = $hitPoint;
      $this->attackPoint = $attackPoint;
    }

    public function getName()
    {
      return $this->name;
    }

    public function getHitPoint()
    {
      return $this->hitPoint;
    }

    public function getAttackPoint()
    {
      return $this->attackPoint;
    }

    public function doAttack($enemy)
    {
      echo "『" .$this->getName() . "』の攻撃!\n";
      echo "【" .$enemy->getName()."】に" .$this->attackPoint."のダメージ!\n";
      $enemy->tookDamage($this->attackPoint);
    }

    public function tookDamage($damage)
    {
      $this->hitPoint -= $damage;
      if($this->hitPoint < 0)  {
        $this->hitPoint = 0;
      }
    }
  }

  class Brave extends Human
  {
    const MAX_HITPOINT = 120;
    private $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;

    public function __construct($name)
    {
      parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

    public function doAttack($enemy)
    {
      $skillActivationMin = 1;
      $skillActivationMax = 3;
      if(rand($skillActivationMin, $skillActivationMax) === $skillActivationMin) {
        echo "『" .$this->getName() ."』のスキルが発動した!\n";
        echo "『ぜんりょくぎり』!!\n";
        echo $enemy->getName() ."に" .$this->attackPoint * 1.5 . "のダメージ!\n";
        $enemy->tookDamage($this->attackPoint * 1.5);
      } else {
        parent::doAttack($enemy);
      }
      return true;
    }
  }
?>