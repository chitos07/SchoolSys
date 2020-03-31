<?php
/**
 * Created by PhpStorm.
 * User: Muhammed
 * Date: 18/07/2019
 * Time: 01:32 م
 */

namespace PHPMVC\LIB;


trait Helper
{
        public function redirect($path){

            session_write_close();
            header('Location: ' . $path  );
            exit;

        }
}