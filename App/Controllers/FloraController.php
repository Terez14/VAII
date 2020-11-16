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
            $polozka = new Polozka($_POST['nazov'], $_POST['popis'], $_POST['obrazok']);
            $polozka->save();
            header("Location: ?c=flora");
        }
        return [];
    }
}