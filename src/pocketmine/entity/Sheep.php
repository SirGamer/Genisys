<?php
namespace pocketmine\entity;

use pocketmine\network\Network;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;
use pocketmine\entity\Animal;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\item\Item as ItemItem;

class Sheep extends Animal{
	const NETWORK_ID = 13;
	public $width = 0.3;
	public $length = 0.6;
	public $height = 1.8;
	
	public function getName(){
		return "Sheep";
	}
	
	public function kill(){
		parent::kill();
		if($this->getLevel()->getServer()->expEnabled) $this->getLevel()->addExperienceOrb($this->add(0, 1, 0), mt_rand(1, 3));
	}
	
	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->eid = $this->getId();
		$pk->type = Sheep::NETWORK_ID;
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);
		parent::spawnTo($player);
	}
	
	public function getDrops(){
		$drops = array(ItemItem::get(ItemItem::WOOL, 0, 1));
		return $drops;
	}
}