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
                    if($_POST['znamka'] == 1) {
                        $recenzia = new Recenzia($this->app->getAuth()->getLoggedUser()->getId(), $_POST['komentar'], ":(");
                        $recenzia->save();
                        $this->presmeruj();
                    } else if ($_POST['znamka'] == 1){
                        $recenzia = new Recenzia($this->app->getAuth()->getLoggedUser()->getId(), $_POST['komentar'], "*");
                        $recenzia->save();
                        $this->presmeruj();
                    } else if ($_POST['znamka'] == 1){
                        $recenzia = new Recenzia($this->app->getAuth()->getLoggedUser()->getId(), $_POST['komentar'], "**");
                        $recenzia->save();
                        $this->presmeruj();
                    }  else if ($_POST['znamka'] == 1){
                        $recenzia = new Recenzia($this->app->getAuth()->getLoggedUser()->getId(), $_POST['komentar'], "***");
                        $recenzia->save();
                        $this->presmeruj();
                    }  else if ($_POST['znamka'] == 1){
                        $recenzia = new Recenzia($this->app->getAuth()->getLoggedUser()->getId(), $_POST['komentar'], "****");
                        $recenzia->save();
                        $this->presmeruj();
                    }  else if ($_POST['znamka'] == 1){
                        $recenzia = new Recenzia($this->app->getAuth()->getLoggedUser()->getId(), $_POST['komentar'], "*****");
                        $recenzia->save();
                        $this->presmeruj();
                    }  else {
                        $recenzia = new Recenzia($this->app->getAuth()->getLoggedUser()->getId(), $_POST['komentar'], "zle");
                        $recenzia->save();
                        $this->presmeruj();
                    }
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