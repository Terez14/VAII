<?php
/** @var Array $data */
/** @var \App\Models\Pouzivatel $pouzivatel */

?>
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post">
                <div class="form-group">
                    <label>Meno</label>
                    <input type="text" name="meno" class="form-control">
                </div>
                <div class="form-group">
                    <label>Priezvisko</label>
                    <input type="text" name="priezvisko" class="form-control">
                </div>
                <div class="form-group">
                    <label>Kontakt</label>
                    <input type="text" name="kontakt" class="form-control">
                </div>
                <div class="form-group">
                    <label>login</label>
                    <input type="text" name="login" class="form-control">
                </div>

                <div class="form-group">
                    <label>heslo</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>