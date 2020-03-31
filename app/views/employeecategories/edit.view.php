
<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n50">

            <input  class="form-control" placeholder="<?= $text_label_Name ?>" required type="text" name="Name"  maxlength="20" value="<?= $this->showValue('Name', $empcat) ?>">
        </div>


        <input class="btn btn-primary m-lg-2" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>