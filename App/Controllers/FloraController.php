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
        $data=[];
            if (isset($_POST['nazov'])) {
                if (strpos($_POST['obrazok'], 'https://') !== false) {
                    if (preg_match('~[0-9]+~', $_POST['nazov'])) {
                        $data = ['message' => 'Nazov nesmie obsahovat cislo!'];
                    } else {
                        $polozka = new Polozka($this->app->getAuth()->getLoggedUser()->getId(), $_POST['nazov'], $_POST['popis'], $_POST['obrazok']);
                        $polozka->save();
                        $this->presmeruj();
                    }

                }else{
                    $data = ['message' => 'obrazok musi byt webovy odkaz zacinajuci sa https://!'];
                }
            }
        return $this->html($data, 'pridaj');
    }

    public function uprav() {

        $polozka = Polozka::getOne($_GET['id']);
        if(isset($_POST['nazov'])) {
            if (strpos($_POST['obrazok'], 'https://') !== false) {
                if (preg_match('~[0-9]+~', $_POST['nazov'])) {
                    $data = ['message' => 'Nepodarilo sa upravit. Nazov nesmie obsahovat cislo!'];
                    return $this->html($data, 'index');
                } else {
                    $polozka->setNazov($_POST['nazov']);
                    $polozka->setPopis($_POST['popis']);
                    $polozka->setObrazok($_POST['obrazok']);
                    $polozka->save();
                    $this->presmeruj();
                }

            }else{
                $data = ['message' => 'Nepodarilo sa upravit. Obrazok musi byt webovy odkaz zacinajuci sa https://!'];
                return $this->html($data, 'index');
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