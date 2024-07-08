<?php

namespace App\Http;

class Request 
{
    public function validation($requiredData = []): array|string|\Error {
        return [];
    }
}