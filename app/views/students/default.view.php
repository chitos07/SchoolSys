
<div class="card shadow mb-4" >
    <div class="card-header py-3">
<a class="btn btn-danger float-left" href="/students/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>

        <th><?= $text_table_student ?></th>
        <th><?= $text_table_age ?></th>
        <th><?= $text_table_adress ?></th>
        <th><?= $text_table_stage ?></th>
        <th><?= $text_table_system ?></th>
        <th><?= $text_table_bus ?></th>
        <th><?= $text_table_books ?></th>
        <th><?= $text_table_uniform ?></th>
        <th><?= $text_table_expenses ?></th>
        <th><?= $text_table_expenses_net ?></th>
        <th><?= $text_table_installmentsystem ?></th>
        <th><?= $text_table_date ?></th>

        <th><?= $text_table_control ?></th>
    </tr>
    </thead>
    <tbody>
    <?php

    if(false !== $student) {
        foreach ($student as $students) {
            $total = $students->Bus + $students->uniform + $students->Books;

            ?>
            <tr>

                <td><?= $students->studnetName ?></td>
                <td><?= $students->studnetAge ?></td>
                <td><?= $students->studentAdress ?></td>
                <td><?= $students->StageName ?></td>
                <td><?= $students->SystemName ?></td>
                <td><?= $students->Bus ?></td>
                <td><?= $students->Books ?></td>
                <td><?= $students->uniform ?></td>
                <td><?= $students->studnetexpenses ?></td>
                <td><?= $students->studnetexpenses + $total  ?></td>
                <td><?= $students->installmentNumbers ?></td>
                <td><?= $students->Date ?></td>






                <td>
                    <a href="/students/edit/<?= $students->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/students/delete/<?= $students->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
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



