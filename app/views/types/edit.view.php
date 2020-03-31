<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper n20 border">
            <label<?= $this->labelFloat('systemTypes', $types) ?>> </label>
            <input class="form-control" placeholder="<?= $text_label_systemTypes ?>" required type="text" name="systemTypes" maxlength="10" value="<?= $this->showValue('systemTypes', $types) ?>">
        </div>
      
     
  
        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form> 