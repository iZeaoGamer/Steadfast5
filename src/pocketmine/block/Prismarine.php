<?php

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Prismarine extends Solid{

	protected $id = self::PRISMARINE;

	public function __construct(){

	}

	public function getName(){
		return "Prismarine";
	}

	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	public function getHardness(){
		return 5;
	}

	public function getDrops(Item $item){
		return [
			
		];
	}
} 