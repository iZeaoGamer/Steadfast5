<?php

namespace pocketmine\level;

class SkyLightUpdate extends LightUpdate
{
    public function getLight(int $x, int $y, int $z): int
    {
        return $this->level->getBlockSkyLightAt($x, $y, $z);
    }

    public function setLight(int $x, int $y, int $z, int $level)
    {
        $this->level->setBlockSkyLightAt($x, $y, $z, $level);
    }
}