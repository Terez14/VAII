<?php


namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Polozka;
use App\Models\Pouzivatel;
class PouzivatelController extends AControllerBase
{

    public function index()
    {
        return $this->html([], 'index');
        session_start();
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
        $data = [];
        if(isset($_POST['login']) && isset($_POST['password'])) {
            $pouzivatelia = Pouzivatel::getAll();
            foreach ($pouzivatelia as $pouzivatel) {
                if ($pouzivatel->getLogin() == $_POST['login']){
                    if (password_verify($_POST['password'], $pouzivatel->getPassword())){
                        $_SESSION['pouzivatel'] = $pouzivatel;
                        $this->presmeruj();
                        return $this->html($data, 'prihlasenie');
                    } else {

                        $data =  ['message' => 'Zle heslo!'];
                        return $this->html($data, 'prihlasenie');
                    }
                }
            }
        }
        $data =  ['message' => 'Zly login!'];
        return $this->html($data, 'prihlasenie');
    }

    public function odhlasit() {
        if (isset($_SESSION["pouzivatel"])) {
            unset($_SESSION["pouzivatel"]);
            session_destroy();
        }
        return $this->html([], 'index');
    }

    public function uprav() {

        return $this->html([], 'uprav');
    }

    public function presmeruj() {
        header("Location: ?c=pouzivatel");
    }
}