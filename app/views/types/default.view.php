


<!-- DataTales Example -->
<div class="card shadow mb-4" >
    <div class="card-header py-3">
       <a href="/types/create" class="btn btn-danger float-left"> اضافة اعتماد جديد</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $text_table_types ?></th>
                    <th><?= $text_table_control ?></th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>

                </tr>
                </tfoot>
                <tbody>
                <?php

                if(false !== $types){
                    foreach ($types as $type){
                        ?>
                <tr>
                    <td><?= $type->systemTypes ?></td>

                    <td>
                        <a href="/types/edit/<?= $type->Id ?>"><i class="fa fa-edit"></i></a>
                        <a href="/types/delete/<?= $type->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
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
