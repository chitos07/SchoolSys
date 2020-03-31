<?php

namespace PHPMVC\controller;


  use PHPMVC\LIB\Helper;

  class LanguageController extends AbstractController
  {

      use Helper;
      public function defaultAction()
      {

        if($_SESSION['Lang'] == 'ar'){

            $_SESSION['Lang'] = 'en';

        }else
        {
            $_SESSION['Lang'] = 'ar';
        }

        //var_dump($_SESSION['Lang']);
        $this->redirect($_SERVER['HTTP_REFERER']);


      }


  }
