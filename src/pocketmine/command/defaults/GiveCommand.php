<?php

namespace pocketmine\command\defaults;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class GiveCommand extends VanillaCommand{

	public function __construct($name){
		parent::__construct(
			$name,
			"Gives the specified player a certain amount of items",
			"/give <player> <item[:damage]> [amount]"
		);
		$this->setPermission("pocketmine.command.give");
	}

	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}

		if(count($args) < 2){
			$sender->sendMessage(TextFormat::RED . "Usage: " . $this->usageMessage);

			return false;
		}

		$player = $sender->getServer()->getPlayer($args[0]);
		$item = Item::fromString($args[1]);

		if(!isset($args[2])){
			$item->setCount($item->getMaxStackSize());
		}else{
			$item->setCount((int) $args[2]);
		}

		if($player instanceof Player){
			if(($player->getGamemode() & 0x01) === 0x01){
				$sender->sendMessage(TextFormat::RED . "Player is in creative mode");

				return true;
			}
			if($item->getId() == 0){
				$sender->sendMessage(TextFormat::RED . "There is no item called " . $args[1] . ".");

				return true;
			}

			//TODO: overflow
			$player->getInventory()->addItem(clone $item);
			$player->getInventory()->sendContents($player);
		}else{
			$sender->sendMessage(TextFormat::RED . "Can't find player " . $args[0]);

			return true;
		}

		Command::broadcastCommandMessage($sender, "Gave " . $player->getName() . " " . $item->getCount() . " of " . $item->getName() . " (" . $item->getId() . ":" . $item->getDamage() . ")");

		return true;
	}
}