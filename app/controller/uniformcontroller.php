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
use PHPMVC\Models\UniformModel;
use PHPMVC\Models\YearsModel;

class UniformController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [

           
            'school_student_id'    =>   'req|num',
            'uniformPrice'        =>            'req|num',



        ];

        private $_EditActionRoles =
        [
            'StudentId'    =>             'req|num',
            'uniformPrice'        =>            'req|num',


        ];
  
    public function defaultAction(){

       $this->languages->load('template.common');
       $this->languages->load('uniform.default');
       $this->_data['uniform'] = UniformModel::getAll();


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



				
                    $uniform = new UniformModel();

                  $uniform->school_student_id = $this->filterint($_POST['SchoolStudents']);
                  $uniform->uniformPrice = $this->filterint($_POST['uniformPrice']);

                   if($uniform->save()){

                       $student = StudentsModel::getByPK($uniform->school_student_id);
                       $student->uniform = $uniform->uniformPrice;
                       $student->save();

                    $this->messenger->add($this->languages->get('message_create_success'));


                    }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                  }

              $this->redirect('/uniform');

        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
           $uniform = UniformModel::getByPK($id);

            $this->_data['uniform'] = $uniform;
            $this->_data['student'] = StudentsModel::getAll();


             if($uniform == false){
                $this->redirect('/uniform');
            }



           $this->languages->load('template.common');
          $this->languages->load('bus.labels');
          $this->languages->load('bus.edit');
          $this->languages->load('bus.messages');
          $this->languages->load('bus.errors');

          



        if( isset($_POST['submit']) && $this->isValid($this->_EditActionRoles,$_POST)){

            $uniform->school_student_id = $this->filterint($_POST['StudentId']);
            $uniform->uniformPrice = $this->filterint($_POST['uniformPrice']);
        

            if($uniform->save()){

                $student = StudentsModel::getByPK($uniform->school_student_id);
                $student->Uniform = $uniform->uniformPrice;
                $student->save();
                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }




            $this->redirect('/uniform');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $uniform =  UniformModel::getByPK($id);
        if($uniform == false){
            $this->redirect('/uniform');
        }
        $this->languages->load('types.messages');

        if($uniform->delete()){
            $student = StudentsModel::getByPK($uniform->school_student_id);
            $student->uniform = 0;
            $student->save();
            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/uniform');


    }
   

}
