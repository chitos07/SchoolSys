

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $text_dashboard ?></h1>

</div>
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $text_students ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=  $this->countstudent; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?= $text_employee ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->countEmployee ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?= $text_activities ?></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $this->countActivities?></div>
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?= $text_users ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->countUsers ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        
            
<div class="card shadow mb-4" >
    <div class="card-header py-3">
                استعراض الطلاب             
    </div>
    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered  indextabel" id="dataTable" width="100%" cellspacing="0">
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
                <td><?=   $students->studnetexpenses + $total  ?></td>
                <td><?= $students->installmentNumbers ?></td>
                <td><?= $students->Date ?></td>






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






    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $text_quick_actions ?></h6>
                    <div class="dropdown no-arrow">


                    </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <ul class="list-group p-0">

                    <li class="list-group-item list-group-item-primary"><a class="text-dark text-decoration-none" href="/students/create"><i class="fa fa-users"></i> <?= $text_shortcut_student_add ?></a></li>
                    <li class="list-group-item "><a class="text-dark text-decoration-none" href="/employee/create"><i class="fa fa-user"></i> <?= $text_shortcut_employee_add ?></a></li>
                    <li class="list-group-item list-group-item-info"><a  class="text-dark text-decoration-none" href="/deductions/create"><i class="fa fa-money-bill"></i> <?= $text_shortcut_deductions_add ?></a></li>
                    <li class="list-group-item "><a class="text-dark text-decoration-none" href="/advancepayment/create"><i class="fa fa-money-check-alt"></i> <?= $text_shortcut_advpayment_add ?></a></li>
                    <li class="list-group-item list-group-item-secondary"><a class="text-dark text-decoration-none" href="/missedouts/create"><i class="fa fa-user"></i> <?= $text_shortcut_missdouts_transaction ?></a></li>
                    <li class="list-group-item "><a  class="text-dark text-decoration-none" href="/activities/create"><i class="fa fa-gift"></i> <?= $text_shortcut_activities ?></a></li>
                    <li class="list-group-item list-group-item-danger"><a  class="text-dark text-decoration-none"href="/mergingstudents/create"><i class="fa fa-user"></i> <?= $text_shortcut_margingstudent ?></a></li>
                    <li class="list-group-item "><a  class="text-dark text-decoration-none" href="/users/create"><i class="fa fa-user"></i> <?= $text_shortcut_user_add ?></a></li>
                    <li class="list-group-item  list-group-item-primary"><a  class="text-dark text-decoration-none" href="/collections/create"><i class="fa fa-money-check-alt"></i> <?= $text_shortcut_payid_add ?></a></li>
                    <li class="list-group-item "><a  class="text-dark text-decoration-none" href="/installmentsystem"><i class="fa fa-money-bill"></i> <?= $text_installmentsystem ?></a></li>



                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
