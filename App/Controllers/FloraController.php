<?php


namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Polozka;

class FloraController extends AControllerBase
{
    public function authorize($action)
    {
        return $this->app->getAuth()->isLogged();
    }

    public function index()
    {
        return $this->html();
    }

    public function polozky() {
        $polozka = Polozka::getAll();
        return $this->json($polozka);
    }

    public function pridaj()
    {
        if ($this->app->getAuth()->isLogged()) {
            if (isset($_POST['nazov'])) {

                $polozka = new Polozka($this->app->getAuth()->getLoggedUser()->getId(), $_POST['nazov'], $_POST['popis'], $_POST['obrazok']);
                $polozka->save();
                $this->presmeruj();
            }
        }
        return $this->html([], 'pridaj');
    }

    public function uprav() {
        $polozka = Polozka::getOne($_GET['id']);
        if(isset($_POST['nazov'])) {
            if ($_POST['nazov'] == null || $_POST['popis'] == null || $_POST['obrazok'] == null) {
                $this->presmeruj();
            } else {
                $polozka->setNazov($_POST['nazov']);
                $polozka->setPopis($_POST['popis']);
                $polozka->setObrazok($_POST['obrazok']);
                $polozka->save();
                $this->presmeruj();
            }
        }
        return $this->html(['polozka'=>$polozka], 'uprav');

    }

    public function zmaz()
    {
        if(isset($_GET['id'])) {
            $polozka = Polozka::getOne($_GET['id']);
            $polozka->delete();
        }
        $this->presmeruj();
        exit();
    }

    public function presmeruj() {
        header("Location: ?c=flora");
    }
}