
<div class="card shadow mb-4" >
    <div class="card-header py-3">
    <a href="/activitiescat/create" class="btn btn-danger float-left"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th><?= $text_table_payment_name ?></th>

            <th><?= $text_table_control ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $activitiescat): foreach ($activitiescat as $activitiescats): ?>
            <tr>
                <td><?= $activitiescats->activities ?></td>


                <td>
                    <a href="/activitiescat/edit/<?= $activitiescats->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/activitiescat/delete/<?= $activitiescats->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
    </div>
</div>