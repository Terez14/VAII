
<?php
/** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */
?>

<style>
    <?php include 'flora.css';?>
</style>

<div class="container" >
    <div class="recenzia">
        <div class="bd-example">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Pouzivatel</th>
                <th scope="col">Komentar</th>
                <th scope="col">Hodnotenie</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $recenzie = App\Models\Recenzia::getAll();
            $pouzivatelia = App\Models\Pouzivatel::getAll();
            $i=0;
            foreach ($recenzie as $recenzia) {
                  $i++;
                  foreach ($pouzivatelia as $pouzivatel) {
                      if($recenzia->getPouzivatelId() == $pouzivatel->getId()) {?>
                          <tr>
                              <th scope="row"><?=$i?></th>
                              <td><?= $pouzivatel->getMeno() ?> <?= $pouzivatel->getPriezvisko() ?></td>
                              <td><?= $recenzia->getKomentar() ?></td>
                              <td><?= $recenzia->getZnamka() ?></td>
                          </tr>
                      <?php } ?>
                  <?php } ?>
             <?php } ?>
          </tbody>
        </table>
        </div>

    </div>
    <?php if ($auth->isLogged()) { ?>
        <a href="?c=recenzia&a=pridaj" class="btn btn-dark btn-bg">Pridaj recenziu</a>
    <?php } ?>
</div>
