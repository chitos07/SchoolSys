<!-- DataTales Example -->
<div class="card shadow mb-4" >
    <div class="card-header py-3">

    <a href="/advancepayment/create" class="btn btn-danger float-left"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th><?= $text_table_username ?></th>
            <th><?= $text_table_emp_name ?></th>
            <th><?= $text_table_ded_resone ?></th>

            <th><?= $text_table_date ?></th>

            <th><?= $text_table_control ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $payment): foreach ($payment as $payments): ?>
            <tr>
                <td><?= $payments->UserName ?></td>
                <td><?= $payments->EmployeeName ?></td>
                <td><?= $payments->advancePayment ?></td>

                <td><?= $payments->date ?></td>


                <td>
                    <a href="/advancepayment/edit/<?= $payments->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/advancepayment/delete/<?= $payments->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
    </div>
</div>