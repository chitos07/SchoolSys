<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper n20 border">
            <label<?= $this->labelFloat('Name', $system) ?>> <?= $text_label_systemTypes ?></label>
            <input  class="form-control" placeholder="<?= $text_label_systemTypes ?>"required type="text" name="Name" maxlength="10" value="<?= $this->showValue('Name', $system) ?>">
        </div>
      
     
  
        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form> 