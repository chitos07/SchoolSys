<?php

namespace PHPMVC\controller;


use PHPMVC\LIB\Helper;
use PHPMVC\Models\InstallmentSystemModel;
use PHPMVC\Models\NotificationsModel;
use PHPMVC\Models\ProductListModel;
use PHPMVC\Models\PurchasesInvoicesModel;
use PHPMVC\Models\PurchasesModel;
use PHPMVC\Models\StudentsModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;
use PHPMVC\Models\UsersModel;

class NotificationsController extends AbstractController
{

        use Helper;
    public function defaultAction(){


        $this->languages->load('template.common');
        $this->languages->load('notifications.default');
            $notifi = NotificationsModel::getAll();

            $this->_data['notifi'] = $notifi;
        $this->_view();
        }











     public  function updatenotificationAction(){


            $notification = NotificationsModel::getAll();

            foreach ($notification as $notifi){

               $notifi->delete();




            }


          $this->redirect('/');

     }

}
