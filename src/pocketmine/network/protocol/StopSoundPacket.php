<?php

namespace pocketmine\network\protocol;

#include <rules/DataPacket.h>

class StopSoundPacket extends DataPacket {
	const NETWORK_ID = Info310::STOP_SOUND_PACKET;

	public $sound;
	public $stopAll;

	/**
	 *
	 */
	public function decode(){
		$this->sound = $this->getString();
		$this->stopAll = $this->getBool();
	}

	/**
	 *
	 */
	public function encode(){
		$this->reset();
		$this->putString($this->sound);
		$this->putBool($this->stopAll);
	}

}