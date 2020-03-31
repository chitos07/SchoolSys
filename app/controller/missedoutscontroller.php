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
use PHPMVC\Models\MissedoutModel;
use PHPMVC\Models\MissedoutsModel;


class MissedoutsController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'employee_id'   =>    'req|num',
            'missedoutsReason'   =>    'req|alpha|between(3,25)',


        ];
    private $_editActionRoles =
        [
            'employee_id'   =>    'req|num',
            'missedoutsReason'   =>    'req|alpha|between(3,25)',

        ];

    public function defaultAction(){

        $this->languages->load('template.common');
        $this->languages->load('missedouts.default');
        $this->_data['missedouts'] = MissedoutsModel::getAll();


        $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('missedouts.labels');
        $this->languages->load('missedouts.create');
        $this->languages->load('missedouts.messages');
        $this->languages->load('validation.errors');

        $this->_data['emp'] = EmployeeModel::getAll();

        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

            $missdouts = new MissedoutsModel();
            $missdouts->employee_id = $this->filterint($_POST['employee_id']) ;
            $missdouts->missedoutsReason = $this->filterstring($_POST['missedoutsReason']);
            $missdouts->app_users_id = $this->session->u->UserId;
            $missdouts->date = date('Y-m-d H:i:s');



            if($missdouts->save()){

                $this->messenger->add($this->languages->get('message_create_success'));
                $this->redirect('/missedouts');

            }else{

                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

            }



        }

        $this->_view();
    }


    public function editAction(){

        $id = $this->filterint($this->_params[0]);
        $missdouts = MissedoutsModel::getByPK($id);
        if($missdouts == false){
            $this->redirect('/missedouts');
        }

        $this->_data['missedout'] = $missdouts;
        $this->_data['emp'] = EmployeeModel::getAll();
        $this->languages->load('template.common');
        $this->languages->load('advancepayment.labels');
        $this->languages->load('advancepayment.edit');
        $this->languages->load('advancepayment.messages');
        $this->languages->load('validation.errors');




        if( isset($_POST['submit']) && $this->isValid($this->_editActionRoles,$_POST)){


            $missdouts->employee_id = $this->filterint($_POST['employee_id']) ;
            $missdouts->missedoutsReason = $this->filterstring($_POST['missedoutsReason']);
            $missdouts->app_users_id = $this->session->u->UserId;
            $missdouts->date = date('Y-m-d H:i:s');


            if($missdouts->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/missedouts');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $missdout = MissedoutsModel::getByPK($id);
        if($missdout == false){
            $this->redirect('/missedouts');
        }
        $this->languages->load('deductions.messages');

        if($missdout->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/missedouts');


    }

}
