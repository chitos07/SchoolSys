<?php

namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\ClientsModel;
use PHPMVC\Models\CollectionsModel;
use PHPMVC\Models\DayGainModel;
use PHPMVC\Models\ExpensesCategoriesModel;
use PHPMVC\Models\InstallmentSystemModel;
use PHPMVC\Models\ProductListModel;
use PHPMVC\Models\PurchasesInvoicesModel;
use PHPMVC\Models\PurchasesModel;
use PHPMVC\Models\SalesInvoicesModel;
use PHPMVC\Models\SalesModel;
use PHPMVC\Models\StagesModel;
use PHPMVC\Models\StudentsModel;
use PHPMVC\Models\SuppliersModel;
use PHPMVC\Models\SystemModel;
use PHPMVC\Models\TypesModel;
use PHPMVC\Models\YearsModel;

class CollectionsController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'StudentId' => 'req|num',
            'ExpensesId' => 'req|num',
            'money' => 'req|num',


        ];

    private $_EditActionRoles =
        [

            'StudentId' => 'req|num',
            'ExpensesId' => 'req|num',
            'money' => 'req|num',

        ];

    public function defaultAction()
    {

        $this->languages->load('template.common');
        $this->languages->load('collections.default');
        $this->_data['collections'] = CollectionsModel::getAll();


        $this->_view();


    }

    public function createAction()
    {

        $this->languages->load('template.common');
        $this->languages->load('collections.labels');
        $this->languages->load('collections.create');
        $this->languages->load('collections.messages');
        $this->languages->load('validation.errors');

        $this->_data['student'] = StudentsModel::getAll();
        $this->_data['expensescat'] = ExpensesCategoriesModel::getAll();



        if (isset($_POST['submit'])) {


            $collections = new CollectionsModel();

            $collections->Student_id = $this->filterint($_POST['StudentId']);
            $collections->expenses_id = $this->filterint($_POST['ExpensesId']);
            $collections->User_id = $this->session->u->UserId;
            $collections->money = $this->filterint($_POST['money']);

            if ($collections->save()) {


                $this->messenger->add($this->languages->get('message_create_success'));


            } else {

                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

            }

            $this->redirect('/collections');

        }

        $this->_view();
    }


    public function editAction()
    {

        $id = $this->filterint($this->_params[0]);
        $collections = CollectionsModel::getByPK($id);

        $this->_data['collections'] = $collections;
        $this->_data['student'] = StudentsModel::getAll();
        $this->_data['expensescat'] = ExpensesCategoriesModel::getAll();

        if ($collections == false) {
            $this->redirect('/collections');
        }


        $this->languages->load('template.common');
        $this->languages->load('collections.labels');
        $this->languages->load('collections.edit');
        $this->languages->load('collections.messages');
        $this->languages->load('collections.errors');


        if (isset($_POST['submit']) && $this->isValid($this->_EditActionRoles, $_POST)) {

            $collections->Student_id = $this->filterint($_POST['StudentId']);
            $collections->expenses_id = $this->filterint($_POST['ExpensesId']);
            $collections->User_id = $this->session->u->UserId;
            $collections->money = $this->filterint($_POST['money']);


            if ($collections->save()) {


                $this->messenger->add($this->languages->get('message_create_success'));

            } else {
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }


            $this->redirect('/collections');

        }

        $this->_view();


    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $collections = CollectionsModel::getByPK($id);
        if ($collections == false) {
            $this->redirect('/collections');
        }
        $this->languages->load('types.messages');

        if ($collections->delete()) {

            $this->messenger->add($this->languages->get('message_delete_success'));

        } else {
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/collections');


    }


}
