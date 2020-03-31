

<a class="button" href="/sales/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
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

    if(false !== $sales) {
        foreach ($sales as $sale) {
            ?>
            <tr>
                <td><?= $sale->Username ?></td>
                <td><?= $sale->Product ?></td>
                <td><?= $sale->Quantity ?></td>
                <td><?= $sale->ProductPrice ?></td>
                <td><?= $sale->Discount ?></td>
                <td><?= $sale->Name ?></td>
                <td><?= $sale->PaymentType ?></td>
                <td><?= $sale->PaymentStatus ?></td>
                <td><?= $sale->Created ?></td>

                <td>
                    <a href="/sales/edit/<?= $sale->InvoiceId ?>"><i class="fa fa-edit"></i></a>
                    <a href="/sales/delete/<?= $sale->InvoiceId ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>