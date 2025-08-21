<?php

namespace App\Core;
use App\Config\DB;

abstract class Model
{
    protected static function db(): \PDO {
        return DB::conn();
    }
}
