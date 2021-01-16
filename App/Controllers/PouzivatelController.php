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
    }

    public function pridaj()
    {
        if(isset($_POST['login'])) {
            if ($_POST['login'] == null || $_POST['password'] == null) {
                $this->presmeruj();
            } else {
                $pouzivatel = new Pouzivatel($_POST['login'], $_POST['password'], $_POST['meno'], $_POST['priezvisko'], $_POST['kontakt']);
                $pouzivatel->save();
                $this->presmeruj();
            }
        }
        return $this->html([], 'pridaj');
    }

    public function presmeruj() {
        header("Location: ?c=pouzivatel");
    }
}