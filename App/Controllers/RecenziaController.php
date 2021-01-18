<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Polozka;
use App\Models\Recenzia;

class RecenziaController extends AControllerBase
{

    public function index()
    {
        return $this->html();
    }


    public function pridaj()
    {
        if ($this->app->getAuth()->isLogged()) {

            if (isset($_POST['komentar'])) {
                $recenzia = new Recenzia($this->app->getAuth()->getLoggedUser()->getId(), $_POST['komentar'], $_POST['znamka']);
                $recenzia->save();
                $this->presmeruj();
            }
            return $this->html([], 'pridaj');
        } else {
            $this->presmeruj();
        }

    }
    public function presmeruj() {
        header("Location: ?c=recenzia");
    }
}