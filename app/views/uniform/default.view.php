<div class="card shadow mb-4" >
    <div class="card-header py-3">
<a class="btn btn-danger float-left" href="/uniform/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th><?= $text_table_username ?></th>
        <th><?= $text_table_area ?></th>
        <th><?= $text_table_control ?></th>
      
    </tr>
    </thead>
    <tbody>
    <?php
   
    if(false !== $uniform) {
        foreach ($uniform as $uniforms) {
            ?>
            <tr>
                <td><?= $uniforms->StudnetName?></td>
                <td><?= $uniforms->uniformPrice?></td>

                <td>
                    <a href="/uniform/edit/<?= $uniforms->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/uniform/delete/<?= $uniforms->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
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