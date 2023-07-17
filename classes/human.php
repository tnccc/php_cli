<?php
  class Human 
  {
    const MAX_HITPOINT = 100; // 最大HP
    public $name; // 人間の名前
    public $hitPoint = 100; // 現在のHP
    public $attackPoint = 20; // 攻撃力

    public function doAttack($enemy)
    {
      echo "『" .$this->name . "』の攻撃!\n";
      echo "【" .$enemy->name."】に" .$this->attackPoint."のダメージ!\n";
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
?>