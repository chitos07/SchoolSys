<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\ClientsModel;
use PHPMVC\Models\DayGainModel;
use PHPMVC\Models\ExpensesCategoriesModel;
use PHPMVC\Models\ProductListModel;
use PHPMVC\Models\PurchasesInvoicesModel;
use PHPMVC\Models\PurchasesModel;
use PHPMVC\Models\SalesInvoicesModel;
use PHPMVC\Models\SalesModel;
use PHPMVC\Models\SuppliersModel;
use PHPMVC\Models\TypesModel;

class TypesController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [

           
            'systemTypes'    =>   'req|alpha|between(3,10)',
          


        ];

        private $_EditActionRoles =
        [
            'systemTypes'    =>   'req|alpha|between(3,10)',

        ];
  
    public function defaultAction(){

       $this->languages->load('template.common');
       $this->languages->load('types.default');
       $this->_data['types'] = TypesModel::getAll();


      //  $this->_data['salesinv'] = SalesInvoicesModel::getAll();
         $this->_view();


    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('types.labels');
        $this->languages->load('types.create');
        $this->languages->load('types.messages');
        $this->languages->load('validation.errors');

          
           

              if( isset($_POST['submit']) ){


				
                    $types = new TypesModel();

                    $types->systemTypes = $this->filterstring($_POST['systemTypes']);
						
                   if($types->save()){


                    $this->messenger->add($this->languages->get('message_create_success'));


                    }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                  }


              $this->redirect('/types');

        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
             $types = TypesModel::getByPK($id);

            $this->_data['types'] = $types;

             if($types == false){
                $this->redirect('/sales');
            }



           $this->languages->load('template.common');
          $this->languages->load('types.labels');
          $this->languages->load('types.edit');
          $this->languages->load('types.messages');
          $this->languages->load('types.errors');

          



        if( isset($_POST['submit']) && $this->isValid($this->_EditActionRoles,$_POST)){

            $types->systemTypes = $this->filterstring($_POST['systemTypes']);
        

            if($types->save()){


                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }



            $this->redirect('/types');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $types = TypesModel::getByPK($id);
        if($types == false){
            $this->redirect('/sales');
        }
        $this->languages->load('types.messages');

        if($types->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/types');


    }
   

}
