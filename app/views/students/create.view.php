<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>

        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_FirstName ?>" required type="text" name="studentName" maxlength="30" value="<?= $this->showValue('studentName') ?>">
        </div>
        <div class="mt-3">

            <input  class="form-control" placeholder="<?= $text_label_LastName?>" required type="text" name="age" maxlength="30" value="<?=  $this->showValue('age') ?>">
        </div>
        <div class="mt-3">
            <input class="form-control" placeholder="<?= $text_label_Password?>"  required type="text" name="adress" value="<?=  $this->showValue('adress') ?>">
        </div>
        <div class="mt-3">
            <select class="form-control" required name="StageId">
                <option value=""><?= $text_label_CPassword ?></option>
                <?php if (false !== $stages): foreach ($stages as $stage): ?>
                    <option value="<?= $stage->Id ?>"><?= $stage->name ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="mt-3">
            <select class="form-control" required name="SystemId">
                <option value=""><?= $text_label_Email ?></option>
                <?php if (false !== $system): foreach ($system as $systems): ?>
                    <option value="<?= $systems->Id ?>"><?= $systems->Name ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>

     

 

        <div class="mt-3">
            <select class="form-control" required name="installmentsystem">
                <option value=""><?= $text_label_installmentsystem ?></option>
                <?php if (false !== $installmentsystem): foreach ($installmentsystem as $installmentsystems): ?>
                    <option value="<?= $installmentsystems->Id ?>"><?= $installmentsystems->installmentNumbers ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>

        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_expenses?>" required type="text" name="expenses" value="<?=  $this->showValue('expenses') ?>">
        </div>
        <input class="btn btn-primary  btn-user   btn-lg m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>