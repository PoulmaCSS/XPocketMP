<?php

declare(strict_types=1);

namespace pocketmine\block;

use pocketmine\block\VanillaBlocks;
use pocketmine\math\Facing;

class PaleMossCarpet extends Block{

    public function __construct(){
        parent::__construct(BlockTypeIds::PALE_MOSS_CARPET, 0, "Pale Moss Carpet");
    }

    public function getBlastResistance(): float{
        return 0.1;
    }

    public function getHardness(): float{
        return 0.1;
    }

    public function onInteract(Block $block): void{
        $this->growVines();
    }

    private function growVines(): void{
        $world = $this->getPosition()->getWorld();
        foreach(Facing::HORIZONTAL as $face){
            $neighbor = $this->getSide($face);
            if($neighbor->isSolid()){
                $vinePosition = $neighbor->getPosition()->getSide(Facing::DOWN);
                $world->setBlock($vinePosition, new PaleMossVine());
            }
        }
    }
}
