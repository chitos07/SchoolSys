<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\ActivitiescatModel;
use PHPMVC\Models\DailyExpensesModel;
use PHPMVC\Models\EmployeeCategoriesModel;
use PHPMVC\Models\ExpensesCategoriesModel;


class ActivitiescatController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [


            'activities'   =>    'req|alpha|between(3,25)',


        ];

    public function defaultAction(){

       $this->languages->load('template.common');
        $this->languages->load('activitiescat.default');
        $this->_data['activitiescat'] = ActivitiescatModel::getAll();



         $this->_view();
    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('activitiescat.labels');
        $this->languages->load('activitiescat.create');
        $this->languages->load('activitiescat.messages');
        $this->languages->load('validation.errors');


        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){

                $activitiescat = new ActivitiescatModel();
                $activitiescat->activities = $this->filterstring($_POST['activities']) ;


                if($activitiescat->save()){

                    $this->messenger->add($this->languages->get('message_create_success'));
                    $this->redirect('/activitiescat');

                }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                }



        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
        $activitiescat = ActivitiescatModel::getByPK($id);
            if($activitiescat == false){
                $this->redirect('/activitiescat');
            }

            $this->_data['activitiescat'] = $activitiescat;
            $this->languages->load('template.common');
            $this->languages->load('activitiescat.labels');
            $this->languages->load('activitiescat.edit');
            $this->languages->load('activitiescat.messages');
            $this->languages->load('validation.errors');




        if( isset($_POST['submit']) && $this->isValid($this->_createActionRoles,$_POST)){


            $activitiescat->activities = $this->filterstring($_POST['activities']) ;


            if($activitiescat->save()){

                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/activitiescat');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $activitiescat = ActivitiescatModel::getByPK($id);
        if($activitiescat == false){
            $this->redirect('/activitiescat');
        }
        $this->languages->load('expensescategories.messages');

        if($activitiescat->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/activitiescat');


    }

}
