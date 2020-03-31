
<div class="card shadow mb-4" >
    <div class="card-header py-3">
    <a href="/installmentsystem/create" class="btn btn-danger float-left"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th><?= $text_table_username ?></th>
            <th><?= $text_table_student_name ?></th>
            <th><?= $text_table_date1 ?></th>
            <th><?= $text_table_date2 ?></th>
            <th><?= $text_table_date3 ?></th>
            <th><?= $text_table_date4 ?></th>
            <th><?= $text_table_date5 ?></th>


            <th><?= $text_table_control ?></th>
        </tr>
        </thead>
        <tbody>
        <?php  if(false !== $installmentsystem): foreach ($installmentsystem as $installmentsystems): ?>
            <tr>
                <td><?= $installmentsystems->UserName ?></td>
                <td><?= $installmentsystems->installmentNumbers ?></td>
                <td><?= $installmentsystems->Date1?></td>
                <td><?= $installmentsystems->Date2 ?></td>
                <td><?= $installmentsystems->Date3 ?></td>
                <td><?= $installmentsystems->Date4 ?></td>
                <td><?= $installmentsystems->Date5 ?></td>


                <td>
                    <a href="/installmentsystem/edit/<?= $installmentsystems->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/installmentsystem/delete/<?= $installmentsystems->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
    </div>
</div>