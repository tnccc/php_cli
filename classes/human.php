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

    public function doAttack($enemies)
    {
      $enemyIndex = rand(0, count($enemies) - 1); // 添字は0から始まるので、-1する
      $enemy = $enemies[$enemyIndex];

      if ($this->getHitPoint()<= 0) {
        return false;
      }

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

    public function recoveryDamage($heal, $target)
    {
      $this->hitPoint += $heal;
      if($this->hitPoint > $target::MAX_HITPOINT) {
        $this->hitPoint = $target::MAX_HITPOINT;
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

    public function doAttack($enemies)
    {
      if($this->getHitPoint() <= 0)  {
        return false;
      }

      $skillActivationMin = 1;
      $skillActivationMax = 3;
      $enemyIndex = rand(0, count($enemies) - 1);
      $enemy = $enemies[$enemyIndex];
      if(rand($skillActivationMin, $skillActivationMax) === $skillActivationMin) {
        echo "『" .$this->getName() ."』のスキルが発動した!\n";
        echo "『ぜんりょくぎり』!!\n";
        echo $enemy->getName() ."に" .$this->attackPoint * 1.5 . "のダメージ!\n";
        $enemy->tookDamage($this->attackPoint * 1.5);
      } else {
        parent::doAttack($enemies);
      }
      return true;
    }
  }

  class BlackMage extends Human
  {
    const MAX_HITPOINT = 80;
    private $hitPoint = 80;
    private $attackPoint = 10;
    private $intelligence = 30; // 魔法攻撃力

    public function __construct($name)
    {
      parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

    public function doAttack($enemies)
    {
      $skillActivationMin = 1;
      $skillActivationMax = 2;
      $enemyIndex = rand(0, count($enemies) - 1);
      $enemy = $enemies[$enemyIndex];
      if($this->getHitPoint() <= 0)  {
        return false;
      }

      if(rand($skillActivationMin, $skillActivationMax)){
        echo "『" .$this->getName() . "』のスキルが発動した!\n";
        echo "『ファイア』!!\n";
        echo $enemy->getName() . "に" .$this->intelligence * 1.5. "のダメージ!\n";
        $enemy->tookDamage($this->intelligence * 1.5);
      } else {
        parent::doAttack($enemies);
      }
      return true;
    }
  }

  class WhiteMage extends Human
  {
    const MAX_HITPOINT = 80;
    private $hitPoint = 80;
    private $attackPoint = 10;
    private $intelligence = 30; // 魔法攻撃力

    public function __construct($name)
    {
      parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

    public function doAttackWhiteMagic($enemies, $humans)
    {
      $skillActivationMin = 1;
      $skillActivationMax = 2;
      $humanIndex = rand(0, count($humans) - 1);
      $human = $humans[$humanIndex];
      
      if($this->getHitPoint() <= 0)  {
        return false;
      }

      if(rand($skillActivationMin, $skillActivationMax)) {
        echo "『" .$this->getName(). "』のスキルが発動した!\n";
        echo "『ケアル』!!\n";
        echo $human->getName() . "のHPを" .$this->intelligence * 1.5 . "回復!\n";
        $human->recoveryDamage($this->intelligence * 1.5, $human);
      } else {
        parent::doAttack($enemies);
      }
      return true;
    } 
  }
?>