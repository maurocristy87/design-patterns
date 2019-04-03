<?php

namespace App\Factory;

use App\Entity\User;
use App\Entity\UserDna;

class UserFactory
{
    public function createWarrior(string $username): User
    {
        $warrior = $this->createUser($username, User::TYPE_WARRIOR);
        
        $dna = $this->createDna('Karate', 500);
        $warrior->setDna($dna);
        
        return $warrior;
    }
    
    public function createWizard(string $username): User
    {
        $wizard = $this->createUser($username, User::TYPE_WIZARD);
        
        $dna = $this->createDna('Magick', 600);
        $wizard->setDna($dna);
        
        return $wizard;
    }
    
    private function createUser(string $username, int $type): User
    {
        $user = new User();
        $user->setType($type)
            ->setUsername($username);
        
        return $user;
    }
    
    private function createDna(string $ability, int $power): UserDna
    {
        $dna = new UserDna();
        $dna->setAbility($ability)
            ->setPower($power);
        
        return $dna;
    }
}
