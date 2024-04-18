<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function extract_email(object $data)
    {
        return $data->email;
    }
}
