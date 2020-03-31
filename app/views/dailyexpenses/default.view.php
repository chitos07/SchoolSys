<div class="card shadow mb-4" >
    <div class="card-header py-3">

<a class="btn btn-danger float-left" href="dailyexpenses/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th><?= $text_table_username ?></th>
        <th><?= $text_table_expensename ?></th>
        <th><?= $text_table_payment ?></th>
        <th><?= $text_table_created_date ?></th>
        <th><?= $text_table_control ?></th>
    </tr>
    </thead>
    <tbody>
    <?php

    if(false !== $expenses) {
        foreach ($expenses as $expensess) {
            ?>
            <tr>
                <td><?= $expensess->Username ?></td>
                <td><?= $expensess->ExpenseName ?></td>
                <td><?= $expensess->Payment ?></td>
                <td><?= $expensess->Created ?></td>


                <td>
                    <a href="/dailyexpenses/edit/<?= $expensess->DExpenseId ?>"><i class="fa fa-edit"></i></a>
                    <a href="/dailyexpenses/delete/<?= $expensess->DExpenseId ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>
        </div>
    </div>
</div>