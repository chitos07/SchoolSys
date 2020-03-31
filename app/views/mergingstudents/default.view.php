<div class="container">
    <a href="/mergingstudents/create" class="button"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <table class="data">
        <thead>
        <tr>
            <th><?= $text_table_username ?></th>
            <th><?= $text_table_student_name ?></th>
            <th><?= $text_table_status ?></th>
            <th><?= $text_table_status_info ?></th>
            <th><?= $text_table_merging_price ?></th>


            <th><?= $text_table_date ?></th>
            <th><?= $text_table_lastEdit ?></th>

            <th><?= $text_table_control ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $mergingstudents): foreach ($mergingstudents as $mergingstudent): ?>
            <tr>
                <td><?= $mergingstudent->UserName ?></td>
                <td><?= $mergingstudent->StudentName ?></td>
                <td><?= $mergingstudent->status ?></td>
                <td><?= $mergingstudent->studentInfo ?></td>
                <td><?= $mergingstudent->Price ?></td>


                <td><?= $mergingstudent->date ?></td>
                <td><?= $mergingstudent->LastEdit ?></td>


                <td>
                    <a title="<?= $text_table_control_view ?>" href="/mergingstudents/view/<?= $mergingstudent->Id?>"><i
                                class="fa fa-eye"></i></a>
                    <a href="/mergingstudents/edit/<?= $mergingstudent->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/mergingstudents/delete/<?= $mergingstudent->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>