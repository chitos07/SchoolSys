<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper n20 border">
            <label<?= $this->labelFloat('years', $stage) ?>> <?= $text_label_systemTypes ?></label>
            <input required type="text" name="years" maxlength="10" value="<?= $this->showValue('years', $stage) ?>">
        </div>
      
     
  
        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form> 