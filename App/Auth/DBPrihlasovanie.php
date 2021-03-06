<?php

namespace App\Auth;

use App\Core\APrihlasovanie;
use App\Models\Pouzivatel;


class DBPrihlasovanie extends APrihlasovanie
{

    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    function login($login, $password)
    {
        $foundUser = Pouzivatel::getAll("login = ?", [$login]);

        if (count($foundUser) == 1) {
            $foundUser = $foundUser[0];
            if (password_verify($password, $foundUser->getPassword())) {
                $_SESSION['pouzivatel'] = $foundUser;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    function logout()
    {
        if (isset($_SESSION["pouzivatel"])) {
            unset($_SESSION["pouzivatel"]);
            session_destroy();
        }
    }


    /**
     * @return Pouzivatel
     */
    function getLoggedUser(): Pouzivatel
    {
        return $_SESSION['pouzivatel'];
    }

    /**
     * @return bool
     */
    function isLogged()
    {
        return isset($_SESSION['pouzivatel']) && $_SESSION['pouzivatel'] != null;
    }
}