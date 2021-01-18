<?php
/** @var Array $data */
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post">
                <div class="form-group">
                    <label>Meno</label>
                    <input type="text" name="meno" class="form-control "  required>

                </div>
                <div class="form-group">
                    <label>Priezvisko</label>
                    <input type="text" name="priezvisko" class="form-control "  required>

                </div>
                <div class="form-group">
                        <label >Email</label>
                        <input type="email" name="kontakt" class="form-control " required>
                </div>
                <div class="form-group">
                    <label>login</label>
                    <input type="text" name="login" class="form-control "  required>
                </div>
                <div class="text-center text-danger mb-3">
                    <?= @$data['message'] ?>
                </div>
                <div class="form-group">
                    <label>Heslo</label>
                    <input type="password" name="passwordRaz" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label>Znova zadajte heslo</label>
                    <input type="password" name="passwordDva" class="form-control"  required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>