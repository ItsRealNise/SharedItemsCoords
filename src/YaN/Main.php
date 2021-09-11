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
        if($e->getMessage() != "[i]"){
            return;
        }
        $e->setCancelled();
        $i = $p->getInventory()->getItemInHand()->getName();
        foreach($this->getServer()->getOnlinePlayers() as $player){
            $player->sendMessage("§e{$p->getName()} player share item in hand {$i}");
        }
    }
    
    public function onTalk(PlayerChatEvent $e){
        $p = $e->getPlayer();
        if($e->getMessage() != "[coor]"){
            return;
        }
        $e->setCancelled();
        $x = round($p->getX());
        $y = round($p->getY());
        $z = round($p->getZ());
        foreach($this->getServer()->getOnlinePlayers() as $player){
            $player->sendMessage("§e{$p->getName()} player share coor in X: {$x} Y: {$y} Z: {$z}");
        }
    }
}
