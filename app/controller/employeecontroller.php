<?php

namespace PHPMVC\controller;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\BranchesModel;
use PHPMVC\Models\EmployeeCategoriesModel;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\NotificationsModel;
use PHPMVC\Models\UserProfileModel;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersModel;

class employeeController extends AbstractController
{

    use InputFilter;
    use Helper;
    private $_createActionRoles =
        [
            'employeeName'     => 'req|alpha|between(3,10)',
            'employeeNumber'      => 'req|num',
            'employeeAdress'      => 'req|alphanum|between(3,12)',
            'employeeSalary'      => 'req|num',
            'employees_cat_id'         => 'req|num',
            'theBranch_id'        => 'req|num',

        ];

    private $_editActionRoles =
        [

        ];
    public function defaultAction()
    {


        $this->languages->load('template.common');
       $this->languages->load('employee.default');

        $this->_data['emp'] =  EmployeeModel::getAll();

       
       // var_dump($this->languages->get(text_user_add));

        $this->_view();





    }



    public function createAction()
    {

        $this->languages->load('template.common');
        $this->languages->load('employee.labels');
        $this->languages->load('employee.create');
        $this->languages->load('employee.messages');

        $this->languages->load('validation.errors');

         $this->_data['empcat'] = EmployeeCategoriesModel::getAll();
         $this->_data['brench'] = BranchesModel::getAll();



        if(isset($_POST['submit']) &&  $this->isValid($this->_createActionRoles, $_POST)){


                        $employee = new EmployeeModel();

                        $employee->employeeName = $this->filterString($_POST['employeeName']);
                        $employee->employeeNumber = $this->filterString($_POST['employeeNumber']);
                        $employee->employeeAdress = $this->filterString($_POST['employeeAdress']);
                        $employee->employeeSalary = $this->filterint($_POST['employeeSalary']);
                        $employee->employeeNetSalary = $this->filterint($_POST['employeeNetSalary']);
                        $employee->deductions_id = $this->filterint($_POST['deductions_id']);
                        $employee->advancePayment_id = $this->filterint($_POST['advancePayment_id']);
                        $employee->theBranch_id = $this->filterInt($_POST['theBranch_id']);
                        $employee->employees_cat_id = $this->filterInt($_POST['employees_cat_id']);
                        $employee->app_users_id =  $this->session->u->UserId;





                        if($employee->save()){

                            $this->messenger->add($this->languages->get('message_create_success'));

                        }else{
                            $this->messenger->add($this->languages->get('message_create_failed'));
                        }


                       $this->redirect('/employee');

                }

                  $this->_view();




    }
    public function editAction()
    {
        $id = $this->_params[0];
        $employee = EmployeeModel::getByPK($id);

        if($employee === false || $this->session->u->UserId == $id){
            $this->redirect('/employee');
        }
        $this->_data['emp'] = $employee;

        $this->languages->load('template.common');
        $this->languages->load('employee.labels');
        $this->languages->load('employee.edit');
        $this->languages->load('employee.messages');
        $this->languages->load('validation.errors');

        $this->_data['brench'] = BranchesModel::getAll();
        $this->_data['empcat'] = EmployeeCategoriesModel::getAll();





        if(isset($_POST['submit']) &&  $this->isValid($this->_editctionRoles, $_POST)){

            $employee->employeeName = $this->filterString($_POST['employeeName']);
            $employee->employeeNumber = $this->filterString($_POST['employeeNumber']);
            $employee->employeeAdress = $this->filterString($_POST['employeeAdress']);
            $employee->employeeSalary = $this->filterint($_POST['employeeSalary']);
            $employee->employeeNetSalary = $this->filterint($_POST['employeeNetSalary']);
            $employee->deductions_id = $this->filterint($_POST['deductions_id']);
            $employee->advancePayment_id = $this->filterint($_POST['advancePayment_id']);
            $employee->theBranch_id = $this->filterInt($_POST['theBranch_id']);
            $employee->employees_cat_id = $this->filterInt($_POST['employees_cat_id']);
            $employee->app_users_id =  $this->session->u->UserId;

            if($employee->save()){
                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'));
            }


            $this->redirect('/employee');


        }

              $this->_view();


    }
    public function deleteAction()
    {
                 $this->languages->load('template.common');
                 $this->languages->load('employee.messages');

                $id = $this->filterint($this->_params[0]);
                $employee= EmployeeModel::getByPK($id);
                if($employee === false ){
                    $this->redirect('/employee');
                }

                    if( $employee->delete()){
                        $this->messenger->add($this->languages->get('message_delete_success'));
                        $this->redirect('/employee');


                    };


              $this->_view();


    }





}


