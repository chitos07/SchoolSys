<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n50">
            <label<?= $this->labelFloat('installmentNumbers') ?>></label>
            <input  class="form-control" placeholder="<?= $text_label_Name ?>" required type="text" name="installmentNumbers" value="<?= $this->showValue('installmentNumbers') ?>">
        </div>


        <div class="input_wrapper n50">
            <label<?= $this->labelFloat('Price') ?>></label>
            <input  class="form-control" placeholder="<?= $text_label_date1 ?>"  type="date" name="date1" id="ExpenseName" maxlength="20" value="<?= $this->showValue('Price') ?>">
        </div>

        <div class="input_wrapper n50">
            <label<?= $this->labelFloat('Price') ?>></label>
            <input class="form-control" placeholder="<?= $text_label_date2 ?>"   type="date" name="date2" id="ExpenseName" maxlength="20" value="<?= $this->showValue('Price') ?>">
        </div>
        <div class="input_wrapper n50">
            <label<?= $this->labelFloat('Price') ?>></label>
            <input  class="form-control" placeholder="<?= $text_label_date3 ?>"  type="date" name="date3" id="ExpenseName" maxlength="20" value="<?= $this->showValue('Price') ?>">
        </div>
        <div class="input_wrapper n50">
            <label<?= $this->labelFloat('Price') ?>></label>
            <input  class="form-control" placeholder="<?= $text_label_date4 ?>"  type="date" name="date4" id="ExpenseName" maxlength="20" value="<?= $this->showValue('Price') ?>">
        </div>
        <div class="input_wrapper n50">
            <label<?= $this->labelFloat('Price') ?>></label>
            <input  class="form-control" placeholder="<?= $text_label_date5 ?>"  type="date" name="date5" id="ExpenseName" maxlength="20" value="<?= $this->showValue('Price') ?>">
        </div>



        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>

</form>

