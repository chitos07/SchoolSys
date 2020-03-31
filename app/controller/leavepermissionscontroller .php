<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\DailyExpensesModel;
use PHPMVC\Models\EmployeeCategoriesModel;
use PHPMVC\Models\ExpensesCategoriesModel;


class LeavePermissionsController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'Name'   =>    'req|alpha|between(3,25)',


        ];

    public function defaultAction(){

       $this->languages->load('template.common');
        $this->languages->load('employeecategories.default');
        $this->_data['employeecat'] = EmployeeCategoriesModel::getAll();



         $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('employeecategories.labels');
        $this->languages->load('employeecategories.create');
        $this->languages->load('employeecategories.messages');
        $this->languages->load('validation.errors');


        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

                $employeecategories = new EmployeeCategoriesModel();
                $employeecategories->Name = $this->filterstring($_POST['Name']) ;


                if($employeecategories->save()){

                    $this->messenger->add($this->languages->get('message_create_success'));
                    $this->redirect('/employeecategories');

                }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                }



        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
        $employeecategories = EmployeeCategoriesModel::getByPK($id);
            if($employeecategories == false){
                $this->redirect('/employeecategories');
            }

            $this->_data['empcat'] = $employeecategories;
            $this->languages->load('template.common');
            $this->languages->load('employeecategories.labels');
            $this->languages->load('employeecategories.edit');
            $this->languages->load('employeecategories.messages');
            $this->languages->load('validation.errors');




        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

            $employeecategories->Name = $this->filterstring($_POST['Name']) ;


            if($employeecategories->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/employeecategories');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $employeecategories = EmployeeCategoriesModel::getByPK($id);
        if($employeecategories == false){
            $this->redirect('/employeecategories');
        }
        $this->languages->load('expensescategories.messages');

        if($employeecategories->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/employeecategories');


    }

}
