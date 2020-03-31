<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\ActivitiescatModel;
use PHPMVC\Models\ActivitiesModel;
use PHPMVC\Models\DailyExpensesModel;
use PHPMVC\Models\EmployeeCategoriesModel;
use PHPMVC\Models\ExpensesCategoriesModel;
use PHPMVC\Models\StudentsModel;


class ActivitiesController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'activitiesPrice'   =>    'req|num',
            'schoolstudent_id'   =>    'req|num',
            'activities_categories_id'   =>    'req|num',


        ];

    public function defaultAction(){

       $this->languages->load('template.common');
        $this->languages->load('activities.default');
        $this->_data['activities'] = ActivitiesModel::getAll();



         $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('activities.labels');
        $this->languages->load('activities.create');
        $this->languages->load('activities.messages');
        $this->languages->load('validation.errors');

        $this->_data['studnet'] = StudentsModel::getAll();
        $this->_data['activitiescat'] = ActivitiescatModel::getAll();

        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

                $activities = new ActivitiesModel();
                $activities->activities_categories_id = $this->filterint($_POST['activities_categories_id']) ;
                $activities->activitiesPrice = $this->filterint($_POST['activitiesPrice']) ;
                $activities->schoolstudent_id = $this->filterint($_POST['schoolstudent_id']) ;
                $activities->app_users_id = $this->session->u->UserId ;
                $activities->date = date('Y-m-d H:i:s');


                if($activities->save()){

                    $this->messenger->add($this->languages->get('message_create_success'));
                    $this->redirect('/activities');

                }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                }



        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
        $activities = ActivitiesModel::getByPK($id);
            if($activities == false){
                $this->redirect('/activities');
            }

            $this->_data['activities'] = $activities;
            $this->_data['activitiescat'] = ActivitiescatModel::getAll();
            $this->_data['student'] = StudentsModel::getAll();
            $this->languages->load('template.common');
            $this->languages->load('activities.labels');
            $this->languages->load('activities.edit');
            $this->languages->load('activities.messages');
            $this->languages->load('validation.errors');




        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){


            $activities->activities_categories_id = $this->filterint($_POST['activities_categories_id']) ;
            $activities->activitiesPrice = $this->filterint($_POST['activitiesPrice']) ;
            $activities->schoolstudent_id = $this->filterint($_POST['schoolstudent_id']) ;
            $activities->app_users_id = $this->session->u->UserId ;
            $activities->date = date('Y-m-d H:i:s');



            if($activities->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/activities');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $activities = ActivitiesModel::getByPK($id);
        if($activities == false){
            $this->redirect('/activities');
        }
        $this->languages->load('activities.messages');

        if($activities->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/activities');


    }

}
