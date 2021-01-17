<?php
/** @var string $contentHTML */
/** @var \App\Controllers\PouzivatelController $pouzivatel */
$pouzivatel = \App\Models\Pouzivatel::getAll();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Flóra</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="?c=pouzivatel">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="?c=flora">Izbove rastliny </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="?c=pouzivatel&a=uprav">Osobne udaje</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="?c=recenzie">Recenzie</a>
                </li>
            </ul>
             <form class="form-inline mt-2 mt-md-0">
                <a href="?c=pouzivatel&a=pridaj" class="btn btn-secondary btn-bg">Registracia</a>
            </form>
            <form class="form-inline mt-2 mt-md-0">
                <a href="?c=pouzivatel&a=prihlasenie" class="btn btn-secondary btn-bg">Prihlasenie</a>
            </form>
            <form class="form-inline mt-2 mt-md-0">
                <a href="?c=pouzivatel&a=odhlasit" class="btn btn-secondary btn-bg">Odhlasit</a>
            </form>
        </div>
    </nav>

    <div class="web-content">
        <?= $contentHTML ?>
    </div>
    </body>
</html>
