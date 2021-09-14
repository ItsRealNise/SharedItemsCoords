<?php

namespace YaN;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;

use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getLogger()->notice("Plugin Enabled");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onChat(PlayerChatEvent $e){
      $p = $e->getPlayer();
      $msg = $e->getMessage();
      if(preg_match("/[i]/i", $msg)){
        $item = $p->getInventory()->getItemInHand()->getName();
        $y = "Name : {$item}";
        ms = str_replace("[i]", $y, $msg);
        $e->setMessage($ms);
      }
    }
    
    public function onTalk(PlayerChatEvent $e){
        $p = $e->getPlayer();
        $msg = $e->getMessage();
        if(preg_match("/[coor]/i", $msg)){
       	 $x = intval(round($p->getX()));
        	$y = intval(round($p->getY()));
        	$z = intval(round($p->getZ()));
        	$coor = "X: " . $x . " Y: " . $y . " Z: " . $z;
       	 $ms = str_replace("[coor]", $coor, $msg);
       	 $e->setMessage($ms);
        }
    }
}
