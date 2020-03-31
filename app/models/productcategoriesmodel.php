<?php

namespace PHPMVC\Models;
class ProductCategoriesModel extends AbstractModel
{
    public $CategoryId;
    public $Name;
    public $image;



    protected static $tablename = 'app_products_categories';
    protected static $tableschema = array(
        'CategoryId' => self::DATA_TYPE_INT,
        'Name' => self::DATA_TYPE_STR,
        'image' => self::DATA_TYPE_STR,




    );

    protected static $primarykey = 'CategoryId';



}


