<?php

namespace PHPMVC;
use PHPMVC\LIB\Authentication;
use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Languages;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\Registry;
use PHPMVC\LIB\SessionManager;
use PHPMVC\LIB\Template\Tempalte;
use PHPMVC\Models\ActivitiesModel;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\NotificationsModel;
use PHPMVC\Models\StudentsModel;
use PHPMVC\Models\UsersModel;


if(!defined('DS')){

    define('DS', DIRECTORY_SEPARATOR);
}
require_once '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';
$session = new SessionManager();
$session->start();
$template_parts = require_once '..' . DS . 'app' . DS . 'config' . DS . 'templateconfig.php';


if(!isset($session->Lang)){
    $session->Lang = APP_DEFAULT_LANGUAGE;

}



$template = new Tempalte($template_parts);
$languages = new Languages();
$messenger = Messenger::getInstance($session);
$authentication = Authentication::getInstance($session);
$count = (NotificationsModel::getsome() != false ) ? NotificationsModel::getsome()->count() : '' ;
$getnot = NotificationsModel::getsome();
$countstudent = (StudentsModel::Count() != NULL) ? StudentsModel::Count() : 0;
$countEmployee = (EmployeeModel::Count() != NULL) ? EmployeeModel::Count() : 0;
$countActivities = (ActivitiesModel::Count() != NULL) ? ActivitiesModel::Count() : 0;
$countUsers = (UsersModel::Count() != NULL) ? UsersModel::Count() : 0;




$registry = Registry::getInstance();
$registry->session = $session;
$registry->languages = $languages;
$registry->messenger = $messenger;

$registry->count = $count;
$registry->getnotification = $getnot;
$registry->countstudent = $countstudent;
$registry->countEmployee = $countEmployee;
$registry->countActivities = $countActivities;
$registry->countUsers = $countUsers;


 $fontcontroller = new FrontController($template, $registry , $authentication);
 $fontcontroller->dispatch();



