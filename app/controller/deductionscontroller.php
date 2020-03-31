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


class DeductionsController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'employee_id'   =>    'req|num',
            'deductionsReason'   =>    'req|alpha|between(3,25)',
            'deductions'   =>    'req|num',


        ];

    public function defaultAction(){

       $this->languages->load('template.common');
        $this->languages->load('deductions.default');
        $this->_data['deductions'] = DeductionsModel::getAll();


         $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('deductions.labels');
        $this->languages->load('deductions.create');
        $this->languages->load('deductions.messages');
        $this->languages->load('validation.errors');

       $this->_data['emp'] = EmployeeModel::getAll();

        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

                $deductions = new DeductionsModel();
                $deductions->employee_id = $this->filterstring($_POST['employee_id']) ;
                $deductions->deductionsReason = $this->filterstring($_POST['deductionsReason']);
                $deductions->deductions = $this->filterstring($_POST['deductions']) ;
                $deductions->app_users_id = $this->session->u->UserId;
                $deductions->date = date('Y-m-d H:i:s');



                if($deductions->save()){

                    $employee = EmployeeModel::getByPK($deductions->employee_id);
                    $employee->deductions_id += $deductions->deductions;
                    $employee->save();
                    $this->messenger->add($this->languages->get('message_create_success'));
                    $this->redirect('/deductions');

                }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                }



        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
            $deductions = DeductionsModel::getByPK($id);
            if($deductions == false){
                $this->redirect('/deductions');
            }

            $this->_data['deductions'] = $deductions;
            $this->_data['emp'] = EmployeeModel::getAll();
            $this->languages->load('template.common');
            $this->languages->load('deductions.labels');
            $this->languages->load('deductions.edit');
            $this->languages->load('deductions.messages');
            $this->languages->load('validation.errors');




        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

            $deductions->employee_id = $this->filterstring($_POST['employee_id']) ;
            $deductions->deductionsReason = $this->filterstring($_POST['deductionsReason']);
            $deductions->deductions = $this->filterstring($_POST['deductions']) ;
            $deductions->app_users_id = $this->session->u->UserId;
            $deductions->date = date('Y-m-d H:i:s');


            if($deductions->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/deductions');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $deductions = DeductionsModel::getByPK($id);
        if($deductions == false){
            $this->redirect('/deductions');
        }
        $this->languages->load('deductions.messages');

        if($deductions->delete()){

            $employee = EmployeeModel::getByPK($deductions->employee_id);
            $employee->deductions_id -= $deductions->deductions;;
            $employee->save();
            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/deductions');


    }

}
