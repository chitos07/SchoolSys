


<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper_other padding n20 select">
            <select  class="form-control" required name="StudentId">
                <option value=""><?= $text_label_student ?></option>
                <?php if (false !== $student): foreach ($student as $students): ?>
                    <option value="<?= $students->Id ?>" <?= $this->selectedIf('school_student_id',$students->Id, $books ) ?>  > <?= $students->studnetName  ?> </option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="input_wrapper n20 border">
            <label></label>
            <input  class="form-control" placeholder="<?= $text_label_area ?>" required type="text" name="booksPrice" maxlength="20" value="<?= $this->showValue('booksPrice', $books) ?>">
        </div>

        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>


