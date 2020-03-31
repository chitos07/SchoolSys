<?php

$info = explode(',', $mergings->studentInfo);
?>
<div class="container-fluid">

    <div class="row">
        <div class="col border-bottom p-3 font-weight-bold font-italic ">
            <p><?= $text_header ?></p>
        </div>
    </div>
    <div class="row-cols-1">
        <div class=" m-2  ">

            <div class="alert alert-primary"><p class="text-dark"><?= $text_studnet_name ?></p></div>

            <p class="text-dark m-4">
                <?= $student->studnetName ?>
            </p>


            <div class="">
                <div class="alert alert-primary"><p class="text-dark "><?= $text_status ?></p></div>

                <p class="m-4"><?= $mergings->status ?></p>
            </div>

            <div class="">

                <div class="alert alert-primary"><p class=" text-dark"><?= $text_student_info ?></p></div>
                <ul class="m-4">
                    <?php
                    foreach ($info as $infos) {
                        ?>
                        <li><?= $infos ?></li>
                        <?php
                    }
                    ?>

                </ul>


            </div>

            <div class="">
                <div class="alert alert-primary"><p class="text-dark"><?= $text_price ?></p></div>
                <p class="m-4"><?= $mergings->Price ?></p>


                <div class="">
                    <div class="alert alert-primary"><p class="text-dark"><?= $text_date ?></p></div>
                    <p class="m-4"><?= $mergings->date ?></p>
                </div>

                <div class="">
                    <div class="alert alert-primary"><p class="text-dark"><?= $text_lastedit ?></p></div>
                    <p class="m-4"><?= $mergings->LastEdit ?></p>
                </div>
            </div>

        </div>


    </div>