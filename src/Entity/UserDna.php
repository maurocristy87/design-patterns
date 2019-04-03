<?php

namespace App\Entity;

class UserDna implements \JsonSerializable
{
    /**
     * @var string
     */
    private $ability;
    
    /**
     * @var int
     */
    private $power;
    
    public function getAbility(): ?string
    {
        return $this->ability;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setAbility(string $ability): self
    {
        $this->ability = $ability;
        
        return $this;
    }

    public function setPower(int $power): self
    {
        $this->power = $power;
        
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'ability' => $this->ability,
            'power' => $this->power
        ];
    }

}
