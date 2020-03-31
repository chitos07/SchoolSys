<div class="card shadow mb-4" >
    <div class="card-header py-3">

<a class="btn btn-danger float-left" href="/collections/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th><?= $text_table_username ?></th>
        <th><?= $text_table_studnet ?></th>
        <th><?= $text_table_expensescat ?></th>
        <th><?= $text_table_expenses ?></th>
        <th><?= $text_table_control ?></th>
      
    </tr>
    </thead>
    <tbody>
    <?php

    if(false !== $collections) {
        foreach ($collections as $collection) {
            ?>
            <tr>
                <td><?= $collection->UserName ?></td>
                <td><?= $collection->studnetName ?></td>
                <td><?= $collection->Expensename ?></td>
                <td><?= $collection->money ?></td>

                <td>
                    <a href="/collections/edit/<?= $collection->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/collections/delete/<?= $collection->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
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