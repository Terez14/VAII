<?php
/** @var Array $data */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body prihlas">
                    <h5 class="card-title text-center">Prihlásenie</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <div>
                    <form class="form-signin" method="post" ">
                        <div class="form-label-group">
                            <input name="login" type="text" id="login" class="form-control" placeholder="login"
                                   required autofocus>
                        </div>
                        <br>
                        <div class="form-label-group">
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="password" required>
                        </div>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Prihlásiť</button>
                    </div>

                    </form>
                    <p>Ak nie ste zaregistrovany zaregistrujte sa <a href="?c=pouzivatel&a=pridaj">Registracia</a></p>

                </div>
            </div>
        </div>
    </div>
</div>