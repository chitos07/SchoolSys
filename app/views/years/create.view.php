<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper n20 border">
            <label<?= $this->labelFloat('years') ?>><?= $text_label_systemTypes ?></label>
            <input required type="text" name="years" maxlength="20" value="<?= $this->showValue('years') ?>">
        </div>
      
     
  
        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form> 