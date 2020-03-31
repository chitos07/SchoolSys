<?php

namespace PHPMVC\Models;
class ExpensesCategoriesModel extends AbstractModel
{
    public $ExpenseId;
    public $ExpenseName;
    public $FixedPayment;



    protected static $tablename = 'app_expenses_categories';
    protected static $tableschema = array(
        'ExpenseId' => self::DATA_TYPE_INT,
        'ExpenseName' => self::DATA_TYPE_STR,
        'FixedPayment' => self::DATA_TYPE_STR,




    );

    protected static $primarykey = 'ExpenseId';



}


