<?php

namespace App\Singleton;

class SaluteFormatter
{
    // singleton logic
    
    private static $instance = null;
    
    public static function getInstance(): SaluteFormatter
    {
        if (self::$instance === null) {
            self::$instance = new SaluteFormatter();
        }
        
        return self::$instance;
    }
    
    public function formatSalute(string $salute)
    {
        return $salute . ' is now formatted';
    }
}
