
<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$title ?></legend>

        <div class="input_wrapper n50 padding border">
            <label  <?=  $this->labelFloat('Quantity', $pro)  ?> ><?= $text_table_Quantity?></label>
            <input required type="text" name="Quantity" value="<?=  $this->showValue('Quantity' , $pro) ?>">
        </div>
        <div class="input_wrapper n50 padding border">
            <label  <?=  $this->labelFloat('ProductPrice', $pro)  ?> ><?= $text_table_price?></label>
            <input required type="text" name="ProductPrice" value="<?=  $this->showValue('ProductPrice' , $pro) ?>">
        </div>
        <div class="input_wrapper n50 padding border">
            <label  <?=  $this->labelFloat('Discount', $expenses)  ?> ><?= $text_table_discount?></label>
            <input required type="text" name="Discount" value="<?=  $this->showValue('Discount' , $expenses) ?>">
        </div>
        <div class="input_wrapper n50 padding border">
            <label  <?=  $this->labelFloat('PaymentType', $expenses)  ?> ><?= $text_table_payment_type?></label>
            <input required type="text" name="PaymentType" value="<?=  $this->showValue('PaymentType' , $expenses) ?>">
        </div>
        <div class="input_wrapper n50 padding border">
            <label  <?=  $this->labelFloat('PaymentStatus', $expenses)  ?> ><?= $text_table_payment?></label>
            <input required type="text" name="PaymentStatus" value="<?=  $this->showValue('PaymentStatus' , $expenses) ?>">
        </div>
        <div class="input_wrapper_other padding n50 select">
            <select required name="ProductId">
                <option value=""><?= $text_table_product_name ?></option>
                <?php if (false !== $mmm): foreach ($mmm as $group): ?>
                    <option value="<?= $group->ProductId ?>"  <?=  $this->selectedIf('ProductId',$group->ProductId, $pro  )  ?>  ><?= $group->Name ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>

        <div class="input_wrapper_other padding n50 select">
            <select required name="SupplierId">
                <option value=""><?= $text_table_suppliers_name ?></option>
                <?php if (false !== $Sup): foreach ($Sup as $suppliers): ?>
                    <option value="<?= $suppliers->SupplierId ?>"  <?=  $this->selectedIf('SupplierId',$suppliers->SupplierId, $expenses)  ?>   ><?= $suppliers->Name ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>