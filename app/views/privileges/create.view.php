<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n50 border">

            <input class="form-control" placeholder="<?= $text_label_privilege_title ?>" required type="text" name="PrivilegeTitle" id="PrivilegeTitle" maxlength="30">
        </div>
        <div class="mt-3">

            <input  class="form-control" placeholder="<?= $text_label_privilege_url ?>" required type="text" name="Privilege" id="Privilege" maxlength="30">
        </div>
        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>