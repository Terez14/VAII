<?php
/** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */

?>
<div class="container formular">
    <div class="row">
        <div class="col">
            <form method="post">
                <div class="form-group">
                    <label class="form">Meno</label>
                    <input type="text" name="meno" class="form-control" value="<?=$auth->getLoggedUser()->getMeno()?>">
                </div>
                <div class="form-group">
                    <label>Priezvisko</label>
                    <input type="text" name="priezvisko" class="form-control" value="<?=$auth->getLoggedUser()->getPriezvisko()?>">
                </div>
                <div class="form-group">
                    <label>Kontakt</label>
                    <input type="text" name="kontakt" class="form-control" value="<?=$auth->getLoggedUser()->getKontakt()?>">
                </div>
                <div class="form-group">
                    <label>login</label>
                    <input type="text" name="login" class="form-control" value="<?=$auth->getLoggedUser()->getLogin()?>">
                </div>
                <div class="text-center text-danger mb-3">
                    <?= @$data['message'] ?>
                </div>
                <div class="form-group">
                    <label>stare heslo</label>
                    <input type="password" name="passwordStare" class="form-control">
                </div>
                <div class="form-group">
                    <label>nove heslo</label>
                    <input type="password" name="passwordNove" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>