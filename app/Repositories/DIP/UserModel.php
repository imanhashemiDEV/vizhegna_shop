<?php

namespace App\Repositories\DIP;

class UserModel
{

    public $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database=$database;
    }

    public function saveUser()
    {
        $this->database->saveData();
    }
}
