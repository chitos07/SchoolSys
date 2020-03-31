<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper n20 border">
            <label<?= $this->labelFloat('employeeName',$emp) ?>><?= $text_label_Name ?></label>
            <input required type="text" name="employeeName" maxlength="20" value="<?= $this->showValue('employeeName',$emp) ?>">
        </div>
        <div class="input_wrapper n20 border padding">
            <label<?= $this->labelFloat('employeeNumber',$emp) ?>><?= $text_label_phone ?></label>
            <input required type="text" name="employeeNumber" maxlength="20" value="<?= $this->showValue('employeeNumber',$emp) ?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label <?=  $this->labelFloat('employeeAdress',$emp)  ?>><?= $text_label_adress?></label>
            <input required type="text" name="employeeAdress" maxlength="30" value="<?=  $this->showValue('employeeAdress',$emp) ?>">
        </div>
        <div class="input_wrapper n20 border padding">
            <label <?=  $this->labelFloat('employeeSalary',$emp)  ?>><?= $text_label_salary?></label>
            <input required type="text" name="employeeSalary" value="<?=  $this->showValue('employeeSalary',$emp) ?>">
        </div>
        <div class="input_wrapper n20 padding">
            <label <?=  $this->labelFloat('employeeNetSalary',$emp)  ?>><?= $text_label_netsalary?></label>
            <input required type="text" name="employeeNetSalary" value="<?=  $this->showValue('employeeNetSalary',$emp) ?>">
        </div>
        <div class="input_wrapper n30 border padding">
            <label  <?=  $this->labelFloat('deductions_id',$emp)  ?> > <?= $text_label_deductions?></label>
            <input required type="text" name="deductions_id" maxlength="40" value="<?=  $this->showValue('deductions_id',$emp) ?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label  <?=  $this->labelFloat('advancePayment_id', $emp)  ?> ><?= $text_label_advpay?></label>
            <input required type="text" name="advancePayment_id" value="<?=  $this->showValue('advancePayment_id',$emp) ?>">
        </div>
        <div class="input_wrapper_other padding n20 select">
            <select required name="theBranch_id">
                <option value=""><?= $text_label_brench ?></option>
                <?php if (false !== $brench): foreach ($brench as $brenchs): ?>
                    <option value="<?= $brenchs->Id ?>" <?= $this->selectedIf('theBranch_id',$brenchs->Id,$emp ) ?>><?= $brenchs->Name  ?> <?= $brenchs->Area ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="input_wrapper_other padding n20 select">
            <select required name="employees_cat_id">
                <option value=""><?= $text_label_empcat ?></option>
                <?php if (false !== $empcat): foreach ($empcat as $empcats): ?>
                    <option value="<?= $empcats->Id ?>"<?= $this->selectedIf('employees_cat_id',$empcats->Id,$emp ) ?>><?= $empcats->Name  ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>