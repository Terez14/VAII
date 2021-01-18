<?php

namespace App\Core;

use App\Models\Pouzivatel;

abstract class APrihlasovanie
{
    protected static $instance;

    static public function getInstance(): APrihlasovanie
    {

        if (APrihlasovanie::$instance == null) {
            APrihlasovanie::$instance = new static();
        }
        return APrihlasovanie::$instance;
    }

    abstract function login($userLogin, $pass);

    abstract function logout();

    abstract function getLoggedUser(): Pouzivatel;

    abstract function isLogged();

}