<div class="card shadow mb-4" >
    <div class="card-header py-3">
<a class="btn btn-danger float-left" href="/books/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
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
   
    if(false !== $books) {
        foreach ($books as $book) {
            ?>
            <tr>
                <td><?= $book->StudnetName?></td>
                <td><?= $book->booksPrice?></td>

                <td>
                    <a href="/books/edit/<?= $book->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/books/delete/<?= $book->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
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