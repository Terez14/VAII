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

    public function pridaj()
    {
        if(isset($_POST['meno'])) {
            if ($_POST['login'] == null || $_POST['password'] == null) {
                $this->presmeruj();
            } else {
                $pouzivatel = new Pouzivatel($_POST['login'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['meno'], $_POST['priezvisko'], $_POST['kontakt']);
                $pouzivatel->save();
                $this->presmeruj();
            }
        }
        return $this->html([], 'pridaj');
    }

    public function prihlasenie() {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=flora');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data, 'prihlasenie');
    }

    public function odhlasit() {
        $this->app->getAuth()->logout();

        return $this->html([], 'index');
    }

    public function jePrihlaseny() {
        return isset($_SESSION['pouzivatel']) && $_SESSION['pouzivatel'] != null;
    }


    public function uprav() {

        return $this->html([], 'uprav');
    }

    public function presmeruj() {
        header("Location: ?c=pouzivatel");
    }
}