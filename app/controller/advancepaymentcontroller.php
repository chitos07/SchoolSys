<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\AdvancePaymentModel;
use PHPMVC\Models\DailyExpensesModel;
use PHPMVC\Models\DeductionsModel;
use PHPMVC\Models\EmployeeCategoriesModel;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\ExpensesCategoriesModel;


class AdvancePaymentController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'employee_id'   =>    'req|num',
            'advancepayment'   =>    'req|num',


        ];

    public function defaultAction(){

        $this->languages->load('template.common');
        $this->languages->load('advancepayment.default');
        $this->_data['payment'] = AdvancePaymentModel::getAll();


        $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('advancepayment.labels');
        $this->languages->load('advancepayment.create');
        $this->languages->load('advancepayment.messages');
        $this->languages->load('validation.errors');

        $this->_data['emp'] = EmployeeModel::getAll();

        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

            $advpayment = new AdvancePaymentModel();
            $advpayment->employee_id = $this->filterint($_POST['employee_id']) ;
            $advpayment->advancePayment = $this->filterint($_POST['advancepayment']);
            $advpayment->app_users_id = $this->session->u->UserId;
            $advpayment->date = date('Y-m-d H:i:s');



            if($advpayment->save()){

                $employee = EmployeeModel::getByPK($advpayment->employee_id);
                $employee->advancePayment_id += $advpayment->advancePayment;
                $employee->save();
                $this->messenger->add($this->languages->get('message_create_success'));
                $this->redirect('/advancepayment');

            }else{

                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

            }



        }

        $this->_view();
    }


    public function editAction(){

        $id = $this->filterint($this->_params[0]);
        $advpayment = AdvancePaymentModel::getByPK($id);
        if($advpayment == false){
            $this->redirect('/advancepayment');
        }

        $this->_data['advncet'] = $advpayment;
        $this->_data['emp'] = EmployeeModel::getAll();
        $this->languages->load('template.common');
        $this->languages->load('advancepayment.labels');
        $this->languages->load('advancepayment.edit');
        $this->languages->load('advancepayment.messages');
        $this->languages->load('validation.errors');




        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){


            $advpayment->employee_id = $this->filterint($_POST['employee_id']) ;
            $advpayment->advancePayment = $this->filterint($_POST['advancepayment']);
            $advpayment->app_users_id = $this->session->u->UserId;
            $advpayment->date = date('Y-m-d H:i:s');


            if($advpayment->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/advancepayment');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $advpayment = AdvancePaymentModel::getByPK($id);
        if($advpayment == false){
            $this->redirect('/advancepayment');
        }
        $this->languages->load('deductions.messages');

        if($advpayment->delete()){

            $employee = EmployeeModel::getByPK($advpayment->employee_id);
            $employee->advancePayment_id -= $advpayment->advancePayment;;
            $employee->save();
            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/advancepayment');


    }

}
