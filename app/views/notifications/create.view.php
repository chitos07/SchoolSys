<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper n20 border">
            <label<?= $this->labelFloat('employeeName') ?>><?= $text_label_Name ?></label>
            <input required type="text" name="employeeName" maxlength="20" value="<?= $this->showValue('employeeName') ?>">
        </div>
        <div class="input_wrapper n20 border padding">
            <label<?= $this->labelFloat('employeeNumber') ?>><?= $text_label_phone ?></label>
            <input required type="text" name="employeeNumber" maxlength="20" value="<?= $this->showValue('employeeNumber') ?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label <?=  $this->labelFloat('employeeAdress')  ?>><?= $text_label_adress?></label>
            <input required type="text" name="employeeAdress" maxlength="30" value="<?=  $this->showValue('employeeAdress') ?>">
        </div>
        <div class="input_wrapper n20 border padding">
            <label <?=  $this->labelFloat('employeeSalary')  ?>><?= $text_label_salary?></label>
            <input required type="text" name="employeeSalary" value="<?=  $this->showValue('employeeSalary') ?>">
        </div>


        <div class="input_wrapper_other padding n20 select">
            <select required name="theBranch_id">
                <option value=""><?= $text_label_brench ?></option>
                <?php if (false !== $brench): foreach ($brench as $brenchs): ?>
                    <option value="<?= $brenchs->Id ?>"><?= $brenchs->Name  ?> <?= $brenchs->Area ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="input_wrapper_other padding n20 select">
            <select required name="employees_cat_id">
                <option value=""><?= $text_label_empcat ?></option>
                <?php if (false !== $empcat): foreach ($empcat as $empcats): ?>
                    <option value="<?= $empcats->Id ?>"><?= $empcats->Name  ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>