<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper n20 border">

            <input class="form-control" placeholder="<?= $text_label_Name ?>" required type="text" name="employeeName" maxlength="20" value="<?= $this->showValue('employeeName',$emp) ?>">
        </div>
        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_phone ?>" required type="text" name="employeeNumber" maxlength="20" value="<?= $this->showValue('employeeNumber',$emp) ?>">
        </div>
        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_adress?>" required type="text" name="employeeAdress" maxlength="30" value="<?=  $this->showValue('employeeAdress',$emp) ?>">
        </div>
        <div class="mt-3">
            <select  class="form-control" required name="employees_cat_id">
                <option value=""><?= $text_label_empcat ?></option>
                <?php if (false !== $empcat): foreach ($empcat as $empcats): ?>
                    <option value="<?= $empcats->Id ?>"<?= $this->selectedIf('employees_cat_id',$empcats->Id,$emp ) ?>><?= $empcats->Name  ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>

        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_salary?>" required type="text" name="employeeSalary" value="<?=  $this->showValue('employeeSalary',$emp) ?>">
        </div>



        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>