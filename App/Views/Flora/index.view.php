<?php
/** @var Array $data */
/** @var \App\Core\APrihlasovanie $auth */
?>
    <div class="container flora">
        <div class="row">
            <div class="col" >
                <datalist>
                    <option id="id" value="<?=$auth->getLoggedUser()->getId()?>">
                </datalist>
                    <h1>Rastliny ktore pozname</h1>
                    <div >
                        <a href="?c=flora&a=pridaj" class="btn btn-secondary btn-bg" >Pridaj polozku</a>

                    </div>
                <div class="text-center text-danger mb-3">
                    <?= @$data['message'] ?>
                </div>
                <br>
                <div class="row" id="polozky">

                </div>

            </div>
        </div>
    </div>