<?php

namespace PHPMVC\controller;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\PrivilegesModel;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;

class UsersGroupsController extends AbstractController
{

    use InputFilter;
    use Helper;
    public function defaultAction()
    {
        $this->languages->load('template.common');
       $this->languages->load('usersgroups.default');
        $this->_data['groups'] = UsersGroupsModel::getAll();
        $this->_view();





    }

    public function createAction()
    {
        $this->languages->load('template.common');
        $this->languages->load('usersgroups.labels');
        $this->languages->load('usersgroups.create');
        $this->languages->load('usersgroups.messages');
        $this->_data['privileges'] = PrivilegesModel::getAll();
        $this->_data['groupPrivileges'] = UsersGroupsPrivilegesModel::getAll();


        if (isset($_POST['submit'])) {

            $groups = new UsersGroupsModel();

            $groups->GroupName = $this->filterstring($_POST['GroupName']);

            if ($groups->save()) {

                if (isset($_POST['privileges']) && is_array($_POST['privileges'])){
                    foreach ($_POST['privileges'] as $privilege){
                        $groupprivielegs = new UsersGroupsPrivilegesModel();
                        $groupprivielegs->GroupId = $groups->GroupId;
                        $groupprivielegs->PrivilegeId = $privilege;
                        $groupprivielegs->save();


                      

                    }
                }

                $this->messenger->add($this->languages->get('message_create_success'));
               
            }else{
                $this->messenger->add($this->languages->get('message_create_failed'));
            }


            $this->redirect('/usersgroups');
            
        }
        $this->_view();
    }

    public function editAction()
    {

        $id = $this->_params[0];

        $group = UsersGroupsModel::getByPK($id);
        if ($group === false){
            $this->redirect('/usersgroups');
        }
        $this->languages->load('template.common');
        $this->languages->load('usersgroups.labels');
        $this->languages->load('usersgroups.edit');
        $this->languages->load('usersgroups.messages');

        $this->_data['groups'] = $group;
        $this->_data['privileges'] = PrivilegesModel::getAll();
        $extractprivilegsids = $this->_data['groupprivilegs'] = UsersGroupsPrivilegesModel::getGroupPrivileges($group);

        if (isset($_POST['submit'])) {


            $group->GroupName = $this->filterstring($_POST['GroupName']);
            if ($group->save()) {

                if (isset($_POST['privileges']) && is_array($_POST['privileges'])){

                    $privilegesIdsToBeDeleted = array_diff($extractprivilegsids , $_POST['privileges']);
                    $privilegesIdsToBeAdded = array_diff($_POST['privileges'],$extractprivilegsids );


                    // Deleted The unwanted privieleges

                    foreach ($privilegesIdsToBeDeleted as $deletedprivilege){
                        $unwantedPrivilegs = UsersGroupsPrivilegesModel::getBy(['PrivilegeId' =>$deletedprivilege ,'GroupId' => $group->GroupId ]);
                        $unwantedPrivilegs->current()->delete();

                    }

                    //Add The New Privileges
                    foreach ($privilegesIdsToBeAdded as $privilege){
                        $groupprivielegs = new UsersGroupsPrivilegesModel();
                        $groupprivielegs->GroupId = $group->GroupId;
                        $groupprivielegs->PrivilegeId = $privilege;
                        $groupprivielegs->save();

                    }
                }

                $this->messenger->add($this->languages->get('message_create_success'));
            }else{
                $this->messenger->add($this->languages->get('message_create_failed'));
            }

            $this->redirect('/usersgroups');
        }

       

              $this->_view();


    }
    public function deleteAction()
    {
        $this->languages->load('usersgroups.messages');
                $User = $this->_params[0];
                $user= UsersGroupsModel::getByPK($User);
                    if( $user->delete()){
                        $this->messenger->add($this->languages->get('message_delete_success'));
                         $this->redirect('/usersgroups');
                    };


              $this->_view();


    }



}