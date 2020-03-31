<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>

        <div class="input_wrapper n20 border padding">
            <input  class="form-control" placeholder="<?= $text_label_FirstName ?>"required type="text" name="studnetName" maxlength="30" value="<?= $this->showValue('studnetName', $student) ?>">
        </div>
        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_LastName?>" required type="text" name="age" maxlength="30" value="<?=  $this->showValue('studnetAge',$student) ?>">
        </div>
        <div class="mt-3">

            <input  class="form-control" placeholder="<?= $text_label_Password?>" required type="text" name="adress" value="<?=  $this->showValue('studentAdress' , $student) ?>">
        </div>
        <div class="mt-3">
            <select  class="form-control" required name="StageId">
                <option value=""><?= $text_label_CPassword ?></option>
                <?php if (false !== $stages): foreach ($stages as $stage): ?>
                    <option value="<?= $stage->Id ?>" <?= $this->selectedIf('educational_stage_id',$stage->Id,$student ) ?>><?= $stage->name ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="mt-3">
            <select class="form-control" required name="SystemId">
                <option value=""><?= $text_label_Email ?></option>
                <?php if (false !== $system): foreach ($system as $systems): ?>
                    <option value="<?= $systems->Id ?>" <?= $this->selectedIf('schoolsystem_id',$systems->Id,$student ) ?> ><?= $systems->Name ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>

      

    
     
        <div class="mt-3">
            <select class="form-control" required name="installmentsystem">
                <option value=""><?= $text_label_installmentsystem ?></option>
                <?php if (false !== $installmentsystem): foreach ($installmentsystem as $installmentsystems): ?>
                    <option value="<?= $installmentsystems->Id ?>" <?= $this->selectedIf('installmentsystem', $installmentsystems->Id, $student) ?>><?= $installmentsystems->installmentNumbers ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>

        <div class="mt-3">

            <input  class="form-control" placeholder="<?= $text_label_expenses?>" required type="text" name="expenses" value="<?=  $this->showValue('studnetexpenses', $student) ?>">
        </div>
        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>