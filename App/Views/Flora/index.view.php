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

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#"> <img src="https://urobsisam.zoznam.sk/wp-content/uploads/2019/12/perex-2-840x560.jpg" alt="Logo"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../semPraca/flora.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="?c=flora">Izbove rastliny </a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Hladaj" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Hladaj</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="?c=flora&a=pridaj" class="btn btn-primary btn-sm">Pridaj polozku</a>
                <?php
                /** @var \App\Models\Polozka $polozka */

                foreach ($data['polozka'] as $polozka) { ?>
                    <div class="container marketing">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="<?= $polozka->getObrazok() ?>" alt="obr">
                                <h2><?= $polozka->getNazov() ?></h2>
                                <p><?= $polozka->getPopis() ?></p>
                                <a href="?c=flora&a=edit&id=<?= $polozka->getId() ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="?c=flora&a=zmaz&id=<?= $polozka->getId() ?>" class="btn btn-danger btn-sm">Zmaz</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

</body>
</html>