<?php

namespace ItsRealNise\SharedItemsCoords;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;

use pocketmine\event\player\PlayerChatEvent;

class SharedItemsCoords extends PluginBase implements Listener{
    
    public function onEnable(): void{
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onChat(PlayerChatEvent $event){
      if($event->isCancelled()) return;
      $player = $event->getPlayer();
      $message = $event->getMessage();
      foreach($this->getConfig()->get("item-prefix") as $itemMsg){
      	if(preg_match("/" . $itemMsg . "/i", $message)){
          	$item = $player->getInventory()->getItemInHand()->getName();
              $formated = str_replace($itemMsg, str_replace(["{name}", "{item}"], [$player->getName(), $item], $this->getConfig()->get("item-msg")), $message); 
              $event->setMessage($formated);
			}
		}
		foreach($this->getConfig()->get("coor-prefix") as $coorMsg){
			if(preg_match("/" . $coorMsg . "/i", $message)){
       	 	$x = intval(round($player->getX()));
        		$y = intval(round($player->getY()));
        		$z = intval(round($player->getZ()));
       		 $formated = str_replace($coorMsg, str_replace(["{name}", "{x}", "{y}", "{z}"], [$player->getName(), $x, $y, $z], $this->getConfig()->get("coor-msg")), $message);
       		 $event->setMessage($formated);
      	  }
        }
    }
}
