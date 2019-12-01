<?php

namespace pocketmine\level;

class BlockLightUpdate extends LightUpdate{

	public function getLight(int $x, int $y, int $z) : int{
		return $this->level->getBlockLightAt($x, $y, $z);
	}
	
	public function setLight(int $x, int $y, int $z, int $level){
		$this->level->setBlockLightAt($x, $y, $z, $level);
	}
}