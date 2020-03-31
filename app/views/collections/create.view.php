
<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper_other padding n20 select">
            <select class="form-control" required name="StudentId">
                <option value=""><?= $text_label_StudentName ?></option>
                <?php if (false !== $student): foreach ($student as $students): ?>
                    <option value="<?= $students->Id ?>"><?= $students->studnetName ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="mt-3">
            <select class="form-control" required name="ExpensesId">
                <option value=""><?= $text_label_expensescat ?></option>
                <?php if (false !== $expensescat): foreach ($expensescat as $expensescats): ?>
                    <option value="<?= $expensescats->ExpenseId ?>"><?= $expensescats->ExpenseName ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_systemTypes ?>" required type="text" name="money" maxlength="20" value="<?= $this->showValue('money') ?>">
        </div>
  
        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>


