<?php

namespace PHPMVC\controller;


use PHPMVC\LIB\Helper;
use PHPMVC\Models\InstallmentSystemModel;
use PHPMVC\Models\NotificationsModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;
use PHPMVC\Models\UsersModel;

class AuthController extends AbstractController
{

    use  Helper;

    public function loginAction(){



        $this->languages->load('template.common');
        $this->languages->load('auth.login');



        $this->_template->swapTemplate([

                ':view' => ':action_view'
        ]);

            

        if (isset($_POST['login'])){
            $isAuthorized = UsersModel::authenticate($_POST['ucname'],$_POST['ucpwd'], $this->session);
            if($isAuthorized == 2) {
                $this->messenger->add($this->languages->get('text_user_disabled'));
            } elseif ($isAuthorized == 1) {
				
                $this->redirect('/');

            } elseif ($isAuthorized === false) {
                $this->messenger->add($this->languages->get('text_user_not_found'));
            }

        }

        $this->_view();


    }
    public function logoutAction()
    {
        // TODO: check the cookie deletion
        $this->session->kill();
        $this->redirect('/auth/login');
    }

}
