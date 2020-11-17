<?php


namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Polozka;

class FloraController extends AControllerBase
{

    public function index()
    {
        return [
            'polozka' => Polozka::getAll()
        ];
    }

    public function pridaj()
    {
        if(isset($_POST['nazov'])) {
            if ($_POST['nazov'] == null || $_POST['popis'] == null || $_POST['obrazok'] == null) {
                $this->presmeruj();
            } else {
                $polozka = new Polozka($_POST['nazov'], $_POST['popis'], $_POST['obrazok']);
                $polozka->save();
                $this->presmeruj();
            }
        }
        return [];
    }

    public function uprav() {
        $id = $_GET['id'];
        $polozka = new Polozka();
        $polozka->getOne($id);
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
        return['polozka'=>$polozka];

    }

    public function zmaz()
    {
        $id = $_GET['id'];
        $polozka = new Polozka();
        $polozka->getOne($id);
        $polozka->delete();
        $this->presmeruj();
        exit();
    }

    public function presmeruj() {
        header("Location: ?c=flora");
    }
}