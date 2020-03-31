<?php



return [

        'template' => [

                'wrapperstart' => TEMPLATE_PATH . 'wrapperstart.php',
                'header'       => TEMPLATE_PATH . 'header.php',
                'nav'          => TEMPLATE_PATH . 'nav.php',
                ':view'        => ':action_view',
                'wrapperend'   => TEMPLATE_PATH . 'wrapperend.php'

              ],
        'header_resources' => [
                    'css' => [

                        'all'     =>   CSS . 'fontawesome-free/css/all.min.css',
                        'main'        =>   CSS . 'sb-admin-2.min.css',
                        'dataTables'        =>   CSS . 'dataTables.bootstrap4.min.css',

                    ],

                   'js' => [

                  


                ],

        ],

    'footer_resources' => [

       
        'jquery' => JS . 'jquery/jquery.min.js',
         'bootstrap' => JS . 'bootstrap/bootstrap.bundle.min.js',
        'jquery-easing' => JS . 'jquery-easing/jquery.easing.min.js',
        'main' =>   JS . 'sb-admin-2.min.js',

        'dataTables'  =>   JS . 'datatables/jquery.dataTables.min.js',
        'dataTabless'  =>   JS . 'datatables/dataTables.bootstrap4.min.js',
        'demo'  =>   JS . 'datatables/datatables-demo.js',
       



    ]



];
