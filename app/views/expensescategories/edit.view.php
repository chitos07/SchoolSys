<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n50">

            <input  class="form-control" placeholder="<?= $text_label_Name ?>" required type="text" name="ExpenseName" id="ExpenseName" maxlength="20" value="<?= $this->showValue('ExpenseName' , $expenses) ?>">
        </div>
        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_fixed_payment ?>"required type="text" name="FixedPayment" id="FixedPayment" maxlength="20" value="<?= $this->showValue('FixedPayment' , $expenses) ?>">
        </div>


        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>