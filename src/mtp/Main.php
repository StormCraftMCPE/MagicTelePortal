<?php

namespace mtp;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use pocketmine\level\Position;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;

use mtp\common\mc;
use mtp\common\MPMU;
use mtp\common\PluginCallBackTask;

class Main extends PluginBase implements CommandExecutor,Listener{
  protected $portals;
  protected $max_dist;
  protected $border;
  protected $center;
  protected $corner;
  protected $tweak;
  
  public function onEnable(){
    $this->tweak = [];
    if(!is_dir($this->getDataFolder())) mkdir($this->getDataFolder());
    mc::plugin_init($this,$this->getFile());
    $this->getServer()->getPluginManager->registerEvents($this, $this);
    defaults = [
      
