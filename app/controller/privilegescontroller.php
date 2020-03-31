<?php

namespace PHPMVC\controller;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\PrivilegesModel;

class PrivilegesController extends AbstractController
{

    use InputFilter;
    use Helper;
    public function defaultAction()
    {
        $this->languages->load('template.common');
       $this->languages->load('privileges.default');
        $this->_data['privileges'] = PrivilegesModel::getAll();

        $this->_view();


    }

    public function createAction()
    {
        $this->languages->load('template.common');
        $this->languages->load('privileges.labels');
        $this->languages->load('privileges.create');
        $this->languages->load('privileges.messages');

        if(isset($_POST['submit'])){

                   

                    $privileges = new PrivilegesModel();
                      $privileges->PrivilegsTitle = $this->filterstring($_POST['PrivilegeTitle']);
                      $privileges->Privilegs = $this->filterstring($_POST['Privilege']);

                    if( $privileges->save()){

                        $this->messenger->add($this->languages->get('message_create_success'));

                         $this->redirect('/privileges');
                        echo 'Saved Successfully';
                    };




                }

        $this->_view();




    }
    public function editAction()
    {

        $privilegId = $this->filterint( $this->_params[0]);
        $privileg = PrivilegesModel::getByPK($privilegId);

        if($privileg === false){

            $this->redirect('/privileges');
        }
        $this->languages->load('template.common');
        $this->languages->load('privileges.labels');
        $this->languages->load('privileges.edit');
        $this->languages->load('privileges.messages');

             $this->_data['privilege'] = $privileg;


                if(isset($_POST['submit'])){

                    $privileg->PrivilegsTitle = $this->filterstring($_POST['PrivilegeTitle']);
                    $privileg->Privilegs = $this->filterstring($_POST['Privilege']);

                    if( $privileg->save()){

                        $this->messenger->add($this->languages->get('message_create_success'));


                    }


                    $this->redirect('/privileges');
                }

              $this->_view();


    }
    public function deleteAction()
    {
        $this->languages->load('privileges.messages');
                $privilegId  = $this->_params[0];
                $privileg = PrivilegesModel::getByPK($privilegId);
                  $this->_data['privilege'] = $privileg;
                    if( $privileg->delete()){
                        $this->messenger->add($this->languages->get('message_delete_success'));
                         $this->redirect('/privileges');

                    };




    }



}