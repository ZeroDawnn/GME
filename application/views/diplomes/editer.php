<section class="container">
    <h1>Diplomes</h1>
    <h2>Editer</h2>
    <form>
        <div class="form-group">
            <label for="universite">Université</label>
            <select class="form-control" id="universite" name="universite">
                <?php
                foreach ($aUniversites as $codeU => $nomU) {
                    ?>
                    <option value = "<?= $codeU ?>"><?= $nomU ?></option>
                <?php } ?>
            </select>
        </div>
        <div class = "form-group">
            <label for="intitule">Intitulé</label>
            <input type="text" class="form-control" id="intitule" name="intitule" placeholder="DUT exemple">
        </div>
        <div class = "form-group">
            <label for="intitule">Intitulé</label>
            <input type="text" class="form-control" id="intitule" name="intitule" placeholder="DUT exemple">
        </div>
        <div class = "form-group">
            <label for="intitule">Intitulé</label>
            <input type="text" class="form-control" id="intitule" name="intitule" placeholder="DUT exemple">
        </div>
    </form>
</section>

