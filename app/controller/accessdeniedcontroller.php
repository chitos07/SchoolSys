<?php

namespace PHPMVC\controller;


  class AccessDeniedController extends AbstractController
  {

        public function defaultAction()
        {
            $this->languages->load('template.common');
            $this->languages->load('accessdenied.default');

             $this->_view();


        }

    
  }