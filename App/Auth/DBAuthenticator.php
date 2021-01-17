<?php

namespace App\Auth;

use App\Core\AAuthenticator;
use App\Models\Pouzivatel;

/**
 * Class DBAuthenticator
 * @package App\Auth
 */
class DBAuthenticator extends AAuthenticator
{
    /**
     * DBAuthenticator constructor
     */
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

    /**
     * Logout the user
     */
    function logout()
    {
        if (isset($_SESSION["pouzivatel"])) {
            unset($_SESSION["pouzivatel"]);
            session_destroy();
        }
    }


    /**
     * Get an instance of the logged in user
     * @return User
     */
    function getLoggedUser(): Pouzivatel
    {
        return $_SESSION['pouzivatel'];
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    function isLogged()
    {
        return isset($_SESSION['pouzivatel']) && $_SESSION['pouzivatel'] != null;
    }
}