

<a class="button" href="/years/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
<table class="data" dir="rtl">
    <thead>
    <tr>
        <th><?= $text_table_username ?></th>
        <th><?= $text_table_control ?></th>
      
    </tr>
    </thead>
    <tbody>
    <?php
   
    if(false !== $year) {
        foreach ($year as $years) {
            ?>
            <tr>
                <td><?= $years->years ?></td>
               
                <td>
                    <a href="/years/edit/<?= $years->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/years/delete/<?= $years->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>