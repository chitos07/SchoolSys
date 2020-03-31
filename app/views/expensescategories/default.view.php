
<div class="card shadow mb-4" >
    <div class="card-header py-3">

    <a href="/expensescategories/create" class="btn btn-danger float-left"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>
        <tr>
            <th><?= $text_table_payment_name ?></th>
            <th><?= $text_table_fixed_payment ?></th>
            <th><?= $text_table_control ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $expenses): foreach ($expenses as $expensescat): ?>
            <tr>
                <td><?= $expensescat->ExpenseName ?></td>
                <td><?= $expensescat->FixedPayment ?></td>

                <td>
                    <a href="/expensescategories/edit/<?= $expensescat->ExpenseId ?>"><i class="fa fa-edit"></i></a>
                    <a href="/expensescategories/delete/<?= $expensescat->ExpenseId ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
        </div>
    </div>
</div>