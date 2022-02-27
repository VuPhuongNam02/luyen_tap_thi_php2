<?php

namespace App\helper;

class helper
{
    public static function gender($gender)
    {
        if ($gender == 0) {
            return 'nam';
        } elseif ($gender == 0) {
            return 'nữ';
        } else {
            return 'khác';
        }
    }
}