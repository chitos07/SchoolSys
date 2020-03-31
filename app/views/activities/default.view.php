
<div class="card shadow mb-4" >
    <div class="card-header py-3">

    <a href="/activities/create" class="btn btn-danger float-left"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>

            <th><?= $text_table_user_name ?></th>
            <th><?= $text_table_activitiescat_name ?></th>
            <th><?= $text_table_student_name ?></th>
            <th><?= $text_table_activities_price ?></th>
            <th><?= $text_table_date ?></th>

            <th><?= $text_table_control ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $activities): foreach ($activities as $activitie): ?>
            <tr>
                <td><?= $activitie->UserName ?></td>
                <td><?= $activitie->Activities ?></td>
                <td><?= $activitie->StudentName ?></td>
                <td><?= $activitie->activitiesPrice ?></td>
                <td><?= $activitie->date ?></td>


                <td>
                    <a href="/activities/edit/<?= $activitie->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/activities/delete/<?= $activitie->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
    </div>
</div>