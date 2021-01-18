<?php
/** @var \App\Core\APrihlasovanie $auth */
?>
<div calss="container udaje">
    <div class="row">
        <div class="col">
            <div class="osobneUdaje">
                <h1>Osobne udaje</h1>
                    <div class="form-group">
                        <label>Meno: <?= $auth->getLoggedUser()->getMeno()?></label>
                    </div>
                    <div class="form-group">
                        <label>Priezvisko: <?= $auth->getLoggedUser()->getPriezvisko()?></label>
                    </div>
                    <div class="form-group">
                        <label >Email: <?= $auth->getLoggedUser()->getKontakt()?></label>
                       </div>
                    <div class="form-group">
                        <label>login: <?= $auth->getLoggedUser()->getLogin()?></label>
                    </div>
                    <div class="form-group">
                        <label>heslo: ********</label>
                    </div>
                    <div>
                        <a href="?c=pouzivatel&a=uprav" class="btn btn-success btn-bg">Zmenit udaje</a>
                        <a href="?c=pouzivatel" class="btn btn-success btn-bg">Spat</a>
                    </div>

            </div>
        </div>
    </div>
</div>