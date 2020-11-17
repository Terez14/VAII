<?php /** @var Array $data */ ?>

<style>
    <?php
        include 'izboveRastliny.css';
    ?>
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Izbové rastliny</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">

                <a href="?c=flora&a=pridaj" class="btn btn-secondary btn-bg">Pridaj polozku</a>
                <div class="row">
                <?php
                /** @var \App\Models\Polozka $polozka */

                foreach ($data['polozka'] as $polozka) { ?>
                            <div class="col-lg-4">
                                <img src="<?= $polozka->getObrazok() ?>" alt="obr">
                                <h2><?= $polozka->getNazov() ?></h2>
                                <p><?= $polozka->getPopis() ?></p>
                                <a href="?c=flora&a=uprav&id=<?= $polozka->getId() ?>" class="btn btn-primary btn-sm">Uprav</a>
                                <a href="?c=flora&a=zmaz&id=<?= $polozka->getId() ?>" class="btn btn-danger btn-sm">Zmaz</a>
                            </div>

                <?php } ?>
            </div>
            </div>
        </div>
    </div>

</body>
</html>