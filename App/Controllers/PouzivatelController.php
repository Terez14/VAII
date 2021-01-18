<?php


namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Models\Polozka;
use App\Models\Pouzivatel;
class PouzivatelController extends AControllerBase
{

    public function index()
    {
        return $this->html([], 'index');

    }

    public function pouzivatelia() {
        $pouzivatelia = Pouzivatel::getAll();
        return $this->json($pouzivatelia);
    }

    public function vsetci()
    {
        if ($this->app->getAuth()->isLogged()&& $this->app->getAuth()->getLoggedUser()->getJeAdmin()=="1") {
            return $this->html();
        } else {
            $this->presmeruj();
        }
    }

    public function osUdaje() {
        if ($this->app->getAuth()->isLogged()) {
            return $this->html();
        } else {
            $this->presmeruj();
        }
    }

    public function pridaj()
    {
        $data=[];
        if(isset($_POST['meno'])) {
            $pouzivatelia = Pouzivatel::getAll();
            foreach ($pouzivatelia as $pouzivatel) {
                if ($pouzivatel->getLogin() == $_POST['login']) {
                    $data = ['message' => 'Login uz existuje!'];
                    return $this->html($data, 'pridaj');
                }
            }
            if ($_POST['passwordRaz'] ==  $_POST['passwordDva'] ) {
                $pouzivatel = new Pouzivatel($_POST['login'], password_hash($_POST['passwordRaz'], PASSWORD_DEFAULT), $_POST['meno'], $_POST['priezvisko'], $_POST['kontakt'], "0");
                $pouzivatel->save();
                $data = [];
                $this->presmeruj();
            } else {
                $data = ['message' => 'Hesla sa nezhoduju!'];
            }
        }
        return $this->html($data, 'pridaj');
    }

    public function prihlasenie() {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=pouzivatel');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data, 'prihlasenie');
    }

    public function odhlasit() {
        $this->app->getAuth()->logout();
        $this->presmeruj();
        return $this->html([], 'index');
    }

    public function jePrihlaseny() {
        return isset($_SESSION['pouzivatel']) && $_SESSION['pouzivatel'] != null;
    }


    public function uprav() {
        $data=[];
        if ($this->app->getAuth()->isLogged()) {
            if(isset($_POST['meno'])) {
                $pouzivatelia = Pouzivatel::getAll();
                foreach ($pouzivatelia as $pouzivatel) {
                    if ($pouzivatel->getLogin() == $_POST['login']) {
                        $data = ['message' => 'Login uz existuje!'];
                    }
                }
                $this->app->getAuth()->getLoggedUser()->setMeno($_POST['meno']);
                $this->app->getAuth()->getLoggedUser()->setPriezvisko($_POST['priezvisko']);
                $this->app->getAuth()->getLoggedUser()->setKontakt($_POST['kontakt']);
                $this->app->getAuth()->getLoggedUser()->setLogin($_POST['login']);
                $this->app->getAuth()->getLoggedUser()->save();
                $logged = $this->app->getAuth()->login($this->app->getAuth()->getLoggedUser()->getLogin(), $_POST['passwordStare']);
                if ($logged) {
                    $this->app->getAuth()->getLoggedUser()->setPassword(password_hash($_POST['passwordNove'], PASSWORD_DEFAULT));
                    $this->app->getAuth()->getLoggedUser()->save();
                    $data = [];
                    $this->presmeruj();
                }
                else {
                    $data = ['message' => 'Nespravne zadane stare heslo!'];
                }
            }
        }
        return $this->html($data, 'uprav');
    }

    public function presmeruj() {
        header("Location: ?c=pouzivatel");
    }
}