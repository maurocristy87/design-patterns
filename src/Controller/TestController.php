<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/test")
 */
class TestController extends AbstractController
{
    /**
     * Singleton. DONT USE!!!!!!
     *
     * @Route("/singleton", methods="GET")
     */
    public function singleton()
    {
        $saluter = \App\Singleton\Saluter::getInstance();
        
        return $this->json(['message' => $saluter->saluteFormatted()]);
    }
    
    /**
     * Dependency injection manually. DONT USE
     *
     * @Route("/di/manually", methods="GET")
     */
    public function dependencyInjectionManually()
    {
        $saluteFormatter = new \App\DI\SaluteFormatter();
        $saluter = new \App\DI\Saluter($saluteFormatter);
        
        return $this->json(['message' => $saluter->saluteFormatted()]);
    }
    
    /**
     * Dependency injection by container. USE IT
     * 
     * @Route("/di/container", methods="GET")
     */
    public function dependencyInjectionByContainer(\App\DI\Saluter $saluter)
    {
        return $this->json(['message' => $saluter->saluteFormatted()]);
    }
    
    /**
     * Factory pattern for user creation
     * 
     * @Route("/factory/warrior", methods="GET")
     */
    public function factoryWarrior(\App\Factory\UserFactory $factory)
    {
        return $this->json(['data' => $factory->createWarrior('bruce-lee')]);
    }
    
    /**
     * Factory pattern for user creation
     * 
     * @Route("/factory/wizard", methods="GET")
     */
    public function factoryWizard(\App\Factory\UserFactory $factory)
    {
        return $this->json(['data' => $factory->createWizard('gandalf')]);
    }
    
    /**
     * Service encapsulate business logic for ONE type of object
     * 
     * @Route("/service/user", methods="GET")
     */
    public function userService(\App\Service\UserService $service)
    {
        $user = $service->createWarrior('bruce-lee');
        $service->increaseUserPower($user);
        
        return $this->json(['data' => $user]);
    }
}