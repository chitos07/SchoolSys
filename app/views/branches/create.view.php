<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper n20 border">
            <input  class="form-control" placeholder="<?= $text_table_adress ?>" required type="text" name="Adress" maxlength="20" value="<?= $this->showValue('Adress') ?>">
        </div>
        <div class="input_wrapper n20 border">
            <input class="form-control" placeholder="<?= $text_table_area ?>" required type="text" name="area" maxlength="20" value="<?= $this->showValue('area') ?>">
        </div>

        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>


