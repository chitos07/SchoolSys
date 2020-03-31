<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>
        <div class="input_wrapper n20 border">

            <input class="form-control" placeholder="<?= $text_label_FirstName ?>" required type="text" name="FirstName" maxlength="10" value="<?= $this->showValue('FirstName') ?>">
        </div>
        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_LastName ?>" required type="text" name="LastName" maxlength="10" value="<?= $this->showValue('LastName') ?>">
        </div>
        <div class="mt-3">

            <input  class="form-control" placeholder="<?= $text_label_Username?>" required type="text" name="Username" maxlength="30" value="<?=  $this->showValue('Username') ?>">
        </div>
        <div class="mt-3">

            <input  class="form-control" placeholder="<?= $text_label_Password?>" required type="password" name="Password" value="<?=  $this->showValue('Password') ?>">
        </div>
        <div class="mt-3">

            <input  class="form-control" placeholder="<?= $text_label_CPassword?>" required type="password" name="CPassword" value="<?=  $this->showValue('CPassword') ?>">
        </div>
        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_Email?>"  required type="email" name="Email" maxlength="40" value="<?=  $this->showValue('Email') ?>">
        </div>
        <div class="mt-3">

            <input  class="form-control" placeholder="<?= $text_label_CEmail?>" required type="email" name="CEmail" maxlength="40" value="<?=  $this->showValue('CEmail') ?>">
        </div>
        <div class="mt-3">

            <input class="form-control" placeholder="<?= $text_label_PhoneNumber?>"  required type="text" name="PhoneNumber" value="<?=  $this->showValue('PhoneNumber') ?>">
        </div>
        <div class="mt-3">
            <select class="form-control" required name="GroupId">
                <option value=""><?= $text_user_GroupId ?></option>
                <?php if (false !== $groups): foreach ($groups as $group): ?>
                    <option value="<?= $group->GroupId ?>"><?= $group->GroupName ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>