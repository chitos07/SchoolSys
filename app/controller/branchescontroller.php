<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\BranchesModel;
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

class BranchesController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
        [

           
            'Adress'    =>   'req|alpha|between(3,25)',
            'Area'    =>   'req|alpha|between(3,25)',



        ];

        private $_EditActionRoles =
        [
            'Adress'    =>   'req|alpha|between(3,25)',
            'Area'    =>   'req|alpha|between(3,25)',

        ];
  
    public function defaultAction(){

       $this->languages->load('template.common');
       $this->languages->load('branches.default');
       $this->_data['branches'] = BranchesModel::getAll();


         $this->_view();


    }

    public function  createAction(){

        $this->languages->load('template.common');
        $this->languages->load('branches.labels');
        $this->languages->load('branches.create');
        $this->languages->load('branches.messages');
        $this->languages->load('validation.errors');




              if( isset($_POST['submit']) ){


				
                    $branches = new BranchesModel();

                  $branches->Adress = $this->filterstring($_POST['Adress']);
                  $branches->Area = $this->filterstring($_POST['area']);

                   if($branches->save()){


                    $this->messenger->add($this->languages->get('message_create_success'));


                    }else{

                    $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);

                  }

              $this->redirect('/branches');

        }

        $this->_view();
    }


    public function editAction(){

            $id = $this->filterint($this->_params[0]);
        $branches = BranchesModel::getByPK($id);

            $this->_data['branches'] = $branches;

             if($branches == false){
                $this->redirect('/branches');
            }



           $this->languages->load('template.common');
          $this->languages->load('branches.labels');
          $this->languages->load('branches.edit');
          $this->languages->load('branches.messages');
          $this->languages->load('validation.errors');

          



        if( isset($_POST['submit']) && $this->isValid($this->_EditActionRoles,$_POST)){

            $branches->Adress = $this->filterstring($_POST['Adress']);
            $branches->Area = $this->filterstring($_POST['Area']);
        

            if($branches->save()){


                $this->messenger->add($this->languages->get('message_create_success'));

            }else{
                $this->messenger->add($this->languages->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }



            $this->redirect('/branches');

        }

        $this->_view();




    }

    public function deleteAction()
    {

        $id = $this->filterint($this->_params[0]);
        $branches = BranchesModel::getByPK($id);
        if($branches == false){
            $this->redirect('/branches');
        }
        $this->languages->load('types.messages');

        if($branches->delete()){

            $this->messenger->add($this->languages->get('message_delete_success'));

        }else{
            $this->messenger->add($this->languages->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/branches');


    }
   

}
