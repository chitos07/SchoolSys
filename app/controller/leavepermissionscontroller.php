<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\DailyExpensesModel;
use PHPMVC\Models\DeductionsModel;
use PHPMVC\Models\EmployeeCategoriesModel;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\ExpensesCategoriesModel;
use PHPMVC\Models\LeavePermissionsModel;


class LeavePermissionsController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'employee_id'   =>    'req|num',
            'leavepermissionsReason'   =>    'req|alpha|between(3,25)',


        ];

    public function defaultAction(){

       $this->languages->load('template.common');
        $this->languages->load('leavepermissions.default');
        $this->_data['leave'] = LeavePermissionsModel::getAll();


         $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('leavepermissions.labels');
        $this->languages->load('leavepermissions.create');
        $this->languages->load('leavepermissions.messages');
        $this->languages->load('validation.errors');

       $this->_data['emp'] = EmployeeModel::getAll();


        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

                $leave = new LeavePermissionsModel();
                $leave->employee_id = $this->filterstring($_POST['employee_id']) ;
                $leave->leavepermissionsReason = $this->filterstring($_POST['leavepermissionsReason']);
                $leave->app_users_id = $this->session->u->UserId;
                $leave->Date = date('Y-m-d H:i:s');



                if($leave->save()){

                    $this->messenger->add($this->languages->get('message_create_success'));
                    $this->redirect('/leavepermissions');

                }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                }



        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
        $leave = LeavePermissionsModel::getByPK($id);
            if($leave == false){
                $this->redirect('/leavepermissions');
            }

            $this->_data['leave'] = $leave;
            $this->_data['emp'] = EmployeeModel::getAll();

            $this->languages->load('template.common');
            $this->languages->load('deductions.labels');
            $this->languages->load('deductions.edit');
            $this->languages->load('deductions.messages');
            $this->languages->load('validation.errors');




        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

            $leave->employee_id = $this->filterstring($_POST['employee_id']) ;
            $leave->deductionsReason = $this->filterstring($_POST['leavepermissionsReason']);
            $leave->app_users_id = $this->session->u->UserId;
            $leave->date = date('Y-m-d H:i:s');


            if($leave->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/leavepermissions');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $leave = LeavePermissionsModel::getByPK($id);
        if($leave == false){
            $this->redirect('/leavepermissions');
        }
        $this->languages->load('deductions.messages');

        if($leave->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/leavepermissions');


    }

}
