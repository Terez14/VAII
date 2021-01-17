
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
            <th scope="col">#</th>
            <th scope="col">Pouzivatel</th>
            <th scope="col">Komentar</th>
            <th scope="col">Hodnotenie</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $recenzie = App\Models\Recenzia::getAll();
          $i=0;
          foreach ($recenzie as $recenzia) {
                  $i++;?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td>1</td>
                    <td><?= $recenzia->getKomentar() ?></td>
                    <td><?= $recenzia->getZnamka() ?></td>
                  </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>

    </div>
    <?php if ($auth->isLogged()) { ?>
        <a href="?c=recenzia&a=pridaj" class="btn btn-dark btn-bg">Pridaj recenziu</a>
    <?php } ?>
</div>
