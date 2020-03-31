<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n100">

            <input class="form-control" placeholder="<?= $text_label_group_title ?>" required type="text" name="GroupName" id="GroupName" maxlength="20">
        </div>
        <div class="mt-3 list-group">
            <label><?= $text_label_privileges ?></label>
            <?php if ($privileges !== false) : foreach ($privileges as $privilege): ?>
                <label class="form-check-label">
                    <input   type="checkbox" name="privileges[]" id="privileges" value="<?= $privilege->PrivilegeId ?>">
                    <div class="checkbox_button"></div>
                    <span><?= $privilege->PrivilegsTitle ?></span>
                </label>
            <?php endforeach; endif; ?>
        </div>
        <input class="btn btn-primary m-lg-2 btn-lg" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>


