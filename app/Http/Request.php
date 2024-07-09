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

        foreach ($requiredData as $key => $rules) {
            $splitRules = explode('|', $rules);

            if ($this->method === 'POST') {
                $value = $_POST[$key] ?? null;
            } else {
                $value = $_GET[$key] ?? null;
            }

            foreach ($splitRules as $rule) {
                if ($rule === 'required' && empty($value)) {
                    throw new \Error("`$key` is required");
                }

                if (strpos($rule, 'min=') === 0) {
                    $min = (int)str_replace('min=', '', $rule);
                    if (strlen($value) < $min) {
                        throw new \Error("`$key` must be at least $min characters long");
                    }
                }

                if (strpos($rule, 'max=') === 0) {
                    $max = (int)str_replace('max=', '', $rule);
                    if (strlen($value) > $max) {
                        throw new \Error("`$key` must be no more than $max characters long");
                    }
                }


            }

            $sanitized[$key] = trim($value);
        }

        return $sanitized;
    }
}
