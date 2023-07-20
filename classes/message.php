<?php 
  class Message
  {
    public function displayStatusMessage($objects)
    {
      foreach($objects as $object){
        echo $object->getName() . ":" . $object->getHitPoint() . "/" .$object::MAX_HITPOINT ."\n";
      }
    }
    public function displayAttackMessage($objects, $targets)
    {
      foreach($objects as $object){
        if(get_class($object) === 'WhiteMage') {
          $attackResult = $object->doAttackWhiteMagic($targets, $objects);
        } else {
          $attackResult = $object->doAttack($targets);
        }
        if($attackResult) {
          echo "\n";
        }
        $attackResult = false;
      }
      echo "\n";
    }
  }
?>