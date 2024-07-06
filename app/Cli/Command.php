<?php

namespace App\Cli;

class Command extends Quotes
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }
}
