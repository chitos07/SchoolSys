<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\BranchesModel;
use PHPMVC\Models\BusModel;
use PHPMVC\Models\ClientsModel;
use PHPMVC\Models\DayGainModel;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\ExpensesCategoriesModel;
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

class BusController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [

           
            'school_student_id'    =>   'req|num',
            'busPrice'        =>            'req|num',



        ];

        private $_EditActionRoles =
        [
            'StudentId'    =>             'req|num',
            'busPrice'        =>            'req|num',


        ];
  
    public function defaultAction(){

       $this->languages->load('template.common');
       $this->languages->load('bus.default');
       $this->_data['bus'] = BusModel::getAll();


         $this->_view();


    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('bus.labels');
        $this->languages->load('bus.create');
        $this->languages->load('bus.messages');
        $this->languages->load('validation.errors');

            $this->_data['student'] = StudentsModel::getAll();

              if( isset($_POST['submit']) ){



				
                  $bus = new BusModel();
                  $bus->school_student_id = $this->filterint($_POST['SchoolStudents']);
                  $bus->busPrice = $this->filterint($_POST['price']);

                   if($bus->save()){

                       $student = StudentsModel::getByPK($bus->school_student_id);
                       $student->Bus += $bus->busPrice;
                       $student->save();

                    $this->messenger->add($this->languages->get('message_create_success'));


                    }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                  }


              $this->redirect('/bus');

        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
             $bus = BusModel::getByPK($id);

            $this->_data['bus'] = $bus;
            $this->_data['student'] = StudentsModel::getAll();


             if($bus == false){
                $this->redirect('/bus');
            }



           $this->languages->load('template.common');
          $this->languages->load('bus.labels');
          $this->languages->load('bus.edit');
          $this->languages->load('bus.messages');
          $this->languages->load('bus.errors');

          



        if( isset($_POST['submit']) && $this->isValid($this->_EditActionRoles,$_POST)){

            $bus->school_student_id = $this->filterint($_POST['StudentId']);
            $bus->busPrice = $this->filterint($_POST['busPrice']);
        

            if($bus->save()){

                $student = StudentsModel::getByPK($bus->school_student_id);
                $student->Bus = $bus->busPrice;
                $student->save();
                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }




            $this->redirect('/bus');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $bus =  BusModel::getByPK($id);
        if($bus == false){
            $this->redirect('/bus');
        }
        $this->languages->load('types.messages');

        if($bus->delete()){
            $student = StudentsModel::getByPK($bus->school_student_id);
            $student->Bus = 0;
            $student->save();
            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/bus');


    }
   

}
