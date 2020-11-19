<?php

namespace App\Services;

class BaseService
{
    const BASIC_ERROR = 0;
    const SUCCESS = 200;

    const SUCCESS_TEXT = 'success';
    const ERROR_TEXT = 'error';

    protected function basicResponse($check)
    {
        if ($check) {
            return [
                'message' => self::SUCCESS_TEXT,
                'code' => self::SUCCESS
            ];
        }

        return [
            'message' => self::ERROR_TEXT,
            'code' => self::BASIC_ERROR
        ];
    }
}
