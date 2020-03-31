<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n50">
            <label<?= $this->labelFloat('status',$merging) ?>><?= $text_label_Name ?></label>
            <input required type="text" name="status" value="<?= $this->showValue('status',$merging) ?>">
        </div>



        <div class="input_wrapper n50">
            <label<?= $this->labelFloat('Price',$merging) ?>><?= $text_label_ded_resone ?></label>
            <input required type="text" name="Price" id="ExpenseName" maxlength="20" value="<?= $this->showValue('Price',$merging) ?>">
        </div>


        <div class="input_wrapper_other padding n20 select">
            <select required name="schoolstudents_id">
                <option value=""><?= $text_label_emp_name ?></option>
                <?php if (false !== $studnet): foreach ($studnet as $studnets): ?>
                    <option value="<?= $studnets->Id ?>" <?=  $this->selectedif('schoolstudents_id', $studnets->Id,$merging) ?>><?= $studnets->studnetName ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>


        <div class="input_wrapper n60">

            <textarea  class="form-control"  required  name="studentInfo"><?= $this->showValue('studentInfo',$merging) ?> </textarea>
        </div>


        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>

</form>

