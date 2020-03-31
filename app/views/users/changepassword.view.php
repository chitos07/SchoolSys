<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>


        <div class="">
            
            <input class="form-control" placeholder="<?=  $text_label_Password ?>" required type="password" name="Password" value="<?=  $this->showValue('Password') ?>">
        </div>
        <div class="mt-3">
            <input class="form-control" placeholder="<?=  $text_label_CPassword ?>" required type="password" name="CPassword" value="<?=  $this->showValue('CPassword') ?>">
        </div>
        <input class="btn btn-primary mt-lg-2 btn-lg" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>