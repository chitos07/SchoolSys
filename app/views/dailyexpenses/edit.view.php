<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>


        <div class="">

            <input class="form-control" placeholder="<?= $text_table_payment?>" required type="text" name="Payment" value="<?=  $this->showValue('Payment' , $expenses) ?>">
        </div>
        <div class="mt-3">
            <select class="form-control" required name="ExpenseId">
                <option value=""><?= $text_user_ExpenseId ?></option>
                <?php if (false !== $groups): foreach ($groups as $group): ?>
                    <option value="<?= $group->ExpenseId ?>"  <?=  $this->selectedIf('ExpenseId',$group->ExpenseId, $expenses)  ?>   ><?= $group->ExpenseName ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>