
<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>


        <div class="input_wrapper n50">

            <input class="form-control" placeholder="<?= $text_label_ded_resone ?>" required type="text" name="advancepayment" id="ExpenseName" maxlength="20" value="<?= $this->showValue('advancePayment',$advncet) ?>">
        </div>
        <div class="mt-3">
            <select class="form-control" required name="employee_id">
                <option value=""><?= $text_label_emp_name ?></option>
                <?php if (false !== $emp): foreach ($emp as $emps): ?>
                    <option value="<?= $emps->Id ?>" <?=  $this->selectedif('employee_id', $emps->Id,$advncet) ?>><?= $emps->employeeName ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>

        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>

</form>


