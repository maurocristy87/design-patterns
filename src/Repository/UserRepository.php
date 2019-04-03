<?php

namespace App\Repository;

use App\Entity\User;

class UserRepository
{
    public function persist(User $user)
    {
        // if we use a mysql connection, we should save or update 
        // our object data in here
    }
    
    
    public function findOneByUsername(string $username)
    {
        // use a query to search and return the user
    }
    
    public function findAll()
    {
        // use a query to search and return all the users
    }
}
