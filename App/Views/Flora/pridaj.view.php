<?php
/** @var Array $data */
?>
<div class="container pridaj">
    <div class="row">
        <div class="col">
            <form method="post">
                <div class="text-center text-danger mb-3">
                    <?= @$data['message'] ?>
                </div>
                <div class="form-group">
                    <label>Nazov</label>
                    <input type="text" name="nazov" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Popis</label>
                    <textarea name="popis" class="form-control" required></textarea>
                </div>
                <div class="form-group">

                    <label>Adresa obrazka</label>
                    <input type="text" name="obrazok" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Odosli</button>
            </form>
        </div>
    </div>
</div>
