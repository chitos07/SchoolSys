<?php

namespace PHPMVC\controller;


  class NotFoundController extends AbstractController
  {

        public function notFoundAction()
        {
            $this->languages->load('template.common');

             $this->_view();


        }

    
  }