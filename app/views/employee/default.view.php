
<div class="card shadow mb-4" >
    <div class="card-header py-3">
<a class="btn btn-danger float-left" href="/employee/create"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th><?= $text_table_UserName ?></th>
        <th><?= $text_table_emp_name ?></th>
        <th><?= $text_table_emp_number ?></th>
        <th><?= $text_table_emp_adress ?></th>
        <th><?= $text_table_emp_salary ?></th>
        <th><?= $text_table_emp_cat ?></th>
        <th><?= $text_table_emp_ded ?></th>
        <th><?= $text_table_emp_advpayment ?></th>
        <th><?= $text_table_emp_netsalary ?></th>
        <th><?= $text_table_control ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(false !== $emp) {
        foreach ($emp as $emps) {
            ?>
            <tr>
                <td><?= $emps->UserName ?></td>
                <td><?= $emps->employeeName ?></td>
                <td><?= $emps->employeeNumber ?></td>
                <td><?= $emps->employeeAdress ?></td>
                <td><?= $emps->employeeSalary ?></td>
                <td><?= $emps->catname ?></td>
                <td><?= $emps->deductions_id ?></td>
                <td><?= $emps->advancePayment_id ?></td>
                <?php
                    if($emps->deductions_id == 0 && $emps->advancePayment_id == 0){?>
                        <td><?= $emps->employeeSalary ?></td>
                        <?php
                    }else{?>
                        <td><?= $emps->employeeSalary - ($emps->deductions_id + $emps->advancePayment_id)  ?></td>
                        <?php
                    }
                ?>



                <td>
                    <a href="/employee/edit/<?= $emps->Id ?>"><i class="fa fa-edit"></i></a>
                    <a href="/employee/delete/<?= $emps->Id ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
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