<?php
/**
 * Created by PhpStorm.
 * User: Muhammed
 * Date: 18/07/2019
 * Time: 01:17 م
 */

namespace PHPMVC\LIB;


trait InputFilter
{
    public function filterint($input)
    {

        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);

    }

    public function filterstring($input)
    {

        return htmlentities(strip_tags($input), ENT_QUOTES, 'UTF-8');

    }


}