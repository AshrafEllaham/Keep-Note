<?php

namespace KeepNote\database\Concerns;

use KeepNote\database\managers\Contracts\DatabaseManager;


trait ConnectsTo
{
    public static function connect(DatabaseManager $manager)
    {
        return $manager->connect();
    }
}
