<div class="container">
   
    <table class="data">
        <thead>
        <tr>
           
            <th><?= $text_table_student_name ?></th>
            <th><?= $text_table_status_info ?></th>
            <th><?= $text_table_date ?></th>
         

            <th><?= $text_table_control ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(false !== $deeps): foreach ($deeps as $deep): ?>
            <tr>
                
                <td><?= $deep->StudentName ?></td>
                <td><?= $deep->Info ?></td>
                <td><?= $deep->Date ?></td>
             


                <td>
                    <a title="<?= $text_table_control_view ?>" href="/mergingstudentsdeep/view/<?= $deep->Id?>"><i
                                class="fa fa-eye"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>