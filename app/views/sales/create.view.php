<form autocomplete="off" class="appForm clearfix" method="post" enctype="appladd.viewication/x-www-form-urlencoded">
    <fieldset>
        <legend><?= @$text_legend ?></legend>



        <div class="input_wrapper n20 padding border">
            <label <?=  $this->labelFloat('Quantity')  ?>><?= $text_table_Quantity ?></label>
            <input required type="text" name="Quantity" maxlength="30" value="<?=  $this->showValue('Quantity') ?>">
        </div>

        <div class="input_wrapper n20 border padding">
            <label <?=  $this->labelFloat('Price')  ?>><?= $text_table_price?></label>
            <input required type="text" name="Price" value="<?=  $this->showValue('Price') ?>">
        </div>

        <div class="input_wrapper n20 padding">
            <label <?=  $this->labelFloat('discount')  ?>><?= $text_table_discount?></label>
            <input required type="text" name="discount" value="<?=  $this->showValue('discount') ?>">
        </div>

        <div class="input_wrapper n30 border padding">
            <label  <?=  $this->labelFloat('PaymentType')  ?> > <?= $text_table_payment_type?></label>
            <input required type="text" name="PaymentType" maxlength="40" value="<?=  $this->showValue('PaymentType') ?>">
        </div>

        <div class="input_wrapper n20 padding border">
            <label  <?=  $this->labelFloat('Payment')  ?> ><?= $text_table_payment?></label>
            <input required type="text" name="Payment" value="<?=  $this->showValue('Payment') ?>">
        </div>

        <div class="input_wrapper_other padding n20 select">
            <select required name="Productid">
                <option value=""><?= $text_table_product_name ?></option>
                <?php if (false !== $products): foreach ($products as $product): ?>
                    <option value="<?= $product->ProductId ?>"><?= $product->Name ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="input_wrapper_other padding n20 select">
            <select required name="ClientId">
                <option value=""><?= $text_table_clients_name ?></option>
                <?php if (false !== $clients): foreach ($clients as $client): ?>
                    <option value="<?= $client->ClientId ?>"><?= $client->Name ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>