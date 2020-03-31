<?php

namespace PHPMVC\LIB;
class Languages
{

    private $_dictionary = [];

    public function load($path){

        $default_lang = APP_DEFAULT_LANGUAGE;
        if(isset($_SESSION['Lang'])){
            $default_lang = $_SESSION['Lang'];


        }

        $arrayPath = explode('.', $path);

         $langFilePath = LANGUAGE_PATH . $default_lang . DS .  $arrayPath[0] . DS . $arrayPath[1] . '.lang.php' ;
          if(file_exists($langFilePath)){

              require $langFilePath;

              if(is_array($_) && !empty($_)){

                    foreach ($_ as $key => $value){

                        $this->_dictionary[$key] = $value;


                    }
              }
          }

        }

    public function get($key){

        if(array_key_exists($key, $this->_dictionary)){

            return $this->_dictionary[$key];

        }
    }

    public function feedKey($key, $data){

        if(array_key_exists($key, $this->_dictionary)){
            array_unshift($data, $this->_dictionary[$key]);
            return call_user_func_array('sprintf', $data);

        }

    }

        public function getDictionary()
        {
            return $this->_dictionary;
        }


}