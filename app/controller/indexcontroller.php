<?php

namespace PHPMVC\controller;


use http\Client\Request;
use mysql_xdevapi\BaseResult;
use PHPMVC\LIB\Helper;
use PHPMVC\Models\DeductionsModel;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\InstallmentSystemModel;
use PHPMVC\Models\NotificationsModel;
use PHPMVC\Models\ProductListModel;
use PHPMVC\Models\PurchasesInvoicesModel;
use PHPMVC\Models\PurchasesModel;
use PHPMVC\Models\StudentsModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;
use PHPMVC\Models\UsersModel;

class IndexController extends AbstractController
{
    use Helper;
    public function defaultAction(){


       $this->languages->load('template.common');
        $this->languages->load('index.default');

        $this->_data['student'] =  StudentsModel::getAll();
       
      $this->_view();

    }

}


