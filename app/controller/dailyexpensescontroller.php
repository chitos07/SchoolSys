<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\DailyExpensesModel;
use PHPMVC\Models\ExpensesCategoriesModel;


class DailyExpensesController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'ExpenseId'   =>   'req|num',
            'Payment'   =>   'req|num',

        ];

    public function defaultAction(){

       $this->languages->load('template.common');
        $this->languages->load('dailyexpenses.default');
        $this->_data['expenses'] = DailyExpensesModel::getAll();



         $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('dailyexpenses.labels');
        $this->languages->load('dailyexpenses.create');
        $this->languages->load('dailyexpenses.messages');
        $this->languages->load('validation.errors');
        $this->_data['expensescat'] = ExpensesCategoriesModel::getAll();

        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

                    $dailyexpenses = new DailyExpensesModel();
                    $dailyexpenses->ExpenseId = $this->filterint($_POST['ExpenseId']) ;
                    $dailyexpenses->Created = date('Y-m-d H:i:s');
                    $dailyexpenses->Payment = $this->filterint($_POST['Payment']);
                    $dailyexpenses->UserId = $this->session->u->UserId;


                if($dailyexpenses->save()){

                    $this->messenger->add($this->languages->get('message_create_success'));
                    $this->redirect('/dailyexpenses');

                }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                }



        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
             $expenses = DailyExpensesModel::getByPK($id);
            if($expenses == false){
                $this->redirect('/dailyexpenses');
            }


            $this->languages->load('template.common');
            $this->languages->load('dailyexpenses.labels');
            $this->languages->load('dailyexpenses.edit');
            $this->languages->load('dailyexpenses.messages');
            $this->languages->load('validation.errors');

            $this->_data['expenses'] = $expenses;
            $this->_data['groups'] = ExpensesCategoriesModel::getAll();


        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

            $expenses->ExpenseId = $this->filterint($_POST['ExpenseId']) ;
            $expenses->Created = date('Y-m-d H:i:s');
            $expenses->Payment = $this->filterint($_POST['Payment']);

            if($expenses->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/dailyexpenses');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $expenses = DailyExpensesModel::getByPK($id);
        if($expenses == false){
            $this->redirect('/dailyexpenses');
        }
        $this->languages->load('expensescategories.messages');

        if($expenses->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/dailyexpenses');


    }

}
