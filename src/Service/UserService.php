<?php

namespace App\Service;

use App\Entity\User;
use App\Factory\UserFactory;
use App\Repository\UserRepository;

class UserService
{
    const DELTA_POWER = 100;
    
    /**
     * @var UserFactory
     */
    private $factory;
    
    /**
     * @var UserRepository
     */
    private $repository;
    
    public function __construct(
        UserFactory $factory,
        UserRepository $repository
    ) {
        $this->factory = $factory;
        $this->repository = $repository;
    }

    public function createWarrior(string $username): User
    {
        $warrior = $this->factory->createWarrior($username);
        
        $this->repository->persist($warrior);
        
        return $warrior;
    }
    
    public function createWizard(string $username): User
    {
        $wizard = $this->factory->createWizard($username);
        
        $this->repository->persist($wizard);
        
        return $wizard;
    }
    
    public function increaseUserPower(User $user): User
    {
        $currentPower = $user->getDna()->getPower();
        
        $user->getDna()->setPower($currentPower + self::DELTA_POWER);
        
        $this->repository->persist($user);
        
        return $user;
    }
}
