<?php
/** @var Array $data */
/** @var \App\Models\Polozka $polozka */
$polozka = $data['polozka'];
?>

<div class="container formular">
    <div class="row">
        <div class="col">
            <form method="post">
                <div class="form-group">
                    <label>Nazov</label>
                    <input type="text" name="nazov" class="form-control" value="<?=$polozka->getNazov()?>" required>
                </div>
                <div class="form-group">
                    <label>Popis</label>
                    <textarea name="popis" class="form-control"><?=$polozka->getPopis()?></textarea>
                </div>
                <div class="form-group">
                    <label>Adresa Obrazka</label>
                    <input type="text" name="obrazok" class="form-control" value="<?=$polozka->getObrazok()?>" required>
                </div>
                <div>
                <button type="submit" class="btn btn-success">Odosli</button>
                </div>
                <br>
                <div>
                    <a href="?c=flora" class="btn btn-success btn-bg">Spat</a>
                </div>
            </form>
        </div>
    </div>
</div>