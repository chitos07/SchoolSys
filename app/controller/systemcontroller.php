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
use PHPMVC\Models\SystemModel;
use PHPMVC\Models\TypesModel;

class SystemController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [

           
            'Name'    =>   'req|alpha|between(3,10)',
          


        ];

        private $_EditActionRoles =
        [
            'Name'    =>   'req|alpha|between(3,10)',

        ];
  
    public function defaultAction(){

       $this->languages->load('template.common');
       $this->languages->load('system.default');
       $this->_data['system'] = SystemModel::getAll();


         $this->_view();


    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('system.labels');
        $this->languages->load('system.create');
        $this->languages->load('system.messages');
        $this->languages->load('validation.errors');

          
           

              if( isset($_POST['submit']) ){


				
                    $system = new SystemModel();

                    $system->Name = $this->filterstring($_POST['name']);
						
                   if($system->save()){


                    $this->messenger->add($this->languages->get('message_create_success'));


                    }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                  }


              $this->redirect('/system');

        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
             $system = SystemModel::getByPK($id);

            $this->_data['system'] = $system;

             if($system == false){
                $this->redirect('/system');
            }



           $this->languages->load('template.common');
          $this->languages->load('system.labels');
          $this->languages->load('system.edit');
          $this->languages->load('system.messages');
          $this->languages->load('types.errors');

          



        if( isset($_POST['submit']) && $this->isValid($this->_EditActionRoles,$_POST)){

            $system->Name = $this->filterstring($_POST['Name']);
        

            if($system->save()){


                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }



            $this->redirect('/system');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $system = SystemModel::getByPK($id);
        if($system == false){
            $this->redirect('/system');
        }
        $this->languages->load('types.messages');

        if($system->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/system');


    }
   

}
