<?php

namespace ZEROSM;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\math\Vector3;
use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\event\TranslationContainer;
use pocketmine\network\protocol\TransferPacket;
use pocketmine\level\Position;
use pocketmine\entity\Effect;
use pocketmine\entity\InstantEffect;
use pocketmine\event\inventory\InventoryCloseEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerChangeSkinEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\inventory\CraftItemEvent;

use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\ModalFormResponsePacket;
use pocketmine\network\mcpe\protocol\ServerSettingsRequestPacket;
use pocketmine\network\mcpe\protocol\ServerSettingsResponsePacket;

use pocketmine\event\player\cheat\PlayerIllegalMoveEvent;

use jojoe77777\FormAPI;
use onebone\economyapi\EconomyAPI;
use ZEROSM\Tag;

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