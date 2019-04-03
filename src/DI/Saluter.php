<?php

namespace App\DI;

class Saluter
{
    /**
     * @var SaluteFormatter
     */
    private $saluteFormatter;
    
    function __construct(SaluteFormatter $saluteFormatter)
    {
        $this->saluteFormatter = $saluteFormatter;
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
