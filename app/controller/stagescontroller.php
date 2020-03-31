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
use PHPMVC\Models\StagesModel;
use PHPMVC\Models\SuppliersModel;
use PHPMVC\Models\SystemModel;
use PHPMVC\Models\TypesModel;
use PHPMVC\Models\YearsModel;

class StagesController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [

           
            'name'    =>   'req|alpha|between(3,25)',

            'uniform'    =>   'req|num',



        ];

        private $_EditActionRoles =
        [
            'name'    =>   'req|alpha|between(3,25)',



        ];
  
    public function defaultAction(){

       $this->languages->load('template.common');
       $this->languages->load('stages.default');
       $this->_data['stage'] = StagesModel::getAll();


         $this->_view();


    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('stages.labels');
        $this->languages->load('stages.create');
        $this->languages->load('stages.messages');
        $this->languages->load('validation.errors');




              if( isset($_POST['submit']) ){


				
                    $stages = new StagesModel();

                  $stages->name = $this->filterstring($_POST['name']);


                   if($stages->save()){


                    $this->messenger->add($this->languages->get('message_create_success'));


                    }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                  }

              $this->redirect('/stages');

        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
             $stages = StagesModel::getByPK($id);

            $this->_data['stage'] = $stages;

             if($stages == false){
                $this->redirect('/stages');
            }



           $this->languages->load('template.common');
          $this->languages->load('stages.labels');
          $this->languages->load('stages.edit');
          $this->languages->load('stages.messages');
          $this->languages->load('stages.errors');

          



        if( isset($_POST['submit']) && $this->isValid($this->_EditActionRoles,$_POST)){

            $stages->name = $this->filterstring($_POST['name']);

        

            if($stages->save()){


                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }



            $this->redirect('/stages');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $stages = StagesModel::getByPK($id);
        if($stages == false){
            $this->redirect('/stages');
        }
        $this->languages->load('types.messages');

        if($stages->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/stages');


    }
   

}
