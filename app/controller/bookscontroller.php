<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\BooksModel;
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

class BooksController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [

           
            'school_student_id'    =>   'req|num',
            'booksPrice'        =>            'req|num',



        ];

        private $_EditActionRoles =
        [
            'StudentId'    =>             'req|num',
            'booksPrice'        =>            'req|num',


        ];
  
    public function defaultAction(){

       $this->languages->load('template.common');
       $this->languages->load('books.default');
       $this->_data['books'] = BooksModel::getAll();


         $this->_view();


    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('books.labels');
        $this->languages->load('books.create');
        $this->languages->load('books.messages');
        $this->languages->load('validation.errors');

            $this->_data['student'] = StudentsModel::getAll();

              if( isset($_POST['submit']) ){



				
                    $books = new BooksModel();

                  $books->school_student_id = $this->filterint($_POST['SchoolStudents']);
                  $books->booksPrice = $this->filterint($_POST['booksPrice']);

                   if($books->save()){

                       $student = StudentsModel::getByPK($books->school_student_id);
                       $student->Books += $books->booksPrice;
                       $student->save();

                    $this->messenger->add($this->languages->get('message_create_success'));


                    }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                  }


              $this->redirect('/books');

        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
             $books = BooksModel::getByPK($id);

            $this->_data['books'] = $books;
            $this->_data['student'] = StudentsModel::getAll();


             if($books == false){
                $this->redirect('/books');
            }



           $this->languages->load('template.common');
          $this->languages->load('bus.labels');
          $this->languages->load('bus.edit');
          $this->languages->load('bus.messages');
          $this->languages->load('bus.errors');

          



        if( isset($_POST['submit']) && $this->isValid($this->_EditActionRoles,$_POST)){

            $books->school_student_id = $this->filterint($_POST['StudentId']);
            $books->booksPrice = $this->filterint($_POST['booksPrice']);


            if($books->save()){

                $student = StudentsModel::getByPK($books->school_student_id);
                $student->Books = $books->booksPrice;
                $student->save();
                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }




            $this->redirect('/books');

        }

      
        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $books =  BooksModel::getByPK($id);
        if($books == false){
            $this->redirect('/books');
        }
        $this->languages->load('types.messages');

        if($books->delete()){
            $student = StudentsModel::getByPK($books->school_student_id);
            $student->Books = 0;
            $student->save();
            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/books');


    }
   

}
