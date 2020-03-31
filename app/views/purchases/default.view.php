

<a class="button" href="/purchases/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
<table class="data">
    <thead>
    <tr>
        <th><?= $text_table_username ?></th>
        <th><?= $text_table_product_name?></th>
        <th><?= $text_table_Quantity?></th>
        <th><?= $text_table_price ?></th>
        <th><?= $text_table_discount ?></th>
        <th><?= $text_table_suppliers_name ?></th>
        <th><?= $text_table_payment_type?></th>
        <th><?= $text_table_payment ?></th>
        <th><?= $text_table_created?></th>
        <th><?= $text_table_control ?></th>
    </tr>
    </thead>
    <tbody>
    <?php

    if(false !== $purchases) {
        foreach ($purchases as $purchase) {
            ?>
            <tr>
                <td><?= $purchase->Username ?></td>
                <td><?= $purchase->Product ?></td>
                <td><?= $purchase->Quantity ?></td>
                <td><?= $purchase->ProductPrice ?></td>
                <td><?= $purchase->Discount ?></td>
                <td><?= $purchase->Name ?></td>
                <td><?= $purchase->PaymentType ?></td>
                <td><?= $purchase->PaymentStatus ?></td>
                <td><?= $purchase->Created ?></td>

                <td>
                    <a href="/purchases/edit/<?= $purchase->InvoiceId ?>"><i class="fa fa-edit"></i></a>
                    <a href="/purchases/delete/<?= $purchase->InvoiceId ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>