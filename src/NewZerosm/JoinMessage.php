<?php

namespace ZEROSM;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class JoinMessage extends PluginBase implements Listener{

    public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
		$this->getLogger()->critical("ZS-JoinMessage v1.0.0 | §e오르카 제작"); 
		$this->getLogger()->notice("해당 플러그인은 ZEROSM Network 서버 전용 플러그인으로 외부로 유출하실수 없습니다."); 
		$this->getLogger()->notice("해당 플러그인은 §eZEROSM Network Inc.§b 라이센스로 보호받고 있습니다.");
	}
	
	public function onJoin(PlayerJoinEvent $player){
		$player->setJoinMessage("");
		
		if($player->getPlayer()->isOP()){
			$name = "§l§7<< §l§a[+] §r§b".$player->getPlayer()->getName()." §l§7>>";
		}
		
		else if(!$player->getPlayer()->isOP()){
			$name = "§l§7<< §l§a[+] §r§a".$player->getPlayer()->getName()." §l§7>>";
		}
		
		$this->getServer()->broadcastTip($name."\n");
	}

	public function onQuit(PlayerQuitEvent $player){
		$player->setQuitMessage("");
		
		if($player->getPlayer()->isOP()){
			$name = "§l§7<< §l§c[-] §r§b".$player->getPlayer()->getName()." §l§7>>";
		}
		
		else if(!$player->getPlayer()->isOP()){
			$name = "§l§7<< §l§c[-] §r§a".$player->getPlayer()->getName()." §l§7>>";
		}
		
		$this->getServer()->broadcastTip($name."\n");
	}
}
?>
