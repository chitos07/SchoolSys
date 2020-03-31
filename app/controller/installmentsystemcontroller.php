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
use PHPMVC\Models\InstallmentSystemModel;
use PHPMVC\Models\MergingstudentsModel;
use PHPMVC\Models\MissedoutModel;
use PHPMVC\Models\MissedoutsModel;
use PHPMVC\Models\NotificationsModel;
use PHPMVC\Models\StudentsModel;


class InstallmentSystemController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'installmentNumbers'   =>    'req|num',



        ];
    private $_editActionRoles =
        [
            'installmentNumbers'   =>    'req|num',


        ];

    public function defaultAction(){

        $this->languages->load('template.common');
        $this->languages->load('installmentsystem.default');
        $this->_data['installmentsystem'] = InstallmentSystemModel::getAll();

        $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('installmentsystem.labels');
        $this->languages->load('installmentsystem.create');
        $this->languages->load('installmentsystem.messages');
        $this->languages->load('installmentsystem.errors');

        $this->_data['studnet'] = StudentsModel::getAll();

        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

            $installmentsystem = new InstallmentSystemModel();
            $installmentsystem->installmentNumbers= $this->filterint($_POST['installmentNumbers']) ;
            $installmentsystem->Date1 = $this->filterstring($_POST['date1']);
            $installmentsystem->Date2 = $this->filterstring($_POST['date2']);
            $installmentsystem->Date3 = $this->filterstring($_POST['date3']);
            $installmentsystem->Date4 = $this->filterstring($_POST['date4']);
            $installmentsystem->Date5 = $this->filterstring($_POST['date5']);
            $installmentsystem->app_users_id = $this->session->u->UserId;




            if($installmentsystem->save()){

                $this->messenger->add($this->languages->get('message_create_success'));
                $this->redirect('/installmentsystem');

            }else{

                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

            }



        }

        $this->_view();
    }


    public function editAction(){

        $id = $this->filterint($this->_params[0]);
        $installmentsystem = InstallmentSystemModel::getByPK($id);
        if($installmentsystem == false){
            $this->redirect('/mergingstudents');
        }

        $this->_data['installment'] = $installmentsystem;
        $this->_data['studnet'] = StudentsModel::getAll();
        $this->languages->load('template.common');
        $this->languages->load('installmentsystem.labels');
        $this->languages->load('installmentsystem.edit');
        $this->languages->load('installmentsystem.messages');
        $this->languages->load('validation.errors');




        if( isset($_POST['submit']) && $this->isValid($this->_editActionRoles,$_POST)){


            $installmentsystem->installmentNumbers= $this->filterint($_POST['installmentNumbers']) ;
            $installmentsystem->Date1 = $this->filterstring($_POST['Date1']);
            $installmentsystem->Date2 = $this->filterstring($_POST['Date2']);
            $installmentsystem->Date3 = $this->filterstring($_POST['Date3']);
            $installmentsystem->Date4 = $this->filterstring($_POST['Date4']);
            $installmentsystem->Date5 = $this->filterstring($_POST['Date5']);
            $installmentsystem->app_users_id = $this->session->u->UserId;


            if($installmentsystem->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/installmentsystem');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $inst = InstallmentSystemModel::getByPK($id);
        if($inst == false){
            $this->redirect('/installmentsystem');
        }
        $this->languages->load('installmentsystem.messages');

        if($inst->delete()){


            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/installmentsystem');


    }

    public  function CheckInsAction(){

        $lol = InstallmentSystemModel::GetInsAndStuName();
        $date = date('Y-m-d');

        foreach ($lol as $student){

            if($student->Date1 == $date){

                $notif = new NotificationsModel();
                $notif->Title = 'القسط الاولي';
                $notif->Content = $student->studnetName;
                $notif->UserId = $student->UserId;
                $notif->Date = $student->Date1;
                $notif->Seen = 0;
                $notif->save();
            } elseif ($student->Date2 == $date){
                $notif = new NotificationsModel();
                $notif->Title = 'القسط الثاني';
                $notif->Content = $student->studnetName;
                $notif->UserId = $student->UserId;
                $notif->Date = $student->Date2;
                $notif->Seen = 0;
                $notif->save();
            } elseif ($student->Date3 == $date){
                $notif = new NotificationsModel();
                $notif->Title = 'القسط الثالث';
                $notif->Content = $student->studnetName;
                $notif->UserId = $student->UserId;
                $notif->Date = $student->Date3;
                $notif->Seen = 0;
                $notif->save();
            } elseif ($student->Date4 == $date){
                $notif = new NotificationsModel();
                $notif->Title = 'القسط الرابع';
                $notif->Content = $student->studnetName;
                $notif->UserId = $student->UserId;
                $notif->Date = $student->Date4;
                $notif->Seen = 0;
                $notif->save();
            } elseif ($student->Date5 == $date){
                $notif = new NotificationsModel();
                $notif->Title = 'القسط الخامس';
                $notif->Content = $student->studnetName;
                $notif->UserId = $student->UserId;
                $notif->Date = $student->Date5;
                $notif->Seen = 0;
                $notif->save();
            }


        }

            $this->redirect('/');





    }
}
