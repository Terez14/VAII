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
        if(isset($_POST['komentar'])) {
            if ($this->app->getAuth()->isLogged()) {
                $recenzia = new Recenzia($this->app->getAuth()->getLoggedUser()->getId(), $_POST['komentar'], $_POST['znamka']);
                $recenzia->save();
                $this->presmeruj();
            }
        }
        return $this->html([], 'pridaj');
    }
    public function presmeruj() {
        header("Location: ?c=recenzia");
    }
}