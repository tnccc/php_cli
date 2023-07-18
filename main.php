<?php
  require_once('./classes/human.php');
  require_once('./classes/enemy.php');

  $ken = new Human("ケン");
  $tanaka = new Brave("勇者たなか");
  $goblin = new Enemy("ゴブリン");
  $turn = 1;
  while($tanaka->getHitPoint() > 0 && $goblin-> getHitPoint() > 0){
    echo "*** $turn ターン目 *** \n\n ";
    echo $tanaka->getName() . ":" . $tanaka->getHitPoint(). "/" . $tanaka::MAX_HITPOINT . "\n";
    echo $goblin->getName() . ":" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n";
    echo "\n";
    
    $tanaka->doAttack($goblin);
    echo "\n";
    $goblin->doAttack($tanaka);
    echo "\n";
    $turn++;
  }
  echo "★★★戦闘終了★★★\n\n";
  echo $goblin->getName() . ":" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n";
  echo $tanaka->getName() . ":" . $tanaka->getHitPoint() . "/" . $tanaka::MAX_HITPOINT . "\n";
?>