

<a class="button" href="/notifications/updatenotification"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
<table class="data" dir="rtl">
    <thead>
    <tr>
        <th><?= $text_table_username ?></th>
        <th><?= $text_table_inst ?></th>
        <th><?= $text_table_date ?></th>
        <th><?= $text_table_control ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(false !== $notifi) {
        foreach ($notifi as $notifis) {
            ?>
            <tr>
                <td><?= $notifis->Content ?></td>
                <td><?= $notifis->Title ?></td>
                <td><?= $notifis->Date ?></td>




                <td>
                    <a href="/notifications/edit/<?= $notifis->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/notifications/delete/<?= $notifis->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>