<?php
/** @var string $contentHTML */
/** @var \App\Core\AAuthenticator $auth */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Flóra</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="flora.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="?c=pouzivatel">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="?c=recenzia">Recenzie</a>
                </li>
                <?php if ($auth->isLogged()) { ?>
                <li class="nav-item active">
                    <a class="nav-link " href="?c=flora">Izbove rastliny </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="?c=pouzivatel&a=uprav">Osobne udaje</a>
                </li>
                <?php }  ?>
            </ul>
            <?php if ($auth->isLogged()) { ?>
                <h5> Prihlásený používateľ: <?=$auth->getLoggedUser()->getLogin() ?></h5>
                <h5> ID: <?=$auth->getLoggedUser()->getId() ?></h5>
                <form class="form-inline mt-2 mt-md-0">
                    <a href="?c=pouzivatel&a=odhlasit" class="btn btn-secondary btn-bg">Odhlasit</a>
                </form>
            <?php } else {?>
                <form class="form-inline mt-2 mt-md-0">
                <a href="?c=pouzivatel&a=pridaj" class="btn btn-secondary btn-bg">Registracia</a>
            </form>
            <form class="form-inline mt-2 mt-md-0">
                <a href="?c=pouzivatel&a=prihlasenie" class="btn btn-secondary btn-bg">Prihlasenie</a>
            </form>
            <?php }  ?>
        </div>
    </nav>

    <div class="web-content">
        <?= $contentHTML ?>
    </div>
    </body>
</html>
