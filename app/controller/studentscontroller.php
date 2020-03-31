<?php

namespace PHPMVC\controller;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\BranchesModel;
use PHPMVC\Models\BusModel;
use PHPMVC\Models\InstallmentSystemModel;
use PHPMVC\Models\NotificationsModel;
use PHPMVC\Models\StagesModel;
use PHPMVC\Models\StudentsModel;
use PHPMVC\Models\SystemModel;
use PHPMVC\Models\TypesModel;
use PHPMVC\Models\UserProfileModel;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersModel;

class StudentsController extends AbstractController
{

    use InputFilter;
    use Helper;
    private $_createActionRoles =
        [
            'studentName'     => 'req|alpha|between(3,25)',
            'age'      => 'req|int',
            'adress'      => 'req|alphanum|between(3,50)',
            'StageId'      => 'req|int',
            'SystemId'     => 'req|int',
            'expenses'       => 'req|int'
        ];

    private $_editActionRoles =
        [
            'studentName'     => 'req|alpha|between(3,25)',
            'age'      => 'req|int',
            'adress'      => 'req|alphanum|between(3,50)',
            'StageId'      => 'req|int',
            'SystemId'     => 'req|int',
            'expenses'       => 'req|int'

        ];
    public function defaultAction()
    {


        $this->languages->load('template.common');
       $this->languages->load('students.default');

        $this->_data['student'] =  StudentsModel::getAll();

        $this->_view();


     $test = (StudentsModel::Count() != NULL) ? StudentsModel::Count() : 0;

    var_dump($test);

    }



    public function createAction()
    {


        $this->languages->load('template.common');
        $this->languages->load('students.labels');
        $this->languages->load('students.create');
        $this->languages->load('students.messages');

          $this->languages->load('validation.errors');

         $this->_data['stages'] = StagesModel::getAll();
         $this->_data['system'] = SystemModel::getAll();
        $this->_data['installmentsystem'] = InstallmentSystemModel::getAll();



        if(isset($_POST['submit']) &&  $this->isValid($this->_createActionRoles, $_POST)){


                        $students = new StudentsModel();

                        $students->studnetName = $this->filterString($_POST['studentName']);
                        $students->studnetAge = $this->filterint($_POST['age']);
                        $students->studentAdress = $this->filterstring($_POST['adress']);
                        $students->educational_stage_id = $this->filterint($_POST['StageId']);
                        $students->schoolsystem_id = $this->filterint($_POST['SystemId']);
                        $students->studnetexpenses = $this->filterint($_POST['expenses']);
                        $students->installmentsystem = $this->filterstring($_POST['installmentsystem']);
                        $students->app_users_id = $this->session->u->UserId;
                        $students->Date = date('Y-m-d H:i:s');






                        if($students->save()){

                            $this->messenger->add($this->languages->get('message_create_success'));

                        }else{
                            $this->messenger->add($this->languages->get('message_create_failed'));
                        }

                      

                       $this->redirect('/students');

                }

              
              $this->_view();




    }
    public function editAction()
    {
        $id = $this->_params[0];
        $students = StudentsModel::getByPK($id);

        if($students === false || $this->session->u->UserId == $id){
            $this->redirect('/students');
        }
        $this->_data['student'] = $students;
        $this->_data['stages'] = StagesModel::getAll();
        $this->_data['system'] = SystemModel::getAll();
        $this->_data['type'] = TypesModel::getAll();
        $this->_data['brench'] = BranchesModel::getAll();
        $this->_data['installmentsystem'] = InstallmentSystemModel::getAll();

        $this->languages->load('template.common');
        $this->languages->load('students.labels');
        $this->languages->load('students.edit');
        $this->languages->load('students.messages');
        $this->languages->load('validation.errors');
        $this->_data['groups'] = UsersGroupsModel::getAll();




        if(isset($_POST['submit']) &&  $this->isValid($this->_editctionRoles, $_POST)){



            $students->studnetName = $this->filterString($_POST['studnetName']);
            $students->studnetAge = $this->filterint($_POST['age']);
            $students->studentAdress = $this->filterstring($_POST['adress']);
            $students->educational_stage_id = $this->filterint($_POST['StageId']);
            $students->schoolsystem_id = $this->filterint($_POST['SystemId']);
            $students->studnetexpenses = $this->filterint($_POST['expenses']);
            $students->Bus = $this->filterstring($_POST['Bus']);
            $students->app_users_id = $this->session->u->UserId;
            $students->Date = date('Y-m-d H:i:s');


            if($students->save()){
                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'));
            }


            $this->redirect('/students');


        }

              $this->_view();


    }
    public function deleteAction()
    {
                 $this->languages->load('template.common');
                 $this->languages->load('users.messages');

                $id = $this->filterint($this->_params[0]);
                $students= StudentsModel::getByPK($id);
                if($students === false || $this->session->u->UserId == $id){
                    $this->redirect('/students');
                }

                    if( $students->delete()){
                        $this->messenger->add($this->languages->get('message_delete_success'));
                        $this->redirect('/students');


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



}


