<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>

        <div class="input_wrapper_other padding n20 select">
            <select  class="form-control" required name="schoolstudent_id">
                <option value=""><?= $text_label_studnet_name ?></option>
                <?php if (false !== $studnet): foreach ($studnet as $studnets): ?>
                    <option value="<?= $studnets->Id ?>"><?= $studnets->studnetName ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="mt-3">
            <select class="form-control" required name="activities_categories_id">
                <option value=""><?= $text_label_activitiescat_name ?></option>
                <?php if (false !== $activitiescat): foreach ($activitiescat as $activitiescats): ?>
                    <option value="<?= $activitiescats->Id ?>"><?= $activitiescats->activities ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="mt-3">

            <input  class="form-control" placeholder="<?= $text_label_ded_resone ?>" required type="text" name="activitiesPrice" id="ExpenseName" maxlength="20" value="<?= $this->showValue('activitiesPrice') ?>">
        </div>

        <input class="btn btn-primary m-lg-2 btn-lg" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>

</form>

