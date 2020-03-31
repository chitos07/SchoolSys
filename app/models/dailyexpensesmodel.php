<?php

namespace PHPMVC\Models;
class DailyExpensesModel extends AbstractModel
{
    public $DExpenseId;
    public $ExpenseId;
    public $Payment;
    public $Created;
    public $UserId;



    protected static $tablename = 'app_expenses_daily_list';
    protected static $tableschema = array(
        'DExpenseId' => self::DATA_TYPE_INT,
        'ExpenseId' => self::DATA_TYPE_INT,
        'Payment' => self::DATA_TYPE_STR,
        'Created' => self::DATA_TYPE_STR,
        'UserId' => self::DATA_TYPE_STR,




    );

    protected static $primarykey = 'DExpenseId';


    public static function getAll()
    {
        $sql = 'SELECT aedl.*, aec.ExpenseName ExpenseName , au.Username  Username FROM ' . self::$tablename . ' aedl';
        $sql .= ' INNER JOIN ' . ExpensesCategoriesModel::getModelTableName()  . ' aec ON aec.ExpenseId = aedl.ExpenseId';
        $sql .= ' INNER JOIN ' . UsersModel::getModelTableName()  . ' au ON au.UserId = aedl.UserId';

        return self::get($sql);
    }


}


