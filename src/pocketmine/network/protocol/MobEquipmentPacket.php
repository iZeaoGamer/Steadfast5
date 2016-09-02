<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____  
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \ 
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/ 
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_| 
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 * 
 *
*/

namespace pocketmine\network\protocol;

#include <rules/DataPacket.h>


class MobEquipmentPacket extends DataPacket{
	const NETWORK_ID = Info::MOB_EQUIPMENT_PACKET;

	public $eid;
	public $item;
	public $slot;
	public $selectedSlot;

	public function decode(){
		$this->eid = $this->getVarInt();
		$this->item = $this->getSlot();
		$slot = $this->getByte();
		$this->slot = ($slot !== false) ? $slot : -1;
		$selectedSlot = $this->getByte();
		$this->selectedSlot = ($selectedSlot !== false) ? $selectedSlot : -1;
	}

	public function encode(){
		$this->reset();
		$this->putVarInt($this->eid);
		$this->putSlot($this->item);
		$this->putByte($this->slot);
		$this->putByte($this->selectedSlot);
		$this->putByte(0); // mystery
	}
	
	/* 
	 * Aniti notice
	 * TODO may be packet have change in 0.14.? 
	 */
	public function getByte(){
		if(isset($this->buffer{$this->offset})){
			return ord($this->buffer{$this->offset++});
		} 
		return false;
	}

}
