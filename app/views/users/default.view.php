<div class="card shadow mb-4" >
    <div class="card-header py-3">

<a class="btn btn-danger float-left" href="/users/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th><?= $text_table_username ?></th>
        <th><?= $text_table_group ?></th>
        <th><?= $text_table_email ?></th>
        <th><?= $text_table_subscription_date ?></th>
        <th><?= $text_table_last_login ?></th>
        <th><?= $text_table_control ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
   
    if(false !== $user) {
        foreach ($user as $users) {
            ?>
            <tr>
                <td><?= $users->Username ?></td>
                <td><?= $users->GroupName ?></td>
                <td><?= $users->Email ?></td>
                <td><?= $users->SubscriptionDate ?></td>
                <td><?= $users->LastLogin ?></td>

                <td>
                    <a href="/users/edit/<?= $users->UserId ?>"><i class="fa fa-edit"></i></a>
                    <a href="/users/delete/<?= $users->UserId ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
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