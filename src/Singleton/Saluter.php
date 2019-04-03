<?php

namespace App\Singleton;

class Saluter
{
    // singleton logic
    
    private static $instance = null;
    
    public static function getInstance(): Saluter
    {
        if (self::$instance === null) {
            self::$instance = new Saluter();
        }
        
        return self::$instance;
    }
    
    // class logic
    
    /**
     * @var SaluteFormatter
     */
    private $saluteFormatter;
    
    function __construct()
    {
        $this->saluteFormatter = SaluteFormatter::getInstance();
    }

    public function salute(): string
    {
        return "hello";
    }
    
    public function saluteFormatted(): string
    {
        return $this->saluteFormatter->formatSalute($this->salute());
    }
}
