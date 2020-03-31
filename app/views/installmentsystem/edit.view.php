<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n50">
            <label></label>
            <input class="form-control" placeholder="<?= $text_label_Name ?>"required type="text" name="installmentNumbers" value="<?= $this->showValue('installmentNumbers', $installment) ?>">
        </div>


        <div class="input_wrapper n50">
            <label></label>
            <input  class="form-control" placeholder="<?= $text_label_date1 ?>" type="date" name="Date1" maxlength="20" value="<?= $this->showValue('Date1',$installment) ?>">
        </div>

        <div class="input_wrapper n50">
            <label></label>
            <input  class="form-control" placeholder="<?= $text_label_date2 ?>"  type="date" name="Date2" maxlength="20" value="<?= $this->showValue('Date2',$installment) ?>">
        </div>
        <div class="input_wrapper n50">
            <label></label>
            <input  class="form-control" placeholder="<?= $text_label_date3 ?>" type="date" name="Date3" id="ExpenseName" maxlength="20" value="<?= $this->showValue('Date3',$installment) ?>">
        </div>
        <div class="input_wrapper n50">
            <label></label>
            <input  class="form-control" placeholder="<?= $text_label_date4 ?>" type="date" name="Date4" id="ExpenseName" maxlength="20" value="<?= $this->showValue('Date4',$installment) ?>">
        </div>
        <div class="input_wrapper n50">
            <label></label>
            <input class="form-control" placeholder="<?= $text_label_date5 ?>"  type="date" name="Date5"  maxlength="20" value="<?= $this->showValue('Date5',$installment) ?>">
        </div>



        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>

</form>

