<?php
  require_once('./classes/human.php');
  require_once('./classes/enemy.php');

  $parties = array();
  $parties[] = new Brave('勇者田中');
  $parties[] = new BlackMage('ゴンザレス');
  $parties[] = new WhiteMage('さくなひめ');
  
  $enemies = array();
  $enemies[] = new Enemy("ゴブリン");
  $enemies[] = new Enemy("ジョジエモン", 50);
  $enemies[] = new Enemy("George", 80);
  $turn = 1;
  $isFinishFlg = false;

  
  while(!$isFinishFlg) {
    echo "*** $turn ターン目 *** \n\n ";
    foreach($parties as $party) {
      echo $party->getName(). ":".$party->getHitPoint()."/".$party::MAX_HITPOINT."\n";
    }
    foreach($enemies as $enemy) {
      echo $enemy->getName(). ":".$enemy->getHitPoint()."/".$enemy::MAX_HITPOINT."\n";
    }
    echo "\n";

    foreach($parties as $party){
      if(get_class($party) == "WhiteMage"){
        $party->doAttackWhiteMagic($enemies, $parties);
      } else {
        $party->doAttack($enemies);
      }
      echo "\n";
    }

    foreach($enemies as $enemy){
      $enemy->doAttack($parties);
      echo "\n";
    }
    $deathCnt = 0;
    foreach($parties as $party) {
      if($party->getHitPoint() > 0) {
        $isFinishFlg = false;
        break;
      }
      $deathCnt++;
    }
    if($deathCnt === count($parties)) {
      $isFinishFlg = true;
      echo "GAME OVER ....\n\n";
      break;
    }

    $deathCnt = 0;
    foreach($enemies as $enemy) {
      if($enemy->getHitPoint()) {
        $isFinishFlg = false;
        break;
      }
      $deathCnt++;
    }
    if($deathCnt === count($enemies)) {
      $isFinishFlg = true;
      echo "♪♪♪♪勝利♪♪♪♪\n\n";
      break;
    }
    $turn++;
  }
  echo "★★★戦闘終了★★★\n\n";
  foreach($parties as $party) {
    echo $party->getName() . ":" .$party->getHitPoint() ."/".$party::MAX_HITPOINT . "\n";
  }
  foreach($enemies as $enemy) {
    echo $enemy->getName() . ":" .$enemy->getHitPoint() ."/".$enemy::MAX_HITPOINT . "\n";
  }
?>