

<div class="card shadow mb-4" >
    <div class="card-header py-3">
    <a href="/leavepermissions/create" class="btn btn-danger float-left"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
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
        <?php if(false !== $leave): foreach ($leave as $leaves): ?>
            <tr>
                <td><?= $leaves->UserName ?></td>
                <td><?= $leaves->EmployeeName ?></td>
                <td><?= $leaves->leavepermissionsReason ?></td>
                <td><?= $leaves->Date ?></td>


                <td>
                    <a href="/leavepermissions/edit/<?= $leaves->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/leavepermissions/delete/<?= $leaves->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>

    </div>
</div>