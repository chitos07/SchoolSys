<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\ExpensesCategoriesModel;


class ExpensesCategoriesController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [
            'ExpenseName'    =>   'req|alpha|between(3,40)',
            'FixedPayment'   =>   'req|num',
        ];

    public function defaultAction(){

       $this->languages->load('template.common');
        $this->languages->load('expensescategories.default');
        $this->_data['expenses'] = ExpensesCategoriesModel::getAll();
         $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('expensescategories.labels');
        $this->languages->load('expensescategories.create');
        $this->languages->load('expensescategories.messages');
        $this->languages->load('validation.errors');

        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

                    $expenses = new ExpensesCategoriesModel();
                    $expenses->ExpenseName = $this->filterstring($_POST['ExpenseName']);
                    $expenses->FixedPayment = $this->filterint($_POST['FixedPayment']);

                if($expenses->save()){

                    $this->messenger->add($this->languages->get('message_create_success'));
                    $this->redirect('/expensescategories');

                }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                }



        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
             $expenses = ExpensesCategoriesModel::getByPK($id);
            if($expenses == false){
                $this->redirect('/expensescategories');
            }


            $this->languages->load('template.common');
            $this->languages->load('expensescategories.labels');
            $this->languages->load('expensescategories.edit');
            $this->languages->load('expensescategories.messages');
            $this->languages->load('validation.errors');

            $this->_data['expenses'] = $expenses;

        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

            $expenses->ExpenseName = $this->filterstring($_POST['ExpenseName']);
            $expenses->FixedPayment = $this->filterstring($_POST['FixedPayment']);

            if($expenses->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/expensescategories');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $expenses = ExpensesCategoriesModel::getByPK($id);
        if($expenses == false){
            $this->redirect('/expensescategories');
        }
        $this->languages->load('expensescategories.messages');

        if($expenses->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/expensescategories');


    }

}
