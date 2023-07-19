<?php 
class Enemy
{
  const MAX_HITPOINT = 50; // 最大HP
  private $name; // 人間の名前
  private $hitPoint = 50; // 現在のHP
  private $attackPoint = 10; // 攻撃力

  public function __construct($name, $attackPoint = 10)
  {
    $this->name = $name;
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

  public function doAttack($humans)
    {
      if ($this->getHitPoint() <= 0) {
        return false;
      }
  
      $humanIndex = rand(0, count($humans) - 1); // 添字は0から始まるので、-1する
      $human = $humans[$humanIndex];

      echo "『" .$this->getName() . "』の攻撃!\n";
      echo "【" .$human->getName()."】に" .$this->attackPoint."のダメージ!\n";
      $human->tookDamage($this->attackPoint);
    }

    public function tookDamage($damage)
    {
      $this->hitPoint -= $damage;
      if($this->hitPoint < 0)  {
        $this->hitPoint = 0;
      }
    }
  }
?>