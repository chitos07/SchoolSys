<?php

namespace PHPMVC\Models;
class SuppliersModel extends AbstractModel
{
    public $SupplierId;
    public $Name;
    public $PhoneNumber;
    public $Email;
    public $Address;


    protected static $tablename = 'app_suppliers';
    protected static $tableschema = array(
        'SupplierId' => self::DATA_TYPE_INT,
        'Name' => self::DATA_TYPE_STR,
        'PhoneNumber' => self::DATA_TYPE_STR,
        'Email' => self::DATA_TYPE_STR,
        'Address' => self::DATA_TYPE_STR,



    );

    protected static $primarykey = 'SupplierId';



}


