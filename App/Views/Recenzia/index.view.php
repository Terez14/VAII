
<?php
/** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */
?>

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
            <tbody id="recenzie">

          </tbody>
        </table>
        </div>

    </div>
    <?php if ($auth->isLogged()) { ?>
        <a href="?c=recenzia&a=pridaj" class="btn btn-dark btn-bg">Pridaj recenziu</a>
    <?php } ?>
    <div class="filter">
        <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="hodnota">
            <option value="vsetko">vsetko</option>
            <option value=":(">:(</option>
            <option value="*">*</option>
            <option value="**"selected>**</option>
            <option value="***">***</option>
            <option value="****">****</option>
            <option value="*****" >*****</option>
        </select>
</div>
