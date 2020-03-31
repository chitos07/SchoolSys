<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="">

            <input class="form-control" placeholder="<?= $text_label_Name ?>" required type="text" name="activities"  maxlength="20" value="<?= $this->showValue('activities') ?>">
        </div>


        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>