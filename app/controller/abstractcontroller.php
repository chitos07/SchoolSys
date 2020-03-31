<?php

namespace PHPMVC\controller;
use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Template\Tempalte;
use PHPMVC\LIB\Validate;

class AbstractController
{

    use Validate;

    protected $_controller;
   protected $_action;
   protected $_params;

    /**
     * @var Tempalte\Template
     */
   protected $_template;
   protected $_registry;


   protected  $_data = [];

   public function  __get($key)
   {
       return $this->_registry->$key;
   }

    public function NotFoundAction()
  {
    $this->_view();

  }

  public function setController($controllername){

      $this->_controller = $controllername;

  }
  public function setAction($Actionname){

      $this->_action = $Actionname;

  }
  public function setParam($param){

      $this->_params = $param;

  }
  public function setTemplate($template)
  {
        $this->_template = $template;
  }
  public function setRegistry($registry)
    {
        $this->_registry = $registry;
    }


  protected function _view(){

      $view = VIEW_PATH . $this->_controller . DS . $this->_action . '.view.php' ;
    //  echo $view;
    if($this->_action == FrontController::NOT_FOUND_ACTION || !file_exists($view)){
         $view  =   VIEW_PATH . 'notfound' . DS . 'notfound.view.php' ;

    }
        $this->_data = array_merge( $this->_data , $this->languages->getDictionary());
        $this->_template->setActionView($view);
        $this->_template->setAppData($this->_data);
      $this->_template->setRegistry($this->_registry);
        $this->_template->renderApp();







    }

}
