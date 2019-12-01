<?php

namespace pocketmine\block;

class UnknownBlock extends Transparent {

	/**
	 * @return bool
	 */
	public function isSolid(){
		return false;
	}

	/**
	 * @return int
	 */
	public function getHardness(){
		return 0;
	}
}