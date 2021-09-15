<?php

namespace YaN;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getLogger()->notice("Plugin Enabled");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder(). "config.yml", Config::YAML);
    }
    public function onChat(PlayerChatEvent $e){
      $p = $e->getPlayer();
      $msg = $e->getMessage();
      if(preg_match("/[i]/i", $msg)){
        $item = $p->getInventory()->getItemInHand()->getName();
        $cfg = $this->config->get("item-msg");
        $cfg = str_replace(["{name}", "{item}"], [$p->getName(), $item], $cfg);
          $i = $this->config->get("item-chat");
        $ms = str_replace($i, $cfg, $msg);
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
            $cfg = $this->config->get("coor-msg");
            $cfg = str_replace(["{name}", "{x}", "{y}", "{z}"], [$p->getName(), $x, $y, $z], $cfg);
            $c = $this->config->get("coor-chat");
       	 $ms = str_replace($c, $cfg, $msg);
       	 $e->setMessage($ms);
        }
    }
}
