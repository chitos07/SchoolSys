<?php

namespace PHPMVC\controller;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\NotificationsModel;
use PHPMVC\Models\UserProfileModel;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersModel;

class UsersController extends AbstractController
{

    use InputFilter;
    use Helper;
    private $_createActionRoles =
        [
            'FirstName'     => 'req|alpha|between(3,10)',
            'LastName'      => 'req|alpha|between(3,10)',
            'Username'      => 'req|alphanum|between(3,12)',
            'Password'      => 'req|min(6)|eq_field(CPassword)',
            'CPassword'     => 'req|min(6)',
            'Email'         => 'req|email|eq_field(CEmail)',
            'CEmail'        => 'req|email',
            'PhoneNumber'   => 'alphanum|max(15)',
            'GroupId'       => 'req|int'
        ];

    private $_editActionRoles =
        [
            'PhoneNumber'   => 'alphanum|max(15)',
            'GroupId'       => 'req|int'
        ];

        private $_changepaswordActionRoles =
        [
            'Password'      => 'req|min(6)|eq_field(CPassword)',
            'CPassword'     => 'req|min(6)',
        ];

        
    public function defaultAction()
    {


        $this->languages->load('template.common');
       $this->languages->load('users.default');

        $this->_data['user'] =  UsersModel::getUsers($this->session->u);

       
       // var_dump($this->languages->get(text_user_add));

        $this->_view();





    }



    public function createAction()
    {

        $this->languages->load('template.common');
        $this->languages->load('users.labels');
        $this->languages->load('users.create');
        $this->languages->load('users.messages');

        $this->languages->load('validation.errors');

         $this->_data['groups'] = UsersGroupsModel::getAll();



        if(isset($_POST['submit']) &&  $this->isValid($this->_createActionRoles, $_POST)){


                        $user = new UsersModel();

                        $user->Username = $this->filterString($_POST['Username']);
                        $user->cryptoPassword($_POST['Password']);
                        $user->Email = $this->filterString($_POST['Email']);
                        $user->PhoneNumber = $this->filterString($_POST['PhoneNumber']);
                        $user->GroupId = $this->filterInt($_POST['GroupId']);
                        $user->SubscriptionDate = date('Y-m-d');
                        $user->LastLogin = date('Y-m-d H:i:s');
                        $user->Status = 1;


            if(UsersModel::UserExists($user->Username)){
                $this->messenger->add($this->languages->get('message_user_exists'));
               $this->redirect('/users');
            }

            if(UsersModel::EmailExists( $user->Email)){
                $this->messenger->add($this->languages->get('message_email_exists'));
                $this->redirect('/users');
            }
                        if($user->save()){
                            $userProfile = new UserProfileModel();
                            $userProfile->UserId = $user->UserId;
                            $userProfile->FirstName = $this->filterstring($_POST['FirstName']);
                            $userProfile->LastName = $this->filterstring($_POST['LastName']);
                            $userProfile->save(false);



                            $this->messenger->add($this->languages->get('message_create_success'));

                        }else{
                            $this->messenger->add($this->languages->get('message_create_failed'));
                        }


                       $this->redirect('/users');

                }

        $this->_view();




    }
    public function editAction()
    {
        $id = $this->_params[0];
        $user = UsersModel::getByPK($id);

        if($user === false || $this->session->u->UserId == $id){
            $this->redirect('/users');
        }
        $this->_data['user'] = $user;

        $this->languages->load('template.common');
        $this->languages->load('users.labels');
        $this->languages->load('users.edit');
        $this->languages->load('users.messages');
        $this->languages->load('validation.errors');
        $this->_data['groups'] = UsersGroupsModel::getAll();




        if(isset($_POST['submit']) &&  $this->isValid($this->_editctionRoles, $_POST)){

            $user->PhoneNumber = $this->filterString($_POST['PhoneNumber']);
            $user->GroupId = $this->filterInt($_POST['GroupId']);

            if($user->save()){
                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'));
            }


            $this->redirect('/users');


        }

              $this->_view();


    }
    public function deleteAction()
    {
                 $this->languages->load('template.common');
                 $this->languages->load('users.messages');

                $id = $this->filterint($this->_params[0]);
                $user= UsersModel::getByPK($id);
                if($user === false || $this->session->u->UserId == $id){
                    $this->redirect('/users');
                }

                    if( $user->delete()){
                        $this->messenger->add($this->languages->get('message_delete_success'));
                        $this->redirect('/users');


                    };


              $this->_view();


    }

        // TODO:: make sure This is a AJAX Request
    public function checkUserExistsAjaxAction   (){

            if(isset($_POST['Username']) && !empty($_POST['Username'])){

                header('Content-type: text/plain');
                    if(UsersModel::UserExists($this->filterstring($_POST['Username']))  !== false ){

                        echo 1;
                    }else{
                        echo 2;
                    }


            }

            if(isset($_POST['Email']) && !empty($_POST['Email'])){
                header('Content-type: text/plain');
                if(UsersModel::EmailExists($this->filterstring($_POST['Email']))  !== false){
                    echo 1;
                }else{
                    echo 2;
                }

            }

    }

    public function changepasswordAction()
    {
        $this->languages->load('template.common');
        $this->languages->load('users.labels');
        $this->languages->load('users.changepassword');
        $this->languages->load('users.messages');

        $id = $this->session->u->UserId;

        $user= UsersModel::getByPK($id);

        if($user === false ){
            $this->redirect('/');
        }
        if(isset($_POST['submit']) &&  $this->isValid($this->_changepasswordActionRoles, $_POST)) {

            $user->cryptoPassword($_POST['Password']);
            if($user->save()){
                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'));
            }


            $this->redirect('/auth/logout');

        }


        $this->_view();


    }



}


