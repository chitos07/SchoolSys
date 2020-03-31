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
use PHPMVC\Models\MergingStudentsDeepModel;
use PHPMVC\Models\MergingstudentsModel;
use PHPMVC\Models\MissedoutModel;
use PHPMVC\Models\MissedoutsModel;
use PHPMVC\Models\StudentsModel;


class MergingstudentsController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'schoolstudents_id'   =>    'req|num',
            'status'   =>    'req|alpha|between(3,25)',
            'Price'   =>    'req|num',


        ];
    private $_editActionRoles =
        [
            'schoolstudents_id'   =>    'req|num',
            'status'   =>    'req|alpha|between(3,25)',
            'Price'   =>    'req|num',


        ];

    public function defaultAction(){

        $this->languages->load('template.common');
        $this->languages->load('mergingstudents.default');
        $this->_data['mergingstudents'] = MergingstudentsModel::getAll();

       

        $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('mergingstudents.labels');
        $this->languages->load('mergingstudents.create');
        $this->languages->load('mergingstudents.messages');
        $this->languages->load('mergingstudents.errors');

        $this->_data['studnet'] = StudentsModel::getAll();

        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

            $merging = new MergingstudentsModel();
            $merging->schoolstudents_id = $this->filterint($_POST['schoolstudents_id']) ;
            $merging->status = $this->filterstring($_POST['status']);
            $merging->studentInfo = $this->filterstring($_POST['studentInfo']);
            $merging->Price = $this->filterint($_POST['Price']);
            $merging->app_users_id = $this->session->u->UserId;
            $merging->date = date('Y-m-d H:i:s');



            if($merging->save()){

                $this->messenger->add($this->languages->get('message_create_success'));
                $this->redirect('/mergingstudents');

            }else{

                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

            }



        }

        $this->_view();
    }


    public function editAction(){

        $id = $this->filterint($this->_params[0]);
        $merging = MergingstudentsModel::getByPK($id);
        if($merging == false){
            $this->redirect('/mergingstudents');
        }

        $this->_data['merging'] = $merging;
        $this->_data['studnet'] = StudentsModel::getAll();
        $this->languages->load('template.common');
        $this->languages->load('mergingstudents.labels');
        $this->languages->load('mergingstudents.edit');
        $this->languages->load('mergingstudents.messages');
        $this->languages->load('validation.errors');

       




        if( isset($_POST['submit']) && $this->isValid($this->_editActionRoles,$_POST)){

            $new = new MergingStudentsDeepModel();

            $new->Student_id = $merging->schoolstudents_id;
            $new->Info = $merging->studentInfo;
            $new->Date = date('Y-m-d H:i:s');
            $new->save();


            $merging->schoolstudents_id = $this->filterint($_POST['schoolstudents_id']) ;
            $merging->status = $this->filterstring($_POST['status']);
            $merging->studentInfo = $this->filterstring($_POST['studentInfo']);
            $merging->Price = $this->filterint($_POST['Price']);
            $merging->app_users_id = $this->session->u->UserId;
            $merging->LastEdit = date('Y-m-d H:i:s');


            if($merging->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/mergingstudents');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $merging = MergingstudentsModel::getByPK($id);
        if($merging == false){
            $this->redirect('/mergingstudents');
        }
        $this->languages->load('mergingstudents.messages');

        if($merging->delete()){


            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/mergingstudents');


    }

    public function viewAction()
    {
        $id = $this->filterint($this->_params[0]);
        $merging = MergingstudentsModel::getByPK($id);
        $this->languages->load('template.common');

        $this->languages->load('mergingstudents.labels');
        $this->languages->load('mergingstudents.view');

        $this->_data['mergings'] = $merging;
        $this->_data['student'] = StudentsModel::getByPK($merging->schoolstudents_id);

        $this->_view();
    }

}
