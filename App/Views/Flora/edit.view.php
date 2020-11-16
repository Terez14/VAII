<?php
/** @var Array $data */
/** @var \App\Models\Polozka $polozka */
$polozka = $data['polozka'];
?>

<div class="container">
    <div class="row">
        <div class="col">
            <form method="post">
                <div class="form-group">
                    <label>Nazov</label>
                    <input type="text" name="nazov" class="form-control" value="<?=$polozka->getNazov()?>">
                </div>
                <div class="form-group">
                    <label>Popis</label>
                    <textarea name="popis" class="form-control"><?=$polozka->getPopis()?></textarea>
                </div>
                <div class="form-group">
                    <label>Adresa Obrazka</label>
                    <textarea name="obrazok" class="form-control"><?=$polozka->getObrazok()?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>