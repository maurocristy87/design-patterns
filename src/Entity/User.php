<?php

namespace App\Entity;

class User implements \JsonSerializable
{
    const TYPE_WARRIOR = 1;
    const TYPE_WIZARD = 2;
    
    /**
     * @var string
     */
    private $username;
    
    /**
     * @var int
     */
    private $type;
    
    /**
     * @var UserDna 
     */
    private $dna;
    
    public function getUsername(): string
    {
        return $this->username;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getDna(): UserDna
    {
        return $this->dna;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        
        return $this;
    }

    public function setType(int $type): self
    {
        $this->type = $type;
        
        return $this;
    }

    public function setDna(UserDna $dna): self
    {
        $this->dna = $dna;
        
        return $this;
    }
    
    private function getTypeDescription(): string
    {
        $types = [
            self::TYPE_WARRIOR => 'warrior',
            self::TYPE_WIZARD => 'wizard'
        ];
        
        return $types[$this->type];
    }

    public function jsonSerialize()
    {
        return [
            'username' => $this->username,
            'type' => $this->getTypeDescription(),
            'dna' => $this->dna
        ];
    }

}
