<?php

namespace PHPMVC\Models;
class ClientsModel extends AbstractModel
{
    public $ClientId;
    public $Name;
    public $PhoneNumber;
    public $Email;
    public $Address;



    protected static $tablename = 'app_clients';
    protected static $tableschema = array(
        'ClientId' => self::DATA_TYPE_INT,
        'Name' => self::DATA_TYPE_STR,
        'PhoneNumber' => self::DATA_TYPE_STR,
        'Email' => self::DATA_TYPE_STR,
        'Address' => self::DATA_TYPE_STR,




    );

    protected static $primarykey = 'ClientId';

}


