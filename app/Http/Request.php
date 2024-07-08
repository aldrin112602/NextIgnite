<?php

namespace App\Http;

class Request
{
    protected $method;
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function validation($requiredData = []): array
    {
        $sanitized = [];
        switch ($this->method) {
            case 'GET':
                $sanitized = [];
                foreach ($requiredData as $key => $value) {
                    if (!isset($_GET[$key])) throw new \Error("Undefined key `$key`");
                }
                break;
            case  'POST':
                $sanitized  = [];
                foreach ($requiredData as $key => $value) {
                    $splitvalue = explode('|', $value);

                    if (in_array('required', $splitvalue) && empty($_POST[$key])) throw new \Error("`$key` is required");
                    $sanitized[$key] = trim($_POST[$key]);
                }
                break;
        }


        return $sanitized;
    }
}
